<?php 
    include("connection.php");
?>

<!DOCTYPE html>
    <head>
        <title>Log In</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
    <?php 
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['email']))
        {
            //$user_id  = $_GET['user_id'];
        
                $email = $_POST['email'];
                $pass = $_POST['pass'];
           
            //$sql = "SELECT * FROM user WHERE email = '$email' AND pass = 'password_verify($pass,$cpass)'";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $query = $conn->query($sql);
            $num = mysqli_num_rows($query);
            if($num == 1)
            {
                while($row = mysqli_fetch_assoc($query))
                {
                    if(password_verify($pass,$row['pass']))
                    {
                        
                        header("location:index.php");
                        
                    }
                    else if(empty($email) && empty($pass))
                    {
                        $empty = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                        <div class = 'col-sm-11'><p>Insert Email or password!</p></div>
                        <div class='col-sm-1'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        </div>
                        </div>";
                    }
                    else
                    {
                    $Failed = "<div class = 'row alert alert-danger alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Incorrect Email or password!</p></div>
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>";
                    }
                
                 }
            
            
            }
        
        }
    }
    
        


        

    ?>
    <br>
    <br>
    <br>
    <div class = "container">
        <h3>Login</h3>
        <br>
    <form action = "login.php" method = "POST"> 
    <div class="mb-3 row">
    <span><?php if(isset($empty)) echo $empty;?></span>    
    <span><?php if(isset($Failed)) echo $Failed;?></span>    
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" class="form-control col-sm-10 w-25" placeholder="Your email" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
    
    <input type="password" name="pass" class="form-control col-sm-10 w-25" placeholder="Your password" aria-label="Password" aria-describedby="basic-addon1" size="20" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
    <input type="submit" class = "btn btn-primary" value= "Log In">
    </div>
  </div>
  

</form>


    </div>
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>