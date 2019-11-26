<?php
	use PHPMailer\PHPMailer\PHPMailer;
	include 'dbh.php';
	if (isset($_POST['email'])){
		$email = $conn->real_escape_string($_POST['email']);
		$sql = "SELECT email FROM users WHERE email='$email'";
		$result= $conn->query($sql);
		if ($result->num_rows > 0){
			$token = "ugdiusagduyafdufgygFUYUIDGfuyfygYEDHUhuhGhufhd87636728286";
			$token = str_shuffle($token);
			$token = substr($token, 0, 10);
			$conn->query("UPDATE users SET token='$token',
			            token_expire= DATE_ADD(NOW(), INTERVAL 5 MINUTE)
						where email='$email'
			");
			
			require_once "PHPMailer/PHPMailer.php";
			require_once "PHPMailer/Exception.php";
			$mail = new PHPMailer();
			$mail->addAddress($email);
			$mail->setFrom("rachanaahire69@gmail.com","Rachana Ahire");
			$mail->Subject = "Reset Pass";
			$mail->isHTML(true);
			$mail->Body = "
			Click on the link below:<br>
			<a href='localhost/unschool/resetpass.php?email=$email&token=$token'>localhost/unschool/resetpass.php?email=$email&token=$token</a>
			";
			
			if ($mail->Send())
				exit(json_encode(array("status" => 1, "msg" => 'Please Check Your MAIL')));
			else
				exit(json_encode(array("status" => 0, "msg" => 'Something Went Wrong')));
				
		} else 
			exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Input')));
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>BLOGSPOT- Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.htm" style="font-size:35px">
  <img src="Capture.jpg" width="60" height="50" class="d-inline-block align-top" > BLOGSPOT
  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="font-size:x-large">
   <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link " href="home.htm">Home</a>
      </li>
      <!---<li class="nav-item">
        <a class="nav-link" href="#about-us">About</a>
      </li>--->
      <li class="nav-item">
        <a class="nav-link" href="register.htm">&nbsp Register &nbsp</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="login.htm">Login &nbsp</a>
      </li>
  </ul>
  </div>
  </nav>





<div class="container" style="margin-top:90px;">
<div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header" style="font-size:xx-large"><center>RESET PASSWORD</center></div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="">
                                 <br />
								 <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Registered Email Address Here..." />
                                            </div>
                                 </div><br><br>
								 <div class="form-group ">
                                        <center><button type="submit" class="btn btn-primary ">Send Email To Change Password</button></center><br>
                                 </div>
								 
								 </form>
								 <p id="response"></p>
                            </div>
                                
                        </div>

                    </div>
</div>
</div>
<script type="text/javascript">
	var email= $("#email");
	$(document).ready(function(){
		$('.btn-primary').on('click',function (){
			if (email.val() != ""){
				email.css('border', '1px solid green');
				
				$.ajax({
					url: 'forgetpass.php',
					method: 'POST',
					dataType: 'json',
					data: {
						email:email.val()
					}, 
					success: function (response) {
						if (!response.success)
							$("#response").html(response.msg).css('color','red');
						else
							$("#response").html(response.msg).css('color','green');
					}
				});
					
			}else {
				email.css('border', '1px solid red');
			}
		});
	});

</script>

</body>
</html>