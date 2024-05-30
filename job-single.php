<?php
// job-single.php
if (isset($_GET['job_id'])) {
  $job_id = $_GET['job_id'];
  //echo "job_id is set to: " . $job_id; // Add this line for debugging
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/job-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:13 GMT -->

<!-- Mirrored from workman1.cdott.com/job-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:23 GMT -->
<head>
  <?php include'web-layouts/head.php';?>
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
                <span class="company-logo"><img src="" id="imagePreview" style="object-fit: cover; width: 100px; height: 100px; border-radius: 10%;" alt=""></span>
                <h4><a href="#" id="job_title"></a></h4>
                <ul class="job-info">
                <li><span class="icon flaticon-briefcase"></span> <span id="specialisms"></span></li>
                  <li><span class="icon flaticon-map-locator"></span> <span id="cityCountry"></span></li>
                  <li><span class="icon flaticon-clock-3"></span> <span id="crte_dte"></span></li>
                  <li><span class="icon flaticon-money"></span> <span id="offered_salary"></span></li>
                </ul>
                
              </div>

              <div class="btn-box">
                <!--<a href="#" class="theme-btn btn-style-one" style="margin-right: 20px;">Apply With CV</a>-->
                <a href="#" class="theme-btn btn-style-one" id="applyForJob">Apply For Job</a>
                <!--<button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>-->
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
                <h4>Job Description</h4>
                <p id="job_description"></p>
              </div>

              <!-- Other Options -->
              <div class="other-options">
                <div class="social-share">
                  <h5>Share this job</h5>
                  <a href="#" class="telegram"><i class="fab fa-telegram fa-lg"></i> Telegram</a>
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                  <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                  <a href="#" class="viber"><i class="fab fa-viber"></i> Viber</a>
                  <a href="#" class="instagram"><i class="fab fa-instagram"></i>Instagram</a>
                </div>
              </div>

              <!-- Related Jobs -->
              
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <!-- Job Overview -->
                  <!-- Map Widget -->
                  <h4 class="widget-title">Job Location</h4>
                  <div class="widget-content">
                    <div class="map-outer">
                      <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                      </div>
                    </div>
                  </div>

                  <!-- Job Skills -->
                  
                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="" id="imagePreview2" style="object-fit: cover; width: 50px; height: 50px; border-radius: 10%;"  alt=""></div>
                      <h5 class="company-name" id="company_name"></h5>
                      <a href="#" class="profile-link" data-companyid="">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span id="industry"></span></li>
                      <li>Company size: <span id="team_size"></span></li>
                      <li>Founded in: <span id="established_date"></span></li>
                      <li>Phone: <span id="phone"></span></li>
                      <li>Email: <span id="email"></span></li>
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

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
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
    <?php include'web-layouts/footer.php';?>
    <!-- End Main Footer -->


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
  <script>
    $(document).ready(function() {
        // Function to fetch company details and populate the form
        var job_id = <?php echo isset($job_id) ? json_encode($job_id) : 'null'; ?>;
        console.log("job_id:", job_id); // Log the job_id value
        function fetchJobs() {
            $.ajax({
                type: "POST",
                url: "function/company/sj_fetch.php", // Adjust the path to your PHP script
                dataType: "json",
                data: { job_id: job_id }, 
                success: function(response) {
                    console.log("Received data:", response); // Log received data
                    $("#company_name").text(response.company_name);
                    $("#imagePreview").attr("src", `function/company/uploads/logo/${response.logo}`);
                    $("#imagePreview2").attr("src", `function/company/uploads/logo/${response.logo}`);
                    $("#job_title").text(response.job_title);
                    $("#job_description").text(response.job_description);
                    $("#specialisms").text(response.specialisms);
                    var cityCountry = response.jp_city + ', ' + response.jp_country;
                      $("#cityCountry").text(cityCountry);
                    // Assuming job.crte_dte is a valid date string or timestamp
                    var createDate = new Date(response.crte_dte);

                    // Get the current date and time
                    var currentDate = new Date();

                    // Calculate the time difference in milliseconds
                    var timeDiffMillis = currentDate - createDate;

                    // Calculate the time difference in minutes, hours, days, and months
                    var minutesDiff = Math.floor(timeDiffMillis / (1000 * 60));
                    var hoursDiff = Math.floor(timeDiffMillis / (1000 * 60 * 60));
                    var daysDiff = Math.floor(timeDiffMillis / (1000 * 60 * 60 * 24));
                    var monthsDiff = Math.floor(timeDiffMillis / (1000 * 60 * 60 * 24 * 30));

                    // Determine the appropriate time description based on the time difference
                    var timeAgo;
                    if (monthsDiff > 0) {
                        timeAgo = monthsDiff + (monthsDiff === 1 ? ' month' : ' months') + ' ago';
                    } else if (daysDiff > 0) {
                        timeAgo = daysDiff + (daysDiff === 1 ? ' day' : ' days') + ' ago';
                    } else if (hoursDiff > 0) {
                        timeAgo = hoursDiff + (hoursDiff === 1 ? ' hour' : ' hours') + ' ago';
                    } else {
                        timeAgo = minutesDiff + (minutesDiff === 1 ? ' minute' : ' minutes') + ' ago';
                    }

                    // Now, you can display the timeAgo variable wherever you need it
                    $("#crte_dte").text(timeAgo);
                    $("#offered_salary").text(response.offered_salary);
                    $("#industry").text(response.industry);
                    $("#team_size").text(response.team_size);
                    var establishedDate = response.established_date;
                    var parts = establishedDate.split("-");
                    if (parts.length === 3) {
                        var formattedDate = parts[2] + "-" + parts[1] + "-" + parts[0];
                        $("#established_date").text(formattedDate);
                    }
                    $("#phone").text(response.phone);
                    $("#email").text(response.email);
                    $(".profile-link").attr("data-companyid", response.company_id);
                    var cityCountry2 = response.city + ', ' + response.country;
                      $("#cityCountry2").text(cityCountry2);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
                }
            });
        }

        // Call the fetchCompanyDetails function when the page loads
        fetchJobs();

        $(".profile-link").on("click", function(e) {
          e.preventDefault();
          var $this = $(this);
          var company_id = $this.data("companyid"); // Get the company ID

          $.ajax({
              url: 'function/company/add_ppv_count.php',
              type: 'POST',
              data: {
                  action: 'increment',
                  companyid: company_id // Send company ID to the server
              },
              success: function(response) {
                  var profileUrl = "company-view-profile.php?company_id=" + company_id;
                  window.location.href = profileUrl;
              }
          }); 
        });



    });
  </script>

<script>
$(document).ready(function() {
    var job_id2 = <?php echo isset($job_id) ? json_encode($job_id) : 'null'; ?>;
    console.log("job_id:", job_id2); // Log the job_id value
    $('#applyForJob').on('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior

        // Make an AJAX request to apply_job.php
        $.ajax({
            type: 'POST',
            url: 'function/job-seeker/js_japp.php', // PHP script that handles both session check and data insertion
            dataType: 'json',
            data: { job_id2: job_id2 }, 
            success: function(response) {
                if (response.success) {
                    // Action was successful, display a success message using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Handle errors or show an alert using SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                // Handle errors with SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>

  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/job-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:14 GMT -->

<!-- Mirrored from workman1.cdott.com/job-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:26 GMT -->
</html>