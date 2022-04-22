<?php
/*
 * Prog Test Bed Login page
 */
	require_once('functions.php');
	if(loggedin())
		header("Location: index.php");
	else if(isset($_POST['action'])) {
		$name = mysql_real_escape_string($_POST['name']);
		if($_POST['action']=='register') {
			// register the user
			$email = mysql_real_escape_string($_POST['email']);
			$number = mysql_real_escape_string($_POST['contactno']);
			$desc = mysql_real_escape_string($_POST['description']);
		

			}
			else {
				// create the entry in the users table
				connectdb();
				$query = "SELECT random,hash FROM users WHERE email='".$email."'";
				$result = mysql_query($query);
				if(mysql_num_rows($result)!=0)
					header("Location: register.php?exists=1");
				else {
					$random = randomNum(5);
					$hash = crypt($_POST['password'], $random);
					$sql="INSERT INTO `users` ( `name` , `random` , `hash` , `email` , `gender` , `contactno` , `description` ) VALUES ('".$name."', '$random', '$hash', '".$email."',".$number."','".$desc."')";
					mysql_query($sql);
					header("Location: login.php?registered=1");
				}
			}
		}
	}
?>


<?php
include("header.php");
?>

 <div class="container">
<?php
        if(isset($_GET['logout']))
          echo("<div class=\"alert alert-info\">\nYou have logged out successfully!\n</div>");
        else if(isset($_GET['error']))
          echo("<div class=\"alert alert-error\">\nIncorrect email or password!\n</div>");
      else if(isset($_GET['ldaperr']))
          echo("<div class=\"alert alert-error\">\nIncorrect LDAP username or LDAP password!\n</div>");
        else if(isset($_GET['registered']))
          echo("<div class=\"alert alert-success\">\nYou have been registered successfully! Login to continue.\n</div>");
        else if(isset($_GET['exists']))
          echo("<div class=\"alert alert-error\">\nEmail already exists! Please select a different username.\n</div>");
        else if(isset($_GET['nerror']))
          echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");
      ?>
      <form method="post" action="register.php">
        <input type="hidden" name="action" value="register"/>
        <h1><small>Register now</small></h1>
        <input type="text" name="name" placeholder="Name" required/><br/>
        <input type="password" name="password" placeholder="Password"  required/><br/>
        <input type="email" name="email" placeholder="Email Id" required/><br/>
        <div class="input-prepend">
		<span class="add-on">+91</span>
		Contact Number: <input class="span2" id="prependedInput" type="number" name="contactno" placeholder="Contact Number" required>
		</div><br/>
		

<?php
	include('footer.php');
?>