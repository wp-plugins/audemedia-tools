<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';

  $configsubtitle = array(
    'id'             => 'aude_page_meta_box',  
    'title'          => 'Post Extra Fields', 
    'pages'          => array('page', 'portfolio', 'post', 'services', 'product'),  
    'context'        => 'normal', 
    'priority'       => 'low',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_subtitle_meta =  new AT_Meta_Box($configsubtitle);
  

  //textarea field
  $aude_subtitle_meta->addTextarea($prefix.'page_subtitle',array('name'=> 'Subtitle '));
 
  $aude_subtitle_meta->Finish();

  
     $configawesomeicon = array(
    'id'             => 'aude_awesomeicon_meta_box',  
    'title'          => 'Awesome Icon', 
    'pages'          => array('services'),  
    'context'        => 'side', 
    'priority'       => 'low',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_awesomeicon_meta =  new AT_Meta_Box($configawesomeicon);
  
  //text field
  $aude_awesomeicon_meta->addText($prefix.'awesomeicon_icon',array('name'=> 'Font Icon', 'desc'   => '<small>Find the Font Awesome icon <a href="http://fontawesome.io/icons/" target="_blank">here</a> <strong>and just copy/paste it</strong>.</small>'));
 
  $aude_awesomeicon_meta->Finish();
  
}