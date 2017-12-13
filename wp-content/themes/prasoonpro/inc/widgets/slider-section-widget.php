<?php
/**
 * Slider section widget.
 */


if( ! class_exists('Prasoon_Slider_Section_Widget')) :

class Prasoon_Slider_Section_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'pr_slider_widget', // Base ID
			__( 'Prasoon: Slider Section', 'prasoonpro' ), // Name
			array( 'description' => __( 'Adds slider to homepage section.', 'prasoonpro' ), ) // Args
		);

		$this->defaults = array(            
            'number'=>'4',
        );      
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		extract( wp_parse_args( $instance, $this->defaults ) ); 

		$number   =  ! empty( $instance['number'] ) ? $instance['number'] : $this->defaults['number'];      

		?>

		<?php if("slider" === get_theme_mod( 'slide_option1_radio' )){
			?>
				<div class="slider-wrapper">
		            <!--Main slider-->
		            <div class="slider flexslider">
		                <ul class="slides">
		                	<?php
				              for( $i=1; $i<=$number; $i++ ) { 

				                $image    = ! empty( $instance['image'.$i] ) ? $instance['image'.$i] : '';
				                $heading    = ! empty( $instance['heading'.$i] ) ? $instance['heading'.$i] : '';
				                $subheading    = ! empty( $instance['subheading'.$i] ) ? $instance['subheading'.$i] : '';
				                $button1    = ! empty( $instance['button1'.$i] ) ? $instance['button1'.$i] : '';
				                $button1url    = ! empty( $instance['button1url'.$i] ) ? $instance['button1url'.$i] : '';
				                $button2    = ! empty( $instance['button2'.$i] ) ? $instance['button2'.$i] : '';
				                $button2url    = ! empty( $instance['button2url'.$i] ) ? $instance['button2url'.$i] : '';

				                ?>

				                <?php if(!empty($image)){ ?>
				                	<li>
				                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(basename($image)); ?>" />
				                        <div class="caption">
				                            <h1><?php echo $heading; ?></h1>
				                            <p><?php echo $subheading; ?></p>
				                            <div class="slider-buttons">
				                            	<?php 
				                            		if(!empty($button1)) {
				                            			if (false !== strpos(esc_url($button1url), 'youtube') || false !== strpos(esc_url($button1url), 'vimeo')) {
						                            		?>
						                                		<a class="video-popup-link" href="<?php echo esc_url($button1url); ?>"><button type="button" class="btn btn-default trans"><?php echo $button1; ?><i class="fa fa-angle-double-right"></i></button></a>
						                                	<?php 
						                                }
						                                else{
						                                	?>
						                                		<a href="<?php echo esc_url($button1url); ?>"><button type="button" class="btn btn-default trans"><?php echo $button1; ?><i class="fa fa-angle-double-right"></i></button></a>
						                                	<?php
						                                }
				                                	} 
				                                ?>
				                                <?php 
				                            		if(!empty($button2)) {
				                            			if (false !== strpos(esc_url($button2url), 'youtube') || false !== strpos(esc_url($button2url), 'vimeo')) {
						                            		?>
						                                		<a class="video-popup-link" href="<?php echo esc_url($button2url); ?>"><button type="button" class="btn btn-default trans"><?php echo $button2; ?><i class="fa fa-angle-double-right"></i></button></a>
						                                	<?php 
						                                }
						                                else{
						                                	?>
						                                		<a href="<?php echo esc_url($button2url); ?>"><button type="button" class="btn btn-default trans"><?php echo $button2; ?><i class="fa fa-angle-double-right"></i></button></a>
						                                	<?php
						                                }
				                                	} 
				                                ?>
				                                
				                            </div>
				                        </div>
				                        <?php if("yes" === get_theme_mod( 'home_scroll_down' )){
								          ?><div class="scroll-down">
								              <a data-scroll href="<?php echo esc_html(get_theme_mod( 'scroll_button_url' )); ?>">
								                <span></span>
								                <span></span>
								                <span></span>
								              </a>
								            </div>
								          <?php
								        }
								        ?>
				                    </li>  <?php                  	
				                }
				                
				              } ?>                    
		                </ul>
		            </div>
		            <!--End main slider-->
		        </div>  
			<?php
		}

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	extract( wp_parse_args( $instance, $this->defaults ) );
	$number   =  ! empty( $instance['number'] ) ? $instance['number'] : $this->defaults['number'];    
	?>

	<p>
        <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Slides:','prasoonpro'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
    </p>

    <div class="widget-block">
		<?php for( $i = 1; $i <=$number; $i++ ) { ?>
			<div class="widget-block-box">
				<div class="widget-block-head"><a href="#"><?php _e('Slide', 'prasoonpro');echo $i; ?></a><span class="widget-plus">+</span><span class="widget-minus">-</span></div>
				<div class="widget-block-content">

		            <?php 

		                $image    = ! empty( $instance['image'.$i] ) ? $instance['image'.$i] : '';
		                $heading    = ! empty( $instance['heading'.$i] ) ? $instance['heading'.$i] : '';
		                $subheading    = ! empty( $instance['subheading'.$i] ) ? $instance['subheading'.$i] : '';
		                $button1    = ! empty( $instance['button1'.$i] ) ? $instance['button1'.$i] : '';
		                $button1url    = ! empty( $instance['button1url'.$i] ) ? $instance['button1url'.$i] : '';
		                $button2    = ! empty( $instance['button2'.$i] ) ? $instance['button2'.$i] : '';
		                $button2url    = ! empty( $instance['button2url'.$i] ) ? $instance['button2url'.$i] : '';
		            ?>		

		            <div>
		                <label for="<?php echo $this->get_field_id( 'image'.$i ); ?>"><?php _e('Image URL', 'prasoonpro'); ?>:</label>
		                <input type="text" id="<?php echo $this->get_field_id( 'image'.$i ); ?>" name="<?php echo $this->get_field_name( 'image'.$i ); ?>" value="<?php echo esc_url($image); ?>" class="pr-img-field"/>
		                <a href="#" class="pr-img-select-image-btn button"><?php _e('Select image', 'prasoonpro'); ?></a>
		    		</div>				

					<p> 
						<label for="<?php echo $this->get_field_id( 'heading'.$i ); ?>"><?php _e( 'Slider Heading', 'prasoonpro' ); ?>:</label>
						<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'heading'.$i ); ?>" name="<?php echo $this->get_field_name( 'heading'.$i ); ?>" value="<?php echo $heading; ?>" />
					</p>
		            <p>
		              <label for="<?php echo $this->get_field_id( 'subheading'.$i ); ?>"><?php _e( 'Slider Subheading', 'prasoonpro' ); ?>:</label>
		              <textarea class="widefat" rows="8" cols="12" id="<?php echo $this->get_field_id( 'subheading'.$i ); ?>" name="<?php echo $this->get_field_name( 'subheading'.$i ); ?>"><?php echo $subheading; ?></textarea>
								</p>
		            <p>
		              <label for="<?php echo $this->get_field_id( 'button1'.$i ); ?>"><?php _e( 'Button1 Name', 'prasoonpro' ); ?>:</label>
		              <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button1'.$i ); ?>" name="<?php echo $this->get_field_name( 'button1'.$i ); ?>" value="<?php echo $button1; ?>" />
								</p>
		            <p>
		              <label for="<?php echo $this->get_field_id( 'button1url'.$i ); ?>"><?php _e( 'Button1 Url', 'prasoonpro' ); ?>:</label>
		              <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button1url'.$i ); ?>" name="<?php echo $this->get_field_name( 'button1url'.$i ); ?>" value="<?php echo esc_url( $button1url ); ?>" />
								</p>
		            <p>
		              <label for="<?php echo $this->get_field_id( 'button2'.$i ); ?>"><?php _e( 'Button2 Name', 'prasoonpro' ); ?>:</label>
		              <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button2'.$i ); ?>" name="<?php echo $this->get_field_name( 'button2'.$i ); ?>" value="<?php echo $button2; ?>" />
		            </p>
		            <p>
		              <label for="<?php echo $this->get_field_id( 'button2url'.$i ); ?>"><?php _e( 'Button2 Url', 'prasoonpro' ); ?>:</label>
		              <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button2url'.$i ); ?>" name="<?php echo $this->get_field_name( 'button2url'.$i ); ?>" value="<?php echo esc_url( $button2url ); ?>" />
		            </p>
				</div>
			</div>
		<?php } ?>
	</div>
    <?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;    
		$instance[ 'number'] = absint( $new_instance['number'] );

	    for( $i=1; $i<=$instance[ 'number']; $i++ ) {			
	    	
	    	$instance[ 'image'.$i ] = strip_tags( $new_instance['image'.$i] );
			$instance[ 'heading'.$i ] = wp_filter_post_kses($new_instance['heading'.$i]);
		    $instance[ 'subheading'.$i ] = wp_filter_post_kses($new_instance['subheading'.$i]);
		    $instance[ 'button1'.$i ] = wp_filter_post_kses($new_instance['button1'.$i]);
		    $instance[ 'button1url'.$i ] = esc_url($new_instance['button1url'.$i]);
		    $instance[ 'button2'.$i ] = wp_filter_post_kses($new_instance['button2'.$i]);
		    $instance[ 'button2url'.$i ] = esc_url($new_instance['button2url'.$i]);
		}

    return $instance;
	}


}
endif;


if( ! function_exists('register_prasoon_slider_section_widget')) :
// register widget
function register_prasoon_slider_section_widget() {
    register_widget( 'Prasoon_Slider_Section_Widget' );
}
endif;


add_action( 'widgets_init', 'register_prasoon_slider_section_widget' );