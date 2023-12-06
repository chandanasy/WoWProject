<?php 

// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pds');

// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if(isset($_POST['submit']))
{
  $pdate=$_POST['pdate'];
  $ddate=$_POST['ddate']; 
  $message=$_POST['message'];
  $useremail=$_SESSION['login'];
  $status=0;
  $vin=$_GET['vin'];
  $bookingno=mt_rand(100000000, 999999999);
  $ret="SELECT * FROM ccn_rental where (:pdate BETWEEN date(pdate) and date(ddate) || :pdate BETWEEN date(pdate) and date(ddate) || date(pdate) BETWEEN :pdate and :ddate) and vin=:vin";
  $query1 = $dbh -> prepare($ret);
  $query1->bindParam(':vin',$vin, PDO::PARAM_STR);
  $query1->bindParam(':pdate',$pdate,PDO::PARAM_STR);
  $query1->bindParam(':ddate',$ddate,PDO::PARAM_STR);
  $query1->execute();
  $results1=$query1->fetchAll(PDO::FETCH_OBJ);

  if($query1->rowCount()==0)
  {

    $sql="INSERT INTO  ccn_rental(userEmail,vin,pdate,ddate,pick_id,drop_id,message,Status,BookingNumber) VALUES(:useremail,:vin,:pdate,:ddate,:pick_id,:drop_id,:message,:status,:bookingno)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
    $query->bindParam(':vin',$vin,PDO::PARAM_STR);
    $query->bindParam(':pdate',$pdate,PDO::PARAM_STR);
    $query->bindParam(':ddate',$ddate,PDO::PARAM_STR);
    $query->bindParam(':pick_id',$pick_id,PDO::PARAM_STR);
    $query->bindParam(':drop_id',$drop_id,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
      echo "<script>alert('Booked successfuly.');</script>";
      echo "<script type='text/javascript'> document.location = 'my_booking.php'; </script>";
    }
    else 
    {
      echo "<script>alert('Something went wrong. Please try again');</script>";
      echo "<script type='text/javascript'> document.location = 'carlist.php'; </script>";
    } 
  }  else{
   echo "<script>alert('Car already booked for these days');</script>"; 
   echo "<script type='text/javascript'> document.location = 'carlist.php'; </script>";
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WOW - Car Details</title>

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
    .quantity
    {
        margin-left:50px;   
    }
    </style>
</head>

<body id="body"> 
  
<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo.jpg" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            
        </div>
    </div>
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <div>
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./ php"><img src="img/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                    <center>
                        <ul>
                        <li ><a href="./index.php">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li class="active"><a href="carlist.php?filter=">Car List</a></li>
                            <li><a href="./shop.html">Contact</a></li>
                            <li><a href="./blog.html">Gallery</a></li>
                                </ul>
                    </center>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
</div>
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

    <!-- Breadcrumb End -->
          <?php 
          $vin = $_GET['vin']; // No need to use intval() as vin might be alphanumeric
          $sql = "SELECT ccn_vehicle.*, ccn_veh_class.*
                  FROM ccn_vehicle 
                  JOIN ccn_veh_class ON ccn_vehicle.class_id = ccn_veh_class.class_id 
                  WHERE ccn_vehicle.vin = :vin";
          $query = $dbh->prepare($sql);
          $query->bindParam(':vin', $vin, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if($query->rowCount()==0)
          {
            echo 'none';
          }
          if($query->rowCount() > 0)
          {
            foreach($results as $result)
            {  
              $_SESSION['brndid']=$result->bid;  
              ?>  
              <div class="owl-carousel clients-carousel">
                
                <img src="<?php echo htmlentities($result->vimage1);?>" alt="" style="height: 150px; width:300px;">
                <img src=<?php echo htmlentities($result->vimage2);?> alt="" style="height: 150px; width: 300px;">
                <img src=<?php echo htmlentities($result->vimage3);?> alt="" style="height: 150px; width: 300px;">
               </div>
            </div>
          </section><!-- #clients -->
              <style>
                .inline-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.inline-list li {
    display: inline-block;
    vertical-align: top;
    margin-right: 20px; /* Adjust the margin between items */
}
                </style>
          <!--Listing-detail-->
          <section class="listing-detail">
            <div class="container">
              <div class="listing_detail_head row">
                <div class="col-md-9">
                  <h2><?php echo htmlentities($result->veh_make);?> , <?php echo htmlentities($result->veh_model);?></h2>
                </div>
                <div class="col-md-3">
                  <div class="price_info">
                    <p>$<?php echo htmlentities($result->daily_rentrate);?> </p>Per Day

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                  <div class="main_features">
                  <ul class="inline-list">
    <li>
        <i class="fa fa-calendar" aria-hidden="true"></i>
        <h5><?php echo htmlentities($result->veh_year); ?></h5>
        <p>Reg. Year</p>
    </li>
    <li>
        <i class="fa fa-tachometer" aria-hidden="true"></i>
        <h5><?php echo htmlentities($result->odolimit); ?></h5>
        <p>miles/day</p>
    </li>
    <li>
        <i class="fa fa-usd" aria-hidden="true"></i>
        <h5><?php echo htmlentities($result->overmileage); ?></h5>
        <p>om fees/mile</p>
    </li>
</ul>
                  </div>
                  <div class="listing_more_info">
                    <div class="listing_detail_wrap"> 
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs gray-bg" role="tablist">
                        <li role="presentation" class="active">Vehicle Overview</li>

                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content"> 
                        <!-- vehicle-overview -->
                        <div role="tabpanel" class="tab-pane active" id="veh_overview">

                          <p><?php echo htmlentities($result->veh_overview);?></p>
                        </div>


                        <!-- Accessories -->
                        <div role="tabpanel" class="tab-pane" id="accessories"> 
                          <!--Accessories-->
                          <table>
                            <thead>
                              <tr>
                                <th colspan="2">Accessories</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Air Conditioner</td>
                                <?php if($result->AirConditioner==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <?php 
                                } else { ?> 
                                 <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                 <?php 
                               } ?> </tr>

                               <tr>
                                <td>AntiLock Braking System</td>
                                <?php if($result->AntiLockBrakingSystem==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else {?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>Power Steering</td>
                                <?php if($result->PowerSteering==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>


                              <tr>

                                <td>Power Windows</td>

                                <?php if($result->PowerWindows==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>CD Player</td>
                                <?php if($result->CDPlayer==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>Leather Seats</td>
                                <?php if($result->LeatherSeats==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>Central Locking</td>
                                <?php if($result->CentralLocking==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>Power Door Locks</td>
                                <?php if($result->PowerDoorLocks==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Brake Assist</td>
                                <?php if($result->BrakeAssist==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php  } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                                <td>Driver Airbag</td>
                                <?php if($result->DriverAirbag==1)
                                {
                                  ?>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php } else { ?>
                                  <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php } ?>
                              </tr>

                              <tr>
                               <td>Passenger Airbag</td>
                               <?php if($result->PassengerAirbag==1)
                               {
                                ?>
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                              <?php } else {?>
                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                              <?php } ?>
                            </tr>

                            <tr>
                              <td>Crash Sensor</td>
                              <?php if($result->CrashSensor==1)
                              {
                                ?>
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <?php 
                              } else { ?>
                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                <?php
                              } ?>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
                <?php 
              }
            } ?>

          </div>

          <!--Side-Bar-->
          <aside class="col-md-9">

           
            <div class="sidebar_widget">
              <div class="widget_heading">
                <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
              </div>
              <form method="post">
                <div class="form-group">
                  <label>From Date:</label>
                  <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
                </div>
                <div class="form-group">
                  <label>To Date:</label>
                  <input type="date" class="form-control" name="todate" placeholder="To Date" required>
                </div>
                <div class="form-group">
                  <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                </div> 


                <?php
                    $mysqli = NEW mysqli("localhost","root","",'pds');
                    $pickup = $mysqli->query("SELECT loc_city,loc_state FROM ccn_location");
                ?>

                <label for="pickup">Pick-up Location:</label>
                <select name="pickup" class="form-control" required>
                <option value="">--Choose a Pickup Location--</option>
                  <?php 
                  while($rows = $pickup->fetch_assoc())
                  {
                    $City = $rows['loc_city'];
                    $State = $rows['loc_state'];
                    echo "<option value = '$City , $State'>$City,$State</option>";
                  }
                  ?>
                </select>

                <?php
                    $mysqli = NEW mysqli("localhost","root","",'pds');
                    $drop = $mysqli->query("SELECT loc_city,loc_state FROM ccn_location");
                ?>

                <label for="dropoff">Drop-Off Location:</label>
                <select name="dropoff" class="form-control" required>
                <option value="">--Choose a Dropoff Location--</option>
                  <?php 
                  while($rows = $drop->fetch_assoc())
                  {
                    $City = $rows['loc_city'];
                    $State = $rows['loc_state'];
                    echo "<option value = '$City , $State'>$City,$State</option>";
                  }
                  ?>
                </select>
                
                <!--
                <input type="text" id="discount" name="discount" placeholder="Type discount coupon code" style="width:20%">
                <input type="submit" class="btn" style="background-color: orange;"  name="apply" value="Apply"></br>
                -->

                <!-- <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                  <thead>
                    <tr>
                      <th>Discount ID</th>
                      <th>Discount Perc</th>
                      <th>Discount Start Date</th>
                      <th>Discount end date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * from  ccn_discount ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $disc=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($disc as $disc)
                      {     
                        ?>
                        <tr>
                          <td><?php echo htmlentities($disc->discount_id);?></td>
                          <td><?php echo htmlentities($disc->discount_type);?></td>
                          
                          
                          </tr>
                          <?php 
                          $cnt=$cnt+1;
                        }
                      } ?>
                    </tbody>
                  </table> -->

                  </br></br>
                <div class="coupon">
                  <div class="coupponcontainer">
                    <h3>Special Offer</h3>
                  </div>
                
                  <img src="<?php echo htmlentities($result->vimage1);?>" alt="Avatar" style="height: 150px; width:400px;">
                  <div class="container" style="background-color:white">
                    <h6><b>10% OFF YOUR PURCHASE</b></h6>
                  </div>
                  <div class="coupponcontainer">
                    <p>Used Promo Code: <span class="promo">SAVE10</span></p>
                  </div>
                </div>


                <div class="col-50">
                <div class="container">
                <div class="listing_detail_head row">
                  <div class="col-md-9">
                  <h6>Payment</h6>
                  </div>
                  <div class="col-md-3">
                    <div class="price_info">
                      <p>$<?php echo htmlentities($result->daily_rentrate);?></p>Per Day

                    </div>
                  </div>
                </div>
                  </div>
                  <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <div class="form-group">
                <label for="cname">Name on Card</label>
                  <input type="text" id="cname" class="form-control" name="cardname" placeholder="John More Doe">
                
                
                  <label for="ccnum"> <i class="fa fa-credit-card"></i>Credit card number</label>
                  <input type="text" class="form-control" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                  <label for="expmonth"> <i class="fa fa-calendar"></i>Exp Month</label>
                  <input type="text" class="form-control" id="expmonth" name="expmonth" placeholder="September">
                  <label for="expyear"><i class="fa fa-calendar"></i>Exp Year</label>
                  <input type="text" id="expyear" class="form-control" name="expyear" placeholder="2018">
                  <label for="cvv"><i class="fa fa-credit-card-alt"></i>CVV</label>
                  <input type="password" id="cvv" class="form-control" name="cvv" placeholder="352">
                </div>
              </div>

             
              <!-- <div class="row">
                <div class="col-50"> -->
                <div class="form-group">
                  <h3>Billing Address</h3>
                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" class="form-control" name="firstname" placeholder="John M. Doe">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="john@example.com">
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input type="text" id="adr" class="form-control" name="address" placeholder="542 W. 15th Street">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" class="form-control" name="city" placeholder="New York">
                  <label for="state">State</label>
                  <input type="text" id="state" class="form-control" name="state" placeholder="NY">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" class="form-control" name="zip" placeholder="10001">
                </div>
                <!-- </div>
              </div> -->
      
                <?php if($_SESSION['login'])
                {?>
                  <div class="form-group">
                    <input type="submit" class="btn" style="background-color: orange;"  name="submit" value="Book Now">
                  </div>
                  <?php 
                } else { ?>
                  <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" style="background-color: #49a3ff;">Login For Book</a>

                  <?php 
                } ?>
              </form>
            </div>
          </aside>
          <!--/Side-Bar--> 
        </div>

        <div class="space-20"></div>
        <div class="divider"></div>

        

     </div>
   </section>
   <!--/Listing-detail--> 

    <!--==========================
      Call To Action Section
      ============================-->
      <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">WOW services</h3>
             <p class="cta-text">Wow has various classes of vehicle such as small car, mid-size car, luxury car, SUV, Premium SUV, MiniVan, and Station Wagon etc.
             At present, WOW does not provide vehicle insurance to their customers for car rental service and customers need to bring his/her own insurance
             </p>            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="contact.php">Contact Us</a>
            </div>
          </div>

        </div>
      </section><!-- #call-to-action -->




    </main>

  <!--==========================
    Footer
    ============================-->
    <?php include('includes/footer.php');?><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form --> 

    <!--Register-Form -->
    <?php include('includes/registration.php');?>

    <!--/Register-Form --> 

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>

    <!-- JavaScript  -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script> 
    <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script>
    <script src="js/main.js"></script>

  </body>
  </html>