<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use DateTime;
use DatePeriod;
use DateInterval;
use Alert;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Intervention\Image\ImageManagerStatic as Image;
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

	public function fly_managehome(){
		return view('admin_managehome');
	}
	public function fly_hackathonwinners(){
		return view('admin_hackathon');
	}
	public function fly_mamagestory(){
		return view('admin_storychapters');
	}
	public function fly_managepublicmembers(){
		return view('admin_publicteam');
	}
	public function fly_managejobposting(){
		return view('admin_jobposting');
	}
	public function fly_manageheaderfoot(){
		return view('admin_headerfooter');
	}
	public function fly_managecontributors(){
		return view('admin_contributors');
	}
	public function fly_managelogs(){
		return view('admin_logs');
	}
	public function fly_logout()
	{
		Session::flush();
		return view('admin_dashboard');
	}
	public function fly_hackwinners(){
		return view("hackwinhistory");
	}
	// functionality

	public function look_homefeatured(){
		$out = $this->send_get(["tag"=>"homefeatured"]);
		if(count($out) != 0){
			$out[0]["img"] = asset('bottom_img/' . $out[0]["img"]);
		}
		return json_encode($out);
	}
	public function look_latestfeatured(){
		$out = $this->send_get(["tag"=>"latestfeatured"]);
		if(count($out) != 0){
			$out[0]["img"] = asset('bottom_img/' . $out[0]["img"]);
		}
		return json_encode($out);
	}
	public function look_gethackathonwinshistory(){
		$out = $this->send_get(["tag"=>"gethackathonwinshistory"]);

		$toecho = "";
		for($i = 0; $i < count($out);$i++){


			if ($i == 0){
				$toecho .= "<h6 class='littext'>Champions of the Hour</h6>"	;
			}else if($i == 1){

				$toecho .= "<h6 class='littext'>Former Champions</h6>"	;
			}
			$cocoa = ($i == 0 ? asset('photos/poster/award.jpg') : "")  ;

			$toecho .= '
			
			<div class="card ' . ($i == 0 ? "card-simple" : "card-simple") . ' mb-3" style="' . ($i == 0 ? "text-shadow: 0px 2px 10px black;" : "") . '">
        
			<div class="card-body" style="background: url(' . "'" .  $cocoa . "'" . '); background-size:cover; background-repeat:no-repeat; background-position: right;s+++++++++++++++++">
				<div class="row">
	
					<div class="col-sm-12">
						<h5>' . date("F d, Y",strtotime($out[$i]["hackdate"])) . '</h5>
					</div>
	
					<div class="col-sm-4">
					<h6>Philippines</h6>
						<ul>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_ne.png') .'" style="width: 30px;"> '  . $out[$i]["ph_ne"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_fe.png') .'" style="width: 30px;"> '  . $out[$i]["ph_fe"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_peli.png') .'" style="width: 30px;"> '  . $out[$i]["ph_peli"] . '</li>
						</ul>
					</div>
					<div class="col-sm-4">
					<h6>International</h6>
						<ul>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_ne.png') .'" style="width: 30px;"> '  . $out[$i]["int_ne"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_fe.png') .'" style="width: 30px;"> '  . $out[$i]["int_fe"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_peli.png') .'" style="width: 30px;"> '  . $out[$i]["int_peli"] . '</li>
						</ul>
					</div>
	
					<div class="col-sm-12">
					' . $out[$i]["hackmsg"] . '
					</div>
				</div>
			</div>
	
		 </div>

		 

			'; 
		}

		return $toecho;
	}
	public function look_homecoverphoto(){
		$out = $this->send_get(["tag"=>"homecoverphoto"]);

		if(count($out) != 0){
			$out[0]["img"] = asset('home_cover_photo/' . $out[0]["img"]);
		}

		return json_encode($out);
	}
	public function look_homehackathonwinners(){
		$out = $this->send_get(["tag"=>"homehackathonwinners"]);

		if(count($out) != 0){
			$out[0]["hackdate"] =  date("F d, Y",strtotime($out[0]["hackdate"]));
		}
		
		return json_encode($out);
	}
	public function look_homefeatures(){
		$out = $this->send_get(["tag"=>"homefeatures"]);
		$toecho = "";

		for($i = 0; $i < count($out);$i++){
			$toecho .= "
			<div class='col-md-6'>
			<img src='" . asset("feature_images/" . $out[$i]["featureimg"]) . "' loading='lazy' class='img_screenshots'>
		</div>
		<div class='col-md-6'>
			<h5 class='littext'>" . $out[$i]["feattitle"] . "</h5>
				<div class='separator-blue-left-thin mb-3'></div>
			<p class='readable'>" . $out[$i]["featuredesc"] . "</p>
		</div>
<div class='col-sm-12'>
	<br>
		<br>
</div>
			";
		}


		return  $toecho;
	}
	public function look_homebottompanel(){
		$out = $this->send_get(["tag"=>"homebottompanel"]);

		for($i = 0; $i < count($out); $i++){
			$out[$i]["img"] =  asset('bottom_img/' . $out[$i]["img"]);
		}
		return json_encode($out);
	}


	function look_getjobs(){
		$out = $this->send_get(["tag"=>"getjob"]);
		$toecho = "";

		for($i =0; $i < count($out);$i++){
			$toecho .= "<tr>
				<td>" . $out[$i]["jobtitle"] ."</td>
				<td>" . $out[$i]["shortdesc"] ."</td>
				<td>" . $out[$i]["fulldesc"] ."</td>
				<td>" . ( $out[$i]["status"] == 0  ?
				"<button class='btn text-success btn-light' onclick='changeStatus(this)' data-status='1' data-dataid='" . $out[$i]["id"] . "' >Publish</button>" :
				"<button class='btn text-danger btn-light' onclick='changeStatus(this)' data-status='0' data-dataid='" . $out[$i]["id"] . "' >Unpublish</button>" ) ."</td>
				<td><button class='btn btn-light text-danger' onclick='openDeleteJob(this)' data-dataid='" . $out[$i]["id"] . "'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
			</tr>";
		}
		return $toecho;
	}
	function fire_addjob(Request $req){

	return $this->send(["tag"=>"addjob",
		"jobtitle"=>$this->sdmenc($req["jobtitle"]),
		"shortdesc"=> $this->sdmenc($req["shortdesc"]),
		"fulldesc"=> $this->sdmenc($req["fulldesc"])
	],true);

	}
	function fire_deletejob(Request $req){
		return $this->send_get(["tag"=>"deletejob","currentId"=>$this->sdmenc($req["currentId"])],true);
	}
	function fire_updatejobstatus(Request $req){
		return $this->send(["tag"=>"updatejobstatus"
	,"currentId"=>$this->sdmenc($req["currentId"])
	,"status"=>$this->sdmenc($req["status"])],true);
	}
	



	function look_getteam(){
		$out = $this->send_get(["tag"=>"getteam"]);
		$toecho = "";

		for($i =0; $i < count($out);$i++){
			$toecho .= "<tr>

				<td><img src='" . asset("team_photos/" . $out[$i]["imgpath"]) . "' loading='lazy' style='max-width:50px; max-height: 50px;'>" ."</td>
				<td><p class='mb-0'>" . $out[$i]["fullname"] ."<br><small class=''>" . $out[$i]["position"]  . "</small></p></td>
				<td>" . $out[$i]["order_no"] ."</td>
				<td><button class='btn btn-light text-danger' onclick='openDeleteTeam(this)' data-dataid='" . $out[$i]["id"] . "'><i class='fa-sharp fa-solid fa-trash'></i></button></td>

			</tr>";
		}
		return $toecho;
	}
	function fire_addteam(Request $req){

		$validator = Validator::make($req->all(), [
            'facepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
if ($result == ""){

			$quality = 100;
			if ($req["reduce"] == "1"){
				$quality = 35;
			}


	$image = $req->file('facepic');
	$image_compressed = Image::make($image)->encode('jpg', $quality);
	$fname = $image_compressed->basename . time() . ".jpg";
	$image_compressed->save(public_path('team_photos/').$fname, $quality);

	return $this->send(["tag"=>"addteam",
	"facepic"=>$this->sdmenc($fname),
	"fullname"=>$this->sdmenc($req["fullname"]),
	"positionname"=> $this->sdmenc($req["positionname"]),
	"ordernumber"=> $this->sdmenc($req["ordernumber"])
],true);
}else{
	return "error";
}

	}
	function fire_deleteteam(Request $req){
		return $this->send_get(["tag"=>"deleteteam","currentId"=>$this->sdmenc($req["currentId"])],true);
	}

	function fix_character_encoding($string) {
		return iconv("UTF-8", "ISO-8859-1//TRANSLIT", $string);
	}
	function look_chapterfull(Request $req){
		$out =  $this->send_get(["tag"=>"chapterfull","currentId"=>$this->sdmenc($req["currentId"])]);

		$out[0]["story"] = $this->fix_character_encoding($out[0]["story"] );
		$out[0]["coverimg"] = asset('lore_images/' . $out[0]["coverimg"]);
		return json_encode(	$out );
	}
	function fire_deletechapter(Request $req){
		return $this->send_get(["tag"=>"deletechapter","currentId"=>$this->sdmenc($req["currentId"])],true);
	}
	function look_addedstories(){
		$out = $this->send_get([
			"tag"=>"addedstories"
		]);
		$toecho = "";

		for($i = 0;$i < count($out);$i++){
	
			$toecho .= "<tr>
				<td>" . $out[$i]["chapter"] . "</td>
				<td>" . $out[$i]["title"] . "</td>
				<td>" . $out[$i]["story"] . "... " . "<a data-toggle='modal' data-target='#mdl_viewchapter' href='#' onclick='loadChapterFull(this)' data-dataid='" . $out[$i]["id"] . "'>read all</a>" . "</td>
				<td>" . $out[$i]["publishdate"] . "</td>
				<td><button onclick='openDeleteChapter(this)' data-toggle='modal' data-target='#mdl_deletechapter' data-dataid='" . $out[$i]["id"] . "' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
			</tr>";
		}
		return  $this->fix_character_encoding($toecho );
	}
	function fire_newstordata(Request $req){

		$validator = Validator::make($req->all(), [
            'vl_coverimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
if ($result == ""){

			$quality = 100;
			if ($req["reduce"] == "1"){
				$quality = 35;
			}


	$image = $req->file('vl_coverimg');
	$image_compressed = Image::make($image)->encode('jpg', $quality);
	$fname = $image_compressed->basename . time() . ".jpg";
	$image_compressed->save(public_path('lore_images/').$fname, $quality);

	return $this->send(["tag"=>"newstordata",
	"vl_coverimg"=>$this->sdmenc($fname),
	"vl_chapnum"=>$this->sdmenc($req["vl_chapnum"]),
	"vl_chaptitle"=> $this->sdmenc($req["vl_chaptitle"]),
	"vl_chapstory"=> $this->sdmenc($req["vl_chapstory"]),
	"vl_publishdt"=> $this->sdmenc($req["vl_publishdt"])
]);
}else{
	return "error";
}



	}
	function fire_deletehackwin(Request $req){
		return $this->send_get(["tag"=>"deletehackwin", "currentId"=>$this->sdmenc($req["currentId"])],true);
	}
	function fire_addhackwin(Request $req){
		return $this->send(["tag"=>"addnewhackwin",
		"vl_hackdate"=>$this->sdmenc($req["vl_hackdate"]),
		"vl_hackmessage"=>$this->sdmenc($req["vl_hackmessage"]),
		"vl_ph_ne"=>$this->sdmenc($req["vl_ph_ne"]),
		"vl_ph_fe"=>$this->sdmenc($req["vl_ph_fe"]),
		"vl_ph_peli"=>$this->sdmenc($req["vl_ph_peli"]),
		"vl_int_ne"=>$this->sdmenc($req["vl_int_ne"]),
		"vl_int_fe"=>$this->sdmenc($req["vl_int_fe"]),
		"vl_int_peli"=>$this->sdmenc($req["vl_int_peli"])],true);
	}
	function look_gethackwins(){
		$out = $this->send_get(["tag"=>"gethackwins"]);

		$toecho = "";
		for($i = 0; $i < count($out);$i++){
			$toecho .= "
				<tr>
					<td>" . date("F d, Y",strtotime($out[$i]["hackdate"])) . "</td>
					<td><ul><li>" . $out[$i]["ph_ne"] . "</li><li>" . $out[$i]["ph_fe"] . "</li><li>" . $out[$i]["ph_peli"] . "</li></ul></td>
					<td><ul><li>" . $out[$i]["int_ne"] . "</li><li>" . $out[$i]["int_fe"] . "</li><li>" . $out[$i]["int_peli"] . "</li></ul></td>
					<td>" . $out[$i]["hackmsg"]. "</td>
					<td><button class='btn btn-light text-danger' onclick='openDelete(this)' data-dtid='" . $out[$i]["id"] . "'><i class='fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return  $this->fix_character_encoding($toecho );
	}
	function look_getbottomsingleinfo(Request $req){
		$out =  $this->send_get(["tag"=>"getbottomsingleinfo","conttype"=>$this->sdmenc($req["conttype"])]);
		if(count($out) != 0){
			$out[0]["img"] = asset("bottom_img/" . $out[0]["img"]);
		}
		return json_encode($out);
	}
	function look_getbottominfopnl(){
		$out = $this->send_get(["tag"=>"getbottompanelinfos"],true);
		return $out;
	}
	function fire_updateabottompnl(Request $req){

		$validator = Validator::make($req->all(), [
            'primg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
		if ($result == "") {

			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('primg');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('bottom_img/') . $fname, $quality);

			return $this->send([
				"tag" => "updateabottompnl",
				"title" => $this->sdmenc($req["title"]),
				"desc" => $this->sdmenc($req["desc"]),
				"promimg" => $this->sdmenc($fname),
				"btnname" => $this->sdmenc($req["btnname"]),
				"link" => $this->sdmenc($req["btnlink"]),
				"type"=>$this->sdmenc($req["conttype"])
			],true);

		}else{

			return $this->send([
				"tag" => "updateabottompnl",
				"title" => $this->sdmenc($req["title"]),
				"desc" => $this->sdmenc($req["desc"]),
				"promimg" => $this->sdmenc(""),
				"btnname" => $this->sdmenc($req["btnname"]),
				"link" => $this->sdmenc($req["btnlink"]),
				"type"=>$this->sdmenc($req["conttype"])
			],true);
		}
	}
	function fire_deletefeature(Request $req){
		return $this->send_get(["tag"=>"deleteafeature","featureid"=>$this->sdmenc($req["featid"])],true);
	}
	public function look_addedfeatures(){
		$out = $this->send_get(["tag"=>"getalladdedfeatures"]);
		$toecho = "";

		for($i = 0; $i < count($out);$i++){
			$toecho .= "
				<tr>
					<td><img loading='lazy' src='" . asset("feature_images/" . $out[$i]["featureimg"]) . "' style='width: 100px;'></td>
					<td>" . "<p class='mb-0'><strong>" . $out[$i]["feattitle"] . "</strong></p>" . "<p>" . $out[$i]["featuredesc"] . "</p>" .  "</td>
					<td>" . "<button class='btn btn-light text-danger'
					data-featureid='" . $out[$i]["id"] . "'
					onclick='openDeleteFeature(this)'
					
					><i class='fa-solid fa-trash'></i></button>
					</td>
				</tr>
			";
		}
		return  $this->fix_character_encoding($toecho );
	}
	public function fire_addnefeature(Request $req){


		$validator = Validator::make($req->all(), [
            'promimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
if ($result == ""){

			$quality = 100;
			if ($req["reduce"] == "1"){
				$quality = 35;
			}


	$image = $req->file('promimg');
	$image_compressed = Image::make($image)->encode('jpg', $quality);
	$fname = $image_compressed->basename . time() . ".jpg";
	$image_compressed->save(public_path('feature_images/').$fname, $quality);


			$out = $this->send([
				"tag" => "addnewfeaturenow",
				"feattitle" => $this->sdmenc($req["featname"]),
				"featdesc" => $this->sdmenc($req["featdesc"]),
				"featimg" => $this->sdmenc($fname)
			]);

			return json_encode($req["reduce"]);
		}
	}
	public function fire_latestCoverPhoto(){
		$out = $this->send_get(["tag"=>"getlatestcover"]);
		if(count($out) != 0){
			$out[0]["img"] = asset('home_cover_photo/' . $out[0]["img"]);
		}
		return json_encode($out);
	}
	public function fire_uploadhomecover(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
if ($result == ""){




	$quality = 100;
	if ($request["reduce"] == "1"){
		$quality = 35;
	}


$image = $request->file('image');
$image_compressed = Image::make($image)->encode('jpg', $quality);
$fname = $image_compressed->basename . time() . ".jpg";
$image_compressed->save(public_path('home_cover_photo/').$fname, $quality);


		$out = 	$this->send([
				"tag" => "addhomefeature",
				"conttype" => $this->sdmenc("cover"),
				"img" => $this->sdmenc($fname),
				"title" => $this->sdmenc(""),
				"desc" => $this->sdmenc(""),
				"link" => $this->sdmenc(""),
				"btnhome" => $this->sdmenc("")
			],true);

	$result = 'Image uploaded successfully. File path: '.$fname . "---" . $out;

	
}
return $result;
	}
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
        $res = $client->request("GET", $ws_link, ["query" => $contents,  "headers" => [
            'Content-Type' => 'text/html; charset=utf-8'
        ]]);
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