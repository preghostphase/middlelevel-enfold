<?php
/*
    Template Name: Interactive Map V2
*/
get_header();
do_action('ava_builder_template_after_header');
if(get_post_meta(get_the_ID(), 'header', true) != 'no') {
    echo avia_title();
}
do_action('ava_after_main_title');
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/map.css">

<div class="map-container">
  <div id="map" class="interactive-map"></div>

  <aside class="map-sidebar">
    <button class="map-sidebar__toggle" aria-label="Hide sidebar" data-sidebar-toggle>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
        <path d="M15 4v16" />
        <path d="M9 10l2 2l-2 2" />
      </svg>
    </button>
    <header class="map-sidebar__header" style="margin-bottom: 0;">
        <h1>Interactive Map</h1>
        <p>Take a look at what we are doing in your area by selecting an option in the sidebar and clicking on the map to view more information.</p>
    </header>
    
    <div class="map-sidebar__content">
        <div class="map-sidebar__actions">
          <label class="map-sidebar__switch" data-load-bankraising>
            <input type="checkbox">
            <span class="map-sidebar__switch-slider"></span>
          </label> <span class="map-sidebar__switch-label">Display Bank Raising</span>
          <br>
          <label class="map-sidebar__switch" data-load-desilting>
            <input type="checkbox">
            <span class="map-sidebar__switch-slider"></span>
          </label> <span class="map-sidebar__switch-label">Display De-Silting</span>
        </div>
        
        <div class="map-sidebar__key">
          <h2>Key</h2>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker"></div>
            <span>Catchment Area</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--drain"></div>
            <span>Middle Level Watercourse</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--desilting-started"></div>
            <span>De-Silting Started</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--desilting-finished"></div>
            <span>De-Silting Completed</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--bank-raising"></div>
            <span>Bank Raising Required</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--bank-raising--complete"></div>
            <span>Bank Raising Completed</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--complete"></div>
            <span>All Works Complete</span>
          </div>
        </div>
    </div>

  </aside>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvzxAID0YATXLYGrNMnIQXsJBvSkz8ZjM"></script>
<script type="module" src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/bundle.js"></script>
<?php if(get_field('catchment_area')): ?>
<script>
const catchmentAreaData = "<?php the_field('catchment_area'); ?>";
</script>
<?php endif; ?>
<?php if(get_field('main_drains')): ?>
<script>
const mainDrainsData = "<?php the_field('main_drains'); ?>";
</script>
<?php endif; ?>
<?php if(get_field('mlc_info_data')): ?>
<script>
// const mlcInfoData = "<?php the_field('mlc_info_data'); ?>";
const mlcInfoData = "<?php echo get_stylesheet_directory_uri() ?>/src/json/testdata.geojson"
</script>
<?php endif; ?>

<?php get_footer(); ?>