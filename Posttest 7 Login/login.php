<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="img/unmul.png" alt="logo unmul" width="70%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p>Belum punya akun?
                <a href="register.php">Register</a>
            </p>
        </div>
    </div>
</body>
</html>

<?php
    require'config.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        echo $user;

        $sql = "SELECT * FROM akun WHERE username='$user' OR email='$user'";
        $result = $db->query($sql);


        //cek akun ada atau tidak ada
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $username = $row['username'];
            echo $row['psw'];

            //cek password apakah valid atau tidak
            if(password_verify($password, $row['psw'])){
                echo "<script> 
                        alert('Selamat Datang $username');   
                        document.location.href = 'index.php';  
                </script>";
            }else {
                echo "<script> 
                    alert('Username dan Password anda salah');     
                </script>";
            }
        }else {
            echo "<script> 
                 alert('Username dan password anda belum teregistrasi');   
             </script>";
        }
    }
?>