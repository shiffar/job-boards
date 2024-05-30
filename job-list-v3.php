<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/job-list-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:12 GMT -->

<!-- Mirrored from workman1.cdott.com/job-list-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:20 GMT -->
<head>
  <?php include'web-layouts/head.php';?>
  <style>
    /* Pagination Container */
    #pagination-container {
        text-align: center;
        margin-top: 20px;
    }

    /* Pagination List */
    .paginationjs {
        display: inline-block;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* Pagination List Items */
    .paginationjs li {
        display: inline;
        margin: 0 5px;
    }

    /* Pagination Links */
    .paginationjs a {
      color: #007BFF;
    text-decoration: none;
    border: 1px solid #007BFF;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    }

    .paginationjs a:hover {
      background-color: #007BFF;
    color: #fff;
    }

    /* Active Page Link */
    .paginationjs .active a {
      background-color: #007BFF;
    color: #fff;
    }

    /* Disabled Page Link */
    .paginationjs .disabled a {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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


    <!-- Listing Section -->
    <section class="ls-section style-two">
      <div class="filters-backdrop"></div>

      <div class="row no-gutters">
        <!-- Filters Column -->
        <div class="filters-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
          <div class="inner-column">
            <div class="filters-outer">
              <button type="button" class="theme-btn close-filters">X</button>

              <!-- Filter Block -->
              <div class="filter-block">
                  <h4>Search by Keywords</h4>
                  <div class="form-group">
                      <input type="text" name="listing-search" id="listing-search" placeholder="Job title, keywords, or company">
                      <span class="icon flaticon-search-3"></span>
                  </div>
              </div>

              <!-- Filter Block -->
              <div class="filter-block">
                <h4>Location</h4>
                <div class="form-group">
                  <input type="text" name="listing-search" id="listing-search2" placeholder="City or postcode">
                  <span class="icon flaticon-map-locator"></span>
                </div>
                <p>Radius around selected destination</p>

                <!-- Your HTML structure for the range slider -->
                

                <div class="range-slider-one">
                    <div class="area-range-slider" id="distance-slider"></div>
                    <div class="input-outer">
                        <div class="amount-outer">
                            <span class="area-amount" id="distance-display"></span>
                        </div>
                    </div>
                </div> 

                

                
              </div>

              

              <!-- Filter Block -->
              <div class="filter-block specialisms-filter">
                  <h4>Specialisms</h4>
                  <div class="form-group">
                      <select id="specialisms-select" class="chosen-select">
                          <option value="">Choose a specialisms</option>
                      </select>
                      <span class="icon flaticon-briefcase"></span>
                  </div>
              </div>


              <!-- Switchbox Outer -->
              <div class="switchbox-outer">
                <h4>Job type</h4>
                <ul id="job-type-list" class="switchbox"></ul>

              </div>

              <!-- Checkboxes Ouer -->
              <div class="checkbox-outer">
                <h4>Date Posted</h4>
                <ul class="checkboxes">
                    <li>
                        <input id="check-b" type="checkbox" name="datePostedFilter" value="last24hours">
                        <label for="check-b">Last 24 Hours</label>
                    </li>
                    <li>
                        <input id="check-c" type="checkbox" name="datePostedFilter" value="last7days">
                        <label for="check-c">Last 7 Days</label>
                    </li>
                    <li>
                        <input id="check-d" type="checkbox" name="datePostedFilter" value="last14days">
                        <label for="check-d">Last 14 Days</label>
                    </li>
                    <li>
                        <input id="check-e" type="checkbox" name="datePostedFilter" value="last30days">
                        <label for="check-e">Last 30 Days</label>
                    </li>
                </ul>
              </div>

              <!-- Checkboxes Ouer -->
              <div class="checkbox-outer">
                <h4>Experience Level</h4>
                <ul class="checkboxes square" id="experience-list">
                    <!-- Data will be generated and displayed here -->
                </ul>
              </div>
              
            </div>
          </div>
        </div>

        <!-- Content Column -->
        <div class="content-column col-lg-8 col-md-12 col-sm-12">
            <div class="ls-outer">

              <!-- ls Switcher -->
              <div class="ls-switcher">
                <div class="showing-result">
                  <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> jobs</div>
                </div>
                <div class="sort-by">
                <a href="job-filter-modal.php" class="theme-btn btn-style-two call-modal" style="background-color: #FFD600;"><i class="fa fa-filter" aria-hidden="true"></i></a>
                  <!--<select class="chosen-select">
                    <option>New Jobs</option>
                    <option>Freelance</option>
                    <option>Full Time</option>
                    <option>Internship</option>
                    <option>Part Time</option>
                    <option>Temporary</option>
                  </select>-->

                  <select class="chosen-select" id="itemsPerPageSelect" name="per_page_select">
                    <option value="2">Show 2</option>
                    <option value="5">Show 5</option>
                    <option value="10">Show 10</option>
                    <option value="15">Show 15</option>
                    <option value="20">Show 20</option>
                    <option value="30">Show 30</option>
                  </select>
                </div>
              </div>


              <!-- Job Block -->
              <div class="job-block" id="job-container"> </div>
              <div id="pagination-container"></div>

          </div>
      </div>
    </section>
    <!--End Listing Page Section -->

  </div><!-- End Page Wrapper -->


    <?php include'web-layouts/scripts.php';?>
  
    <script>
        $(document).ready(function() {
            
            function initializePage() {
                $.ajax({
                    url: 'function/fetch_job_filter_experience.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                    $('#experience-list').empty();
                    $.each(data, function(index, item) {
                        var checkboxItem =
                        '<li>' +
                        '<input id="check-' + item.experience_id + '" type="checkbox" name="experienceLevel" value="' + item.experience + '">' +
                        '<label for="check-' + item.experience_id + '">' + item.experience + '</label>' +
                        '</li>';
                        $('#experience-list').append(checkboxItem);
                    });

                    $('input[name="experienceLevel"]').on('change', function() {
                        fetchDataAndDisplay(1);
                    });

                    fetchDataAndDisplay(1);
                    },
                    error: function() {
                    alert('Failed to fetch data');
                    }
                });
            }

            initializePage();

            function JobTypeFilter() {
                $.ajax({
                    url: 'function/fetch_filter_job_types.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                    var jobTypeList = $('#job-type-list');
                    // ...
                    $.each(data, function(index, item) {
                        var listItem = $('<li></li>');
                        var label = $('<label class="switch"></label>');
                        var jobType = item.job_type;
                        var checkbox = $('<input type="checkbox" class="job-type-checkbox" id="job-type-' + item.job_type_id + '" value="' + jobType + '">');
                        var slider = $('<span class="slider round"></span>');
                        var title = $('<span class="title">' + jobType + '</span>');

                        label.append(checkbox);
                        label.append(slider);
                        label.append(title);
                        listItem.append(label);

                        jobTypeList.append(listItem);
                    });
                    // ...

                    jobTypeList.on('change', '.job-type-checkbox', function() {
                        var selectedJobTypes = [];
                        jobTypeList.find('.job-type-checkbox:checked').each(function() {
                        selectedJobTypes.push($(this).val());
                        });
                        fetchDataAndDisplay(1, selectedJobTypes);
                    });

                    fetchDataAndDisplay(1);
                    },
                    error: function() {
                    console.log('Failed to fetch job types');
                    }
                });
            }

            JobTypeFilter();

            function specialismsFilter() {
                $.ajax({
                    url: 'function/fetch_filter_specialisms.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                    var specialismsSelect = $('#specialisms-select');

                    $.each(data, function(index, item) {
                        specialismsSelect.append(new Option(item.specialisms, item.specialisms));
                    });

                    specialismsSelect.trigger('chosen:updated');
                    },
                    error: function() {
                    console.log('Failed to fetch specialisms');
                    }
                });
            }

            specialismsFilter();

            function getCookie(cookieName) {
                var name = cookieName + '=';
                var decodedCookie = decodeURIComponent(document.cookie);
                var cookieArray = decodedCookie.split(';');
                for (var i = 0; i < cookieArray.length; i++) {
                    var cookie = cookieArray[i].trim();
                    if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                    }
                }
                return '';
                }

                var urlParams = new URLSearchParams(window.location.search);
                var field_name = urlParams.get('field_name');
                var field_location = urlParams.get('field_location');
                var itemsPerPage = 2;
                var currentPage = 1;

                function bindFilterEventListeners() {
                $('#filterButton').on('click', function() {
                    fetchDataAndDisplay(1);
                });
            }

            $('#itemsPerPageSelect').on('change', function() {
                itemsPerPage = parseInt($(this).val());
                currentPage = 1;
                fetchDataAndDisplay();
            });

            function updateExperienceLevelFilter() {
                var experienceLevelFilters = [];
                $('input[name="experienceLevel"]:checked').each(function() {
                    experienceLevelFilters.push($(this).val().trim());
                });
                return experienceLevelFilters.join(',');
            }

            function calculateDistance(lat1, lon1, lat2, lon2) {
                const R = 6371; // Radius of the Earth in kilometers
                const dLat = (lat2 - lat1) * (Math.PI / 180);
                const dLon = (lon2 - lon1) * (Math.PI / 180);
                const a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }
            
            $("#distance-slider").slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 500],
                change: function (event, ui) {
                    var value1 = ui.values[0];
                    var value2 = ui.values[1];
                    $("#distance-display").text("Distance: " + value1 + " km - " + value2 + " km");
                    fetchDataAndDisplay(ui.values[1]); // Pass the current max distance to the function
                }
            });


            function fetchDataAndDisplay(selectedJobTypes) {
                var startDate = $('input[name="srt_dte"]').val();
                var endDate = $('input[name="e_dte"]').val();
                var min_slry = $('input[name="min_slry"]').val();
                var max_slry = $('input[name="max_slry"]').val();
                var location = $('input[name="lctn"]').val();
                var category = $('input[name="ctgry"]').val();
                var keywords = $('#listing-search').val();
                var location2 = $('#listing-search2').val();
                var specialisms = $('#specialisms-select').val();
                var datePostedFilter = $('input[name="datePostedFilter"]:checked').val();
                var per_page_select = $('#per_page_select').val();
                var userLatitude = parseFloat(getCookie('userLocationLatitude'));
                var userLongitude = parseFloat(getCookie('userLocationLongitude'));
                var maxDistance = $("#distance-slider").slider("values")[1];
                console.log("maxDistance:", maxDistance);


                

                var datePostedFilters = [];
                $('input[name="datePostedFilter"]:checked').each(function() {
                    datePostedFilters.push($(this).val());
                });

                var datePostedFilter = datePostedFilters.join(',');
                var experienceLevelFilter = updateExperienceLevelFilter();

                var selectedJobTypes = [];
                $('.job-type-checkbox:checked').each(function() {
                    selectedJobTypes.push($(this).val());
                });

                console.log('Post Data:', {
                    field_name: field_name,
                    field_location: field_location,
                    experienceLevelFilter: experienceLevelFilter,
                    jobTypes: selectedJobTypes,
                });

                $.ajax({
                    url: 'function/company/fetch_jobs2.php',
                    method: 'POST',
                    data: {
                    field_name: field_name,
                    field_location: field_location,
                    startDate: startDate,
                    endDate: endDate,
                    min_slry: min_slry,
                    max_slry: max_slry,
                    location: location,
                    category: category,
                    keywords: keywords,
                    location2: location2,
                    specialisms: specialisms,
                    jobTypes: selectedJobTypes,
                    datePostedFilter: datePostedFilter,
                    experienceLevelFilter: experienceLevelFilter,
                    userLatitude: userLatitude,
                    userLongitude: userLongitude,
                    },
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(function (job) {
                            const jobLatitude = parseFloat(job.jp_latitude);
                            const jobLongitude = parseFloat(job.jp_longitude);
                            const distance = calculateDistance(userLatitude, userLongitude, jobLatitude, jobLongitude);
                            job.distance = distance;
                        });

                        if (!isNaN(userLatitude) && !isNaN(userLongitude)) {
                            // Cookies are available, so apply the distance filter
                            data = data.filter(function (job) {
                                return job.distance <= maxDistance;
                            });
                        } else {
                            // Handle the case where cookies are not available
                            // You can choose to display a message or take other actions
                        }

                        // Sort the data by distance (you can choose ascending or descending order)
                        data.sort(function (a, b) {
                            return a.distance - b.distance;
                        });

                    function displayItems(page) {
                        $('#job-container').empty();
                        var startIndex = (page - 1) * itemsPerPage;
                        var endIndex = startIndex + itemsPerPage;
                        var jobSlice = data.slice(startIndex, endIndex);

                        jobSlice.forEach(function(job) {
                            var jobHtml = `
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="function/company/uploads/logo/${job.logo}" style="object-fit: cover; border-radius: 20%;" alt=""></span>
                                        <h4><a href="job-single.php?job_id=${job.job_id}">${job.job_title}</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span></li>
                                            <li><span class="icon flaticon-map-locator"></span> ${job.jp_city}, ${job.jp_country}
                                            ${job.distance ? `- Distance: ${job.distance.toFixed(0)} km` : ''}</li>
                                            <li><span class="icon flaticon-clock-3"></span> </li>
                                            <li><span class="icon flaticon-money"></span> ${job.offered_salary}</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">${job.job_type}</li>
                                        </ul>
                                    </div>
                                </div>
                            `;


                        $('#job-container').append(jobHtml);
                        });
                    }

                    var totalItems = data.length;
                    var totalPages = Math.ceil(totalItems / itemsPerPage);

                    $('#pagination-container').pagination({
                        dataSource: data,
                        pageSize: itemsPerPage,
                        hideLastOnEllipsisShow: true,
                        pageRange: 1,
                        callback: function(data, pagination) {
                        displayItems(pagination.pageNumber);
                        }
                    });

                    displayItems(currentPage);
                    },
                    error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                    }
                });
                console.log('Experience Level Filters: ' + experienceLevelFilter);
                }

                fetchDataAndDisplay(1);

                $("#distance-slider").on("input", function() {
                    var maxDistance = $(this).val();
                    $("#distance-display").text("Distance: " + maxDistance + " km");
                    fetchDataAndDisplay(1);
                });


                $('#listing-search').on('input', function() {
                $('#job-listings').empty();
                fetchDataAndDisplay(1);
                });

                $('#listing-search2').on('input', function() {
                $('#job-listings').empty();
                fetchDataAndDisplay(1);
                });

                $('#specialisms-select').on('change', function() {
                fetchDataAndDisplay(1);
                });

                $('input[name="datePostedFilter"]').on('change', function() {
                fetchDataAndDisplay(1);
                });

                $('input[name="experienceLevel"]').on('change', function() {
                fetchDataAndDisplay(1);
                });

                $('#per_page_select').on('change', function() {
                fetchDataAndDisplay(1);
                });

                $('.call-modal').on('click', function(e) {
                e.preventDefault();
                var modalUrl = $(this).attr('href');
                $.ajax({
                    url: modalUrl,
                    dataType: 'html',
                    success: function(modalContent) {
                    console.log('success to load modal content');
                    $('#login-modal').html(modalContent);
                    bindFilterEventListeners();
                    $('#login-modal').modal('show');
                    },
                    error: function() {
                    console.log('Failed to load modal content');
                    }
                });
            });
        });
    </script>
    
    <script>
        $(function () {
            // Initialize the jQuery UI Slider
            $("#distance-slider").slider({
                range: true,
                min: 0,
                max: 1000, // Set your maximum range value
                values: [0, 500], // Set initial range values
                slide: function (event, ui) {
                    var latitude = getCookie("userLocationLatitude");
                    var longitude = getCookie("userLocationLongitude");
                    if (!latitude || !longitude) {
                        showCityInputDialog();
                    } else {
                        // You have the latitude and longitude; you can use them here
                        updateRangeText(ui.values[0], ui.values[1]);
                    }
                }
            });

            // Initialize the area-amount text
            $("#distance-display").text(
                $("#distance-slider").slider("values", 0) +
                "km - " +
                $("#distance-slider").slider("values", 1) +
                "km"
            );

            function showCityInputDialog() {
            Swal.fire({
                title: "Enter your current city",
                input: "text",
                inputPlaceholder: "City name",
                showCancelButton: true,
                confirmButtonText: "OK",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    var city = result.value;
                    if (city) {
                        // Use a geocoding service with Leaflet (e.g., Nominatim) to get the latitude and longitude of the city
                        var geocodingUrl = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(city);

                        $.get(geocodingUrl, function (data) {
                            if (data.length > 0) {
                                var location = data[0];
                                var latitude = location.lat;
                                var longitude = location.lon;

                                // Save the location in cookies
                                setCookie("userLocationLatitude", latitude, 365);
                                setCookie("userLocationLongitude", longitude, 365);

                                // Reload the page by setting the location.href
                                window.location.href = window.location.href;
                            } else {
                                Swal.fire("City not found. Please enter a valid city.");
                            }
                        });
                    } else {
                        Swal.fire("Please enter a city.");
                    }
                }
            });
        }


            function updateRangeText(value1, value2) {
                $("#distance-display").text(value1 + "km - " + value2 + "km");
            }

            // Function to set a cookie
            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + value + expires + "; path=/";
            }

            // Function to get a cookie
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(";");
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) === " ") c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
        });
    </script>



</body>


<!-- Mirrored from creativelayers.net/themes/superio/job-list-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:12 GMT -->

<!-- Mirrored from workman1.cdott.com/job-list-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:20 GMT -->
</html>