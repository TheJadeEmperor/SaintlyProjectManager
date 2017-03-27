<?php
/* ##############################################################

insertRecord($dbFields, $tableName)
	query - insert new record into $tableName

################################################################*/



function embedYoutube($src, $width, $height)
{
	return '<object width="'.$width.'" height="'.$height.'"><param name="movie" 
	value="http://www.youtube.com/v/'.$src.'=en_US&fs=1&"></param>
	<param name="allowFullScreen" value="true"></param>
	<param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/'.$src.'&hl=en_US&fs=1&" type="application/x-shockwave-flash" 
	allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';
}


/* connect to database, returns resource */
function database($host, $user, $pw, $dbName)
{
	if(is_int(strpos(__FILE__, 'C:\\')))	//connect to database remotely (local server)
	{ 
		$conn = mysql_connect($host, $user, $pw) or die(mysql_error().' ('.__LINE__.')');
	}
	else //connect to database directly (live server)
	{
		$conn = mysql_connect('localhost', $user, $pw) or die(mysql_error().' ('.__LINE__.')');
	}
	
	mysql_select_db($dbName) or die(mysql_error());
	
	return $conn;
}



function insertRecord($dbFields, $tableName)
{
	global $context; 
	
	$fields = $values = array();
	foreach($dbFields as $fld => $val)
	{
		array_push($fields, $fld);
		array_push($values, $val);
	}
	
	$theFields = implode(',', $fields);
	$theValues = implode(',', $values);
	
	$ins = 'insert into '.$tableName.' ('.$theFields.') values ('.$theValues.')';
	return mysql_query($ins, $context[conn]) or die(mysql_error().' '.$ins);
}


function insertRec($dbInfo)
{
	global $conn;
	
	$fields = $values = array();
	foreach($dbInfo[fields] as $field => $value)
	{
		array_push($fields, $field);
		array_push($values, '"'.$value.'"');
	}
	
	$theFields = implode(', ', $fields);
	$theValues = implode(', ', $values);
	
	$ins = 'insert into '.$dbInfo[tableName].' ('.$theFields.') values ('.$theValues.')';
	
	return mysql_query($ins, $conn) or die(mysql_error());
}


function getRec($cond)
{
	global $conn;
	$table = $cond[tableName];
	
	$sel = 'select * from '.$cond[tableName].' where '.$cond[field].'="'.$cond[value].'"';

	$res = mysql_query($sel, $conn) or die(mysql_error());

	return mysql_fetch_assoc($res);
}


function getRecs($cond)
{
	global $conn;
	$order = $cond[order];
	$table = $cond[tableName];
	$r = array();
	
	$sel = 'select * from '.$table;

	if($order != '')
		$sel .= ' order by '.$order;

	$res = mysql_query($sel, $conn) or die(mysql_error());

	while($row = mysql_fetch_assoc($res))
	{
		array_push($r, $row);
	}
	return $r;
}


/*Generic form functions*/
function inputText($varName, $extra) {
	return '<input type="text" name="'.$varName.'" value="'.$_POST[$varName].'" '.$extra.'>';
}


function columnHead($colArray) {
	foreach($colArray as $col)
		$content .= '<th>'.$col.'</th>';
	
	return '<tr>'.$content.'</tr>';
}



function FileName($dir) { //gets the full directory and returns the file name

	$slash = strrpos($dir, '/'); //find the last slash in the directory

	if($slash == false)//if unable to find the forward slash
		$slash = strrpos($dir, '\\');//find the backslash (for localhost)

 	return substr($dir, $slash + 1, strlen($dir));//get the file name
}//function


function shortenText($text, $limit) {
	//$limit = number of characters you want to display
	$new = $text.' ';
	$new = substr($new, 0, $limit);
	
	if(strlen($text) > $limit)
		$new = $new.'...';
	return $new;
}//function


function randomChar() {
	$letters = array(1 => "a", "b", "c", "d", "e", "f", "g", "h" ,"i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","A", "B", "C", "D", "E", "F", "G", "H" ,"I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z","0","1","2","3","4","5","6","7","8","9");
	$index = Key($letters);
	$element = Current($letters);
	$index = rand(1, 62);
	$random_letter = $letters[$index];
	return $random_letter;
}

function genString() {
	//create random hash
	$number = 5;
	for ($i = 0; $i < $number; $i++) {
	    $hash = $hash.(randomChar());
	}
	return $hash;
}


?>