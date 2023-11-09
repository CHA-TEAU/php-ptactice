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


if (($_POST['reg'])) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    

    if (!empty($login) and !empty($pass) and !empty($email)) {
        $db = @new mysqli('localhost', 'root', '', 'shop');


        if ($db->connection_errno) {
            echo "error: " . $db->connection_errno;

            

        } else {

        
                $query = $db->query("INSERT INTO `users` (`id`, `login`, `pass`, `email`) VALUES (NULL, '$login', '$pass', '$email')");

                if ($query) {

                    header("Location: userpage.php");

                }else {

                    ?>
                    <div class="message_login">
                        <?
                        echo "Данный Login Существует!!!";
                        ?>
                    </div>
                <?
                }


            

        }
    }

}

?>


    <section>

  

        <div class="reg-input">
            <form method="post">
                <h2>Registration</h2>
                <div class="inputbox">
                    <input type="text" name="email" required>
                    <label for="">Email</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="login" required>
                    <label for="">Login</label>
                </div>

                <div class="inputbox">
                    <input type="password" name="pass" required>
                    <label for="">Password</label>
                </div>

                <input type="submit" class="btn" name="reg">

                
            </form>
        </div>

    </section>
    


   
</body>

</html>
</html>