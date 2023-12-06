<html>
<body>
<?php
	if(isset($_POST["submit"]))
	{      		
            $acc_bal="10000";
            $cvv=rand(1000,9999);
            $mysqli=new mysqli('localhost','root','','trendybucket');
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            } 
            $uname=mysqli_real_escape_string($mysqli, $_POST['name']); 
            $email=mysqli_real_escape_string($mysqli, $_POST['email']);
            $password=mysqli_real_escape_string($mysqli, $_POST['pwd']);
            $stmt = $mysqli->prepare("SELECT Email FROM user_details WHERE Email = ? LIMIT 1");
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            if($stmt->num_rows == 1)
            {
                echo "User already exists <br>";
                echo "Click  <a href='login.html'>here</a> to go back to Login page";
            }
            else{
            $balance=10000;

            $sql = $mysqli->prepare("INSERT INTO user_details  VALUES (?,?,?,?,?)");
            $sql->bind_param("ssisi",$uname,$email,$balance,$password,$cvv);
            if ($sql->execute()) {
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["acc_bal"] = $acc_bal;
                    $_SESSION["name"] = $uname;
            ?>
                <script type="text/javascript">
                    alert("Your cvv is : <?php echo $cvv?>");
                    window.location.assign('index.php');
                </script>
            <?php
            }
            else
            {
                echo "Signup failed...";
                echo "Click  <a href='Signup.html'>here</a> to go back to signup page";
            }
        }
    }  
    else
    {
        echo "connection failed ";
     }
?>
</body>
</html>