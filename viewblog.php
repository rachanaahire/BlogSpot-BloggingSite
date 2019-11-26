
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


<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
.containers {
  font-family: Arial;
  
  padding-left:60px;
  padding-right:60px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 50px;
   margin-top: 50px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home2.htm" style="font-size:35px">
  <img src="Capture.jpg" width="60" height="50" class="d-inline-block align-top" > BLOGSPOT
  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="font-size:x-large">
   <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link " href="addblog.html">Add Blog</a>
      </li>
      <!---<li class="nav-item">
        <a class="nav-link" href="#about-us">About</a>
      </li>--->
      <li class="nav-item">
        <a class="nav-link" href="viewblog.htm">&nbsp View Blogs &nbsp</a>
      </li> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="icon.jpg" width=50px/>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!---<a class="dropdown-item" href="#">Action</a>--->
          <a class="dropdown-item" href="#">My Blogs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
      <!---<li class="nav-item ">
        <a class="nav-link" href="login.htm">Login  &nbsp</a>
      </li>--->
  </ul>
  </div>
  </nav>
<div class="containers">
<?php
	echo $_SESSION['username'];
?>



<?php

include 'dbh.php';

$sql= "SELECT * FROM blogs";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row=$result->fetch_assoc()){
		echo "<div class=\"row\">";
		echo "<div class=\"col-sm-1\"></div>";
        echo "<div class=\"col-sm-10\">";
		echo "<div class=\"card\">";
        echo "<h2 style=\"font-size:50px\">".$row["heading"]."</h2><h5 style=\"font-size:25px\">by- ".$row["author"]."</h5><br><p style=\"font-size:20px\">".$row["content"]."</p>";
		echo "</div>";
		echo "</div>";
        echo "<div class=\"col-sm-1\"></div>";
		echo "</div>";
	}
	
}
else{
	echo "Not available yet";
}
	?>


</div>




</body>
</html>




