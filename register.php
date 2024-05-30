<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:34 GMT -->

<!-- Mirrored from workman1.cdott.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:58 GMT -->
<head>
  <?php include'web-layouts/head.php';?>
</head>

<body>

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    
    <!--End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
      <div class="image-layer" style="background-image: url(images/background/12.jpg);"></div>
      <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form">
          <div class="form-inner">
            <h3>Create Admin Account</h3>

            <!--Login Form-->
            <form id="registrationForm" method="post" action="function/admin/a_crte.php">
              <!--<div class="form-group">
                <div class="btn-box row">
                  <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn btn-style-seven"><i class="la la-user"></i> Candidate </a>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn btn-style-four"><i class="la la-briefcase"></i> Employer </a>
                  </div>
                </div>
              </div>-->

              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <label>First Name</label>
                    <input type="text" name="f_nm" placeholder="First Name" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <label>Last Name</label>
                    <input type="text" name="l_nm" value="" placeholder="Last Name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <label>User Name</label>
                    <input type="text" name="u_nm" placeholder="User Name" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <label>Password</label>
                    <input type="password" name="password" value="" placeholder="Password">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <label>Tele-phone</label>
                    <input type="text" name="tele" value="" placeholder="Tele-phone">
                  </div>
                </div>
                
              </div>

              <div class="form-group">
                <button class="theme-btn btn-style-one " type="submit" name="Register">Register</button>
              </div>
            </form>

            <div class="bottom-box">
              <div class="divider"><span>or</span></div>
              <div class="btn-box row">
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                </div>
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End Login Form -->
      </div>
    </div>
    <!-- End Info Section -->


  </div><!-- End Page Wrapper -->

  <?php include'web-layouts/scripts.php';?>

  <script>
  $(document).ready(function() {
    $("#registrationForm").submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting traditionally

      var formData = $(this).serialize(); // Serialize the form data

      $.ajax({
        type: "POST",
        url: "function/admin/a_crte.php", // Your PHP script for handling the data
        data: formData,
        success: function(response) {
          if (response.trim() === "success") {
            // Display a success alert using SweetAlert2
            Swal.fire({
              icon: 'success',
              title: 'Registration successful!',
              text: 'You have successfully registered.',
              confirmButtonText: 'OK'
            }).then(function() {
              // Clear the form fields
              $("#registrationForm")[0].reset();

              // Redirect to login.php
              window.location.href = "admin-login.php";
            });
          } else {
            // Display an error alert using SweetAlert2
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred during registration. Please try again later.',
              confirmButtonText: 'OK'
            });
          }
        }
      });
    });
  });
</script>



</body>


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:34 GMT -->

<!-- Mirrored from workman1.cdott.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:58 GMT -->
</html>