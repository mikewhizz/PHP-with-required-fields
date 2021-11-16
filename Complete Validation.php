<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000}
    </style>
    <meta charset="UTF-8">
    <title>PHP Validation Form</title>
</head>
<body>

<?php
// define our variables and set them to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])){
        $nameErr = "Name is a required field";
    }else{
        $name = test_input ($_POST["name"]);
    }

    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])){
        $website = "";
    }else{
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["gender"])){
        $genderErr = "Gender is required";
    }else{
        $gender = test_input($_POST['gender']);
    }

    if (empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = test_input($_POST["comment"]);
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Apply Here</h2> <br>
<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?> </span>
    <br><br>
    E-mail: <input type="email" name="email">
    <span class="error">* <?php echo $emailErr; ?> </span>
    <br><br>
    Link to your Portifolio: <input type="text" name="website">
    <span class="error">* <?php echo $websiteErr; ?> </span>
    <br><br>
    Your Bio: <textarea name="comment" cols="40" rows="5"></textarea> <br><br>
    Gender: <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="other"> Other

    <span class="error">* <?php echo $genderErr; ?> </span>
    <br><br>
    <input type="submit" value="Submit">
</form>
<?php
echo "<br>";
echo "<h2>This is the information you have provided</h2>";
echo "<br>";
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