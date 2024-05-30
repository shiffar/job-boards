<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-applicants.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-applicants.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
<head>
  <?php include'web-layouts/head.php';?>

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
          <h3>All Aplicants</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Applicant</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    
                  </div>
                </div>

                <div class="widget-content">

                  <div id="application"></div>

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
      $.ajax({
          url: "function/company/application_fetch.php", // Replace with the path to your PHP script
          type: "GET",
          dataType: "json",
          success: function(data) {
              $.each(data, function(index, item) {
                  var jobTitle = item.job_title;
                  var applicationCount = item.application_count;

                  // Check if there are applied users for this job title
                  if (applicationCount > 0) {
                      // Create a new tab structure for each job title
                      var tabStructure = `
                      <div class="tabs-box">
                          <div class="aplicants-upper-bar">
                              <h6>${jobTitle}</h6>
                              <ul class="aplicantion-status tab-buttons clearfix">
                                  <li class="tab-btn active-btn totals" data-tab="#${jobTitle.replace(' ', '-')}">Total(s): ${applicationCount}</li>
                              </ul>
                          </div>
                          <div class="tabs-content">
                              <!-- Tab for ${jobTitle} -->
                              <div class="tab active-tab" >
                                  <div class="row" id="${jobTitle.replace(' ', '-')}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      `;

                      $('#application').append(tabStructure);

                      // Fetch additional data for this specific job title if needed
                      // You can make another AJAX request here to fetch applied users for each job title.
                      $.ajax({
                        url: "function/company/applied_user_fetch.php",
                        type: "GET",
                        data: { job_title: jobTitle },
                        dataType: "json",
                        success: function(users) {
                            var tabContent = $(`#${jobTitle.replace(' ', '-')}`);
                            tabContent.empty(); // Clear existing content

                            $.each(users, function(index, user) {
                                // Initialize skills array with an empty array
                                var skillsArray = [];

                                if (user.skills) {
                                    try {
                                        skillsArray = JSON.parse(user.skills);
                                    } catch (error) {
                                        console.error("Error parsing user skills JSON:", error);
                                    }
                                }

                                // Log the skills data to check if it's correctly retrieved
                                console.log("Skills Array:", skillsArray);

                                // Create and append HTML for each applied user, including the skills list
                                var userHTML = `
                                      <!-- Candidate block three -->
                                      <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                          <div class="inner-box">
                                              <div class="content">
                                                  <figure class="image"><img src="function/job-seeker/uploads/profile/${user.profile_image_path}" alt=""></figure>
                                                  <h4 class="name"><a href="#">${user.full_name}</a></h4>
                                                  <ul class="candidate-info">
                                                      <li class="designation">${user.current_job_title}</li>
                                                      <li><span class="icon flaticon-map-locator"></span> ${user.js_city}, ${user.js_country}</li>
                                                      <li><span class="icon flaticon-money"></span> ${user.current_salary}</li>
                                                  </ul>
                                                  
                                                  <ul class="post-tags">
                                                    ${skillsArray.map(skill => `<li>${skill}</li>`).join('')}
                                                  </ul>
                                              </div>
                                              <div class="option-box">
                                                  <ul class="option-list">
                                                    <li><button data-text="View Application" class="view-application-button" data-js-id="${user.js_id}" data-job-id="${user.job_id_fk}"><span class="la la-eye"></span></button></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  `;
                                tabContent.append(userHTML);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error fetching user data:", textStatus, errorThrown);
                        }
                      });

                  }
              });
          },
          error: function(xhr, status, error) {
              console.log("Error: " + error);
          }
      });

      $(document).on("click", ".view-application-button", function() {
        // Extract the js_id from the data attribute
        var $this = $(this);
        var jsId = $(this).data("js-id");
        var jobId = $(this).data("job-id");
        console.log("job_id:", jobId);

        $.ajax({
                url: 'function/job-seeker/add_spv_count.php',
                type: 'POST',
                data: {
                    action: 'increment',
                    jsid: jsId, // Send company ID to the server
                    jobId:jobId
                },
                success: function(response) {
                    var profileUrl = "candidates-view-resume.php?js_id=" + jsId;
                    window.location.href = profileUrl;
                }
            }); 

        // Construct the URL with the js_id as a parameter
        var url = "candidates-view-resume.php?js_id=" + jsId;

        // Navigate to the candidate-view-resume.php page
        window.location.href = url;
      });

    });

  </script>

  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-applicants.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-applicants.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
</html>