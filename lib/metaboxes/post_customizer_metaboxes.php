<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';

  $configpage = array(
    'id'             => 'aude_page_meta_box',  
    'title'          => 'Post Styler', 
    'pages'          => array('page', 'portfolio', 'post', 'services'),  
    'context'        => 'normal', 
    'priority'       => 'low',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_page_meta =  new AT_Meta_Box($configpage);
  

  // Color field
  $aude_page_meta->addColor($prefix.'page_bg_color',array('name'=> 'Background Color '));
  
  //Image field
  $aude_page_meta->addImage($prefix.'page_bg_image',array('name'=> 'Upload Background Image '));

  //radio field
  $aude_page_meta->addSelect($prefix.'page_bg_image_repeat',array('horizontal'=>'Horizontal','vertical'=>'Vertical','both'=>'Both','none'=>'None'),array('name'=> 'Image Background Repeat', 'std'=> array('radionkey1')));
  
  //radio field
  $aude_page_meta->addSelect($prefix.'page_bg_image_position',array('top left'=>'top left','top center'=>'top center','top right'=>'top right','center left'=>'center left','center center'=>'center center','center right'=>'center right','bottom left'=>'bottom left','bottom center'=>'bottom center','bottom right'=>'bottom right'),array('name'=> 'Image Background Position', 'std'=> array('radionkey1')));

   //textarea field
  $aude_page_meta->addTextarea($prefix.'page_subtitle',array('name'=> 'Subtitle '));
 
  $aude_page_meta->Finish();

  $configpostformats = array(
    'id'             => 'aude_postformats_meta_box',  
    'title'          => 'Post Formats fields', 
    'pages'          => array('post'),  
    'context'        => 'normal', 
    'priority'       => 'high',   
    'fields'         => array(), 
    'local_images'   => false,  
    'use_with_theme' => false 
  );
  
  $aude_postformats_meta =  new AT_Meta_Box($configpostformats);
  

   //textarea field
  $aude_postformats_meta->addTextarea($prefix.'postformat_video',array('name'=> 'Video (just copy paste the embed code from Vimeo or Youtube)'));

   //textarea field
  $aude_postformats_meta->addTextarea($prefix.'postformat_audio',array('name'=> 'Audio (just copy paste the embed code from Soundcloud or Mixcloud. If you need self-hosted audio just upload it and paste the full url)'));

   //textarea field
  $aude_postformats_meta->addTextarea($prefix.'postformat_quote',array('name'=> 'Quote (just place here the quote text)'));

  //text field
  $aude_postformats_meta->addText($prefix.'postformat_quote_cite',array('name'=> 'Cite (the source/author of quote)'));
 
  $aude_postformats_meta->Finish();

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