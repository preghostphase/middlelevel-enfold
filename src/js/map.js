import { mapStyle, setMapStyles, getStyle } from "./mapStyles.js";
import { createInfoWindow, closeInfoWindow } from "./mapInfoWindow.js";

(function () {
  let map;
  let selectedFeature = null;

  function initMap() {
    var mapOptions = {
      zoom: 2,
      minZoom: 10,
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

  async function loadGeoJsonMlc() {
    try {
      if (!mlcInfoData) return;

      const geoString = await loadJSONData(mlcInfoData);
      map.data.addGeoJson(geoString);

      google.maps.event.addListener(map.data, "click", function (event) {
        let infoWindowData;
        if (event.feature.getProperty("SiltStrt?") === "Yes") {
          infoWindowData = {
            title: "De-Silting",
            data: [
              {
                title: "Start Date",
                detail: event.feature.getProperty("SiltStrtDa") || "N/A",
              },
              { title: "Started?", detail: "Yes" },
              {
                title: "Finished?",
                detail: event.feature.getProperty("SiltFin?") || "No",
              },
            ],
          };
        } else if (event.feature.getProperty("BankReq?") === "Yes") {
          infoWindowData = {
            title: "Bank Raising",
            data: [
              {
                title: "Start Date",
                detail: event.feature.getProperty("BankStrtDa") || "N/A",
              },
              { title: "Started?", detail: "Yes" },
              {
                title: "Finished?",
                detail: event.feature.getProperty("BankFin?") || "No",
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
          event.feature.getProperty("BIMRef")
        )
      )
        return;

      if (selectedFeature) {
        selectedFeature.setProperty("selected", false);
        map.data.overrideStyle(
          selectedFeature,
          getStyle(event.feature, "default")
        );
      }
      map.data.overrideStyle(event.feature, getStyle(event.feature, "hover"));

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

    // Attach click event listener using event delegation
    document.addEventListener("click", function (e) {
      if (e.target.matches("[data-infowindow-close]")) {
        if (selectedFeature) {
          selectedFeature.setProperty("selected", false);
          map.data.overrideStyle(
            selectedFeature,
            getStyle(selectedFeature, "default")
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

  function initialize() {
    initMap();
    loadCatchmentArea();
    addEventListeners();
    setMapStyles(map);
  }
  initialize();

  const mlcInfoButton = document.querySelector("[data-load-mlc]");
  const idbInfoButton = document.querySelector("[data-load-idb]");

  mlcInfoButton.addEventListener("click", function () {
    initialize();
    loadGeoJsonMlc();
    idbInfoButton.classList.remove("active");
    this.classList.add("active");
  });

  idbInfoButton.addEventListener("click", function () {
    initialize();
    loadGeoJsonIdb();
    mlcInfoButton.classList.remove("active");
    this.classList.add("active");
  });
})();
