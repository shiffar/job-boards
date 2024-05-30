<div class="model">
  <!-- Login modal -->
  <div id="login-modal">
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
                      <input type="text" name="company_name" id="company_name" placeholder="Company Name" required>
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                      <label>Job Description</label>
                      <textarea name="description" id="description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-12 col-md-12">
                      <label>Start Year</label>
                      <input type="date" name="start_year" id="start_year" placeholder="Start year" required>
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                      <label>Leave year</label>
                      <input type="date" name="end_year" id="end_year" placeholder="Leave Year" required>
                  </div>
              </div>
          </div>


          <div class="form-group">
              <button class="theme-btn btn-style-one" type="button" id="submitWrkexp">Add</button>
              <button class="theme-btn btn-style-two" style="display: none;" type="button" id="updateWrkexp">Update</button>
          </div>
        </form>

      </div>
    </div>
    <!--End Login Form -->
  </div>
  <!-- End Login Module -->
  <script>
    $(document).ready(function () {
        // When the "Add" button is clicked
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

</div>

