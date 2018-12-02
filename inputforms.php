<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<style> .error {color: red;}</style>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = $commentsErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])){
		$nameErr = "Name is required";
	}
	else{
		 if(!preg_match("/^[a-zA-Z]*$/", $name)){
			$nameErr = "only letters and white space allowed";
		 }
		 else {
			 $name = test_input($_POST["name"]);
		}
		
	}  
	
    if(empty($_POST["email"])){
		$emailErr = "Email is required";
	}
	else{
		$email = test_input($_POST["email"]);
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$emailErr = "not a valid email";
		 }
		
		
	}
	
	if(empty($_POST["website"])){
		$websiteErr = "website is required";
	}
	else{
		$website = filter_var(test_input($_POST["website"]), FILTER_SANITIZE_URL);
			if(filter_var($website, FILTER_VALIDATE_URL)=== false){
			$websiteErr = "not a valid website";
		 }
		 
		
	}
	
	if(empty($_POST["comment"])){
		$commentsErr = "comment is required";
	}
	else{
		$comment = test_input($_POST["comment"]);
	}
	
	if(empty($_POST["gender"])){
		$genderErr = "gender is required";
	}
	else{
		$gender = test_input($_POST["gender"]);
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">*<?php echo $nameErr; ?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class = "error">*<?php echo $emailErr; ?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class = "error">*<?php echo $websiteErr; ?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <span class = "error">*<?php echo $commentsErr; ?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class = "error">*<?php echo $genderErr; ?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>