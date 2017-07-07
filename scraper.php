<?php

// This is a test file for loop testing 
session_start();
require 'simple_html_dom.php';

$html = file_get_html('http://www.irishindex.com/b/');

$first=array();

  foreach ( $html->find('table td a') as $a){
    echo $a."\r\n";
  }

?>
