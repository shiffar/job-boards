<div class="model">
  <!-- Login modal -->
  <div id="login-modal">
    <!-- Login Form -->
    <div class="login-form default-form">
      <div class="form-inner">
        <h3>Filter</h3>

        <!--Login Form-->
        <form id="filterForm" method="post">
          <div class="form-group">
              <div class="row" style="margin-bottom: 20px;">
                  <div class="col-lg-6 col-md-12">
                      <label>Start Date</label>
                      <input type="date" name="srt_dte" placeholder="Start Date" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>End Date</label>
                      <input type="date" name="e_dte" placeholder="End Date" required>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12" style="margin-bottom: 20px;">
                      <label>Minimum Salary</label>
                      <input type="text" name="min_slry" placeholder="Minimum Salary" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>Maximum Salary</label>
                      <input type="text" name="max_slry" placeholder="Maximum Salary" required>
                  </div>
              </div>
              <!--<div class="row" style="margin-bottom: 20px;">
                  <div class="col-lg-6 col-md-12">
                      <label>Location</label>
                      <input type="text" name="lctn" placeholder="Location" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label>Category</label>
                      <input type="text" name="ctgry" placeholder="Category" required>
                  </div>
              </div>-->
          </div>


          <div class="form-group">
              <button class="theme-btn btn-style-two" style="background-color: #FFD600;" type="button" id="filterButton">Filter</button>
          </div>
        </form>

      </div>
    </div>
    <!--End Login Form -->
  </div>
  <!-- End Login Module -->


</div>

