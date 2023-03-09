
function initMap() {
    // Creation de la map
     const map = new google.maps.Map(document.querySelector('#map'), {
         zoom: 7,
         center: { lat: 44.827158, lng: -0.6406178 },
     });
 
 
   // charger les veto dans GeoJSON sur la map.
   map.data.loadGeoJson('veto.json', {idPropertyName: 'storeid'});

   const apiKey = 'AIzaSyB3QCFqbAJ2Ostf4btfr8efFZFkOxWh8uA';
   const infoWindow = new google.maps.InfoWindow();
   map.data.setStyle((feature) => {
    return {
      icon: {
        url: `img/icon_${feature.getProperty('category')}.png`,
        scaledSize: new google.maps.Size(64, 64),
      },
    };
  });

   //afficher les infos quand on clique sur le marqueur
   map.data.addListener('click', (event) => {
    const category = event.feature.getProperty('category');
    const name = event.feature.getProperty('name');
    const description = event.feature.getProperty('description');
    const hours = event.feature.getProperty('hours');
    const phone = event.feature.getProperty('phone');
    const position = event.feature.getGeometry().get();
    const content = `
    <img style="float:left; width:200px; margin-top:30px" src="img/logo_${category}.png">
    <div style="margin-left:220px; margin-bottom:20px;">
      <h2>${name}</h2><p>${description}</p>
      <p><b>Open:</b> ${hours}<br/><b>Phone:</b> ${phone}</p>
      <p><img src="https://maps.googleapis.com/maps/api/streetview?size=350x120&location=${position.lat()},${position.lng()}&key=${apiKey}&solution_channel=GMP_codelabs_simplestorelocator_v1_a"></p>
    </div>
    `;

    infoWindow.setContent(content);
    infoWindow.setPosition(position);
    infoWindow.setOptions({pixelOffset: new google.maps.Size(0, -30)});
    infoWindow.open(map);
  });
    //defini le point d'origine quand on clique sur une adresse
    const originMarker = new google.maps.Marker({map: map});
    originMarker.setVisible(false);
    let originLocation = map.getCenter();

    autocomplete.addListener('place_changed', async () => {
        originMarker.setVisible(false);
        originLocation = map.getCenter();
        const place = autocomplete.getPlace();

        if (!place.geometry) { //si l'utilisateur rentre une mauvaise adresse 
        window.alert('mauvaise adresse \'' + place.name + '\'');
        return;
        }

    // recentre la carte sur l'adresse selectionner 
        originLocation = place.geometry.location;
        map.setCenter(originLocation);
        map.setZoom(9);
        console.log(place);

        originMarker.setPosition(originLocation);
        originMarker.setVisible(true);

        // permet de calculer la distance a parcourir pour chaque adresse
        const rankedStores = await calculateDistances(map.data, originLocation);
        showStoresList(map.data, rankedStores);

        return;
        
    });
}
console.log(map);

async function calculateDistances(data, origin) {
    const stores = [];
    const destinations = [];
  
    // Build parallel arrays for the store IDs and destinations
    data.forEach((store) => {
      const storeNum = store.getProperty('storeid');
      const storeLoc = store.getGeometry().get();
  
      stores.push(storeNum);
      destinations.push(storeLoc);
    });
  
    // Retrieve the distances of each store from the origin
    // The returned list will be in the same order as the destinations list
    const service = new google.maps.DistanceMatrixService();
    const getDistanceMatrix =
      (service, parameters) => new Promise((resolve, reject) => {
        service.getDistanceMatrix(parameters, (response, status) => {
          if (status != google.maps.DistanceMatrixStatus.OK) {
            reject(response);
          } else {
            const distances = [];
            const results = response.rows[0].elements;
            for (let j = 0; j < results.length; j++) {
              const element = results[j];
              const distanceText = element.distance.text;
              const distanceVal = element.distance.value;
              const distanceObject = {
                storeid: stores[j],
                distanceText: distanceText,
                distanceVal: distanceVal,
              };
              distances.push(distanceObject);
            }
  
            resolve(distances);
          }
        });
      });
  
    const distancesList = await getDistanceMatrix(service, {
      origins: [origin],
      destinations: destinations,
      travelMode: 'DRIVING',
      unitSystem: google.maps.UnitSystem.METRIC,
    });
  
    distancesList.sort((first, second) => {
      return first.distanceVal - second.distanceVal;
    });
  
    return distancesList;
  }
  function showStoresList(data, stores) {
    if (stores.length == 0) {
      
      return;
    }
  
    let panel = document.createElement('div');
    // If the panel already exists, use it. Else, create it and add to the page.
    if (document.getElementById('panel')) {
      panel = document.getElementById('panel');
      // If panel is already open, close it
      if (panel.classList.contains('open')) {
        panel.classList.remove('open');
      }
    } else {
      panel.setAttribute('id', 'panel');
      const body = document.body;
      body.insertBefore(panel, body.childNodes[0]);
    }
  
    // Clear the previous details
    while (panel.lastChild) {
      panel.removeChild(panel.lastChild);
    }
  
    stores.forEach((store) => {
      // Add store details with text formatting
      const name = document.createElement('p');
      name.classList.add('place');
      const currentStore = data.getFeatureById(store.storeid);
      name.textContent = currentStore.getProperty('name');
      panel.appendChild(name);
      const distanceText = document.createElement('p');
      distanceText.classList.add('distanceText');
      distanceText.textContent = store.distanceText;
      panel.appendChild(distanceText);
    });
  
    // Open the panel
    panel.classList.add('open');
  
    return;
  }