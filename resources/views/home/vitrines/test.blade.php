<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="map_link"></label>
            <input type="text" class="form-control" id="map_link" name="map_link" readonly required
                style="display: none;">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="siege_social">Siège Social (Adresse) <span style="color: red;">(*)</span></label>
            <input type="text" class="form-control @error('siege_social') is-invalid @enderror" id="siege_social"
                name="siege_social" placeholder="Entrez l'adresse du siège social" required>
            @error('siege_social')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<script>
    let map, marker, autocomplete;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 8
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });

        autocomplete = new google.maps.places.Autocomplete(document.getElementById('siege_social'), {
            types: ['geocode']
        });
        autocomplete.addListener('place_changed', onPlaceChanged);

        google.maps.event.addListener(marker, 'dragend', function() {
            const position = marker.getPosition();
            map.setCenter(position);
            document.getElementById('map_link').value = position.lat() + ", " + position.lng();
        });
    }

    function onPlaceChanged() {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            alert("No details available for input: '" + place.name + "'");
            return;
        }

        map.setCenter(place.geometry.location);
        map.setZoom(14);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        document.getElementById('map_link').value = place.geometry.location.lat() + ", " + place.geometry.location
    .lng();
    }

    function showLocation() {
        const address = document.getElementById('map_link').value;
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'siege_social': address
        }, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                marker.setVisible(true);

                document.getElementById('map_link').value = results[0].formatted_address + " (" + results[0]
                    .geometry.location.lat() + ", " + results[0].geometry.location.lng() + ")";
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
