<?php
session_start();
require 'connect.php';
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST['delete_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['delete_client']);

    $query = "DELETE FROM order_form WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Deleted";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['client_id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $fa = mysqli_real_escape_string($con, $_POST['fa']);
    $cnum = mysqli_real_escape_string($con, $_POST['cnum']);
    $services = $_POST['services'];
    $allData = implode (",",$services);
    $ser_dt = mysqli_real_escape_string($con, $_POST['ser_dt']);

    $query = "UPDATE order_form SET fname='$fname', email='$email', fa='$fa', cnum='$cnum', services='$allData', ser_dt='$ser_dt' WHERE id='$client_id' ";

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

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Updated";
        header("Location: admin.php");
        exit(0);
    }

}


if(isset($_POST['save_client']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $fa = mysqli_real_escape_string($con, $_POST['fa']);
    $cnum = mysqli_real_escape_string($con, $_POST['cnum']);
    $services = $_POST['services'];
    $allData = implode (",",$services);
    $ser_dt = mysqli_real_escape_string($con, $_POST['ser_dt']);
    

    $query = "INSERT INTO order_form (fname,email,fa,cnum,services,ser_dt) VALUES ('$fname','$email','$fa','$cnum','$allData','$ser_dt')";

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

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Client Created Successfully";
        header("Location: client-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Created";
        header("Location: client-create.php");
        exit(0);
    }
}

if(isset($_POST['complete_client']))
{
    

    $client_id = mysqli_real_escape_string($con, $_POST['complete_client']);
    $query = "INSERT INTO complete_form (id,fname,email,fa,cnum,services,ser_dt)  SELECT id,fname,email,fa,cnum,services,ser_dt FROM order_form WHERE id='$client_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Complete Successfully";
        header("Location: complete.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Existing";
        header("Location: complete.php");
        exit(0);
    }
}

if(isset($_POST['delete_complete']))
    {
        $client_id = mysqli_real_escape_string($con, $_POST['delete_complete']);
    
        $query = "DELETE FROM complete_form WHERE id='$client_id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Client Deleted Successfully";
            header("Location: complete.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Client Not Deleted";
            header("Location: complete.php");
            exit(0);
        }
    }
?>