<?php
    session_start();
    
    if(!isset($_SESSION['user_array'])){
        header('location:login.php');
    }

    require ("database_connection.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin-dashboard.css">
    <style type="text/css">
        body{
            background-color: ;
        }
    </style>
</head>
<body>
    <!---**************for php code for logout action*****************--->
    <?php 
        if(isset($_POST['logout-btn'])){
            session_destroy();
            header('location:login.php');
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background:skyblue">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <a href="admin-dashboard.php" style="text-decoration:none">
                                        <h6 style="color:white">Admin-Dashboard</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="admin-dashboard.php" method="POST">
                                    <button type="submit" name="logout-btn" class="btn btn-danger btn-small float-end" onclick="return confirm('Are you sure you want to logout?');">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6> Admin-information </h6>
                                        <div>
                                            Name: <?php echo $_SESSION['user_array']['name']; ?>
                                        </div>
                                        <div>
                                            Email: <?php echo $_SESSION['user_array']['email']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h5>User List</h5>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Moe Htet</td>
                                            <td>moehtet@gmail.com</td>
                                            <td>Mandalay</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>