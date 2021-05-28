<?php


	include 'php/includes/header.php';
	 if(!isset($_SESSION['email'])){
		Header('Location:logout.php');
	}
?>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="mainLogo">
           <div class="logo"><img src="images/india.png" width="70px"/>Crime Reporting System</div>
       	    </div>
			<div id="login">
				<?php if(isset($_SESSION['email'])){?>
					You are logged in as:  <b><?php echo $_SESSION['email']; ?></b>
				<?php } else { ?>
				<a href="login.php">Login</a> | <a href="register.php">Register</a>
				<?php } ?>
			</div>
		</div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>
		<div id="main">
			<div class="row">
			<div class="col-sm-3" id="side_menu3">
			   <ul id="side_menu">
					<li id="r_crime"><a href="">General Crime Form</a></li>
					<li ><a href="" id="person_missing">Fire Accidents </a></li>
					<li><a href="" id="vehicle_missing">Car Crashes </a></li>
			  </ul>

			</div>
			<div class="col-sm-8">
          <div class="col-lg-12">
            <div class="well"  id="m_person_form_display">
              <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_person_form" enctype="multipart/form-data">
                <fieldset>
                  <legend>Report Fire Accident:</legend>
                  <div id="crime"></div>
				  <table><tr><td valign="top" width="50%">
                  <div class="form-group">
                    <label for="full_names" class="col-lg-4 control-label">Full Name</label>
                    <div class="col-lg-6">
                      <input class="form-control" id="full_names" name="full_names" placeholder="Full Name" type="text" required min="3" title="At least 3 characters"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-lg-4 control-label">Address</label>
                     <div class="col-lg-6">
                      <input class="form-control" id="address" name="address" placeholder="Address" type="text" required min="3" title="At least 3 characters"/>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="phone_number" class="col-lg-4 control-label">Phone Number</label>
                    <div class="col-lg-6">
                      <input class="form-control" id="phone_number" title=""  name="phone_number" type="number" required />
                    </div>
                  </div>
				  </td><td>
                   <div class="form-group">
                    <label for="last_seen2" class="col-lg-4 control-label">Date</label>
                    <div class="col-lg-7">
                      <input class="form-control" id="last_seen2" title="Date required"  name="last_seen2" type="date" required />

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="item_description" class="col-lg-3 control-label">Description:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" rows="3" id="item_description" min="5" required name="item_description"></textarea>

                    </div>
                  </div>
				  </td></tr></table>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" name="missing_person" class="btn btn-primary pull-right" id="missing_person" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>

           <div class="col-lg-12">
            <div class="well"  id="m_vehicle_form_display">
              <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_vehicle_form" enctype="multipart/form-data">
                <fieldset>
                  <legend>Report Car Crash:</legend>
                  <div id="crime"></div>
				  <table><tr><td width="50%">
                  <div class="form-group">
                    <label for="full_name" class="col-lg-3 control-label">Full Name</label>
                    <div class="col-lg-8">
                      <input class="form-control" id="number_plate" name="full_name" placeholder="Full Name" type="text" />
                    </div>
                  </div>
									<div class="form-group">
                    <label for="address" class="col-lg-3 control-label">Address</label>
                     <div class="col-lg-8">
                      <input class="form-control" id="address" name="address" placeholder="Address" type="text" required min="3" title="At least 3 characters"/>
                     </div>
                  </div>
				  </td><td width="50%">
                  <div class="form-group">
                    <label for="phone_number1" class="col-lg-3 control-label">Phone Number</label>
                    <div class="col-lg-8">
                      <input class="form-control" id="phone_number1"   name="phone_number1" type="number" required placeholder="Phone" />
                    </div>
                  </div>
									<div class="form-group">
                    <label for="vehicle_description" class="col-lg-3 control-label">Description:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" rows="3" id="vehicle_description" min="5" required name="vehicle_description"></textarea>

                    </div>
                  </div>
				  </td></tr><tr><td width="50%">
				  </td> <td>
				  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" name="m_vehicle_submit" class="btn btn-primary pull-right" id="m_vehicle_submit" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                    </div>
                  </div>
				  </td></tr></table>

                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="well" id="report_crime_display">
              <form class="bs-example form-horizontal" method="post" action="" id="report_crime" >

                <fieldset>
                  <legend>General Crime Reporting Form:</legend>
                  <div id="crime2"></div>
				  <table><tr><td>
                  <div class="form-group">
                    <label for="crime_type" class="col-lg-2 control-label">Crime type:</label>
                    <div class="col-lg-7">
                      <input class="form-control" id="crime_type" placeholder="Crime Type" type="text" required name="crime_type">
                    </div>
                  </div>
                  <h3>Specify Location</h3>
                   <div class="form-group">
                    <label for="country" class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-7">
                       <input class="form-control" id="county" placeholder="Country" type="text" required  name="county">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category" class="col-lg-2 control-label">State</label>
                    <div class="col-lg-7">
                       <input class="form-control" id="sub_county" placeholder="State" type="text"  required name="sub_county">
                    </div>
                  </div>
				  </td><td width="50%">
                  <div class="form-group">
                    <label for="street" class="col-lg-2 control-label">Street</label>
                    <div class="col-lg-7">
                      <input class="form-control" id="street" placeholder="Street" type="text"  required name="street">
                      <span class="help-block">eg: along Ziwa Kitale road</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="crime_description" class="col-lg-2 control-label">Crime Description:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" rows="3" id="crime_description" required  name="crime_description"></textarea>

                    </div>
                  </div>
				  </td></tr></table>


                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary pull-right" id="report_c" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report Crime</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
			</div>
			</div>
		</div>
		<div class="clearer" style="height:3px;"></div>
<?php include 'php/includes/footer.php'; ?>
