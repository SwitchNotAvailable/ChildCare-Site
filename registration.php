<?php
$con=mysqli_connect('localhost','root',"",'ChildCare');
if(!$con)
{
echo "connection failed".mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
if(isset($_POST['Parent_Name'])&&isset($_POST['Email'])&&isset($_POST['pwd']))
{
$Parent_Name=$_POST['Parent_Name'];
$Child_Name=$_POST['Child_Name'];
$Category=$_POST['Category'];
$Duration=$_POST['Duration'];
$Email=$_POST['Email'];
$pwd=$_POST['pwd'];
$hpwd=password_hash($pwd, PASSWORD_DEFAULT);
$query= "INSERT INTO Registration (Parent_Name,Child_Name,Category,Duration,Email,Password) VALUES ('$Parent_Name','$Child_Name','$Category','$Duration','$Email','$hpwd')";
$result=mysqli_query($con, $query);
if($result) {
    echo "registered successfully";
    header('Location:login.php');
}

else {
    echo "Registration unsuccessful, please try again";
    header('Location:registration.html');
}

}
}
 
?>
