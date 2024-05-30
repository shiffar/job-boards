<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:13:29 GMT -->

<!-- Mirrored from workman1.cdott.com/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:36:32 GMT -->
<head>
  <?php include'web-layouts/index-head.php';?>
  <style>
/* Add this CSS to your stylesheet */
.moving-boxes {
  --civi-jobs-height: 113px;
  --civi-jobs-spacing: 60px;
  --civi-jobs-item: 4;
  overflow: hidden;
  height: calc((var(--civi-jobs-height) + var(--civi-jobs-spacing)) * var(--civi-jobs-item));
}

/* Add this CSS to your stylesheet */
.moving-boxes .box {
  width: 100%;
  height: 100px;
  background-color: #FFD75EF2; /* Set the background color for the odd-numbered boxes */
  color: #fff;
  text-align: left;
  padding: 10px;
  margin: 5px 0;
  padding: 24px;
  border-radius: 20px;
  max-width: 450px;
  -webkit-animation: translateinfinite 15s linear infinite;
  animation: translateinfinite 15s linear infinite;
  margin-top: var(--civi-jobs-spacing);
  margin-bottom: var(--civi-jobs-spacing);
}

/* Adjust the margin for even-numbered boxes to shift them slightly to the left */
.moving-boxes .box:nth-child(even) {
  background-color: #F9A880F2; /* Set the background color for the even-numbered boxes */
  margin-left: 30px; /* Adjust the left margin to shift them to the left */
}

.moving-boxes .box:nth-child(3) {
  background-color: #E1EAF1F2; /* Set the background color for the third box */
}

.moving-boxes .box:nth-child(4) {
  background-color: #FFD75EF2; /* Set the background color for the fourth box */
}


@keyframes translateinfinite {
  0% {
    transform: translateY(100%);
  }

  100% {
    transform: translateY(calc((var(--civi-jobs-height) + var(--civi-jobs-spacing)) * var(--civi-jobs-item) * -1));
  }
}

/* Add this CSS to your stylesheet */
.moving-boxes:hover .box {
  -webkit-animation-play-state: paused;
  animation-play-state: paused;
}

/* Add this CSS to your stylesheet */
.image-column {
  position: relative;
}

.image-box {
  position: relative;
  z-index: 1;
}

.moving-boxes {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 2;
}

/* Rest of your existing CSS remains the same */

