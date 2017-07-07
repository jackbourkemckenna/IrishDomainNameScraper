<?php

require 'simple_html_dom.php';

$html = file_get_html('http://www.irishindex.com/b/');

$first=array();

  foreach ( $html->find('table td a') as $a){
    echo $a."\r\n";
  }
$linkStrip = strip_tags($a);

$inputLink =  "http://".$linkStrip;

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$inputLink&key=AIzaSyAxVKt3jdA71y6l-5F4GezzjCe2cMz7Qsk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 912d5100-83e3-371d-abd2-750ba7b5e272"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$outPut;

if ($err) {

  echo "cURL Error #:" . $err;
} else {

   $jsonData = json_decode($response);
   $data =  $jsonData->ruleGroups->SPEED->score;
   $intData =(int)$data;

   if($data<=50){
     echo "Website is below score 50 on desktop";
   }else {
     echo "<br>"."Webstie is good it scored ".$data." on desktop --> ".$inputLink;

   }

}
