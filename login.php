<?php
// Database connection
@include './Includs/db.php';

session_start();

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");

    if ($stmt) {
        // Bind the email parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];

                    // Redirect based on user type
                    if (strtolower($user['type']) === 'admin' ) {
                        header('Location: AdminPanle/dashboard.php?pages=adminDash');
                        
                    } else {
                        header('Location: AdminPanle/user_dashboard.php');
                        
                    }
                } else {
                    // Incorrect password
                    $error_message = "Invalid password. Please try again.";
                }
            } else {
                // Email not found
                $error_message = "No account found with this email.";
            }
        } else {
            // Query execution failed
            $error_message = "Failed to execute query. Please try again.";
        }
    } else {
        // Query preparation failed
        $error_message = "Failed to prepare query. Please try again.";
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
            min-height: 100vh;
            padding: 0 10px;
            background: #f4f4f4;
            padding-top: 3%;
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
        #input_label input{
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            color: #000;
            font-size: 13px;
            border-radius: 15px;
            margin-top: 10px;
            margin-bottom: 17px;
            background-color: #e8f0fe;
        }
        #login_btn{
            width: 100%;
            padding: 10px;
            background-color: #079d49;
            color: #fff;
            border-radius: 15px;
            font-size: 18px;
            text-align: center;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
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
        <form id="form_data" method="POST" action="" enctype="multipart/form-data">
            <div class="flex justify-center">
                <img class="w-36 mb-5" src="https://i.ibb.co.com/5Y53PdM/shohoz-logo-new.png" alt="">
            </div>
            <div class="text-center mb-8 font-bold text-black text-2xl">
            <h2>Sign In</h2>
            </div>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div class="flex justify-between px-3 text-[#079d49] mb-4">
                <a class="text-sm" href="">Don’t have an account?</a>
                <a class="text-sm" href="register.php">Register Now</a>
            </div>
            <div id="input_label">
                <input class="" type="text" name="email" id="email" placeholder="Email Address Or Mobile Number" required><br>
                <input class="" type="password" name="password" id="password" placeholder="Enter Your Password" required><br>
                <a class="flex justify-end pt-1 text-[14px] text-[#e39752]" href="">Forgot Your Password?</a><br>
                <button id="login_btn" name="loginBtn" class="font-semibold">Login</button>
            </div>
        </form>
    </section>
</body>
</html>
