<?php 
  include "templates/head.php";
?>
<link href="css/lib/bootstrap-datepicker.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
 <div class="container-fluid">
    <div class="row-fluid">
      <div id="search-bar">
        <!--Sidebar content-->
        <div class="form-horizontal well" id="search">
        <fieldset>
          <div class="control-group" id="search-route">
            <!-- From -->
            <div class="control-group">
              <label class="control-label">From</label>
              <div class="controls">
                <input class="input-xlarge" id="search-from" type="text" placeholder="Type the name of a place or address over here">
              </div>
            </div>

            <!-- To -->
            <div class="control-group">
              <label class="control-label">To</label>
              <div class="controls">
                <input class="input-xlarge" id="search-to" type="text" placeholder="Type the name of a place or address over here">
              </div>
            </div>
          </div>

          <!-- Departure Date -->
          <div class="control-group" id="search-departure">
            <label class="control-label">Date</label>
            <div class="controls">
              <div class="input-append date" id="search-departure-date" data-date="22-02-2013" data-date-format="dd-mm-yyyy">
               <input class="span8" size="16" type="text" >
                 <span class="add-on"><i class="icon-calendar"></i></span>
              </div>
            </div>
          </div>

         <!-- Search Button -->
         <div class="form-actions" >
           <button type="button" id="search-button" class="btn btn-primary"><i class="icon icon-white icon-search"></i> Search</button>
         </div>
         </fieldset>
         </form>
        </div><!-- End Sidebar Content -->
        <div class="well" id="search-results">
          <h4>Search Results</h4>
          <div id="trips"></div>
        </div>
      </div>
      <div id="map_canvas" class="well"></div>
    </div>
  </div>
<hr>

<!-- Request Ride Modal -->
<div id="modal-request-ride" class="modal hide fade">
    <div class="modal-header">
      <a data-dismiss="modal" href="#" class="close">&times;</a>
      <h3>Request Ride</h3>
    </div>
    <div class="modal-body">
      <div id="modal-trip-info">
      </div>
      <form class="form-horizontal" method="post" action="register_post.php">
        <fieldset>
          <!-- Message -->
          <div class="control-group">
            <div class="controls">
              <textarea id="modal-trip-request-message" class="input-block-level" rows="5" placeholder="Request Message..."></textarea>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#" id='modal-request-ride-submit' class="btn btn-primary">Request</a>
      <a data-dismiss="modal" class="btn secondary">Cancel</a>
    </div>
</div>


   