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
    <title>TrendyBucket - Men</title>

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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
   <!--  -->
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
                            <li  ><a href="women.php?filter=">Women’s</a></li>
                            <li class="active"><a href="men.php?filter=">Men’s</a></li>
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
                        <span>Men's</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <?php
        $conn = new mysqli('localhost','root','','trendybucket') or die(mysqli_error());
        $search="";
        
        if($_GET["filter"]) {
         $search = $_GET["filter"];
        }
        
    ?>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="men.php?filter=Shirt">Shirts</a></li>
                                                    <li><a href="men.php?filter=Jacket">Jackets</a></li>
                                                    <li><a href="men.php?filter=Chinos">Trousers & Pants</a></li>
                                                    <li><a href="men.php?filter=T-shirt">T-shirts</a></li>
                                                    <li><a href="men.php?filter=Jeans">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div></div>
                        <div class="sidebar__filter">
                            <form method="get">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <?php
                                $_SESSION['minamount'] = 499;
                                $_SESSION['maxamount'] = 4899;                               
                            if (!empty($_GET['min_price'])) {
                               $_SESSION['minamount'] = $_GET['min_price'];
                            }
                            if (!empty($_GET['max_price'])) {
                                $_SESSION['maxamount'] = $_GET['max_price'];
                            }
                            ?>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="<?php echo $_SESSION['minamount']; ?>" data-max="<?php echo $_SESSION['maxamount'] ?>"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="" id="minamount" name="min_price" value="<?php echo $_SESSION['minamount']; ?>">
                                        <input type="" id="maxamount" name="max_price" value="<?php echo $_SESSION['maxamount']; ?>">
                                        <input type="hidden" value="" name="filter"/>
                                    </div>
                                </div>
                            </div>
                            <a href="men.php?filter="><input type="submit" class="btn-submit" value="Filter"  style="border-radius: 10px; background-color:  #ca1515; border:0px; color: white;text-align: left; padding:5px;" /></a>
                        </form>
                        </div>  
                            <?php 
                            $conn=mysqli_connect('localhost','root','','trendybucket') or die(mysqli_error());
                            $res = mysqli_query($conn, "select * from product where name LIKE '%".$search."%' AND price BETWEEN '".$_SESSION['minamount']."' AND '".$_SESSION['maxamount']."' AND gender= 'M' ORDER BY id ASC");
                            $count = mysqli_num_rows($res); 
                            ?>
                        </div>
                </div>
                <div class="col-lg-9 col-md-9">                    
                    <div class="row">    
                    <?php                        
                        while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <?php
                                    ?>
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $row["image"]; ?>">
                                    <form method="POST" action="shop-cart.php?action=add&code=<?php echo $row["code"]; ?>"> 
                                    <ul class="product__hover">
                                    <li ><a href="<?php echo $row["image"]; ?>" style="background-color:#ca1515; color:white;" class="image-popup"><span class="arrow_expand" ></span></a></li>
                                        <li>
                                            <a href=""><input type="submit" id="atc" value="Add to Cart" style="border-radius: 10px; background-color:  #ca1515; border:0px; color: white;text-align: left;" /></a>
                                        </li>
                                    </ul>                                    
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?php echo $row["name"]; ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">₹<?php echo $row["price"]; ?></div>
                                    <div class="pro-qty">
                                        <input type="text" name="<?php echo $row["code"]; ?>_quantity" value="1">
                                    </div>
                                </div>  
                                
                                </form>                          
                            </div>
                        </div>
                        <?php } ?>
                        <script>
                            function add_cart() {
                                var x = document.getElementById('add_cart_form').value;
                                x[0].submit();
                            }function func(e) {console.log(e.target.value);}
                        </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
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
    <script type="text/javascript">
  
  $(function() {
    $( "#range-slider" ).slider({
      range: true,
      minamount: 499,
      maxamount: 4899,
      values: [ <?php echo $minamount; ?>, <?php echo $maxamount; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        $( "#minamount" ).val(ui.values[ 0 ]);
        $( "#maxamount" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#range-slider" ).slider( "values", 0 ) +
     " - $" + $( "#range-slider" ).slider( "values", 1 ) );
  });
  </script>

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