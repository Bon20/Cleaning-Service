<?php
session_start();
require 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Client Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Client Edit 
                            <a href="admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $client_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM order_form WHERE id='$client_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $client = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="client_id" value="<?= $client['id']; ?>">

                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="fname" value="<?=$client['fname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$client['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="fa" value="<?=$client['fa'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="cnum" value="<?=$client['cnum'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                <h6 class="mb-2 pb-1"><b>Choose Your Service: </h6></b>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Dusting Service (399)" name="services[]" > Dusting Service (399)</label>
                                 </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="Bathroom Cleaning Service (499)" name="services[]"> Bathroom Cleaning Service (499)</label>
                                    </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="Deep Cleaning (599)" name="services[]" > Deep Cleaning (599)</label>
                                        </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Vacuuming Services (699)" name="services[]" > Vacuuming Service (699)</label>
                                            </div>
                            </div>
                            <div class="mb-3">
                            <div class="form-outline">
                                <label for="">Service Date & Time</label>
                                <input type="datetime-local" name="ser_dt" class="form-control">
                            </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_client" class="btn btn-primary">
                                            Update Client
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>