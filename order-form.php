<html>
<head>
  <title>Order Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css?parameter=2">
</head>
<body>
  <nav class="navbar">
    <div class="container-fluid">
        <div class="container-fluid">
           <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/Cleaning-Service/index.html#">
            <img src="dustoff_logo.png" alt="Cleaning Service" id="img"></a>
        </div>
    </div>
  </nav>

  <?php 
           if(isset($_SESSION['status']))
           {
               ?>
                   <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
               <?php
                unset($_SESSION['status']);
           }
 ?>

  <div class="container py-4 h-100">
  <div class="row justify-content-center align-items-center h-130">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
        <div class="card-body p-4 p-md-5">
         <h2 class="mb-4 pb-2 pb-md-0 mb-md-5">Book Now</h2>

      <form action="order_form.php" method="post">   
      <div class="row">
   <div class="col-md-6 mb-4">
     <div class="form-outline">
       <label class="form-label" for="FullName"><b>Full Name</label></b>
       <input type="text" id="Fname" name ="fname" placeholder="Enter Full Name" class="form-control form-control-lg" required />
     </div>
   </div>
   <div class="col-md-6 mb-4">
     <div class="form-outline">
       <label class="form-label" for="EmailAddress"><b>Email</label></b>
       <input type="email" id="Email" name= "email"  placeholder="Enter email" class="form-control form-control-lg" required />
     </div>
   </div>
 </div>
 <div class="row">
   <div class="col-md-6 mb-4 d-flex align-items-center">
     <div class="form-outline datepicker w-100">
       <label for="ContactNumber" class="form-label"><b>Contact Number</label></b>
       <input type="tel" name ="cnum" class="form-control form-control-lg" id="Cnum" placeholder="Contact Number" required />
     </div>
   </div>
   <div class="col-md-6 mb-4">
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
 </div>
 <div class="row">
   <div class="col-md-6 mb-4 pb-2">
     <div class="form-outline">
       <label class="form-label" for="Address"><b>Home Address</label></b>
       <input type="address" id="add" name ="fa" placeholder="Address" class="form-control form-control-lg" required />
     </div>
   </div>
   <div class="col-md-6 mb-4 pb-2">
     <div class="form-outline">
       <label for=""><b>Service Date & Time</label><b>
       <input type="datetime-local" name="ser_dt" class="form-control">
     </div>
   </div>
 </div>
 <div class="mt-4 pt-2">
   <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
 </div>
        </form>
      </div>
    </div>
  </body>
</html>