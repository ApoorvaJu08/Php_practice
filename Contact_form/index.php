<!DOCTYPE html>
<html>
    <head>
        <title>Website Contact Form</title>
		<script type="text/javascript">
		function _(id){ return document.getElementById(id); }
		function submitForm()
		{
			_("mybtn").disabled = true;
			_("status").innerHTML = 'please wait...';
			var formdata  = new FormData();
			formdata.append("n", _("n").value );
			formdata.append("e", _("e").value );
			formdata.append("m", _("m").value );
			var ajax = new XMLHttpRequest();
			ajax.open("POST", "server.php");
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 2000)
				{
					if(ajax.responseText == "success")
					{
						_("my_form").innerHTML = "Success";
					}
					else
					{
						_("status").innerHTML = ajax.responseText;
						_("mybtn").disabled = false;
					}
				}
			}

		ajax.send( formdata ); 
		}
		</script>
    </head>
    <body>
		<form id="my_form" onsubmit="submitForm(); return false">
			<p><input type="text" id="n" placeholder="Name" required=""></p>
			<p><input type="email" id="e" placeholder="Email Address" required=""></p>
			<textarea id="m" placeholder="Email Address" rows="10" required=""></textarea>
			<p><input id="mybtn" type="submit" value="Submit Form"> <span id="status"></span></p>
		</form>
    </body>
</html>

//server.php

<?php
	if(isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) )
	{
		$n = $_POST['n'];
		$e = $_POST['e'];
		$m = nl2br($_POST['m']);
		$to = "you@domain.com";
		$from  = $e;
		$subject = "Contact From Message";
		$message = "Hello";
		$headers = "From: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		if(mail($to, $subject, $message, $headers)){
			echo "success";
		}
		else
		{
			echo "Due some error please try again!!";
		}
	}
?>

