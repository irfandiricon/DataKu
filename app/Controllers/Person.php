<?php namespace App\Controllers;

class Person extends BaseController
{
	public function getDataByBirthDate(){
		$birthDate = isset($_POST['birthDate']) ? $_POST['birthDate']:"";
		$data[] = array("id"=>1, "name"=>"John Doe", "birthDate"=>"2000-09-30");
		$data[] = array("id"=>2, "name"=>"Mary Rose", "birthDate"=>"2000-09-30");
		$data[] = array("id"=>3, "name"=>"Edward", "birthDate"=>"2000-09-30");

		$birth = array();
		foreach($data as $row){
			$birth[] = $row['birthDate'];
		}

		if(in_array($birthDate, $birth)){
			$Json['Status'] = 200;
			$Json['Message'] = "Success";
			$Json['List'] = $data;
		}else{
			$Json['Status'] = 400;
			$Json['Message'] = "Error";
		}

		die(json_encode($Json));
	}
}