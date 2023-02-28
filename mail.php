<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mailtheader = "From".$name."<".$email.">\r\n";
$recipient = "ahmadfarikh1305@gmail.com";
mail($recipient, $message, $mailtheader)
or die("Error!");

echo"message send";
?>