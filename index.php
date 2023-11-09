<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?

    if (($_POST['auth'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if (!empty($email) and !empty($pass)) {
            $db = @new mysqli('localhost', 'root', '', 'shop');


            if ($db->connection_errno) {
                echo "error: " . $db->connection_errno;

            } else {

                $query = $db->query("SELECT `email`,`pass` FROM `users` WHERE `email`='$email' AND `pass`='$pass';");


                if ($query->num_rows == 0) {

                    ?>
                    <div class="message_login">
                        <?
                        echo "Неверное Имя или Пароль !!!";
                        ?>
                    </div>
                <?

                }else{
                 
                    header("Location: userpage.php");

                }

            }


        }


    }

    ?>

    <section>

        <div class="reg-input">
            <form method="post">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="pass" required>
                    <label for="">Password</label>
                </div>
                <input type="submit" name="auth" value="Log In">
                <div class="register">
                    <p>Don't have an account? <a href="reg.php">Register Now</a></p>
                </div>
        
            </form>
        </div>

    </section>

    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>