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
var lineSymbol = {
  path: "M 0,-1 0,1",
  strokeOpacity: 1,
  strokeWeight: 3,
  scale: 3,
  strokeColor: "#d63e2d",
  anchor: new google.maps.Point(2, 0),
};

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
      strokeColor: "#3052a0",
      strokeWeight: STROKE_WEIGHT,
      strokeWeight: 2,
      zIndex: 4,
      clickable: false,
    },
    hover: {
      zIndex: 4,
    },
  },
  deSiltingStarted: {
    default: {
      strokeColor: "#ef6e3b",
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
      strokeColor: "#efe755",
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
      strokeColor: "#ffffff",
      strokeWeight: STROKE_WEIGHT,
      strokeOpacity: 1,
      zIndex: 8,
      icons: [
        {
          icon: { ...lineSymbol, anchor: new google.maps.Point(0, 0) },
          offset: "10%",
          repeat: "15px",
        },
      ],
    },
    hover: {
      strokeColor: "#ffffff",
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 8,
    },
  },
  bankRaiseDesiltStarted: {
    default: {
      strokeColor: "#ef6e3b",
      strokeWeight: STROKE_WEIGHT,
      strokeOpacity: 1,
      zIndex: 10,
      icons: [
        {
          icon: lineSymbol,
          offset: "10%",
          repeat: "15px",
        },
      ],
    },
    hover: {
      strokeColor: "#ef6e3b",
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 10,
    },
  },
  bankRaiseDeSiltingFinished: {
    default: {
      strokeColor: "#efe755",
      strokeWeight: STROKE_WEIGHT,
      strokeOpacity: 1,
      zIndex: 10,
      icons: [
        {
          icon: lineSymbol,
          offset: "10%",
          repeat: "15px",
        },
      ],
    },
    hover: {
      strokeColor: "#efe755",
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 10,
    },
  },
  finished: {
    default: {
      strokeColor: "#8dbf35",
      strokeWeight: STROKE_WEIGHT,
      zIndex: 11,
    },
    hover: {
      strokeWeight: STROKE_HOVER_WEIGHT,
      zIndex: 11,
    },
  },
};

export function getStyle(feature, type = "default") {
  let style;

  if (feature.getProperty("IDB_name") || feature.getProperty("mainDrain")) {
    style = type === "default" ? styles.drain.default : styles.drain.hover;
  }

  if (
    feature.getProperty("SiltStrt?") === "Yes" &&
    feature.getProperty("SiltFin?") === "No"
  ) {
    if (feature.getProperty("BankReq?") !== "Yes") {
      style =
        type === "default"
          ? styles.deSiltingStarted.default
          : styles.deSiltingStarted.hover;
    } else {
      style =
        type === "default"
          ? styles.bankRaiseDesiltStarted.default
          : styles.bankRaiseDesiltStarted.hover;
    }
  }

  if (
    feature.getProperty("SiltStrt?") === "Yes" &&
    feature.getProperty("SiltFin?") !== "No"
  ) {
    if (feature.getProperty("BankReq?") !== "Yes") {
      style =
        type === "default"
          ? styles.deSiltingFinished.default
          : styles.deSiltingFinished.hover;
    } else {
      style =
        type === "default"
          ? styles.bankRaiseDeSiltingFinished.default
          : styles.bankRaiseDeSiltingFinished.hover;
    }
  }

  if (
    feature.getProperty("BankReq?") === "Yes" &&
    feature.getProperty("SiltStrt?") !== "Yes"
  ) {
    style =
      type === "default" ? styles.bankRaise.default : styles.bankRaise.hover;
  }

  if (
    feature.getProperty("SiltStrt?") === "Yes" &&
    feature.getProperty("SiltFin?") === "Yes" &&
    feature.getProperty("BankFin?") === "Yes" &&
    feature.getProperty("BankReq?") !== "Yes"
  ) {
    style =
      type === "default" ? styles.finished.default : styles.finished.hover;
  }
  return style;
}

export function setMapStyles(map) {
  map.data.setStyle((feature) => {
    let style;
    if (feature.getGeometry().getType() === "Polygon") {
      return styles.catchment.default;
    }
    if (feature.getProperty("IDB_name") || feature.getProperty("mainDrain")) {
      return styles.drain.default;
    }

    if (feature.getProperty("BIMRef")) {
      style = styles.river.default;
    }

    if (
      feature.getProperty("SiltStrt?") === "Yes" &&
      feature.getProperty("SiltFin?") === "No"
    ) {
      if (feature.getProperty("BankReq?") !== "Yes") {
        style = styles.deSiltingStarted.default;
      } else {
        style = styles.bankRaiseDesiltStarted.default;
      }
    }

    if (
      feature.getProperty("SiltFin?") &&
      feature.getProperty("SiltFin?") !== "No"
    ) {
      if (feature.getProperty("BankReq?") !== "Yes") {
        style = styles.deSiltingFinished.default;
      } else {
        style = styles.bankRaiseDeSiltingFinished.default;
      }
    }
    if (
      feature.getProperty("BankReq?") === "Yes" &&
      feature.getProperty("SiltStrt?") !== "Yes"
    ) {
      style = styles.bankRaise.default;
    }

    if (
      feature.getProperty("SiltStrt?") === "Yes" &&
      feature.getProperty("SiltFin?") === "Yes" &&
      feature.getProperty("BankFin?") === "Yes" &&
      feature.getProperty("BankReq?") !== "Yes"
    ) {
      style = styles.finished.default;
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
