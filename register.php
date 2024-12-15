<?php
require('Includs/db.php'); // Database connection

if (isset($_POST['firstName'])) {
    // Get and sanitize form inputs
    $firstName = stripslashes($_POST['firstName']);
    $firstName = mysqli_real_escape_string($conn, $firstName);

    $lastName = stripslashes($_POST['lastName']);
    $lastName = mysqli_real_escape_string($conn, $lastName);

    $name = $firstName . ' ' . $lastName;

    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $confirmPassword = stripslashes($_POST['confirmPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $confirmPassword);

    $mobileNumber = stripslashes($_POST['number']);
    $mobileNumber = mysqli_real_escape_string($conn, $mobileNumber);

    $create_datetime = date("Y-m-d H:i:s");

    // Validate form data
    if ($password !== $confirmPassword) {
        echo "<div style='color: red; text-align: center;'>Passwords do not match!</div>";
    } elseif (empty($firstName) || empty($email) || empty($password)) {
        echo "<div style='color: red; text-align: center;'>All required fields must be filled out!</div>";
    } else {
        // Hash the password
        $hashedPassword = md5($password);

        // Insert query
        $query = "INSERT INTO `users` (name, password, email, mobile_number, create_datetime) 
                  VALUES ('$name', '$hashedPassword', '$email', '$mobileNumber', '$create_datetime')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect to dashboard on success
            header("Location: AdminPanle/dashboard.php");
            exit();
        } else {
            echo "<div style='color: red; text-align: center;'>Registration failed. Please try again later.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }
        
        body {
            height: 110vh;
            padding: 0 10px;
            background: #f4f4f4;
            padding-top: 2%;
        }
        #form_data{
            background-color: rgb(255, 255, 255);
            margin-left: 36%;
            width: 100%;
            max-width: 400px;
            box-shadow: 6px 6px 15px rgb(170,170,170);
            padding: 35px;
            border-radius: 10px;
            float: left;
        }
        #nameInput input, #nameInput select{
            width: 100%;
            padding: .75rem;
            border: none;
            outline: none;
            color: #000;
            font-size: 13px;
            border-radius: 15px;
            margin-top: 10px;
            margin-bottom: 12px;
            background-color: #e8f0fe;
        }
        #nameInput select {
            color: #555; 
            -webkit-appearance: none; 
            -moz-appearance: none; 
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><path fill="%23555" d="M0 0l5 5 5-5H0z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px 12px;
        }
        #input_label input{
            width: 100%;
            padding: 13px;
            border: none;
            outline: none;
            color: #000;
            font-size: 13px;
            border-radius: 15px;
            margin-top: 10px;
            margin-bottom: 16px;
            background-color: #e8f0fe;
        }
        #register_btn{
            width: 100%;
            padding: 10px;
            background-color: #079d49;
            color: #fff;
            border-radius: 15px;
            font-size: 18px;
            text-align: center;
        }
        
    </style>
</head>
<body>
        
    <section>
        <div class="ml-[37%] flex gap-5 mb-5">
            <a href="index.php"><i class="text-[#079d49] fa-solid fa-arrow-left"></i></a>
            <a class="text-black" href="index.php"> To Home Page</a>
        </div>
        <form id="form_data" method="POST" action=""  enctype="multipart/form-data">
            <div class="flex justify-center">
                <img class="w-36 mb-5" src="https://i.ibb.co.com/5Y53PdM/shohoz-logo-new.png" alt="">
            </div>
            <div class="text-center mb-8 font-bold text-black text-2xl">
            <h2>Sign Up</h2>
            </div>
            <div class="flex justify-between px-3 text-[#079d49] mb-4">
                <a class="text-sm" href="">Already, have an account?</a>
                <a class="text-sm" href="login.php">Login</a>
            </div>
            <!-- Name -->
            <div id="nameInput" class="flex items-center gap-2">
                <input class="" type="text" name="name" id="name" placeholder="First Name">
                <input class="" type="text" name="name" id="name" placeholder="Last Name">
            </div>
            <!-- Date Of Birth -->
            <div id="nameInput" class="flex items-center gap-2">
                <input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="Date Of Birth" onfocus="(this.type='date')" onblur="(this.type='text')">
                <select name="gender" id="gender">
                    <option value="Gander">Gander</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <!-- Number & Email -->
            <div id="nameInput" class="flex items-center gap-2">
                <input class="" type="number" name="number" id="number" placeholder="Mobile Number">
                <input class="" type="email" name="email" id="email" placeholder="Email Address">
            </div>
            <!-- Password & Submit Button -->
            <div id="input_label">
                <input class="" type="password" name="password" id="password" placeholder="Password"><br>
                <input class="" type="password" name="password" id="password" placeholder="Confirm Password"><br>
                <button id="register_btn" name="registerBtn" class="font-semibold"><a href="#">Register</a></button>
            </div>
        </form>
    </section>
</body>
</html>