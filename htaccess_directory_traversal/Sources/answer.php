<!-- Run this file so that all directories will be entered recursively. -->
<!-- The main logic of that algorythm is to save unique array of Readme content. -->

<?php
$array = array();

function getReadMe($ru) {

  global $array;

  $t = file_get_contents($ru);
  $regex = '/<a href="(.+)">/';
  preg_match_all($regex, $t, $matches);
  $urls = $matches[1];

  foreach($urls as $url) {
    if ($url == "../")
      continue ;
    if ($url == "README") {
      $c = file_get_contents($ru.$url);
      $c = trim($c);
      if ( !in_array($c, $array) ) {
        print_r($ru.$url." => ".$c."\n");
        $array[$c] = $c;
      }
    } else {
      getReadMe($ru . $url);
    }
  }
}
getReadMe("http://10.111.1.21/.hidden/");
?>