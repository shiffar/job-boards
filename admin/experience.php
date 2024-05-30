<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:19 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:35 GMT -->
<head>
  <?php include'../web-layouts/admin/a_head.php';?>
  <style>
    /* Pagination container */
#pagination-container {
    text-align: center;
    margin-top: 20px;
}

/* Pagination list (ul) */
#pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

/* Pagination list items (li) */
#pagination li {
    display: inline;
    margin-right: 5px;
}

/* Pagination links (a) */
#pagination a {
    color: #007BFF;
    text-decoration: none;
    border: 1px solid #007BFF;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

#pagination a:hover {
    background-color: #007BFF;
    color: #fff;
}

#pagination li.active-page a {
    background-color: #007BFF;
    color: #fff;
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
                  <h4>Career Level</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    <button class="theme-btn btn-style-one" type="button" id="openexperienceModal"><i class="fa fa-tasks"></i></button>
                  </div>
                </div>
                
                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                          <th>Career Level</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody id="experience-list">
                        
                        
                      </tbody>
                    </table>

                    
                  </div>
                  <div id="pagination-container">
                      <ul id="pagination" class="pagination"></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="experience-modal-crte" style="display: none;">
            <div class="model">
              <!-- Login modal -->
              <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
                <!-- Login Form -->
                <div class="login-form default-form">
                  <div class="form-inner">
                    <h3>Career Level</h3>

                    <!--Login Form-->
                    <form id="experienceForm" method="post">
                      <div class="form-group">
                          <div class="row" style="margin-bottom: 20px;">
                              <div class="form-group col-lg-12 col-md-12">
                                  <label>Career Level</label>
                                  <input type="text" name="experience" placeholder="Career Level" required>
                              </div>
                              
                          </div>
                          
                      </div>


                      <div class="form-group">
                          <button class="theme-btn btn-style-one" type="button" id="submitExperience">Add</button>
                          
                      </div>
                    </form>

                  </div>
                </div>
                <!--End Login Form -->
              </div>
              <!-- End Login Module -->
              

            </div>
          </div>

          <div id="experience-modal-update" style="display: none;">

            <div class="model">
              <!-- Login modal -->
              <div style="max-width: 500px;padding: 30px 40px 20px; overflow: visible; background: #fff; border-radius: 8px; box-shadow: none;">
                <!-- Login Form -->
                <div class="login-form default-form">
                  <div class="form-inner">
                    <h3>Career Level</h3>

                    <!--Login Form-->
                    <form id="ecategoriesForm" method="post">
                    <input type="hidden" name="eexperience_id" id="eexperience_id" placeholder="Career Level" required>
                      <div class="form-group">
                          <div class="row" style="margin-bottom: 20px;">
                              <div class="form-group col-lg-12 col-md-12">
                                  <label>Career Level</label>
                                  <input type="text" name="eexperience" id="eexperience" placeholder="Career Level" required>
                              </div>
                              
                          </div>
                          
                      </div>


                      <div class="form-group">
                          <button class="theme-btn btn-style-two" type="button" id="updateExperience">Update</button>
                          
                      </div>
                    </form>

                  </div>
                </div>
                <!--End Login Form -->
              </div>
              <!-- End Login Module -->
              

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
                $("#openexperienceModal").click(function () {
                    $("#experience-modal-crte").modal("show");
                });
                  // When the "Add" button is clicked
                $("#submitExperience").click(function () {
                    // Serialize the form data
                    var formData = $("#experienceForm").serialize();

                    // Send an AJAX POST request to the current page
                    $.ajax({
                        type: "POST",
                        url: "../function/admin/a_experience_crte.php", // The PHP script on the current page to handle the form data
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
                              $("#experienceForm")[0].reset();
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
        // Function to fetch job data
        function fetchJobAppData(page) {
            $.ajax({
                url: '../function/admin/a_experience_fetch.php',
                method: 'GET',
                dataType: 'json',
                data: { page: page }, // Pass the current page number
                success: function (data) {
                    if (data && data.length > 0) {
                        // Process and display data here
                        var tableContent = "";

                        // Iterate through the fetched data and create table rows
                        data.forEach(function (data) {
                            var row = '<tr>' +
                                '<td>' +
                                '<span class="info">' + data.experience + '</span>' +
                                '</td>' +
                                '<td>' +
                                '<div class="option-box">' +
                                '<ul class="option-list">' +
                                '<li><button data-user-id="' + data.experience_id + '" data-text="Edit"><span class="la la-pencil"></span></button></li>' +
                                '<li><button data-user-id="' + data.experience_id + '" data-text="Delete"><span class="la la-trash"></span></button></li>' +
                                '</ul>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';

                            tableContent += row;
                        });

                        // Update the table with the new content
                        $('#experience-list').html(tableContent);

                        // Initialize pagination
                        $('#pagination').pagination({
                            dataSource: data,
                            pageSize: 10,
                            hideLastOnEllipsisShow: true,
                            pageRange: 1,
                            callback: function (data, pagination) {
                                // Handle the data and update the table here
                                // data contains the current page's data
                                var tableContent = "";

                                data.forEach(function (data) {
                                    var row = '<tr>' +
                                        '<td>' +
                                        '<span class="info">' + data.experience + '</span>' +
                                        '</td>' +
                                        '<td>' +
                                        '<div class="option-box">' +
                                        '<ul class="option-list">' +
                                        '<li><button data-user-id="' + data.experience_id + '" data-text="Edit"><span class="la la-pencil"></span></button></li>' +
                                        '<li><button data-user-id="' + data.experience_id + '" data-text="Delete"><span class="la la-trash"></span></button></li>' +
                                        '</ul>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>';

                                    tableContent += row;
                                });

                                // Update the table with the new content for the current page
                                // Update the table with the new content for the current page
                                $('#experience-list').html(tableContent);

                                // Remove the "active-page" class from all pagination items
                                $('#pagination li').removeClass('active-page');

                                // Add the "active-page" class to the active page number
                                $('#pagination li a').each(function (index, element) {
                                    if ($(element).text() === pagination.pageNumber.toString()) {
                                        $(element).parent('li').addClass('active-page');
                                    }
                                });
                                
                            },
                        });
                    } else {
                        $('#experience-list').html('<tr><td colspan="2">No experience found.</td></tr>');
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Failed to fetch job data');
                    console.log('XHR status: ' + status);
                    console.log('Error: ' + error);
                }
            });
        }

        // Call the function to fetch and populate job data for the initial page
        fetchJobAppData(1);

            $('#experience-list').on('click', 'button[data-text="Edit"]', function () {
                // Get the category data from the clicked row
                var experience_id = $(this).data('user-id');
                var experience = $(this).closest('tr').find('.info').text();

                // Populate the modal with the data
                $('#eexperience_id').val(experience_id);
                $('#eexperience').val(experience);

                // Show the modal
                $("#experience-modal-update").modal("show");
            });

            $('#experience-list').on('click', 'button[data-text="Delete"]', function () {
              var experience_id = $(this).data('user-id');

              // Use SweetAlert2 for confirmation
              Swal.fire({
                  title: 'Delete experience',
                  text: 'Are you sure you want to delete this experience?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'Cancel',
              }).then((result) => {
                  if (result.isConfirmed) {
                      // User confirmed the deletion, proceed with the AJAX request to delete
                      $.ajax({
                          url: '../function/delete_experience.php', // Update the URL
                          method: 'POST',
                          data: { eexperience_id: experience_id },
                          dataType: 'json',
                          success: function (response) {
                              if (response.success) {
                                  Swal.fire('Deleted!', response.message, 'success').then(function () {
                                      // Refresh the table data
                                      fetchJobAppData(1);
                                  });
                              } else {
                                  Swal.fire('Error', response.message, 'error');
                              }
                          },
                          error: function () {
                              Swal.fire('Error', 'Failed to delete skill', 'error');
                          }
                      });
                  }
              });
            });
    });

      $(document).ready(function () {
        $('#updateExperience').click(function () {
            var experience_id = $('#eexperience_id').val();
            var newExperienceName = $('#eexperience').val();

            

            // Make an AJAX request to update the category data
            $.ajax({
                url: '../function/update_experience.php',
                method: 'POST',
                data: {
                  eexperience_id: experience_id,
                  eexperience: newExperienceName
                },
                dataType: 'json',
                success: function (response) {
                    if (response.message) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then(function () {
                            // Reload the page after a successful update
                            window.location.reload();
                        });
                    } else {
                        // Failed to update category
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            confirmButtonText: 'OK'
                        });
                    }
                  },
                  error: function () {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'Failed to update experience',
                          confirmButtonText: 'OK'
                      });
                  }
                });
            });
      });
</script>

</body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 18:14:21 GMT -->

<!-- Mirrored from workman1.cdott.com/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 11:40:36 GMT -->
</html>