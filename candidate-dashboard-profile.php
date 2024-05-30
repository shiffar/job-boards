<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
<head>
  <?php include'web-layouts/c-head.php';?>
      <style>
        /* Your existing CSS styles */
        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 120px;
            width: 200px;
            padding: 10px;
            border-radius: 10px;
            border: 2px dashed #ced4e1;
            color: #ffffff;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover,
        .drop-container.drag-active {
            background: #ffffff;
            border-color: #111;
        }

        .drop-container:hover .drop-title,
        .drop-container.drag-active .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 16px;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        input[type=file] {
            display: none;
        }

        .file-name {
            display: none;
            font-size: 14px;
            text-align: center;
            margin-top: 5px;
            color: #111;
        }

        .file-name.show {
            display: block;
        }

        .remove-button {
            background: none;
            border: none;
            color: #ff0000;
            cursor: pointer;
            margin-top: 5px;
            font-size: 14px;
            display: none;
        }

        /* Style the image preview container */
        .image-preview-container {
            height: 120px; /* Match the height of the drop container */
            width: 200px; /* Match the width of the drop container */
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            left: 20px;
        }

        /* Style the image inside the preview container */
        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the container while maintaining aspect ratio */
            border-radius: 10px; /* Rounded corners for the image */
        }
    </style>

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
          <h3>My Profile</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
      
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Profile</h4>
                </div>

                <div class="widget-content">
                  <div id="message"></div>
                  <form class="default-form" id="profile-info-form" method="post" enctype="multipart/form-data">
                    <div class="uploading-outer">
                        <label for="images" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Browse profile</span>
                            <div class="file-name" id="fileName">No file selected</div>
                            <input type="file" name="image" id="images" accept="image/*">
                            <button class="remove-button" id="removeButton"><i class="fas fa-trash" style="color: #cf0f0f;"></i> Remove</button>
                        </label>
                        <!-- Image preview container -->
                        <div class="image-preview-container" id="imagePreview"></div>
                    </div>
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Full Name</label>
                        <input type="text" name="full_name" placeholder="Jerome">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Job Title</label>
                        <input type="text" name="job_title" placeholder="UI Designer">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="0 123 456 7890">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email address</label>
                        <input type="email" name="email_address" placeholder="creativelayers">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="website" placeholder="www.jerome.com">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Current Salary($)</label>
                        <select class="chosen-select" name="current_salary">
                          <option>40-70 K</option>
                          <option>50-80 K</option>
                          <option>60-90 K</option>
                          <option>70-100 K</option>
                          <option>100-150 K</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Expected Salary($)</label>
                        <select class="chosen-select" name="expected_salary">
                          <option>120-350 K</option>
                          <option>40-70 K</option>
                          <option>50-80 K</option>
                          <option>60-90 K</option>
                          <option>70-100 K</option>
                          <option>100-150 K</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Experience</label>
                        <input type="text" name="experience" placeholder="5-10 Years">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Age</label>
                        <select class="chosen-select" name="age">
                          <option>23 - 27 Years</option>
                          <option>24 - 28 Years</option>
                          <option>25 - 29 Years</option>
                          <option>26 - 30 Years</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Education Levels</label>
                        <input type="text" name="education_levels" placeholder="Certificate">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Languages</label>
                        <input type="text" name="languages" placeholder="English, Turkish">
                      </div>

                      <!-- Search Select -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Categories </label>
                        <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4" name="categories[]" id="">
                          
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Allow In Search & Listing</label>
                        <select class="chosen-select" name="allow_in_search_listing">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                          <button type="submit" class="theme-btn btn-style-one">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            

            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Social Network</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" id="social-media-form" method="post">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="facebook" placeholder="www.facebook.com/Invision">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Twitter</label>
                        <input type="text" name="twitter" placeholder="">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" placeholder="">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Google Plus</label>
                        <input type="text" name="google_plus" placeholder="">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <button type="submit" class="theme-btn btn-style-one">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Contact Information</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" id="profile-contact-form">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Province</label>
                        <select class="chosen-select" name="country">
                          
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>City</label>
                        <select class="chosen-select" name="city">
                          
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
                      <div class="form-group col-lg-12 col-md-12">
                        <button type="submit" class="theme-btn btn-style-one">Save</button>
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
        function initializeFileUploader(dropContainerId, fileInputId, fileNameDisplayId, removeButtonId, imagePreviewId) {
            const dropContainer = document.getElementById(dropContainerId);
            const fileInput = document.getElementById(fileInputId);
            const fileNameDisplay = document.getElementById(fileNameDisplayId);
            const removeButton = document.getElementById(removeButtonId);
            const imagePreview = document.getElementById(imagePreviewId);

            dropContainer.addEventListener("dragover", e => {
                e.preventDefault();
            }, false);

            dropContainer.addEventListener("dragenter", () => {
                dropContainer.classList.add("drag-active");
            });

            dropContainer.addEventListener("dragleave", () => {
                dropContainer.classList.remove("drag-active");
            });

            dropContainer.addEventListener("drop", e => {
                e.preventDefault();
                dropContainer.classList.remove("drag-active");
                fileInput.files = e.dataTransfer.files;
                showFileName();
            });

            fileInput.addEventListener("change", () => {
                showFileName();
                if (fileInput.files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.innerHTML = `<img src="${e.target.result}" class="image-preview" alt="Selected Image">`;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                } else {
                    imagePreview.innerHTML = "";
                }
            });

            removeButton.addEventListener("click", () => {
                fileInput.value = "";
                showFileName();
                imagePreview.innerHTML = "";
            });

            function showFileName() {
                if (fileInput.files.length > 0) {
                    fileNameDisplay.textContent = fileInput.files[0].name;
                    fileNameDisplay.classList.add("show");
                    removeButton.style.display = "block";
                } else {
                    fileNameDisplay.textContent = "No file selected";
                    fileNameDisplay.classList.remove("show");
                    removeButton.style.display = "none";
                }
            }
        }

        initializeFileUploader("dropcontainer", "images", "fileName", "removeButton", "imagePreview");
    </script>
  
