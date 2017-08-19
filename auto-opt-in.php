<?
if(isset($_GET[e]))
    $optInEmail = $_GET[e];

$fullName = 'subscriber'; 

//get the opt-in form 
$optinForm = '<form method="POST" id=optin action="http://www.trafficwave.net/cgi-bin/autoresp/inforeq.cgi">

<input type=hidden name="trwvid" value="theemperor">
<input type=hidden name="series" value="nuscustomers">
<input type=hidden id="da_name" name="da_name" value="$fullName" />
<input type=hidden id="da_email" name="da_email" value="$email" />
</form>';

//replace vars with values
$var = array(
'$fullName',
'$firstName',
'$lastName', 
'$email'
); 

$val = array(
$fullName,
$u[fname],
$u[lname],
$optInEmail
);

$optinForm = str_replace($var, $val, $optinForm);

echo $optinForm; 
?>
<script language=javascript>
    setTimeout("redir()", 1000);
    function redir(){
        document.getElementById("optin").submit();
    }
</script>