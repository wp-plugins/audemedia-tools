<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';
  
  $config = array(
    'id'             => 'aude_testimonials_meta_box',  
    'title'          => 'Testimonial Fields', 
    'pages'          => array('testimonials'), 
    'context'        => 'normal', 
    'priority'       => 'high',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_testimonials_meta =  new AT_Meta_Box($config);
  
  /*
   * Add fields to your meta box
   */

   //text field
  $aude_testimonials_meta->addText($prefix.'testimonials_position',array('name'=> 'Position '));
  //text field
  $aude_testimonials_meta->addText($prefix.'testimonials_company',array('name'=> 'Company '));
  //text field
  $aude_testimonials_meta->addText($prefix.'testimonials_link',array('name'=> 'Url '));

 
  $aude_testimonials_meta->Finish();

}