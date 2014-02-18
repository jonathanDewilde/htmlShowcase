<html>
<head>
</head>

<link rel=StyleSheet href="Layout.css" type="text/css">

<body>

<div id="register">
<form method="post" action="">
</br>
<h1>Register</h1>
<p>First Name*: <input type="text" name="txtFirstName" id="textfield" value="<?php echo isset($_POST['txtFirstName']) ? $_POST['txtFirstName'] : '' ?>"/></p>
<p>Last Name*: <input type="text" name="txtLastName" id="textfield" value="<?php echo isset($_POST['txtLastName']) ? $_POST['txtLastName'] : '' ?>"/></p>
<p>Year of birth: <input type="text" name="txtYearOfBirth" id="textfield" value="<?php echo isset($_POST['txtYearOfBirth']) ? $_POST['txtYearOfBirth'] : '' ?>"/></p>
<p>Street: <input type="text" name="txtStreet" id="textfield" value="<?php echo isset($_POST['txtStreet']) ? $_POST['txtStreet'] : '' ?>"/></p>
<p>Number: <input type="text" name="txtNumber" id="textfield" value="<?php echo isset($_POST['txtNumber']) ? $_POST['txtNumber'] : '' ?>"/></p>
<p>Area Code: <input type="text" name="txtAreaCode" id="textfield"  value="<?php echo isset($_POST['txtAreaCode']) ? $_POST['txtAreaCode'] : '' ?>"/></p>
<p>Place: <input type="text" name="txtPlace" id="textfield"  value="<?php echo isset($_POST['txtPlace']) ? $_POST['txtPlace'] : '' ?>"/></p>
<p>Country: <input type="text" name="txtCountry" id="textfield"  value="<?php echo isset($_POST['txtCountry']) ? $_POST['txtCountry'] : '' ?>"/></p>
<p>E-mail*: <input type="text" name="txtEmail" id="textfield"  value="<?php echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '' ?>"/></p>
<p>Username*: <input type="text" name="txtUsername" id="textfield"/></p>
<p>Password*: <input type="password" name="txtPassword" id="textfield"/></p>
<p>Confirm password*: <input type="password" name="confirmPass" id="textfield"/></p>
<p>*Minimum information</p>

<button type="submit" id="submit">
<img src="SubmitButton.PNG"  height="30px" alt="submit" />
</button>

</form>
</div>

<?php
if(isset($_POST['txtUsername']))
{
$FirstName = $_POST['txtFirstName'];
$LastName = $_POST["txtLastName"];
$YearOfBirth = $_POST["txtYearOfBirth"];
$Street = $_POST["txtStreet"];
$Number = $_POST["txtNumber"];
$AreaCode = $_POST["txtAreaCode"];
$Place = $_POST["txtPlace"];
$Country = $_POST["txtCountry"];
$Email = $_POST["txtEmail"];
$Username = $_POST["txtUsername"];
$Password = $_POST["txtPassword"];
$ConfirmPassword = $_POST["confirmPass"];

	if(file_exists('users/' . $Username . '.xml'))
	{print "<div id='error'>Error: Username already exists</div>";}
	else if($FirstName =='')
	{print "<div id='error'>Error: First name is blank</div>";}
	else if($LastName =='')
	{print "<div id='error'>Error: Last name is blank</div>";}
	else if($Email == '')
	{print "<div id='error'>Error: Email is blank</div>";}
	else if($Username == '')
	{print "<div id='error'>Error: Username is blank</div>";}
	else if($Password == '')
	{print "<div id='error'>Error: Password is blank</div>";}
	else if($ConfirmPassword == '')
	{print "<div id='error'>Error: Please confirm your password</div>";}
	else if($Password != $ConfirmPassword)
	{print "<div id='error'>Error: Passwords do not match</div>";}

	else
	{
			
		$xml = new SimpleXMLElement('<root></root>');
		$user=$xml->addChild('user');
		$user->addChild('password', md5($Password));
		$user->addChild('email', $Email);
		$user->addChild('first_name',$FirstName);
		$user->addChild('last_name',$LastName);
		$user->addChild('birth_year',$YearOfBirth);
		$user->addChild('street',$Street);
		$user->addChild('nr',$Number);
		$user->addChild('area_code',$AreaCode);
		$user->addChild('place',$Place);
		$user->addChild('country',$Country);
		$user->addChild('email',$Email);
		$xml->asXML('users/' . $Username . '.xml');
		header('Location: login.php');
	}
}

?>



</body>
</html>