<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:19 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:35 GMT -->
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
        <div class="upper-title-box">
          <!--<h3>Howdy, Invision!</h3>
          <div class="text">Ready to jump back in?</div>-->
        </div>
        <div class="row">
          <div class="ui-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
              <div class="left">
                <i class="icon flaticon-briefcase"></i>
              </div>
              <div class="right">
              <div id="jobCount"></div>
              </div>
            </div>
          </div>
          <div class="ui-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-red">
              <div class="left">
                <i class="icon la la-file-invoice"></i>
              </div>
              <div class="right">
              <div id="applicationCount"></div>
              </div>
            </div>
          </div>
        </div>
        

        <div class="row">


          <div class="col-xl-12 col-lg-12">
            <!-- Graph widget -->
            <div class="graph-widget ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Your Profile Views</h4>
                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    <select class="chosen-select" id="dateRangeSelect">
                      <option value="6">Last 6 Months</option>
                      <option value="12">Last 12 Months</option>
                      <option value="16">Last 16 Months</option>
                      <option value="24">Last 24 Months</option>
                      <option value="60">Last 5 years</option>
                    </select>

                  </div>
                </div>

                <div class="widget-content">
                  <canvas id="chart" width="100" height="45"></canvas>
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
        url: 'function/company/get_counts.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#jobCount').html('<h4>' + data.post_job_count + '</h4><p>Posted Jobs</p>');
            $('#applicationCount').html('<h4>' + data.application_count + '</h4><p>Applications</p>');
        },
        error: function() {
          
        }
    });
});
</script>

<script>
        // Chart configuration and data
        Chart.defaults.global.defaultFontFamily = "Sofia Pro";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');
        var chart = null; // Declare the chart variable

        // Helper function to generate an array of labels for the selected date range
        function generateLabels(selectedRange) {
            var labels = [];
            var currentDate = new Date();
            currentDate.setMonth(currentDate.getMonth() - selectedRange);

            for (var i = 0; i <= selectedRange; i++) {
                labels.push(currentDate.toLocaleString('en-us', { month: 'long', year: 'numeric' }));
                currentDate.setMonth(currentDate.getMonth() + 1);
            }

            return labels;
        }

        // Function to update the chart
        function updateChart(labels, data) {
            if (chart) {
                // If the chart is already initialized, destroy it
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Views",
                        backgroundColor: 'transparent',
                        borderColor: '#1967D2',
                        borderWidth: "1",
                        data: data,
                        pointRadius: 3,
                        pointHoverRadius: 3,
                        pointHitRadius: 10,
                        pointBackgroundColor: "#1967D2",
                        pointHoverBackgroundColor: "#1967D2",
                        pointBorderWidth: "2",
                    }]
                },
                options: {
                    layout: {
                        padding: 10,
                    },
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: false
                            },
                            gridLines: {
                                borderDash: [6, 10],
                                color: "#d8d8d8",
                                lineWidth: 1,
                            },
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            },
                        }],
                    },
                    tooltips: {
                        backgroundColor: '#333',
                        titleFontSize: 13,
                        titleFontColor: '#fff',
                        bodyFontColor: '#fff',
                        bodyFontSize: 13,
                        displayColors: false,
                        xPadding: 10,
                        yPadding: 10,
                        intersect: false
                    }
                },
            });
        }

        // Function to fetch data and update the chart
        function fetchDataAndUpdateChart(selectedRange, labels) {
            // Construct a start date based on the selected range
            var startDate = new Date();
            startDate.setMonth(startDate.getMonth() - selectedRange);

            // Format the start date as a string in YYYY-MM-DD format
            var formattedStartDate = startDate.toISOString().slice(0, 10);

            $.ajax({
                url: 'function/company/get_ppv_count.php', // Change to the correct URL
                type: 'GET',
                data: { start_date: formattedStartDate },
                dataType: 'json',
                success: function (data) {
                    var counts = data.counts;
                    updateChart(labels, counts);
                }
            });
        }

        // Add an event listener for the select element
        document.getElementById('dateRangeSelect').addEventListener('change', function () {
            // Get the selected value (number of months)
            var selectedRange = parseInt(this.value);

            // Generate labels for the selected range
            var labels = generateLabels(selectedRange);

            // Fetch data based on the selected range and update the chart
            fetchDataAndUpdateChart(selectedRange, labels);
        });

        // Call fetchDataAndUpdateChart when the page loads with a default range (e.g., 6 months)
        $(document).ready(function () {
            var defaultRange = 6; // You can change this to your preferred default range
            var labels = generateLabels(defaultRange);
            fetchDataAndUpdateChart(defaultRange, labels);
        });
    </script>
</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:21 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:36 GMT -->
</html>