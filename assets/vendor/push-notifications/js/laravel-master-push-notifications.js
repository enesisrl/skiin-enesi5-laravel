document.addEventListener('DOMContentLoaded', () => {

    /**
     * Recupera le informazioni sul dispositivo dell'utente.
     * Analizza lo user agent e la piattaforma per determinare il produttore, il modello e la versione del dispositivo.
     * @returns {Object} Oggetto contenente le informazioni sul dispositivo.
     */
    function getDeviceInfo() {
        const userAgent = navigator.userAgent;
        const platform = navigator.platform;

        const deviceInfo = {
            device_manufacturer: 'Unknown',
            device_model: 'Unknown',
            device_platform: platform || 'Unknown',
            device_version: 'Unknown',
            appPlatform: 'Web'
        };

        if (/iPhone/.test(userAgent)) {
            deviceInfo.device_manufacturer = 'Apple';
            deviceInfo.device_model = 'iPhone';
        } else if (/iPad/.test(userAgent)) {
            deviceInfo.device_manufacturer = 'Apple';
            deviceInfo.device_model = 'iPad';
        } else if (/Macintosh/.test(userAgent)) {
            deviceInfo.device_manufacturer = 'Apple';
            deviceInfo.device_model = 'Mac';
        } else if (/Windows/.test(userAgent)) {
            deviceInfo.device_manufacturer = 'PC';
            deviceInfo.device_model = 'Windows';
        } else if (/Android/.test(userAgent)) {
            deviceInfo.device_manufacturer = 'Android';
            const match = userAgent.match(/Android\s([0-9.]*)/);
            deviceInfo.device_version = match ? match[1] : 'Unknown';
        }

        if (deviceInfo.device_version === 'Unknown') {
            const browserMatch = userAgent.match(/(Chrome|Firefox|Safari|Edge|Opera)\/(\d+\.\d+)/);
            if (browserMatch) {
                deviceInfo.device_version = browserMatch[1] + " " + browserMatch[2];
            }
        }

        return deviceInfo;
    }

    /**
     * Carica dinamicamente uno script Firebase e verifica che sia stato caricato correttamente.
     * @param {string} url - URL dello script da caricare.
     * @returns {Promise} Una Promise che si risolve quando lo script è caricato correttamente.
     */
    function loadFirebaseMessagingScript(url) {
        return new Promise((resolve, reject) => {
            if (document.querySelector(`script[src="${url}"]`)) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = url;
            script.onload = () => {
                setTimeout(() => {
                    if (url.includes('firebase-app-compat.js') && typeof firebase === 'undefined') {
                        reject(new Error('Firebase app non caricato correttamente'));
                    } else if (url.includes('firebase-messaging-compat.js') && (!firebase.messaging)) {
                        reject(new Error('Firebase messaging non caricato correttamente'));
                    } else {
                        resolve();
                    }
                }, 200);
            };
            script.onerror = reject;
            document.body.appendChild(script);
        });
    }

    /**
     * Invia il token FCM al server backend.
     * Include informazioni sul dispositivo dell'utente.
     * @param {string} token - Token FCM da inviare.
     */
    async function sendTokenToServer(token) {
        if (!isUserAuthenticated()) {
            console.log('Utente non autenticato, token non inviato');
            return;
        }

        const deviceInfo = getDeviceInfo();
        try {
            const response = await fetch(window.firebaseTokenRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    token,
                    ...deviceInfo
                })
            });

            if (!response.ok) {
                throw new Error('Errore nella registrazione del token');
            }

            console.log('Token registrato con successo');
        } catch (error) {
            console.error('Errore invio token al server:', error);
        }
    }

    /**
     * Verifica se l'utente è autenticato.
     * Controlla una variabile globale o un meta tag per determinare lo stato di autenticazione.
     * @returns {boolean} True se l'utente è autenticato, altrimenti false.
     */
    function isUserAuthenticated() {
        if (typeof window.isAuthenticated !== 'undefined') {
            return window.isAuthenticated;
        }

        const authMeta = document.querySelector('meta[name="user-authenticated"]');
        return authMeta && authMeta.content === 'true';
    }

    /**
     * Inizializza le notifiche push Firebase.
     * Registra il service worker, richiede il permesso per le notifiche e gestisce i messaggi in foreground.
     */
    async function initializeFirebasePush() {
        try {
            const registration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');
            await navigator.serviceWorker.ready;

            if (!firebase.apps.length) {
                firebase.initializeApp(window.firebaseConfig);
            }

            const messaging = firebase.messaging();

            registration.active.postMessage({
                type: 'INIT_FIREBASE',
                config: window.firebaseConfig
            });

            await Notification.requestPermission();
            console.log('Permesso per le notifiche concesso.');

            const token = await messaging.getToken({
                serviceWorkerRegistration: registration
            });
            console.log('Token FCM:', token);
            await sendTokenToServer(token);

            messaging.onMessage((payload) => {
                console.log('Messaggio in arrivo:', payload);
                const notificationTitle = payload.notification.title;
                const notificationOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.icon
                };

                if (Notification.permission === 'granted') {
                    registration.showNotification(notificationTitle, notificationOptions);
                }
            });
        } catch (err) {
            console.error('Errore nella configurazione delle notifiche:', err);
        }
    }

    if (window.firebaseFCMWebPushEnabled === false) {
        console.warn('Le notifiche push web sono disabilitate');
        return;
    }

    loadFirebaseMessagingScript('https://www.gstatic.com/firebasejs/11.0.2/firebase-app-compat.js')
        .then(() => loadFirebaseMessagingScript('https://www.gstatic.com/firebasejs/11.0.2/firebase-messaging-compat.js'))
        .then(() => {
            return new Promise((resolve, reject) => {
                let attempts = 0;
                const checkFirebase = () => {
                    attempts++;
                    if (typeof firebase !== 'undefined' && firebase.messaging && window.firebaseConfig) {
                        resolve();
                    } else if (attempts < 10) {
                        setTimeout(checkFirebase, 100);
                    } else {
                        reject(new Error('Firebase o la sua configurazione non sono disponibili dopo 10 tentativi'));
                    }
                };
                checkFirebase();
            });
        })
        .then(() => initializeFirebasePush())
        .catch((error) => {
            console.error('Errore nel caricamento delle librerie Firebase:', error);
        });
});
