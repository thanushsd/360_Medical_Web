<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>360 Medical</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<?php 

    function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Use the function
if(isMobile()){ ?>
    <body style=" background-color: white; " >
    <div class="container mt-5" >
        <center>
            <img class="container mt-5 w-75 animate__animated animate__fadeIn " src="images/no.gif">
        <h2 class="animate__animated animate__fadeInUp" ><span style=" color: red; " >Sorry !</span> <br>360<sup>0</sup> Medical Not Available For Mobile</h2>
    </center>
    </div>
</body>
<?php  }
else { ?>
   


<style type="text/css">
    input{
        border-radius: 10px;
    }
</style>

<body class="h-100">
    <?php  ?>]
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div style=" border-radius: 30px; " class="authincation-content animate__animated animate__fadeInDown">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img width="30%" style=" border-radius: 10px; " src="images/logo.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in to your account</h4>
                                    <form action="sql/login.php"  method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>User Name</strong></label>
                                            <input style=" border-radius: 10px; " name="uname" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input style=" border-radius: 10px; " name="pw" type="password" class="form-control" >
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                            </div>
                                            <div class="form-group">
                                                <a  class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input style=" border-radius: 10px; " type="submit" class="btn bg-white text-primary btn-block" value="Sign In" name="login_form" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }

    ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

</body>

</html>