<style type="text/css">
    .display_date {
        width: 130px;
        display: inline;
    }
    .display_range {
        width: 130px;
        display: inline;
    }
</style>

<div class="row" id="third">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="min-height: 4em;">
                <div class="col-sm-8">
                    <div id="samples_heading"><?= lang('title_partenaire_test_by_sample') ?></div> <div class="display_range"></div>
                </div>
            </div>
            <div class="panel-body" id="samples">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>
</div>
<div class="row" id="second">
    <!-- Map of the country -->
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="min-height: 4em;">
                <div class="col-sm-7">
                    <div class="chart_title vl_site_vl_heading">
                        <?= lang('label.vl_outcomes'); ?>
                    </div>
                    <div class="display_date"></div>
                </div>
                <div class="col-sm-5">
                    <input type="submit" class="btn btn-primary switchButton" id="switchButton_site_vl" onclick="switch_source_vl_site()" value="<?= lang('label.switch_routine_tests_trends'); ?>">
                </div>
            </div>
            <div id="vlOutcomes">
                <center><div class="loader"></div></center>
            </div>

        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading" style="min-height: 4em;">
                <div class="col-sm-7">
                    <div class="chart_title vl_gender_heading">
                        <?= lang('title_tested_patients_by_gender'); ?>
                    </div>
                    <div class="display_date"></div>
                </div>
                <div class="col-sm-5">
                    <input type="submit" class="btn btn-primary switchButton" id="switchButton_site_gender" onclick="switch_source_siteGender()" value="<?= lang('label.switch_all_tests'); ?>">
                </div>
            </div>
            <div class="panel-body" id="gender">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>

    <!-- Map of the country -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" style="min-height: 4em;">
                <div class="col-sm-8">
                    <div class="chart_title vl_age_heading">
                        <?= lang('title_tested_patients_by_age'); ?>
                    </div>
                    <div class="display_date"></div>
                </div>
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-primary switchButton" id="switchButton_site_age" onclick="switch_source_siteAge()" value="<?= lang('label.switch_all_tests'); ?>">
                </div>
            </div>
            <div class="panel-body" id="ageGroups">
                <center><div class="loader"></div></center>
            </div>
            <div>
                <center>
                    <a type="button" class="btn btn-default" data-toggle="modal" data-target="#agemodal" style="background-color: #2f80d1;color: white; margin-top: 1em;margin-bottom: 1em;" > 
                        <?= lang('label.modal.click_breakdown'); ?></a>                </center>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading chart_title">
                <?= lang('label.justification_for_tests') ?> <div class="display_date"></div>
            </div>
            <div class="panel-body" id="justification">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>

    <!--    <div class="col-md-12">
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        &nbsp;&nbsp;&nbsp;&nbsp; <?= lang('label.tests_done_by_unique_patients') ?><div class="display_date"></div>
                      </div>
                      <div class="panel-body" id="long_tracking">
                        <center><div class="loader"></div></center>
                      </div>
                    </div>
            </div> 
    
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
    <?= lang('label.suppression_rate') ?> <div class="display_current_range"></div>
                    </div>
                    <div class="panel-body" id="current_sup">
                        <center><div class="loader"></div></center>
                    </div>
                </div>
            </div>
        </div>	-->
</div>

<div class="row" id="first">
    <!-- Map of the country -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="min-height: 4em;"> 
                <div class="col-sm-7">
                    <div class="chart_title vl_part_heading">
                        <?= lang('label.partner_outcomes'); ?>
                    </div>
                    <div class="display_date"></div>
                </div>
                <div class="col-sm-5">
                    <input type="submit" class="btn btn-primary switchButton" id="switchButton_part" onclick="switch_source_part()" value="<?= lang('label.switch_routine_tests_trends'); ?>">
                </div>
            </div>
            <div class="panel-body" id="partner_div">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="agemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal" aria-label="<?= lang('label.modal_close') ?>"><span aria-hidden="true">&times;</span></a>
                <h4 class="modal-title"><?= lang('label.age_category_breakdown') ?></h4>
            </div>
            <div class="modal-body" id="CatAge">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="justificationmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= lang('label.modal_close') ?>"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= lang('label.pregnant_and_lactating_mothers') ?></h4>
            </div>
            <div class="modal-body" id="CatJust">
                <center><div class="loader"></div></center>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partner_summary_view_footer'); ?>