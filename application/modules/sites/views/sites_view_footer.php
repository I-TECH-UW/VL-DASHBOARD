<script type="text/javascript">
    $().ready(function () {
        localStorage.setItem("view_site1", 0);
        localStorage.setItem("view_site2", 0);
        localStorage.setItem("view_age", 1);
        localStorage.setItem("view_gender", 1);
        localStorage.setItem("view_cat_age", 0);
        $.get("<?php echo base_url(); ?>template/dates", function (data) {
            obj = $.parseJSON(data);

            if (obj['month'] == "null" || obj['month'] == null) {
                obj['month'] = "";
            }
            $(".display_date").html("( " + obj['year'] + " " + obj['month'] + " )");
            $(".display_range").html("( " + obj['year'] + " )");
        });
        $.get("<?php echo base_url(); ?>template/get_current_header", function (data) {
            $(".display_current_range").html(data);
        });
        var site = <?php echo json_encode($this->session->userdata("site_filter")); ?>;
        var view_age_cat = localStorage.getItem("view_cat_age");
        //console.log(site);
        if (!site) {
            $("#siteOutcomes").load("<?php echo base_url('charts/sites/site_outcomes'); ?>");

            $("#first").show();
            $("#second").hide();
        } else {
            $("#first").hide();
            $("#second").show();

            $("#tsttrends").html("<center><div class='loader'></div></center>");
            $("#stoutcomes").html("<center><div class='loader'></div></center>");
            $("#vlOutcomes").html("<center><div class='loader'></div></center>");
            $("#ageGroups").html("<center><div class='loader'></div></center>");
            $("#gender").html("<center><div class='loader'></div></center>");
            $("#justification").html("<center><div class='loader'></div></center>");
            $("#long_tracking").html("<center><div class='loader'></div></center>");
            $("#current_sup").html("<center><div class='loader'></div></center>");

            $("#tsttrends").load("<?php echo base_url('charts/sites/site_trends'); ?>/" + null + "/" + null + "/" + site);
            $("#stoutcomes").load("<?php echo base_url('charts/sites/site_outcomes_chart'); ?>/" + null + "/" + null + "/" + site);
            $("#vlOutcomes").load("<?php echo base_url('charts/sites/site_Vlotcomes'); ?>/" + null + "/" + null + "/" + site);
            if (view_age_cat == 0) {
                $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>/" + null + "/" + null + "/" + site);
            } else {
                $("#ageGroups").load("<?php echo base_url('charts/summaries/p_age'); ?>/" + null + "/" + null + "/" + null + "/" + null + "/" + site);
            }
            $("#gender").load("<?php echo base_url('charts/sites/site_gender'); ?>/" + null + "/" + null + "/" + site);
            $("#justification").load("<?php echo base_url('charts/sites/site_justification'); ?>/" + null + "/" + null + "/" + site);
            $("#long_tracking").load("<?php echo base_url('charts/sites/get_patients'); ?>/" + null + "/" + null + "/" + site);
            $("#current_sup").load("<?php echo base_url('charts/sites/current_suppression'); ?>/" + null + "/" + site);

        }

        $("select").change(function () {
            em = $(this).val();
            localStorage.setItem("site", em);

            // Send the data using post
            var posting = $.post("<?php echo base_url(); ?>template/filter_site_data", {site: em});

            // Put the results in a div
            posting.done(function (data) {
                //console.log(data);
                $.get("<?php echo base_url(); ?>template/dates", function (data) {
                    obj = $.parseJSON(data);

                    if (obj['month'] == "null" || obj['month'] == null) {
                        obj['month'] = "";
                    }
                    $(".display_date").html("( " + obj['year'] + " " + obj['month'] + " )");
                    $(".display_range").html("( " + obj['year'] + " )");
                });
                var view_age_cat = localStorage.getItem("view_cat_age");

                /*$.get("<?php echo base_url(); ?>template/breadcrum", function(data){
                 $("#breadcrum").html(data);
                 });*/
                if (em == "NA") {
                    $("#siteOutcomes").html("<center><div class='loader'></div></center>");
                    $("#siteOutcomes").load("<?php echo base_url('charts/sites/site_outcomes'); ?>");

                    $("#first").show();
                    $("#second").hide();
                } else {
                    $("#first").hide();
                    $("#second").show();

                    $("#tsttrends").html("<center><div class='loader'></div></center>");
                    $("#stoutcomes").html("<center><div class='loader'></div></center>");
                    $("#vlOutcomes").html("<center><div class='loader'></div></center>");
                    $("#ageGroups").html("<center><div class='loader'></div></center>");
                    $("#gender").html("<center><div class='loader'></div></center>");
                    $("#justification").html("<center><div class='loader'></div></center>");
                    $("#long_tracking").html("<center><div class='loader'></div></center>");
                    $("#current_sup").html("<center><div class='loader'></div></center>");

                    $("#tsttrends").load("<?php echo base_url('charts/sites/site_trends'); ?>/" + null + "/" + null + "/" + em);
                    $("#stoutcomes").load("<?php echo base_url('charts/sites/site_outcomes_chart'); ?>/" + null + "/" + null + "/" + em);
                    $("#vlOutcomes").load("<?php echo base_url('charts/sites/site_Vlotcomes'); ?>/" + null + "/" + null + "/" + em);
                    if (view_age_cat == 0) {
                        $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>/" + null + "/" + null + "/" + em);
                    } else {
                        $("#ageGroups").load("<?php echo base_url('charts/summaries/p_age'); ?>/" + null + "/" + null + "/" + null + "/" + null + "/" + em);
                    }
                    $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>/" + null + "/" + null + "/" + em);
                    $("#gender").load("<?php echo base_url('charts/sites/site_gender'); ?>/" + null + "/" + null + "/" + em);
                    $("#justification").load("<?php echo base_url('charts/sites/site_justification'); ?>/" + null + "/" + null + "/" + em);
                    $("#long_tracking").load("<?php echo base_url('charts/sites/get_patients'); ?>/" + null + "/" + null + "/" + em);
                    $("#current_sup").load("<?php echo base_url('charts/sites/current_suppression'); ?>/" + null + "/" + em);
                }
            });
        });

        $("button").click(function () {
            var first, second;
            first = $(".date-picker[name=startDate]").val();
            second = $(".date-picker[name=endDate]").val();

            var new_title = set_multiple_date(first, second);
            $(".display_date").html(new_title);

            from = format_date(first);
            /* from is an array
             [0] => month
             [1] => year*/
            to = format_date(second);
            var error_check = check_error_date_range(from, to);
            var view_age_cat = localStorage.getItem("view_cat_age");
            if (!error_check) {
                $.get("<?php echo base_url('sites/check_site_select'); ?>", function (site) {
                    //Checking if site was previously selected and calling the relevant views
                    // site = JSON.parse(site);
                    site = localStorage.getItem("site");
                    console.log(site);
                    if (site == "NA") {
                        $("#siteOutcomes").html("<center><div class='loader'></div></center>");
                        $("#siteOutcomes").load("<?php echo base_url('charts/sites/site_outcomes'); ?>/" + from[1] + "/" + from[0] + "/" + null + "/" + to[1] + "/" + to[0]);

                    } else {
                        $("#tsttrends").html("<center><div class='loader'></div></center>");
                        $("#stoutcomes").html("<center><div class='loader'></div></center>");
                        $("#vlOutcomes").html("<center><div class='loader'></div></center>");
                        $("#ageGroups").html("<center><div class='loader'></div></center>");
                        $("#gender").html("<center><div class='loader'></div></center>");

                        $("#long_tracking").html("<center><div class='loader'></div></center>");

                        $("#tsttrends").load("<?php echo base_url('charts/sites/site_trends'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        $("#stoutcomes").load("<?php echo base_url('charts/sites/site_outcomes_chart'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        $("#vlOutcomes").load("<?php echo base_url('charts/sites/site_Vlotcomes'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        if (view_age_cat == 0) {
                            $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        } else {
                            $("#ageGroups").load("<?php echo base_url('charts/summaries/p_age'); ?>/" + from[1] + "/" + from[0] + "/" + null + "/" + null + "/" + site + null + "/" + to[1] + "/" + to[0]);
                        }
                        $("#gender").load("<?php echo base_url('charts/sites/site_gender'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        $("#justification").load("<?php echo base_url('charts/sites/site_justification'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                        $("#long_tracking").load("<?php echo base_url('charts/sites/get_patients'); ?>/" + from[1] + "/" + from[0] + "/" + site + "/" + to[1] + "/" + to[0]);
                    }
                });
            }

        });
        $('#justificationmodal').on('hidden.bs.modal', function () {
            location.reload();
        });
    });

    function date_filter(criteria, id)
    {
        // $("#partner").html("<div>Loading...</div>");
        if (criteria === "monthly") {
            year = null;
            month = id;
        } else {
            year = id;
            month = null;
        }

        var posting = $.post('<?php echo base_url(); ?>template/filter_date_data', {'year': year, 'month': month});
        var view_age_cat = localStorage.getItem("view_cat_age");
        // Put the results in a div
        posting.done(function (data) {

            obj = $.parseJSON(data);

            if (obj['month'] == "null" || obj['month'] == null) {
                obj['month'] = "";
            }
            $(".display_date").html("( " + obj['year'] + " " + obj['month'] + " )");
            $(".display_range").html("( " + obj['prev_year'] + " - " + obj['year'] + " )");

        });


        $.get("<?php echo base_url('sites/check_site_select'); ?>", function (site) {
            //Checking if site was previously selected and calling the relevant views
            site = $.parseJSON(site);
            // alert(site);

            // site = null;

            // console.log("site is " +site+" .");

            site = localStorage.getItem("site");
            console.log(site);
            localStorage.setItem("view_cat_age", 0);
            if (site == "NA") {
                $("#siteOutcomes").html("<center><div class='loader'></div></center>");
                $("#siteOutcomes").load("<?php echo base_url('charts/sites/site_outcomes'); ?>/" + year + "/" + month);

            } else {
                $("#tsttrends").html("<center><div class='loader'></div></center>");
                $("#stoutcomes").html("<center><div class='loader'></div></center>");
                $("#vlOutcomes").html("<center><div class='loader'></div></center>");
                $("#ageGroups").html("<center><div class='loader'></div></center>");
                $("#long_tracking").html("<center><div class='loader'></div></center>");
                $("#justification").html("<center><div class='loader'></div></center>");
                $("#gender").html("<center><div class='loader'></div></center>");

                $("#tsttrends").load("<?php echo base_url('charts/sites/site_trends'); ?>/" + year + "/" + month + "/" + site);
                $("#stoutcomes").load("<?php echo base_url('charts/sites/site_outcomes_chart'); ?>/" + year + "/" + month + "/" + site);
                $("#vlOutcomes").load("<?php echo base_url('charts/sites/site_Vlotcomes'); ?>/" + year + "/" + month + "/" + site);
                if (view_age_cat == 0) {
                    $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>/" + year + "/" + month + "/" + site);
                } else {
                    $("#ageGroups").load("<?php echo base_url('charts/summaries/p_age'); ?>/" + year + "/" + month + "/" + null + "/" + null + "/" + site);
                }
                $("#gender").load("<?php echo base_url('charts/sites/site_gender'); ?>/" + year + "/" + month + "/" + site);
                $("#justification").load("<?php echo base_url('charts/sites/site_justification'); ?>/" + year + "/" + month + "/" + site);
                $("#long_tracking").load("<?php echo base_url('charts/sites/get_patients'); ?>/" + year + "/" + month + "/" + site);

            }
        });

    }

    function justificationModal()
    {
        $('#justificationmodal').modal('show');
        $("#CatJust").load("<?php echo base_url('charts/sites/justificationbreakdown'); ?>");
    }

    function switch_source_site1() {
        var view = localStorage.getItem("view_site1");
        if (view == 0) {
            localStorage.setItem("view_site1", 1);
            $("#vl_county_pie_tests").hide();
            $("#vl_county_pie_pat").show();
            $("#switchButton_site").val('<?= lang('label.switch_all_tests') ?>');
            $(".vl_site_heading").html('<?= lang('title_tested_patients_by_site') ?> ');
            $('#vl_county_pie_pat').highcharts().reflow();
        } else {
            localStorage.setItem("view_site1", 0);
            $("#vl_county_pie_tests").show();
            $("#vl_county_pie_pat").hide();
            $("#switchButton_site").val('<?= lang('label.switch_routine_tests_trends') ?> ');
            $(".vl_site_heading").html('<?= lang('title_test_done_by_site') ?> ');
            $('#vl_county_pie_tests').highcharts().reflow();
        }
    }


    function switch_source_siteGender() {
        var view = localStorage.getItem("view_gender");
        if (view == 0) {
            localStorage.setItem("view_gender", 1);
            $("#gender_pie_tests").hide();
            $("#gender_pie_pat").show();
            $("#switchButton_site_gender").val('<?= lang('label.switch_all_tests') ?>');
            $(".vl_gender_heading").html('<?= lang('title_tested_patients_by_gender') ?> ');
            $('#gender_pie_pat').highcharts().reflow();
        } else {
            localStorage.setItem("view_gender", 0);
            $("#gender_pie_tests").show();
            $("#gender_pie_pat").hide();
            $("#switchButton_site_gender").val('<?= lang('label.switch_routine_tests_trends') ?> ');
            $(".vl_gender_heading").html('<?= lang('title_tested_done_by_gender') ?> ');
            $('#gender_pie_tests').highcharts().reflow();
        }
    }
    function switch_source_siteAge() {
        var view = localStorage.getItem("view_age");
        if (view == 0) {
            localStorage.setItem("view_age", 1);
            $("#ageGroups_pie_tests").hide();
            $("#ageGroups_pie_pat").show();
            $("#switchButton_site_age").val('<?= lang('label.switch_all_tests') ?>');
            $(".vl_age_heading").html('<?= lang('title_tested_patients_by_age') ?> ');
            $('#ageGroups_pie_pat').highcharts().reflow();
        } else {
            localStorage.setItem("view_age", 0);
            $("#ageGroups_pie_tests").show();
            $("#ageGroups_pie_pat").hide();
            $("#switchButton_site_age").val('<?= lang('label.switch_routine_tests_trends') ?> ');
            $(".vl_age_heading").html('<?= lang('title_tested_done_by_age') ?> ');
            $('#ageGroups_pie_tests').highcharts().reflow();
        }
    }
    function switch_source_vl_site() {
        var view = localStorage.getItem("view_site2");
        if (view == 0) {
            localStorage.setItem("view_site2", 1);
            $("#vl_outcomes_pie_tests").hide();
            $("#vl_outcomes_pie_pat").show();
            $("#switchButton_site_vl").val('<?= lang('label.switch_all_tests') ?>');
            $(".vl_site_vl_heading").html('<?= lang('title_tested_patients_by_county') ?> ');
            $('#vlOutcomes_pie_pat').highcharts().reflow();
        } else {
            localStorage.setItem("view_site2", 0);
            $("#vl_outcomes_pie_tests").show();
            $("#vl_outcomes_pie_pat").hide();
            $("#switchButton_site_vl").val('<?= lang('label.switch_routine_tests_trends') ?> ');
            $(".vl_site_vl_heading").html('<?= lang('title_test_done_by_county') ?> ');
            $('#vlOutcomes_pie_tests').highcharts().reflow();
        }
    }
    function switch_age_cat() {
        var view = localStorage.getItem("view_cat_age");
        if (view == 0) {
            localStorage.setItem("view_cat_age", 1);
            $("#ageGroups").load("<?php echo base_url('charts/summaries/p_age'); ?>");
            $(".btn_switch_age_group").html("<?= lang('classification.first') ?>");
        } else {
            localStorage.setItem("view_cat_age", 0);
            $("#ageGroups").load("<?php echo base_url('charts/sites/site_agegroups'); ?>");
            $(".btn_switch_age_group").html("<?= lang('classification.second') ?>");
        }
    }

</script>