.link:hover { color: #ffd700; }

  </style>
</head>

<body data-anm=".anm">

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">

      <?php include'web-layouts/index-header.php';?>
    </header>
    <!--End Main Header -->

    <!-- Banner Section Three-->
    <section class="banner-section-three">
  <div class="auto-container">
    <div class="row">
      <div class="content-column col-lg-7 col-md-12 col-sm-12">
        <div class="inner-column">
          <div class="title-box wow fadeInUp">
            <h3>Join us & Explore Thousands <br> of Jobs</h3>
            <div class="text">Find Jobs, Employment & Career Opportunities</div>
          </div>

          <!-- Job Search Form -->
          <div class="job-search-form-two wow fadeInUp" data-wow-delay="500ms">
            <form method="post" id="jobSearchForm">
              <div class="row">
                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                  <label class="title">What</label>
                  <span class="icon flaticon-search-1"></span>
                  <input type="text" name="field_name" placeholder="Job title, keywords, or company">
                </div>
                <!-- Form Group -->
                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                  <label class="title">Where</label>
                  <span class="icon flaticon-map-locator"></span>
                  <input type="text" name = "field_location" placeholder="City or postcode">
                </div>
                <!-- Form Group -->
                <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                  <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Find Jobs</span></button>
                </div>
              </div>
            </form>
          </div>
          <!-- Job Search Form -->

          <!-- Popular Search -->
          <div class="popular-searches wow fadeInUp" data-wow-delay="1000ms">
            <span class="title">Popular Searches : </span>
            <a href="#">Designer</a>,
            <a href="#">Developer</a>,
            <a href="#">Web</a>,
            <a href="#">IOS</a>,
            <a href="#">PHP</a>,
            <a href="#">Senior</a>,
            <a href="#">Engineer</a>,
          </div>
          <!-- End Popular Search -->
        </div>
      </div>

      <div class="image-column col-lg-5 col-md-12">
        <div class="image-box">
          <figure class="main-image wow fadeInRight" data-wow-delay="1500ms"><img src="images/resource/banner-img-3.png" alt=""></figure>
        </div>
        <div class="moving-boxes">
          <!-- Boxes will be populated dynamically here -->
        </div>
      </div>
    </div>
  </div>
</section>



    <!-- About Section -->
    <section class="about-section-two">
      <div class="auto-container">
        <div class="row">
          <!-- Content Column -->
          <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
            <div class="inner-column wow fadeInRight">
              <div class="sec-title">
                <h2>Get applications from the <br>world best talents.</h2>
                <div class="text">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</div>
              </div>
              <ul class="list-style-one">
                <li>Bring to the table win-win survival</li>
                <li>Capitalize on low hanging fruit to identify</li>
                <li>But I must explain to you how all this</li>
              </ul>
              <a href="#" class="theme-btn btn-style-one">Post a Job</a>
            </div>
          </div>

          <!-- Image Column -->
          <div class="image-column col-lg-6 col-md-12 col-sm-12">
            <figure class="image-box wow fadeInLeft"><img src="images/resource/image-3.png" alt=""></figure>

            <!-- Count Employers -->
            <div class="applicants-list wow fadeInUp">
              <div class="title-box">
                <h4>Applicants List</h4>
              </div>
              <ul class="applicants">
                <li class="applicant">
                  <figure class="image"><img src="images/resource/applicant-1.png" alt=""></figure>
                  <h4 class="name">Brooklyn Simmons</h4>
                  <span class="designation">Web Developer</span>
                </li>

                <li class="applicant">
                  <figure class="image"><img src="images/resource/applicant-2.png" alt=""></figure>
                  <h4 class="name">Courtney Henry</h4>
                  <span class="designation">Web Developer</span>
                </li>

                <li class="applicant">
                  <figure class="image"><img src="images/resource/applicant-3.png" alt=""></figure>
                  <h4 class="name">Marvin McKinney</h4>
                  <span class="designation">Web Developer</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- Main Footer -->
    <?php include'web-layouts/footer.php';?>
    <!-- End Main Footer -->


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
  <script>
    $(document).ready(function() {
        // Add a click event handler for the button
        $("#show-login-modal").click(function() {
            // Load the login modal via AJAX
            $.get("login-popup.php", function(html) {
                $(html).appendTo('body').modal({
                    fadeDuration: 300,
                    fadeDelay: 0.15
                });
            });
        });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#jobSearchForm').submit(function(e) {
          e.preventDefault();
          var formData = $('#jobSearchForm').serialize(); // Serialize form data
          $.ajax({
              type: 'POST',
              url: 'function/company/fetch_jobs2.php',
              data: formData,
              success: function(response) {
                  // Redirect to job-list-v3.php with filter parameters
                  $("#jobSearchForm")[0].reset();
                  window.location = 'job-list-v3.php?' + formData;
              },
              error: function(xhr, status, error) {
                  console.log("Error: " + error);
              }
          });
      });
    });

  </script>

<script>
  $(document).ready(function() {
    // Use jQuery AJAX to fetch job data
    $.ajax({
      url: 'function/company/fetch_jobs3.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data.length > 0) {
          // Loop through the retrieved job data and create boxes
          data.forEach(function(job) {
            var jobId = job.job_id;
            var jobTitle = job.job_title;
            var jobLocation = job.jp_city;
            var boxHtml = '<div class="box"><p>' + jobLocation + '</p><h4 style="font-weight: 500; color: #0057b8; text-transform: capitalize;"><a class="link" href="job-single.php?job_id=' + jobId + '">' + jobTitle + '</a></h4></div>';
            $('.moving-boxes').append(boxHtml);
          });
        } else {
          // Handle the case where no jobs were found
          $('.moving-boxes').append('<div class="box">No jobs found.</div>');
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>


</body>


<!-- Mirrored from creativelayers.net/themes/superio/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:13:34 GMT -->

<!-- Mirrored from workman1.cdott.com/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:36:45 GMT -->
</html>