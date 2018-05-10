<?php

session_start();

function generateToken( $formName )
{

return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function checkToken( $token)
{

    return $token ===$_SESSION['csrf_token'];
}


if (!$_SESSION["loged"]) {

    header('Location: index.php');
    exit();

} else {

    echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">

    <strong>Welcome!</strong>
  </div></div>';

}
if (isset($_POST['csrf_token']) && isset($_POST['fname']) && isset($_POST['lname'])) {

    if (checkToken($_POST['csrf_token'])) {
      echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">
Settings updated
    </div></div>';


    } else {

      echo '<div class="container">  <div class="alert alert-danger alert-dismissible fade in">

      invalid csrf token
    </div></div>';
    }

}



?>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>


   
                        <h1>Enter Details</h1>

                    


                        <form id="loginform" class="form-horizontal" role="form" method="post" action="control.php">

                           
                                   <h4>email</h4>
                                        <input id="username" type="text" class="form-control" name="fname" value="" placeholder="email">
                                 
<h4>telephone</h4>
                                  <input id="login-username" type="text" class="form-control" name="lname" value="" placeholder="telephone">
                                    </div>


                                  

                                          <input id="login-username" type="hidden" class="form-control" name="csrf_token" value=<?php echo '"' . generateToken('sec') . '"';?>>
                                  

                                      <button id="btn-login"   class="btn btn-success" type="submit">update</button><br>
                                         <a href="logout.php">Logout</a> 
                                    </div>

                                </div>
</form>
</body>
</html>