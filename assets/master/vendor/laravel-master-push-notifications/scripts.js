document.addEventListener('DOMContentLoaded', () => {

    function getDeviceInfo() {
        // Parsing dello user agent
        const userAgent = navigator.userAgent;
        const platform = navigator.platform;

        // Device info base
        const deviceInfo = {
            device_manufacturer: 'Unknown',
            device_model: 'Unknown',
            device_platform: platform || 'Unknown',
            device_version: 'Unknown',
            appPlatform: 'Web'
        };

        // Determiniamo il manufacturer e il modello dal user agent
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

        // Versione del browser come device_version se non già impostata
        if (deviceInfo.device_version === 'Unknown') {
            const browserMatch = userAgent.match(/(Chrome|Firefox|Safari|Edge|Opera)\/(\d+\.\d+)/);
            if (browserMatch) {
                deviceInfo.device_version = browserMatch[1]+" "+browserMatch[2];
            }
        }

        return deviceInfo;
    }
    function loadFirebaseMessagingScript(url) {
        return new Promise((resolve, reject) => {
            if (document.querySelector(`script[src="${url}"]`)) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = url;
            script.onload = () => {
                setTimeout(resolve, 100);
            };
            script.onerror = reject;
            document.body.appendChild(script);
        });
    }

    // Funzione per inviare il token al backend
    async function sendTokenToServer(token) {
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

    async function initializeFirebasePush() {
        try {
            // Registra il service worker
            const registration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');

            // Attendi che il service worker sia attivo
            await navigator.serviceWorker.ready;

            // Inizializza Firebase
            if (!firebase.apps.length) {
                firebase.initializeApp(window.firebaseConfig);
            }

            const messaging = firebase.messaging();

            // Invia la configurazione al service worker
            registration.active.postMessage({
                type: 'INIT_FIREBASE',
                config: window.firebaseConfig
            });

            // Richiedi il permesso per le notifiche
            await Notification.requestPermission();
            console.log('Permesso per le notifiche concesso.');

            // Ottieni il token FCM
            const token = await messaging.getToken({
                serviceWorkerRegistration: registration
            });
            console.log('Token FCM:', token);
            await sendTokenToServer(token);

            // Gestisci i messaggi in foreground
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
    // Carica le librerie Firebase in sequenza
    loadFirebaseMessagingScript('https://www.gstatic.com/firebasejs/11.0.2/firebase-app-compat.js')
        .then(() => loadFirebaseMessagingScript('https://www.gstatic.com/firebasejs/11.0.2/firebase-messaging-compat.js'))
        .then(() => {
            if (!window.firebaseConfig || typeof firebase === 'undefined') {
                throw new Error('Firebase o la sua configurazione non sono disponibili');
            }
            return initializeFirebasePush();
        })
        .catch((error) => {
            console.error('Errore nel caricamento delle librerie Firebase:', error);
        });
});
