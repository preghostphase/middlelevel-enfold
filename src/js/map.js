import { mapStyle, setMapStyles, getStyle } from "./mapStyles.js";
import { createInfoWindow, closeInfoWindow } from "./mapInfoWindow.js";


// State management for toggles
let dataSelected = 'none';

(function () {
  let map;
  let selectedFeature = null;

  function initMap() {
    var mapOptions = {
      zoom: 2,
      minZoom: 9,
      maxZoom: 16,
      styles: mapStyle,
      disableDefaultUI: true,
      zoomControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_TOP,
      },
      gestureHandling: "greedy",
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }

  async function loadJSONData(url) {
    try {
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error(`Failed to load JSON data from ${url}`);
      }
      const data = await response.json();
      return data;
    } catch (error) {
      console.error(`Failed to load JSON data from ${url}`);
      throw error;
    }
  }

  async function loadCatchmentArea() {
    try {
      const geoString = await loadJSONData(catchmentAreaData);
      map.data.addGeoJson(geoString);
    } catch (e) {
      console.log(e);
      alert("Not a GeoJSON file!");
    }
    zoom(map);
  }

  async function loadMainDrains() {
    try {
      const geoString = await loadJSONData(mainDrainsData);

      geoString.features.forEach((feature) => {
        feature["id"] = `drain-${feature.properties["OBJECTID"]}`;
        feature.properties["mainDrain"] = true;
      });

      map.data.addGeoJson(geoString);

      google.maps.event.addListener(map.data, "click", function (event) {
        let infoWindowData;
        if (event.feature.getProperty("mainDrain")) {
          infoWindowData = {
            title: "Drain Info",
            data: [
              {
                title: "Name",
                detail: event.feature.getProperty("NAME") || "N/A",
              },
            ],
          };
        }

        if (!infoWindowData) {
          closeInfoWindow();
          return;
        }
        createInfoWindow(map, event.latLng, infoWindowData);
      });
    } catch (e) {
      console.log(e);
      alert("Not a GeoJSON file!");
    }
    zoom(map);
  }

  async function loadGeoJsonIdb() {
    try {
      const geoString = await loadJSONData(idbInfoData);
      map.data.addGeoJson(geoString);

      google.maps.event.addListener(map.data, "click", function (event) {
        let infoWindowData;
        if (event.feature.getProperty("IDB_name")) {
          infoWindowData = {
            title: "IDB Info",
            data: [
              {
                title: "Name",
                detail: event.feature.getProperty("IDB_name") || "N/A",
              },
              {
                title: "Type",
                detail: event.feature.getProperty("Type") || "N/A",
              },
            ],
          };
        }

        if (!infoWindowData) {
          closeInfoWindow();
          return;
        }
        createInfoWindow(map, event.latLng, infoWindowData);
      });
    } catch (e) {
      console.log(e);
      alert("Not a GeoJSON file!");
    }
  }

  async function loadGeoJsonMlc(dataSelected) {
    try {
      if (!mlcInfoData) return;

      const geoString = await loadJSONData(mlcInfoData);


      if(dataSelected == 'bank'){
          // filter geoString to only include features with properties of BankReq?
          geoString.features = geoString.features.filter(
            (feature) =>
              feature.properties["BankReq?"] === "Yes" ||
              feature.properties["BankFin?"] === "Yes"
          );
      } else if (dataSelected == 'silt'){
          // filter geoString to only include features with properties of SiltStrt?
          geoString.features = geoString.features.filter(
            (feature) =>
              feature.properties["SiltStrt?"] === "Yes"
          );
      } else if(dataSelected == 'both') {
            // filter geoString to only include features with properties of SiltStrt? or BankReq?
            geoString.features = geoString.features.filter(
              (feature) =>
                feature.properties["SiltStrt?"] === "Yes" ||
                feature.properties["BankReq?"] === "Yes" ||
                feature.properties["BankFin?"] === "Yes"
            );
            map.data.addGeoJson(geoString);
      } else if(dataSelected == 'none'){
         
      }
 
    
      map.data.addGeoJson(geoString);

      google.maps.event.addListener(map.data, "click", function (event) {
        let bankRaisingData = null;
        let deSiltingData = null;
        let infoWindowData = null;

        if(dataSelected == 'bank'){

          if (event.feature.getProperty("BankReq?") === "Yes" || event.feature.getProperty("BankFin?") === "Yes") {
            bankRaisingData = {
              title: "Bank Raising",
              data: [
                {
                  title: "Raising Required",
                  detail: event.feature.getProperty("BankReq?") || "",
                },
                {
                  title: "Planned Start Date",
                  detail: event.feature.getProperty("BankStrtDa") || "",
                },
                {
                  title: "Finished",
                  detail: event.feature.getProperty("BankFin?") || "",
                },
              ],
            };
          }

          if (
            event.feature.getProperty("BankReq?") === "Yes" || event.feature.getProperty("BankFin?") === "Yes"
          ) {
            infoWindowData = {
              title: `${event.feature.getProperty("BIMRef")}`,
              data: [bankRaisingData],
            };
          }
          createInfoWindow(map, event.latLng, infoWindowData);
        
        } else if (dataSelected == 'silt'){
          
          if (event.feature.getProperty("SiltStrt?") === "Yes") {
            deSiltingData = {
              title: "De-Silting",
              data: [
                {
                  title: "Planned Start Date",
                  detail: event.feature.getProperty("SiltStrtDa") || "",
                },
                {
                  title: "Finished",
                  detail:
                    event.feature.getProperty("SiltFin?") === "No"
                      ? "No"
                      : event.feature.getProperty("SiltFin?"),
                },
              ],
            };
          }


          if (
            event.feature.getProperty("SiltStrt?") === "Yes"
          ) {
            infoWindowData = {
              title: `${event.feature.getProperty("BIMRef")}`,
              data: [deSiltingData],
            };
          }
          createInfoWindow(map, event.latLng, infoWindowData);


        } else if(dataSelected == 'both') {

          // Check if Bank Raising is required or finished
          if (event.feature.getProperty("BankReq?") === "Yes" || event.feature.getProperty("BankFin?") === "Yes") {
            console.log('bank set');
            bankRaisingData = {
                title: "Bank Raising",
                data: [
                    {
                        title: "Raising Required",
                        detail: event.feature.getProperty("BankReq?") || "",
                    },
                    {
                        title: "Planned Start Date",
                        detail: event.feature.getProperty("BankStrtDa") || "",
                    },
                    {
                        title: "Finished",
                        detail: event.feature.getProperty("BankFin?") || "No",
                    },
                ],
            };
          }

          // Check if De-Silting is started
          if (event.feature.getProperty("SiltStrt?") === "Yes") {
            console.log('desilt set');
            deSiltingData = {
                title: "De-Silting",
                data: [
                    {
                        title: "Planned Start Date",
                        detail: event.feature.getProperty("SiltStrtDa") || "",
                    },
                    {
                        title: "Finished",
                        detail: event.feature.getProperty("SiltFin?") === "No" ? "No" : event.feature.getProperty("SiltFin?"),
                    },
                ],
            };
          }

          // Check if either bank raising or de-silting data is set to create the info window
          if (bankRaisingData || deSiltingData) {
            console.log('info window set');
            infoWindowData = {
                title: `${event.feature.getProperty("BIMRef")}`,
                data: [bankRaisingData, deSiltingData].filter(data => data !== null),
            };

            // Create the info window
            createInfoWindow(map, event.latLng, infoWindowData);
          }
          
        } else {
          console.log('no info window');
        }

   

      

   
      });
    } catch (e) {
      console.log(e);
      alert("Not a GeoJSON file!");
    }
  }

  async function loadGeoJsonDrainPoints(bounds) {
    // TODO: Drain points data is not available currenlty
    try {
      const geoString = await loadJSONData(drainPointsData);

      // remove the drain points that were loaded previously
      map.data.forEach((feature) => {
        if (feature.getGeometry().getType() === "Point") {
          map.data.remove(feature);
        }
      });

      // load the drain points within bounds
      const drainPoints = geoString.features.filter((feature) => {
        const coordinates = feature.geometry.coordinates;
        const point = new google.maps.LatLng(coordinates[1], coordinates[0]);
        return bounds.contains(point);
      });
      map.data.addGeoJson({
        type: "FeatureCollection",
        features: drainPoints,
      });

      // add click event to open info window for each drainPoint
      google.maps.event.addListener(map.data, "click", function (event) {
        if (event.feature.getGeometry().getType() === "Point") {
          infoWindowData = {
            title: "De-Silting",
            data: [
              {
                title: "Drain",
                detail: event.feature.getProperty("drain") || "N/A",
              },
              { title: "IDBs", detail: event.feature.getProperty("idbs") },
              {
                title: "Information",
                detail: event.feature.getProperty("information") || "No",
              },
            ],
          };
          if (!infoWindowData) {
            closeInfoWindow();
            return;
          }
          createInfoWindow(map, event.latLng, infoWindowData);
        }
      });
    } catch (e) {
      console.log(e);
      alert("Not a GeoJSON file!");
    }
  }

  const addEventListeners = () => {
    google.maps.event.addListener(map.data, "click", function (event) {
      if (
        !(
          event.feature.getProperty("IDB_name") ||
          event.feature.getProperty("BIMRef") ||
          event.feature.getProperty("mainDrain")
        )
      )
        return;

      if (selectedFeature) {
        selectedFeature.setProperty("selected", false);
        map.data.overrideStyle(
          selectedFeature,
          getStyle(selectedFeature, "default", dataSelected)
        );
      }
      map.data.overrideStyle(event.feature, getStyle(event.feature, "hover", dataSelected));

      // add property to the feature to be able to use in the mouseover event
      event.feature.setProperty("selected", true);
      selectedFeature = event.feature;

      // zoom in on the selected feature
      var bounds = new google.maps.LatLngBounds();
      event.feature.getGeometry().forEachLatLng(function (path) {
        bounds.extend(path);
      });
      map.fitBounds(bounds);
    });

      // Add mouseover and mouseout event listeners
      google.maps.event.addListener(map.data, "mouseover", function (event) {
        if (selectedFeature && selectedFeature !== event.feature) {
          map.data.overrideStyle(selectedFeature, getStyle(selectedFeature, "default", dataSelected));
        }
        map.data.overrideStyle(event.feature, getStyle(event.feature, "hover", dataSelected));
      });

      google.maps.event.addListener(map.data, "mouseout", function (event) {
        if (selectedFeature && selectedFeature !== event.feature) {
          map.data.overrideStyle(selectedFeature, getStyle(selectedFeature, "default", dataSelected));
        }
        map.data.overrideStyle(event.feature, getStyle(event.feature, "default", dataSelected));
      });

    // Attach click event listener using event delegation
    document.addEventListener("click", function (e) {
      if (e.target.matches("[data-infowindow-close]")) {
        if (selectedFeature) {
          selectedFeature.setProperty("selected", false);
          map.data.overrideStyle(
            selectedFeature,
            getStyle(selectedFeature, "default", dataSelected)
          );
        }

        closeInfoWindow();
      }
    });
  };

  /**
   * Process each point in a Geometry, regardless of how deep the points may lie.
   */
  function processPoints(geometry, callback, thisArg) {
    if (geometry instanceof google.maps.LatLng) {
      callback.call(thisArg, geometry);
    } else if (geometry instanceof google.maps.Data.Point) {
      callback.call(thisArg, geometry.get());
    } else {
      // @ts-ignore
      geometry.getArray().forEach((g) => {
        processPoints(g, callback, thisArg);
      });
    }
  }

  /**
   * Update a map's viewport to fit each geometry in a dataset
   */
  function zoom(map) {
    const bounds = new google.maps.LatLngBounds();

    map.data.forEach((feature) => {
      const geometry = feature.getGeometry();

      if (geometry) {
        processPoints(geometry, bounds.extend, bounds);
      }
    });

    // add offest to the bounds to move the map a bit up
    bounds.extend({
      lat: bounds.getNorthEast().lat() - 0.4,
      lng: bounds.getNorthEast().lng(),
    });

    map.fitBounds(bounds);
  }

  async function initialize() {
    initMap();
    await loadMainDrains();
    await loadCatchmentArea();
    addEventListeners();
    setMapStyles(map, dataSelected);
  }
  initialize();

  const sideBarToggleButton = document.querySelector("[data-sidebar-toggle]");
  const mlcInfoButton = document.querySelector("[data-load-mlc] input");
  const bankraisingInfoButton = document.querySelector("[data-load-bankraising] input");
  const desiltingInfoButton = document.querySelector("[data-load-desilting] input");
  const idbInfoButton = document.querySelector("[data-load-idb]");

  sideBarToggleButton.addEventListener("click", function () {
    document.querySelector(".map-container").classList.toggle("sidebar-closed");
  });

  function updateDataSelected() {
    const isBankraisingChecked = bankraisingInfoButton.checked;
    const isDesiltingChecked = desiltingInfoButton.checked;
  
    if (isBankraisingChecked && isDesiltingChecked) {
      dataSelected = 'both';
      loadGeoJsonMlc(dataSelected);
    } else if (isBankraisingChecked) {
      dataSelected = 'bank';
      loadGeoJsonMlc(dataSelected);
    } else if (isDesiltingChecked) {
      dataSelected = 'silt';
      loadGeoJsonMlc(dataSelected);
    } else {
      dataSelected = 'none';
    }
  }
  

  bankraisingInfoButton.addEventListener("change", function () {
    initialize();
    updateDataSelected();
  });

  desiltingInfoButton.addEventListener("change", function () {
    initialize();
    updateDataSelected();
  });

  if (idbInfoButton) {
    idbInfoButton.addEventListener("click", function () {
      initialize();
      loadGeoJsonIdb();
      mlcInfoButton.classList.remove("active");
      this.classList.add("active");
    });
  }
})();
