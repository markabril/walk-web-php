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



}