<?php
include('include/functions.php');

//database info goes here
//////////////////////////////
$dbHost = 'localhost';
$dbUser = 'root';
$dbPW = 'password';
$dbName = 'ig_posts';
/////////////////////////////

//connect to database, returns resource 
$db = database($dbHost, $dbUser, $dbPW, $dbName);

if($_GET['id']) {
	$thisID = $_GET['id'];
}

/*
insert upddate delete
select all

$queryBCM = "UPDATE wp_options SET option_value = 
	REPLACE(option_value, 'http://localhost/BCM/', 'https://blackcrimesmatters.com/')";
$resBCM = mysqli_query($dbBCM, $queryBCM) or die(mysqli_error());

if($resBCM == 1) echo "\nSuccess";

$queryBCM = "UPDATE wp_posts SET post_content = 
	REPLACE(post_content, 'http://localhost/BCM/', 'https://blackcrimesmatters.com/'), guid = 	
	REPLACE(guid, 'http://localhost/BCM/', 'https://blackcrimesmatters.com/')
	WHERE post_type='post' or post_type='page'";
$resBCM = mysqli_query($dbBCM, $queryBCM) or die(mysqli_error());
*/
 
	//hashtag types are for inserting hashtags
	$resIG = mysqli_query($db, "SELECT * FROM ig_posts WHERE type <> 'hashtag' ORDER BY id desc");

	$count = 0;
	while($ig = $resIG->fetch_assoc()) {
		$id = $ig['id']; 
		$title = $ig['title'];
		$posts .= '<p>'.$ig['type'].' <a href="?id='.$id.'">'.$title.'</a></p>';
		
		if($thisID == $id) {
			$thisPost = $ig;
		}
	}

?>
<style>
.left {
	float: left;
}

body {
	font-size: 18px;
}
</style>
<div class="left">
	<?=$posts?>
</div>


<div class="right">
	<form action="post">
		Save Update 
		<table>
		<tr>
			<td>Title</td>
			<td>
				<input type="text" size="40" id="title" value="<?=$thisPost['title'] ?>" />
				<input type="hidden" size="" id="id" value="<?=$thisID ?>" />
			</td>
		</tr>
		<tr>
			<td>URL</td>
			<td>
				<input type="text" size="40" id="url" value="<?=$thisPost['url'] ?>" />
			</td>
		</tr>
		<tr>
			<td>Type</td>
			<td>
				<input type="text" size="10" id="type" value="<?=$thisPost['type'] ?>" />
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				<textarea rows="30" cols="55" id="content"><?=$thisPost['content'] ?></textarea><br />
				<input type="button" value="Select All" onclick="document.getElementById('content').focus();
    document.getElementById('content').select();" />
				<input type="button" value="Copy" onclick="document.execCommand('copy');" />
			</td>
		</tr>
	</form>
</div>