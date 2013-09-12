<html>
<head><title>T9 Encryption Example</title></head>
<body>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE /* | E_NOTICE*/ );

// T9 Encryption Class
include('t9enc.php');
// If form submitted
if(isset($_REQUEST['submit'])) {
$enc = new Encryption();
$encrypted_output = $enc->encrypt($_REQUEST['salt-key'],$_REQUEST['message']);
print "Your Encrypted Message: <br>";
print $encrypted_output;
print "<br><br>";
}
?>

	<div align="center">
		<form id="encrypt" method="post" action="?enc=true&dec=false">
			<label><strong>Type Text you would like to ENCODE in T9 Encryption:</strong></label><br>
			<label>Key (Password): </label>
			<input id="salt-key" name="salt-key" type="text" value="saltkey"><br>
			<label>Message:</label><br>
			<textarea id="message" name="message" rows="10" cols="50" value="">
			Type your message here.
			</textarea><br>
			<input id="submit" name="submit" type="submit" value="Encrypt">
		</form>
	</div>
</body>
</html>