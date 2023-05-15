<?php

include("conn.php");

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  $select_query = "select * from `logintable` where email = '$email'";
  $query = mysqli_query($conn, $select_query);
  print_r($query);
  die;
  $rows_cou = mysqli_num_rows($query);
  
  if ($rows_cou > 0) {
    $fetch_count = mysqli_fetch_assoc($query);
    $db_data = $fetch_count['password'];
    $veryfy_pass = password_verify($password, $db_data);
    if ($veryfy_pass) {
      echo "login successfull";
      // header("location:register.php");
    } else {
      echo "password incorect";
    }


  } else {
    echo "invalid email";
  }
}

?>
<! DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title> log in form
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>
  <style>
    body {
      background-color: #fff;
      font-family: 'Muli', sans-serif;
    }

    h1 {
      color: #fff;
      padding-bottom: 2rem;
      font-weight: bold;
    }

    a {
      color: #333;
    }

    a:hover {
      color: #E8D426;
      text-decoration: none;
    }

    .form-control:focus {
      color: #000;
      background-color: azure;
      border: 2px solid #E8D426;
      outline: 0;
      box-shadow: none;
    }

    .btn {
      background: #28a745;
      border: #E8D426;
    }

    .btn:hover {
      background: #28a745;
      border: #E8D426;
    }
  </style>

  <body>
    <form action="" method="post">
    <div class="pt-5">
      <h1 class="text-center">log in </h1>
      <div class="container">
        <div class="row">
          <div class="col-md-5 mx-auto">
            <div class="card card-body">
              <form id="submitForm" action="#" method="post" data-parsley-validate=""
                data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                <div class="form-group required">
                  <lSabel for="username">login </lSabel>
                  <input type="email" class="form-control text-lowercase" id="username" name="email">
                </div>
                <div class="form-group required">
                  <label class="d-flex flex-row align-items-center" for="password"> Enter your Password
                    <a class="ml-auto border-link small-xl" href="#"> Forget Password? </a> </label>
                  <input type="password" class="form-control" required="" id="password" name="password" value="">
                </div>
                <div class="form-group mt-4 mb-4">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me"
                      data-parsley-multiple="remember-me">
                    <label clss="custom-control-label" for="remember-me"> Remember me? </label>
                  </div>
                </div>
                <div class="form-group pt-1">
                  <button class="btn btn-primary btn-block" type="submit" name="submit"> Log In </button>
                </div>
              </form>
              <p class="small-xl pt-3 text-center">
                <span class="text-muted"> Not a member? </span>
                <a href="#"> Sign up </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>



    </form>
  </body>

  </html>