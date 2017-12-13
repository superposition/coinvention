<?php
/**
 * Plugin widgets.
 *
 * @package counterup
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Business_Page_Counterup extends WP_Widget {
	/**
	* Declares the Business_Page_Counterup class.
	*
	*/	

	public function __construct() {

		global $control_ops;

		$widget_ops = array(						
					'classname' 	=> 'counterup', 
					'description' 	=> __( 'A widget that displays counter up numbers.', 'business-page') 
					);

		parent::__construct('Business_Page_Counterup', __('Business Page: Counter Up', 'business-page'), $widget_ops, $control_ops);			
	}

	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){			

		$count_one		= !empty( $instance['count_one'] ) ? $instance['count_one'] : '';
		$count_text_one	= !empty( $instance['count_text_one'] ) ? $instance['count_text_one'] : '';
		$text_one		= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';
		$icon_one		= !empty( $instance['icon_one'] ) ? $instance['icon_one'] : ''; 

		$count_two		= !empty( $instance['count_two'] ) ? $instance['count_two'] : '';
		$count_text_two	= !empty( $instance['count_text_two'] ) ? $instance['count_text_two'] : '';
		$text_two		= !empty( $instance['text_two'] ) ? $instance['text_two'] : '';
		$icon_two		= !empty( $instance['icon_two'] ) ? $instance['icon_two'] : ''; 

		$count_three 	= !empty( $instance['count_three'] ) ? $instance['count_three'] : '';
		$count_text_three= !empty( $instance['count_text_three'] ) ? $instance['count_text_three'] : '';
		$text_three 	= !empty( $instance['text_three'] ) ? $instance['text_three'] : ''; 
		$icon_three 	= !empty( $instance['icon_three'] ) ? $instance['icon_three'] : ''; 

		$count_four		= !empty( $instance['count_four'] ) ? $instance['count_four'] : '';
		$count_text_four= !empty( $instance['count_text_four'] ) ? $instance['count_text_four'] : '';
		$text_four		= !empty( $instance['text_four'] ) ? $instance['text_four'] : '';
		$icon_four		= !empty( $instance['icon_four'] ) ? $instance['icon_four'] : ''; 
		?>
		<div class="counter-widget">
			<div class="custom-col-3">
				<div class="counter-item">
					<span class="counter-icon">
						<i class="<?php echo esc_attr($icon_one);?>"></i>
					</span>
					<span class="start-symbol">
						<?php if(!empty($count_one)):?>
							<span class="start-count"><?php echo absint($count_one);?></span>
							<?php echo esc_html($count_text_one);?>
						<?php endif;?>
					</span>					
					<span class="counter-name"><?php echo esc_html($text_one)?></span>
				</div>
			</div>

			<div class="custom-col-3">
				<div class="counter-item">
					<span class="counter-icon">
						<i class="<?php echo esc_attr($icon_two);?>"></i>
					</span>					
					<span class="start-symbol">
						<?php if(!empty($count_two)):?>
							<span class="start-count"><?php echo absint($count_two);?></span>
							<?php echo esc_html($count_text_two);?>
						<?php endif;?>
					</span>	
					<span class="counter-name"><?php echo esc_html($text_two)?></span>
				</div>
			</div>

			<div class="custom-col-3">
				<div class="counter-item">
					<span class="counter-icon">
						<i class="<?php echo esc_attr($icon_three);?>"></i>
					</span>		
					<span class="start-symbol">
						<?php if(!empty($count_three)):?>
							<span class="start-count"><?php echo absint($count_three);?></span>
							<?php echo esc_html($count_text_three);?>
						<?php endif;?>
					</span>	
					<span class="counter-name"><?php echo esc_html($text_three)?></span>
				</div>
			</div>
			<div class="custom-col-3">
				<div class="counter-item">
					<span class="counter-icon">
						<i class="<?php echo esc_attr($icon_four);?>"></i>
					</span>					
					<span class="start-symbol">
						<?php if(!empty($count_four)):?>
							<span class="start-count"><?php echo absint($count_four);?></span>
							<?php echo esc_html($count_text_four);?>
						<?php endif;?>
					</span>	
					<span class="counter-name"><?php echo esc_html($text_four)?></span>
				</div>
			</div>
		</div>  

		<?php	
	
	}	

	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){	

		$instance = wp_parse_args( (array) $instance,
						array(							
							'count_one'			=> '',
							'count_text_one'	=> '',
							'text_one' 			=> '',
							'icon_one' 			=> '', 
							'count_two'			=> '',
							'count_text_two'	=> '',
							'text_two' 			=> '',
							'icon_two' 			=> '',
							'count_three'		=> '',
							'count_text_three'	=> '',
							'text_three' 		=> '',
							'icon_three' 		=> '',
							'count_four'		=> '',
							'count_text_four'	=> '',
							'text_four' 		=> '',
							'icon_four' 		=> '',								
						) 
					);
	

		$count_one		= !empty( $instance['count_one'] ) ? $instance['count_one'] : '';
		$count_text_one	= !empty( $instance['count_text_one'] ) ? $instance['count_text_one'] : '';
		$text_one		= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';
		$icon_one		= !empty( $instance['icon_one'] ) ? $instance['icon_one'] : '';

		$count_two		= !empty( $instance['count_two'] ) ? $instance['count_two'] : '';
		$count_text_two	= !empty( $instance['count_text_two'] ) ? $instance['count_text_two'] : '';
		$text_two		= !empty( $instance['text_two'] ) ? $instance['text_two'] : '';
		$icon_two		= !empty( $instance['icon_two'] ) ? $instance['icon_two'] : ''; 

		$count_three 	= !empty( $instance['count_three'] ) ? $instance['count_three'] : '';
		$count_text_three= !empty( $instance['count_text_three'] ) ? $instance['count_text_three'] : '';
		$text_three 	= !empty( $instance['text_three'] ) ? $instance['text_three'] : '';
		$icon_three 	= !empty( $instance['icon_three'] ) ? $instance['icon_three'] : ''; 

		$count_four		= !empty( $instance['count_four'] ) ? $instance['count_four'] : '';
		$count_text_four= !empty( $instance['count_text_four'] ) ? $instance['count_text_four'] : '';
		$text_four		= !empty( $instance['text_four'] ) ? $instance['text_four'] : ''; 
		$icon_four		= !empty( $instance['icon_four'] ) ? $instance['icon_four'] : ''; 	
		
		# Output the options ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_one') ); ?>">
				<?php esc_html_e('Count One:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_one') ); ?>" type="number" value="<?php echo absint( $count_one ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_text_one') ); ?>">
				<?php esc_html_e('Symbol Text[eg: + %] :', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_text_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_text_one') ); ?>" type="text" value="<?php echo esc_attr( $count_text_one ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>">
				<?php esc_html_e('Text One:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>" type="text" value="<?php echo esc_attr( $text_one ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('icon_one') ); ?>">
				<?php esc_html_e('FA Icon One:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_one') ); ?>" type="text" value="<?php echo esc_attr( $icon_one ); ?>" placeholder="fa fa-tasks" />		
		</p>

		<hr></hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_two') ); ?>">
				<?php esc_html_e('Count Two:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_two') ); ?>" type="number" value="<?php echo absint( $count_two ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_text_two') ); ?>">
				<?php esc_html_e('Symbol Text[eg: + %] :', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_text_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_text_two') ); ?>" type="text" value="<?php echo esc_attr( $count_text_two ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>">
				<?php esc_html_e('Text Two:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>" type="text" value="<?php echo esc_attr( $text_two ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('icon_two') ); ?>">
				<?php esc_html_e('FA Icon Two:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_two') ); ?>" type="text" value="<?php echo esc_attr( $icon_two ); ?>" placeholder="fa fa-adjust" />		
		</p>

		<hr></hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_three') ); ?>">
				<?php esc_html_e('Count Three:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_three') ); ?>" type="number" value="<?php echo absint( $count_three ); ?>" />
		</p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_text_three') ); ?>">
				<?php esc_html_e('Symbol Text[eg: + %] :', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_text_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_text_three') ); ?>" type="text" value="<?php echo esc_attr( $count_text_three ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>">
				<?php esc_html_e('Text Three:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>" type="text" value="<?php echo esc_attr( $text_three ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('icon_three') ); ?>">
				<?php esc_html_e('FA Icon Three:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_three') ); ?>" type="text" value="<?php echo esc_attr( $icon_three ); ?>" placeholder="fa fa-clock-o" />		
		</p>

		<hr></hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_four') ); ?>">
				<?php esc_html_e('Count Four:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_four') ); ?>" type="number" value="<?php echo absint( $count_four ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('count_text_four') ); ?>">
				<?php esc_html_e('Symbol Text[eg: + %] :', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count_text_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count_text_four') ); ?>" type="text" value="<?php echo esc_attr( $count_text_four ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>">
				<?php esc_html_e('Text Four:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>" type="text" value="<?php echo esc_attr( $text_four ); ?>" />		
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_name('icon_four') ); ?>">
				<?php esc_html_e('FA Icon Four:', 'business-page'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_four') ); ?>" type="text" value="<?php echo esc_attr( $icon_four ); ?>" placeholder="fa fa-user-plus" />		
		</p>

		<?php		

	} //end of form

	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){

		$instance 					= $old_instance;
	
		$instance['count_one'] 		= absint( $new_instance['count_one'] );

		$instance['text_one'] 		= strip_tags(stripslashes($new_instance['text_one']));

		$instance['count_text_one'] = strip_tags(stripslashes($new_instance['count_text_one']));

		$instance['icon_one'] 		= strip_tags(stripslashes($new_instance['icon_one']));

		$instance['count_two'] 		= absint( $new_instance['count_two'] );

		$instance['count_text_two'] = strip_tags(stripslashes($new_instance['count_text_two']));

		$instance['text_two'] 		= strip_tags(stripslashes($new_instance['text_two']));

		$instance['icon_two'] 		= strip_tags(stripslashes($new_instance['icon_two']));

		$instance['count_three'] 	= absint( $new_instance['count_three'] );

		$instance['count_text_three'] = strip_tags(stripslashes($new_instance['count_text_three']));

		$instance['text_three'] 	= strip_tags(stripslashes($new_instance['text_three']));

		$instance['icon_three'] 	= strip_tags(stripslashes($new_instance['icon_three']));

		$instance['count_four'] 	= absint( $new_instance['count_four'] );

		$instance['count_text_four'] = strip_tags(stripslashes($new_instance['count_text_four']));

		$instance['text_four'] 		= strip_tags(stripslashes($new_instance['text_four']));

		$instance['icon_four'] 		= strip_tags(stripslashes($new_instance['icon_four']));

		return $instance;
	}

}// END class

/**
* Register  widget.
*
* Calls 'widgets_init' action after widget has been registered.
*/
function business_page_counterup_init() {

	register_widget('Business_Page_Counterup');

}	

add_action('widgets_init', 'business_page_counterup_init');
?>