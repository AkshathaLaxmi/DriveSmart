<!-- profile page -->

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
            
                		<a href="./home.html">Home</a>
                		<a href="./driving-schools.html">Driving Schools</a>
                		<a href="./driving-instructions.html">Driving Instructions</a>       
                		<a href="./rto-info.html">RTO Information</a>
                		<a href="./contact-us.html">Contact Us</a>
                		<a href="./signin.php">SIGN IN | SIGN UP</a>
            
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
    			<p class = "align">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    			<p class = "align" style = "text-align: right;"> <a href="profile_page.php?logout='1'" style="color: red;">logout</a> </p>
    		<?php endif ?>
			<div id="LeftCol">
				<i><img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/User_font_awesome.svg" align="center" width="200px" height="200px"></i>
			</div>
			<div id="Info">
				<p id="name"><b>SAMPLE NAME</b></p>
				<p><b>Location: </b><br/>
				<span id="addr">hi jfnvjkndjvsndicjnwjcv <br/>
				runcfiuwefnciurncre<br/>
				refnrwuifhweuifnruifc<br/></span>
				</p>
				<p><b>Phone:</b><br />
				<span id="phone"> 92xxxxxxx0 </span>
				</p>
				<p><b>Username:</b><br />
				<span id="usrname">sample23 </span>
				</p>
			</div>
		</section>
	</body>
</html>	
