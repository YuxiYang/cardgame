<html>
<bady>
<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'typing') or die ("Not connected");
	$q = "INSERT INTO files (fileID,filename,author) VALUES ('1','gaming','Jack')";
	$r = mysqli_query($dbc, $q);
if ($r) echo "The record is inserted to DB. Thanks. ";
			else echo "Sorry, but something is wrong with the system.";	
?>
</bady>
</html>