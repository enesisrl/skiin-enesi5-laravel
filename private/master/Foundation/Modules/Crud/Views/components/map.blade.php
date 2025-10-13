<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{!! __("admin::label.geolocation") !!}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div id="mapCanvasViewOnMap" class="leaflet-map" style="height: 400px;"></div>
                </div>
                <div class="col-md-4">
                    <input type="hidden" id="field_idViewOnMap" />
                    <input type="hidden" id="marker_lat" />
                    <input type="hidden" id="marker_lng" />

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>{!! __("admin::label.enter_place_or_address") !!}</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ $start_address }}" id="viewOnMapAddress">
                                    <span class="input-group-append">
                                        <a href="#" onclick="geolocateAddress();" class="input-group-text">{!! __("admin::label.search") !!}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{!! __("admin::label.drag_marker_on_map") !!}</p>
                            <dl>
                                <dt>{!! __("admin::label.coords") !!}</dt>
                                <dd id="infoViewOnMap"> - </dd>
                                <dt><br />{!! __("admin::label.approximate_address") !!}</dt>
                                <dd id="addressViewOnMap"> - </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn_closeViewOnMap" class="btn btn-light-primary font-weight-bold" onclick="closeMap('{!! $modal_id !!}');">{!! __("admin::label.close") !!}</button>
            <button type="button" class="btn btn-primary font-weight-bold" onclick="updateCoords();">{!! __("admin::label.update_coords") !!}</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Dichiarazione delle variabili
    var map_{!! $field_id !!};
    var marker_{!! $field_id !!};

    // Funzione per la geocodifica dell'indirizzo
    function geolocateAddress() {
        const address = $("#viewOnMapAddress").val();

        Admin.ajax({
            url: '{{ \Illuminate\Support\Facades\App::make('AddressesModule')->adminRoute('geolocateFromAddress') }}',
            data: {
                address: address
            },
            success: function(response) {
                if (response.lat && response.lng) {
                    var lati = parseFloat(response.lat);
                    var lngi = parseFloat(response.lng);

                    if (!map_{!! $field_id !!}) {
                        initializeMapOnFly(lati, lngi, '{!! $field_id !!}');
                    } else {
                        map_{!! $field_id !!}.setView([lati, lngi], 16);
                        makeMarker([lati, lngi]);
                    }
                }else{
                    bootbox.dialog({
                        message: __('errors.geolocalization_failed')
                    });
                }
            }
        })
    }

    // Funzione per la geocodifica inversa (da coordinate a indirizzo)
    function geocodePosition(lat, lng) {

        Admin.ajax({
            url: '{{ \Illuminate\Support\Facades\App::make('AddressesModule')->adminRoute('getAddressFromGeolocation') }}',
            data: {
                lat: lat,
                lng: lng
            },
            success: function(response) {
                if (response && response.address) {
                    updateMarkerAddress(response.address);
                } else {
                    updateMarkerAddress('Impossibile determinare l\'indirizzo in questa posizione.');
                }
            }
        });
    }

    // Aggiornamento della posizione del marker
    function updateMarkerPosition(latLng) {
        $("#marker_lat").val(latLng.lat);
        $("#marker_lng").val(latLng.lng);
        document.getElementById('infoViewOnMap').innerHTML = [
            latLng.lat,
            latLng.lng
        ].join(',');
    }

    // Aggiornamento dell'indirizzo nel DOM
    function updateMarkerAddress(str) {
        document.getElementById('addressViewOnMap').innerHTML = str;
    }

    // Inizializzazione della mappa
    function initializeMapOnFly(lat, lng, field_id) {

        // Pulizia di elementi precedenti se esistono
        if (map_{!! $field_id !!}) {
            // Rimuovi esplicitamente tutti i listener e i layer
            map_{!! $field_id !!}.eachLayer(function (layer) {
                map_{!! $field_id !!}.removeLayer(layer);
            });
            map_{!! $field_id !!}.remove();
            map_{!! $field_id !!} = null;
        }

        $("#field_idViewOnMap").val(field_id);

        // Creare la mappa con Leaflet
        map_{!! $field_id !!} = L.map('mapCanvasViewOnMap').setView([lat, lng], 16);

        // Aggiungere il layer di OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map_{!! $field_id !!});

        // Creare il marker
        makeMarker([lat, lng]);

        // Forzare il ridimensionamento della mappa
        resizeMap();

    }

    // Creazione del marker sulla mappa
    function makeMarker(latLng) {
        if (marker_{!! $field_id !!}) {
            map_{!! $field_id !!}.removeLayer(marker_{!! $field_id !!});
        }

        marker_{!! $field_id !!} = L.marker(latLng, {
            draggable: true
        }).addTo(map_{!! $field_id !!});

        // Aggiornare la posizione
        updateMarkerPosition({lat: latLng[0], lng: latLng[1]});
        geocodePosition(latLng[0], latLng[1]);

        // Aggiungere gli eventi di trascinamento
        marker_{!! $field_id !!}.on('dragstart', function() {
            updateMarkerAddress('...');
        });

        marker_{!! $field_id !!}.on('drag', function() {
            var position = marker_{!! $field_id !!}.getLatLng();
            updateMarkerPosition({lat: position.lat, lng: position.lng});
        });

        marker_{!! $field_id !!}.on('dragend', function() {
            var position = marker_{!! $field_id !!}.getLatLng();
            geocodePosition(position.lat, position.lng);
        });
    }

    // Funzione per ridimensionare correttamente la mappa
    function resizeMap() {
        if (map_{!! $field_id !!}) {
            setTimeout(function() {
                map_{!! $field_id !!}.invalidateSize(true);
            }, 300);
        }
    }


    // Aggiornamento delle coordinate nel form
    function updateCoords() {
        const $field_container = $("#{!! $field_id !!}");
        $field_container.find("[data-coord-lat]").val($("#marker_lat").val());
        $field_container.find("[data-coord-lng]").val($("#marker_lng").val());
        $("#btn_closeViewOnMap").click();
    }

    // Chiusura della modale
    function closeMap(modal_id) {
        $("#"+modal_id).modal("hide");
        setTimeout(function() {
            $("#"+modal_id).remove();
        }, 300);
    }

    $(document).ready(function() {
        @if($lat && $lng)
        initializeMapOnFly({!! $lat !!}, {!! $lng !!}, '{!! $field_id !!}');
        @elseif ($start_address)
        geolocateAddress();
        @else
        initializeMapOnFly(0, 0, '{!! $field_id !!}');
        @endif


        // Gestione dell'evento di apertura della modale per ridimensionare la mappa
        $(".modal").on("shown.bs.modal", function () {
            resizeMap();
        });


    });
</script>
