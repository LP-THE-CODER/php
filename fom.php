<!DOCTYPE html>
<html>
<head>
My first Form Creation in PHP---->*~*
</head>
<body>
<?php
$name=$email=$gender=$age=$website=" ";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name=test_input($_POST["name"]);
  $email=test_input($_POST["email"]);
  $gender=test_input($_POST["gender"]);
  $age=test_input($_POST["age"]);
  $website=test_input($_POST["website"]);
}

function test_input($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}
?>

<h2> PHP FORM -VALIDATION <h2>
<form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name">
<br><br>
E-mail:<input type="text" name="email">
<br><br>
Age:<input type="number" name="age">
<br><br>
Website:<input type="text" name="website">
<br><br>
Gender: 
<input type="radio"' name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="others">Others
<br><br>
<input type="submit" name="submit" value="Submit" >
</form>
<?php
echo"<h2> Your Details Here :</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $age;
echo "<br>";
echo $website;
echo "<br>";
echo $gender;
?>

</body>
</html>