<script>
    $(document).ready(function () {
        $('#profile-info-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'function/job-seeker/js_profile_crte.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                  console.log(response);

                  // Display SweetAlert2 success message if data was inserted/updated successfully
                  if (response.includes("successfully")) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: response,
                      confirmButtonText: 'OK'
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
                },
            });
        });
    });
</script>

<script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      function fetchCompanyDetails() {
          $.ajax({
              type: "POST",
              url: "function/job-seeker/js_prf_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  if (response.profile_image_path) {
                      $("#imagePreview").html(`<img src="function/job-seeker/uploads/profile/${response.profile_image_path}" class="image-preview" alt="User Profile">`);
                      $("#fileName").text(response.profile_image_path); // Update the file name display
                  } else {
                      $("#imagePreview").html('No image available');
                      $("#fileName").text('No file selected'); // Update the file name display
                  }
                  $("input[name='full_name']").val(response.full_name);
                  $("input[name='job_title']").val(response.job_title);
                  $("input[name='phone']").val(response.phone);
                  $("input[name='email_address']").val(response.email_address);
                  $("input[name='website']").val(response.website);
                  $("input[name='experience']").val(response.experience);
                  $("input[name='education_levels']").val(response.education_levels);
                  $("input[name='languages']").val(response.languages);
                  $("input[name='experience']").val(response.experience);
                  // Set the selected option in the 'team_size' select element
                var selectedTeamSize = response.current_salary;
                var teamSizeSelect = $("select[name='current_salary']");

                // Loop through each option and set the 'selected' attribute
                teamSizeSelect.find('option').each(function () {
                    if ($(this).val() === selectedTeamSize) {
                        $(this).prop('selected', true);
                    } else {
                        $(this).prop('selected', false);
                    }
                });

                // Trigger Chosen's update event to reflect the selected value
                teamSizeSelect.trigger("chosen:updated");

                var selectedexpected_salary = response.expected_salary;
                var expected_salarySelect = $("select[name='expected_salary']");

                // Loop through each option and set the 'selected' attribute
                expected_salarySelect.find('option').each(function () {
                    if ($(this).val() === selectedexpected_salary) {
                        $(this).prop('selected', true);
                    } else {
                        $(this).prop('selected', false);
                    }
                });

                // Trigger Chosen's update event to reflect the selected value
                expected_salarySelect.trigger("chosen:updated");

                
                var selecteage = response.age;
                var ageSelect = $("select[name='age']");

                // Loop through each option and set the 'selected' attribute
                ageSelect.find('option').each(function () {
                    if ($(this).val() === selecteage) {
                        $(this).prop('selected', true);
                    } else {
                        $(this).prop('selected', false);
                    }
                });

                // Trigger Chosen's update event to reflect the selected value
                ageSelect.trigger("chosen:updated");




                  $("select[name='categories']").val(response.categories);
                  // Log the selected options
                  // Log the selected options
                  var categories = JSON.parse(response.categories);

                  // Get the select element
                  var selectElement = $("select[name='categories[]']");

                  // Clear any existing selections
                  selectElement.val(null);

                  // Loop through the options and mark them as selected based on the received data
                  $.each(categories, function(index, category) {
                      selectElement.find('option[value="' + category + '"]').prop('selected', true);
                  });

                  // Initialize Chosen.js on the select element
                  selectElement.trigger('chosen:updated');

                  // Log the selected options
                  console.log("Selected options:", selectElement.val());


                  // Set the selected option in the 'allow_in_search' select element
                  var selectedValue = response.allow_in_search_listing;
                  var selectElement = $("select[name='allow_in_search_listing']");

                  // Loop through each option and set the 'selected' attribute
                  selectElement.find('option').each(function () {
                      if ($(this).val() === selectedValue) {
                          $(this).prop('selected', true);
                      } else {
                          $(this).prop('selected', false);
                      }
                  });

                  // Trigger Chosen's update event to reflect the selected value
                  selectElement.trigger("chosen:updated");

                  $("textarea[name='description']").val(response.description);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }
      function fetchCategories() {
        $.ajax({
            type: "POST",
            url: "function/fetch_categories.php", // Adjust the path to your PHP script
            dataType: "json",
            success: function(response) {
                console.log("Received categories data:", response); // Log received data

                // Get the select element
                var selectElement = $("select[name='categories[]']");

                // Clear existing options
                selectElement.empty();

                // Loop through the skills data and add options to the select element
                $.each(response, function(index, categories) {
                    selectElement.append($('<option>', {
                        value: categories.categories,
                        text: categories.categories
                    }));
                });

                // Initialize Chosen.js on the select element
                selectElement.trigger('chosen:updated');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
            }
        });
    }
    fetchCategories();

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanyDetails();
  });

