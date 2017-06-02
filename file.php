<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T-Train</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php"><img src="http://s28.postimg.org/fwnieebbh/5bo_DRC1460663905.png" class="img-responsive" alt="Conxole Admin"/  height="70" width="200"></a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="game.php" accesskey="1" title="">Play Game</a></li>
				<li><a href="#" accesskey="2" title="">My social</a></li>
				<li><a href="#" accesskey="3" title="">My files</a></li>
				<li><a href="#" accesskey="4" title="">about us</a></li>
				<li><a href="#" accesskey="5" title="">Contact Us</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="header-featured">
</div>
	<div id="banner-wrapper">
		<div id="banner" class="container">
			<h2>Welcome to Magical T-Train</h2>
			<span>freedom, flexible, inspring factor</span>
		</div>
	</div>

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>File List</h2>
				<span class="byline">Select the file you want to play</span> </div>
		</center><table>
		    <tr>
			    <th> Name</th>
			    <th></th>
			    <th></th>
		    </tr>
		<?php 
			session_start();
			$uname = $_SESSION['uname'];
			$dbc = mysqli_connect('localhost', 'root', '', 'typing') or die("Not Connected");
			$q = "SELECT * FROM files WHERE author = '$uname'";
			$r = mysqli_query($dbc, $q);
			while ($row = mysqli_fetch_array($r)){			
				echo "<tr>";
					echo "<td>".$row['filename']."</td>";
					echo "<td><a href='game".$row['fileID'].".php'>Play</td>";
					echo "<td><a href='file.php'>Delete</td>";
					echo "<td><a href='share.php?fileID=".$row['fileID']."'>Share to friend</td>";
				echo "</tr>";
			}
		?>	
	    </table></center>
			 </div>
<?php include 'sbox.html';?>
	</div>
<div id="footer-wrapper">
	<div id="footer" class="container">
		<h1 style="text-align:center">From Yuxi Yang</h1>
	</div>
</div>
</body>
</html>
