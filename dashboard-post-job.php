<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:37 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:25 GMT -->
<head>
  <?php include'web-layouts/p-head.php';?>
</head>

<body>

  <div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'web-layouts/p-header.php';?>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <?php include'web-layouts/job-provider-side-bar.php';?>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <!--<div class="upper-title-box">
          <h3>Post a New Job!</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Post Job</h4>
                </div>

                <div class="widget-content">

                  <div class="post-job-steps">
                    <div class="step">
                      <span class="icon flaticon-briefcase"></span>
                      <h5>Job Detail</h5>
                    </div>

                    <div class="step">
                      <span class="icon flaticon-money"></span>
                      <h5>Package & Payments</h5>
                    </div>

                    <div class="step">
                      <span class="icon flaticon-checked"></span>
                      <h5>Confirmation</h5>
                    </div>
                  </div>

                  <form class="default-form" id="post-jobs-form">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Job Title</label>
                        <input type="text" name="job_title" placeholder="Title">
                      </div>

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Job Description</label>
                        <textarea name="job_description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                      </div>


                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email Address</label>
                        <input type="email" name="email_address" placeholder="">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username">
                      </div>

                      <!-- Search Select -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Specialisms </label>
                        <select data-placeholder="Specialisms" class="chosen-select multiple" multiple tabindex="4" name="specialisms[]" id="specialisms-select">
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Job Type</label>
                        <select class="chosen-select" name="job_type" id="job_type-select">
                        <option value="">Select</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Offered Salary</label>
                        <input type="text" name="offered_salary" placeholder="Offered Salary">
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Career Level</label>
                        <select class="chosen-select" name="career_level" id="experience-select">
                          <option value="">Select</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Experience</label>
                          <input type="text" name="experience" placeholder="Experience">
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Gender</label>
                        <select class="chosen-select" name="gender">
                          <option value="">Select</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Industry</label>
                        <select class="chosen-select" name="industry" id="industry-select">
                            <option value="">Select</option>
                            
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Qualification</label>
                        <select class="chosen-select" name="qualification" id="qualification-select">
                            <option value="">Select</option>
                            
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Application Deadline Date</label>
                        <input type="date" name="application_deadline_date" placeholder="06.04.2020">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Province</label>
                        <select class="chosen-select" name="country" id="provinces-select">
                          <option value="">Select</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>City</label>
                        <select class="chosen-select" name="city" id="city-select">
                          <option value="">Select</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Complete Address</label>
                        <input type="text" name="complete_address" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Find On Map</label>
                        <input type="text" name="find_on_map" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Latitude</label>
                        <input type="text" name="latitude" placeholder="Melbourne">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Longitude</label>
                        <input type="text" name="longitude" placeholder="Melbourne">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <button class="theme-btn btn-style-three">Search Location</button>
                      </div>


                      <div class="form-group col-lg-12 col-md-12">
                        <div class="map-outer">
                          <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                          </div>
                        </div>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12 text-right">
                        <button class="theme-btn btn-style-one" id="post-jobs-button">save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
    $(document).ready(function() {
      $("#post-jobs-button").click(function(e) {
        e.preventDefault();
        
        var formData = new FormData($("#post-jobs-form")[0]);

        $.ajax({
          url: "function/company/company_post_jobs.php", // Replace with the actual PHP processing script
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            // Handle the response from the server
            console.log(response);

            // Display SweetAlert2 success message if data was inserted/updated successfully
            if (response.includes("successfully")) {
              
              Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: response,
                  confirmButtonText: 'OK'
              }).then(() => {
                  $("#post-jobs-form")[0].reset();
                  window.location.reload();
              });

            } else {
              // Display SweetAlert2 error message if an error occurred
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response,
                confirmButtonText: 'OK'
              });
            }
          }
        });
      });
    });
  </script>
  
      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_specialisms.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch specialisms. Error: ' + data.error);
                } else {
                    var select = $('#specialisms-select');
                    data.forEach(function (specialism) {
                        select.append($('<option>', {
                            value: specialism.specialisms,
                            text: specialism.specialisms
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_job-type.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch job type. Error: ' + data.error);
                } else {
                    var select = $('#job_type-select');
                    data.forEach(function (job_type) {
                        select.append($('<option>', {
                            value: job_type.job_type,
                            text: job_type.job_type
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_experience.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch experience. Error: ' + data.error);
                } else {
                    var select = $('#experience-select');
                    data.forEach(function (experience) {
                        select.append($('<option>', {
                            value: experience.experience,
                            text: experience.experience
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_industry.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch industry. Error: ' + data.error);
                } else {
                    var select = $('#industry-select');
                    data.forEach(function (industry) {
                        select.append($('<option>', {
                            value: industry.industry,
                            text: industry.industry
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_qualification.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch qualification. Error: ' + data.error);
                } else {
                    var select = $('#qualification-select');
                    data.forEach(function (qualification) {
                        select.append($('<option>', {
                            value: qualification.qualification,
                            text: qualification.qualification
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_provinces.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch provinces. Error: ' + data.error);
                } else {
                    var select = $('#provinces-select');
                    data.forEach(function (provinces) {
                        select.append($('<option>', {
                            value: provinces.provinces,
                            text: provinces.provinces
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

      <script>
        $(document).ready(function () {
          $.ajax({
            url: 'function/fetch_cities.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Failed to fetch city. Error: ' + data.error);
                } else {
                    var select = $('#city-select');
                    data.forEach(function (cities) {
                        select.append($('<option>', {
                            value: cities.cities,
                            text: cities.cities
                        }));
                    });

                    // After adding the options, initialize the Chosen plugin
                    select.trigger("chosen:updated");
                }
            },
            error: function () {
                console.error('AJAX request failed');
            }
          });
        });

      </script>

  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:37 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:25 GMT -->
</html>