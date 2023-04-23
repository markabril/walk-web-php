<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PUBLIC
Route::get("",['uses'=>'functions@fly_home','as'=>'goto_home']);
Route::get("/team",['uses'=>'functions@fly_team','as'=>'goto_team']);
Route::get("/partner",['uses'=>'functions@fly_partner','as'=>'goto_partner']);
Route::get("/aboutus",['uses'=>'functions@fly_aboutus','as'=>'goto_aboutus']);
Route::get("/faq",['uses'=>'functions@fly_faq','as'=>'goto_faq']);
Route::get("/contactus",['uses'=>'functions@fly_contactus','as'=>'goto_contactus']);
Route::get("/termsandconditions",['uses'=>'functions@goto_terms','as'=>'goto_terms']);
Route::get("/privacypolicy",['uses'=>'functions@goto_privacypolicy','as'=>'goto_privacypolicy']);
Route::get("/storymode",['uses'=>'functions@fly_story','as'=>'goto_story']);
Route::get("/lore",['uses'=>'functions@fly_lore_c1','as'=>'goto_lore_c1']);
Route::get("/hackathonhistory",['uses'=>'functions@fly_hackwinners','as'=>'goto_hackwinners']);
Route::get("/getfeturedhome",['uses'=>'functions@look_homefeatured','as'=>'stole_homefeatured']);
Route::get("/getallstorypublicchap",['uses'=>'functions@look_getallchapterslist','as'=>'stole_getallchapterslist']);
Route::get("/getchpaterpublicdeteils",['uses'=>'functions@look_singlechaptercontpublic','as'=>'stole_singlechaptercontpublic']);
Route::get("/geminiclist",['uses'=>'functions@look_getallchapterslistminimal','as'=>'stole_getallchapterslistminimal']);
Route::get("/newsandupdates",['uses'=>'functions@fly_news','as'=>'goto_news']);
Route::get("/getnewspublic",['uses'=>'functions@look_publicnews','as'=>'stole_publicnews']);
Route::get("/newscontent",['uses'=>'functions@fly_newscontent','as'=>'goto_newscontent']);
Route::get("/getcontentsingle",['uses'=>'functions@look_singlenewspublic','as'=>'stole_singlenewspublic']);
Route::get("/classoverview",['uses'=>'functions@fly_classoverview','as'=>'goto_classoverview']);
Route::get("/getlatestnews",['uses'=>'functions@look_latestnews','as'=>'stole_latestnews']);
Route::get("/getpublicmembers",['uses'=>'functions@look_publicmembers','as'=>'stole_publicmembers']);
Route::get("/getpublishedjobposting",['uses'=>'functions@look_publishedjobposting','as'=>'stole_publishedjobposting']);
Route::get("/fulljobinfosingle",['uses'=>'functions@look_fulljobinfo','as'=>'stole_fulljobinfo']);


//admin pages

Route::get("/admin",['uses'=>'functions@fly_admin','as'=>'goto_admin']);
Route::get("/admindashboard",['uses'=>'functions@fly_admindashboard','as'=>'goto_admindashboard']);

Route::get("/mamangehomepage",['uses'=>'functions@fly_managehome','as'=>'goto_managehome']);
Route::get("/managehackathonwinners",['uses'=>'functions@fly_hackathonwinners','as'=>'goto_hackathonwinners']);
Route::get("/managestory",['uses'=>'functions@fly_mamagestory','as'=>'goto_mamagestory']);
Route::get("/publicteammembers",['uses'=>'functions@fly_managepublicmembers','as'=>'goto_managepublicmembers']);
Route::get("/jobposting",['uses'=>'functions@fly_managejobposting','as'=>'goto_managejobposting']);
Route::get("/headerandfooter",['uses'=>'functions@fly_manageheaderfoot','as'=>'goto_manageheaderfoot']);
Route::get("/contributors",['uses'=>'functions@fly_managecontributors','as'=>'goto_managecontributors']);
Route::get("/logs",['uses'=>'functions@fly_managelogs','as'=>'goto_managelogs']);
Route::get("/logoutattempt",['uses'=>'functions@fly_logout','as'=>'goto_logout']);

//functionalities of admin
Route::post("/loginattempt",['uses'=>'functions@look_loginadmin','as'=>'stole_loginadmin']);
Route::post("/uploadhomecover",['uses'=>'functions@fire_uploadhomecover','as'=>'shoot_uploadhomecover']);
Route::get("/latestcoverphoto",['uses'=>'functions@fire_latestCoverPhoto','as'=>'stole_latestCoverPhoto']);
Route::post("/addnewfeature",['uses'=>'functions@fire_addnefeature','as'=>'shoot_addnefeature']);
Route::get("/getallnewfeatures",['uses'=>'functions@look_addedfeatures','as'=>'stole_addedfeatures']);
Route::get("/deletefeature",['uses'=>'functions@fire_deletefeature','as'=>'shoot_deletefeature']);
Route::post("/updateabottompnl",['uses'=>'functions@fire_updateabottompnl','as'=>'shoot_updateabottompnl']);
Route::get("/getbottompnlinfo",['uses'=>'functions@look_getbottominfopnl','as'=>'stole_getbottominfopnl']);
Route::get("/getsinglebottominf",['uses'=>'functions@look_getbottomsingleinfo','as'=>'stole_getbottomsingleinfo']);

