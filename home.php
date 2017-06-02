<?php
error_reporting(0)?>
<html>
<head>	
<meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>T-Train </title>
    
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "includes/style.css" type = "text/css" media = "screen" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body class="se">
	<div class="container">
		<div style = "color: red">
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST') {	
			  	if(isset($_POST['Button1'])){
					$uname = $_POST['uname'];
					$psword = $_POST['password'];
					$error = array();
					if (empty($uname)){
						$error[] = "You forgot to enter user name.";
					}
					if (empty($psword)){
						$error[] = "You forgot to enter password.";
					}
					if (empty($error)){ 
						$dbc = mysqli_connect('localhost', 'root', '', 'typing') or die("Cannot connect to database. ");
						$q = "SELECT * FROM user WHERE username = '$uname'";			
						$r = mysqli_query($dbc, $q);				
						if (mysqli_num_rows($r) == 1){
							$row = mysqli_fetch_array($r);
							if ( $psword == $row['password']){
								session_start();
								$_SESSION['uname'] = $uname;
								header("Location:index.php");
							}
							else 
								echo "Incorrect password";
						} 
						else {
					 		echo "Unknown username.";
						}	 
					}
					else {
						foreach ($error as $msg){
							echo $msg;
						}
					}
			  }
			  if(isset($_POST['Button2'])) { //validate the second form
			  	$role = $_POST['role'];
			  	if(empty($role)) 
			  		echo "You forgot to select a role.";
			  	else {
			  		header('LOCATION: register4.php?role='.$role);
			  	} 
			  }
			  if(isset($_POST['Button3'])) { //validate the second form
			  		header('LOCATION:student.php');
			  }
			}
		?>	
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
                                        </label>
                                        <input class="form-control" placeholder="Username" name="uname" type="text" value='<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>'>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value=''>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="Button1" value="Login »">
                                        <br></br>
                                        <font size='3'>     New User, Click here to <i> <a href='register.php'>Join Us.</a></i></font>
                                    </fieldset>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

  </div>

<body>
</html>
