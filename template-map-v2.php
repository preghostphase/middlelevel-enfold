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
    <header class="map-sidebar__header" style="margin-bottom: 0;">
        <h2>Interactive Map</h2>
        <p>Take a look at what we are doing in your area by selecting an option in the sidebar and clicking on the map to view more information.</p>
    </header>
    
    <div class="map-sidebar__content">
        <div class="map-sidebar__actions">
        <button class="map-sidebar__button" data-load-mlc>MLC Info</button> 
        <button class="map-sidebar__button" data-load-idb>IDB Info</button>    
        </div>
        
        <div class="map-sidebar__key">
          <h3>Key</h3>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker"></div>
            <span>Catchment Area</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--river"></div>
            <span>River</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--drain"></div>
            <span>Drain</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--desilting-started"></div>
            <span>Desilting started</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--desilting-finished"></div>
            <span>Desilting finished</span>
          </div>
          <div class="map-sidebar__key-item">
            <div class="map-sidebar__key-marker map-sidebar__key-marker--bank-raising"></div>
            <span>Bank Raising</span>
          </div>
        </div>
    </div>

  </aside>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBI2uB1A1p231NrNhOZEXa--BAjhQoK5c"></script>
<script type="module" src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/map.js"></script>
<?php if( get_field('catchment_area') ): ?>
<script>
const catchmentAreaData = "<?php the_field('catchment_area'); ?>";
</script>
<?php endif; ?>
<?php if( get_field('mlc_info_data') ): ?>
<script>
const mlcInfoData = "<?php the_field('mlc_info_data'); ?>";
</script>
<?php endif; ?>
<?php if( get_field('idb_info_data') ): ?>
<script>
const idbInfoData = "<?php the_field('idb_info_data'); ?>";
</script>
<?php endif; ?>
<?php get_footer(); ?>