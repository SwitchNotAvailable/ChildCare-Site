<?php
$con=mysqli_connect('localhost','root',"",'ChildCare');
if(!$con)
{
echo "connection failed".mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login']))
{

if(isset($_POST['Email'])&&isset($_POST['pwd']))
{
    $Email=$_POST['Email'];
    $pwd=$_POST['pwd'];

    $query="SELECT Email,Password from Registration WHERE Email=?";
    $stmt=mysqli_prepare($con,$query);
    mysqli_stmt_bind_param($stmt,"s",$Email);
    if(mysqli_stmt_execute($stmt))
        {
            $row=mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)==1)
                {
	                mysqli_stmt_bind_result($stmt,$Email,$hpwd);
	                if(mysqli_stmt_fetch($stmt))
	                    {
		                if(password_verify($pwd,$hpwd))
		                    {
			                    session_start();
                                $_SESSION['Email']==$Email;
                                $_SESSION["loggedin"]=true;
                                header('Location:index.php');
		                    }
	                    }
                }
            else
            {
	            header('Location:registration.html');
            }
}}}
if(isset($_POST['logout']))
{
    session_destroy();
    echo 'Location:login.php';
    
}
?>


<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Care Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<h1 style="padding-top: 100px;text-align: center;font-size: 35px;">Login Page</h1>


<div class="container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            
            <label for="email">Email address</label>
            <input type="text" id="email" name="Email" placeholder="Please enter your email address...">
            
            <label for="password">Password</label><br>
            <input type="password" id="password" name="pwd" placeholder="Please enter your password..."><br>
    
            <br>
            <input type="submit" name="login" value="Login">
			<input type="submit" name="logout" value="Logout">
            
            
           
        </form>      
        <br>
        <div class="reg_button">
            <a href="Registration.html"><button>Register here</button></a>
        </div>
        

</div>

</body>
</html>
