
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

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$msg='';
try{
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
if(isset($_POST['submit']))
{
$mysqli=new mysqli('localhost','root','','trendybucket');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 
$user_id = $_POST['user_id'];
$query="SELECT Email FROM user_details WHERE Email = ? LIMIT 1";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$user_id);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->store_result();
if($stmt->num_rows == 1)
{
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'trendybucketmailer@gmail.com';                     // SMTP username
    $mail->Password   = 'test@1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('trendybucketmailer@gmail.com', 'Trendy Bucket Mailer');
    $mail->SMTPDebug = false;
    $mail->addAddress($user_id, 'Joe User');     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No-REPLY');

    $link='http://localhost/TrendyBucket-Online-Shopping-Portal-for-Clothes-master/reset_pass.php';
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset Request';
    $mail->Body    = '<h3><b>Hello User,</b></h3><br>You have requested for your password recovery.To reset your password click the following link '.$link;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send())
    {
        $msg="Message could not be sent. Mailer Error";
    }
    else{
        $msg='Message has been sent';
    } 

}
else
    {
        $msg="User doesn't exist";
    }
    }
}
}
catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
  } catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
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
                   
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="login.php">Login</a>
                            <a href="register.php">Register</a>
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
                        <img src="./img/forgot_pass.jpg"/>
                        </div>
                    <div class="contact__content">
                        <div class="contact__form">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()" method='post'>
<table cellspacing='5' align='center'>
    <h5>Forgot Password</h5>
<tr>
    <td>
        User Email: <input type='text' placeholder="Enter User Email" name='user_id'/>
        <br>   
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