<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-manage-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-manage-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
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
          <h3>Manage Jobs</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Job Listings</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    <select class="chosen-select">
                      <option>Last 6 Months</option>
                      <option>Last 12 Months</option>
                      <option>Last 16 Months</option>
                      <option>Last 24 Months</option>
                      <option>Last 5 year</option>
                    </select>
                  </div>
                </div>

                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Applications</th>
                          <th>Created & Expired</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody id="job-listings-body">
                    <!-- Job data will be populated here using AJAX -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>

      <div id="pj-modal-update" style="display: none;">
        <div class="model">
            <div style="max-width: 1000px; padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Update Job</h3>

                        <form id="updateJobForm">
                            <input type="hidden" name="job_id" id="job_id">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" name="job_title" id="job_title" placeholder="Job Title">
                            </div>
                            <div class="form-group">
                                <label>Job Description</label>
                                <textarea name="job_description" id="job_description" placeholder="Job Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email_address" id="email_address" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" id="username" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label>Specialisms</label>
                                <select data-placeholder="Specialisms" class="chosen-select multiple" multiple tabindex="4" name="specialisms[]" id="specialisms-select">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Job Type</label>
                                <select class="chosen-select" name="job_type" id="job_type-select">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Offered Salary</label>
                                <input type="text" name="offered_salary" id="offered_salary" placeholder="Offered Salary">
                            </div>
                            <div class="form-group">
                                <label>Career Level</label>
                                <select class="chosen-select" name="career_level" id="career_level-select">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <input type="text" name="experience" id="experience" placeholder="Experience">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="chosen-select" name="gender" id="gender-select">
                                  <option value="">Select</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Industry</label>
                                <select class="chosen-select" name="industry" id="industry-select">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qualification</label>
                                <select class="chosen-select" name="qualification" id="qualification-select">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Application Deadline Date</label>
                                <input type="date" name="application_deadline_date" id="application_deadline_date">
                            </div>
                            <div class="form-group">
                                <label>Province</label>
                                <select class="chosen-select" name="jp_country" id="jp_country">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <select class="chosen-select" name="jp_city" id="jp_city">
                                  <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Complete Address</label>
                                <input type="text" name="complete_address" id="complete_address" placeholder="Complete Address">
                            </div>
                            <div class="form-group">
                                <label>Find on Map</label>
                                <input type="text" name="find_on_map" id="find_on_map" placeholder="Find on Map">
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="jp_latitude" id="jp_latitude" placeholder="Latitude">
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="jp_longitude" id="jp_longitude" placeholder="Longitude">
                            </div>
                            <div class="form-group">
                                <label>Job Status</label>
                                <select class="chosen-select" name="status" id="status-select">
                                  <option value="">Select</option>
                                  <option value="Active">Active</option>
                                  <option value="Not-Active">Not-Active</option>
                                </select>
                                  
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-two" type="button" id="updateJob">Update</button>
                            </div>
                        </form>
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
    $(document).ready(function () {
      // Function to fetch job data
      function fetchJobData() {
          $.ajax({
              url: 'function/company/fetch_jobs1.php', // Replace with the correct URL to your PHP script
              method: 'GET',
              dataType: 'json',
              success: function (data) {
                  // Clear existing table data
                  $('#job-listings-body').empty();

                  // Iterate through the fetched data and populate the table
                  data.forEach(function (job) {
                      // Extract the date part (YYYY-MM-DD) from job.crte_dte
                      var createDate = job.crte_dte.split(' ')[0];

                      var row = '<tr>' +
                          '<td>' +
                          '<h6>' + job.job_title + '</h6>' +
                          '<span class="info"><i class="icon flaticon-map-locator"></i> ' + job.jp_city + ', ' + job.jp_country + '</span>' +
                          '</td>' +
                          '<td class="applied">' + job.applications + '</td>' +
                          '<td>' + createDate + '<br>' + job.application_deadline_date + '</td>' +
                          '<td class="status" style="color: ' + (job.status === 'Not-Active' ? 'red !important' : 'green') + '">' + job.status + '</td>' +
                          '<td>' +
                          '<div class="option-box">' +
                          '<ul class="option-list">' +
                          '<li><button data-text="Reject Application" class="openModalButton" data-job-id="' + job.job_id + '"><span class="la la-pencil"></span></button></li>' +
                          '<li><button data-text="Delete Application" data-delete-job-id="' + job.job_id + '"><span class="la la-trash"></span></button></li>' +
                          '</ul>' +
                          '</div>' +
                          '</td>' +
                          '</tr>';

                      $('#job-listings-body').append(row);
                  });

                    $('.openModalButton').click(function () {
                      // Get the job ID from the data attribute
                      console.log("Button clicked"); // Add this line

                      // Get the job ID from the data attribute
                      var jobID = $(this).data('job-id');

                      console.log("Job ID: " + jobID); 

                      // Fetch data for the specific job using AJAX
                      $.ajax({
                          url: 'function/company/fetch_job_details.php', // Replace with the correct URL to your PHP script
                          method: 'GET',
                          data: { job_id: jobID },
                          dataType: 'json',
                          success: function (jobData) {
                            console.log(jobData);
                              // Populate the modal with the fetched data
                              $('#job_id').val(jobData.job_id);
                              $('#job_title').val(jobData.job_title);
                              $('#job_description').val(jobData.job_description);
                              $('#email_address').val(jobData.email_address);
                              $('#username').val(jobData.username);
                              // Get the selected specialisms from the job data and parse it (assuming it's in JSON format)
                              $.ajax({
                                url: 'function/fetch_specialisms.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#specialisms-select');
                                        select.empty(); // Clear existing options
                                        data.forEach(function (specialism) {
                                            var $option = $('<option value="' + specialism.specialisms + '">' + specialism.specialisms + '</option>');
                                            select.append($option);
                                        });

                                        // Select the options that match the received data
                                        var specialisms = JSON.parse(jobData.specialisms);
                                        specialisms.forEach(function (category) {
                                            select.find('option[value="' + category + '"]').prop('selected', true);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch specialisms');
                                }
                            });
                            ///////////////////////////////////////////
                            $.ajax({
                                url: 'function/fetch_filter_job_types.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#job_type-select');
                                        select.empty(); // Clear existing options
                                        var selectedJobType = jobData.job_type; // Replace with the value you want to select

                                        data.forEach(function (jobType) {
                                            var $option = $('<option value="' + jobType.job_type + '">' + jobType.job_type + '</option>');
                                            if (jobType.job_type === selectedJobType) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                            });

                              //////////////////////////////////////////

                              $.ajax({
                                url: 'function/fetch_experience.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#career_level-select');
                                        select.empty(); // Clear existing options
                                        var selectedCareerLevel = jobData.career_level; // Replace with the value you want to select

                                        data.forEach(function (experience) {
                                            var $option = $('<option value="' + experience.experience + '">' + experience.experience + '</option>');
                                            if (experience.experience === selectedCareerLevel) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                            });

                              //////////////////////////////////////////

                              var selectedGender = jobData.gender; // Replace with the value you want to select
                              var selectElement4 = $("select[name='gender']");

                              // Initialize Chosen.js on the select element
                              selectElement4.chosen();

                              // Set the selected value
                              selectElement4.val(selectedGender);

                              // Trigger Chosen's update event to reflect the selected value
                              selectElement4.trigger("chosen:updated");
                              /////////////////////////////////////////

                              $.ajax({
                                url: 'function/fetch_industry.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#industry-select');
                                        select.empty(); // Clear existing options
                                        var selectedIndustry = jobData.industry; // Replace with the value you want to select

                                        data.forEach(function (industry) {
                                            var $option = $('<option value="' + industry.industry + '">' + industry.industry + '</option>');
                                            if (industry.industry === selectedIndustry) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                             });

                              
                              //////////////////////////////////////////
                              $.ajax({
                                url: 'function/fetch_qualification.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#qualification-select');
                                        select.empty(); // Clear existing options
                                        var selectedQualification = jobData.qualification;  // Replace with the value you want to select

                                        data.forEach(function (qualification) {
                                            var $option = $('<option value="' + qualification.qualification + '">' + qualification.qualification + '</option>');
                                            if (qualification.qualification === selectedQualification) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                             });

                              
                              //////////////////////////////////////////
                              var selectedStatus = jobData.status; // Replace with the value you want to select
                              var selectElement7 = $("select[name='status']");

                              // Initialize Chosen.js on the select element
                              selectElement7.chosen();

                              // Set the selected value
                              selectElement7.val(selectedStatus);

                              // Trigger Chosen's update event to reflect the selected value
                              selectElement7.trigger("chosen:updated");
                              ///////////////////////////////////////////
                              $.ajax({
                                url: 'function/fetch_provinces.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#jp_country');
                                        select.empty(); // Clear existing options
                                        var selectedCountry = jobData.jp_country; // Replace with the value you want to select

                                        data.forEach(function (provinces) {
                                            var $option = $('<option value="' + provinces.provinces + '">' + provinces.provinces + '</option>');
                                            if (provinces.provinces === selectedCountry) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                             });
                             ////////////////////////////////////////////////////
                             $.ajax({
                                url: 'function/fetch_cities.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.error) {
                                        var select = $('#jp_city');
                                        select.empty(); // Clear existing options
                                        var selectedCity = jobData.jp_city; // Replace with the value you want to select

                                        data.forEach(function (cities) {
                                            var $option = $('<option value="' + cities.cities + '">' + cities.cities + '</option>');
                                            if (cities.cities === selectedCity) {
                                                $option.prop('selected', true);
                                            }
                                            select.append($option);
                                        });

                                        // Initialize Chosen.js on the select element
                                        select.trigger('chosen:updated');
                                    }
                                },
                                error: function () {
                                    console.error('Failed to fetch job types');
                                }
                             });
                              $('#offered_salary').val(jobData.offered_salary);
                              $('#experience').val(jobData.experience);
                              $('#application_deadline_date').val(jobData.application_deadline_date);
                              $('#complete_address').val(jobData.complete_address);
                              $('#jp_country').val(jobData.jp_country);
                              $('#jp_city').val(jobData.jp_city);
                              $('#find_on_map').val(jobData.find_on_map);
                              $('#jp_latitude').val(jobData.jp_latitude);
                              $('#jp_longitude').val(jobData.jp_longitude);
                              $('#jp_longitude').val(jobData.jp_longitude);


                              // Show the modal
                              $("#pj-modal-update").modal("show");
                          },
                          error: function () {
                              console.log('Failed to fetch job data');
                          }
                      });


                    });

                  // Add a click event listener to the "Reject Application" buttons
                  $('.openModalButton').click(function () {
                      $("#pj-modal-update").modal("show");
                  });
              },
              error: function () {
                  console.log('Failed to fetch job data');
              }
          });
      }

      // Call the function to fetch and populate job data
      fetchJobData();
    });
  </script>

    <script>
      $(document).ready(function () {
        $("#updateJob").click(function () {
            var formData = $("#updateJobForm").serialize();

            $.ajax({
                type: "POST",
                url: "function/company/update_job.php",
                data: formData,
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
                  $("#updateJobForm")[0].reset();
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
      $(document).on('click', 'button[data-text="Delete Application"]', function () {
        var jobIdToDelete = $(this).data('delete-job-id');

        Swal.fire({
          title: 'Are you sure?',
          text: 'You will not be able to recover this application!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Perform the delete action here, using jobIdToDelete
            // You can use AJAX to send a request to the server to delete the job
            $.ajax({
              type: 'POST',
              url: 'function/company/delete_job.php', // Replace with your server-side script
              data: { job_id: jobIdToDelete },
              success: function (response) {
                // Check the response from the server and handle it accordingly
                if (response === 'success') {
                  Swal.fire('Deleted!', 'The application has been deleted.', 'success')
                    .then(() => {
                      // Reload the page after a successful deletion
                      window.location.reload();
                    });
                } else {
                  Swal.fire('Error', 'An error occurred while deleting the application.', 'error');
                }
              }
            });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Cancelled', 'The job data is safe :)', 'info');
          }
        });
      });

    </script>
  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-manage-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-manage-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
</html>