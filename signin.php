<?php include('connect.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>DriveSmart</title>
        <link rel = "stylesheet" href="./drivesmart.css">
        <style>
            body{
              background-image: url("./images/night.jpg");
              background-size: cover;
              z-index: 1;
            }
            * {box-sizing: border-box;}
            .bg-img{
              content: "";
              position: absolute;
              
              width : 100%;
              height: 100%;
              background: inherit;
              z-index: -1;
              
              filter        : blur(10px);
              -moz-filter   : blur(10px);
              -webkit-filter: blur(10px);
              -o-filter     : blur(10px);
              
              transition        : all 2s linear;
              -moz-transition   : all 2s linear;
              -webkit-transition: all 2s linear;
              -o-transition     : all 2s linear;
              
            }
            .overall{
              background: white;
              width: 400px;
              height: 300px;
              top: 50%;
              left: 50%;
              position: absolute;
              transform: translate(-50%, -25%);
              box-sizing: border-box;
              padding: 50px 28px;
              border-radius: 10px;
              opacity: 0.7;
              display: block;

            }
            /* Full-width input fields */
            input[type=text], input[type=password] {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              display: inline-block;
              border: none;
              background: #f1f1f1;
            }
            
            /* Add a background color when the inputs get focus */
            input[type=text]:focus, input[type=password]:focus {
              background-color: #ddd;
              outline: none;
            }
            
            /* Set a style for all buttons */
            button {
              background-color: #1388a5;
              color: white;
              padding: 10px 10px;
              margin: 8px 0;
              border: none;
              cursor: pointer;
              width: 100%;
              opacity: 0.8;
              border-radius: 10px;
              margin: 5px;
            }
            
            button:hover {
              background-color: blue;;
              transform: scale(1.1);
            }
            
            /* Extra styles for the cancel button */
            .cancelbtn {
              padding: 14px 10px;
              margin: 10px;
              background-color: #727070;
            }
            .cancelbtn:hover{
              background-color: red;
            }
            .signupbtn, .signinbtn {
                padding: 14px 5px;
                margin: 10px;
                background-color: #1388a5;
            }
            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn, .signinbtn {
              float: left;
              width: 200px;
            }
            
            /* Add padding to container elements */
            .container {
              padding: 16px;
            }
            
            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              
              padding-top: 50px;
            }
            
            /* Modal Content/Box */
            .modal-content {
              background-color: #fefefe;
              margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
              border: 1px solid #888;
              width: 80%; /* Could be more or less, depending on screen size */
            }
            
            /* Style the horizontal ruler */
            hr {
              border: 1px solid #f1f1f1;
              margin-bottom: 25px;
            }
             
            /* The Close Button (x) */
            .close {
              position: absolute;
              right: 35px;
              top: 15px;
              font-size: 40px;
              font-weight: bold;
              color: #f1f1f1;
            }
            
            .close:hover,
            .close:focus {
              color: #f44336;
              cursor: pointer;
            }
            
            .link:hover,
            .link:focus {
              color: #3669f4;
              cursor: pointer;
            }

            /* Clear floats */
            .clearfix::after {
              content: "";
              clear: both;
              display: table;
            }
            .error {
  				width: 92%; 
  				margin: 0px auto; 
				padding: 5px; 
				border: 1px solid #a94442; 
				color: #a94442; 
				background: #f2dede; 
				border-radius: 5px; 
				text-align: left;
			}
            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
              .cancelbtn, .signupbtn, .signinbtn {
                 width: 100px;
                 padding: 5px 5px;
                 margin: 10px;
              }
            }
            </style>
            </head>
            <body>
              <div class="bg-img"></div>
                    <h1 align="left"><a id ="homelink" href="./home.html">DriveSmart</a></h1>
                    <div class="navbar">
            
                		<a href="./home.html">Home</a>
                		<a href="./driving-schools.html">Driving Schools</a>
                		<a href="./driving-instructions.html">Driving Instructions</a>       
                		<a href="./rto-info.html">RTO Information</a>
                		<a href="./contact-us.html">Contact Us</a>
                		<a href="./signin.php">SIGN IN | SIGN UP</a>
            
        		        </div>
            <br><br><br><br><br>
            
            <div class="overall" id="over">
            <h2 align="center" style="color: #1388a5;">Sign in or sign up here now!!</h2> 
            <center>
            <button onclick="document.getElementById('id01').style.display='block'" style="width:90px; height: 55px; padding: 6px;  margin: 10px"><h3>Sign Up</h3></button> 
            <button onclick="document.getElementById('id02').style.display='block'" style="width:90px; height: 55px; padding: 6px;  margin: 10px;"><h3>Sign in</h3></button>
            </center>
          </div>
            <div id="id01" class="modal">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              
              <form class="modal-content" method="POST" action="signin.php">
              	
                <div class="container">
                  <h1>Sign Up</h1>
                  <p>Please fill in this form to create an account.</p>
                  <hr>
                  <?php include('errors.php'); ?>
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">

				  
                  <label for="username"><b>Username</b></label>
                  <input type="text" placeholder="Enter username" name="username"  value="<?php echo $username; ?>">

            	  
                  <label for="password"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password">

            	  
                  <label for="psw-repeat"><b>Repeat Password</b></label>
                  <input type="password" placeholder="Repeat Password" name="psw-repeat" >

                  
                  <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                  </label>
            
                  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            
                  <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" name="signup" class="signupbtn" id="signupbtn">Sign Up</button>
                  </div>
                  <p>Already have an account? <u onclick="change();" class = "link">Sign in here!</u></p>
                </div>
              </form>
            </div>
            
            
            <div id="id02" class="modal">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" method="POST" action="signin.php">
                    	
                      <div class="container">
                      	<?php include('errors.php'); ?>
                        <h1>Sign In</h1>
                        <hr>
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                  
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                  
                        
                        <label>
                          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                        </label>
                  
                  
                        <div class="clearfix">
                          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                          <button type="submit" name ="signin" class="signinbtn">Sign In</button>
                        </div>
                        <br>
                        
                            <p>Don't have an account? <u onclick="change();" class = "link">Sign up here!</u></p>
                        
                      </div>
                    </form>	
                  </div>
               
              
            <script>
            // Get the modal
            var modal = document.getElementById('id01');
            var model = document.getElementById('id02');
            var overall = document.getElementById('over');
            // When the user clicksphp include('s anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
              else if(event.target==model) {
                  model.style.display = "none";
              }
              overall.style.display = 'block';
            }
            function change() {
                if(modal.style.display=='block') {
                    modal.style.display = "none";
                    model.style.display = "block";
                }
                else if(model.style.display=='block') {
                    model.style.display = "none";
                    modal.style.display = "block";
                }
                overall.style.display = 'none';
                
            }
            //function JSalert(e) {
            //  alert("Congrats! Your account is created. success");
            //}
            //var signup = document.getElementById("signupbtn");
            //signup.addEventListener("click", JSalert, false);

            </script>
                

</html>
