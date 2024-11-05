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
use Svg\Tag\Rect;

class functions extends Controller
{

	//public pages
	public function fly_home()
	{
		return view('home');
	}
	public function fly_team()
	{
		return view('team');
	}
	public function fly_partner()
	{
		return view('partner');
	}
	public function fly_aboutus()
	{
		return view('aboutus');
	}
	public function fly_faq()
	{
		return view('faq');
	}
	public function fly_contactus()
	{
		return view('contactus');
	}

	public function goto_terms()
	{
		return view('doc_termsandcond');
	}
	public function goto_privacypolicy()
	{
		return view('doc_privacypolicy');
	}

	public function fly_story()
	{
		return view('doc_storyindex');
	}

	public function fly_lore_c1()
	{
		return view('doc_story_c1');
	}
	public function fly_news()
	{
		return view('news');
	}
	public function fly_newscontent()
	{
		return view('news_content');
	}
	public function fly_classoverview()
	{
		return view('classoverview');
	}
	public function fly_updateoverview()
	{
		return view("update_content");
	}

	//admin pages
	public function fly_admin()
	{
		return view('admin_login');
	}
	public function fly_admindashboard()
	{
		return view('admin_dashboard');
	}

	public function fly_managehome()
	{
		return view('admin_managehome');
	}
	public function fly_hackathonwinners()
	{
		return view('admin_hackathon');
	}
	public function fly_tagiswinners()
	{
		return view('admin_tagis');
	}
	public function fly_ucwinners()
	{
		return view('admin_uc');
	}
	public function fly_mamagestory()
	{
		return view('admin_storychapters');
	}
	public function fly_managepublicmembers()
	{
		return view('admin_publicteam');
	}
	public function fly_managejobposting()
	{
		return view('admin_jobposting');
	}
	public function fly_manageheaderfoot()
	{
		return view('admin_headerfooter');
	}
	public function fly_managecontributors()
	{
		return view('admin_contributors');
	}
	public function fly_managelogs()
	{
		return view('admin_logs');
	}
	public function fly_managenews()
	{
		return view('admin_news');
	}
	public function fly_logout()
	{
		Session::flush();
		return view('admin_dashboard');
	}
	public function fly_hackwinners()
	{
		return view("hackwinhistory");
	}
	public function fly_tagislakaswinners()
	{
		return view("tagiswinhistory");
	}
	public function look_accountsetup()
	{
		return view("admin_accountsetup");
	}
	public function fly_manageaccount()
	{
		return view("admin_manageaccount");
	}


