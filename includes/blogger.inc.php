<?php

// blogger information
$bloggerURL = "http://www.blogger.com/feeds/730317028750485402/posts/default";
$bloggerXML = file_get_contents($bloggerURL);
$dom = new DOMDocument();
$dom->loadXML($bloggerXML);
$posts = $dom->getElementsByTagName("entry");

// parse posts
$blogData = array();
foreach ($posts as $post) {
	// last modified (2009-03-23T14:22:45.666-04:00)
	$nodes = $post->getElementsByTagName("updated");
	$node = $nodes->item(0)->nodeValue;
	list($date, $time, $tmp) = @split('[T.]', $node);
	$lastModified = date("D, M j, Y g:i A", strtotime("$date $time"));
	// title
	$nodes = $post->getElementsByTagName("title");
	$title = $nodes->item(0)->nodeValue;
	// content
	$nodes = $post->getElementsByTagName("content");
	$content = $nodes->item(0)->nodeValue;
	// compose album string
	$str  = "<strong class=\"blgHeader\">$title</strong><br />";
	$str .= "<span class=\"blgTime\">$lastModified</span><br /><br />";
	$str .= "<span class=\"blgCopy\">$content</span>";
	array_push($blogData, $str);
}

?>