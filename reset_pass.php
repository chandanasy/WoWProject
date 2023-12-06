
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendyBucket - Forgot Password</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style type="text/css">
    .imageclass{
            margin-top: 0px;
            float: left;
        }
        .contact__content {
            text-align: center;
            margin-left: 650px;
            width: 85%;
            margin-top:80px;
            box-shadow: 2px 2px 2px 2px;
            display:block;
            padding: 40px;
    }
    </style>
</head>

<body>

<script type="text/javascript" language="javascript">
        function validate() {
            var string1 = document.getElementById("pwd").value;
            var string2 = document.getElementById("rpwd").value;

            if (string1 == string2) {
                return true;
            }
            else {
                alert("Passwords do not match");
                return false;
            }
        }
    </script>

<?php

$msg='';
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
if(isset($_POST['submit']))
{
$mysqli=new mysqli('localhost','root','','trendybucket');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 
$email=mysqli_real_escape_string($mysqli, $_POST['email']);
$stmt = $mysqli->prepare("SELECT Email FROM user_details WHERE Email = ? LIMIT 1");
$stmt->bind_param('s',$email);
$password=mysqli_real_escape_string($mysqli, $_POST['pwd']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
if($stmt->num_rows == 1)            
                {
                    $sql = $mysqli->prepare("UPDATE user_details SET Password=? WHERE Email=?");
                    $sql->bind_param('ss', $password, $email);
                    $sql->execute();
                    $msg='Password updated';
                }
                else{
                    
                    $msg='User does not exist';  
                }
}
    }

?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>     

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo1.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            
                        </div>
                        <ul class="header__right__widget">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

<section class="contact spad">
<div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                <div class="imageclass">
                        <img src="./img/reset_pass.jpg"/>
                        </div>
                    <div class="contact__content">
                        <div class="contact__form">
<form onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
<table cellspacing='5' align='center'>
    <h5>Reset Password</h5>
<tr>
    <td>
        User Email: <input type='text' placeholder="Enter User Email" name='email'/>
        <br>   
    </td>
</tr>
<tr>
    <td>
    Password:<br>
    <input type="password" id="pwd" name="pwd" name="tracking-code"
    id="tracking-code" autocomplete="off" placeholder="Enter Password"
    required><br>
    </td>
</tr>
<tr>
    <td>
    Re-Enter Password:<br>
    <input type="password" id="rpwd" name="rpwd" name="tracking-code"
    id="tracking-code1" autocomplete="off" placeholder="Re-Enter Password"
    required><br>
    </td>
</tr>
<tr>
    <td>
    <div id="result"><?php echo $msg?></div>
</td>
</tr>

<tr><td>  <button type="Submit" name="submit" class="site-btn">Submit</button></td></tr>
</table>
</form>
</div>
</div>
</div> 
</div> 
</div>
</section>
<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.php"><img src="img/logo1.png" alt=""></a>
                    </div>
                    <p>Your ultimate destination for fashion and lifestyle, being host to a wide array of merchandise.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>