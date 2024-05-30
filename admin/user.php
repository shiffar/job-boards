<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:19 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:35 GMT -->
<head>
  <?php include'../web-layouts/admin/a_head.php';?>
</head>

<body>

  <div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <?php include'../web-layouts/admin/admin-header.php';?>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <?php include'../web-layouts/admin-side-bar.php';?>
    
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Job Providers</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    
                  </div>
                </div>

                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody id="job-provider-list">
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Job Seeker</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    
                  </div>
                </div>

                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody id="job-seeker-list">
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <?php include'../web-layouts/copyright.php';?>

  </div><!-- End Page Wrapper -->


  <?php include'../web-layouts/scripts.php';?>

  <script>
    $(document).ready(function () {
      // Function to fetch job data
      function fetchJobAppData() {
          $.ajax({
              url: '../function/admin/jp_fetch.php', // Adjust the URL as needed
              method: 'GET',
              dataType: 'json',
              success: function (data) {
                  if (data && data.length > 0) {
                      // Clear existing table data
                      $('#job-provider-list').empty();

                      // Iterate through the fetched data and populate the table
                      data.forEach(function (data) {
                          var row = '<tr>' +
                              '<td>' +
                              '<div class="job-block">' +
                              '<div class="inner-box">' +
                              '<div class="content">' +
                              '<span class="company-logo"><img src="../function/company/uploads/logo/'+ data.logo +'" alt=""  style="object-fit: cover; border-radius: 50%; width: 50px; height: 50px;"></span>' +
                              '<h4><a href="#">' + data.company_name + '</a></h4>' +
                              '</div>' +
                              '</div>' +
                              '</div>' +
                              '</td>' +
                              '<td>' +
                              '<div class="option-box">' +
                              '<ul class="option-list">' +
                              '<li><button data-user-id="' + data.user_id + '" data-text="View Application"><span class="la la-eye"></span></button></li>' +
                              '</ul>' +
                              '</div>' +
                              '</td>' +
                              '</tr>';

                          $('#job-provider-list').append(row);
                      });

                      // Attach a click event handler to the "View Application" button
                      $('.option-list button').click(function () {
                          var userId = $(this).data('user-id');
                          // Create a session with the user_id
                          $.ajax({
                              url: '../function/admin/jp_session_crte.php', // Replace with the appropriate URL
                              method: 'POST',
                              data: { user_id: userId },
                              success: function (response) {
                                  if (response === 'success') {
                                      // Redirect to job-provider-dashboard.php
                                      window.location.href = '../job-provider-dashboard.php';
                                  } else {
                                      // Handle session creation error
                                      console.log('Session creation failed');
                                  }
                              },
                              error: function (xhr, status, error) {
                                  console.log('Error creating session');
                                  console.log('XHR status: ' + status);
                                  console.log('Error: ' + error);
                              }
                          });
                      });
                  } else {
                      // Handle case when no data is returned
                      $('#job-provider-list').html('<tr><td colspan="2">No job applications found.</td></tr>');
                  }
              },
              error: function (xhr, status, error) {
                  console.log('Failed to fetch job data');
                  console.log('XHR status: ' + status);
                  console.log('Error: ' + error);
              }
          });
      }

      // Call the function to fetch and populate job data
      fetchJobAppData();
  });

  </script>

<script>
    $(document).ready(function () {
    // Function to fetch job data
    function fetchJobAppData2() {
        $.ajax({
            url: '../function/admin/js_fetch.php', // Adjust the URL as needed
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log("Received data:", data);
                if (data && data.length > 0) {
                    // Clear existing table data
                    $('#job-seeker-list').empty();

                    // Iterate through the fetched data and populate the table
                    data.forEach(function (data) {
                        var row = '<tr>' +
                            '<td>' +
                            '<div class="job-block">' +
                            '<div class="inner-box">' +
                            '<div class="content">' +
                            '<span class="company-logo"><img src="../function/job-seeker/uploads/profile/' + data.profile_image_path + '" alt="" style="object-fit: cover; border-radius: 50%; width: 50px; height: 50px;"></span>' +
                            '<h4><a href="#">' + data.full_name + '</a></h4>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="option-box">' +
                            '<ul class="option-list">' +
                            '<li><button data-user-id2="' + data.user_id + '" data-text="View Application"><span class="la la-eye"></span></button></li>' +
                            '</ul>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';

                        $('#job-seeker-list').append(row);
                    });

                    // Attach a click event handler to the "View Application" button
                    $('.option-list button').click(function () {
                        var userId2 = $(this).data('user-id2');
                        // Create a session with the user_id
                        $.ajax({
                            url: '../function/admin/js_session_crte.php', // Replace with the appropriate URL
                            method: 'POST',
                            data: { user_id2: userId2 },
                            success: function (response) {
                                if (response === 'success') {
                                    // Redirect to job-provider-dashboard.php
                                    window.location.href = '../candidate-dashboard.php';
                                } else {
                                    // Handle session creation error
                                    console.log('Session creation failed');
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log('Error creating session');
                                console.log('XHR status: ' + status);
                                console.log('Error: ' + error);
                            }
                        });
                    });
                } else {
                    // Handle case when no data is returned
                    $('#job-seeker-list').html('<tr><td colspan="2">No job applications found.</td></tr>');
                }
            },
            error: function (xhr, status, error) {
                console.log('Failed to fetch job data');
                console.log('XHR status: ' + status);
                console.log('Error: ' + error);
            }
        });
    }

    // Call the function to fetch and populate job data
    fetchJobAppData2();
});


  </script>

</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:21 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:36 GMT -->
</html>