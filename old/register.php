<?php 
    include("connection.php");
    
?>

<!DOCTYPE html>
    <head>
        <title>Sign In</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
<?php 
    function clean($str)
    {
        return htmlentities($str);
    }

    function user_exists($user)
{
    $user = filter_var($user,   FILTER_SANITIZE_STRING);
    $query = "SELECT id FROM users WHERE username = '$user'";
    if (row_count(query($query))) {
        return true;
    } else {
        return false;
    }
}

function email_exists($email)
{
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $query = "SELECT id FROM users WHERE email = '$email'";
    if (row_count(query($query))) {
        return true;
    } else {
        return false;
    }
}
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $first_name = clean($_GET['first_name']);
        $last_name = clean($_GET['last_name']);
        $username = clean($_GET['username']);
        $email = clean($_GET['email']);
        $password = clean($_GET['password']);
        //$confirm_password = clean($_POST['confirm_password']);
        if (strlen($first_name) < 3) {
            $errors[] = "Your First Name cannot be less then 3 characters";
        }
        if (strlen($last_name) < 3) {
            $errors[] = "Your Last Name cannot be less then 3 characters";
        }
        if (strlen($username) < 3) {
            $errors[] = "Your Username cannot be less then 3 characters";
        }
        if (strlen($username) > 20) {
            $errors[] = "Your Username cannot be bigger then 20 characters";
        }
        if (email_exists($email)) {
            $errors[] = "Sorry that Email is already is taken";
        }
        if (user_exists($username)) {
            $errors[] = "Sorry that Username is already is taken";
        }
        if (strlen($password) < 8) {
            $errors[] = "Your Password cannot be less then 8 characters";
        }
        if ($password != $confirm_password) {
            $errors[] = "The password was not confirmed correctly";
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="alert alert alert-danger">' . $error . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button></div>';
            }
        } else {
            $first_name = filter_var($first_name,   FILTER_SANITIZE_STRING);
            $last_name  = filter_var($last_name,    FILTER_SANITIZE_STRING);
            $username   = filter_var($username,     FILTER_SANITIZE_STRING);
            $email      = filter_var($email,        FILTER_SANITIZE_EMAIL);
            $password   = filter_var($password,     FILTER_SANITIZE_STRING);
            $password   = password_hash($password,PASSWORD_DEFAULT );
        }
        if(isset($first_name)&&isset($last_name)&&isset($username)&&isset($email)&&isset($password))
        {

            $sql = "INSERT INTO users (first_name,last_name,username,email,password) VALUES('$first_name','$last_name','$username','$email','$password')";
        
            if($conn->query($sql)===TRUE)
            {
                echo "
                <div class='alert alert-success alert-dismissible fade show'>
                
                <div class = 'row'>
                    <div class = 'col-sm-9'>
                    <strong>Sign Up successfully!</strong>
                    </div>
                    <div class = 'col-sm-2 float-end'>
                    <p><a href='login.php' class = 'text-white text-decoration-none btn btn-primary'>Login</a></p>
                    </div>
                    <div class = 'col-sm-1'>
                    <button type= 'button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                </div>
                </div>
                ";
            }
        }
        
    }

    ?>
    
    <div class = "container p-3">
        <h3>Sign in first to shopping from store</h3>
    <form action = "register.php" method = "GET">
    <br>
    <div class="mb-3 row">
    
    <label for="inputEmail" class="col-sm-2 col-form-label">First name</label>
    <div class="col-sm-10">
    <input type="text" name="first_name" class="form-control col-sm-10" placeholder="Your first name" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    
    <label for="inputEmail" class="col-sm-2 col-form-label">Last name</label>
    <div class="col-sm-10">
    <input type="text" name="last_name" class="form-control col-sm-10" placeholder="Your last name" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>

    <div class="mb-3 row">
    
    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
    <input type="text" name="username" class="form-control col-sm-10" placeholder="Your username" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" class="form-control col-sm-10" placeholder="Your email" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
    <input type="password" name="password" class="form-control col-sm-10" placeholder="Your password" aria-label="Password" aria-describedby="basic-addon1" size="20" />
    </div>

  </div><br><br>
    <input type = "submit" class = "btn btn-primary" value ="Sign In">
    

</form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>