<?php 
/*
	Template Name: Strategic Journey & Projects
*/
get_header();
do_action( 'ava_builder_template_after_header' );
if( get_post_meta( get_the_ID(), 'header', true ) != 'no' )
  echo avia_title();
do_action( 'ava_after_main_title' );
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/style.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/timeline.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<?php 
    $banner_content = get_field('banner_content');
    $banner_image = get_field('banner_image');
?>

<?php if($banner_content || $banner_image) : ?>
    <div class="theme-block theme-block--banner theme-block--background" data-aos="fade-up">
        <?php if($banner_image) : ?>
            <div class="theme-block__background" style="background-image:url('<?php echo $banner_image; ?>'); ?>
        <?php endif; ?>
    ');"></div>
        <?php if($banner_content) : ?>
        <div class="theme-block__wrapper">
            <?php echo $banner_content; ?>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if( have_rows('timeline_entries') ): ?>
    <div class="theme-block theme-block--timeline">
    <div class="theme-block__wrapper">
        <div class="timeline">
            <div class="timeline__header">
                <?php $entryCountPoints = 0; ?>
                <?php while( have_rows('timeline_entries') ): the_row(); 
                    $date = get_sub_field('timeline_date');
                    $entryCountPoints++;
                    ?>
                    <div class="input <?php if($entryCountPoints === 1) echo 'active'; ?>">
                        <div class="input-ball"></div>
                        <span data-year="<?php echo $date; ?>"></span>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="timeline__main">
                <?php $entryCountContent = 0; ?>
                <?php while( have_rows('timeline_entries') ): the_row(); 
                    $content = get_sub_field('timeline_content');
                    $entryCountContent++;
                    ?>
                    <div data-count="<?php echo $entryCountContent; ?>" class="timeline__content <?php if($entryCountContent === 1) echo 'active'; ?>"><?php echo $content; ?></div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>




<script src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/bundle.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

AOS.init();

$(function(){
	var inputs = $('.input');
	var paras = $('.timeline__main').find('.timeline__content');
	inputs.click(function(){
		var t = $(this),
				ind = t.index(),
				matchedPara = paras.eq(ind);
		
		t.add(matchedPara).addClass('active');
		inputs.not(t).add(paras.not(matchedPara)).removeClass('active');
	});
});

</script>



<?php get_footer(); ?>