</script>

<script>
    $(document).ready(function () {
        $('#social-media-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'function/job-seeker/js_social_crte.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                  console.log(response);

                  // Display SweetAlert2 success message if data was inserted/updated successfully
                  if (response.includes("successfully")) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: response,
                      confirmButtonText: 'OK'
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
                },
            });
        });
    });
</script>

<script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      function fetchCompanySMedia() {
          $.ajax({
              type: "POST",
              url: "function/job-seeker/js_csm_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  $("input[name='facebook']").val(response.facebook);
                  $("input[name='twitter']").val(response.twitter);
                  $("input[name='linkedin']").val(response.linkedin);
                  $("input[name='google_plus']").val(response.google_plus);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanySMedia();
  });

</script>

<script>
    $(document).ready(function () {
        $('#profile-contact-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'function/job-seeker/js_contact_crte.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                  console.log(response);

                  // Display SweetAlert2 success message if data was inserted/updated successfully
                  if (response.includes("successfully")) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: response,
                      confirmButtonText: 'OK'
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
                },
            });
        });
    });
</script>

<script>
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      function fetchCompanyContact() {
          $.ajax({
              type: "POST",
              url: "function/job-seeker/js_c_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  var selectedValue = response.country;
                  var selectElement = $("select[name='country']");

                  // Loop through each option and set the 'selected' attribute
                  selectElement.find('option').each(function () {
                      if ($(this).val() === selectedValue) {
                          $(this).prop('selected', true);
                      } else {
                          $(this).prop('selected', false);
                      }
                  });
                  

                  // Trigger Chosen's update event to reflect the selected value
                  selectElement.trigger("chosen:updated");

                  var selectedValue = response.city;
                  var selectElement = $("select[name='city']");

                  // Loop through each option and set the 'selected' attribute
                  selectElement.find('option').each(function () {
                      if ($(this).val() === selectedValue) {
                          $(this).prop('selected', true);
                      } else {
                          $(this).prop('selected', false);
                      }
                  });

                  // Trigger Chosen's update event to reflect the selected value
                  selectElement.trigger("chosen:updated");
                  $("input[name='complete_address']").val(response.complete_address);
                  $("input[name='find_on_map']").val(response.find_on_map);
                  $("input[name='latitude']").val(response.latitude);
                  $("input[name='longitude']").val(response.longitude);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }function fetchProvinces() {
        $.ajax({
            type: "POST",
            url: "function/fetch_provinces.php", // Adjust the path to your PHP script
            dataType: "json",
            success: function(response) {
                console.log("Received provinces data:", response); // Log received data

                // Get the select element
                var selectElement = $("select[name='country']");

                // Clear existing options
                selectElement.empty();

                // Loop through the skills data and add options to the select element
                $.each(response, function(index, provinces) {
                    selectElement.append($('<option>', {
                        value: provinces.provinces,
                        text: provinces.provinces
                    }));
                });

                // Initialize Chosen.js on the select element
                selectElement.trigger('chosen:updated');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
            }
        });
    }
    function fetchCities() {
        $.ajax({
            type: "POST",
            url: "function/fetch_cities.php", // Adjust the path to your PHP script
            dataType: "json",
            success: function(response) {
                console.log("Received cities data:", response); // Log received data

                // Get the select element
                var selectElement = $("select[name='city']");

                // Clear existing options
                selectElement.empty();

                // Loop through the skills data and add options to the select element
                $.each(response, function(index, cities) {
                    selectElement.append($('<option>', {
                        value: cities.cities,
                        text: cities.cities
                    }));
                });

                // Initialize Chosen.js on the select element
                selectElement.trigger('chosen:updated');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
            }
        });
    }
    fetchCities();
    fetchProvinces();

      // Call the fetchCompanyDetails function when the page loads
      fetchCompanyContact();
  });

</script>


  <!--End Google Map APi-->
</body>


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
</html>