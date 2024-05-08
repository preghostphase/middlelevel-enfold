const infowindow = new google.maps.InfoWindow();

export function createInfoWindow(map, latLng, infoWindowData) {
  if (!map || !infoWindowData || !infoWindowData.data) return;

  const { title, data } = infoWindowData;
  const deSiltingData = data[0];
  const bankRaisingData = data[1];

  var html = `
            <div class='info-window'>
              <div class='info-window__header'>
              <h2>${title}</h2>
              
              <button class='info-window__close' data-infowindow-close>
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 1436 1054" style="enable-background:new 0 0 1436 1054;" xml:space="preserve">
                <path d="M718.5,453.8l224-224.3c20.4-20.4,53.3-20.4,73.6,0c20.4,20.4,20.4,53.3,0,73.6l-224,224.6l224,224
                  c20.4,20.4,20.4,53.3,0,73.6c-20.4,20.4-53.3,20.4-73.6,0l-224-224l-224.6,224c-20.4,20.4-53.3,20.4-73.6,0
                  c-20.4-20.4-20.4-53.3,0-73.6l224-224L420.4,303.2c-20.5-20.4-20.5-53.3-0.1-73.6s53.3-20.4,73.6,0l224.6,224V453.8z"/>
                </svg>
              </button>

              </div>

              ${
                deSiltingData
                  ? `<h3 class='info-window__sub-title'>${
                      deSiltingData.title
                    }</h3>
              <dl class='info-window__data'>
                ${deSiltingData.data
                  .map((item) => {
                    return `
                    <div class='info-window__data-row'>
                        <dt class='info-window__data-title'>${item.title}: </dt>
                        <dd class='info-window__data-detail'>${item.detail}</dd>
                    </div>`;
                  })
                  .join("")}
              </dl>`
                  : ""
              }

              ${
                bankRaisingData
                  ? `<h3 class='info-window__sub-title'>${
                      bankRaisingData.title
                    }</h3><dl class='info-window__data'>
                ${bankRaisingData.data
                  .map((item) => {
                    return `
                    <div class='info-window__data-row'>
                        <dt class='info-window__data-title'>${item.title}: </dt>
                        <dd class='info-window__data-detail'>${item.detail}</dd>
                    </div>`;
                  })
                  .join("")}
              </dl>`
                  : ""
              }
            </div>`;
  infowindow.setContent(html);

  infowindow.setPosition(latLng);
  infowindow.setOptions({ pixelOffset: new google.maps.Size(0, 0) });
  infowindow.open(map);

  return infowindow;
}

export function closeInfoWindow() {
  infowindow.close();
}
