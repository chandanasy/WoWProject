<?php
session_start();
$con=mysqli_connect('localhost','root','','trendybucket');
$msg='';
if(isset($_POST['submit'])){
    $time=time()-30;
    $ip_address=getIpAddr();
    $check_login_row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from login_log where try_time>$time and ip_address='$ip_address'"));
    $total_count=$check_login_row['total_count'];
    if($total_count==3){
        $msg="To many failed login attempts. Please login after 30 sec";
    }else{
        $username=mysqli_real_escape_string($con,$_POST['email']);
        $password=mysqli_real_escape_string($con,$_POST['pwd']);
        $sql="SELECT * FROM user_details WHERE Email = '$username' and Password = '$password'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)){
            $_SESSION['IS_LOGIN']='yes';
            mysqli_query($con,"delete from login_log where ip_address='$ip_address'");
            $_SESSION["email"] = $username;
            setcookie("email",$username);
            while($row=mysqli_fetch_array($res))
                {
                    $_SESSION["name"]=$row['Name'];
                }
            ?>
            <script>
                window.location.href='index.php';
            </script>
            <?php
        }else{
            $total_count++;
            $rem_attm=3-$total_count;
            if($rem_attm==0){
                $msg="To many failed login attempts. Please login after 30 sec";
            }else{
                $msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
            }
            $try_time=time();
            mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time')");
            
        }
    }
}

function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendyBucket - Login</title>

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
            margin-top:55px;
            box-shadow: 2px 2px 2px 2px;
            display:block;
            padding: 40px;
    }
    #result{color:red;}
    </style>
</head>
    <script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            
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
                        <ul>
                            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="login.php">Login</a>
                            <a href="register.php">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            
                            </a></li>
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
                        <img src="./img/login.jpg"/>
                        </div>
                    <div class="contact__content">                        
                        <div class="contact__form">
                            <h5>LOGIN</h5>
                            <h6>Enter your details below to continue</h6><br>
                            <form action="login.php" method="POST">
                                <input type="email" name="email" placeholder="Email">
                                <input type="password" name="pwd" placeholder="Password" id="pwd">
                                <table>
                                    <tr>
                                        <td>
                                        <input type="checkbox" name="pwd1" id="pwd1" onclick=myFunction() style="height:10px;">
                                    </td>
                                    <td>
                                <label for="pwd1" style="margin-left:50px;">   Show Password</label>
</td>
</tr>
</table>
                                <br>                                       
                                
                                <a href='forgot_pass.php'>Forgot password?</a>
                                <br>
                                <br>
                                <button type="submit" name="submit" class="site-btn">SIGN IN</button>
                                <div id="result"><?php echo $msg?></div>
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