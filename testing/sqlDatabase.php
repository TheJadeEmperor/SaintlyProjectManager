<?php
$adir = '../';
include($adir.'adminCode.php');

function getTable($tableName) {
	global $conn;
	
	$conn->select_db($_SESSION['select_db']); 

	$table[0] = $tableName;
	$queryD = 'DESC '.$tableName;		$msg .= showMessage($query);
	$resultD = $conn->query($queryD);
	
	$queryR = 'SELECT count(*) FROM '.$tableName;
	$resultR = $conn->query($queryR);

	$field = $resultR->fetch_array();
	$numRows = $field[0];
	
	$tableContent .= '<tr bgcolor="FFFFCC"><td colspan="3">Fields: '.$resultD->num_rows.'</td>
	<td colspan="3">Rows: '.$numRows.'</td></tr>
	<tr><td>Field</td><td>Type</td><td>Null</td><td>Key</td><td>Default</td><td>Extra</td></tr>';

	while($field = $resultD->fetch_array()) {
		//print_r($field);
		$tableContent .= '<tr><td>'.$field[0].'</td><td>'.$field[1].'</td><td>'.$field[2].'</td><td>'.$field[3].'</td>
		<td>'.$field[4].'</td><td>'.$field[5].'</td>';		
	} 
	
	$tableContent = '<div class=thelist>
	<h2><a href="?table='.$table[0].'">'.$table[0].'</a></h2>
	<table border="0">'. $tableContent . '</table></div>';	
	
	return $tableContent; 
} 

///////////////////////////////
$dbList = array($dbName1, $dbName2);
///////////////////////////////
print_r($dbList);

$select_db_post = $_POST['select_db'];
$select_db_session = $_SESSION['select_db'];

if($select_db_post && $select_db_post != $select_db_session) {	//select new database
	$select_db_session = $select_db_post;	
	unset($_GET);
}

//echo $select_db_post;


if($select_db_post) { //text list of tables
	echo $select_db_post;
	$conn->select_db($select_db_post); 

	$query = 'SHOW TABLES';	 $msg .= showMessage($query);
	switch ($select_db_post) {
		case '':
	}
	$result = $conn->query($query); //$newslConn 

	$count['r'] = 0; 
	while($rowT = $result->fetch_assoc()) { 
	 
		$show_tables .= "<tr><td><a href = \"?table=".$rowT["Tables_in_".$_POST['select_db']]."
		\">".$rowT["Tables_in_".$_POST['select_db']]."</a></td></tr>";
		
echo		$count['r'] ++;
	}//while
	
	$pageContent = "<table><tr valign='top'><td><table>".$show_tables."</table></td></tr></table>";
} 


if($_POST['show_tables']) { //detailed info for all tables

	$query = 'SHOW TABLES';	$msg .= showMessage($query);
	$result = $conn->query($query);

	while($table = $result->fetch_array()) { //go through tables		
		$pageContent .= getTable($table[0]);
	} 
}
else if($_GET['table']) {
	$pageContent = getTable($_GET['table']); 
}


if($_POST['get_sql']) { //save as sql file
	$dump = 'mysqldump -u'.$dbUser.' -p'.$dbPW.' '.$_SESSION[select_db].' '.$_GET[table].' > file.sql';
	echo showMessage($dump);
	system($dump);
} //


//drop down list of databases
foreach($dbList as $db) {

	$selected = '';
	if($select_db_session == $db)
		$selected = 'selected';
	
	$dropDown .= '<option value="'.$db.'" '.$selected.'>'.$db.'</option>';
}

$dropDown = '<select name="select_db" onChange="submit();">
	<option value="">--Pick a database--</option>'.$dropDown.'</select>';

	echo $msg;
?>

<form action="<?=$var ?>" method="POST">
<?=$dropDown?>
	<input type="submit" name="show_tables" value="Show All Tables"/>
	<input type="submit" name="get_sql" value="Export to SQL File"/>
</form>

<?=$pageContent?>

<?
include('adminFooter.php');  ?>