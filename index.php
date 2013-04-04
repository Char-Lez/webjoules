<?php

print "!";

$text="this #is# a big #sample_fork# ok?";

print "!";
$result=array();

print "!";
preg_match_all("/#(.*?)#/i", $text, $result);

print "count=".count($result);
print "<HR>";

print_r($result);


?>