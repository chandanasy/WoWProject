<?php
   session_start();
   unset($_SESSION["name"]);
   unset($_SESSION["email"]);
   unset($_SESSION["acc_bal"]);   
   unset($_SESSION["cart_item"]);   
   unset($_SESSION["code_value"]);   
   unset($_SESSION["total_price"]);   
   echo'<script>alert("logged out Successfully")</script>';     
   header('Refresh: 2; URL = index.html');
   session_destroy();
?>