
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:19 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:35 GMT -->
<head>
  <?php include'../web-layouts/admin/a_head.php';?>
</head>

<body>

  <div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'../web-layouts/admin/admin-header.php';?>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <?php include'../web-layouts/admin-side-bar.php';?>
    
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
    

      <div class="dashboard-outer">
      <?php echo "Welcome, " . $_SESSION['username'] . "! This is the dashboard.";?>
        <!--<div class="upper-title-box">
          <h3>Howdy, Invision!</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->
      </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <?php include'../web-layouts/copyright.php';?>

  </div><!-- End Page Wrapper -->


  <?php include'../web-layouts/scripts.php';?>

</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:21 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:36 GMT -->
</html>