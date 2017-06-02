<?php
			  $userid=$_GET['userid'];
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$dbc = mysqli_connect('localhost', 'root', '', 'typing') or die ("Not connected");
				$q="delete From users where classid=".$_GET['userid']."";
				$r = mysqli_query($dbc, $q);
			    header("Location:friend.php");
			}?>		