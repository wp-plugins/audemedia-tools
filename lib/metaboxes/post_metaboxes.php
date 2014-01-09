<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';

  $configpage = array(
    'id'             => 'aude_page_meta_box',  
    'title'          => 'Post Options', 
    'pages'          => array('post'),  
    'context'        => 'normal', 
    'priority'       => 'low',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_page_meta =  new AT_Meta_Box($configpage);
  

  //radio field
  $aude_page_meta->addSelect($prefix.'page_display',array('right-sidebar'=>'Right Sidebar','left-sidebar'=>'Left Sidebar','full-width'=>'Full Width'),array('name'=> 'Display Single Post', 'std'=> array('radionkey1')));
 
  $aude_page_meta->Finish();

}