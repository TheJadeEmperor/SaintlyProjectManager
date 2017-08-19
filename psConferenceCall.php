<?
/* Conference call reminder
Sends out a reminder email every sunday at 12:00 PM  
The time should be set in the cron job
This script checks that if today is Sunday, and if it is, grab the emails
of all members set to active "A" status and email them the reminder.
*/

function database($host, $user, $pw, $dbName)
{
	if(is_int(strpos(__FILE__, 'C:\\')))	//connect to database remotely (local server)
	{ 
		$conn = mysql_connect($host, $user, $pw) or die(mysql_error().' (L: '.__LINE__.')');
	}
	else //connect to database directly (live server)
	{
		$conn = mysql_connect('localhost', $user, $pw) or die(mysql_error().' (L: '.__LINE__.')');
	}
	
	mysql_select_db($dbName) or die(mysql_error());
	
	return $conn;
}

set_time_limit(0); //make sure script does NOT timeout
$conn = database('66.147.240.156', 'codegeas', 'Military1!', 'codegeas_contacts') or die(mysql_error());




//variables
$url = 'http://www.networkstring.com';
$headers = "From: theemperor@peoplestring.com\n";
$headers .= "Content-type: text/html;";		
$subject = "PeopleString Conference Call Reminder";


if(date('N', time()) == 7 ) //check for Sunday
{
	$sel = 'select * from subscribers where status="A"';
	$res = mysql_query($sel, $conn) or die(mysql_error());
	
	while($p = mysql_fetch_assoc($res))
	{		
		$theMessage = '<html><head>
		<style>
		body{
			background:url('.$url.'/img/sky.jpg);
		}
		</style>
		</head><body>
		<table width="725px" border="0" cellspacing="0" background="'.$url.'/img/sky.jpg">
		<tr><td>
			<table border="0" cellspacing="0" background="'.$url.'/img/portal.jpg">
			<tr><td width=350px></td><td>
				<p>Hi '.$p[fname].',</p>
				<p>This is just a reminder that there is going to be a PeopleString conference 
				call <b>Monday</b> from 7:00 PM to 8:00 PM.</p>
				<br><br><br><br>
				<p>Conference call details:</p>
				<table><tr>
					<td>Number:</td><td> 218 - 844 - 8060</td>
				</tr><tr>
					<td>Passcode: </td><td>455 4328#</td>
				</tr><tr>
					<td>Time: </td><td>7:00 PM to 8:00 PM EST (19:00 to 20:00)</td>
				</tr>
				</table>
				<br><br>
			</td></tr></table>
			
			<table border="0" cellspacing="10"><tr><td>
			<p>For more info, please visit '.$url.'</p>
			
			<p>Benjamin L<br>The Entrepreneur you can trust</p>
			</td></tr></table>
		</td></tr></table>
		</body>';

		$sendTo = $p[peoplestring].'@peoplestring.com, '.$p[email];
		
		if(mail($sendTo, $subject, $theMessage, $headers))
			$msg .= 'Success: '.$sendTo.'<br>';
	}
	
		
}

echo $msg;



?>