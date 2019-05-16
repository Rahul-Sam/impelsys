<?php
include('simple_html_dom.php');
$base = 'https://journals.sagepub.com/home/VRT';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

$html_base = new simple_html_dom();

$html_base->load($str);

foreach($html_base->find('a') as $element) {
 if(strpos($element->href, "http://www.sagepub.com/journals/Journal202702#submission-guidelines"))
       echo "URL : ".$element->href. '<br>';
}

$html_base->clear(); 
unset($html_base);

?>