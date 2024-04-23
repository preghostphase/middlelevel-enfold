export const mapStyle = [
  {
    elementType: "geometry",
    stylers: [
      {
        color: "#f5f5f5",
      },
    ],
  },
  {
    elementType: "labels.icon",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#616161",
      },
    ],
  },
  {
    elementType: "labels.text.stroke",
    stylers: [
      {
        color: "#f5f5f5",
      },
    ],
  },
  {
    featureType: "administrative",
    elementType: "geometry",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "administrative.land_parcel",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#bdbdbd",
      },
    ],
  },
  {
    featureType: "poi",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "poi",
    elementType: "geometry",
    stylers: [
      {
        color: "#eeeeee",
      },
    ],
  },
  {
    featureType: "poi",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#757575",
      },
    ],
  },
  {
    featureType: "poi.park",
    elementType: "geometry",
    stylers: [
      {
        color: "#e5e5e5",
      },
    ],
  },
  {
    featureType: "poi.park",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#9e9e9e",
      },
    ],
  },
  {
    featureType: "road",
    elementType: "geometry",
    stylers: [
      {
        color: "#ffffff",
      },
    ],
  },
  {
    featureType: "road",
    elementType: "labels.icon",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "road.arterial",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#757575",
      },
    ],
  },
  {
    featureType: "road.highway",
    elementType: "geometry",
    stylers: [
      {
        color: "#dadada",
      },
    ],
  },
  {
    featureType: "road.highway",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#616161",
      },
    ],
  },
  {
    featureType: "road.local",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#9e9e9e",
      },
    ],
  },
  {
    featureType: "transit",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "transit.line",
    elementType: "geometry",
    stylers: [
      {
        color: "#e5e5e5",
      },
    ],
  },
  {
    featureType: "transit.station",
    elementType: "geometry",
    stylers: [
      {
        color: "#eeeeee",
      },
    ],
  },
  {
    featureType: "water",
    elementType: "geometry",
    stylers: [
      {
        color: "#c9c9c9",
      },
    ],
  },
  {
    featureType: "water",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#9e9e9e",
      },
    ],
  },
];

const STROKE_WEIGHT = 3;
const STROKE_HOVER_WEIGHT = 6;
const STROKE_OPACITY = 1;
export const styles = {
  catchment: {
    default: {
      strokeColor: "#3c3c3c",
      strokeOpacity: STROKE_OPACITY,
      strokeWeight: 2,
      fillColor: "#3c3c3c",
      fillOpacity: 0.1,
      zIndex: 2,
      visible: true,
      clickable: false,
    },
  },
  river: {
    default: {
      strokeColor: "#3052a0",
      strokeWeight: STROKE_WEIGHT,
      zIndex: 3,
      clickable: false,
      visible: false,
    },
  },
  drain: {
    default: {
      strokeColor: "#d63e2d",
      strokeWeight: STROKE_WEIGHT,
      strokeWeight: 2,
      zIndex: 4,
    },
    hover: {
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 5,
    },
  },
  deSiltingStarted: {
    default: {
      strokeColor: "#efe755",
      strokeWeight: STROKE_WEIGHT,
      zIndex: 5,
    },
    hover: {
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 6,
    },
  },
  deSiltingFinished: {
    default: {
      strokeColor: "#8dbf35",
      strokeWeight: STROKE_WEIGHT,
      zIndex: 7,
    },
    hover: {
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 8,
    },
  },
  bankRaise: {
    default: {
      strokeColor: "#3052a0",
      strokeOpacity: 1,
      strokeWeight: STROKE_WEIGHT,
      zIndex: 9,
    },
    hover: {
      strokeColor: "#3052a0",
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 10,
    },
  },
};

export function getStyle(feature, type = "default") {
  if (feature.getProperty("IDB_name") || feature.getProperty("FID")) {
    return type === "default" ? styles.drain.default : styles.drain.hover;
  }

  if (
    feature.getProperty("SiltStrt?") === "Yes" &&
    feature.getProperty("SiltFin?") === "No"
  ) {
    return type === "default"
      ? styles.deSiltingStarted.default
      : styles.deSiltingStarted.hover;
  }

  if (
    feature.getProperty("SiltStrt?") === "Yes" &&
    feature.getProperty("SiltFin?") !== "No"
  ) {
    return type === "default"
      ? styles.deSiltingFinished.default
      : styles.deSiltingFinished.hover;
  }

  if (feature.getProperty("BankReq?") === "Yes") {
    return type === "default"
      ? styles.bankRaise.default
      : styles.bankRaise.hover;
  }
}

export function setMapStyles(map) {
  map.data.setStyle((feature) => {
    let style;
    if (feature.getGeometry().getType() === "Polygon") {
      return styles.catchment.default;
    }
    if (feature.getProperty("IDB_name") || feature.getProperty("FID")) {
      return styles.drain.default;
    }

    if (feature.getProperty("BIMRef")) {
      style = styles.river.default;
    }
    if (
      feature.getProperty("SiltStrt?") === "Yes" &&
      feature.getProperty("SiltFin?") === "No"
    ) {
      style = styles.deSiltingStarted.default;
    }
    if (
      feature.getProperty("SiltFin?") &&
      feature.getProperty("SiltFin?") !== "No"
    ) {
      style = styles.deSiltingFinished.default;
    }
    if (feature.getProperty("BankReq?") === "Yes") {
      style = styles.bankRaise.default;
    }
    return style;
  });

  google.maps.event.addListener(map.data, "mouseover", function (event) {
    map.data.overrideStyle(event.feature, getStyle(event.feature, "hover"));
  });

  google.maps.event.addListener(map.data, "mouseout", function (event) {
    if (event.feature.getProperty("selected")) return;
    map.data.overrideStyle(event.feature, getStyle(event.feature, "default"));
  });
}
