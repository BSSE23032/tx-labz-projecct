<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sign In</title>
    <style>
    body{
        padding-top: 10px;
        text-align: center;
        border: 1px solid;
        margin-top: 50px;
        margin-left: 430px;
        margin-right: 430px;
    }
    .signin{/*For sign in heading*/
        font-size: 30px;
        margin-top: 0px;
    }
    #contact {/*For input of email/contact */
        border: 2px solid rgb(43, 114, 196);
        height: 40px;
        width: 400px;
    }
    .link{/*For styling of links*/
        color: solid rgb(43, 114, 196);
        font-size: 18px;
        padding-right: 50px;
    }
    .message{/*For styling of helping messages*/
        font-size: 20px;
    }
    .link1{/*For styling of the new account link/button */
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
    </style>
</head>
<body>
<!-- google logo -->    
<div class="box">
        <center><img src="google.png" alt="Google Image" height="80px"></center>
        <p class="signin">Sign in</p>
        <p class="message">Use your Google Account</p>
<!-- php for Sign In page -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $contact = $_POST['contact'];
            if (!empty($contact)) {
                echo "<p style='color:darkblue;'>Login successful for: " . htmlspecialchars($contact) . "</p>";
            } else {
                echo "<p style='color:red;'>Please enter your email or phone.</p>";
            }
        }
        ?>

<form action="" method="post">
            <label for="contact">
                <input type="text" name="contact" id="contact" placeholder="Email or phone"><br>
                <a href="#" class="link">Forgot email?</a>
            </label><br>
            <p>Not your computer? Use Guest mode to sign in privately.</p>
            <a href="#" class="link">Learn more</a><br><br>
            
            <!-- link of next page -->
            <a href="gmail_signUp_page.php" class="link1">Create account</a>
            <button type="submit" class="button">Next</button>
        </form>
    </div>
</body>
</html>
