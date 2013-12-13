<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';
  
  $config = array(
    'id'             => 'aude_slider_meta_box',  
    'title'          => 'Slider Fields', 
    'pages'          => array('slider'), 
    'context'        => 'normal', 
    'priority'       => 'high',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_slider_meta =  new AT_Meta_Box($config);
  
  /*
   * Add fields to your meta box
   */

   //text field
$aude_slider_meta->addText($prefix.'slider_subtitle',array('name'=> 'Subtitle '));
  //text field
$aude_slider_meta->addText($prefix.'slider_button_text',array('name'=> 'Button Text '));
  //text field
$aude_slider_meta->addText($prefix.'slider_button_link',array('name'=> 'Link '));
 
  $aude_slider_meta->Finish();

}