	// functionality
	public function fire_applyfeaturereorder(Request $req)
	{
		return $this->send(["tag" => "applyfeaturereorder", "orderno" => $this->sdmenc($req["orderno"]), "itemid" => $this->sdmenc($req["itemid"])]);
	}
	public function fire_removecontriacc(Request $req)
	{
		return $this->send(["tag" => "removecontriacc", "currentid" => $this->sdmenc($req["currentid"])], true);
	}
	public function fire_saveteamchanges(Request $req)
	{
		return $this->send([
			"tag" => "saveteamchanges",
			"valfullname" => $this->sdmenc($req["valfullname"]),
			"valpostionname" => $this->sdmenc($req["valpostionname"]),
			"valordernumber" => $this->sdmenc($req["valordernumber"]),
			"itemid" => $this->sdmenc($req["itemid"]),
		], true);

	}
	public function look_singleteaminfo(Request $req)
	{
		$out = $this->send_get([
			"tag" => "singleteaminfo",
			"itemid" => $this->sdmenc($req["itemid"])
		]);

		if (count($out) != 0) {
			$out[0]["fullname"] = $this->fix_character_encoding($out[0]["fullname"]);
			$out[0]["position"] = $this->fix_character_encoding($out[0]["position"]);
		}

		return json_encode($out);
	}
	public function look_singlestorychap(Request $req)
	{
		$out = $this->send_get(["tag" => "singlestorychap", "itemid" => $this->sdmenc($req["itemid"])]);

		if (count($out) != 0) {
			$out[0]["title"] = $this->fix_character_encoding($out[0]["title"]);
			$out[0]["story"] = $this->fix_character_encoding($out[0]["story"]);
			$out[0]["coverimg"] = asset('lore_images/' . $out[0]["coverimg"]);
		}

		return json_encode($out, true);
	}
	public function fire_savestorymodif(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'coverimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}

		if ($result == "") {
			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('coverimg');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('lore_images/') . $fname, $quality);


			return $this->send([
				"tag" => "savestorymodif",
				"val_chapno" => $this->sdmenc($req["val_chapno"]),
				"val_title" => $this->sdmenc($req["val_title"]),
				"val_description" => $this->sdmenc($req["val_description"]),
				"val_publishdate" => $this->sdmenc($req["val_publishdate"]),
				"coverimg" => $this->sdmenc($fname),
				"itemid" => $this->sdmenc($req["itemid"]),
			], true);
		} else {
			return $this->send([
				"tag" => "savestorymodif",
				"val_chapno" => $this->sdmenc($req["val_chapno"]),
				"val_title" => $this->sdmenc($req["val_title"]),
				"val_description" => $this->sdmenc($req["val_description"]),
				"val_publishdate" => $this->sdmenc($req["val_publishdate"]),
				"coverimg" => $this->sdmenc(""),
				"itemid" => $this->sdmenc($req["itemid"]),
			], true);
		}
	}
	public function fire_saveitemchanges(Request $req)
	{
		return $this->send([
			"tag" => "saveitemchanges",
			"val_title" => $this->sdmenc($req["val_title"]),
			"val_description" => $this->sdmenc($req["val_description"]),
			"currfeatitemid" => $this->sdmenc($req["currfeatitemid"])
		], true);

	}
	public function look_singlefeatitem(Request $req)
	{
		$out = $this->send_get(["tag" => "singlefeatitem", "currfeatitemid" => $this->sdmenc($req["currfeatitemid"])]);

		if (count($out) != 0) {
			$out[0]["item_title"] = $this->fix_character_encoding($out[0]["item_title"]);
			$out[0]["item_desc"] = $this->fix_character_encoding($out[0]["item_desc"]);
		}

		return json_encode($out);
	}
	public function fire_updateorderposfi(Request $req)
	{
		return $this->send([
			"tag" => "updateorderposfi",
			"featitemid" => $this->sdmenc($req["featitemid"]),
			"ordervalue" => $this->sdmenc($req["ordervalue"])
		], true);
	}
	public function fire_savehackchanges(Request $req)
	{
		$out = $this->send([
			"tag" => "savehackchanges",
			"val_hackdate" => $this->sdmenc($req["val_hackdate"]),
			"val_hackmessage" => $this->sdmenc($req["val_hackmessage"]),
			"val_ph_ne" => $this->sdmenc($req["val_ph_ne"]),
			"val_ph_fe" => $this->sdmenc($req["val_ph_fe"]),
			"val_ph_peli" => $this->sdmenc($req["val_ph_peli"]),
			"val_int_ne" => $this->sdmenc($req["val_int_ne"]),
			"val_int_fe" => $this->sdmenc($req["val_int_fe"]),
			"val_int_peli" => $this->sdmenc($req["val_int_peli"]),
			"itemid" => $this->sdmenc($req["itemid"])
		], true);

		return json_encode($out);
	}

	public function fire_saveucchanges(Request $req)
	{
		$out = $this->send([
			"tag" => "saveucchanges",
			"val_ucdate" => $this->sdmenc($req["val_ucdate"]),
			"val_ucmessage" => $this->sdmenc($req["val_ucmessage"]),
			"val_ph_ucwin" => $this->sdmenc($req["val_ph_ucwin"]),
			"val_int_ucwin" => $this->sdmenc($req["val_int_ucwin"]),
			"itemid" => $this->sdmenc($req["itemid"])
		], true);

		return json_encode($out);
	}

	public function fire_savetagischanges(Request $req)
	{
		$out = $this->send([
			"tag" => "savetagischanges",
			"val_tagisseason" => $this->sdmenc($req["val_tagisseason"]),
			"val_tagisdate" => $this->sdmenc($req["val_tagisdate"]),
			"val_tagismessage" => $this->sdmenc($req["val_tagismessage"]),
			"val_ph_overall" => $this->sdmenc($req["val_ph_overall"]),
			"val_ph_archer" => $this->sdmenc($req["val_ph_archer"]),
			"val_ph_brawler" => $this->sdmenc($req["val_ph_brawler"]),
			"val_ph_shaman" => $this->sdmenc($req["val_ph_shaman"]),
			"val_ph_swordsman" => $this->sdmenc($req["val_int_swordsman"]),
			"val_int_overall" => $this->sdmenc($req["val_int_overall"]),
			"val_int_archer" => $this->sdmenc($req["val_int_archer"]),
			"val_int_brawler" => $this->sdmenc($req["val_int_brawler"]),
			"val_int_shaman" => $this->sdmenc($req["val_int_shaman"]),
			"val_int_swordsman" => $this->sdmenc($req["val_int_swordsman"]),
			"itemid" => $this->sdmenc($req["itemid"])
		], true);

		return json_encode($out);
	}
	public function look_gethackathonsingle(Request $req)
	{
		$out = $this->send_get([
			"tag" => "gethackathonsingle",
			"currentid" => $this->sdmenc($req["currentid"])
		]);



		if (count($out) != 0) {

			$out[0]["hackmsg"] = $this->fix_character_encoding($out[0]["hackmsg"]);


			$out[0]["ph_ne"] = $this->fix_character_encoding($out[0]["ph_ne"]);
			$out[0]["ph_fe"] = $this->fix_character_encoding($out[0]["ph_fe"]);
			$out[0]["ph_peli"] = $this->fix_character_encoding($out[0]["ph_peli"]);


			$out[0]["int_ne"] = $this->fix_character_encoding($out[0]["int_ne"]);
			$out[0]["int_fe"] = $this->fix_character_encoding($out[0]["int_fe"]);
			$out[0]["int_peli"] = $this->fix_character_encoding($out[0]["int_peli"]);

		}




		return json_encode($out);
	}
	public function look_getucsingle(Request $req)
	{
		$out = $this->send_get([
			"tag" => "getucsingle",
			"currentid" => $this->sdmenc($req["currentid"])
		]);



		if (count($out) != 0) {
			$out[0]["ucmsg"] = $this->fix_character_encoding($out[0]["ucmsg"]);
			$out[0]["ph_ucwin"] = $this->fix_character_encoding($out[0]["ph_ucwin"]);
			$out[0]["int_ucwin"] = $this->fix_character_encoding($out[0]["int_ucwin"]);

		}
		return json_encode($out);
	}
	public function look_gettagissingle(Request $req)
	{
		$out = $this->send_get([
			"tag" => "gettagissingle",
			"currentid" => $this->sdmenc($req["currentid"])
		]);

		$fields = [
			"tagismsg",
			"ph_overall",
			"ph_archer",
			"ph_brawler",
			"ph_shaman",
			"ph_swordsman",
			"int_overall",
			"int_archer",
			"int_brawler",
			"int_shaman",
			"int_swordsman"
		];
		if (count($out) != 0) {

			foreach ($fields as $field) {
				if (isset($out[0][$field])) {
					$out[0][$field] = $this->fix_character_encoding($out[0][$field]);
				}
			}

		}
		return json_encode($out);
	}
	public function fire_savefeachanges(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'featureimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}

		if ($result == "") {
			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}

			$image = $req->file('featureimg');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('feature_images/') . $fname, $quality);




			$out = $this->send([
				"tag" => "savefeachanges",
				"val_title" => $this->sdmenc($req["val_title"]),
				"val_desc" => $this->sdmenc($req["val_desc"]),
				"itemid" => $this->sdmenc($req["itemid"]),
				"featureimg" => $this->sdmenc($fname)
			], true);
		} else {
			$out = $this->send([
				"tag" => "savefeachanges",
				"val_title" => $this->sdmenc($req["val_title"]),
				"val_desc" => $this->sdmenc($req["val_desc"]),
				"itemid" => $this->sdmenc($req["itemid"]),
				"featureimg" => $this->sdmenc("")
			], true);
		}
		return $out;
	}
	public function look_featuresingleinfo(Request $req)
	{
		$out = $this->send_get(["tag" => "featuresingleinfo", "itemid" => $this->sdmenc($req["itemid"])]);


		if (count($out) != 0) {
			$out[0]["featureimg"] = asset("feature_images/") . "/" . $out[0]["featureimg"];
			$out[0]["featuredesc"] = $this->fix_character_encoding($out[0]["featuredesc"]);
			$out[0]["feattitle"] = $this->fix_character_encoding($out[0]["feattitle"]);
		}


		return json_encode($out);
	}
	public function fire_savenewschanges(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'coverphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}

		if ($result == "") {
			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}

			$image = $req->file('coverphoto');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('news/') . $fname, $quality);

			$out = $this->send([
				"tag" => "savenewschanges",
				"txt_headline" => $this->sdmenc($req["txt_headline"]),
				"txt_description" => $this->sdmenc($req["txt_description"]),
				"itemid" => $this->sdmenc($req["itemid"]),
				"coverphoto" => $this->sdmenc($fname)
			], true);
		} else {
			$out = $this->send([
				"tag" => "savenewschanges",
				"txt_headline" => $this->sdmenc($req["txt_headline"]),
				"txt_description" => $this->sdmenc($req["txt_description"]),
				"itemid" => $this->sdmenc($req["itemid"]),
				"coverphoto" => $this->sdmenc("")
			], true);
		}
		return $out;
	}
	public function look_newinfosingle(Request $req)
	{
		$out = $this->send_get([
			"tag" => "newinfosingle",
			"currentnewsid" => $this->sdmenc($req["currentnewsid"])
		]);

		if (count($out) != 0) {
			$out[0]["coverphoto"] = asset("news/") . "/" . $out[0]["coverphoto"];
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
			$out[0]["headline"] = $this->fix_character_encoding($out[0]["headline"]);
		}

		return json_encode($out);
	}
	public function fire_saveupdatechanges(Request $req)
	{
		return $this->send([
			"tag" => "saveupdatechanges",
			"val_version" => $this->sdmenc($req["val_version"]),
			"val_title" => $this->sdmenc($req["val_title"]),
			"val_description" => $this->sdmenc($req["val_description"]),
			"val_releaseDate" => $this->sdmenc($req["val_releaseDate"]),
			"currentupdateid" => $this->sdmenc($req["currentupdateid"])
		], true);
	}
	public function look_getmyinfobasic(Request $req)
	{
		return $this->send_get(["tag" => "getmyinfobasic", "user_id" => $this->sdmenc(session("user_id"))], true);
	}
	public function fire_changepassword(Request $req)
	{
		$out = $this->send([
			"tag" => "changepassword",
			"oridignid" => $this->sdmenc(session("user_id")),
			"inp_oldpassword" => $this->sdmenc($req["inp_oldpassword"]),
			"inp_inpnewpassword" => $this->sdmenc($req["inp_inpnewpassword"])
		], true);
		return $out;
	}
	public function fire_changerole(Request $req)
	{
		$out = $this->send([
			"tag" => "changerole",
			"oridignid" => $this->sdmenc(session("user_id")),
			"inp_rolenew" => $this->sdmenc($req["inp_rolenew"])
		], true);
		return $out;
	}
	public function fire_changeusername(Request $req)
	{
		$out = $this->send([
			"tag" => "changeusername",
			"oridignid" => $this->sdmenc(session("user_id")),
			"inp_username" => $this->sdmenc($req["inp_username"])
		], true);
	}
	public function fire_changeprofilepic(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'inp_profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);

		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 20;
			$imgformat = ".jpg";

			$image = $req->file('inp_profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . $imgformat;
			$image_compressed->save(public_path('admin_profiles/') . $fname, $quality);

			$out = $this->send([
				"tag" => "changeprofilepic",
				"oridignid" => $this->sdmenc(session("user_id")),
				"profilepic" => $this->sdmenc($fname)
			], true);

			if (str_contains($out, "true")) {

				session(["user_profile" => asset("admin_profiles/") . "/" . $fname]);


			}
			return $out;

		} else {
			return "error";
		}




	}
	public function look_fulljobinfo(Request $req)
	{
		$out = $this->send_get(["tag" => "fulljobinfo", "itemid" => $this->sdmenc($req["itemid"])]);

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["jobtitle"] = $this->fix_character_encoding($out[$i]["jobtitle"]);
			$out[$i]["fulldesc"] = $this->fix_character_encoding($out[$i]["fulldesc"]);
		}

		return json_encode($out);
	}
	public function look_publicmembers()
	{
		$out = $this->send_get(["tag" => "getpublicmembers"]);

		$toecho = "";
		$topPeople = 2;
		for ($i = 0; $i < count($out); $i++) {



			$img = asset("team_photos/") . "/" . $out[$i]["imgpath"];


			if ($i < $topPeople) {
				$toecho .= "
				<div class='col-sm-6 mb-5'>
	
				<center>
				<img style='border-radius: 999px; width: 212px;' class='mb-3' src='" . $img . "'>
				<h4 class='titlefont littext' style='text-transform: uppercase;'>" . $out[$i]["fullname"] . "</h4>
				<p>" . $out[$i]["position"] . "</p>
				</center>
	
	
				</div>";
			} else {
				$toecho .= "
				<div class='col-sm-4'>
	
				<center>
				<img style='border-radius: 999px; width: 180px;' class='mb-3' src='" . $img . "'>
				<h4 class='titlefont littext' style='text-transform: uppercase;'>" . $out[$i]["fullname"] . "</h4>
				<p>" . $out[$i]["position"] . "</p>
				</center>
	
	
				</div>";
			}

		}

		return $toecho;
	}
	public function look_publishedjobposting()
	{
		$out = $this->send_get(["tag" => "publishedjobposting"]);

		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
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

		return $toecho;
	}
	public function look_allcontributors(Request $req)
	{
		$out = $this->send_get(["tag" => "allcontributors", "managerid" => $this->sdmenc(session("user_id"))]);
		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "
				<tr>
					<td>" . "<div style='background-image: url(" .
				asset("admin_profiles/") . "/" . $out[$i]["profilepic"] . ");
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
					<td><button data-toggle='modal' data-target='#mdl_deleteaccount' onclick='openDeleteContri(this)' data-itemid='" . $out[$i]["id"] . "' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return $toecho;
	}
	public function fire_addcontributor(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'inp_profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);

		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 20;
			$imgformat = ".jpg";

			$image = $req->file('inp_profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . $imgformat;
			$image_compressed->save(public_path('admin_profiles/') . $fname, $quality);



			$out = $this->send([
				"tag" => "addcontributor",
				"inp_profilepic" => $this->sdmenc($fname),
				"inp_name" => $this->sdmenc($req["inp_name"]),
				"inp_description" => $this->sdmenc($req["inp_description"]),
				"inp_featureset" => $this->sdmenc($req["inp_featureset"]),
				"inp_password" => $this->sdmenc($req["inp_password"])
			], true);


			return $out;

		} else {
			return "error";
		}



	}
	public function look_publicupdatedetailsfull(Request $req)
	{
		$out = $this->send_get(["tag" => "publicupdatedetailsful", "updateno" => $this->sdmenc($req["updateno"])]);


		for ($i = 0; $i < count($out); $i++) {
			if ($i == 0) {
				$out[$i]["coverphoto"] = asset("update_covers/") . "/" . $out[$i]["coverphoto"];
				$out[0]["releasedate"] = date("F d, Y", strtotime($out[0]["releasedate"]));
			}
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$out[$i]["version"] = $this->fix_character_encoding($out[$i]["version"]);
			$out[$i]["details"] = $this->fix_character_encoding($out[$i]["details"]);
			if ($out[$i]["item_title"] && $out[$i]["item_title"] != null && $out[$i]["item_title"] != "") {
				$out[$i]["item_cover"] = asset("update_items_images/") . "/" . $out[$i]["item_cover"];
				$out[$i]["item_desc"] = $this->fix_character_encoding($out[$i]["item_desc"]);
				$out[$i]["item_title"] = $this->fix_character_encoding($out[$i]["item_title"]);



			}


		}
		// $out[0]["releasedate"] = date("F d, Y", strtotime(	$out[0]["releasedate"] ));
		return json_encode($out);
	}
	public function fire_deleteupdaterec(Request $req)
	{
		return $this->send(["tag" => "deleteupdaterec", "current_updateid" => $this->sdmenc($req["current_updateid"])]);
	}
	public function fire_deletefeatureitem(Request $req)
	{
		return $this->send(["tag" => "deletefeatureitem", "current_itemId" => $this->sdmenc($req["current_itemId"])]);
	}
	public function look_updatebasicinfo(Request $req)
	{
		$out = $this->send_get(["tag" => "updatebasicinfo", "itemId" => $this->sdmenc($req["itemId"])]);
		$out[0]["headline"] = $this->fix_character_encoding($out[0]["headline"]);
		$out[0]["details"] = $this->fix_character_encoding($out[0]["details"]);
		$out[0]["version"] = $this->fix_character_encoding($out[0]["version"]);
		$out[0]["coverphoto"] = asset("update_covers/") . "/" . $out[0]["coverphoto"];
		$out[0]["releasedate"] = date("Y-m-d", strtotime($out[0]["releasedate"]));
		return json_encode($out);
	}
	public function look_publicupdates()
	{
		$out = $this->send_get(["tag" => "publicupdates"]);
		$toecho = "";
		$colonum = "12";

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$out[$i]["details"] = $this->fix_character_encoding($out[$i]["details"]);
			$out[$i]["version"] = $this->fix_character_encoding($out[$i]["version"]);

			if ($colonum == "6") {
				$toecho .= "
				<div class='col-sm-" . $colonum . "'>
					<a target='_blank' href='" . route("goto_updateoverview") . "?updateno=" . $out[$i]["id"] . "'>
					<div class='card card-simple mb-2' style='border-left: 1px solid  #5FBACE !important;'>
					<div class='card-body'>

					<p class='mb-0 text-muted'>" . date("F d, y g:i a", strtotime($out[$i]["dateposted"])) . "</p>
					<p class='mb-0 text-light'><strong>" . $out[$i]["version"] . "</strong> — " . $out[$i]["headline"] . "</p>
					
					</div>
					</div>
					</a>
				</div>
				<div class='col-sm-" . $colonum . "'>
				</div>
			";
			} else {
				$toecho .= "
				<div class='col-sm-" . $colonum . "'>
				<div class='card card-simple mb-5' style='border-left: 3px solid   #5FBACE !important;'>
					<div class='card-body'>
					<p class='mb-0 float-right'>" . date("F d, y g:i a", strtotime($out[$i]["dateposted"])) . "</p>
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
	public function look_updateitems(Request $req)
	{
		$out = $this->send_get([
			"tag" => "updateitems",
			"current_updateid" => $this->sdmenc($req["current_updateid"])
		]);
		$toecho = "";


		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["item_title"] = $this->fix_character_encoding($out[$i]["item_title"]);
			$toecho .= "
									<tr>
									<td><input type='number' onchange='changeOrder(this)' data-itemid='" . $out[$i]["id"] . "' class='form-control' style='width:100px;' value='" . (($out[$i]["order_num"] == null) ? "0" : ($out[$i]["order_num"])) . "'></td>
										<td style='width:156px;'>" . "<img style='width: 100px;' src='" . asset("update_items_images/" . $out[$i]["item_cover"]) . "'>" . "</td>
										<td><a href='#' data-toggle='modal' data-itemid='" . $out[$i]["id"] . "' onclick='openEditFeatureItem(this)' data-target='#mdl_itempreview'>" . $out[$i]["item_title"] . "</a></td>
										<td><button onclick='openDeleteFeatureItemConfirmation(this)' data-itemid='" . $out[$i]["id"] . "' class='btn btn-sm btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
									</tr>
								";
		}
		return $toecho;
	}
	public function fire_newupdateitem(Request $req)
	{




		$validator = Validator::make($req->all(), [
			'item_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);

		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			$imgformat = ".png";
			if ($req["ffreduce"] == "1") {
				$quality = 35;
				$imgformat = ".jpg";
			}

			$image = $req->file('item_cover');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . $imgformat;
			$image_compressed->save(public_path('update_items_images/') . $fname, $quality);



			$out = $this->send([
				"tag" => "newupdateitem",
				"item_id" => $this->sdmenc($req["item_id"]),
				"item_cover" => $this->sdmenc($fname),
				"item_title" => $this->sdmenc($req["item_title"]),

				"item_description" => $this->sdmenc($req["item_description"])
			], true);
			return $out;

		} else {
			return "error";
		}



	}
	public function look_updatesfromadmin()
	{
		$out = $this->send_get(["tag" => "updatesfromadmin"]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {

			$out[$i]["version"] = $this->fix_character_encoding($out[$i]["version"]);
			$toecho .= "
				<tr>
					<td>" . date("F d, y", strtotime($out[$i]["dateposted"])) . "</td>
					<td><a href='#' onclick='editUpdateContents(this)' data-itemid='" . $out[$i]["id"] . "'>" . $this->fix_character_encoding($out[$i]["headline"]) . "</td>
					<td>" . $out[$i]["version"] . "</td>
					<td>" . date("F d, y", strtotime($out[$i]["releasedate"])) . "</td>
					<td><button data-recordid='" . $out[$i]["id"] . "' onclick='openDeleteUpdateRecordConfirmation(this)' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></button></td>
				</tr>
			";
		}
		return $toecho;
	}
	public function fire_addnewupdatesetup(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'updatecoverfile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);

		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["ffreduce"] == "1") {
				$quality = 35;
			}

			$image = $req->file('updatecoverfile');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('update_covers/') . $fname, $quality);



			$out = $this->send([
				"tag" => "addnewupdatesetup",
				"updatecoverfile" => $this->sdmenc($fname),
				"updatetitle" => $this->sdmenc($req["updatetitle"]),
				"updatedescription" => $this->sdmenc($req["updatedescription"]),
				"releasedate" => $this->sdmenc($req["releasedate"]),
				"versionnumber" => $this->sdmenc($req["versionnumber"])
			], true);

			return $out;

		} else {
			return "error";
		}
	}
	public function look_latestnews()
	{
		$out = $this->send_get(["tag" => "showlatestnews"]);
		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<div class='col-sm-12'>
			
			<a href='" . route("goto_newscontent") . "?contentno=" . $out[$i]["id"] . "' class='text-light'>
				
			<img loading='lazy' alt='Image showing a " . $out[$i]["headline"] . "' class='p-0 mb-3' src='" . asset("news/" . $out[$i]["coverphoto"]) . "' style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
				<small class='mt-1 mb-0 text-muted'>" . strtoupper(date("F d, Y", strtotime($out[$i]["dateposted"]))) . "</small>
				<p class='mt-0'>" . $out[$i]["headline"] . "</p>

			</a>


			</div>";
		}

		return $toecho;
	}


	public function fire_deletenews(Request $req)
	{
		return $this->send(["tag" => "deletenews", "currentnewsnumber" => $this->sdmenc($req["currentnewsnumber"])], true);
	}
	public function look_singlenewspublic(Request $req)
	{
		$out = $this->send_get(["tag" => "singlenewspublic", "contentno" => $this->sdmenc($req["contentno"])]);

		if (count($out) != 0) {
			$out[0]["coverphoto"] = asset("news/" . $out[0]["coverphoto"]);
			$out[0]["headline"] = $this->fix_character_encoding($out[0]["headline"]);
			$out[0]["dateposted"] = strtoupper(date("F d, Y", strtotime($out[0]["dateposted"])));
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
		}

		return json_encode($out);
	}
	public function look_publicnews()
	{
		$out = $this->send_get(["tag" => "publicnews"]);
		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<div class='col-sm-4'>
			
			<a href='" . route("goto_newscontent") . "?contentno=" . $out[$i]["id"] . "' class='text-light'>
				
			<img class='p-0 mt-3' src='" . asset("news/" . $out[$i]["coverphoto"]) . "' style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
				<p class='mt-3 mb-0 text-muted'>" . strtoupper(date("F d, Y", strtotime($out[$i]["dateposted"]))) . "</p>
				<h4 class='mt-0'>" . $out[$i]["headline"] . "</h4>

			</a>


			</div>";
		}

		return $toecho;
	}
	public function look_getallnews()
	{
		$out = $this->send_get(["tag" => "getallnews"]);
		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["headline"] = $this->fix_character_encoding($out[$i]["headline"]);
			$toecho .= "<tr>
				<td>" . date("F d, y", strtotime($out[$i]["dateposted"])) . "</td>
				<td><a href='#' data-toggle='modal' data-target='#mdl_newinfosingle' onclick='getNewInformation(this)' data-newsid='" . $out[$i]["id"] . "'>" . $out[$i]["headline"] . "</a></td>
				<td><button onclick='openDeleteNews(this)' data-newsno='" . $out[$i]["id"] . "' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></button></td>
			</tr>";
		}
		return $toecho;
	}
	public function fire_publishnews(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);

		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["ffreduce"] == "1") {
				$quality = 35;
			}

			$image = $req->file('cover');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('news/') . $fname, $quality);

			$out = $this->send([
				"tag" => "publishnews",
				"newsheadline" => $this->sdmenc($req["newsheadline"]),
				"coverphoto" => $this->sdmenc($fname),
				"description" => $this->sdmenc($req["description"]),
			], true);

			return $out;
		} else {
			return "error";
		}


	}
	public function fire_createaccount(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {
			$quality = 35;
			$image = $req->file('profilepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('admin_profiles/') . $fname, $quality);

			$out = $this->send(
				[
					"tag" => "createaccount",
					"username" => $this->sdmenc($req["username"]),
					"pass" => $this->sdmenc($req["pass"]),
					"roles" => $this->sdmenc($req["roles"]),
					"profilepic" => $this->sdmenc($fname)
				]
				,
				true
			);

			return $out;
		} else {
			return "error";

		}
	}
	public function look_getallchapterslistminimal(Request $req)
	{
		$out = $this->send_get(["tag" => "getallpublishedchapters"]);

		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {

			if ($req["chap"] == $out[$i]["chapter"]) {
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

			} else {
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


	public function look_singlechaptercontpublic(Request $req)
	{
		$out = $this->send_get(["tag" => "getchaptersinglepublic", "chapter" => $this->sdmenc($req["chapter"])]);

		$out[0]["story"] = $this->fix_character_encoding($out[0]["story"]);
		$out[0]["title"] = $this->fix_character_encoding($out[0]["title"]);


		return json_encode($out);
	}
	public function look_getallchapterslist()
	{
		$out = $this->send_get(["tag" => "getallpublishedchapters"]);

		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["title"] = $this->fix_character_encoding($out[$i]["title"]);
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
	public function look_homefeatured()
	{
		$out = $this->send_get(["tag" => "homefeatured"]);
		if (count($out) != 0) {
			$out[0]["img"] = asset('bottom_img/' . $out[0]["img"]);
			$out[0]["title"] = $this->fix_character_encoding($out[0]["title"]);
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
			$out[0]["btn_name"] = $this->fix_character_encoding($out[0]["btn_name"]);
		}
		return json_encode($out);
	}
	public function look_latestfeatured()
	{
		$out = $this->send_get(["tag" => "latestfeatured"]);
		if (count($out) != 0) {
			$out[0]["img"] = asset('bottom_img/' . $out[0]["img"]);

			$out[0]["title"] = $this->fix_character_encoding($out[0]["title"]);
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
			$out[0]["btn_name"] = $this->fix_character_encoding($out[0]["btn_name"]);


		}
		return json_encode($out);
	}
	public function look_gethackathonwinshistory()
	{
		$out = $this->send_get(["tag" => "gethackathonwinshistory"]);

		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$out[0]["hackmsg"] = "<pre class='text-light readable m-0 p-0'>" . $this->fix_character_encoding($out[$i]["hackmsg"]) . "</pre>";

			$out[$i]["ph_ne"] = $this->fix_character_encoding($out[$i]["ph_ne"]);
			$out[$i]["ph_fe"] = $this->fix_character_encoding($out[$i]["ph_fe"]);
			$out[$i]["ph_peli"] = $this->fix_character_encoding($out[$i]["ph_peli"]);
			$out[$i]["int_ne"] = $this->fix_character_encoding($out[$i]["int_ne"]);
			$out[$i]["int_fe"] = $this->fix_character_encoding($out[$i]["int_fe"]);
			$out[$i]["int_peli"] = $this->fix_character_encoding($out[$i]["int_peli"]);


			if ($i == 0) {
				$toecho .= "<h3 class='littext titlefont mt-5 mb-5'>CHAMPIONS OF THE HOUR</h3>";
			} else if ($i == 1) {

				$toecho .= "<h3 class='littext titlefont mt-5 mb-5'>FORMER CHAMPIONS</h3>";
			}
			$cocoa = ($i == 0 ? asset('photos/poster/award.jpg') : "");

			$toecho .= '
			
			<div class="card ' . ($i == 0 ? "card-simple" : "card-simple") . ' mb-3" style="' . ($i == 0 ? "text-shadow: 0px 2px 10px black;" : "") . '">
        
			<div class="card-body" style="background: url(' . "'" . $cocoa . "'" . '); background-size:cover; background-repeat:no-repeat; background-position: right;s+++++++++++++++++">
				<div class="row">
	
					<div class="col-sm-12">
						<h5>' . date("F d, Y", strtotime($out[$i]["hackdate"])) . '</h5>
					</div>
	
					<div class="col-sm-4">
					<h6>Philippines</h6>
						<ul>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_ne.png') . '" style="width: 30px;"> ' . $out[$i]["ph_ne"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_fe.png') . '" style="width: 30px;"> ' . $out[$i]["ph_fe"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_peli.png') . '" style="width: 30px;"> ' . $out[$i]["ph_peli"] . '</li>
						</ul>
					</div>
					<div class="col-sm-4">
					<h6>International</h6>
						<ul>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_ne.png') . '" style="width: 30px;"> ' . $out[$i]["int_ne"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_fe.png') . '" style="width: 30px;"> ' . $out[$i]["int_fe"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/sm_peli.png') . '" style="width: 30px;"> ' . $out[$i]["int_peli"] . '</li>
						</ul>
					</div>
	
					<div class="col-sm-12">
					' . $out[0]["hackmsg"] . '
					</div>
				</div>
			</div>
	
		 </div>

		 

			';
		}

		return $toecho;
	}

	public function look_gettagiswinshistory()
	{
		$out = $this->send_get(["tag" => "gettagiswinshistory"]);

		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$out[0]["tagismsg"] = "<pre class='text-light readable m-0 p-0'>" . $this->fix_character_encoding($out[$i]["tagismsg"]) . "</pre>";

			$out[$i]["ph_archer"] = $this->fix_character_encoding($out[$i]["ph_archer"]);
			$out[$i]["ph_brawler"] = $this->fix_character_encoding($out[$i]["ph_brawler"]);
			$out[$i]["ph_shaman"] = $this->fix_character_encoding($out[$i]["ph_shaman"]);
			$out[$i]["ph_swordsman"] = $this->fix_character_encoding($out[$i]["ph_swordsman"]);
			$out[$i]["ph_overall"] = $this->fix_character_encoding($out[$i]["ph_overall"]);

			$out[$i]["int_archer"] = $this->fix_character_encoding($out[$i]["int_archer"]);
			$out[$i]["int_brawler"] = $this->fix_character_encoding($out[$i]["int_brawler"]);
			$out[$i]["int_shaman"] = $this->fix_character_encoding($out[$i]["int_shaman"]);
			$out[$i]["int_swordsman"] = $this->fix_character_encoding($out[$i]["int_swordsman"]);
			$out[$i]["int_overall"] = $this->fix_character_encoding($out[$i]["int_overall"]);

			if ($i == 0) {
				$toecho .= "<h3 class='littext titlefont mt-5 mb-5'>SEASONAL CHAMPIONS</h3>";
			} else if ($i == 1) {

				$toecho .= "<h3 class='littext titlefont mt-5 mb-5'>PREVIOUS SEASONS CHAMPIONS</h3>";
			}
			$cocoa = ($i == 0 ? asset('photos/poster/award.jpg') : "");

			$toecho .= '
			
			<div class="card ' . ($i == 0 ? "card-simple" : "card-simple") . ' mb-3" style="' . ($i == 0 ? "text-shadow: 0px 2px 10px black;" : "") . '">
        
			<div class="card-body" style="background: url(' . "'" . $cocoa . "'" . '); background-size:cover; background-repeat:no-repeat; background-position: right;">
				<div class="row">
	
					<div class="col-sm-12">
						<h5>' . date("F d, Y", strtotime($out[$i]["tagisdate"])) . '</h5>
					</div>
	
					<div class="col-sm-4">
					<h6>Philippines</h6>
						<ul style="list-style-type:none">
							<li>' . '<i class="fas fa-trophy" style="width: 30px;padding:5px;"></i>' . $out[$i]["ph_overall"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/archer_full.png') . '" style="width: 30px;"> ' . $out[$i]["ph_archer"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/brawler_full.png') . '" style="width: 30px;"> ' . $out[$i]["ph_brawler"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/shaman_full.png') . '" style="width: 30px;"> ' . $out[$i]["ph_shaman"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/swordsman_full.png') . '" style="width: 30px;"> ' . $out[$i]["ph_swordsman"] . '</li>
						</ul>
					</div>
					<div class="col-sm-4">
					<h6>International</h6>
						<ul style="list-style-type:none">
							<li>' . '<i class="fas fa-trophy" style="width: 30px;padding:5px;"></i>' . $out[$i]["int_overall"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/archer_full.png') . '" style="width: 30px;"> ' . $out[$i]["int_archer"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/brawler_full.png') . '" style="width: 30px;"> ' . $out[$i]["int_brawler"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/shaman_full.png') . '" style="width: 30px;"> ' . $out[$i]["int_shaman"] . '</li>
							<li>' . '<img loading="lazy" src="' . asset('photos/icons/swordsman_full.png') . '" style="width: 30px;"> ' . $out[$i]["int_swordsman"] . '</li>
						</ul>
					</div>
	
					<div class="col-sm-12">
					' . $out[0]["tagismsg"] . '
					</div>
				</div>
			</div>
	
		 </div>

		 

			';
		}

		return $toecho;
	}
	public function look_homecoverphoto()
	{
		$out = $this->send_get(["tag" => "homecoverphoto"]);

		if (count($out) != 0) {
			$out[0]["img"] = asset('home_cover_photo/' . $out[0]["img"]);
		}

		return json_encode($out);
	}
	public function look_homelogo()
	{
		$out = $this->send_get(["tag" => "homelogo"]);

		if (count($out) != 0) {
			$out[0]["img"] = asset('bottom_img/' . $out[0]["img"]);
		}

		return json_encode($out);
	}
	public function look_homehackathonwinners()
	{
		$out = $this->send_get(["tag" => "homehackathonwinners"]);

		if (count($out) != 0) {
			$out[0]["hackmsg"] = "<pre class='text-light readable m-0 p-0'>" . $this->fix_character_encoding($out[0]["hackmsg"]) . "</pre>";
			$out[0]["hackdate"] = date("F d, Y", strtotime($out[0]["hackdate"]));
		}

		return json_encode($out);
	}
	public function look_homefeatures()
	{
		$out = $this->send_get(["tag" => "homefeatures"]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["feattitle"] = $this->fix_character_encoding($out[$i]["feattitle"]);
			$out[$i]["featuredesc"] = $this->fix_character_encoding($out[$i]["featuredesc"]);
			$toecho .= "
				<div class='col-sm-12'>
				<div class='card card-simple mb-4'>
				<div class='card-body'>
					<div class='row'>
					<div class='col-md-6'>
					<img alt='Walk Online Feature - " . $out[$i]["feattitle"] . "' src='" . asset("feature_images/" . $out[$i]["featureimg"]) . "' loading='lazy' class='img_screenshots'>
				</div>
				<div class='col-md-6'>
					<h3 class='littext titlefont'>" . $out[$i]["feattitle"] . "</h3>
						<div class='separator-blue-left-thin mb-3'></div>
					<p class='readable'>" . $out[$i]["featuredesc"] . "</p>
				</div>
		<div class='col-sm-12'>
			<br>
				<br>
		</div>
		</div>
					</div>
				</div>
				</div>
			";
		}


		return $toecho;
	}
	public function look_homebottompanel()
	{
		$out = $this->send_get(["tag" => "homebottompanel"]);

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["img"] = asset('bottom_img/' . $out[$i]["img"]);
			$out[$i]["title"] = $this->fix_character_encoding($out[$i]["title"]);
			$out[$i]["description"] = $this->fix_character_encoding($out[$i]["description"]);
			$out[$i]["btn_name"] = $this->fix_character_encoding($out[$i]["btn_name"]);
		}
		return json_encode($out);
	}

	public function look_homeucwins()
	{
		$out = $this->send_get(["tag" => "homeucwins"]);
		if (count($out) != 0) {
			$out[0]["ucdate"] = date("F d, Y", strtotime($out[0]["ucdate"]));
		}
		return json_encode($out);
	}

	public function look_hometagiswins()
	{
		$out = $this->send_get(["tag" => "hometagiswins"]);
		if (count($out) != 0) {
			$out[0]["tagisdate"] = date("F d, Y", strtotime($out[0]["tagisdate"]));
		}
		return json_encode($out);
	}

	function look_getjobs()
	{
		$out = $this->send_get(["tag" => "getjob"]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "<tr>
				<td>" . $this->fix_character_encoding($out[$i]["jobtitle"]) . "</td>
				<td>" . $this->fix_character_encoding($out[$i]["shortdesc"]) . "</td>
				<td>" . $this->fix_character_encoding($out[$i]["fulldesc"]) . "</td>
				<td>" . ($out[$i]["status"] == 0 ?
				"<button class='btn text-success btn-light' onclick='changeStatus(this)' data-status='1' data-dataid='" . $out[$i]["id"] . "' >Publish</button>" :
				"<button class='btn text-danger btn-light' onclick='changeStatus(this)' data-status='0' data-dataid='" . $out[$i]["id"] . "' >Unpublish</button>") . "</td>
				<td><button class='btn btn-light text-danger' onclick='openDeleteJob(this)' data-dataid='" . $out[$i]["id"] . "'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
			</tr>";
		}
		return $toecho;
	}
	function fire_addjob(Request $req)
	{

		return $this->send([
			"tag" => "addjob",
			"jobtitle" => $this->sdmenc($req["jobtitle"]),
			"shortdesc" => $this->sdmenc($req["shortdesc"]),
			"fulldesc" => $this->sdmenc($req["fulldesc"])
		], true);

	}
	function fire_deletejob(Request $req)
	{
		return $this->send_get(["tag" => "deletejob", "currentId" => $this->sdmenc($req["currentId"])], true);
	}
	function fire_updatejobstatus(Request $req)
	{
		return $this->send([
			"tag" => "updatejobstatus"
			,
			"currentId" => $this->sdmenc($req["currentId"])
			,
			"status" => $this->sdmenc($req["status"])
		], true);
	}




	function look_getteam()
	{
		$out = $this->send_get(["tag" => "getteam"]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "<tr>

				<td><img src='" . asset("team_photos/" . $out[$i]["imgpath"]) . "' loading='lazy' style='max-width:50px; max-height: 50px;'>" . "</td>
				<td><a href='#' data-toggle='modal' data-target='#mdl_editmemberpic' data-itemid='" . $out[$i]["id"] . "' onclick='openEditMember(this)'>" . $out[$i]["fullname"] . "<br><small class=''>" . $out[$i]["position"] . "</small></a></td>
				<td>" . $out[$i]["order_no"] . "</td>
				<td><button class='btn btn-light text-danger' onclick='openDeleteTeam(this)' data-dataid='" . $out[$i]["id"] . "'><i class='fa-sharp fa-solid fa-trash'></i></button></td>

			</tr>";
		}
		return $toecho;
	}
	function fire_addteam(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'facepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('facepic');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('team_photos/') . $fname, $quality);

			return $this->send([
				"tag" => "addteam",
				"facepic" => $this->sdmenc($fname),
				"fullname" => $this->sdmenc($req["fullname"]),
				"positionname" => $this->sdmenc($req["positionname"]),
				"ordernumber" => $this->sdmenc($req["ordernumber"])
			], true);
		} else {
			return "error";
		}

	}
	function fire_deleteteam(Request $req)
	{
		return $this->send_get(["tag" => "deleteteam", "currentId" => $this->sdmenc($req["currentId"])], true);
	}

	function fix_character_encoding($string)
	{
		return $this->convertYouTubeEmbedLink(iconv("UTF-8", "ISO-8859-1//TRANSLIT", $string));
	}

	function convertYouTubeEmbedLink($string)
	{
		// find YouTube embed link in the string
		preg_match_all('/<iframe[^>]+src="https:\/\/www.youtube.com\/embed\/([^"]+)"/', $string, $matches);

		// loop through each match and replace the width, height, and border-radius attributes
		foreach ($matches[0] as $match) {
			// check if width and height attributes already exist in the iframe HTML
			if (preg_match('/width="\d+"/', $match)) {
				$new_iframe = preg_replace('/width="\d+"/', 'width="100%"', $match);
			} else {
				$new_iframe = str_replace('width="', 'width="100%" ', $match);
			}
			if (preg_match('/height="\d+"/', $new_iframe)) {
				$new_iframe = preg_replace('/height="\d+"/', 'height="400"', $new_iframe);
			} else {
				$new_iframe = str_replace('height="', 'height="400" ', $new_iframe);
			}
			$new_iframe = str_replace('<iframe', '<iframe style="border-radius: 10px;"', $new_iframe);

			// replace the original iframe HTML with the updated one
			$string = str_replace($match, $new_iframe, $string);
		}

		// return the updated string
		return $string;
	}


	function look_chapterfull(Request $req)
	{
		$out = $this->send_get(["tag" => "chapterfull", "currentId" => $this->sdmenc($req["currentId"])]);

		$out[0]["story"] = $this->fix_character_encoding($out[0]["story"]);
		$out[0]["coverimg"] = asset('lore_images/' . $out[0]["coverimg"]);
		return json_encode($out);
	}
	function fire_deletechapter(Request $req)
	{
		return $this->send_get(["tag" => "deletechapter", "currentId" => $this->sdmenc($req["currentId"])], true);
	}
	function look_addedstories()
	{
		$out = $this->send_get([
			"tag" => "addedstories"
		]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {

			$toecho .= "<tr>
				<td>" . $out[$i]["chapter"] . "</td>
				<td><a href='#' data-toggle='modal' data-target='#mdl_editstorymodal' data-itemid='" . $out[$i]["id"] . "' onclick='getFullStoryInfo(this)'>" . $out[$i]["title"] . "</a></td>
				<td>" . $out[$i]["story"] . "... " . "<a data-toggle='modal' data-target='#mdl_viewchapter' href='#' onclick='loadChapterFull(this)' data-dataid='" . $out[$i]["id"] . "'>read all</a>" . "</td>
				<td>" . $out[$i]["publishdate"] . "</td>
				<td><button onclick='openDeleteChapter(this)' data-toggle='modal' data-target='#mdl_deletechapter' data-dataid='" . $out[$i]["id"] . "' class='btn btn-light text-danger'><i class='fa-sharp fa-solid fa-trash'></i></button></td>
			</tr>";
		}
		return $this->fix_character_encoding($toecho);
	}
	function fire_newstordata(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'vl_coverimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('vl_coverimg');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('lore_images/') . $fname, $quality);

			return $this->send([
				"tag" => "newstordata",
				"vl_coverimg" => $this->sdmenc($fname),
				"vl_chapnum" => $this->sdmenc($req["vl_chapnum"]),
				"vl_chaptitle" => $this->sdmenc($req["vl_chaptitle"]),
				"vl_chapstory" => $this->sdmenc($req["vl_chapstory"]),
				"vl_publishdt" => $this->sdmenc($req["vl_publishdt"])
			]);
		} else {
			return "error";
		}



	}
	function fire_deletehackwin(Request $req)
	{
		return $this->send_get(["tag" => "deletehackwin", "currentId" => $this->sdmenc($req["currentId"])], true);
	}
	function fire_deleteucwin(Request $req)
	{
		return $this->send_get(["tag" => "deleteucwin", "currentId" => $this->sdmenc($req["currentId"])], true);
	}
	function fire_deletetagiswin(Request $req)
	{
		return $this->send_get(["tag" => "deletetagiswin", "currentId" => $this->sdmenc($req["currentId"])], true);
	}
	function fire_addhackwin(Request $req)
	{
		return $this->send([
			"tag" => "addnewhackwin",
			"vl_hackdate" => $this->sdmenc($req["vl_hackdate"]),
			"vl_hackmessage" => $this->sdmenc($req["vl_hackmessage"]),
			"vl_ph_ne" => $this->sdmenc($req["vl_ph_ne"]),
			"vl_ph_fe" => $this->sdmenc($req["vl_ph_fe"]),
			"vl_ph_peli" => $this->sdmenc($req["vl_ph_peli"]),
			"vl_int_ne" => $this->sdmenc($req["vl_int_ne"]),
			"vl_int_fe" => $this->sdmenc($req["vl_int_fe"]),
			"vl_int_peli" => $this->sdmenc($req["vl_int_peli"])
		], true);
	}

	function fire_adducwin(Request $req)
	{
		return $this->send([
			"tag" => "addnewucwin",
			"vl_ucdate" => $this->sdmenc($req["vl_ucdate"]),
			"vl_ucmessage" => $this->sdmenc($req["vl_ucmessage"]),
			"vl_ph_ucwin" => $this->sdmenc($req["vl_ph_ucwin"]),
			"vl_int_ucwin" => $this->sdmenc($req["vl_int_ucwin"]),
		], true);
	}

	function fire_addtagiswin(Request $req)
	{
		return $this->send([
			"tag" => "addnewtagiswin",
			"vl_tagisseason" => $this->sdmenc($req["vl_tagisseason"]),
			"vl_tagisdate" => $this->sdmenc($req["vl_tagisdate"]),
			"vl_tagismessage" => $this->sdmenc($req["vl_tagismessage"]),
			"vl_ph_tagiswin_overall" => $this->sdmenc($req["vl_ph_tagiswin_overall"]),
			"vl_ph_tagiswin_archer" => $this->sdmenc($req["vl_ph_tagiswin_archer"]),
			"vl_ph_tagiswin_brawler" => $this->sdmenc($req["vl_ph_tagiswin_brawler"]),
			"vl_ph_tagiswin_shaman" => $this->sdmenc($req["vl_ph_tagiswin_shaman"]),
			"vl_ph_tagiswin_swordsman" => $this->sdmenc($req["vl_ph_tagiswin_swordsman"]),
			"vl_int_tagiswin_overall" => $this->sdmenc($req["vl_int_tagiswin_overall"]),
			"vl_int_tagiswin_archer" => $this->sdmenc($req["vl_int_tagiswin_archer"]),
			"vl_int_tagiswin_brawler" => $this->sdmenc($req["vl_int_tagiswin_brawler"]),
			"vl_int_tagiswin_shaman" => $this->sdmenc($req["vl_int_tagiswin_shaman"]),
			"vl_int_tagiswin_swordsman" => $this->sdmenc($req["vl_int_tagiswin_swordsman"]),
		], true);
	}
	function look_gethackwins()
	{
		$out = $this->send_get(["tag" => "gethackwins"]);

		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "
				<tr>
					<td><a href='#' data-toggle='modal' data-target='#mdl_viewhackathonwinners' onclick='openHackathonView(this)' data-itemid='" . $out[$i]["id"] . "'>" . date("F d, Y", strtotime($out[$i]["hackdate"])) . "</a></td>
					<td><ul><li><small class='text-primary'>N.E: </small>" . $out[$i]["ph_ne"] . "</li><li><small class='text-danger'>F.E: </small>" . $out[$i]["ph_fe"] . "</li><li><small class='text-warning'>PELI: </small> " . $out[$i]["ph_peli"] . "</li></ul></td>
					<td><ul><li><small class='text-primary'>N.E: </small>" . $out[$i]["int_ne"] . "</li><li><small class='text-danger'>F.E: </small>" . $out[$i]["int_fe"] . "</li><li><small class='text-warning'>PELI: </small> " . $out[$i]["int_peli"] . "</li></ul></td>
					<td><button class='btn btn-light text-danger' onclick='openDelete(this)' data-dtid='" . $out[$i]["id"] . "'><i class='fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return $this->fix_character_encoding($toecho);
	}

	function look_getucwins()
	{

		$universities = [
			[
				"id" => 0,
				"name" => "Fiery Emerald"
			],
			[
				"id" => 1,
				"name" => "Night Eagle"
			],
			[
				"id" => 2,
				"name" => "Pelicans"
			]
		];
		$out = $this->send_get(["tag" => "getucwins"]);

		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "
				<tr>
					<td><a href='#' data-toggle='modal' data-target='#mdl_viewhackathonwinners' onclick='openUcView(this)' data-itemid='" . $out[$i]["id"] . "'>" . date("F d, Y", strtotime($out[$i]["ucdate"])) . "</a></td>
					<td>" . $universities[$out[$i]["ph_ucwin"]]["name"] . "</td>
					<td>" . $universities[$out[$i]["int_ucwin"]]["name"] . "</td>
					<td><button class='btn btn-light text-danger' onclick='openDelete(this)' data-dtid='" . $out[$i]["id"] . "'><i class='fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return $this->fix_character_encoding($toecho);
	}
	function look_gettagiswins()
	{

		$out = $this->send_get(["tag" => "gettagiswins"]);

		$toecho = "";
		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "
				<tr>
					<td><a href='#' data-toggle='modal' data-target='#mdl_viewhackathonwinners' onclick='openTagisView(this)' data-itemid='" . $out[$i]["id"] . "'>" . date("F d, Y", strtotime($out[$i]["tagisdate"])) . "</a></td>
					<td>" . $out[$i]["tagisseason"] . "</td>
					<td><ul style='list-style-type:none'><li><small class='text-primary'>OVERALL: </small>" . $out[$i]["ph_overall"] . "</li><li><small class='archer_theme' style='color:#6e1c6e;'>ARCHER: </small>" . $out[$i]["ph_archer"] . "</li><li><small style='color:#1c566e;' class=' brawler_theme'>BRAWLER: </small>" . $out[$i]["ph_brawler"] . "</li><li><small style='color:#915d00;' class='shaman_theme'>SHAMAN: </small> " . $out[$i]["ph_shaman"] . "</li><li><small style='color:#910000;' class='swordsman_theme'>SWORDSMAN: </small> " . $out[$i]["ph_swordsman"] . "</li></ul></td>
					<td><ul style='list-style-type:none'><li><small class='text-primary'>OVERALL: </small>" . $out[$i]["int_overall"] . "</li><li><small class='' style='color:#6e1c6e;'>ARCHER: </small>" . $out[$i]["int_archer"] . "</li><li><small class=' brawler_theme' style='color:#1c566e;'>BRAWLER: </small>" . $out[$i]["int_brawler"] . "</li><li><small style='color:#915d00;' class='shaman_theme'>SHAMAN: </small> " . $out[$i]["int_shaman"] . "</li><li><small style='color:#910000;' class='swordsman_theme'>SWORDSMAN: </small> " . $out[$i]["int_swordsman"] . "</li></ul></td>
					<td><button class='btn btn-light text-danger' onclick='openDelete(this)' data-dtid='" . $out[$i]["id"] . "'><i class='fa-solid fa-trash'></i></button></td>
				</tr>
			";
		}
		return $this->fix_character_encoding($toecho);
	}
	function look_getbottomsingleinfo(Request $req)
	{
		$out = $this->send_get(["tag" => "getbottomsingleinfo", "conttype" => $this->sdmenc($req["conttype"])]);
		if (count($out) != 0) {
			$out[0]["img"] = asset("bottom_img/" . $out[0]["img"]);
			$out[0]["title"] = $this->fix_character_encoding($out[0]["title"]);
			$out[0]["description"] = $this->fix_character_encoding($out[0]["description"]);
			$out[0]["btn_name"] = $this->fix_character_encoding($out[0]["btn_name"]);
		}
		return json_encode($out);
	}
	function look_getbottominfopnl()
	{
		$out = $this->send_get(["tag" => "getbottompanelinfos"]);

		for ($i = 0; $i < count($out); $i++) {
			$out[$i]["title"] = $this->fix_character_encoding($out[$i]["title"]);
			$out[$i]["description"] = $this->fix_character_encoding($out[$i]["description"]);
			$out[$i]["btn_name"] = $this->fix_character_encoding($out[$i]["btn_name"]);
		}
		return json_encode($out);
	}
	function fire_updateabottompnl(Request $req)
	{

		$validator = Validator::make($req->all(), [
			'primg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('primg');
			$extension = $image->getClientOriginalExtension();
			$extension = ($req["conttype"] == "logo") ? $extension : 'jpg';
			$image_compressed = Image::make($image)->encode($extension, $quality);
			$fname = $image_compressed->basename . time() . "." . $extension;
			$image_compressed->save(public_path('bottom_img/') . $fname, $quality);

			return $this->send([
				"tag" => "updateabottompnl",
				"title" => $this->sdmenc($req["title"]),
				"desc" => $this->sdmenc($req["desc"]),
				"promimg" => $this->sdmenc($fname),
				"btnname" => $this->sdmenc($req["btnname"]),
				"link" => $this->sdmenc($req["btnlink"]),
				"type" => $this->sdmenc($req["conttype"])
			], true);

		} else {

			return $this->send([
				"tag" => "updateabottompnl",
				"title" => $this->sdmenc($req["title"]),
				"desc" => $this->sdmenc($req["desc"]),
				"promimg" => $this->sdmenc(""),
				"btnname" => $this->sdmenc($req["btnname"]),
				"link" => $this->sdmenc($req["btnlink"]),
				"type" => $this->sdmenc($req["conttype"])
			], true);
		}
	}
	function fire_deletefeature(Request $req)
	{
		return $this->send_get(["tag" => "deleteafeature", "featureid" => $this->sdmenc($req["featid"])], true);
	}
	public function look_addedfeatures()
	{
		$out = $this->send_get(["tag" => "getalladdedfeatures"]);
		$toecho = "";

		for ($i = 0; $i < count($out); $i++) {
			$toecho .= "
				<tr>
					<td><input class='form-control' onchange='applyFeatureOrder(this)' data-itemid='" . $out[$i]["id"] . "' type='number' value='" . (($out[$i]["order_no"] == "" || $out[$i]["order_no"] == null) ? "0" : $out[$i]["order_no"]) . "' style='width: 100px;'></td>
					<td><img loading='lazy' src='" . asset("feature_images/" . $out[$i]["featureimg"]) . "' style='width: 100px;'></td>
					<td><a href='#' data-toggle='modal' data-target='#mdl_featurepreview' onclick='getFeatureInfo(this)' data-itemid='" . $out[$i]["id"] . "'><strong>" . $out[$i]["feattitle"] . "</strong></a></td>
					<td>" . "<button class='btn btn-light text-danger'
					data-featureid='" . $out[$i]["id"] . "'
					onclick='openDeleteFeature(this)'
					
					><i class='fa-solid fa-trash'></i></button>
					</td>
				</tr>
			";
		}
		return $this->fix_character_encoding($toecho);
	}
	public function fire_addnefeature(Request $req)
	{


		$validator = Validator::make($req->all(), [
			'promimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30120',
		]);
		$result = "";
		if ($validator->fails()) {
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {

			$quality = 100;
			if ($req["reduce"] == "1") {
				$quality = 35;
			}


			$image = $req->file('promimg');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('feature_images/') . $fname, $quality);


			$out = $this->send([
				"tag" => "addnewfeaturenow",
				"feattitle" => $this->sdmenc($req["featname"]),
				"featdesc" => $this->sdmenc($req["featdesc"]),
				"featimg" => $this->sdmenc($fname)
			]);

			return json_encode($req["reduce"]);
		}
	}
	public function fire_latestCoverPhoto()
	{
		$out = $this->send_get(["tag" => "getlatestcover"]);
		if (count($out) != 0) {
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
			$result = 'Validation failed: ' . implode(', ', $validator->errors()->all());
		}
		if ($result == "") {




			$quality = 100;
			if ($request["reduce"] == "1") {
				$quality = 35;
			}


			$image = $request->file('image');
			$image_compressed = Image::make($image)->encode('jpg', $quality);
			$fname = $image_compressed->basename . time() . ".jpg";
			$image_compressed->save(public_path('home_cover_photo/') . $fname, $quality);


			$out = $this->send([
				"tag" => "addhomefeature",
				"conttype" => $this->sdmenc("cover"),
				"img" => $this->sdmenc($fname),
				"title" => $this->sdmenc(""),
				"desc" => $this->sdmenc(""),
				"link" => $this->sdmenc(""),
				"btnhome" => $this->sdmenc("")
			], true);

			$result = 'Image uploaded successfully. File path: ' . $fname . "---" . $out;


		}
		return $result;
	}
	public function look_loginadmin(Request $req)
	{
		// usrname
		// usrpaword

		$out = $this->send([
			"tag" => "loginattempt",
			"paruname" => $this->sdmenc($req["usrname"]),
			"parpassword" => $this->sdmenc($req["usrpaword"])
		], true);
		$isGood = "0";

		if ($out == "setup") {
			$isGood = "2";
		} else {
			$out = json_decode($out, true);
			if (count($out) == 1) {
				$isGood = "1";
				$profilepic = asset("admin_profiles/") . "/" . $out[0]["profilepic"];
				session(["user_features" => $out[0]["feature_set"]]);
				session(["user_name" => $out[0]["username"]]);
				session(["user_id" => $out[0]["id"]]);
				session(["user_profile" => $profilepic]);
				session(["user_featureset" => $out[0]["feature_set"]]);

			}

		}

		return $isGood;

	}







	public function sdmenc($data)
	{
		$keycode = openssl_digest(utf8_encode(PKEY), "sha512", true);
		$string = substr($keycode, 10, 24);
		$utfData = utf8_encode($data);
		$encryptData = openssl_encrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA, '');
		$base64Data = base64_encode($encryptData);
		if ($base64Data == "") {
			return $data;
		} else {
			return $base64Data;
		}
	}
	public function sdmdec($data)
	{
		$keycode = openssl_digest(utf8_encode(PKEY), "sha512", true);
		$string = substr($keycode, 10, 24);
		$utfData = base64_decode($data);
		$decryptData = openssl_decrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA, '');
		if ($decryptData == "") {
			return $data;
		} else {
			return $decryptData;
		}
	}

	public function send($contents, $free_result = false, $ws_link = "")
	{

		$ws_link = WEBSERVICE_URL;


		$contents["tag"] = $this->sdmenc($contents["tag"]);


		$client = new \GuzzleHttp\Client();
		$res = $client->request("POST", $ws_link, ["form_params" => $contents]);
		$out = $res->getBody()->getContents();
		if ($free_result == false) {
			return json_decode($this->sdmdec($out), true);
		} else {
			return $out;
		}
	}

	public function send_get($contents, $free_result = false, $ws_link = "")
	{

		$ws_link = WEBSERVICE_URL;

		$contents["tag"] = $this->sdmenc($contents["tag"]);


		$client = new \GuzzleHttp\Client();
		$res = $client->request("GET", $ws_link, [
			"query" => $contents,
			"headers" => [
				'Content-Type' => 'text/html; charset=utf-8'
			]
		]);
		$out = $res->getBody()->getContents();
		if ($free_result == false) {
			return json_decode($this->sdmdec($out), true);
		} else {
			return $out;
		}
	}


	public function DateExplainer($starting_time, $withformat = false)
	{
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
				if ($withformat == true) {
					$toreturn = "<span style='color: #025CC0 !important;'>Just now</span>";
				} else {
					$toreturn = "Just now";
				}

			} else if ($mins == '1' && $hours == '0') {
				if ($withformat == true) {
					$toreturn = "<span style='color: #025CC0 !important;'>a minute ago</span>";
				} else {
					$toreturn = "a minute ago";
				}
			} else {
				if ($hours == '0') {
					if ($withformat == true) {
						$toreturn = "<span style='color: #025CC0 !important;'>$mins mins ago</span>";
					} else {
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
		return "<span title='" . date("F d, Y g:i a", strtotime($starting_time)) . "'>" . $toreturn . "</span>";
	}
	public function fire_addnewgolfcoursesubadmin(Request $req)
	{
		$out = $this->send([
			"tag" => "add_new_subcourse",
			"gid" => $this->sdmenc($req["gcourse_id"]),
			"cname" => $this->sdmenc($req["cousename"]),
			"cdesc" => $this->sdmenc($req["coursedesc"]),
			"chols" => $this->sdmenc($req["courseholses"]),
			"cminp" => $this->sdmenc($req["courseminplayer"]),
			"cmaxp" => $this->sdmenc($req["coursemaxplayer"])
		], true);

		return json_encode($out);
	}
	public function uni_encoder($data)
	{
		return htmlentities(addslashes($data));
	}
	public function uni_decoder($data)
	{
		return html_entity_decode(htmlspecialchars(stripslashes($data)));
	}




}