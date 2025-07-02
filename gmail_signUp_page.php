<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sign Up</title>
    <style>
    input{/*For styling of inputs section in form*/
        border: 2px solid rgb(43, 114, 196);
    }
    body {
        padding-top: 10px;
        border: 1px solid;
        margin-left: 300px;
        margin-right: 350px;
        display: flow-root;
    }
    #heading{/*For styling of heading*/
        font-size: 25px;
    }
    .box{
        margin-left: 10px;
        margin-bottom: 10px;
    }
    .link1{/*For styling of the sign in link/button */
        color: solid rgb(43, 114, 196);
        font-size: 18px;
        padding-right: 250px;
    }
    .button{/*For styling of "Next" button*/
        color: white; 
        height: 30px;
        width: 70px;
        background-color: blue; 
        border:1px solid blue;
        cursor: pointer;
    }
    .img {/*For styling of the google's image*/
        margin-top: 10px;
        padding-right: 50px;
        float: right;
        margin-left:10px ;
    }
    .guide-text{
        font-size: 15px;
        color: gray;
    }
    a{/*For styling of links*/
        color: rgb(43, 114, 196);
    }
    </style>
</head>

<body>
    <div class="box">
   <!-- google's logo -->
    <center><img src="google.png" alt="Google Image" height="80px"></center>
    <!-- Google's sign up portal image -->    
    <div class="img"><img src="google2.png" alt="Google Image" height="250px"></div>
        <p id="heading">Create your Google Account</p>
<!-- php for Signup page -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST['firstName'] ?? '';
            $lastName = $_POST['lastName'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmPassword'] ?? '';

            if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($password) && !empty($confirmPassword)) {//if al the fields are fill then if commands will execute
                if ($password === $confirmPassword) {//if both passwords are equal then if commands will execute
                    echo "<p style='color:darkblue;'>Account created successfully"."!</p>";
                } else {
                    echo "<p style='color:red;'>Passwords do not match!</p>";
                }
            } else {
                echo "<p style='color:red;'>All fields are required!</p>";
            }
        }
        ?>

        <form action="" method="post">
            <label for="name">
                <input type="text" name="firstName" placeholder="First Name">
                <input type="text" name="lastName" placeholder="Last Name"><br>
            </label><br>
            <label for="username">
                <input type="text" name="username" placeholder="Username"><br>
            </label>
            <p class="guide-text">You can use letters, numbers, and periods.</p>
            <a href="#">Use my current email address instead</a><br><br>
            <label for="password">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirmPassword" placeholder="Confirm">
            </label>
            <p class="guide-text">Use 8 or more characters with a mix of letters, numbers & symbols.</p>
            <input type="checkbox" id="Show">
            <label for="Show">Show Password</label><br>
<!-- Link of the previous page -->
            <a href="gmail_signIn_page.php" class="link1">Sign in instead</a>
            <button type="submit" class="button">Next</button>
        </form>
    </div>

</body>

</html>