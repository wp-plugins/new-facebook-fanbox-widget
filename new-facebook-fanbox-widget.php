<?php
/*
* Plugin Name: New  Facebook FanBox  Widget
* Plugin URI: http://odrasoft.com/odra-facebook-fanwidget/
* Description: The Page Plugin lets you easily embed and promote any Facebook Page on your website. Just like on Facebook, your visitors can like and share the Page without having to leave your site.you can use shortcode on page or post using [fbox].
* Version: 1.0 
* Author: swadeshswain
* Author URI: http://www.odrasoft.com/
* License: GPL2
*/



function odra_new(){

	echo '<div id="fb-root"></div>';

	echo "<script>(function(d, s, id) {

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) return;

	js = d.createElement(s); js.id = id;

	js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3';

	fjs.parentNode.insertBefore(js, fjs);

	}(document, 'script', 'facebook-jssdk'));</script>";

}

add_action('wp_head', 'odra_new');

/**
 * Adds ODRA_SOCIAL widget.
 */

class ODRA_SOCIAL extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {

		parent::__construct(

			'ODRA_SOCIAL', // Base ID

			__( 'New Facebook Fan Page Widget ', 'ODRA' ), // Name

			array( 'description' => __( 'New Facebook FanBox Widget', 'ODRA' ), ) // Args

		);

	}

	/**
	 * Front-end display of widget.
	 *
	 * @see ODRA_SOCIAL::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];

		}

		// Check values

		if ( ! empty( $instance['ODRA_facebook_page_url'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_page_url'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ODRA_facebook_widget_width'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_widget_width'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ODRA_facebook_widget_height'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_widget_height'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ODRA_facebook_user_faces'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_user_faces'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ODRA_facebook_page_cover'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_page_cover'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ODRA_facebook_user_posts'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ODRA_facebook_user_posts'] ). $args['after_title'];

		}

		echo __( '<div class="fb-page" data-href="'.$instance['ODRA_facebook_page_url'].'" data-width="'.$instance['ODRA_facebook_widget_width'].'" data-hide-cover="'.$instance['ODRA_facebook_page_cover'].'" data-show-facepile="'.$instance['ODRA_facebook_user_faces'].'" data-show-posts="'.$instance['ODRA_facebook_user_posts'].'"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$instance['ODRA_facebook_page_url'].'"><a href="'.$instance['ODRA_facebook_page_url'].'">Facebook</a></blockquote></div></div>', 'ODRA' );

		echo $args['after_widget'];

	}

	

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Find us on Facebook', 'ODRA' );
		$ODRA_facebook_page_url = ! empty( $instance['ODRA_facebook_page_url'] ) ? $instance['ODRA_facebook_page_url'] : __( 'https://www.facebook.com/odrasoft', 'ODRA' );
		$ODRA_facebook_widget_width = ! empty( $instance['ODRA_facebook_widget_width'] ) ? $instance['ODRA_facebook_widget_width'] : __( '340', 'ODRA' );
		$ODRA_facebook_widget_height = ! empty( $instance['ODRA_facebook_widget_height'] ) ? $instance['ODRA_facebook_widget_height'] : __( '500', 'ODRA' );
		$ODRA_facebook_user_faces = ! empty( $instance['ODRA_facebook_user_faces'] ) ? $instance['ODRA_facebook_user_faces'] : __( 'true', 'ODRA' );
		$ODRA_facebook_page_cover = ! empty( $instance['ODRA_facebook_page_cover'] ) ? $instance['ODRA_facebook_page_cover'] : __( 'false', 'ODRA' );
		$ODRA_facebook_user_posts = ! empty( $instance['ODRA_facebook_user_posts'] ) ? $instance['ODRA_facebook_user_posts'] : __( 'false', 'ODRA' );
	?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label> <br /> 
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_page_url' ); ?>"><strong><?php _e( 'Facebook Page Url:' ); ?></strong></label><br /> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ODRA_facebook_page_url' ); ?>" name="<?php echo $this->get_field_name( 'ODRA_facebook_page_url' ); ?>" type="text" value="<?php echo esc_attr( $ODRA_facebook_page_url ); ?>">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_widget_width' ); ?>"><strong><?php _e( 'Width:' ); ?></strong></label> <br />
		<input class="widefat" id="<?php echo $this->get_field_id( 'ODRA_facebook_widget_width' ); ?>" name="<?php echo $this->get_field_name( 'ODRA_facebook_widget_width' ); ?>" type="text" value="<?php echo esc_attr( $ODRA_facebook_widget_width ); ?>" placeholder="The pixel width of the plugin. Min. is 280 & Max. is 500">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_widget_height' ); ?>"><strong><?php _e( 'Height:' ); ?></strong></label><br /> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ODRA_facebook_widget_height' ); ?>" name="<?php echo $this->get_field_name( 'ODRA_facebook_widget_height' ); ?>" type="text" value="<?php echo esc_attr( $ODRA_facebook_widget_height ); ?>" placeholder="The maximum pixel height of the plugin. Min. is 130">
	</p>

	<p>
		<?php $ODRA_faces_setting = esc_attr( $ODRA_facebook_user_faces ); ?>
		<label><strong><?php _e( "Show Friend's Faces" ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_user_faces' ); ?>-true" name="<?php echo $this->get_field_name( 'ODRA_facebook_user_faces' ); ?>" value="true" <?php if($ODRA_faces_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?>/>
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_user_faces' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_user_faces' ); ?>-false" name="<?php echo $this->get_field_name( 'ODRA_facebook_user_faces' ); ?>" value="false" <?php if($ODRA_faces_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_user_faces' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ODRA_cover_setting = esc_attr( $ODRA_facebook_page_cover ); ?>
		<label><strong><?php _e( 'Hide Cover Photo' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_page_cover' ); ?>-true" name="<?php echo $this->get_field_name( 'ODRA_facebook_page_cover' ); ?>" value="true" <?php if($ODRA_cover_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_page_cover' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_page_cover' ); ?>-false" name="<?php echo $this->get_field_name( 'ODRA_facebook_page_cover' ); ?>" value="false" <?php if($ODRA_cover_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_page_cover' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ODRA_posts_setting = esc_attr( $ODRA_facebook_user_posts ); ?>
		<label><strong><?php _e( 'Show Page Posts ' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_user_posts' ); ?>-true" name="<?php echo $this->get_field_name( 'ODRA_facebook_user_posts' ); ?>" value="true" <?php if($ODRA_posts_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_user_posts' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ODRA_facebook_user_posts' ); ?>-false" name="<?php echo $this->get_field_name( 'ODRA_facebook_user_posts' ); ?>" value="false" <?php if($ODRA_posts_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ODRA_facebook_user_posts' ); ?>-false">No</label>
	</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see ODRA_SOCIAL::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['ODRA_facebook_page_url'] = ( ! empty( $new_instance['ODRA_facebook_page_url'] ) ) ? strip_tags( $new_instance['ODRA_facebook_page_url'] ) : '';

		$instance['ODRA_facebook_widget_width'] = ( ! empty( $new_instance['ODRA_facebook_widget_width'] ) ) ? strip_tags( $new_instance['ODRA_facebook_widget_width'] ) : '';

		$instance['ODRA_facebook_widget_height'] = ( ! empty( $new_instance['ODRA_facebook_widget_height'] ) ) ? strip_tags( $new_instance['ODRA_facebook_widget_height'] ) : '';

		$instance['ODRA_facebook_user_faces'] = ( ! empty( $new_instance['ODRA_facebook_user_faces'] ) ) ? strip_tags( $new_instance['ODRA_facebook_user_faces'] ) : '';

		$instance['ODRA_facebook_page_cover'] = ( ! empty( $new_instance['ODRA_facebook_page_cover'] ) ) ? strip_tags( $new_instance['ODRA_facebook_page_cover'] ) : '';

		$instance['ODRA_facebook_user_posts'] = ( ! empty( $new_instance['ODRA_facebook_user_posts'] ) ) ? strip_tags( $new_instance['ODRA_facebook_user_posts'] ) : '';

		return $instance;

	}

} 

function register_ODRA_SOCIAL() {

    register_widget( 'ODRA_SOCIAL' );
}

add_action( 'widgets_init', 'register_ODRA_SOCIAL' );

// widget  Shortcode  starts here
function ODRA_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'page' 			=> 'https://facebook.com/odrasoft',
			'width' 		=> '340',
			'height' 		=> '500',
			'hide_cover' 	=> 'false',
			'show_faces' 	=> 'true',
			'show_posts' 	=> 'false',
		), $atts )
	);
	$output = '<div class="fb-page" data-href="'.$page.'" data-width="'.$width.'" data-hide-cover="'.$hide_cover.'" data-show-facepile="'.$show_faces.'" data-show-posts="'.$show_posts.'"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$page.'"><a href="'.$page.'">Facebook</a></blockquote></div></div>';
	
	return $output;
}
add_shortcode( 'fbox', 'ODRA_shortcode' );
?>