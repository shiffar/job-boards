<div class="model">
  <!-- Login modal -->
  <div id="login-modal">
    <!-- Login Form -->
    <div class="login-form default-form">
      <div class="form-inner">
        <h3>Create a Free Superio Account</h3>

        <!--Login Form-->
        <form id="registrationForm" method="post">
          <div class="form-group">
              <div class="btn-box row">
                  <div class="col-lg-6 col-md-12">
                      <button type="button" class="theme-btn btn-style-four registration-type candidate" data-type="candidate"><i class="la la-user"></i> Candidate</button>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <button type="button" class="theme-btn btn-style-four registration-type employer" data-type="employer"><i class="la la-briefcase"></i> Employer</button>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-lg-6 col-md-12">
                      <label>First Name</label>
                      <input type="text" name="f_nm" placeholder="First Name" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>Last Name</label>
                      <input type="text" name="l_nm" placeholder="Last Name" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md-12">
                      <label>User Name</label>
                      <input type="text" name="u_nm" placeholder="User Name" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>Password</label>
                      <input type="password" name="password" placeholder="Password" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md-12">
                      <label>Email Address</label>
                      <input type="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>Telephone</label>
                      <input type="text" name="tele" placeholder="Telephone">
                  </div>
              </div>
          </div>

          <input type="hidden" name="registrationType" id="registrationType" value="candidate">

          <div class="form-group">
              <button class="theme-btn btn-style-one" type="button" id="registerButton">Register</button>
          </div>
        </form>


        <div class="bottom-box">
          <div class="divider"><span>or</span></div>
          <div class="btn-box row">
            <div class="col-lg-6 col-md-12">
              <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
            </div>
            <div class="col-lg-6 col-md-12">
              <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Login Form -->
  </div>
  <!-- End Login Module -->
  <script>
    // Get references to the buttons
    // Get references to the buttons
    const candidateButton = document.querySelector('.candidate');
    const employerButton = document.querySelector('.employer');

    // Add click event listeners to the buttons
    candidateButton.addEventListener('click', () => {
        candidateButton.style.backgroundColor = '#34A853';
        candidateButton.style.color = '#E1F2E5'; // Change text color to white
        employerButton.style.backgroundColor = '#E1F2E5';
        employerButton.style.color = '#34A853'; // Change text color to black
    });

    employerButton.addEventListener('click', () => {
        employerButton.style.backgroundColor = '#34A853';
        employerButton.style.color = '#E1F2E5'; // Change text color to white
        candidateButton.style.backgroundColor = '#E1F2E5';
        candidateButton.style.color = '#34A853'; // Change text color to black
    });

  </script>
  <script>
    $(document).ready(function() {
        // Initialize the registration type to "candidate"
        $("#registrationType").val("candidate");
        const loginModal = $("#login-modal");

        // Handle button clicks to change the registration type
        $(".registration-type").click(function() {
            var type = $(this).data("type");
            $("#registrationType").val(type);
        });

        // Handle form submission
        $("#registerButton").click(function() {
            var formData = $("#registrationForm").serialize();

            $.ajax({
                type: "POST",
                url: "function/user/u_create.php", // Update this URL to your PHP script
                data: formData,
                success: function(response) {
                    if (response.trim() === "success") {
                        // Display a success alert using SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration successful!',
                            text: response,
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.reload();
                        });
                    } else {
                        // Display an error alert using SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response,
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.reload();
                        });
                    }
                }
            });
        });
    });
</script>


</div>

