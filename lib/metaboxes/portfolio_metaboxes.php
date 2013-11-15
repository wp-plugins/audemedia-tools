<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';
  
  
$configportfolio = array(
    'id'             => 'aude_portfolio_meta_box',  
    'title'          => 'Portfolio Details', 
    'pages'          => array('portfolio'),  
    'context'        => 'normal', 
    'priority'       => 'high',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_portfolio_meta =  new AT_Meta_Box($configportfolio);
  
  /*
   * Add fields to your meta box
   */
  
  //textarea field
  $aude_portfolio_meta->addTextarea($prefix.'portfolio_video',array('name'=> 'Video (just copy paste the embed code from Vimeo or Youtube)'));

  /*
  $portfolio_slider_images[] = $aude_portfolio_meta->addImage($prefix.'au_portfolio_slider_image_id',array('name'=> ''),true);
  $aude_portfolio_meta->addRepeaterBlock($prefix.'au_',array(
    'inline'   => false, 
    'name'     => 'Portfolio Item Images',
    'fields'   => $portfolio_slider_images, 
    'sortable' => true
  ));
     */

   //text field
  $aude_portfolio_meta->addText($prefix.'portfolio_link',array('name'=> 'Link '));
  //select field
  $aude_portfolio_meta->addSelect($prefix.'portfolio_display',array('the_image'=>'Only the Featured Image','the_video'=>'The Embedded Video','the_slider'=>'All uploaded images as Slider','all_images'=>'All uploaded images below each other'),array('name'=> 'Display Portfolio as', 'std'=> array('the_image')));
    //select field
  $aude_portfolio_meta->addSelect($prefix.'portfolio_layout',array('two-third'=>'2/3','big'=>'big'),array('name'=> 'Portfolio Layout', 'std'=> array('2/3')));


  $aude_portfolio_meta->Finish();
  
}