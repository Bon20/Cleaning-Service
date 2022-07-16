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

    <title>Complete Service</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Completed Client Details
                        <a href="admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="complete-search.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Services</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                               
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM complete_form";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $client)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $client['id']; ?></td>
			                                    <td><?= $client['fname']; ?></td>
                                                <td><?= $client['email']; ?></td>
                                                <td><?= $client['fa']; ?></td>
                                                <td><?= $client['cnum']; ?></td>
                                                <td><?= $client['services']; ?></td>
                                                <td><?= $client['ser_dt']; ?></td>
                                                <td>
                                                    <a href="client-view.php?id=<?= $client['id']; ?>" class="btn btn-outline-info btn-sm">View</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_complete" value="<?=$client['id'];?>" class="btn btn-outline-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                            
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>