<?php 
/*
	Template Name: Bank Raising Project
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

<div class="theme-block theme-block--roadmap">
    <div class="theme-block__wrapper">
        <div class="roadmap">
            <div class="roadmap__side">
                <div class="roadmap__side-content">
                    <?php
                        $roadmapTitle = get_field('roadmap_title');
                        $roadmapDescription = get_field('roadmap_description');
                        $roadmapButtonText = get_field('roadmap_button_text');
                        $roadmapButtonLink = get_field('roadmap_button_link');
                    ?>
                    <?php if($roadmapTitle) : ?>
                      <h2><?php echo $roadmapTitle; ?></h2>
                    <?php endif; ?>
                    <?php if($roadmapDescription) : ?>
                       <?php echo $roadmapDescription; ?>
                    <?php endif; ?>
                    <?php if($roadmapButtonText && $roadmapButtonLink) : ?>
                        <a class="theme-button" target="_blank" href="<?php echo $roadmapButtonLink; ?>"><?php echo $roadmapButtonText; ?></a>
                    <?php endif; ?>
                </div>
               
                
            </div>
            <div class="roadmap__main">
                <div class="roadmap__main-background">
                    <img alt="" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"/>
                </div>


                <?php if( have_rows('roadmap_item') ): ?>
           
                    <?php while( have_rows('roadmap_item') ): the_row(); 
                        $label = get_sub_field('roadmap_item_label');
                        $subLabel = get_sub_field('roadmap_item_sub_label');
                        $description = get_sub_field('roadmap_item_description');
                        $image = get_sub_field('roadmap_item_image');
                        $progress = get_sub_field('roadmap_item_progress_stage');
                        $columnStart = get_sub_field('start_column');
                        $columnEnd = get_sub_field('end_column');
                        $fullWidth = get_sub_field('full_width');
                        $colour = get_sub_field('colour');
                    ?>

                    <?php if($columnStart) : ?>
                        <div class="roadmap__main-column">
                    <?php endif; ?>

                    <div data-aos="fade-up" class="roadmap__main-item forest-green line-right <?php echo $progress; ?> <?php if($fullWidth) echo 'roadmap__main-item--full'; ?>">
                        <div class="roadmap__main-item-image">
                            <span class="roadmap__main-item-progress"></span>
                            <img alt="" src="<?php echo $image; ?>"/>
                        </div>
                        <?php if($label || $subLabel) : ?>
                            <div class="roadmap__main-item-text" style="background-color: <?php echo $colour; ?>;">
                                <?php if($label) : ?>
                                    <h4 class="roadmap__main-item-text-title"><?php echo $label; ?></h4>
                                <?php endif; ?>
                                <?php if($subLabel) : ?>
                                    <p><?php echo $subLabel; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="roadmap__main-item-modal">
                            <?php if($description) : ?>
                                <?php echo $description; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($columnEnd) : ?>
                        </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
             
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="roadmap-modal hidden">
    <div class="roadmap-modal__wrapper">
        <div class="roadmap-modal__content">
            <button class="roadmap-modal__close"><span class="sr-only">Close</span><svg xmlns="http://www.w3.org/2000/svg" width="20.286" height="20.274"><path fill="#fff" d="M19.12 0a1.141 1.141 0 0 0-.8.351l-8.18 8.178L1.96.351A1.141 1.141 0 1 0 .346 1.965l8.18 8.18-8.18 8.184A1.141 1.141 0 1 0 1.96 19.94l8.18-8.181 8.18 8.18a1.141 1.141 0 1 0 1.614-1.61l-8.181-8.18 8.18-8.18A1.141 1.141 0 0 0 19.12 0Z"/></svg></button>
            <div class="roadmap-modal__content-banner">
                <div class="roadmap-modal__content-image">

                </div>
                <h2 class="roadmap-modal__content-title"></h2>
            </div>
            <div class="roadmap-modal__content-text">

            </div>
        </div>
    </div>
</div>





<script src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/bundle.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

AOS.init();

let dataPoints = document.getElementsByClassName('roadmap__main-item');
let modal = document.querySelector('.roadmap-modal');
let modalText = document.querySelector('.roadmap-modal__content-text');
let modalImage = document.querySelector('.roadmap-modal__content-image');
let modalClose = document.querySelector('.roadmap-modal__close');
let modalTitle = document.querySelector('.roadmap-modal__content-title');

for(let i = 0; i < dataPoints.length; i++){
    dataPoints[i].addEventListener('click', function(){
        modal.classList.remove('hidden');

        let dataPointContent = dataPoints[i].querySelector('.roadmap__main-item-modal').innerHTML;
        console.log(dataPointContent);

        let dataPointImage = dataPoints[i].querySelector('.roadmap__main-item-image img').outerHTML;

        let dataPointTitle = dataPoints[i].querySelector('.roadmap__main-item-text-title').innerHTML;

        modalText.innerHTML = dataPointContent;
        modalImage.innerHTML = dataPointImage;
        modalTitle.innerHTML = dataPointTitle;
    });
}

modalClose.addEventListener('click', function(){
    modal.classList.add('hidden');
    modalText.innerHTML = '';
    modalImage.innerHTML = '';
    modalTitle.innerHTML = '';
});




</script>



<?php get_footer(); ?>