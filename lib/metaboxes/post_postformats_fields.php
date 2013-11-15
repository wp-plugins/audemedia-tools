<?php
//include the main class file
include_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  
  $prefix = '_';

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
  $aude_postformats_meta->addTextarea($prefix.'postformat_audio',array('name'=> 'Audio (just copy paste the embed code from Soundcloud or Mixcloud etc.)'));

   //textarea field
  $aude_postformats_meta->addTextarea($prefix.'postformat_quote',array('name'=> 'Quote (just place here the quote text)'));

  //text field
  $aude_postformats_meta->addText($prefix.'postformat_quote_cite',array('name'=> 'Cite (the source/author of quote)'));
 
  $aude_postformats_meta->Finish();
  
}