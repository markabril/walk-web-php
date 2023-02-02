<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use DateTime;
use DatePeriod;
use DateInterval;
use Alert;
use Validator;
use Redirect;
class functions extends Controller {

	//public pages
	public function fly_home() {
		return view('home');
	}
	public function fly_team(){
		return view('team');
	}
	public function fly_partner(){
		return view('partner');
	}
	public function fly_aboutus(){
		return view('aboutus');
	}
	public function fly_faq(){
		return view('faq');
	}
	public function fly_contactus(){
		return view('contactus');
	}

	public function goto_terms(){
		return view('doc_termsandcond');
	}
	public function goto_privacypolicy(){
		return view('doc_privacypolicy');
	}

	public function fly_story(){
		return view('doc_storyindex');
	}

	public function fly_lore_c1(){
		return view('doc_story_c1');
	}
	//admin pages
	public function fly_admin(){
		return view('admin_login');
	}
	public function fly_admindashboard(){
		return view('admin_dashboard');
	}
	// functionality
	public function look_loginadmin(Request $req){
		// usrname
		// usrpaword

		$out = $this->send(["tag"=>"loginattempt",
				"paruname"=>$this->sdmenc($req["usrname"]),
				"parpassword"=>$this->sdmenc($req["usrpaword"])]);

		$isGood = "0";

		if(count($out) == 1){
			$isGood = "1";

			session(["user_features" =>$out[0]["feature_set"]]);
			session(["user_name" =>$out[0]["username"]]);
			session(["user_id" =>$out[0]["id"]]);

		}


		return $isGood;

	}







	public function sdmenc($data) {
		$keycode = openssl_digest(utf8_encode(PKEY),"sha512",true);
		$string = substr($keycode, 10,24);
		$utfData = utf8_encode($data);
		$encryptData = openssl_encrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA,'');
		$base64Data = base64_encode($encryptData);
		if($base64Data == ""){
			return $data;
		}else{
			return $base64Data;
		}
	}
	public function sdmdec($data){
		$keycode = openssl_digest(utf8_encode(PKEY),"sha512",true);
		$string = substr($keycode, 10,24);
		$utfData = base64_decode($data);
		$decryptData = openssl_decrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA,'');
		if ($decryptData == ""){
			return $data;
		}else{
			return $decryptData;
		}
	}

	public function send($contents,$free_result = false, $ws_link = ""){
	
		$ws_link = WEBSERVICE_URL;
	
		
			$contents["tag"] = $this->sdmenc($contents["tag"]);
		

		$client = new \GuzzleHttp\Client();
		$res = $client->request("POST",$ws_link,["form_params"=>$contents]);
		$out = $res->getBody()->getContents();
		if($free_result == false){
			return json_decode($this->sdmdec($out),true);
		}else{
			return $out;
		}
	}

       public function send_get($contents, $free_result = false, $ws_link = "") {
  
        $ws_link = WEBSERVICE_URL;

        $contents["tag"] = $this->sdmenc($contents["tag"]);
      

        $client = new \GuzzleHttp\Client();
        $res = $client->request("GET", $ws_link, ["query" => $contents]);
        $out = $res->getBody()->getContents();
        if ($free_result == false) {
        return json_decode($this->sdmdec($out),true);
        } else {
        return $out;
        }
    }


	public function DateExplainer($starting_time,$withformat = false) {
		$toreturn = "";
		$now = time(); // or your date as well
		$your_date = strtotime($starting_time);
		$datediff = $now - $your_date;
		$result = round($datediff / (60 * 60 * 24));
		$months = number_format((round($datediff / (60 * 60 * 24))) / 30);
		if ($result == 0) {
				$time1 = date('H:i', strtotime($starting_time));
				$time2 = date('H:i');
				$diff = abs(strtotime($time1) - strtotime($time2));
				$tmins = $diff / 60;
				$hours = floor($tmins / 60);
				$mins = $tmins % 60;
				if ($mins == '0' && $hours == '0') {
					if($withformat == true){
					$toreturn = "<span style='color: #025CC0 !important;'>Just now</span>";
					}else{
						$toreturn = "Just now";
					}
					
				} else if ($mins == '1' && $hours == '0') {
					if($withformat == true){
					$toreturn = "<span style='color: #025CC0 !important;'>a minute ago</span>";
					}else{
						$toreturn = "a minute ago";
					}
				} else {
					if ($hours == '0') {
						if($withformat == true){
					$toreturn = "<span style='color: #025CC0 !important;'>$mins mins ago</span>";
					}else{
						$toreturn = "$mins mins ago";
					}
					} else if ($hours == '1') {
						$toreturn = "an hour ago";
					} else {
						$toreturn = "$hours hours ago";
					}
				}
		} else {
				if ($result == '1') {
					$toreturn = "yesterday";
				} else if ($months > 12) {
					$yearcount = number_format(($months / 12), "0");
					if ($yearcount == "1") {
						$toreturn = "a year ago";
					} else if ($yearcount < 10) {
						$toreturn = $yearcount . " years ago";
					} else if ($yearcount > 10) {
						$decades = number_format(($yearcount / 10), 0);
						if ($decades == 1) {
								$toreturn = "a decade ago";
						} else {
								$toreturn = $decades . " decades ago";
						}
					}
				} else if ($result > 30) {
					if ($months == 1) {
						$toreturn = "last month";
					} else {
						$toreturn = $months . " months ago";
					}
				} else {
					$daysago = round($datediff / (60 * 60 * 24));
					if ($daysago > 7) {
						$weeks = number_format(($daysago / 7), 0);
						if ($weeks == 1) {
								$toreturn = "a week ago";
						} else {
								$toreturn = $weeks . " weeks ago";
						}
					} else {
						$toreturn = $daysago . " days ago";
					}
				}
		}
		return "<span title='" . date("F d, Y g:i a",strtotime($starting_time)) . "'>" . $toreturn ."</span>";
	}
	public function fire_addnewgolfcoursesubadmin(Request $req) {
		$out = $this->send(["tag"=>"add_new_subcourse",
			"gid"=>$this->sdmenc($req["gcourse_id"]),
			"cname"=>$this->sdmenc($req["cousename"]),
			"cdesc"=>$this->sdmenc($req["coursedesc"]),
			"chols"=>$this->sdmenc($req["courseholses"]),
			"cminp"=>$this->sdmenc($req["courseminplayer"]),
			"cmaxp"=>$this->sdmenc($req["coursemaxplayer"])],true);

		return json_encode($out);
	}
	public function uni_encoder($data) {
		return htmlentities(addslashes($data));
	}
	public function uni_decoder($data) {
		return html_entity_decode(htmlspecialchars(stripslashes($data)));
	}



}