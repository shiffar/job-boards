<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:22 GMT -->

<!-- Mirrored from workman1.cdott.com/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:38 GMT -->
<head>
  <?php include'web-layouts/c-head.php';?>
</head>

<body>

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'web-layouts/c-header.php';?>
    <!--End Main Header -->

    <!-- Candidate Detail Section -->
    <section class="candidate-detail-section">
      <!-- Upper Box -->
      <div class="upper-box">
        <div class="auto-container">
          <!-- Candidate block Five -->
          <div class="candidate-block-five">
            <div class="inner-box">
              <div class="content">
                <figure class="image"><img src="" id="imagePreview" alt=""></figure>
                <h4 class="name"><a href="#" id="full_name" style="text-transform: capitalize;"></a></h4>
                <ul class="candidate-info">
                  <li class="designation" id="job_title"></li>
                  <li><span class="icon flaticon-map-locator"></span> <span id="cityCountry"></span></li>
                  <li><span class="icon flaticon-money"></span> <span id="current_salary"></span></li>
                  <!--<li><span class="icon flaticon-clock"></span> Member Since,Aug 19, 2020</li>-->
                </ul>
                <div id="skills"></div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="candidate-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-detail">
                <h4>Candidates About</h4>
                <p>Hello my name is <span id="full_name2" style="text-transform: capitalize;"></span> and <span id="job_title2"></span> from <span id="country2"></span>.</p>
                <!-- Resume / Education -->
                <div class="resume-outer">
                  <div class="upper-title">
                    <h4>Education</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div id="educationContainer"></div>
                </div>

                <!-- Resume / Work & Experience -->
                <div class="resume-outer theme-blue">
                  <div class="upper-title">
                    <h4>Work & Experience</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div id="work_expContainer"></div>
                </div>

                <!-- Portfolio -->
                

                <!-- Resume / Awards -->
                <div class="resume-outer theme-yellow">
                  <div class="upper-title">
                    <h4>Awards</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div id="awardContainer"></div>
                </div>

                <!-- Video Box -->
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
                        <i class="icon icon-calendar"></i>
                        <h5>Experience:</h5>
                        <span>0-<span id="experience"></span> Years</span>
                      </li>

                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Age:</h5>
                        <span id="age"></span>
                      </li>

                      <li>
                        <i class="icon icon-rate"></i>
                        <h5>Current Salary:</h5>
                        <span id="current_salary2"></span>
                      </li>

                      <li>
                        <i class="icon icon-salary"></i>
                        <h5>Expected Salary:</h5>
                        <span id="expected_salary"></span>
                      </li>

                      <li>
                        <i class="icon icon-user-2"></i>
                        <h5>Gender:</h5>
                        <span id="gender"></span>
                      </li>

                      <li>
                        <i class="icon icon-language"></i>
                        <h5>Language:</h5>
                        <span id="languages"></span>
                      </li>

                      <li>
                        <i class="icon icon-degree"></i>
                        <h5>Education Level:</h5>
                        <span id="education_levels"></span>
                      </li>

                    </ul>
                  </div>

                </div>

                <div class="sidebar-widget social-media-widget">
                  <h4 class="widget-title">Social media</h4>
                  <div class="widget-content">
                    <div class="social-links">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>

              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End candidate Detail Section -->


    <!-- Main Footer -->
    <?php include'web-layouts/copyright.php';?>
    <!-- End Main Footer -->


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
  <!--End Google Map APi-->
  <script>
    $(document).ready(function() {
      // Function to fetch company details and populate the form
      function fetchCompanyDetails() {
          $.ajax({
              type: "POST",
              url: "function/job-seeker/resume_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  $("#imagePreview").attr("src", `function/job-seeker/uploads/profile/${response.profile_image_path}`);
                  $("#full_name").text(response.full_name);
                  $("#full_name2").text(response.full_name);
                  $("#job_title").text(response.job_title);
                  $("#job_title2").text(response.job_title);
                  var cityCountry = response.city + ', ' + response.country;
                  $("#cityCountry").text(cityCountry);
                  $("#current_salary2").text(response.current_salary);
                  $("#country2").text(response.country);
                  var skillsArray = JSON.parse(response.skills);
                  var concatenatedSkills = skillsArray.join(' ');
                  // Create an unordered list and add list items for each skill
                  var $skillsList = $('<ul class="post-tags">');
                  skillsArray.forEach(function(skill) {
                      var $skillItem = $('<li>').text(skill);
                      $skillsList.append($skillItem);
                  });

                  // Append the list to the element with id "skills"
                  $("#skills").append($skillsList);
                  $("#experience").text(response.experience);
                  $("#age").text(response.age);
                  $("#current_salary").text(response.current_salary);
                  $("#expected_salary").text(response.expected_salary);
                  $("#gender").text(response.gender); 
                  $("#languages").text(response.languages); 
                  $("#education_levels").text(response.education_levels); 
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
    $(document).ready(function () {
      // Function to fetch and display education data
      function fetchEducationData() {
          $.ajax({
              type: "GET",
              url: "function/job-seeker/js_edu_fetch.php", // The PHP script that fetches the data
              dataType: "json",
              success: function (data) {
                  // Loop through the fetched data and populate the HTML structure
                  for (var i = 0; i < data.length; i++) {
                      var education = data[i];
                      var startYear = education.start_year.split('-')[0];
                      var endYear = education.end_year.split('-')[0];
                      var educationItem = `
                        <div class="resume-block">
                            <div class="inner">
                                <span class="name" style="text-transform: uppercase;">${education.college_name[0]}</span>
                                <div class="title-box">
                                    <div class="info-box">
                                        <h3>${education.education}</h3>
                                        <span>${education.college_name}</span>
                                    </div>
                                    <div class="edit-box">
                                        <span class="year">${startYear} - ${endYear}</span>
                                        <div class="edit-btns">
                                        </div>
                                    </div>
                                </div>
                                <div class="text">${education.description}</div>
                            </div>
                          </div>
                      `;

                      // Append the education item to a container div with id "educationContainer"
                      $("#educationContainer").append(educationItem);
                  }

              }
          });
      }

      // Call the function to fetch and display education data
      fetchEducationData();
    });

  </script>

  <script>
    $(document).ready(function () {
      // Function to fetch and display education data
      function fetchWrkexpData() {
          $.ajax({
              type: "GET",
              url: "function/job-seeker/js_wrkexp_fetch.php", // The PHP script that fetches the data
              dataType: "json",
              success: function (data) {
                  // Loop through the fetched data and populate the HTML structure
                  for (var i = 0; i < data.length; i++) {
                      var wrkexp = data[i];
                      var startYear = wrkexp.start_year.split('-')[0];
                      var endYear = wrkexp.end_year.split('-')[0];
                      var wrkexpItem = `
                          <div class="resume-block">
                              <div class="inner">
                                <span class="name" style="text-transform: uppercase;">${wrkexp.company_name[0]}</span>
                                <div class="title-box">
                                  <div class="info-box">
                                      <h3>${wrkexp.job_title}</h3>
                                      <span>${wrkexp.company_name}</span>
                                  </div>
                                  <div class="edit-box">
                                    <span class="year">${startYear} - ${endYear}</span>
                                    <div class="edit-btns">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="text">${wrkexp.description}</div>
                              </div>
                            </div>
                      `;

                      // Append the education item to a container div with id "educationContainer"
                      $("#work_expContainer").append(wrkexpItem);
                  }
                  
              }
          });
      }

      // Call the function to fetch and display education data
      fetchWrkexpData();
    });

  </script>

  <script>
    $(document).ready(function () {
      // Function to fetch and display education data
      function fetchAwardData() {
          $.ajax({
              type: "GET",
              url: "function/job-seeker/js_award_fetch.php", // The PHP script that fetches the data
              dataType: "json",
              success: function (data) {
                  // Loop through the fetched data and populate the HTML structure
                  for (var i = 0; i < data.length; i++) {
                      var award = data[i];
                      var startYear = award.start_year.split('-')[0];
                      var endYear = award.end_year.split('-')[0];
                      var awardItem = `
                            <div class="resume-block">
                              <div class="inner">
                                <span class="name"></span>
                                <div class="title-box">
                                  <div class="info-box">
                                    <h3>${award.award_title}</h3>
                                    <span></span>
                                  </div>
                                  <div class="edit-box">
                                    <span class="year">${startYear} - ${endYear}</span>
                                    <div class="edit-btns">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="text">${award.award_description}</div>
                              </div>
                            </div>
                      `;

                      // Append the education item to a container div with id "educationContainer"
                      $("#awardContainer").append(awardItem);
                  }
                  
              }
          });
      }

      // Call the function to fetch and display education data
      fetchAwardData();
    });

  </script>


</body>


<!-- Mirrored from creativelayers.net/themes/superio/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:24 GMT -->

<!-- Mirrored from workman1.cdott.com/candidates-single-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:40 GMT -->
</html>