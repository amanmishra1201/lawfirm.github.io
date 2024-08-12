<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    
</head>
<body>
    <center>

        <dev class="form-wrapper">
    <div class="centered-form">
        <h4>
            <?php
                error_reporting(0);
                session_start();
                echo $_SESSION['loginMessage'];

            ?>
        </h4>

        <h2>Ram Prakash Mishra Law Firm Login</h2>
        <form action="login_check.php" method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
</center>
</body>
</html>
