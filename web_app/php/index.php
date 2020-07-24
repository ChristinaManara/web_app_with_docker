<?php
//Example CONSTANT called SITE_URL.
define('SITE_URL', 'http://127.0.0.1:8000/');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Technical University of Crete</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="/images/myusr.png" height="90" width="90">
                    </div>

                    <form class="col-12" action="authenticate.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="username" required>
                        </div>
                        <button type="submit" class="btn" name="login_btn"><i class="fas fa-sign-in-alt"></i>Login</button>
                    </form>
                </div>
            </div>        
        </div>
    </body>
</html>
