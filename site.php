<?
session_start();
$_SESSION[login][id] = 1;

$_SESSION[login][fname] = 'fname';
$_SESSION[login][lname] = 'lname';
$_SESSION[login][paypal] = 'admin@codegeass.us';



$optInEmail = $_SESSION[login][paypal];

echo ''.print_r($_COOKIE).' <br />';
    
if(!isset($_COOKIE['autoOptIn']))
{
    //set the cookie
    $cookieExpire = time() + 60*60*24*30; //expires after 1 month
        
    setcookie('autoOptIn', $_SESSION[login][id], $cookieExpire);
    
  
    echo '<iframe name="iframe" width="700" height="500" src="auto-opt-in.php?e='.$optInEmail.'"></iframe>';
}

echo '<br /> outside page <br />';

if($_POST[del])
{
   setcookie('autoOptIn', $_SESSION[login][id], time()-9999999);
   echo 'delete cookie'; 
}
    
?>
<form method=post>
    <input type=submit name=del value="Delete Cookie">
</form>