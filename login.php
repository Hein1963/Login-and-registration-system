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
        <header>
            <h2 class="logo">Logo</h2>
            <form action="" method="POST">
            <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Service</a>
                <a href="#">Contact</a>
                <a href="index.php"> << Back</a>
            </nav>
        </header>
        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
        
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person-circle"></ion-icon>
                        </span>
                        <input type="text" name="name">
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input type="text" name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" name="password">
                        <label>Comfrim Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="home"></ion-icon>
                        </span>
                        <input type="text" name="address">
                        <label>Address</label>
                    </div>
                    <div class="login-box">
                        <span class="icon">
                            <ion-icon name="lock-open"></ion-icon>
                        </span>
                        <button class="login">Login</button>
                    </div>
                    <div class="login-register">
                        <p>
                            Don't have an account?
                            <a href="register.php">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>
