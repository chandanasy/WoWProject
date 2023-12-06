<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendyBucket - Success</title>

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
            margin-left: 0px;
            float: left;
        }
        .contact__content {
            margin-top:70px;
            
            margin-left: 650px;
            width: 85%;
            box-shadow: 2px 2px 2px 2px ;
            display:block;
            
        }
    </style>
    <script type="text/javascript"> 
    </script> 
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
            <a href="./index.php"><img src="img/logo1.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
        <?php
                            if (isset($_SESSION['name']))
                            {
                                print "Welcome, ".$_SESSION['name'];
                            }
                            ?>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <center>
                        <ul>
                        <li><a href="./index.php">Home</a></li>
                            <li><a href="women.php?filter=">Women’s</a></li>
                            <li><a href="men.php?filter=">Men’s</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                            <li><a href="session_display.php">Logout</a></li>
                                </ul>
                    </center>    
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                        <?php
                            if (isset($_SESSION['name']))
                            {
                                print "Welcome, ".$_SESSION['name'];
                            }
                            ?>
                        </div>
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
                        <img src=".\img\successful-purchase-concept-illustration_114360-1003.jpg"/>
                    </div>
                    <div class="contact__content">
                        
                            <div class="checkout__order">
                                <h5><b>YOUR ORDER</b></h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php 
                                        

                                            if(isset($_SESSION["cart_item"]))
                                            {                            
                                                $cart_price = 0;
                                            foreach ($_SESSION["cart_item"] as $item){
                                                $item_price = $item["quantity"]*$item["price"];
                                                $total_quantity = 0;
                                                $total_quantity += $item["quantity"];
                                                $_SESSION["total_quantity"]=$total_quantity;
                                                $total_price = 0;                                
                                                $total_price += ($item["price"]*$item["quantity"]);                                
                                                $cart_price += $total_price;
                                                $_SESSION["total_price"]=$total_price;
                                        ?>
                                        <li><?php echo $item["name"]; ?><span>₹<?php echo $total_price; ?></span></li>
                                        <?php  
                                                 }
                                        ?>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>₹<?php echo $_SESSION["cart_price"]; ?></span></li>
                                        <?php if($_SESSION['code_value'] > 0) { ?>                            
                                        <li>Discount <span>-₹<?php echo $_SESSION['code_value']; ?></span></li> 
                                        <?php
                                        $_SESSION["cart_price"] -= $_SESSION['code_value'];
                                    }
                                    ?>
                                        <li>Total <span>₹<?php echo $_SESSION["cart_price"]; ?></span></li>
                                    </ul>
                                </div>
                                <?php } ?>
                                <form> 
                                <button type="submit" name="submitt" class="site-btn" onclick='window.print()'>Print</button>
                                
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
            <form class="search-model-form" action="search-result.php?filter=" method="POST">
                <input type="text" id="search-input" placeholder="Search here....." name='search-input'>
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