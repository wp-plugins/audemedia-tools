<?php
// load widget

add_action( 'widgets_init', 'aude_latestprojects_widget' );


// Register widget

function aude_latestprojects_widget() {
	if(current_theme_supports('audemedia_portfolio_cpt')) {
	register_widget( 'aude_latestproject_widget' );
}
}


// Widget class
class aude_latestproject_widget extends WP_Widget {

// Widget setup
	
	function aude_latestproject_widget() {
		/* Widget settings. */
		$widget_tws = array( 'classname' => 'aude_latestproject_widget', 'description' => __('A widget for add images of latestprojects', 'aude_theme') );

		/* Widget control settings. */
		$control_tws = array( 'width' => 300, 'height' => 350, 'id_base' => 'aude_latestproject_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'aude_latestproject_widget', __('Audemedia ++ Latest Projects','aude_theme'), $widget_tws, $control_tws );
	}

/* ---------------------------------------------------------------------*/
/* Display widget
/* -------------------------------------------------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['projecttitle'] );
		$projectnumber = $instance['projectnumber'];
		$projectcolumns = $instance['projectcolumns'];
		$projectorder = $instance['projectorder'];
		$projectorderby =  $instance['projectorderby'];
		
	
echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;	
?>	
<div class="row">
<div class="small-12 columns">
<ul class="portfoliowidget large-block-grid-<?php echo $projectcolumns;?> small-block-grid-1">
<?php
$latestprojectsloop = array( 
    'post_type' =>  'portfolio',
    'posts_per_page' =>  $projectnumber,
    'order' =>  $projectorder,
    'orderby' =>  $projectorderby,
    );

$wp_query = new WP_Query($latestprojectsloop); 
while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>

<li>
<?php if ( has_post_thumbnail() ) { ?>
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio-small'); ?></a>
  <?php } ?>
</li>
 <?php
endwhile;
wp_reset_query();  
?> 
</ul>
</div>
</div>
		          
    <?php 

    echo $after_widget;		
	}

/* ---------------------------------------------------------------------*/
/* Update Widget
/* -------------------------------------------------------------------- */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['projecttitle'] = strip_tags( $new_instance['projecttitle'] );
		$instance['projectnumber'] = strip_tags( $new_instance['projectnumber'] );
		$instance['projectcolumns'] = strip_tags( $new_instance['projectcolumns'] );
		$instance['projectorder'] = strip_tags( $new_instance['projectorder'] );
		$instance['projectorderby'] = strip_tags( $new_instance['projectorderby'] );
		
		/* No need to strip tags for.. */

		return $instance;
	}
	
/* ---------------------------------------------------------------------*/
/* Widget setting
/* -------------------------------------------------------------------- */
 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'projecttitle' => '',
		'projectnumber' => '3',
		'projectcolumns' => '2',
		'projectorder' => 'DESC',
		'projectorderby' => 'date',   
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'projecttitle' ); ?>"><?php _e('Header Title:', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'projecttitle' ); ?>" name="<?php echo $this->get_field_name( 'projecttitle' ); ?>" value="<?php echo esc_attr($instance['projecttitle']); ?>" />
		</p>

		<p>
			<label style="display:block;" for="<?php echo $this->get_field_id( 'projectnumber' ); ?>"><?php _e('Number of latestprojects to Display:', 'aude_theme') ?></label>
	
	  <select id="<?php echo $this->get_field_id('projectnumber'); ?>" name="<?php echo $this->get_field_name('projectnumber'); ?>" type="text">
        <option value="1" <?php selected($instance['projectnumber'], '1'); ?>>1</option>
        <option value="2" <?php selected($instance['projectnumber'], '2'); ?>>2</option>
        <option value="3" <?php selected($instance['projectnumber'], '3'); ?>>3</option>
        <option value="4" <?php selected($instance['projectnumber'], '4'); ?>>4</option>
        <option value="5" <?php selected($instance['projectnumber'], '5'); ?>>5</option>
        <option value="6" <?php selected($instance['projectnumber'], '6'); ?>>6</option>
        <option value="7" <?php selected($instance['projectnumber'], '7'); ?>>7</option>
        <option value="8" <?php selected($instance['projectnumber'], '8'); ?>>8</option>
        <option value="9" <?php selected($instance['projectnumber'], '9'); ?>>9</option>
    </select>	 
		</p>

		<p>
			<label style="display:block;" for="<?php echo $this->get_field_id( 'projectcolumns' ); ?>"><?php _e('In How Many Columns:', 'aude_theme') ?></label>
	
	  <select id="<?php echo $this->get_field_id('projectcolumns'); ?>" name="<?php echo $this->get_field_name('projectcolumns'); ?>" type="text">
        <option value="1" <?php selected($instance['projectcolumns'], '1'); ?>>1</option>
        <option value="2" <?php selected($instance['projectcolumns'], '2'); ?>>2</option>
        <option value="3" <?php selected($instance['projectcolumns'], '3'); ?>>3</option>
    </select>	 
		</p>


		<p>
			<label style="display:block;" for="<?php echo $this->get_field_id( 'projectorder' ); ?>"><?php _e('Order:', 'aude_theme') ?></label>
	
	  <select id="<?php echo $this->get_field_id('projectorder'); ?>" name="<?php echo $this->get_field_name('projectorder'); ?>" type="text">
        <option value="DESC" <?php selected($instance['projectorder'], 'DESC'); ?>>DESC</option>
        <option value="ASC" <?php selected($instance['projectorder'], 'ASC'); ?>>ASC</option>
    </select>	 
		</p>
		
		<p>
			<label style="display:block;" for="<?php echo $this->get_field_id( 'projectorderby' ); ?>"><?php _e('Order By:', 'aude_theme') ?></label>
	
	  <select id="<?php echo $this->get_field_id('projectorderby'); ?>" name="<?php echo $this->get_field_name('projectorderby'); ?>" type="text">
        <option value="date" <?php selected($instance['projectorderby'], 'date'); ?>>date</option>
        <option value="ID" <?php selected($instance['projectorderby'], 'ID'); ?>>ID</option>
        <option value="title" <?php selected($instance['projectorderby'], 'title'); ?>>title</option>
        <option value="rand" <?php selected($instance['projectorderby'], 'rand'); ?>>rand</option>
    </select>	 
		</p>
		
		
	<?php
	}
}


?>