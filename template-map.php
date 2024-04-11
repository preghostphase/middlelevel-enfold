<?php 
/*
	Template Name: Interactive Map
*/
get_header();
do_action( 'ava_builder_template_after_header' );
if( get_post_meta( get_the_ID(), 'header', true ) != 'no' )
  echo avia_title();
do_action( 'ava_after_main_title' );
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/style.css">
<section class="interactive-map">
    <div class="map-container">
      <div class="background-image" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/Peterborough.jpg)"></div>
      <svg class="map-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 841.89 595.28" style="enable-background:new 0 0 841.89 595.28;" xml:space="preserve">

        <g id="District_Boundary">
          <polyline class="district-boundary" points="592.69,164.14 592.69,157.49 590.56,152.7 586.64,149.24 584.17,151.63 578.85,146.31 571.4,153.5 
            565.01,146.31 556.23,145.25 547.71,145.25 541.32,143.91 538.4,147.37 536,150.83 530.94,152.7 526.95,150.57 519.5,150.04 
            514.18,149.24 510.18,157.22 508.05,162.81 504.59,168.67 502.73,173.99 491.82,171.59 489.33,179.05 482.77,176.92 477.18,186.23 
            473.99,195.14 472.03,202.32 470.53,209.21 473.99,212.05 484.1,213.83 482.56,223.42 478.86,222.43 470.53,218.7 458.81,213.83 
            451.1,209.21 441.25,206.64 439.37,205.89 429.27,202.32 431.93,178.78 418.8,184.37 401.32,192.27 380.03,200.61 359.54,209.21 
            340.37,218.97 318.28,229.08 318.28,233.08 319.35,237.6 319.35,240.26 316.04,243.72 316.04,247.68 314.56,250.91 311.1,249.31 
            306.31,247.68 299.39,250.91 294.59,253.93 287.14,256.23 283.42,256.23 275.7,256.23 270.91,257.3 265.58,257.3 258.65,257.3 
            253.41,257.3 247.22,254.86 240.03,252.77 234.18,251.97 230.45,252.24 223.8,254.86 216.52,257.3 208.09,261.16 204.81,253.93 
            204.81,249.58 204.81,243.46 188.13,247.68 174.56,250.91 164,253.93 166,259.72 173.59,263.42 173.49,268.35 174.03,273 
            166.57,275.53 162.05,277.26 156.19,275.53 156.19,280.99 154.07,288.44 155.39,292.96 151.4,297.64 147.41,303.17 144.48,307.87 
            142.88,312.13 138.36,317.98 132.24,321.44 125.05,324.37 121.33,325.43 117.33,325.43 113.96,329.54 106.15,338.58 101.36,343 
            94.44,347.61 84.6,350.45 80.07,352.32 75.01,354.45 69.96,354.45 65.7,351.78 60.11,353.11 55.05,354.45 49.2,358.44 
            44.94,358.44 44.94,363.23 44.94,368.02 43.08,371.48 44.94,378 47.33,385.86 50,391.09 50.53,396.27 50.53,398.89 48.4,403.06 
            52.12,405.02 53.46,410.25 52.92,414.6 51.06,419.81 54.25,422.32 57.71,425.78 67.03,442.81 72.88,453.19 74.75,459.58 
            79.81,466.76 85.39,473.42 93.11,481.14 97.11,487.52 101.9,492.05 109.61,510.68 118.4,517.87 128.78,523.72 133.04,526.65 
            137.83,534.63 145.81,542.89 149.63,546.61 157.26,552.2 163.38,555.39 169.23,556.99 171.1,560.45 178.02,560.45 178.9,564.44 
            177.49,568.17 176.95,571.63 180.32,576.16 188.66,576.16 195.05,577.49 207.56,579.62 221.67,580.95 236.84,580.95 246.95,580.95 
            254.4,577.75 265.32,567.11 274.72,558.06 282.35,549.01 286.61,545.55 291.67,545.01 296.19,542.09 305.24,538.89 311.9,537.3 
            317.88,536.76 329.73,534.63 338.51,532.24 347.03,531.71 353.95,527.18 361.4,526.92 366.63,526.65 370.45,526.12 374.71,521.33 
            379.5,520 382.96,521.59 387.75,523.99 387.75,527.45 389.08,530.11 393.87,526.12 399.46,519.73 404.78,516.54 406.91,510.41 
            407.71,505.09 406.12,497.64 405.32,491.52 401.32,490.19 400.79,485.66 400.26,481.94 396.53,477.41 401.59,471.82 407.45,463.04 
            410.64,458.25 410.37,453.19 408.87,446.54 414.1,443.08 419.69,440.41 420.94,434.65 422.35,425.78 425.01,422.32 431.67,422.05 
            433,426.57 436.37,430.12 439.92,430.66 445.77,434.65 451.1,432.7 453.76,428.7 458.02,424.98 462.27,419.81 463.87,413 
            467.07,412.2 468.83,404.48 469.86,397.66 475.58,395.17 483.03,389.09 486.23,391.09 489.33,392.33 492.35,392.33 494.75,395.17 
            497.94,396.27 503,400.4 513.64,386.94 521.72,392.33 526.42,386.3 533.34,378 528.02,375.74 534.67,371.21 543.45,368.82 
            547.71,366.87 545.32,358.97 538.4,362.43 535.73,362.43 533.87,355.78 532.27,350.72 529.08,345.13 528.02,337.68 528.02,329.69 
            530.94,324.9 536,320.64 537.86,315.32 538.13,308.13 543.72,304.41 548.78,298.82 553.83,297.64 557.56,294.03 564.75,293.5 
            567.14,288.17 574.06,288.7 578.85,284.45 584.97,284.18 590.56,283.38 596.15,290.04 598.55,293.23 601.21,288.44 602.27,284.18 
            605.2,284.18 609.19,286.58 615.05,291.37 613.98,294.56 610.79,297.64 610.79,300.95 613.98,306.8 695.25,197.5 	"/>
          <line class="district-boundary" x1="94.44" y1="347.61" x2="94.44" y2="337.55"/>
        </g>

        <g id="Desilting_Works_Finished">
          <polyline class="desilting-work-finished" points="463.87,395.88 455.09,393.7 444.97,389.84 437.65,386.79 427.81,384.39 418.23,381.06 413.7,378.84 
            412.68,378.18 408.87,378.84 	"/>
          <line class="desilting-work-finished" x1="472.6" y1="381.5" x2="465.07" y2="395.17"/>
          <polyline class="desilting-work-finished" points="210.67,345.56 204.81,341.4 195.05,336.61 190.97,333.69 185.29,331.56 182.01,329.54 177.22,331.02 
            174.56,332.53 171.81,336.35 172.96,344.2 	"/>
          <line class="desilting-work-finished" x1="304.51" y1="279.98" x2="327.56" y2="260.79"/>
        </g>

        <g id="Desilting_Works_Undertaken">
          <polyline class="desilting-work-undertaken" points="327.07,261.16 357.41,238.67 381.89,220.04 395.2,209.21 400.92,203.49 402.85,201.29 404.76,201.48 
            415.16,201.76 429.87,202.54 434.95,204.37 440.22,206.46 441.44,206.81 443.47,207.38 451.1,209.21 458.81,213.83 467.01,217.24 
            473.99,220.25 480.13,222.89 484.1,223.76 489.33,226.39 492.41,227.02 495.25,231.46 496.17,238.31 	"/>
          <polyline class="desilting-work-undertaken" points="294.95,386.3 291.4,373.88 299.39,366.42 307.37,352.58 311.63,347.79 321.21,344.07 329.73,341.94 
            337.18,340.87 342.5,345.66 351.55,349.92 355.28,344.07 361.67,344.07 366.63,344.07 373.38,339.81 373.38,331.29 373.38,321.18 
            371.25,313.19 371.25,306.8 366.63,306.8 361.13,306.8 355.81,306.8 349.96,303.61 319.08,286.58 313.76,281.25 295.66,278.77 
            273.39,279.98 266.85,277.62 	"/>
          <polyline class="desilting-work-undertaken" points="302.05,386.3 327.07,387.72 337.53,387.72 349.6,387.72 355.99,387.72 369.1,385.86 	"/>
          <polyline class="desilting-work-undertaken" points="371.25,306.8 375.51,300.06 387.75,297.64 393.25,288.35 396.09,282.67 396.09,277.7 402.65,272.03 
            408.87,270.61 414.54,270.61 424.83,264.93 431.22,257.83 442.93,261.16 452.52,262.05 460.32,266.35 463.87,261.16 467.07,257.83 
            473.99,254.86 477.71,253.93 484.1,247.68 487.65,241.86 491.91,238.31 496.17,238.31 503.97,233.34 510.01,228.38 519.59,222.34 
            525.27,216.31 530.94,210.63 	"/>
          <polyline class="desilting-work-undertaken" points="472.03,382.57 478.86,369.62 485.52,363.58 489.33,355.78 513.55,316.38 530.94,289.41 
            547.98,261.16 568.56,226.96 571.63,223.5 	"/>
          <polyline class="desilting-work-undertaken" points="304.51,279.98 283.24,296.16 265.14,311.06 248.18,323.84 228.59,334.84 218.3,339.81 	"/>
          <polyline class="desilting-work-undertaken" points="136.34,329.54 144.48,334.84 149.63,339.81 151.22,343.71 154.77,347.61 162.58,347.61 
            167.19,346.19 175.18,344.86 	"/>
          <polyline class="desilting-work-undertaken" points="178.37,399.26 186.73,399.2 190.99,402.22 195.6,399.2 199.15,399.2 202.7,401.86 	"/>
          <polyline class="desilting-work-undertaken" points="203.87,418.09 190.97,416.11 185.47,450.21 198.15,453.19 	"/>
        </g>

        <g id="Middle_Level_Drains">
          <polyline class="middle-level-drains" points="699.87,14.03 668.99,74.71 656.22,100.97 646.28,121.2 635.99,141.08 624.28,166.98 619.31,175.14 
            611.15,186.14 602.27,195.37 590.56,206.02 580.98,213.83 571.4,223.76 	"/>
          <polyline class="middle-level-drains" points="695.25,197.5 689.93,197.5 686.02,200.34 679.64,198.92 673.25,200.34 668.64,204.6 659.05,204.6 
            650.18,204.6 632.08,204.6 622.86,204.6 607.95,207.08 591.98,209.21 586.64,209.21 	"/>
          <polyline class="middle-level-drains" points="580.98,213.83 530.94,210.63 530.94,206.37 533.78,203.36 539.82,200.69 543.72,200.69 
            548.69,200.69 552.24,197.5 556.49,197.5 561.11,200.69 562.53,197.5 567.14,197.5 569.62,191.47 571.4,186.5 576.01,178.34 
            579.56,178.34 586.64,175.14 591.27,169.64 592.69,164.14 595.89,166.63 601.56,166.63 607.6,169.11 612.57,173.01 616.11,173.01 
            619.31,175.14 625.34,180.47 633.15,185.79 640.95,191.47 646.63,197.5 650.18,204.6 	"/>
          <polyline class="middle-level-drains" points="400.46,203.95 414.63,188.1 413.22,184.97 	"/>
          <polyline class="middle-level-drains" points="266.96,277.66 265.14,276.99 261.59,276.99 258.4,270.96 254.49,268.48 252.28,268.03 248.11,262.44 
            244.91,262.44 237.81,262.44 232.14,264.57 228.59,265.64 223.97,266.7 219.01,265.28 215.81,266.7 209.78,262.44 205.52,262.44 
            201.62,265.99 197.71,267.77 194.16,270.61 185.29,270.61 179.97,266.35 171.45,262.44 164,258.72 164,253.93 	"/>
          <polyline class="middle-level-drains" points="185.29,270.61 180.68,272.73 180.68,275.93 180.68,280.54 176.42,283.03 171.1,283.03 167.9,285.87 
            162.23,292.25 162.23,295.8 159.03,301.13 156.55,305.03 154.77,308.58 151.93,311.77 147.32,318.51 145.19,321.71 139.16,327.39 
            133.13,332 128.51,334.84 123.54,339.81 117.87,343.36 113.96,348.68 113.96,355.78 	"/>
          <polyline class="middle-level-drains" points="103.67,395.88 106.15,406.88 110.06,422.49 110.06,428.17 115.38,428.17 118,427.64 118.93,429.59 
            121.06,434.56 124.61,440.59 120.7,443.43 119.64,448.04 121.41,454.43 124.61,458.69 133.13,460.82 138.45,463.66 141.64,465.43 
            147.68,461.53 149.63,458.34 151.58,454.08 153.35,450.53 157.61,454.79 160.45,458.34 164,459.4 169.68,460.11 173.23,462.59 
            178.9,465.43 182.81,465.43 182.81,461.17 185.15,452.14 	"/>
          <polyline class="middle-level-drains" points="195.94,467.92 203.04,420.72 203.04,411.85 203.04,406.88 203.04,401.56 208.71,395.88 
            213.33,392.33 216.52,392.33 221.84,395.88 226.81,395.88 236.75,395.88 248.82,399.07 261.24,400.14 265.49,399.07 269.04,395.88 
            274.72,395.88 272.95,401.56 271.88,408.65 271.53,422.85 	"/>
          <polyline class="middle-level-drains" points="274.72,395.88 282.53,390.55 290.34,388.07 294.95,386.3 302.05,386.3 	"/>
          <line class="middle-level-drains" x1="408.87" y1="378.84" x2="368.46" y2="385.97"/>
          <line class="middle-level-drains" x1="484.1" y1="401.91" x2="463.01" y2="395.62"/>
          <polyline class="middle-level-drains" points="153.35,450.53 156.19,442.72 159.73,433.49 164,425.33 170.19,417.88 176.42,406.17 176.38,399.62 
            171.81,400.4 167.55,401.91 159.73,401.91 155.48,401.91 149.63,398.89 149.63,389.09 	"/>
          <polyline class="middle-level-drains" points="213.33,392.33 213.33,386.3 214.48,381.06 214.48,377.6 216.52,373.34 211.02,372.28 204.81,372.28 
            204.81,366.69 207.29,359.5 207.29,354.45 204.81,352.32 208.36,348.86 212.82,342.88 217.28,338.88 	"/>
        </g>

        <g id="Pumping_Stations">
          <circle class="pumping-station" cx="218.47" cy="340.15" r="7.41"/>
          <circle class="pumping-station" cx="698.8" cy="15.45" r="7.41"/>
        </g>

        <g id="Locks">
          <polygon class="lock" points="159.1,247.68 164.81,251.94 171.54,247.68 171.54,260.1 165.32,264.75 159.1,260.1 	"/>
          <polygon class="lock" points="247.28,260.49 252.99,264.75 259.71,260.49 259.71,272.91 253.49,277.56 247.28,272.91 	"/>
          <polygon class="lock" points="267.06,387.74 272.77,392 279.5,387.74 279.5,400.16 273.28,404.81 267.06,400.16 	"/>
          <polygon class="lock" points="477.88,394.53 483.59,398.79 490.32,394.53 490.32,406.95 484.1,411.6 477.88,406.95 	"/>
          <polygon class="lock" points="552.76,191.38 558.47,195.65 565.2,191.38 565.2,203.8 558.98,208.46 552.76,203.8 	"/>
          <polygon class="lock" points="687.61,187.19 693.32,191.45 700.05,187.19 700.05,199.61 693.83,204.26 687.61,199.61 	"/>
        </g>
      </svg>
      <div class="map-annotations">
        <span class="map-annotation" style="top: 21%; left: 16%;">
          Peterborough
        </span>
        <span class="map-annotation" style="top: 49%; left: 51%;">
          Chatteris
        </span>
        <span class="map-annotation line-up" style="top: 40%; left: 76.7%;">
          Downham Market
        </span>
        <span class="map-annotation line-up" style="top: 72%; left: 66.7%;">
          Haddenham
        </span>
      </div>
    </div>
    <div class="map-key">
      <header class="map-key-header">
        <h3>Map key</h3>
        <a href="#" class="clear-selection">
          Clear Selection
        </a>
      </header>

      <div class="map-key-items">

        <div class="map-key-item" data-key-item="middle-level-drains" data-map-toggle="Middle_Level_Drains">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-line"></span>
            </div>
            <div class="map-key-text">
              <span>Drains</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="map-key-item" data-key-item="desilting-work-undertaken" data-map-toggle="Desilting_Works_Undertaken">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-line"></span>
            </div>
            <div class="map-key-text">
              <span>Desilting works undertaken</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="map-key-item" data-key-item="desilting-work-finished" data-map-toggle="Desilting_Works_Finished">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-line"></span>
            </div>
            <div class="map-key-text">
              <span>Desilting works finished</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="map-key-item" data-key-item="pumping-station" data-map-toggle="Pumping_Stations">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-circle"></span>
            </div>
            <div class="map-key-text">
              <span>Pumping Stations</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="map-key-item" data-key-item="lock" data-map-toggle="Locks">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-svg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 400">
                  <polygon points="19.021501,12.050241 169.021501,-102.01843 169.021501,191.396664 19.021501,297.98157 -130.978499,191.396664 -130.978499,-102.01843 19.021501,12.050241" transform="translate(130.978499 102.01843)" stroke-width="0"/>
                </svg>
              </span>
            </div>
            <div class="map-key-text">
              <span>Locks</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="map-key-item" data-key-item="district-boundary" data-map-toggle="District_Boundary">
          <div class="map-key-item-link-container">
            <div class="map-key-icon">
              <span class="icon-boundary">
              </span>
            </div>
            <div class="map-key-text">
              <span>District Boundary</span>
            </div>
            <a href="#" class="key-item-link"></a>
          </div>
          <div class="map-key-item-content">
            <div class="image video-cover" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder.jpeg);">
              <span class="video-play">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
              </span>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis lorem eu elit ultricies lacinia eu eu augue.</p>

            <div class="events">
              <h4>Recent events</h4>

              <div class="event">
                <div class="event-date">
                  11th June
                </div>
                <div class="event-title">
                  <a href="#">Something happened here on this day today</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  5th June
                </div>
                <div class="event-title">
                  <a href="#">Another development for the drains in the area</a>
                </div>
              </div>

              <div class="event">
                <div class="event-date">
                  23rd May
                </div>
                <div class="event-title">
                  <a href="#">This is an example of an event</a>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
<script src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/bundle.js"></script>
<?php get_footer(); ?>