<?php

/*
 * CHild theme functions file
 */

add_theme_support('avia_template_builder_custom_css');

// Single Testimonial
function middlelevel_board_select() {
$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => 'is_board_page_select',
	'meta_value' => '1',
	'authors' => '',
	'child_of' => 802,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
);
$pages = get_pages($args);


	$current_page_id = get_the_ID();
    
    $output =  '<div class="board-select">';
    $output .= '<h3>Internal Drainage Boards</h3>';
    $output .= '<select onchange="if (this.options[this.selectedIndex].value != 0) {document.location.href=this.options[this.selectedIndex].value;}">';
    $output .= '<option value="0">[Select Internal Drainage Board]</option>';
    foreach ( $pages as $page ) {
    	$selected = $page->ID ==  $current_page_id ? 'selected' : '';
	  	$output .= '<option value="' . get_page_link( $page->ID ) . '" ' . $selected . '>';
		$output .= $page->post_title;
		$output .= '</option>';
	}
    $output .= '</select>';
    $output .= '</div>';

    return $output;

}
add_shortcode( 'middlelevel_board_select', 'middlelevel_board_select' );

// Page Theme Meta Box
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'is_board_page', 'Page Options', 'cd_meta_box_cb', 'page', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
$values = get_post_custom( $post->ID );
$selected = isset( $values['is_board_page_select'] ) ? esc_attr( $values['is_board_page_select'][0] ) : '”';
    ?>

    <p>
        <label for="page_theme_select">Is Drainage Board Page?</label>
        <select name="is_board_page_select" id="is_board_page_select">
        	<option value="0" <?php selected( $selected, '0' ); ?>>No</option>
            <option value="1" <?php selected( $selected, '1' ); ?>>Yes</option>
        </select>
    </p>
    <?php
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
  if( isset( $_POST['is_board_page_select'] ) )
  update_post_meta( $post_id, 'is_board_page_select', esc_attr( $_POST['is_board_page_select'] ) );
}
