<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Child Care</title>
        <link rel="stylesheet" type="text/css" href="contact.css">
    </head>
<body>
    <nav>
        <ul class="topnav">
            <li class="first-list"><a href="index.html" target="_blank" rel="noopener noreferrer">Home</a></li>
            <li class="top-list"><a href="testimonial.php" target="_blank" rel="noopener noreferrer">Testimonials</a></li>
            <li class="top-list"><a href="contactus.php" target="_blank" rel="noopener noreferrer">Contact Us</a></li>
            <li class="top-list"><a href="login.php" target="_blank" rel="noopener noreferrer">Login</a></li>
            <li class="top-list"><a href="logout.php" target="_blank" rel="noopener noreferrer">Logout</a></li>
            <li class="top-list"><a href="services.html" target="_blank" rel="noopener noreferrer">Our Services</a></li>
            <li class="top-list"><a href="registration.php" target="_blank" rel="noopener noreferrer">Registration</a></li>
            
            
        </ul>
    </nav>

<h3 style="padding-top: 100px;text-align: center;font-size: 35px;">Contact Form</h3>


<div class="container">
  <form method = "POST" action="contact.php">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Please enter your first name...">

    <label for="email">Email address</label>
    <input type="text" id="email" name="email" placeholder="Please enter your email address...">

    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Please enter your phone number...">
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Please leave us a message..." style="height:200px"></textarea>

    <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>
