<?php
defined("BASEPATH") or exit("No direct script access allowed!");

/**
* 
*/
class Live_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_data(){
		$sql = "CALL `proc_get_vl_lab_live_data`()";
		$sql2 = "CALL `proc_get_vl_live_data_totals`()";

		$result = $this->db->query($sql)->result_array();

		// return json_encode($result);
		$this->db->close();
		$totals = $this->db->query($sql2)->row();

		$data = null;

		foreach ($totals as $key => $value) {
			$data[$key] = (int) $value;
		}

		$data['machines'][0] = "Abbot";
		$data['machines'][1] = "Panther";
		$data['machines'][2] = "Roche";

		$data['minprocess'][0] = (int) $totals->abbottinprocess;
		$data['minprocess'][1] = (int) $totals->panthainprocess;
		$data['minprocess'][2] = (int) $totals->rocheinprocess;

		$data['mprocessed'][0] = (int) $totals->abbottprocessed;
		$data['mprocessed'][1] = (int) $totals->panthaprocessed;
		$data['mprocessed'][2] = (int) $totals->rocheprocessed;



		$i=0;


		foreach ($result as $key => $value) {
			$data['labs'][$i] = $value['name'];
			$data['enteredsamplesatsitea'][$i] = (int) $value['enteredsamplesatsite'];
			$data['enteredsamplesatlaba'][$i] = (int) $value['enteredsamplesatlab'];
			$data['receivedsamplesa'][$i] = (int) $value['receivedsamples'];
			$data['inqueuesamplesa'][$i] = (int) $value['inqueuesamples'];
			$data['inprocesssamplesa'][$i] = (int) $value['inprocesssamples'];
			$data['processedsamplesa'][$i] = (int) $value['processedsamples'];
			$data['pendingapprovala'][$i] = (int) $value['pendingapproval'];
			$data['dispatchedresultsa'][$i] = (int) $value['dispatchedresults'];
			$data['oldestinqueuesamplea'][$i] = (int) $value['oldestinqueuesample'];

			// foreach ($value as $key2 => $value2) {
			// 	$n = $value2 . 'a';
			// 	if($value2 == "name"){
			// 		$data['labs'][$i] = $value2;
			// 	}
			// 	else{
			// 		$data[$n][$i] = (int) $value2;
			// 	}
			// }

			$i++;

		}



		


		return json_encode($data);

	}



	

}