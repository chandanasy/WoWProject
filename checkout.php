<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendyBucket - Checkout</title>

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
</head>

<?php
session_start();
//retrieve in select, and declare a variable named $user_details
 $conn=mysqli_connect('localhost','root','','trendybucket') or die(mysqli_error());  
 $res=mysqli_query($conn,"SELECT * FROM user_details WHERE Name='" . $_SESSION["name"] . "'");  
 $user_details = mysqli_fetch_assoc($res);
 if(isset($_POST["submitt"]))
 { 
     if(empty($_POST["cod"]))
     {
   $cvv=mysqli_real_escape_string($conn, $_POST['CVV']); 
             if ($cvv==$user_details['CVV']) {
                $bal=$user_details['Account_Bal']-$_SESSION["cart_price"];  
                $sql = "UPDATE user_details SET Account_Bal=".$bal." WHERE Name='" . $_SESSION["name"] . "'";
                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script type="text/javascript">
                    window.location.assign('success.php') ;
                </script>
                <?php
                }
            }
                else{
                    ?>
                      <script type="text/javascript">
                          alert("Invalid cvv");
                          document.getElementById('CVV').focus;
                      </script>
                      <?php }
     }
     else
     {
        ?>
        <script type="text/javascript">
        window.location.assign('success.php') ;
    </script>
    <?php
     }
 }
                      ?>


<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#statwallet").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
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
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo1.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            
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
                            <li class="active" ><a href="women.php?filter=">Women’s</a></li>
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
                            
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">            
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="checkout__form" method="POST">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['FirstName']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['LastName']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>                                   
                                    <input type="text" placeholder="Apartment. suite, unite ect ( optinal )" value="<?php echo $user_details['Address']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['City']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>State <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['State']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['Pincode']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" value="India">
                                </div>                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['MobileNo']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" value="<?php echo $user_details['Email']; ?>">
                                </div>
                            </div>
                                                        
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
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
                                $_SESSION["cart_price"]=$cart_price;
                                ?>
                                        <li><?php echo $item["name"]; ?><span>₹<?php echo $total_price; ?></span></li>
                                        <?php  
                                }
                                        ?>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>₹<?php echo $_GET["cart_price"]; ?></span></li>
                                        <?php if($_SESSION['code_value'] > 0) { ?>                            
                                        <li>Discount <span>-₹<?php echo $_SESSION['code_value']; ?></span></li> 
                                        <?php
                                        $_GET["cart_price"] -= $_SESSION['code_value'];
                                    }
                                    ?>
                                        <li>Total <span>₹<?php echo $_GET["cart_price"]; ?></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">                                
                                    
                                    <label for="check-payment">
                                        Cash on Delivery
                                        <input type="checkbox" id="check-payment" name="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="statwallet">
                                        Static Wallet
                                        <input type="checkbox" id="statwallet">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                     <div class="checkout__form__input">
                                    <div id="dvPassport" style="display: none">
                                 <p>CVV <span>*</span></p>
                                <input type="text" id="CVV"  name="CVV" placeholder="Enter 4 digit CVV" />
                            </div>
                            </div>
                                </div>
                                <?php } ?>  
                                <button type="submit" name="submitt" class="site-btn">Place order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Checkout Section End -->
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
                            <h6>Quick links</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer__widget">
                            <h6>Account</h6>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders Tracking</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>
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