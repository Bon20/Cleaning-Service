<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$server_name="localhost";
$username="root";
$password="";
$database_name="cleaning_servicedb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}



if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $fa = $_POST['fa'];
    $cnum = $_POST['cnum'];
    $services= $_POST['services'];
    $allData = implode (",",$services);
    $ser_dt = $_POST['ser_dt'];

    $sql_query = "INSERT INTO `order_form` (fname, email, fa, cnum, services,ser_dt) 
    VALUES ('$fname', '$email', '$fa', '$cnum','$allData','$ser_dt')";
    $res = mysqli_query($conn, $sql_query);

    $mpdf = new \Mpdf\Mpdf();

    $info = '';
    $info .= '<h1>Dust & Shine Cleaning Service</h1>';

    $info .= '<strong>Full Name:</strong>' . $fname . '<br/>';
    $info .= '<strong>Email Address:</strong>' . $email . '<br/>';
    $info .= '<strong>Home Address:</strong>' . $fa . '<br/>';
    $info .= '<strong>Contact Number:</strong>' . $cnum . '<br/>';
    $info .= '<strong>Chosen Service:</strong>' . $allData . '<br/>';
    $info .= '<strong>Date and Time:</strong>' . $ser_dt . '<br/>';

    $mpdf->WriteHTML($info);

    $mpdf->Output('Dust&Shine-Record-Receipt.pdf', 'D');

}  
?>