Route::post("/addnewhackwinner",['uses'=>'functions@fire_addhackwin','as'=>'shoot_addhackwin']);
Route::get("/gethackwinners",['uses'=>'functions@look_gethackwins','as'=>'stole_gethackwins']);
Route::get("/delhackwin",['uses'=>'functions@fire_deletehackwin','as'=>'shoot_deletehackwin']);
Route::post("/addnewchapter",['uses'=>'functions@fire_newstordata','as'=>'shoot_newstordata']);
Route::get("/getallstoriesencoded",['uses'=>'functions@look_addedstories','as'=>'stole_addedstories']);

Route::get("/getfullchapter",['uses'=>'functions@look_chapterfull','as'=>'stole_chapterfull']);
Route::get("/deletechapter",['uses'=>'functions@fire_deletechapter','as'=>'shoot_deletechapter']);

Route::get("/getteams",['uses'=>'functions@look_getteam','as'=>'stole_getteam']);
Route::post("/addnewteam",['uses'=>'functions@fire_addteam','as'=>'shoot_addteam']);
Route::get("/deleteateam",['uses'=>'functions@fire_deleteteam','as'=>'shoot_deleteteam']);

Route::get("/getobs",['uses'=>'functions@look_getjobs','as'=>'stole_getjobs']);
Route::post("/addjob",['uses'=>'functions@fire_addjob','as'=>'shoot_addjob']);
Route::get("/deletejob",['uses'=>'functions@fire_deletejob','as'=>'shoot_deletejob']);
Route::post("/updatejobstatus",['uses'=>'functions@fire_updatejobstatus','as'=>'shoot_updatejobstatus']);

Route::get("/gethomecover",['uses'=>'functions@look_homecoverphoto','as'=>'stole_homecoverphoto']);
Route::get("/gethomehackwins",['uses'=>'functions@look_homehackathonwinners','as'=>'stole_homehackathonwinners']);
Route::get("/gethomefeatures",['uses'=>'functions@look_homefeatures','as'=>'stole_homefeatures']);
Route::get("/gethomebottompnl",['uses'=>'functions@look_homebottompanel','as'=>'stole_homebottompanel']);

Route::get("/gethackwinhistory",['uses'=>'functions@look_gethackathonwinshistory','as'=>'stole_gethackathonwinshistory']);
Route::get("/getlatestfeatured",['uses'=>'functions@look_latestfeatured','as'=>'stole_latestfeatured']);
Route::get("/accountsetup",['uses'=>'functions@look_accountsetup','as'=>'fly_accountsetup']);

Route::post("/accountcreation",['uses'=>'functions@fire_createaccount','as'=>'shoot_createaccount']);
Route::get("/managenews",['uses'=>'functions@fly_managenews','as'=>'goto_managenews']);
Route::post("/publishnews",['uses'=>'functions@fire_publishnews','as'=>'shoot_publishnews']);
Route::get("/getnews",['uses'=>'functions@look_getallnews','as'=>'stole_getallnews']);
Route::post("/deletenews",['uses'=>'functions@fire_deletenews','as'=>'shoot_deletenews']);
Route::post("/addnewupdatesetup",['uses'=>'functions@fire_addnewupdatesetup','as'=>'shoot_addnewupdatesetup']);
Route::get("/getupdatesadmin",['uses'=>'functions@look_updatesfromadmin','as'=>'stole_updatesfromadmin']);
Route::get("/seeupdateitems",['uses'=>'functions@look_updateitems','as'=>'stole_updateitems']);
Route::post("/addupdateitems",['uses'=>'functions@fire_newupdateitem','as'=>'shoot_newupdateitem']);
Route::get("/getpublicupdates",['uses'=>'functions@look_publicupdates','as'=>'stole_publicupdates']);
Route::get("/updatebasic",['uses'=>'functions@look_updatebasicinfo','as'=>'stole_updatebasicinfo']);
Route::post("/deleteupdateitem",['uses'=>'functions@fire_deletefeatureitem','as'=>'shoot_deletefeatureitem']);
Route::post("/delupdaterec",['uses'=>'functions@fire_deleteupdaterec','as'=>'shoot_deleteupdaterec']);
Route::get("/updateoverview",['uses'=>'functions@fly_updateoverview','as'=>'goto_updateoverview']);
Route::get("/featuredtailsfull",['uses'=>'functions@look_publicupdatedetailsfull','as'=>'stole_publicupdatedetailsfull']);
Route::post("/addnewcontributor",['uses'=>'functions@fire_addcontributor','as'=>'shoot_addcontributor']);
Route::get("/getcontributors",['uses'=>'functions@look_allcontributors','as'=>'stole_allcontributors']);
Route::get("/manageaccount",['uses'=>'functions@fly_manageaccount','as'=>'goto_manageaccount']);


Route::post("/chpass",['uses'=>'functions@fire_changepassword','as'=>'shoot_changepassword']);
Route::post("/chrole",['uses'=>'functions@fire_changerole','as'=>'shoot_changerole']);
Route::post("/chusername",['uses'=>'functions@fire_changeusername','as'=>'shoot_changeusername']);
Route::post("/chprppic",['uses'=>'functions@fire_changeprofilepic','as'=>'shoot_changeprofilepic']);

Route::get("/getmybasicinfo",['uses'=>'functions@look_getmyinfobasic','as'=>'stole_getmyinfobasic']);












































