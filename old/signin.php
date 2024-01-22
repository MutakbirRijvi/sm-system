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

    
     
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
            
        if(isset($_POST['firstname']))
        {
            //$user_id  = $_GET['user_id'];
            //$user_id  = $_GET['user_id'];

                $firstname = clean($_POST['firstname']);
                $lastname = clean($_POST['lastname']);
                $email = clean($_POST['email']); 
                $pass = clean($_POST['pass']); 
                if (strlen($firstname) < 3 || is_numeric($firstname)) {
                    $firstnameerror = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Your First Name cannot be less than 3 characters or numeric!</p></div>
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>
                    ";
                }
                if (strlen($lastname) < 3 || is_numeric($lastname)) {
                    $lastnameerror = "
                    <div class = 'row alert alert-danger alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Your Last Name cannot be less than 3 characters or numeric!</p></div>
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>";
                }
                
                $query1 = mysqli_query($conn,"SELECT user_id FROM user WHERE email = '$email'");
                    if(mysqli_num_rows($query1)>0)
                    {
                            $emailerror = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                            <div class = 'col-sm-11'><p>Sorry that Email is already taken!</p></div>
                            <div class='col-sm-1'>
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                            </div>
                            ";
                    }
                    else if(empty($email))
                    {
                            $Emailempty = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                            <div class = 'col-sm-11'><p>please enter Email address!</p></div>
                            <div class='col-sm-1'>
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                            </div>
                            ";
                    }
                            
                if (strlen($pass) < 8) {
                    $passerror = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Your Password cannot be less then 8 characters!</p></div>
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>
                    ";
                }
                else {
                    //if(isset($firstname) && isset($lastname) && isset($email) && isset($pass))
                    $firstname = filter_var($firstname,   FILTER_SANITIZE_STRING);
                    $lastname  = filter_var($lastname,    FILTER_SANITIZE_STRING);
                    $email      = filter_var($email,        FILTER_SANITIZE_EMAIL);
                    $pass   = filter_var($pass,     FILTER_SANITIZE_STRING);
                    $pass   = password_hash($pass,PASSWORD_DEFAULT );
                    
                }
                }
          
                
        
        
            if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($pass) && !is_numeric($firstname) && !is_numeric($lastname) && !mysqli_num_rows($query1) && strlen($pass) > 8 && strlen($lastname) > 3 && strlen($firstname) > 3)
            {
            $sql = "INSERT INTO user (firstname,lastname,email,pass) VALUES('$firstname','$lastname','$email','$pass')";
        
            if($conn->query($sql)==TRUE)
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
                " ;
                
            }
        }
            else
            {
                $Failed = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Please Fill out the form correctly!</p></div>
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>";
          
            }
            
            
        

    }
        

    ?>
    
    <div class = "container p-3">
    <h3>Sign in first to shopping from store</h3>
    <form action = "signin.php" method = "POST"> 
    <br>
    <div class="mb-3 row">
    <span><?php if(isset($Failed)) echo $Failed;?></span>
    <span><?php if(isset($firstnameerror)) echo $firstnameerror;?></span>
    <label for="inputEmail" class="col-sm-2 col-form-label">First name</label>
    <div class="col-sm-10">
    <input type="text" name="firstname" class="form-control col-sm-10 w-25" placeholder="Your first name" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <span><?php if(isset($lastnameerror)) echo $lastnameerror;?></span>
    <label for="inputEmail" class="col-sm-2 col-form-label">Last name</label>
    <div class="col-sm-10">
    <input type="text" name="lastname" class="form-control col-sm-10 w-25" placeholder="Your last name" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <span><?php if(isset($Emailempty))echo $Emailempty;?></span>
    <span><?php if(isset($emailerror))echo $emailerror;?></span>
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" class="form-control col-sm-10 w-25" placeholder="Your email" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <span><?php if(isset($passerror)) echo $passerror;?></span>
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
    <input type="password" name="pass" class="form-control col-sm-10 w-25" placeholder="Your password" aria-label="Password" aria-describedby="basic-addon1" size="20" />
    </div>
  </div><br><br>
    <input type = "submit" class = "btn btn-primary" value ="Sign In">
    

</form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>