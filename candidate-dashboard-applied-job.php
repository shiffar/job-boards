<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
<head>
  <?php include'web-layouts/c-head.php';?>

</head>

<body>

  <div class="page-wrapper dashboard">

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
        <div class="upper-title-box">
          <h3>Applied Jobs</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Applied Jobs</h4>

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
                              <th>Job Title</th>
                              <th>Date Applied</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody id="job-applied-listings-body"></tbody>
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
    <?php include'web-layouts/copyright.php';?>


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
  <script>
    $(document).ready(function () {
    // Function to fetch job data
    function fetchJobAppData() {
        $.ajax({
            url: 'function/job-seeker/js_japp_fetch.php', // Adjust the URL as needed
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data && data.length > 0) {
                    // Clear existing table data
                    $('#job-applied-listings-body').empty();

                    // Iterate through the fetched data and populate the table
                    data.forEach(function (job) {
                      var row = '<tr>' +
                                '<td>' +
                                '<div class="job-block">' +
                                '<div class="inner-box">' +
                                '<div class="content">' +
                                '<span class="company-logo"><img src="function/company/uploads/logo/'+ job.logo +'" alt=""></span>' +
                                '<h4><a href="#">' + job.job_title + '</a></h4>' +
                                '<ul class="job-info">' +
                                '<li><span class="icon flaticon-briefcase"></span> ' + JSON.parse(job.specialisms).join(' / ') + '</li>' +
                                '<li><span class="icon flaticon-map-locator"></span> ' + job.jp_city + ', ' + job.jp_country + '</li>' +
                                '</ul>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td>' + job.app_dte + '</td>' +
                                '<td class="status">' + job.status + '</td>' +
                                '</tr>';

                        $('#job-applied-listings-body').append(row);
                    });
                } else {
                    // Handle case when no data is returned
                    $('#job-applied-listings-body').html('<tr><td colspan="2">No job applications found.</td></tr>');
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
  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
</html>