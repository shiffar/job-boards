<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
<head>
  <?php include'web-layouts/p-head.php';?>
  <!-- Include the CSS file -->
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
          <h3>Company Profile!</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Profile</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" id="company-info-form" method+="post"  enctype="multipart/form-data">
                    <div class="uploading-outer">
                        <label for="images" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Browse Logo</span>
                            <div class="file-name" id="fileName">No file selected</div>
                            <input type="file" name="logo_attachments[]" id="images" accept="image/*" required>
                            <button class="remove-button" id="removeButton"><i class="fas fa-trash" style="color: #cf0f0f;"></i> Remove</button>
                        </label>
                        <!-- Image preview container -->
                        <div class="image-preview-container" id="imagePreview"></div>
                    </div>

                    <div class="uploading-outer">
                        <label for="images2" class="drop-container" id="dropcontainer2">
                            <span class="drop-title">Browse Cover</span>
                            <div class="file-name" id="fileName2">No file selected</div>
                            <input type="file" name="cover_attachments[]" id="images2" accept="image/*" required>
                            <button class="remove-button" id="removeButton2"><i class="fas fa-trash" style="color: #cf0f0f;"></i> Remove</button>
                        </label>
                        <!-- Image preview container -->
                        <div class="image-preview-container" id="imagePreview2"></div>
                    </div>
                    

                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Company name (optional)</label>
                        <input type="text" name="company_name" placeholder="Invisionn">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email address</label>
                        <input type="text" name="email" placeholder="creativelayers">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="0 123 456 7890">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="website" placeholder="www.invision.com">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Est. Since</label>
                        <input type="date" name="established_date" placeholder="06.04.2020">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Team Size</label>
                        <select class="chosen-select" name="team_size">
                          <option value="50 - 100">50 - 100</option>
                          <option value="100 - 150">100 - 150</option>
                          <option value="200 - 250">200 - 250</option>
                          <option value="300 - 350">300 - 350</option>
                          <option value="500 - 1000">500 - 1000</option>
                        </select>
                      </div>

                      <!-- Search Select -->
                      <div class="form-group col-lg-6 col-md-12">
                          <label>Categories</label>
                          <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4" name="categories[]">
                              
                          </select>
                      </div>


                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Allow In Search & Listing</label>
                        <select class="chosen-select" name="allow_in_search">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>About Company</label>
                        <textarea name="about_company" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-4 col-md-12" id="save-button-div">
                        <button id="save-button"class="theme-btn btn-style-one">Save</button>
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
                            <button id="save-button2" class="theme-btn btn-style-one">Save</button>
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
                  <form class="default-form" id="contact-info-form" method="post">
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
                          <option value="Melbourne">Melbourne</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Chaina">Chaina</option>
                          <option value="Japan">Japan</option>
                          <option value="India">India</option>
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

                      <!-- Input 
                      <div class="form-group col-lg-12 col-md-12">
                        <button class="theme-btn btn-style-three">Search Location</button>
                      </div>


                      <div class="form-group col-lg-12 col-md-12">
                        <div class="map-outer">
                          <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                          </div>
                        </div>
                      </div>-->

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <button class="theme-btn btn-style-one" id="save-button3">Save</button>
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
        initializeFileUploader("dropcontainer2", "images2", "fileName2", "removeButton2", "imagePreview2");
    </script>

<script>
  $(document).ready(function() {
    $("#save-button").click(function(e) {
      e.preventDefault();
      
      var formData = new FormData($("#company-info-form")[0]);

      $.ajax({
        url: "function/company/save-company-info.php", // Replace with the actual PHP processing script
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
  $(document).ready(function() {
      // Function to fetch company details and populate the form
      function fetchCompanyDetails() {
          $.ajax({
              type: "POST",
              url: "function/company/c_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  if (response.logo) {
                      $("#imagePreview").html(`<img src="function/company/uploads/logo/${response.logo}" class="image-preview" alt="Company Logo">`);
                      $("#fileName").text(response.logo); // Update the file name display
                  } else {
                      $("#imagePreview").html('No image available');
                      $("#fileName").text('No file selected'); // Update the file name display
                  }

                  if (response.cover_image) {
                      $("#imagePreview2").html(`<img src="function/company/uploads/cover/${response.cover_image}" class="image-preview" alt="Company Logo">`);
                      $("#fileName2").text(response.cover_image); // Update the file name display
                  } else {
                      $("#imagePreview2").html('No image available');
                      $("#fileName2").text('No file selected'); // Update the file name display
                  }
                  $("input[name='company_name']").val(response.company_name);
                  $("input[name='email']").val(response.email);
                  $("input[name='phone']").val(response.phone);
                  $("input[name='website']").val(response.website);
                  $("input[name='established_date']").val(response.established_date);
                  // Set the selected option in the 'team_size' select element
                var selectedTeamSize = response.team_size;
                var teamSizeSelect = $("select[name='team_size']");

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
                  var selectedValue = response.allow_in_search;
                  var selectElement = $("select[name='allow_in_search']");

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

                  $("textarea[name='about_company']").val(response.about_company);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
      }

      // Call the fetchCompanyDetails function when the page loads
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
    fetchCompanyDetails();
  });

</script>


<script>
  $(document).ready(function() {
    $("#save-button2").click(function(e) {
      e.preventDefault();
      
      var formData = new FormData($("#social-media-form")[0]);

      $.ajax({
        url: "function/company/s-c-sm-info.php", // Replace with the actual PHP processing script
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the response from the server
          console.log(response);

          // Display SweetAlert2 success message if the data was inserted/updated successfully
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
        }
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
              url: "function/company/csm_fetch.php", // Adjust the path to your PHP script
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
  $(document).ready(function() {
    $("#save-button3").click(function(e) {
      e.preventDefault();
      
      var formData = new FormData($("#contact-info-form")[0]);

      $.ajax({
        url: "function/company/company_c_info.php", // Replace with the actual PHP processing script
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the response from the server
          console.log(response);

          // Display SweetAlert2 success message if the data was inserted/updated successfully
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
        }
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
              url: "function/company/cc_fetch.php", // Adjust the path to your PHP script
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
      }
      function fetchProvinces() {
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


<!-- Mirrored from creativelayers.net/themes/superio/dashboard-company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:50 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard-company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:42:27 GMT -->
</html>