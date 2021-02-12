<?php 

	$nameError = "";
	$emailError = "";
	$genderError = "";
	$WebsiteError = "";
	if (isset($_POST["Submit"])) {
		if(empty($_POST["Name"])){
			$nameError = "Name is required";
		}else{
			$Name = testUserInput($_POST["Name"]);
		}
		// for email
		if(empty($_POST["Email"])){
			$emailError = "Email is required";
		}else{
			$email = testUserInput($_POST["Email"]);
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
		<title>Form Validation Project</title>
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
		<span class="Error">*</span><?php echo $nameError;  ?><br>	 
		E-mail:<br>
		<input class="input" type="text" Name="Email" value="">
		<span class="Error">*</span><?php echo $emailError;?><br>
		Gender:<br>
		<input class="radio" type="radio" Name="Gender" value="Female">Female
		<input class="radio" type="radio" Name="Gender" value="Male">Male
		<span class="Error">*</span><?php echo $genderError;  
		?><br>		   
		Website:<br>
		<input class="input" type="text" Name="Website" value="">
		<span class="Error">*</span> <?php echo $WebsiteError;  ?><br>
		Comment:<br>
		<textarea Name="Comment" rows="5" cols="25"></textarea>
		<br>
		<br>
		<input type="Submit" Name="Submit" value="Submit Your Information">
		   </fieldset>

	</form>

	    
	</body>
</html>
