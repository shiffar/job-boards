<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:34 GMT -->

<!-- Mirrored from workman1.cdott.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:58 GMT -->

<?php include'web-layouts/admin/a_lgn/a_lgn_head.php';?>


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
          <div id="error-message" class="error-message"></div>

            <h3>Login to Superio</h3>
            <!--Login Form-->
            <form id="login-form" method="post">
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="u_nm" placeholder="Username" required>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input id="password-field" type="password" name="pswrd" placeholder="Password" required>
              </div>

              <div class="form-group">
                  <div class="field-outer">
                      <div class="input-group checkboxes square">
                          <!--<input type="checkbox" name="remember-me" value="1" id="remember">
                          <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>-->
                      </div>
                      <a href="#" class="pwd">Forgot password?</a>
                  </div>
              </div>

              <div class="form-group">
                  <button class="theme-btn btn-style-one" type="submit" name="log-in">Log In</button>
              </div>
          </form>


            <div class="bottom-box">
              <div class="text">Don't have an account? <a href="register.php">Signup</a></div>
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
        $('#login-form').submit(function(e) {
            e.preventDefault();

            // Get form data
            var formData = $(this).serialize();

            // Make an Ajax request to login.php
            $.ajax({
                type: 'POST',
                url: 'function/admin/a_lgn.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show a success pop-up
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            // Redirect to a protected page or perform other actions
                            window.location.href = 'admin/admin-dashboard.php';
                        });
                    } else {
                        // Show an error pop-up
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
    });
</script>

</body>


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:34 GMT -->

<!-- Mirrored from workman1.cdott.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:58 GMT -->
</html>