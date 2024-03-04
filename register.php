<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"  type="text/css" href="style.css">
</head>
<body>
    <!-- for php code --->
    <?php
        // for validation;
        $nameError = "The User_name field is required!";
        $emailError = "The User_email field is required!";
        $passwordError = "The User_password field is required!";
        $comfirmpassError = "The User_comfirmpassword field is required!";
        $addressError = "The User_address field is required!";

        require ("database_connection.php");
        if(isset($_POST['register_btn'])){
           $user_name = $_POST['name'];
           $user_email = $_POST['email'];
           $user_password = $_POST['password'];
           $user_comfirm_password = $_POST['comfirm-password'];
           $user_address = $_POST['address'];

           $query = "INSERT INTO users (name,email,password,address)
           VALUES 
           ('$user_name','$user_email','$user_password','$user_address');";
           $result = mysqli_query($db,$query);
           if($result == true){
                echo "<script>alert('Registration Successfully');</script>";
           }else{
                die('Error');
           }
        }
    ?>
    <header>
        <h2 class="logo">Logo</h2>
        <form action="register.php" method="POST">
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Service</a>
            <a href="#">Contact</a>
            <a href="index.php"> << Back</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Registration</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-circle"></ion-icon>
                    </span>
                    <input type="text" name="name">
                    <label>Name</label>
                    <i class="text-danger">
                        <?php echo $nameError; ?>
                    </i>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="text" name="email">
                    <label>Email</label>
                    <i class="text-danger">
                        <?php echo $emailError; ?>
                    </i>
                </div>
                
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password">
                    <label>Pass</label>
                    <i class="text-danger">
                        <?php echo $passwordError; ?>
                    </i>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="comfirm-password">
                    <label>Comfrim Pass</label>
                    <i class="text-danger">
                        <?php echo $comfirmpassError; ?>
                    </i>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="home"></ion-icon>
                    </span>
                    <input type="address" name="address">
                    <label>Address</label>
                    <i class="text-danger">
                        <?php echo $addressError; ?>
                    </i>
                </div><br>
                <div class="remember-forgot">
                   <label>
                        <input type="checkbox">
                        I agree to the terms & conditions
                   </label>
                   <!--a href="#">Forgot Password?</a-->
                </div>
                <button type="submit" name="register_btn" class="btn-register" >Register</button>
                <p style="color:white">Already have an account? <a href="login.php">Login</a> </p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>