<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background: #d1d1d1;
            padding-top: 10%;
        }
        #form_data{
            background-color: rgb(255, 255, 255);
            margin-left: 30%;
            width: 100%;
            max-width: 430px;
            box-shadow: 6px 6px 15px rgb(170,170,170);
            padding: 25px;
            border-radius: 10px;
            float: left;
        }
        #input_label input{
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 6px;
            margin-top: 10px;
            margin-bottom: 7px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2></h2>
    <section>
        <form id="form_data" action="">
            <div id="input_label">
                <input class="" type="text" name="email" id="email" placeholder="Email Address Or Mobile Number"><br>
                <input class="" type="password" name="password" id="password" placeholder="Enter Your Password"><br>
                <a href="#">Forgot Your Password?</a><br>
                <button><a href="#">Login</a></button>
            </div>
        </form>
    </section>
</body>
</html>