<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signin.php");
  }
?>
<html>
    <head>
        <title>DriveSmart</title>
        <link rel = "stylesheet" href="./drivesmart.css">
		<style type="text/css">
        i{
		  background: #c1c8e4;
		  border-radius: 20px;
		  font-size: 25px;
		  text-align: center;
		  margin-right: 10px;
		  border-radius:50%;
		  display:inline-block;
		  padding:10px;
		}
		img {
 			 display:block;
		}
		#ProfilePage
		{
    		/* Move it off the top of the page, then centre it horizontally */
    		margin: 20px auto;
    		width: 80%;
    		height:80%;
    		padding:10px;
    		background-color:#5ab9ea;
		}
		#LeftCol
		{
    		/* Move it to the left */
    		float: left;
		    width: 250px;
		    margin:25px 20px;
    		text-align: center;
    		padding: 0 0 100 0px;
		}
		#Info
		{
    		width: 600px;
			margin-left:80px;
    		/* Move it to the right */
		    float: left;
		}
		#name{
			font-size:20px;
		}
		#Info{
			font-family:"Lucida Console","Georgia";
		}
		#align{
			float:right;
		}
		</style>
		</head>
    <body>
    	<h1 align="left"><a id ="homelink" href="./home.html">DriveSmart</a></h1>
                    <div class="navbar">
            
                		<a href="./index.html">Home</a>
                		<a href="./driving-schools.html">Driving Schools</a>
                		<a href="./driving-instructions.html">Driving Instructions</a>       
                		<a href="./rto-info.html">RTO Information</a>
                		<a href="./contact-us.html">Contact Us</a>

        		        </div>
		
        <p align="right"><a id="edit" href="./edit.html">EDIT</a></p>
		<section id="Profilepage">
			<?php if (isset($_SESSION['success'])) : ?>
      		<div class="error success" >
      			<h3>
          		<?php 
          			echo $_SESSION['success']; 
          			unset($_SESSION['success']);
          		?>
      			</h3>
      		</div>
      		<?php endif ?>
      		<?php  if (isset($_SESSION['username'])) : ?>
      		    <br>
    			<p class = "align">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    			<p class = "align" style = "text-align: right;"> <a href="profile_page.php?logout='1'" style="color: red;">logout</a> </p>
    			
    		<?php endif ?>
			<div id="LeftCol">
				<i><img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/User_font_awesome.svg" align="center" width="200px" height="200px"></i>
			</div>
			<?php
      		    $db = new mysqli("localhost","id11628252_drivesmart", "drivesmart", "id11628252_drivesmart");
      		    if (mysqli_connect_errno()) {
                die("Connection failed: " . $db->connect_error);
                }
                $username = $_SESSION['username'];
                $sql = "SELECT name, location, phoneno FROM accounts WHERE username = '$username' LIMIT 1";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<br><br><br><br>". "Name: " . $row["name"]. "<br><br><br>". "Location: " . $row["location"]. "<br><br><br>". " Phone Number: " . $row["phoneno"].  "<br><br><br>";
			?>
		</section>
		<footer style="color: white; position: fixed; bottom: 20px;">
            Created by: Akshatha Laxmi, Ishitha Agarwal and Saksham Gupta. &copy;
        </footer>
	</body>
</html>	
