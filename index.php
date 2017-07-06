<?php include("header.html"); ?>
<?php include("top.html"); ?>
<!-- Main page starts here -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<!-- Call right side menu -->
		<?php include("r_menu.html"); ?>
		<!-- Actual content goes here -->
		<td width="100%" valign="top"><table width="100%%" border="0" cellspacing="0" cellpadding="0">
				<!--DWLayoutTable-->
				<tr>
					<td width="765">
						<p>&nbsp;</p>
						<div style="padding-left:16px; padding-right:16px;">
<style type="text/css">
.blgHeader, .blgTime, .blgCopy {
	color: #003399;
}
.blgCopy {
	font-weight: bold;
}
</style>
<?php

// load and parse blogger data
global $blogData;
include_once 'includes/blogger.inc.php';

// display the latest post
if (count($blogData) > 0) {
	$post = array_shift($blogData);
	$post = preg_replace("/<span class=\"blgTime\">.+?<\/span><br \/>/i", "", $post);
	echo "<p>$post</p>\n";
}

// random image
$files = array();
$path = dirname(__FILE__) ."/images/home";
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            array_push($files, $file);
        }
    }
    closedir($handle);
}

if (count($files) > 0) {
	shuffle($files);
	echo '<p><img src="images/home/', array_shift($files), '" border="0"></p>';
}

?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<p>&nbsp;</p>
						<p align="center"><font face="Arial, Helvetica, sans-serif"><strong>&#48372;&#49828;&#53668; &#54620;&#44397;&#54617;&#44368;&#45716; 1988&#45380; &#44060;&#44368;&#54620; &#51060;&#47000; &#49548;&#49688;&#51221;&#50896; &#54617;&#44553;&#44284; &#50864;&#49688;&#54620; &#44368;&#49324;&#51652;&#51012; &#48148;&#53461;&#51004;&#47196;<br>
							&#54620;&#44397;&#50669;&#49324; &#48143; &#54620;&#44397;&#50612; &#44368;&#50977;&#51012; &#54644;&#50724;&#44256; &#51080;&#49845;&#45768;&#45796;.</strong></font></p>
						<p class="mainbody">The Boston Korean School was founded with the purpose of providing
							Korean-American students with the opportunity to learn the Korean
							language and culture. Through the comprehensive curriculum, students
							will enhance their knowledge of Korean history, culture, and language
							with a solid sense of self-identity as Korean-Americans. To serve
							this purpose, the school offers a variety of extracurricular activities
							aligned with language education.</p>
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td height="206" valign="top">
						<div align="center">
							<p>&nbsp;</p>
							<p><font face="Arial, Helvetica, sans-serif"><img border="0" src="./images/Korean_Dolls.gif" width="140" height="126"></font></p>
							<p>&nbsp;</p>
						</div>
					</td>
				</tr>
			</table>
			<table width="100%%" height="181" border="0" cellpadding="0" cellspacing="0">
				<!--DWLayoutTable-->
				<tr>
					<td width="240" height="166" valign="top">
							<p align="center" class="address"> <strong>Boston Korean School </strong><br />
							c/o Korean Church of Boston<br />
							32 Harvard Street <br />
							Brookline, MA 02445 <br />
							Tel. (978) 509-8708 <br />
							Fax. (617) 739-1366 </p>
					</td>
					<td width="220" valign="top">
						<p align="center" class="address"><strong>For Information or registration contact:</strong></p>
					
						<p align="center" class="address">Principal: Mr. Sang Kang<br />
						(978) 509-8708<br />
						<a href="mailto:uno@sangkang.com">uno@sangkang.com</a></p>
						
						<p align="center" class="address">Assistant Principal: Seungyeon Lee<br />
						<a href="mailto:syleehope65@gmail.com">syleehope65@gmail.com</a></p>
					</td>
				</tr>
			</table></td>
	</tr>
</table>
<?php include("bottom.html"); ?>
