<?php
@include './Includs/db.php'; 

$errors = []; 

if (isset($_POST['registerBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['secondName']);
    $type = $_POST['type'];
    $email = trim($_POST['email']);
    $number = trim($_POST['number']);
    $pass = $_POST['password'];
    $cPass = $_POST['cpassword'];
    $uploadDir = 'uploads/images/'; 
    $fileName = $_FILES['profilePhoto']['name'] ?? '';
    $fileTmpName = $_FILES['profilePhoto']['tmp_name'] ?? '';
    $fileError = $_FILES['profilePhoto']['error'] ?? '';

    // Validate required fields
    if (empty($firstName)) $errors['firstName'] = "First Name is required.";
    if (empty($lastName)) $errors['secondName'] = "Last Name is required.";
    if (empty($type)) $errors['type'] = "Type is required.";
    if (empty($email)) $errors['email'] = "Email is required.";
    if (empty($number)) $errors['number'] = "Mobile Number is required.";
    if (empty($pass)) $errors['password'] = "Password is required.";
    if ($pass !== $cPass) $errors['cpassword'] = "Passwords do not match.";

    // Validate and upload the file if any
    if (empty($errors['profilePhoto'])) {
        if ($fileError === UPLOAD_ERR_NO_FILE) {
            // Optionally, handle when no file is uploaded
        } elseif ($fileError !== UPLOAD_ERR_OK) {
            $errors['profilePhoto'] = "An error occurred during file upload.";
        } else {
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                $errors['profilePhoto'] = "Only JPG, JPEG, and PNG files are allowed.";
            } else {
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $targetFile = $uploadDir . $uniqueFileName;
                // Move file to upload directory
                move_uploaded_file($fileTmpName, $targetFile);
            }
        }
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Check if email already exists
        $select = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already registered.";
        } else {
            // Hash password before saving to the database
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
            $name = $firstName . ' ' . $lastName;

            // Insert new user into the database
            $insert = "INSERT INTO users (name, number, email, password, type) 
                       VALUES ('$name', '$number', '$email', '$hashedPassword', '$type')";

            if (mysqli_query($conn, $insert)) {
                header('Location: login.php');
                exit;
            } else {
                $errors['general'] = "Error: " . mysqli_error($conn);
            }
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
            height: 125vh;
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
            margin-bottom: 10px;
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
            margin-top: 6px;
        }
        
        .upload-btn {
            display: inline-block;
            background-color: #e8f0fe; /* Red color */
            color: gray;
            padding: 10px 15px;
            border: none;
            border-radius: 13px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            
        }

        .upload-btn input {
            display: none;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
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
                <div id="nameInput" class = "flex gap-5">
                    <div>
                        <input type="text" name="firstName" id="name" placeholder="First Name" value="<?= isset($firstName) ? htmlspecialchars($firstName) : '' ?>">
                        <small class="text-red-500"><?= $errors['firstName'] ?? '' ?></small>
                    </div>
                    <div>
                        <input type="text" name="secondName" id="name" placeholder="Last Name" value="<?= isset($lastName) ? htmlspecialchars($lastName) : '' ?>">
                        <small class="text-red-500"><?= $errors['secondName'] ?? '' ?></small>
                    </div>
                </div>
                <!-- User Type -->
                <div id="nameInput" class = "grid grid-cols-2 gap-5">
                    <div id="nameInput">
                        <select name="gender" id="gender" class='w-full'>
                            <option value="gander" >Gender</option>
                            <option value="male" >Male</option>
                            <option value="female" >Female</option>
                        </select>
                        <small class="text-red-500"><?= $errors['gender'] ?? '' ?></small>
                    </div>
                    <div>
                        <select name="type" id="type">
                            <option value="">Select Type</option>
                            <option value="Admin" <?= isset($type) && $type === 'Admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="users" <?= isset($type) && $type === 'users' ? 'selected' : '' ?>>User</option>
                        </select>
                        <small class="text-red-500"><?= $errors['type'] ?? '' ?></small>
                    </div>
                </div>
                <!-- Email -->
                <div id="nameInput" class="flex gap-5">
                    <div>
                        <input type="email" name="email" id="email" placeholder="Email Address" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
                        <small class="text-red-500"><?= $errors['email'] ?? '' ?></small>
                    </div>
                    <div>
                        <input type="number" name="number" id="number" placeholder="Mobile Number" value="<?= isset($number) ? htmlspecialchars($number) : '' ?>">
                        <small class="text-red-500"><?= $errors['number'] ?? '' ?></small>
                    </div>
                </div>

                <!-- Password -->
                <div id="input_label" class= 'grid grid-cols-2 gap-5'>
                    <div>
                        <input type="password" name="password" id="password" placeholder="Password">
                        <small class="text-red-500"><?= $errors['password'] ?? '' ?></small>
                    </div>
                    <div>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                        <small class="text-red-500"><?= $errors['cpassword'] ?? '' ?></small>
                    </div>
                </div>
                <!-- Profile Photo -->
                <div class="w-full mb-4">
                    <label class="upload-btn">
                    Click to upload
                    <input type="file" name="profilePhoto" accept=".jpg, .jpeg, .png" id="fileInput" onchange="showFileName()">
                </label>
                <div class="file-name mt-5 px-3 py-3 text-[gray] rounded-xl bg-[#e8f0fe]" id="fileName">No file chosen</div>
                    <small class="text-red-500"><?= $errors['profilePhoto'] ?? '' ?></small>
                </div>

                <!-- Submit Button -->
                <div>
                    <button id="register_btn" name="registerBtn" class="font-semibold">Register</button>
                </div>
        </form>
    </section>




    <script>
        function showFileName() {
            const input = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');
            fileName.textContent = input.files[0] ? input.files[0].name : "No file chosen";
        }
    </script>
</body>
</html>