<html>
<head>
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>T-Train </title>
    
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "includes/style.css" type = "text/css" media = "screen" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body class = "se">
<div class="container">
<div style="color: red">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$uname = $_POST['uname'];
			$psword = $_POST['psword'];
			$email = $_POST['email'];
            $byear = $_POST['byear'];
			$dbc = mysqli_connect('localhost', 'root', '', 'typing') or die ("Not connected");		
			$q = "INSERT INTO user (username,password,email,birthYear) VALUES ('$uname',SHA1('$psword'),'$email','$byear')";
			$r = mysqli_query($dbc, $q);
			if ($r) echo "The record is inserted to DB. Thanks. ";
			else echo "Sorry, but something is wrong with the system.";		
		}
	?>
	</div> 
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="http://s28.postimg.org/fwnieebbh/5bo_DRC1460663905.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div> 
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" action="" method='POST'>
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                            <div class="row-fluid user-row fr">
                                    <img src="http://s9.postimg.org/mj4m3sdqj/x2_A68_Y1460668085.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                                        </label>
                                        <input class="form-control" placeholder="Username" name="uname" type="text" value='' >
                                        <input class="form-control" placeholder="Password" name="psword" type="password" value=''>
                                        <input class="form-control" placeholder="Email" name="email" type="text" value=''>
                                        <input class="form-control" placeholder="Birth Year" name="byear" type="text" value=''>
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="button" value="Submit">
                                        <font size='3'> Go back to<i> <a href='home.php'>Login.</a> Page</i></font>
                                    </fieldset>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>


