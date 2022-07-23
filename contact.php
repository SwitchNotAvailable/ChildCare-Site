<?php

//connecting to the database
$con=mysqli_connect("localhost","root","","ChildCare");
$pattern="/^[0-9]{10}$/"; //10 numbers for phone number

//checking if the database is connected
if(!$con)
{
echo "Connection unsuccesful".mysqli_connect_error(); 

}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $subject=$_POST["subject"];
    


    //checking if details are present before sending
    while(true) {
    
        if(empty($phone)||preg_match($pattern,$phone)==0) {
            echo "Please enter a valid phone number <br>";
            break; //stop loop if Value is not valid
        }
    
        if(empty($name)) {
            echo "Please enter your name <br>";
            break; //stop loop if Value is not valid
        }
    
        if(empty($email)) {
            echo "Please enter your email address <br>";
            break; //stop loop if Value is not valid
        }

        if(empty($subject)) {
            echo "Please enter a Message <br>";
            break; //stop loop if Value is not valid
        }

        $query="INSERT INTO Contact (Name,Email,Phone_Number,Subject) VALUES ('$name','$email','$phone','$subject')";

        $result = mysqli_query($con,$query);

        if($result) {                           
            echo "Message sent succesfully";
        }
        else {
            echo "Message not sent, please try again";
        }
        break;
    }
    
}
?>