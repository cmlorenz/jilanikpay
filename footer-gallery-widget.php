<?php
/**
 * Adds Footer_Gallery_Widget widget.
 * - Displays a list of bloggers, student and/or staff
 */
class Footer_Gallery_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		//widget actual processes
		parent::__construct(
			'footer_gallery_widget', //ID
			'Gallery Widget', //name
			array( 'description' => 'A list of recent posts', 'text_domain' ) //args
		);
	}

	/**
	 * Front-end display of widget.
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		//outputs the content of the widget
		extract( $args );
		$title = $instance['title']!='' ? $instance['title'] : '';
		$page = $instance['page'];
 		$numPosts = $instance['numPosts']!='' ? $instance['numPosts'] : 5; ?>
		<section id="meet-bloggers-side-widget" class="post-group"><?php 
			if ($title != '') {
				if (!empty( $page ) && $page != -1) { ?>
					<h3><a href="<?php echo get_permalink($page); ?>"><?php echo $title ?></a></h3><?php
				} else { ?>
					<h3><?php echo $title ?></h3><?php
				}
			} else {
				if (!empty( $page ) && $page != -1) { ?>
					<h3><a href="<?php echo get_permalink($page); ?>"><?php echo get_the_title($page); ?></a></h3><?php
				}
			}
			$items = new WP_query( array(
				'post_type'	=>	'post',
				'post_status'	=>	'publish',
				'order'	=>	'DESC',
				'posts_per_page'	=>	$numPosts
			) ); ?>
			<ul><?php
			while( $items->have_posts() ) : $items->the_post();?>
				<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li><?php
			endwhile;
			wp_reset_postdata(); ?>
			</ul>
		</section><?php
		//echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		//outputs the options form on admin
		if( $instance ) { $title = esc_attr($instance['title']); } else { $title = ''; }
		if( $instance ) { $page = esc_attr($instance['page']); } else { $page = ''; }	    	
		if( $instance ) { $numPosts = esc_attr($instance['numPosts']); } else { $numPosts = ''; }	    	
	   
		if ($title!='') { ?>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="hidden" value="<?php echo esc_attr( $title ); ?>" /><?php
		} ?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php echo 'Title:'; ?></label> 
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" placeholder="Optional" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'page' ); ?>"><?php echo 'Link to Page: ' ?></label><?php
			wp_dropdown_pages( array(
				'selected' => $instance['page'],
				'name' => $this->get_field_name( 'page' ),
				'show_option_none' => 'None',
				'class' => 'postform suol-dropdown',
				'hide_empty' => false
			) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('numPosts'); ?>"><?php _e('Number Posts:', 'text_domain'); ?></label>
			<input id="<?php echo $this->get_field_id('numPosts'); ?>" name="<?php echo $this->get_field_name('numPosts'); ?>" type="text" value="<?php echo esc_attr( $numPosts ); ?>" placeholder="5" />
		</p>
<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		//processes widget options to be saved
		$instance = array();
		$instance['numPosts'] = $new_instance['numPosts'];	
		$instance['page'] = $new_instance['page'];
		$instance['title'] = $new_instance['title'];
		return $instance;
	}

} //class Blogger_Side_Widget