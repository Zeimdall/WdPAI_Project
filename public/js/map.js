mapboxgl.accessToken = 'pk.eyJ1IjoiemVpbWRhbGwiLCJhIjoiY2w0dmRvdjh1MThudTNqbzZiNzlrNTZmaiJ9.9v6-FaH9P9RpXYJScXYviQ';

const coordinates = [19.94403, 50.07171]

const geojson = {
    'type': 'FeatureCollection',
    'features': [
        {
            'type': 'Feature',
            'geometry': {
                'type': 'Point',
                'coordinates': coordinates
            },
            'properties': {
                'title': 'Mapbox',
                'description': 'Tadeusz Kościuszko University of Technology'
            }
        }
    ]
};

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: coordinates,
    zoom: 15
});

// add markers to map
for (const feature of geojson.features) {
// create a HTML element for each feature
    const el = document.createElement('div');
    el.className = 'marker';

// make a marker for each feature and add it to the map
    new mapboxgl.Marker(el)
        .setLngLat(feature.geometry.coordinates)
        .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
                .setHTML(
                    `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                )
        )
        .addTo(map);
}