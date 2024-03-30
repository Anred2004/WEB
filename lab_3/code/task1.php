<?php
echo '<h1> Task №1 </h1>';
$str = 'ahb acb aeb aeeb adcb axeb';
preg_match_all('/a..b/', $str, $res);
echo '<h3> A) </h3>';
for ($i = 0; $i < sizeof($res[0]); $i++) {
    echo "<p>{$res[0][$i]}</p>";
}
echo '<h3> B) </h3>';
$str1 = 'a1b2c3';
$str1 = preg_replace_callback('/\d+/', function($match){
    return pow($match[0], 3);
}, $str1);
echo $str1;

