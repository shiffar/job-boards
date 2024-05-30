<?php
// job-single.php
if (isset($_GET['company_id'])) {
  $company_id = $_GET['company_id'];
  //echo "company_id is set to: " . $company_id; // Add this line for debugging
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/employers-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:17 GMT -->

<!-- Mirrored from workman1.cdott.com/employers-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:32 GMT -->
<head>
  <?php include'web-layouts/head.php';?>
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'web-layouts/header.php';?>
    <!--End Main Header -->

    <!-- Job Detail Section -->
    <section class="job-detail-section">
      <!-- Upper Box -->
      <div class="upper-box">
        <div class="auto-container">
          <!-- Job Block -->
          <div class="job-block-seven">
            <div class="inner-box">
              <div class="content">
              <span class="company-logo"><img src="" id="imagePreview" alt="" style="object-fit: cover; width: 100px; height: 100px; border-radius: 10%;"></span>
                <h4><a href="" id="company_name"></a></h4>

                <ul class="job-info">
                <li><span class="icon flaticon-map-locator"></span> <span id="cityCountry"></span></li>
                  <li><span class="icon flaticon-briefcase"></span> <span id="categories"></span></li>
                  <li><span class="icon flaticon-telephone-1"></span> <span id="phone"></span></li>
                  <li><span class="icon flaticon-mail"></span> <span id="email"></span></li>
                </ul>
                
              </div>

            
            </div>
          </div>
        </div>
      </div>

      <div class="job-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-detail">
                <h4>About Company</h4>
                <p id="about_company"></p>
                </div>

              <!-- Related Jobs -->
              
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget company-widget">
                  <div class="widget-content">

                    <ul class="company-info mt-0">
                      <li>Primary industry: <span id="categories2"></span></li>
                      <li>Company size: <span id="team_size"></span></li>
                      <li>Founded in: <span id="established_dat"></span></li>
                      <li>Phone: <span id="phone2"></span></li>
                      <li>Email: <span id="email2"></span></li>
                      <li>Location: <span id="cityCountry2"></span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three" id="websit"></a></div>
                  </div>
                </div>


              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Job Detail Section -->


    <!-- Main Footer -->
    <!-- End Main Footer -->


  </div><!-- End Page Wrapper -->
  <?php include'web-layouts/scripts.php';?>
  <script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      var company_id = <?php echo isset($company_id) ? json_encode($company_id) : 'null'; ?>;
      console.log("company_id:", company_id); // Log the job_id value
      function fetchCompanyDetails() {
          $.ajax({
              type: "POST",
              url: "function/company/cvp_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              data: { company_id: company_id }, 
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  $("#imagePreview").attr("src", `function/company/uploads/logo/${response.logo}`);
                  $("#company_name").text(response.company_name);
                  var categories = response.categories.map(category => category.replace(/"/g, '')).join(' / ');
                  categories = categories.replace(/\[|\]/g, ''); // Remove square brackets
                  $("#categories").text(categories);
                  var categories = response.categories.map(category => category.replace(/"/g, '')).join(' / ');
                  categories = categories.replace(/\[|\]/g, ''); // Remove square brackets
                  $("#categories2").text(categories);
                  $("#email").text(response.email);
                  $("#phone").text(response.phone);
                  $("#email2").text(response.email);
                  $("#phone2").text(response.phone);
                  $("#websit").text(response.website);
                  var inputDate = response.established_date;
                  var parts = inputDate.split('-');
                  if (parts.length === 3) {
                    var formattedDate = parts[2] + '-' + parts[1] + '-' + parts[0];
                    $("#established_dat").text(formattedDate);
                  }
                  $("#team_size").text(response.team_size);
                  $("#about_company").text(response.about_company);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanyDetails();
  });

</script>

<script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      var company_id = <?php echo isset($company_id) ? json_encode($company_id) : 'null'; ?>;
      console.log("company_id:", company_id);
      function fetchCompanySMedia() {
          $.ajax({
              type: "POST",
              url: "function/company/csmv_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              data: { company_id: company_id },
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  $("input[name='facebook']").val(response.facebook);
                  $("input[name='twitter']").val(response.twitter);
                  $("input[name='linkedin']").val(response.linkedin);
                  $("input[name='google_plus']").val(response.google_plus);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanySMedia();
  });

</script>

<script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      var company_id = <?php echo isset($company_id) ? json_encode($company_id) : 'null'; ?>;
      console.log("company_id:", company_id);
      function fetchCompanyContact() {
          $.ajax({
              type: "POST",
              url: "function/company/ccv_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              data: { company_id: company_id },
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  var cityCountry = response.city + ', ' + response.country;
                  $("#cityCountry").text(cityCountry);
                  var cityCountry = response.city + ', ' + response.country;
                  $("#cityCountry2").text(cityCountry);
                  $("input[name='complete_address']").val(response.complete_address);
                  $("input[name='find_on_map']").val(response.find_on_map);
                  $("input[name='latitude']").val(response.latitude);
                  $("input[name='longitude']").val(response.longitude);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanyContact();
  });

</script>
  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/employers-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:19 GMT -->

<!-- Mirrored from workman1.cdott.com/employers-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:35 GMT -->
</html>