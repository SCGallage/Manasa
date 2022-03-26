// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initAutocomplete() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 7.8774222, lng: 80.7003428 },
      zoom: 8,
      mapTypeId: "roadmap",
    });
    // Create the search box and link it to the UI element.
    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
  
    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
      searchBox.setBounds(map.getBounds());
    });
  
    let markers = [];
  
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
      const places = searchBox.getPlaces();
      if (places.length == 0) {
        return;
      }
  
      // Clear out the old markers.
      markers.forEach((marker) => {
        marker.setMap(null);
      });
      markers = [];
  
      // For each place, get the icon, name and location.
      const bounds = new google.maps.LatLngBounds();
  
      places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
          console.log("Returned place contains no geometry");
          return;
        }
  
        const icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };

        // Create a marker for each place.
        markers.push(
          new google.maps.Marker({
            map,
            title: place.name,
            position: place.geometry.location,
          })
        );

        sessionStorage.setItem("place-name", place.name);
        sessionStorage.setItem("place-address", place.formatted_address);
        setLocationDetails(place.name, place.formatted_address);
        console.log("Lng bounds:", place.geometry.location.lng());
        console.log("Lat bounds:", place.geometry.location.lat());
        console.log("place name:", place.formatted_address);
        console.log("place id:", place.place_id);
        saveLocationToSession(place.place_id, place.name, place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }

  const saveLocationToSession = (loc_place_id, loc_name, loc_address, loc_lat, loc_lng) => {
    sessionStorage.setItem("location", JSON.stringify({
      place_id: loc_place_id,
      name: loc_name,
      address: loc_address,
      lat: loc_lat,
      lng: loc_lng
    }));
  };

  const setLocationDetails = (name, address) => {
    document.getElementById("location-name").innerHTML = name;
    document.getElementById("location-address").innerHTML = address;
  };

  const closeLocationModal = () => {
    document.querySelector(".location-name").innerHTML = `${sessionStorage.getItem("place-name")}, ${sessionStorage.getItem("place-address")}`;
    document.querySelector(".modal-secondary-bg").classList.remove("open-modal");
  };

  const locationInputDiv = () => {
    if (document.getElementById("virtual").checked)
      document.getElementById("location-div").classList.add("close-modal");
    else
      document.getElementById("location-div").classList.remove("close-modal");
  }; 