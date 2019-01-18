<div id="first">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			    <?=lang('label.regimen.outcomes')?> <div class="display_date"></div>
			  </div>
			  <div class="panel-body" id="regimen_outcomes">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
	</div>
</div>
<div id="second">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			    <?=lang('title_test_done_by_sample')?> <div class="display_range"></div>
			  </div>
			  <div class="panel-body" id="samples">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
		<div class="col-md-6 col-sm-3 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			  	<?=lang('label.pmtct_vl.outcomes')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="vlOutcomes">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12">
			<div class="panel panel-default ">
			  <div class="panel-heading chart_title">
			  	<?=lang('title_tested_patients_by_gender')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="gender">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12">
			<div class="panel panel-default ">
			  <div class="panel-heading chart_title">
			  	<?=lang('title_tested_patients_by_age')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="age">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			  	<?=lang('label.counties')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="countiesRegimen">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			  	<?=lang('label.partners')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="partnersRegimen">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			  	<?=lang('label.sub_counties')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="subcountiesRegimen">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title">
			  	<?=lang('label.facilities')?> <div class="display_date" ></div>
			  </div>
			  <div class="panel-body" id="FacilitiesRegimen">
			  	<center><div class="loader"></div></center>
			  </div>
			  
			</div>
		</div>
	</div>
	<div class="row">
		<!-- Map of the country -->
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
			  <div class="panel-heading chart_title" id="heading">
			  	<?=lang('title_tested_patients_by_county')?> <div class="display_date"></div>
			  </div>
			  <div class="panel-body" id="county">
			    <center><div class="loader"></div></center>
			  </div>
			</div>
		</div>
	</div>

</div>

<?php $this->load->view('regimen_view_footer');?>