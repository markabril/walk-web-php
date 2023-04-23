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
	public function fly_news(){
		return view('news');
	}
	public function fly_newscontent(){
		return view('news_content');
	}
	public function fly_classoverview(){
		return view('classoverview');
	}
	public function fly_updateoverview(){
		return view("update_content");
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
	public function fly_managenews(){
		return view('admin_news');
	}
	public function fly_logout()
	{
		Session::flush();
		return view('admin_dashboard');
	}
	public function fly_hackwinners(){
		return view("hackwinhistory");
	}
	public function look_accountsetup(){
		return view("admin_accountsetup");
	}
	public function fly_manageaccount(){
		return view("admin_manageaccount");
	}

	
	// functionality
	public function look_getmyinfobasic(Request $req){
	return $this->send_get(["tag"=>"getmyinfobasic","user_id"=>$this->sdmenc(session("user_id"))],true);
	}
	public function fire_changepassword(Request $req){
		$out = $this->send(["tag"=>"changepassword",
							"oridignid"=> $this->sdmenc(session("user_id")),
							"inp_oldpassword"=> $this->sdmenc($req["inp_oldpassword"]),
							"inp_inpnewpassword"=> $this->sdmenc($req["inp_inpnewpassword"])],true);
							return $out ;
	}
	public function fire_changerole(Request $req){
		$out = $this->send(["tag"=>"changerole",
							"oridignid"=> $this->sdmenc(session("user_id")),
							"inp_rolenew"=>$this->sdmenc($req["inp_rolenew"])],true);
		return $out;
	}
	public function fire_changeusername(Request $req){
		$out = $this->send(["tag"=>"changeusername",
							"oridignid"=> $this->sdmenc(session("user_id")),
							"inp_username"=>$this->sdmenc($req["inp_username"])],true);
	}
	public function fire_changeprofilepic(Request $req){
		
		$validator = Validator::make($req->all(), [
			'inp_profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: '.implode(', ', $validator->errors()->all());
		}
		if ($result == ""){

			$quality = 20;
			$imgformat = ".jpg";
	
			$image = $req->file('inp_profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . $imgformat;
			$image_compressed->save(public_path('admin_profiles/').$fname, $quality);

			$out = $this->send(["tag"=>"changeprofilepic",
			"oridignid"=> $this->sdmenc(session("user_id")),
			"profilepic"=>$this->sdmenc($fname)],true);

			if(str_contains($out , "true")){

			session(["user_profile" =>asset("admin_profiles/") . "/" . $fname ]);


			}
			return $out;

	}else{
		return "error";
	}




	}
	public function look_fulljobinfo(Request $req){
			$out =  $this->send_get(["tag"=>"fulljobinfo","itemid"=>$this->sdmenc($req["itemid"])]);

			for($i = 0; $i < count($out);$i++){
				$out[$i]["jobtitle"] = $this->fix_character_encoding($out[$i]["jobtitle"]);
				$out[$i]["fulldesc"] = $this->fix_character_encoding($out[$i]["fulldesc"]);
			}

			return json_encode($out );
	}
	public function look_publicmembers(){
		$out = $this->send_get(["tag"=>"getpublicmembers"]);

		$toecho = "";
		$topPeople = 2;
		for($i = 0; $i < count($out);$i++){



			$img = asset("team_photos/") . "/" .  $out[$i]["imgpath"];


			if($i < $topPeople){
				$toecho .= "
				<div class='col-sm-6 mb-5'>
	
				<center>
				<img style='border-radius: 999px; width: 212px;' class='mb-3' src='" . $img . "'>
				<h4>" . $out[$i]["fullname"] . "</h4>
				<p>" . $out[$i]["position"] . "</p>
				</center>
	
	
				</div>";
			}else{
				$toecho .= "
				<div class='col-sm-4'>
	
				<center>
				<img style='border-radius: 999px; width: 180px;' class='mb-3' src='" . $img . "'>
				<h4>" . $out[$i]["fullname"] . "</h4>
				<p>" . $out[$i]["position"] . "</p>
				</center>
	
	
				</div>";
			}
			
		}

		return 	$toecho ;
	}
	public function look_publishedjobposting(){
		$out = $this->send_get(["tag"=>"publishedjobposting"]);

		$toecho = "";

		for($i = 0; $i < count($out);$i++){
			$toecho .= '

			<div class="col-sm-12">
			<div class="card card-simple readable text-light mb-3">
				<div class="card-body">
					<h5>' . $this->fix_character_encoding($out[$i]["jobtitle"]) . '</h5>
					<pre class="text-light readable">' . $this->fix_character_encoding($out[$i]["shortdesc"]) . '</pre>
					<div class="separator-blue-left-thin mb-3 mt-3"></div>
					<button class="btn btn-primary" data-toggle="modal" onclick="getFullJobInformation(this)" data-itemid="' . $out[$i]["id"] . '" data-target="#mdl_fulljobinformation">Apply Now <i class="fas fa-chevron-right"></i></button>
				</div>
			</div>
		</div>

			';
		}

		return  	$toecho;
	}
	public function look_allcontributors(Request $req){
		$out = $this->send_get(["tag"=>"allcontributors", "managerid"=> $this->sdmenc(session("user_id") )]);
		$toecho = "";
		for($i = 0; $i < count($out);$i++){
			$toecho .= "
				<tr>
					<td>" . "<div style='background-image: url(" . 
					asset("admin_profiles/") . "/" . $out[$i]["profilepic"] .");
				   height: 100px;
				   width: 100px;
				   background-size:cover;
				   display:inline-block;
				   background-repeat: no-repeat;
				   border-radius: 100px;
					'></div> " . "</td>
					<td>" . $out[$i]["username"] . "</td>
					<td>" . $out[$i]["description"] . "</td>
					<td>" . date("F d, Y", strtotime($out[$i]["datecreated"])) . "</td>
					<td><button class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return $toecho;
	}
	public function fire_addcontributor(Request $req){
		
		$validator = Validator::make($req->all(), [
			'inp_profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: '.implode(', ', $validator->errors()->all());
		}
		if ($result == ""){

			$quality = 20;
			$imgformat = ".jpg";
	
			$image = $req->file('inp_profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . $imgformat;
			$image_compressed->save(public_path('admin_profiles/').$fname, $quality);



			$out = $this->send(["tag"=>"addcontributor",
			"inp_profilepic"=>$this->sdmenc($fname ),
			"inp_name"=>$this->sdmenc($req["inp_name"]),
			"inp_description"=>$this->sdmenc($req["inp_description"]),
			"inp_featureset"=>$this->sdmenc($req["inp_featureset"]),
			"inp_password"=>$this->sdmenc($req["inp_password"])
			],true);


			return $out;

	}else{
		return "error";
	}



	}
	public function look_publicupdatedetailsfull(Request $req){
		$out = $this->send_get(["tag"=>"publicupdatedetailsful","updateno"=>$this->sdmenc($req["updateno"])]);


		for($i = 0; $i < count($out);$i++){
			if($i == 0){
				$out[$i]["coverphoto"] = asset("update_covers/") . "/" . $out[$i]["coverphoto"];
				$out[0]["releasedate"] = date("F d, Y", strtotime(	$out[0]["releasedate"] ));
			}

				if($out[$i]["item_title"] && $out[$i]["item_title"] != null && $out[$i]["item_title"] != ""){
					$out[$i]["item_cover"] = asset("update_items_images/") . "/" . $out[$i]["item_cover"];
				}

			
		}
		// $out[0]["releasedate"] = date("F d, Y", strtotime(	$out[0]["releasedate"] ));
		return json_encode($out);
	}
	public function fire_deleteupdaterec(Request $req){
		return $this->send(["tag"=>"deleteupdaterec","current_updateid"=>$this->sdmenc($req["current_updateid"])]);
	}
	public function fire_deletefeatureitem(Request $req){
		return $this->send(["tag"=>"deletefeatureitem","current_itemId"=>$this->sdmenc($req["current_itemId"])]);
	}
	public function look_updatebasicinfo(Request $req){
		$out =  $this->send_get(["tag"=>"updatebasicinfo","itemId"=>$this->sdmenc($req["itemId"])]);
		$out[0]["coverphoto"] = asset("update_covers/") . "/" . $out[0]["coverphoto"];
		$out[0]["releasedate"] = date("F d, Y", strtotime(	$out[0]["releasedate"] ));
		return json_encode($out);
	}
	public function look_publicupdates(){
		$out = $this->send_get(["tag"=>"publicupdates"]);
		$toecho = "";
				$colonum = "12";

		for($i = 0; $i < count($out);$i++){


			if($colonum  == "6"){
				$toecho .= "
				<div class='col-sm-" . $colonum  . "'>
					<a target='_blank' href='" . route("goto_updateoverview") . "?updateno=" . $out[$i]["id"] .  "'>
					<div class='card card-simple mb-2' style='border-left: 1px solid  #5FBACE !important;'>
					<div class='card-body'>

					<p class='mb-0 text-muted'>" . date("F d, y g:i a",strtotime( $out[$i]["dateposted"])) . "</p>
					<p class='mb-0 text-light'><strong>" . $out[$i]["version"] . "</strong> — " . $out[$i]["headline"] . "</p>
					
					</div>
					</div>
					</a>
				</div>
				<div class='col-sm-" . $colonum  . "'>
				</div>
			";
			}else{
				$toecho .= "
				<div class='col-sm-" . $colonum  . "'>
				<div class='card card-simple mb-5' style='border-left: 3px solid   #5FBACE !important;'>
					<div class='card-body'>
					<p class='mb-0 float-right'>" . date("F d, y g:i a",strtotime( $out[$i]["dateposted"])) . "</p>
						<h2>" . $out[$i]["version"] . "</h2>
						<h5>" . $out[$i]["headline"] . "</h5>
						<pre class='text-light readable'>" . $out[$i]["details"] . "</pre>
						<a target='_blank' href='" . route("goto_updateoverview") . "?updateno=" . $out[$i]["id"] . "' class='mt-3 btn btn-primary'>EXPLORE</a>
					</div>
					</div>
				</div>";
			}
			


			$colonum = "6";
		}

		return $toecho;
	}
	public function look_updateitems(Request $req){
		$out = $this->send_get(["tag"=>"updateitems",
								"current_updateid" => $this->sdmenc($req["current_updateid"])
							]);
							$toecho = "";


							for($i = 0; $i < count($out);$i++){
								$toecho .= "
									<tr>
										<td>" . "<img style='width: 100px;' src='" . asset("update_items_images/" . $out[$i]["item_cover"]) . "'>"."</td>
										<td>" . $out[$i]["item_title"] ."</td>
										<td>" . $out[$i]["item_desc"] ."</td>
										<td><button onclick='openDeleteFeatureItemConfirmation(this)' data-itemid='" . $out[$i]["id"] . "' class='btn btn-sm btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
									</tr>
								";
							}
		return $toecho;
	}
	public function fire_newupdateitem(Request $req){
		


		
						$validator = Validator::make($req->all(), [
							'item_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
						]);
						
						$result = "";
						if ($validator->fails()) {
							$result = 'Validation failed: '.implode(', ', $validator->errors()->all());
						}
						if ($result == ""){
				
							$quality = 100;
							$imgformat = ".png";
							if ($req["ffreduce"] == "1"){
								$quality = 35;
								$imgformat = ".jpg";
							}
				
							$image = $req->file('item_cover');
							$image_compressed = Image::make($image)->encode('jpg', $quality);
							$fname = $image_compressed->basename . time() . $imgformat;
							$image_compressed->save(public_path('update_items_images/').$fname, $quality);
				
				
				
							$out = $this->send(["tag"=>"newupdateitem",
							"item_id"=>$this->sdmenc($req["item_id"]),
							"item_cover"=>$this->sdmenc($fname),
							"item_title"=>$this->sdmenc($req["item_title"]),

							"item_description"=>$this->sdmenc($req["item_description"])
						],true);
							return $out;
				
					}else{
						return "error";
					}



	}
	public function look_updatesfromadmin(){
		$out = $this->send_get(["tag"=>"updatesfromadmin"]);
		$toecho = "";

		for($i =0; $i < count($out);$i++){
			$toecho  .= "
				<tr>
					<td>" . date("F d, y",strtotime($out[$i]["dateposted"]))  . "</td>
					<td><a href='#' onclick='editUpdateContents(this)' data-itemid='" . $out[$i]["id"] . "'>" . $out[$i]["headline"] . "</td>
					<td>" . $out[$i]["version"]  . "</td>
					<td>" . date("F d, y",strtotime($out[$i]["releasedate"]))  . "</td>
					<td><button data-recordid='" . $out[$i]["id"] . "' onclick='openDeleteUpdateRecordConfirmation(this)' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></button></td>
				</tr>
			";
		}
		return 	$toecho;
	}
	public function fire_addnewupdatesetup(Request $req){

		$validator = Validator::make($req->all(), [
            'updatecoverfile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
		if ($result == ""){

			$quality = 100;
			if ($req["ffreduce"] == "1"){
				$quality = 35;
			}

			$image = $req->file('updatecoverfile');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('update_covers/').$fname, $quality);



			$out = $this->send([
				"tag"=>"addnewupdatesetup",
				"updatecoverfile"=>$this->sdmenc($fname),
				"updatetitle"=>$this->sdmenc($req["updatetitle"]),
				"updatedescription"=>$this->sdmenc($req["updatedescription"]),
				"releasedate"=>$this->sdmenc($req["releasedate"]),
				"versionnumber"=>$this->sdmenc($req["versionnumber"])
			],true);
	
			return $out;

	}else{
		return "error";
	}
	}
	public function look_latestnews(){
		$out = $this->send_get(["tag"=>"showlatestnews"]);
		$toecho = "";
		for($i =0; $i < count($out);$i++){
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<div class='col-sm-12'>
			
			<a href='" . route("goto_newscontent") . "?contentno=" .$out[$i]["id"] . "' class='text-light'>
				
			<img class='p-0 mb-3' src='" . asset("news/" . $out[$i]["coverphoto"]) . "' style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
				<small class='mt-1 mb-0 text-muted'>" . strtoupper(date("F d, Y",strtotime($out[$i]["dateposted"])))  . "</small>
				<p class='mt-0'>" . $out[$i]["headline"] . "</p>

			</a>


			</div>";
		}

		return $toecho;
	}


	public function fire_deletenews(Request $req){
		return $this->send(["tag"=>"deletenews","currentnewsnumber"=>$this->sdmenc($req["currentnewsnumber"])],true);
	}
	public function look_singlenewspublic(Request $req){
		$out = $this->send_get(["tag"=>"singlenewspublic","contentno"=>$this->sdmenc($req["contentno"])]);

		if(count($out) != 0){
			$out[0]["coverphoto"] =  asset("news/" . $out[0]["coverphoto"]);
			$out[0]["headline"] = $this->fix_character_encoding($out[0]["headline"]);
			$out[0]["dateposted"] =strtoupper( date("F d, Y",strtotime($out[0]["dateposted"])));
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
		}
		return json_encode($out);
	}
	public function look_publicnews(){
		$out = $this->send_get(["tag"=>"publicnews"]);
		$toecho = "";
		for($i =0; $i < count($out);$i++){
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<div class='col-sm-4'>
			
			<a href='" . route("goto_newscontent") . "?contentno=" .$out[$i]["id"] . "' class='text-light'>
				
			<img class='p-0 mt-3' src='" . asset("news/" . $out[$i]["coverphoto"]) . "' style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
				<p class='mt-3 mb-0 text-muted'>" . strtoupper(date("F d, Y",strtotime($out[$i]["dateposted"])))  . "</p>
				<h4 class='mt-0'>" . $out[$i]["headline"] . "</h4>

			</a>


			</div>";
		}

		return $toecho;
	}
	public function look_getallnews(){
		$out = $this->send_get(["tag"=>"getallnews"]);
		$toecho = "";
		for($i =0; $i < count($out);$i++){
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<tr>
				<td>" . date("F d, y", strtotime($out[$i]["dateposted"])) . "</td>
				<td><a href='" . route("goto_newscontent") . "?contentno=" .$out[$i]["id"] . "' target='_blank'>" . $out[$i]["headline"] . "</a></td>
				<td><button onclick='openDeleteNews(this)' data-newsno='" . $out[$i]["id"]  . "' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></button></td>
			</tr>";
		}
		return $toecho;
	}
	public function fire_publishnews(Request $req){

		$validator = Validator::make($req->all(), [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
		if ($result == ""){

			$quality = 100;
			if ($req["ffreduce"] == "1"){
				$quality = 35;
			}

			$image = $req->file('cover');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('news/').$fname, $quality);

			$out = $this->send(["tag"=>"publishnews",
			"newsheadline"=>$this->sdmenc($req["newsheadline"]),
			"coverphoto"=>$this->sdmenc($fname),
			"description"=>$this->sdmenc($req["description"]),
			],true);

			return 	$out;
	}else{
		return "error";
	}


	}
	public function fire_createaccount(Request $req){
		$validator = Validator::make($req->all(), [
            'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
        ]);
		$result = "";
        if ($validator->fails()) {
            $result = 'Validation failed: '.implode(', ', $validator->errors()->all());
        }
		if ($result == "") {
			$quality = 35;
			$image = $req->file('profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('admin_profiles/') . $fname, $quality);

			$out = $this->send(["tag"=>"createaccount",
							"username"=>$this->sdmenc($req["username"]),
							"pass"=>$this->sdmenc($req["pass"]),
							"roles"=>$this->sdmenc($req["roles"]),
							"profilepic"=>$this->sdmenc($fname)]
							,true);

							return $out;
		}else{
				return "error";
			
		}
	}
	public function look_getallchapterslistminimal(Request $req){
		$out = $this->send_get(["tag"=>"getallpublishedchapters"]);

		$toecho = "";

		for($i=0; $i < count($out);$i++){

			if ( $req["chap"] == $out[$i]["chapter"]){
				$toecho .= "
			
				<div class='col-md-6 mb-3'>
				<a class='chapter-link text-light' href='" . route('goto_lore_c1') . "?chapter=" . $out[$i]["chapter"] . "'>
					<div class='card card-primary '  style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 10px rgba(0,0,0,0.2) !important;'>
						<div class='card-body p-2 shadowtext' >
							<p class='m-0 chapter-title'>Chapter " . $out[$i]["chapter"] . "<br><small>" . $out[$i]["title"] . "</small></p>
						</div>
					</div>
				</a>
			</div>
			
			";
	
			}else{
				$toecho .= "
			
				<div class='col-md-6 mb-3'>
				<a class='chapter-link text-light' href='" . route('goto_lore_c1') . "?chapter=" . $out[$i]["chapter"] . "'>
					<div class='card card-simple '  style='border-radius: 12px; overflow:hidden; '>
						<div class='card-body p-2 shadowtext' >
							<p class='m-0 chapter-title'>Chapter " . $out[$i]["chapter"] . "<br><small>" . $out[$i]["title"] . "</small></p>
						</div>
					</div>
				</a>
			</div>
			
			";
	
			}
			


		}
		return $toecho;
	}


	public function look_singlechaptercontpublic(Request $req){
		$out = $this->send_get(["tag"=>"getchaptersinglepublic","chapter"=>$this->sdmenc($req["chapter"])]);

		$out[0]["story"] = $this->fix_character_encoding($out[0]["story"] );


		return json_encode($out);
	}
	public function look_getallchapterslist(){
		$out = $this->send_get(["tag"=>"getallpublishedchapters"]);

		$toecho = "";

		for($i=0; $i < count($out);$i++){
			$toecho .= "
			
			<div class='col-md-4 mb-3'>
            <a class='chapter-link text-light' href='" . route('goto_lore_c1') . "?chapter=" . $out[$i]["chapter"] . "'>
                <div class='card card-simple' style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important;'>
                    <div class='card-body shadowtext' style='		
height: 40vh;
background: url(" . asset('/lore_images/' . $out[$i]["coverimg"]) . ");
background-repeat: no-repeat;
background-position: center;
background-size: cover;
'>
                        <h5 class='chapter-title'>Chapter " . $out[$i]["chapter"] . "<br><small>" . $out[$i]["title"] . "</small></h5>
                    </div>
                </div>
            </a>
        </div>
		
		";



		}
		return $toecho;
	}
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
			$out[0]["hackmsg"] = "<pre class='text-light readable m-0 p-0'>" . $this->fix_character_encoding($out[0]["hackmsg"]) .  "</pre>";

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
			$out[0]["hackmsg"] = "<pre class='text-light readable m-0 p-0'>" . $this->fix_character_encoding($out[0]["hackmsg"]) .  "</pre>";
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
				<td>" . $this->fix_character_encoding($out[$i]["jobtitle"]) ."</td>
				<td>" . $this->fix_character_encoding($out[$i]["shortdesc"]) ."</td>
				<td>" . $this->fix_character_encoding($out[$i]["fulldesc"]) ."</td>
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
				"parpassword"=>$this->sdmenc($req["usrpaword"])],true);
		$isGood = "0";

		if($out == "setup"){
			$isGood = "2";
		}else{
		$out = json_decode($out,true);
		if(count($out) == 1){
			$isGood = "1";
			$profilepic = asset("admin_profiles/") . "/" . $out[0]["profilepic"];
			session(["user_features" =>$out[0]["feature_set"]]);
			session(["user_name" =>$out[0]["username"]]);
			session(["user_id" =>$out[0]["id"]]);
			session(["user_profile" => $profilepic ]);
			session(["user_featureset" => $out[0]["feature_set"] ]);

		}

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