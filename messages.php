<?php include("header.html"); ?>
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
				<p class="mainbodyheader">Bulletin Board</p>
				<div style="padding-left:16px; padding-right:16px;">
<?php

// load and parse blogger data
include_once 'includes/blogger.inc.php';

// display posts
foreach ($blogData as $post) {
	echo "<p>$post</p>\n\n";
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