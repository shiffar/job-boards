<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
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

        .pdf-container canvas {
            display: block;
            max-width: 100%;
            max-height: 200px;
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
        <!--<div class="upper-title-box">
          <h3>My Resume</h3>
          <div class="text">Ready to jump back in?</div>
        </div>-->
        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Profile</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" id="cv_form" enctype="multipart/form-data">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <div class="uploading-outer">
                          <label for="images" class="drop-container" id="dropcontainer">
                              <span class="drop-title">Browse CV</span>
                              <div class="file-name" id="fileName">No file selected</div>
                              <input type="file" name="image" id="images" accept="image/*,application/pdf">
                              <button class="remove-button" id="removeButton"><i class="fas fa-trash" style="color: #cf0f0f;"></i> Remove</button>
                          </label>
                          <!-- Image preview container -->
                          <div class="image-preview-container" id="imagePreview"></div>
                          <div class="pdf-container" id="pdfContainer"></div>
                        </div>
                      </div>

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Skills </label>
                        <select data-placeholder="Skills" class="chosen-select multiple" multiple tabindex="4" name="skills[]">
                          <option value="Banking">Banking</option>
                          <option value="Digital&Creative">Digital & Creative</option>
                          <option value="Retail">Retail</option>
                          <option value="Human Resources">Human Resources</option>
                          <option value="Management">Management</option>
                        </select>
                      </div>

                      

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <button id="save-button" class="theme-btn btn-style-one">Save</button>
                      </div>
                    </div>
                  </form>

                      <div class="form-group col-lg-12 col-md-12">
                        <!-- Resume / Education -->
                        <div class="resume-outer">
                          <div class="upper-title">
                            <h4>Education</h4>
                            <button class="add-info-btn" id="openeduModal"><span class="icon flaticon-plus"></span>  Add Education</button>
                          </div>
                          <!-- Resume BLock -->
                          
                          <div id="educationContainer"></div>

                          
                        </div>

                        <!-- Resume / Work & Experience -->
                        <div class="resume-outer theme-blue">
                          <div class="upper-title">
                            <h4>Work & Experience</h4>
                            <button class="add-info-btn" id="openwrkexpModal"><span class="icon flaticon-plus"></span>  Add Work</button>
                          </div>
                          <!-- Resume BLock -->
                          <div id="work_expContainer"></div>
                        </div>
                      </div>

                      <div class="form-group col-lg-12 col-md-12">
                        <!-- Resume / Awards -->
                        <div class="resume-outer theme-yellow">
                          <div class="upper-title">
                            <h4>Awards</h4>
                            <button class="add-info-btn" id="openawardModal"><span class="icon flaticon-plus"></span>  Awards</button>
                          </div>
                          <!-- Resume BLock -->
                          <div id="awardContainer"></div>

                          <!-- Resume BLock -->
                          
                        </div>
                      </div>

                      <!-- Search Select -->
                     
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div id="edu-modal-crte" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Education</h3>

                <!--Login Form-->
                <form id="educationForm" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Collage Name</label>
                              <input type="text" name="college_name" placeholder="Collage Name" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Education</label>
                              <input type="text" name="education" placeholder="Education" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Description</label>
                              <textarea name="edu_description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="start_year" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>End year</label>
                              <input type="date" name="end_year" placeholder="End Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-one" type="button" id="submitEducation">Add</button>
                      
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
          

        </div>


      </div>

      <div id="edu-modal-update" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Education</h3>

                <!--Login Form-->
                <form id="educationForm2" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Collage Name</label>
                              <input type="text" name="college_name2" id="college_name" placeholder="Collage Name" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Education</label>
                              <input type="text" name="education2" id="education" placeholder="Education" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Description</label>
                              <textarea name="edu_description2" id="edu_description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="start_year2" id="start_year" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>End year</label>
                              <input type="date" name="end_year2" id="end_year" placeholder="End Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-two" type="button" id="updateEducation">Update</button>
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
          

        </div>


      </div>

      <div id="wrkexp-modal-crte" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Work and Experience</h3>

                <!--Login Form-->
                <form id="workForm" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Job Title</label>
                              <input type="text" name="job_title" id="job_title" placeholder="Job Title" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Company Name</label>
                              <input type="text" name="company_name" placeholder="Company Name" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Job Description</label>
                              <textarea name="wrkexp_description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="wrkexp_start_year" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Leave year</label>
                              <input type="date" name="wrkexp_end_year" placeholder="Leave Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-one" type="button" id="submitWrkexp">Add</button>
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
        

        </div>


      </div>

      <div id="wrkexp-modal-update" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Work and Experience</h3>

                <!--Login Form-->
                <form id="workForm2" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Job Title</label>
                              <input type="text" name="job_title2" id="job_title2" placeholder="Job Title" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Company Name</label>
                              <input type="text" name="company_name2" id="company_name2" placeholder="Company Name" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Job Description</label>
                              <textarea name="wrkexp_description2" id="wrkexp_description2" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="wrkexp_start_year2" id="wrkexp_start_year2" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Leave year</label>
                              <input type="date" name="wrkexp_end_year2" id="wrkexp_end_year2" placeholder="Leave Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-two" type="button" id="updateWrkexp">Update</button>
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
        

        </div>


      </div>

      <div id="award-modal-crte" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Awards</h3>

                <!--Login Form-->
                <form id="awardForm" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Award Title</label>
                              <input type="text" name="award_title" placeholder="Award Title" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Award Description</label>
                              <textarea name="award_description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="award_start_year" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>End year</label>
                              <input type="date" name="award_end_year" placeholder="End Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-one" type="button" id="submitAward">Add</button>
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
        

        </div>


      </div>

      <div id="award-modal-update" style="display: none;">
        <div class="model">
          <!-- Login modal -->
          <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
            <!-- Login Form -->
            <div class="login-form default-form">
              <div class="form-inner">
                <h3>Awards</h3>

                <!--Login Form-->
                <form id="awardForm2" method="post">
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 20px;">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Award Title</label>
                              <input type="text" name="award_title2" id="award_title2" placeholder="Award Title" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Award Description</label>
                              <textarea name="award_description2" id="award_description2" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Start Year</label>
                              <input type="date" name="award_start_year2" id="award_start_year2" placeholder="Start year" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <label>Leave year</label>
                              <input type="date" name="award_end_year2" id="award_end_year2" placeholder="Leave Year" required>
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                      <button class="theme-btn btn-style-two" type="button" id="updateAward">Update</button>
                  </div>
                </form>

              </div>
            </div>
            <!--End Login Form -->
          </div>
          <!-- End Login Module -->
        

        </div>


      </div>

      </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <?php include'web-layouts/copyright.php';?>


  </div><!-- End Page Wrapper -->


  <?php include'web-layouts/scripts.php';?>
    <script>
        function initializeFileUploader(dropContainerId, fileInputId, fileNameDisplayId, removeButtonId, previewContainerId) {
            const dropContainer = document.getElementById(dropContainerId);
            const fileInput = document.getElementById(fileInputId);
            const fileNameDisplay = document.getElementById(fileNameDisplayId);
            const removeButton = document.getElementById(removeButtonId);
            const previewContainer = document.getElementById(previewContainerId);
            const imagePreview = document.getElementById("imagePreview");
            const pdfContainer = document.getElementById("pdfContainer");

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
                    const file = fileInput.files[0];
                    fileNameDisplay.textContent = file.name;
                    fileNameDisplay.classList.add("show");
                    removeButton.style.display = "block";
                    if (file.type === "application/pdf") {
                        // Display PDF using PDF.js
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const pdfData = new Uint8Array(e.target.result);
                            pdfjsLib.getDocument({ data: pdfData }).promise.then(pdfDoc => {
                                pdfDoc.getPage(1).then(page => {
                                    const canvas = document.createElement("canvas");
                                    const context = canvas.getContext("2d");
                                    const viewport = page.getViewport({ scale: 1 });
                                    canvas.width = viewport.width;
                                    canvas.height = viewport.height;
                                    pdfContainer.innerHTML = ""; // Clear previous content
                                    pdfContainer.appendChild(canvas);
                                    page.render({ canvasContext: context, viewport: viewport });
                                });
                            });
                        };
                        reader.readAsArrayBuffer(file);
                        imagePreview.innerHTML = ""; // Clear image preview
                    } else if (file.type.startsWith("image/")) {
                        // Display image preview for image files
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.innerHTML = `<img src="${e.target.result}" class="image-preview" alt="Selected Image">`;
                            pdfContainer.innerHTML = ""; // Clear PDF preview
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Handle other file types as needed
                        imagePreview.innerHTML = "";
                        pdfContainer.innerHTML = "";
                    }
                } else {
                    fileNameDisplay.textContent = "No file selected";
                    fileNameDisplay.classList.remove("show");
                    removeButton.style.display = "none";
                    imagePreview.innerHTML = "";
                    pdfContainer.innerHTML = "";
                }
            });

            removeButton.addEventListener("click", () => {
                fileInput.value = "";
                showFileName();
                imagePreview.innerHTML = "";
                pdfContainer.innerHTML = "";
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
                    imagePreview.innerHTML = "";
                    pdfContainer.innerHTML = "";
                }
            }
        }

        initializeFileUploader("dropcontainer", "images", "fileName", "removeButton", "previewContainer");
    </script>

  <script>
    $(document).ready(function() {
      $("#save-button").click(function(e) {
        e.preventDefault();
        
        var formData = new FormData($("#cv_form")[0]);

        $.ajax({
          url: "function/job-seeker/js_resume_crte.php", // Replace with the actual PHP processing script
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
              url: "function/job-seeker/js_resume_fetch.php", // Adjust the path to your PHP script
              dataType: "json",
              success: function(response) {
                  console.log("Received data:", response); // Log received data
                  $("#pdfContainer").text(response.cv_filename);
                  $("textarea[name='description']").val(response.description);
                  // Log the selected options
                  // Log the selected options
                  $("select[name='skills']").val(response.skills);
                  // Log the selected options
                  // Log the selected options
                  var skills = JSON.parse(response.skills);

                  // Get the select element
                  var selectElement = $("select[name='skills[]']");

                  // Clear any existing selections
                  selectElement.val(null);

                  // Loop through the options and mark them as selected based on the received data
                  $.each(skills, function(index, category) {
                      selectElement.find('option[value="' + category + '"]').prop('selected', true);
                  });

                  // Initialize Chosen.js on the select element
                  selectElement.trigger('chosen:updated');

                  // Log the selected options
                  console.log("Selected options:", selectElement.val());

                  // Set the selected option in the 'allow_in_search' select element
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Ajax error:", textStatus, errorThrown); // Log any Ajax errors
              }
          });
        }

        // Function to fetch skills and populate the form
        function fetchSkills() {
            $.ajax({
                type: "POST",
                url: "function/fetch_skills.php", // Adjust the path to your PHP script
                dataType: "json",
                success: function(response) {
                    console.log("Received skills data:", response); // Log received data

                    // Get the select element
                    var selectElement = $("select[name='skills[]']");

                    // Clear existing options
                    selectElement.empty();

                    // Loop through the skills data and add options to the select element
                    $.each(response, function(index, skill) {
                        selectElement.append($('<option>', {
                            value: skill.skill,
                            text: skill.skill
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

        // Call the fetchCompanyDetails and fetchSkills functions when the page loads
        fetchCompanyDetails();
        fetchSkills();
      });


    </script>


          <script>
            $(document).ready(function () {
                $("#openeduModal").click(function () {
                    $("#edu-modal-crte").modal("show");
                });
                  // When the "Add" button is clicked
                $("#submitEducation").click(function () {
                    // Serialize the form data
                    var formData = $("#educationForm").serialize();

                    // Send an AJAX POST request to the current page
                    $.ajax({
                        type: "POST",
                        url: "function/job-seeker/js_edu_crte.php", // The PHP script on the current page to handle the form data
                        data: formData,
                        success: function (response) {
                          console.log(response);

                          // Display SweetAlert2 success message if data was inserted/updated successfully
                          if (response.includes("successfully")) {
                            Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: response,
                              confirmButtonText: 'OK'
                            }).then(function() {
                              $("#educationForm")[0].reset();
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
                                            <button class="frm-edit" data-edu-id="${education.edu_id}"><span class="la la-pencil"></span></button>
                                            <button><span class="la la-trash"></span></button>
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
                  
                  // Add a click event handler to the ".frm-edit" button
                  $(".frm-edit").click(function () {
                    // Get the edu_id from the data attribute of the clicked button
                    var edu_id = $(this).data("edu-id");
                    console.log("Clicked Edit Button. edu_id: " + edu_id);

                    // Load the content of edu-modal.php into the modal
                    $("#edu-modal-update").modal("show");

                    // Open the modal
                    
                        // Make an AJAX request to fetch the education data
                        $.ajax({
                            type: "POST",
                            url: "function/job-seeker/js_edu_fetch.php",
                            dataType: "json",
                            data: { edu_id: edu_id },
                            success: function (educationData) {
                                console.log("Received data:", educationData);

                                // Populate the form fields with the fetched data
                                var educationDataObj = educationData[0];
                                $("#college_name").val(educationDataObj.college_name);
                                $("#education").val(educationDataObj.education);
                                $("#edu_description").val(educationDataObj.description);
                                $("#start_year").val(educationDataObj.start_year);
                                $("#end_year").val(educationDataObj.end_year);

                                // Handle the "Update" button click
                                $("#updateEducation").click(function () {
                                    // Get updated values from modal form fields
                                    var updatedCollegeName = $("#college_name").val();
                                    var updatedEducation = $("#education").val();
                                    var updatedDescription = $("#edu_description").val();
                                    var updatedStartYear = $("#start_year").val();
                                    var updatedEndYear = $("#end_year").val();

                                    // Create an object with updated data
                                    var updatedData = {
                                        edu_id: educationDataObj.edu_id, // Add the edu_id for identification
                                        college_name: updatedCollegeName,
                                        education: updatedEducation,
                                        description: updatedDescription,
                                        start_year: updatedStartYear,
                                        end_year: updatedEndYear
                                    };

                                    // Send an AJAX request to update the data
                                    $.ajax({
                                        type: "POST",
                                        url: "function/job-seeker/js_edu_update.php",
                                        data: updatedData,
                                        dataType: "json",
                                        success: function (response) {
                                            // Handle the update response, e.g., show success message
                                            if (response.success) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Update Successful',
                                                    text: 'Education data updated successfully.',
                                                    confirmButtonText: 'OK'
                                                }).then(function() {
                                                    $("#edu-modal").modal("hide"); // Hide the modal
                                                    window.location.reload();
                                                });
                                            } else {
                                                // Handle update failure, e.g., show an error message
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Update Failed',
                                                    text: 'Education data update failed.',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        }
                                    });
                                });
                            }
                        });
                });

              }
          });
      }

      // Call the function to fetch and display education data
      fetchEducationData();
    });

  </script>

  <script>
    $(document).ready(function () {
        // When the "Add" button is clicked
        $("#openwrkexpModal").click(function () {
            $("#wrkexp-modal-crte").modal("show");
          });
        $("#submitWrkexp").click(function () {
            // Serialize the form data
            var formData = $("#workForm").serialize();

            // Send an AJAX POST request to the current page
            $.ajax({
                type: "POST",
                url: "function/job-seeker/js_wrk_crte.php", // The PHP script on the current page to handle the form data
                data: formData,
                success: function (response) {
                  console.log(response);

                  // Display SweetAlert2 success message if data was inserted/updated successfully
                  if (response.includes("successfully")) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: response,
                      confirmButtonText: 'OK'
                    }).then(function() {
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
                                    <button class="frm-edit2" data-wrkexp-id="${wrkexp.wrkexp_id}"><span class="la la-pencil"></span></button>
                                    <button><span class="la la-trash"></span></button>
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
                
                // Add a click event handler to the ".frm-edit" button
                $(".frm-edit2").click(function () {
                    // Get the edu_id from the data attribute of the clicked button
                    var wrkexp_id = $(this).data("wrkexp-id");
                    console.log("Clicked Edit Button. wrkexp_id: " + wrkexp_id);

                    // Load the content of edu-modal.php into the modal
                    $("#wrkexp-modal-update").modal("show");

                    // Open the modal
                    
                        // Make an AJAX request to fetch the education data
                        $.ajax({
                            type: "POST",
                            url: "function/job-seeker/js_wrkexp_fetch.php",
                            dataType: "json",
                            data: { wrkexp_id: wrkexp_id },
                            success: function (wrkexpData) {
                                console.log("Received data:", wrkexpData);

                                // Populate the form fields with the fetched data
                                var wrkexpDataObj = wrkexpData[0];
                                $("#company_name2").val(wrkexpDataObj.company_name);
                                $("#job_title2").val(wrkexpDataObj.job_title);
                                $("#wrkexp_description2").val(wrkexpDataObj.description);
                                $("#wrkexp_start_year2").val(wrkexpDataObj.start_year);
                                $("#wrkexp_end_year2").val(wrkexpDataObj.end_year);

                                // Handle the "Update" button click
                                $("#updateWrkexp").click(function () {
                                    // Get updated values from modal form fields
                                    var wrkexpupdatedCompanyName = $("#company_name2").val();
                                    var wrkexpupdatedJobTitle = $("#job_title2").val();
                                    var wrkexpupdatedDescription = $("#wrkexp_description2").val();
                                    var wrkexpupdatedStartYear = $("#wrkexp_start_year2").val();
                                    var wrkexpupdatedEndYear = $("#wrkexp_end_year2").val();

                                    // Create an object with updated data
                                    var wrkexpupdatedData = {
                                        wrkexp_id: wrkexpDataObj.wrkexp_id, // Add the edu_id for identification
                                        company_name: wrkexpupdatedCompanyName,
                                        job_title: wrkexpupdatedJobTitle,
                                        wrkexp_description: wrkexpupdatedDescription,
                                        wrkexp_start_year: wrkexpupdatedStartYear,
                                        wrkexp_end_year: wrkexpupdatedEndYear
                                    };

                                    // Send an AJAX request to update the data
                                    $.ajax({
                                        type: "POST",
                                        url: "function/job-seeker/js_wrkexp_update.php",
                                        data: wrkexpupdatedData,
                                        dataType: "json",
                                        success: function (response) {
                                            // Handle the update response, e.g., show success message
                                            if (response.success) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Update Successful',
                                                    text: 'Wrok & Experience data updated successfully.',
                                                    confirmButtonText: 'OK'
                                                }).then(function() {
                                                    $("#edu-modal").modal("hide"); // Hide the modal
                                                    window.location.reload();
                                                });
                                            } else {
                                                // Handle update failure, e.g., show an error message
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Update Failed',
                                                    text: 'Wrok & Experience data update failed.',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        }
                                    });
                                });
                            }
                        });
                });
                
            }
        });
    }

    // Call the function to fetch and display education data
    fetchWrkexpData();
  });

</script>

          <script>
            $(document).ready(function () {
                $("#openawardModal").click(function () {
                    $("#award-modal-crte").modal("show");
                });
                  // When the "Add" button is clicked
                $("#submitAward").click(function () {
                    // Serialize the form data
                    var formData = $("#awardForm").serialize();

                    // Send an AJAX POST request to the current page
                    $.ajax({
                        type: "POST",
                        url: "function/job-seeker/js_award_crte.php", // The PHP script on the current page to handle the form data
                        data: formData,
                        success: function (response) {
                          console.log(response);

                          // Display SweetAlert2 success message if data was inserted/updated successfully
                          if (response.includes("successfully")) {
                            Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: response,
                              confirmButtonText: 'OK'
                            }).then(function() {
                              $("#awardForm")[0].reset();
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
                                    <button class="frm-edit3" data-awrd-id="${award.awrd_id}"><span class="la la-pencil"></span></button>
                                    <button><span class="la la-trash"></span></button>
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
                
                // Add a click event handler to the ".frm-edit" button
                $(".frm-edit3").click(function () {
                    // Get the edu_id from the data attribute of the clicked button
                    var awrd_id = $(this).data("awrd-id");
                    console.log("Clicked Edit Button.awrd_id: " +awrd_id);

                    // Load the content of edu-modal.php into the modal
                    $("#award-modal-update").modal("show");

                    // Open the modal
                    
                        // Make an AJAX request to fetch the education data
                        $.ajax({
                            type: "POST",
                            url: "function/job-seeker/js_award_fetch.php",
                            dataType: "json",
                            data: { awrd_id: awrd_id },
                            success: function (awardData) {
                                console.log("Received data:", awardData);

                                // Populate the form fields with the fetched data
                                var awardDataObj = awardData[0];
                                $("#award_title2").val(awardDataObj.award_title);
                                $("#award_description2").val(awardDataObj.award_description);
                                $("#award_start_year2").val(awardDataObj.start_year);
                                $("#award_end_year2").val(awardDataObj.end_year);

                                // Handle the "Update" button click
                                $("#updateAward").click(function () {
                                    // Get updated values from modal form fields
                                    var awardupdatedAwardTitle = $("#award_title2").val();
                                    var awardupdatedDescription = $("#award_description2").val();
                                    var awardupdatedStartYear = $("#award_start_year2").val();
                                    var awardupdatedEndYear = $("#award_end_year2").val();

                                    // Create an object with updated data
                                    var awardupdatedData = {
                                        awrd_id: awardDataObj.awrd_id, // Add the edu_id for identification
                                        award_title: awardupdatedAwardTitle,
                                        award_description: awardupdatedDescription,
                                        award_start_year: awardupdatedStartYear,
                                        award_end_year: awardupdatedEndYear
                                    };

                                    // Send an AJAX request to update the data
                                    $.ajax({
                                        type: "POST",
                                        url: "function/job-seeker/js_award_update.php",
                                        data: awardupdatedData,
                                        dataType: "json",
                                        success: function (response) {
                                            // Handle the update response, e.g., show success message
                                            if (response.success) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Update Successful',
                                                    text: 'Award data updated successfully.',
                                                    confirmButtonText: 'OK'
                                                }).then(function() {
                                                    $("#award-modal-update").modal("hide"); // Hide the modal
                                                    window.location.reload();
                                                });
                                            } else {
                                                // Handle update failure, e.g., show an error message
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Update Failed',
                                                    text: 'Award data update failed.',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        }
                                    });
                                });
                            }
                        });
                });
                
            }
        });
    }

    // Call the function to fetch and display education data
    fetchAwardData();
  });

</script>

  <!--End Google Map APi-->

</body>


<!-- Mirrored from creativelayers.net/themes/superio/candidate-dashboard-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:51 GMT -->

<!-- Mirrored from workman1.cdott.com/candidate-dashboard-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:41:13 GMT -->
</html>