<?php
/*
 *
 * Jila Nikpay Functions
 *
 */

/*
 * Registering Post Types
 */
function jilanikpay_init() {
	// Films
	$labels = array(
		'name' => 'Films',
		'singular_name' => 'Film',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Film',
		'edit_item' => 'Edit Film',
		'new_item' => 'New Film',
		'view_item' => 'View Film',
		'search_items' => 'Search Films',
		'not_found' =>  'No films found',
		'not_found_in_trash' => 'No films found in Trash',
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => '',
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => '',
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'film', $args );
	
	// Photos
	$labels = array(
		'name' => 'Photos',
		'singular_name' => 'Photo',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Photo',
		'edit_item' => 'Edit Photo',
		'new_item' => 'New Photo',
		'view_item' => 'View Photo',
		'search_items' => 'Search Photos',
		'not_found' =>  'No photos found',
		'not_found_in_trash' => 'No photos found in Trash',
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => '',
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => '',
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'photo', $args );

	// Gallery Taxonomy
	$labels = array(
		'name' => 'Galleries',
		'singular_name' => 'Gallery',
		'search_items' => 'Search Galleries',
		'all_items' => 'All Galleries',
		'parent_item' => 'Parent Gallery',
		'parent_item_colon' => 'Parent Gallery:',
		'edit_item' => 'Edit Gallery', 
		'update_item' => 'Update Gallery',
		'add_new_item' => 'Add New Gallery',
		'new_item_name' => 'New Gallery Name',
		'menu_name' => 'Galleries'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'gallery' )
	);
	register_taxonomy( 'gallery', array( 'attachment', 'post', 'page' ), $args );
	register_taxonomy_for_object_type( 'gallery', 'attachment' );
	register_taxonomy_for_object_type( 'gallery', 'post' );
	register_taxonomy_for_object_type( 'gallery', 'page' );

	// Navigation Menu
	add_theme_support( 'menus' );
	register_nav_menu( 'primary', 'Primary Navigation Menu' );
}
add_action( 'init', 'jilanikpay_init' );

/**
 * Admin Theme Options Menu
 */
function jilanikpay_admin_menu() {
    add_theme_page( 'Jila Nikpay Theme Options', 'Theme Options', 'edit_theme_options', 'c404-theme-options', 'jilanikpay_theme_options' );
}
add_action( 'admin_menu', 'jilanikpay_admin_menu' );

/**
 * Theme Options Output
 */
function jilanikpay_theme_options() { ?>
	<div class="wrap">
		<h2>Theme Options</h2>
		<div id="theme-options-frame" class="metabox-holder">
			<section id="homeage-film" class="postbox"><?php 
				$film_options = get_option('jilanikpay_film'); ?>
				<div title="Click to Toggle" class="handlediv"></div>
				<h3 class="hndle"><span>Featured Film</span></h3>
				<div class="inside">
					<p>Select film to be displayed on front page.</p>
					<form action="<?php bloginfo('url'); ?>" method="get">
   						<?php wp_dropdown_pages(array(
							'selected'=> $film_options['featured_film'],
							'name' => 'featured_film',
							'show_option_none' => 'None',
							'class' => 'postform jilanikpay-dropdown',
							'post_type' => 'film')); ?>
   					</form>
				</div>
			</section>
            <section id="footer-options" class="postbox"><?php
			    $footer_options = get_option('jilanikpay_footer'); ?>
				<div title="Click to Toggle" class="handlediv"></div>
				<h3 class="hndle"><span>Footer Options</span></h3>
				<div class="inside">
					<p class="howto">Fill in contact information.</p>
					<form class="input-prepend">
                        <label for="copyright">Copyright:</label>
                        <input id="copyright" name="copyright" type="text" value="<?php echo esc_attr(stripcslashes($footer_options['copyright'])); ?>"/>
					</form>
				</div><!--/.inside-->
			</section><!--/#footer-options-->
        </div><!--/#theme-options-frame-->
	</div><!--/.wrap-->
	<div class="submit-wrap">
		<p class="submit">
			<input id="save-changes-btn" name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>">
		</p>
	</div><!--/.submit-wrap-->
	<script>
		jQuery(function($){
			//save all options
			$('#save-changes-btn').click(function(){
				$(this).val('Saving...');
				//get form values individually
				var values = {
					"jilanikpay_film" :{
                        "featured_film" : $("#featured_film option:selected").val(),
                    },
					"jilanikpay_footer" :{
                        "copyright" : $('#copyright').val()
                    }
				};
				var data = {
					action: 'jilanikpay_theme_options_ajax_action',
					options: values
				};
				$.post(ajaxurl, data, function( msg ) {
					if ( msg == 'reload' ) {
						location.reload();
					} else {
						$('#save-changes-btn').val( msg );
					}
				});
			});
		});
	</script>
<?php }

/**
 * Theme Options Save
 */
function jilanikpay_theme_options_ajax_action() {
    $return = 'Changes Saved';
    //update options
    foreach( $_POST['options'] as $key => $value ) :
        $changed = update_option( $key, $value );
        if ( $changed ) :
            $return = 'reload';
        endif;
    endforeach;
    echo $return;
    die();
}
add_action( 'wp_ajax_jilanikpay_theme_options_ajax_action', 'jilanikpay_theme_options_ajax_action' );

/*
 * Meta Boxes
 */

function jilanikpay_metabox() {                              
    add_meta_box( 'embed-metabox', 'Film Embed Code', 'embed_metabox', 'film', 'normal', 'high' );
    add_meta_box( 'gallery-metabox', 'Attached Gallery', 'gallery_metabox', 'photo', 'normal', 'high' );

}
add_action( 'add_meta_boxes', 'jilanikpay_metabox' );

function embed_metabox( $post ) {
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['film_embed'] ) ? $values['film_embed'][0] : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="film_embed"><p>Paste embed code for the film in the textbox below.</p></label>
        <textarea name="film_embed" id="film_embed" cols="62" rows="5" ><?php echo $selected; ?></textarea>
    </p>
    <?php   
}

function gallery_metabox ( $post ) { ?>
	<p><strong>Use this option to set a featured gallery.</strong></p>
	<?php wp_dropdown_categories( array(
			'taxonomy'=>'gallery',
			'selected'=> get_post_meta($post->ID, 'jilanikpay_gallery', true),
			'name' => 'jilanikpay_gallery',
			'show_option_none' => 'None',
			'class' => 'postform jilanikpay-dropdown',
			'hide_empty' => false) ); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".jilanikpay-dropdown").change(function(){
				if( $(this).val()!=-1 ) {
					$(this).siblings().each(function(){
						$(this).val(-1);
					});
				}
			});
		});
	</script>

<?php }

function metabox_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;

    $allowed = array( 
        'a' => array( 
            'href' => array() 
        )
    );
    
    if( isset( $_POST['film_embed'] ) )
        update_post_meta( $post_id, 'film_embed', $_POST['film_embed'] );

    if( isset($_POST['jilanikpay_gallery']) )
		update_post_meta($post_id, 'jilanikpay_gallery', $_POST['jilanikpay_gallery'] );

}
add_action( 'save_post', 'metabox_save' );