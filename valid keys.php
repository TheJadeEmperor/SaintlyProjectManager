<html><head><title>Coinmach Order Form</title>
<script>
function getkey(e)
{
	if (window.event)
		return window.event.keyCode;
	else if (e)
		return e.which;
	else
		return null;
}

function goodchars(e, goods)
{
	var key, keychar;
	key = getkey(e);
	if (key == null) return true;
	// get character
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase();
	goods = goods.toLowerCase();
	// check goodkeys
	if (goods.indexOf(keychar) != -1)
	return true;
	// control keys
	if ( key == null || key == 0 || key == 8 || key == 9 || key == 13 || key == 27 )
		return true;
	// else return false
	return false;
}
function gather()
{
	if (document.coinmach.email.value != "")	//email check
	{
		var x = document.coinmach.email.value;
		var filter  = /^([a-zA-Z0-9_\.\-'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(x))
		{	}
		else
		{
			alert('Invalid email address.\nPlease check the format.\n\nIf you believe your email to be correct, please email\n IT@tgioa.com FROM THAT EMAIL');
			document.coinmach.email.focus();
			document.coinmach.email.select();
			return false;
		}//else
	}//if
}

</script></head>
<body>

</body></html>