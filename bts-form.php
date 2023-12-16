<!DOCTYPE html>
<html>

<head>
    <title>BTS concert - Ticket Form: </title>
<style>
.error{color:#FF0000;}
</style>
</head>
<body>
    <?php
    $nameErr = $ageErr = $emailErr = $genderErr = $phoneErr = " ";
    $name = $age = $email = $gender = $phone = $income = $location = $bias = $comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and white spaces
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        } else {
            $age = test_input($_POST["age"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email id is entered correctly or not
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
        }

        $income = isset($_POST["income"]) ? test_input($_POST["income"]) : "";
        $location = test_input($_POST["location"]);
        $bias = isset($_POST["bias"]) ? test_input(implode(", ", $_POST["bias"])) : "";
        $comment = test_input($_POST["comment"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <h2>Concert Form Details</h2>
    <p><span class="error">*required field </span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <br><br>
        Name: <input type="text" name="name"> <span class="error">* <?php echo $nameErr; ?></span> <br><br>
        Age: <input type="number" name="age"> <span class="error">* <?php echo $ageErr; ?></span> <br><br>
        E-mail: <input type="email" name="email"> <span class="error">* <?php echo $emailErr; ?></span> <br><br>
        Phone: <input type="number" name="phone"> <span class="error">* <?php echo $phoneErr; ?></span> <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span> <br><br>
        Income:
        <input type="radio" name="income" value="yes">Yes
        <input type="radio" name="income" value="no">No
        <br><br>
        Location: <input type="text" name="location"> <br><br>
        Bias:
        <input type="radio" name="bias" value="all">ALL
        <input type="checkbox" name="bias[]" value="v">V
        <input type="checkbox" name="bias[]" value="jk">JK
        <input type="checkbox" name="bias[]" value="jm">jimin
        <input type="checkbox" name="bias[]" value="jh">J-hope
        <input type="checkbox" name="bias[]" value="rm">Namjoon
        <input type="checkbox" name="bias[]" value="jin">Jin
        <input type="checkbox" name="bias[]" value="suga">Suga
        <br><br> Comment: <textarea name="comment" rows="5" cols="40"></textarea> <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    echo "<h2>The Details You Have Entered are:</h2>";
    echo $name . "<br>";
    echo $age . "<br>";
    echo $email . "<br>";
    echo $phone . "<br>";
    echo $gender . "<br>";
    echo $income . "<br>";
    echo $location . "<br>";
    echo $bias . "<br>";
    echo $comment . "<br>";
    ?>
</body>

</html>