<div class="row">
		<!-- Map of the country -->
	
</div>

<div id="first">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	Counties Outcomes <div class="display_date"></div>
			  </div>
			  <div class="panel-body" id="county">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				Counties <div class="display_date"></div>
				</div>
			  	<div class="panel-body" id="county_sites">
			  		<center><div class="loader"></div></center>
			  	</div>
			</div>
		</div>
	</div>
</div>

<div id="second">
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading" id="heading">
			  Sub-Counties Outcomes <div class="display_date"></div>
			  </div>
			  <div class="panel-body" id="subcounty">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading" id="heading">
			  Sub-Counties Positivity <div class="display_date"></div>
			  </div>
			  <div class="panel-body" id="subcountypos">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				  Sub-Counties <div class="display_date"></div>
				</div>
			  	<div class="panel-body" id="sub_counties">
			  		<center><div class="loader"></div></center>
			  	</div>
			</div>
		</div>
	</div>
</div>



<?php $this->load->view('county_view_footer'); ?>