<?php
    session_start();
    require ("database_connection.php");

    if(!isset($_SESSION['user_array'])){
        header('location:login.php');
    }else{
        if($_SESSION['user_array']['role'] != 'Admin'){
            header('location:user-dashboard.php');
        }
    }

    

    
    
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
    <!--***************php codes for edit************************-->
    <?php
        //USER EDIT
        $user_edition_form_status = false;

        if(isset($_GET['user_id_to_update'])){

            $user_edition_form_status = true;

            $user_id_to_update = $_GET['user_id_to_update'];
            $query = "SELECT * FROM users WHERE id=$user_id_to_update"; 
            $result = mysqli_query($db,$query);
            if($result){
                $user = mysqli_fetch_assoc($result);
            }else{
                die('Error'. mysqli_error($db));
            }
        }

        //USER UPDATE
        if(isset($_POST['btn-update'])){
            $user_id = $_POST['user_id'];

            //for update password;
            $query = "SELECT password FROM users WHERE id=$user_id";
            $user_pass = mysqli_query($db,$query);
            $user_array = mysqli_fetch_assoc($user_pass);
            $old_password = $user_array['password'];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $input_password = $_POST['password'];
            $role = $_POST['role'];

            /*$new_password = $old_password != $input_password ? md5($input_password) : $input_password; */
            if($old_password != $input_password){
                $update_password = md5($input_password);
                $updated_password = sha1($update_password);
                $latest_version_pass = crypt($updated_password,$updated_password);
                $new_password = $latest_version_pass;
            }else{
                $new_password = $input_password;
            }
            
            $query = "UPDATE users SET name='$name' , email='$email' , password='$new_password' , address='$address' , role='$role' WHERE id=$user_id";
            $result = mysqli_query($db,$query);
            if($result){
                echo "<script>alert('A User Updated Successfully');</script>";
            }else{
                die('Error: '. mysqli_error($db));
            } 
        }

        //User Delete;
        if(isset($_GET['user_id_to_delete'])){
            $user_id_to_delete = $_GET['user_id_to_delete'];
            $query = "DELETE FROM users WHERE id=$user_id_to_delete";
            $result = mysqli_query($db,$query);
            if($result){
                echo "<script>alert('A User Deleted Successfully');</script>";
                header('location:admin-dashboard.php');
            }else{
                die('Error: '. mysqli_error($db));
            }
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
                                <form action="logout.php" method="GET">
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
                                            Role:
                                            <span class="badge bg-success">
                                                <?php echo $_SESSION['user_array']['role']; ?>
                                            </span>
                                        </div>
                                        <div>
                                            Name: <?php echo $_SESSION['user_array']['name']; ?>
                                        </div>
                                        <div>
                                            Email: <?php echo $_SESSION['user_array']['email']; ?>
                                        </div>
                                        <div>
                                            Address: <?php echo $_SESSION['user_array']['address']; ?>
                                        </div>
                                        <div>
                                            Password: <?php echo $_SESSION['user_array']['password']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($user_edition_form_status == true): ?>
                                <div class="card mt-3">
                                    <div class="card-header" style="background:skyblue">
                                        <div class="card-heading">User Edition From</div>
                                    </div>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="card-body">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Address</label>
                                            <textarea name="address" rows="1" class="form-control">
                                                <?php echo $user['address']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" value="<?php echo $user['password']; ?>">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Role</label>
                                            <select  name="role" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Admin" <?php if($user['role'] == 'Admin'){ ?> selected <?php } ?> >
                                                    Admin
                                                </option>
                                                <option value="user" <?php if($user['role'] == 'user'){ ?> selected <?php } ?>>
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button name="btn-update" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                                <?php endif ?>
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
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = "SELECT * FROM users";
                                        $result = mysqli_query($db,$query);
                                        foreach($result as $user){

                                        ?>
                                        <tr>
                                            <td><?php echo $user['id']; ?></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><?php echo $user['address']; ?></td>
                                            <td><?php echo $user['role']; ?></td>
                                            <td>
                                                <a href="admin-dashboard.php?user_id_to_update=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">
                                                    Edit
                                                </a>
                                                <a href="admin-dashboard.php?user_id_to_delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
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