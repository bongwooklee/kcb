<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Boston Korean School</title>
	<meta http-equiv=Content-Type content="text/html; charset=ks_c_5601-1987">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="bks.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="lightbox/lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="lightbox/lightbox.js"></script>
</head>
<?php include("top.html"); ?>
<!-- Main page starts here -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<!-- Call right side menu -->
	<?php include("r_menu.html"); ?>
	<td width="100%" valign="top"><!-- Actual content goes here -->
		<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
		<!--DWLayoutTable-->
		<tr>
			<td width="100%" valign="top">
				<p>&nbsp;</p>
				<p class="mainbodyheader">Photo Gallery</p>
				<div style="padding-left:16px; padding-right:16px;">
<?php

// Picasa information
$picasaURL = "http://picasaweb.google.com/data/feed/api";
$userID    = "bostonkoreanschool";

// display variables
$albumsPerRow = 4;
$pictsPerRow  = 4;

// get album ID
$albumID = @trim($_GET["aid"]);

if (strlen($albumID) == 0) {
	// get albums
	$ch = curl_init("$picasaURL/user/$userID");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$albumsXML = curl_exec($ch);
	curl_close($ch);
	$dom = new DOMDocument();
	$dom->loadXML($albumsXML);
	$albums = $dom->getElementsByTagName("entry");

	// parse albums
	$albumData = array();
	foreach ($albums as $album) {
		// album ID
		$nodes = $album->getElementsByTagName("id");
		$node = $nodes->item(0)->nodeValue;
		$regs = array();
		eregi("/albumid/(.+)$", $node, $regs);
		$albumID = $regs[1];
		// last modified
		$nodes = $album->getElementsByTagName("updated");
		$node = $nodes->item(0)->nodeValue;
		list($date, $time, $tmp) = split('[T.]', $node);
		$lastModified = date("M j, Y", strtotime("$date $time"));
		// number of photos in the album
		$nodes = $album->getElementsByTagName("numphotos");
		$numPhotos = $nodes->item(0)->nodeValue;
		// album title
		$nodes = $album->getElementsByTagName("title");
		$title = $nodes->item(0)->nodeValue;
		// thumbnail images
		$nodes = $album->getElementsByTagName("thumbnail");
		$node = $nodes->item(0);
		$thumb  = '<img src="'. $node->getAttribute("url") .'"';
		$thumb .= ' width="'. $node->getAttribute("width") .'"';
		$thumb .= ' height="'. $node->getAttribute("height") .'" border="0" />';
		// compose album string
		$str  = '<a href="'. $_SERVER['PHP_SELF'] ."?aid=$albumID\">$thumb</a><br />";
		$str .= "$title<br />";
		$str .= "$lastModified<br />";
		$str .= "Photos: $numPhotos<br />";
		array_push($albumData, $str);
	}

	// display albums
	$numAlbums = count($albumData);
	$numRows = intval($numAlbums / $albumsPerRow);
	if ($numAlbums % $albumsPerRow > 0) {
		$numRows++;
	}
	$cellCount = 0;
	echo '<table border="0" cellspacing="0" cellpadding="4">', "\n";
	for ($i = 0; $i < $albumsPerRow*$numRows; $i++) {
		if ($i % $albumsPerRow == 0) {
			echo "<tr>\n";
		}
		if ($i < $numAlbums) {
			echo "<td>", $albumData[$i], "</td>\n";
		} else {
			echo "<td>&nbsp;</td>\n";
		}
		if ($i % $albumsPerRow == $albumsPerRow - 1) {
			echo "</tr>\n";
		}
	}
	echo "</table>\n";
} else {
	// get album information
	$ch = curl_init("$picasaURL/user/$userID/albumid/$albumID");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$picturesXML = curl_exec($ch);
	curl_close($ch);
	if ($picturesXML != "No album found.") {
		$dom = new DOMDocument();
		$dom->loadXML($picturesXML);

		// get album title
		$nodes = $dom->getElementsByTagName("title");
		$title = $nodes->item(0)->nodeValue;
		echo '<p><a href="', $_SERVER["PHP_SELF"], '">Albums</a> &raquo; ', "$title</p>\n";

		// get album pictures
		$pictures = $dom->getElementsByTagName("entry");

		// parse pictures
		$pictureData = array();
		foreach ($pictures as $picture) {
			// URL for the real picture
			$nodes = $picture->getElementsByTagName("link");
			$node = $nodes->item(1);
			$image = $node->getAttribute("href");
			// medium thumbnail
			$nodes = $picture->getElementsByTagName("group");
			$nodes = $nodes->item(0)->getElementsByTagName("thumbnail");
			$thumb  = '<img src="'. $nodes->item(1)->getAttribute("url") .'"';
			$thumb .= ' width="'. $nodes->item(1)->getAttribute("width") .'"';
			$thumb .= ' height="'. $nodes->item(1)->getAttribute("height") .'" border="0" />';
			// compose album string
			$str = '<a href="'. $image .'" target="imgWin">'. "$thumb</a>";
			array_push($pictureData, $str);
		}

		// display pictures
		$numPictures = count($pictureData);
		$numRows = intval($numPictures / $pictsPerRow);
		if ($numPictures % $pictsPerRow > 0) {
			$numRows++;
		}
		$cellCount = 0;
		echo '<table border="0" cellspacing="0" cellpadding="4">', "\n";
		for ($i = 0; $i < $pictsPerRow*$numRows; $i++) {
			if ($i % $pictsPerRow == 0) {
				echo "<tr>\n";
			}
			if ($i < $numPictures) {
				echo "<td>", $pictureData[$i], "</td>\n";
			} else {
				echo "<td>&nbsp;</td>\n";
			}
			if ($i % $pictsPerRow == $pictsPerRow - 1) {
				echo "</tr>\n";
			}
		}
		echo "</table>\n";
	}
}

?>
				</div>
				<br>
			</td>
		</tr>
		</table>
		<!-- Content ends -->
	</td>
</tr>
</table>
<?php include("bottom.html"); ?>