<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
<head>
  <?php include'web-layouts/c-head.php';?>

</head>

<body>

  <div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'web-layouts/c-header.php';?>

    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <?php include'web-layouts/candidate-side-bar.php';?>

    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <!--<div class="upper-title-box">
          <h3>Change Password</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->

        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="widget-title">
            <h4>Change Password</h4>
          </div>

          <div class="widget-content">
            <form class="default-form" id="passwordChangeForm">
                <div class="row">
                    <!-- Input for Old Password -->
                    <div class="form-group col-lg-7 col-md-12">
                        <label for="old_password">Old Password</label>
                        <input type="password" name="old_password" id="old_password" placeholder="" required>
                    </div>

                    <!-- Input for New Password -->
                    <div class="form-group col-lg-7 col-md-12">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" placeholder="" required>
                    </div>

                    <!-- Input for Confirm Password -->
                    <div class="form-group col-lg-7 col-md-12">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-6 col-md-12">
                        <button type="button" id="updatePassword" class="theme-btn btn-style-one">Update</button>
                    </div>
                </div>
            </form>
        </div>

        </div>
      </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <?php include'web-layouts/copyright.php';?>


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
  <script>
    $(document).ready(function () {
        $("#updatePassword").click(function () {
            if (document.getElementById("passwordChangeForm").checkValidity()) {
                var formData = $("#passwordChangeForm").serialize();

                // Perform additional client-side validation here if needed
                // For example, check if new and confirm passwords match, etc.

                $.ajax({
                    type: "POST",
                    url: "function/job-seeker/change_password.php",
                    data: formData,
                    success: function (response) {
                        // Handle the response from the server
                        if (response === "success") {
                            // Password change successful
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Password changed successfully.",
                                confirmButtonText: "OK",
                            });
                            // Clear the form
                            $("#passwordChangeForm")[0].reset();
                        } else {
                            // Password change failed
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Password change failed. Please check your old password.",
                                confirmButtonText: "OK",
                            });
                        }
                    },
                });
            } else {
                // Show validation messages for required fields
                document.getElementById("passwordChangeForm").reportValidity();
            }
        });
    });
  </script>



</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
</html>