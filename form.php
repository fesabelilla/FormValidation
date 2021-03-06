<!--
Name:   /^[A-Za-z. ]*$/
email: /[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.][a-zA-Z0-9._-]{2,}/

website : /(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/

 -->

<?php 

	$nameError = "";
	$emailError = "";
	$genderError = "";
	$WebsiteError = "";
	

	if (isset($_POST["Submit"])) {

		if(empty($_POST["Name"])){
			$nameError = "Name is required";
		}else{
			$name = testUserInput($_POST["Name"]);
				if (!preg_match("/^[A-Za-z. ]*$/", $name)) {
					$nameError = "Only letter and white space are allowed";
				}
		}
		// for email
		if(empty($_POST["Email"])){
			$emailError = "Email is required";
		}else{
			$email = testUserInput($_POST["Email"]);
				if (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.][a-zA-Z0-9._-]{2,}/
", $email)) {
					$emailError = "Invalid email format";
					
				}
		}
		//for gender

		if(empty($_POST["Gender"])){
			$genderError = "Gender is required";
		}else{
			$gender = testUserInput($_POST["Gender"]);
		}

		//for website
		if(empty($_POST["Website"])){
			$WebsiteError = "Website is required";
		}else{
			$website = testUserInput($_POST["Website"]);

			if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website)) {
				$WebsiteError = "Invalid website assress";
			}
		}
		//print_r( $_POST);
		if( !empty($_POST["Name"]) && !empty($_POST["Email"])  && !empty($_POST["Gender"]) && !empty($_POST["Website"])){
			if((preg_match("/^[A-Za-z. ]*$/", $name)==true) &&
				(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.][a-zA-Z0-9._-]{2,}/", $email)==true)&& (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website)==true)){
			echo "Submit Information <br>";
		    echo "Name : ".ucwords($_POST["Name"])."<br>";
			//echo "Name : {$_POST["Name"]}<br>";
			echo "Email : {$_POST["Email"]}<br>";
			echo "Gender : {$_POST["Gender"]}<br>";
			echo "Website : {$_POST["Website"]}<br>";
			echo "Comment : {$_POST["Comment"]}<br>";
		}
		}else{
			echo '<span class="Error">Please complete and correct your form again</span><br>';
		}

	}

	function testUserInput($data)
	{

			return $data;
	}
	

 ?>

<!DOCTYPE>

<html>
	<head>
		<title>  Project</title>
	</head>
	<style type="text/css">
	input[type="text"],input[type="email"],textarea{
		border:  1px solid dashed;
		background-color: rgb(221,216,212);
		width: 600px;
		padding: .5em;
		font-size: 1.0em;
	}
	.Error{
		color: red;
	}
	
	</style>

<body>

	<h2>Form Validation with PHP.</h2>

	<form  action="form.php" method="post"> 
		<legend>* Please Fill Out the following Fields.</legend>			
		<fieldset>
		Name:<br>
		<input class="input" type="text" Name="Name" value="">
		<span class="Error">*<?php echo $nameError;  ?></span><br>	 
		E-mail:<br>
		<input class="input" type="text" Name="Email" value="">
		<span class="Error">*<?php echo $emailError;?></span><br>
		Gender:<br>
		<input class="radio" type="radio" Name="Gender" value="Female">Female
		<input class="radio" type="radio" Name="Gender" value="Male">Male
		<span class="Error">*<?php echo $genderError;  
		?></span><br>		   
		Website:<br>
		<input class="input" type="text" Name="Website" value="">
		<span class="Error">* <?php echo $WebsiteError;  ?></span><br>
		Comment:<br>
		<textarea Name="Comment" rows="5" cols="25"></textarea>
		<br>
		<br>
		<input type="Submit" Name="Submit" value="Submit Your Information">
		   </fieldset>

	</form>

	    
	</body>
</html>
