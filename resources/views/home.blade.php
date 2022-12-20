@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
	.download_img{
		height: 50px;
	}

	.img_screenshots{
		width:100%;
		border-radius: 6px;
		border:  1px solid rgba(255, 255, 255, 0.3);
		margin-bottom: 40px;
	}
</style>
@include('comp.header_public')

	<div class="banner_grande" style="
	background:url({{ asset('photos/art/defender.png') }});

	display: block;
	position:fixed;
	top: 0;
	left: 0;
	right: 0;
	
	z-index:-1;
	margin-top: 50px;
	height: 100vh;
	width:100%;
	background-size: cover;
	background-position:center;
	animation-name: entrance_banner;
	animation-duration: 4s;

	">
		<div style="
		display: block;
position: relative;
top: 0;
left: 0;
bottom: 0;
right: 0;
height: 100%;
width: 100%;
background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #16232F 100%);
		">
			<center>
				
				<h1 class="shadowtext" style="margin-top: 23vh; font-size: 40px;">
					<img src="{{ asset('photos/transparents/walktext.png') }}" class="walktext" style="width:70%; max-width:900px;" loading="lazy">
				</h1>

			</center>
			<div class="container mt-5 shadowtext " style="opacity: 0.9; text-align:center;">
	
			</div>
		</div>
	</div>

<div class="container_cover">

	<img class="floaties" src="{{ asset('photos/transparents/pat1.png') }}" loading="lazy">
	<div class="container mt-5"  >
	
	<div class="row">
		<div class="col-md-12">
			<center>
			<img src="{{ asset('photos/icons/icon_walkonlinesingle.png') }}" class="mb-5" alt="wlogo" border="0">

			<p><img src="{{ asset('photos/transparents/walkphone.png') }}" loading="lazy" style="width:90%;"></p>
			<h5 class="mb-5 readable text-muted"><span class="littext">WALK ONLINE</span> is a mobile MMORPG made by Filipino developers. A 3D game that offers PvP, Party, Hackathon, Quests & Special Events based on the Philippine setting. So, what are you waiting for? Explore the thrilling adventures now!</h5>
			</center>
		</div>
		<div class="col-md-12">
			<center>
				<div class="separator-blue-center mb-5"></div>
				<h3>WELCOME TO THE<br><b class="littext" style="letter-spacing: 10px !important; font-size: 60px !important;">UNIVERSITIES!</b></h3>
				<div class="separator-blue-center mt-5 mb-5"></div>
			</center>
			<div class="card-deck">
				
				<div class="card card-primary mt-3">
					<div class="card-body">
							<center>
								<img loading="lazy" src="{{ asset('photos/icons/ne.png') }}" style="height: 150px;">
								<h5 style="color: #22AEC3;" class="mt-3 mb-4 shadowtext">Night Eagle</h5>
						
								<button class="btn btn-primary" data-toggle='modal' data-target='#mdl_enroll_ne'>Learn More</button>
							</center>
					</div>
				</div>

				<div class="card card-danger" style="transform: scale(1.1);">
					<div class="card-body">
							<center>
								<img loading="lazy" src="{{ asset('photos/icons/fe.png') }}" style="height: 150px;">
								<h5 style="color: #F9602E;" class="mt-3 mb-4 shadowtext">Fiery Emerald</h5>
								
								<button class="btn btn-danger" data-toggle='modal' data-target='#mdl_enroll_fe'>Learn More</button>
							</center>
					</div>
				</div>

				<div class="card card-warning mt-3">
					<div class="card-body">
							<center>
								<img loading="lazy" src="{{ asset('photos/icons/peli.png') }}" style="height: 150px;">
								<h5 style="color: #FBD841;" class="mt-3 mb-4 shadowtext">Pelicans</h5>
							
								<button class="btn btn-warning" data-toggle='modal' data-target='#mdl_enroll_peli'>Learn More</button>
							</center>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
		<center>
		<div class="separator-gold-center mb-2 mt-5"></div>
			<h4 class="shadowtext">CHOOSE YOUR CLASS</h4>
			<div class="separator-gold-center mt-2 mb-5"></div>
		</center>
		</div>
		<div class="col-md-12">
			<div class="row" style="perspective: 1000px;">
				<div class="col-md-3">
				<div data-toggle="modal" data-target="#mdl_swordsman" style='transform:rotatey(30deg) rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_swordsman.png') }})' class="char_holder">
			<div class="bg_separator">
			<img class="charcard_icon" style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/swordsman.png') }}" alt="swordsman" border="0">
				<h5 class="charcard_title littext">SWORDSMAN</h5>
			</div>
			</div>
				</div>
				<div class="col-md-3">
				<div  data-toggle="modal" data-target="#mdl_shaman" style='transform:rotatey(30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_shaman.png') }})' class="char_holder">
				<div class="bg_separator">
			<img class="charcard_icon" style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/shaman.png') }}" alt="swordsman" border="0">
				<h5 class="charcard_title littext">SHAMAN</h5>
			</div>
			</div>
				</div>
				<div class="col-md-3">
				<div  data-toggle="modal" data-target="#mdl_brawler" style='transform:rotatey(-30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_brawler.png') }})' class="char_holder">
				<div class="bg_separator">
			<img class="charcard_icon" style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/brawler.png') }}" alt="swordsman" border="0">
				<h5 class="charcard_title littext">BRAWLER</h5>
			</div>
			</div>
				</div>
				<div class="col-md-3">
				<div  data-toggle="modal" data-target="#mdl_archer" style='transform:rotatey(-30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_archer.png') }})' class="char_holder">
				<div class="bg_separator">
			<img class="charcard_icon" style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/archer.png') }}" alt="swordsman" border="0">
				<h5 class="charcard_title littext">ARCHER</h5>
			</div>
			</div>
				</div>
			</div>

		

			<div class="separator-gold-center mt-5" style="margin-bottom: 15vh;"></div>
		</div>
		<div class="col-md-6">
			<img src="{{ asset('photos/screenshots/8.jpg') }}" loading="lazy" class="img_screenshots">
		</div>
		<div class="col-md-6">
			<h5 class="littext">Student Organization</h5>
				<div class="separator-blue-left-thin mb-3"></div>
			<p class="readable">Organized Group of players that regularly play together. They can join in Hackathon Events and earn amazing rewards for the winning Guilds!</p>
		</div>
<div class="col-sm-12">
	<br>
		<br>
</div>
		<div class="col-md-6">
			<img src="{{ asset('photos/screenshots/5.jpg') }}" loading="lazy" class="img_screenshots">
		</div>
		<div class="col-md-6">
			

					<h5 class="littext">In-Game Trading System</h5>
						<div class="separator-blue-left-thin mb-3"></div>
			<p class="readable">The Trading System is an awesome feature for player that allows them to exchange items with other players.</p>
		</div>
<div class="col-sm-12">
	<br>
		<br>
</div>
		<div class="col-md-6">
				<img src="{{ asset('photos/screenshots/2.jpg') }}" loading="lazy" class="img_screenshots">
		</div>
		<div class="col-md-6">
			<h5 class="littext">Party</h5>
				<div class="separator-blue-left-thin mb-3"></div>
			<p class="readable">Parties are groups of players, that can consist of two to eight players. Players can also help each other to reach their personal goals faster.</p>
		</div>
<div class="col-sm-12">
	<br>
		<br>
</div>
		<div class="col-md-6">
			<img src="{{ asset('photos/screenshots/3.jpg') }}" loading="lazy" class="img_screenshots">
		</div>
		<div class="col-md-6">
			<h5 class="littext">In-Game Friend</h5>
				<div class="separator-blue-left-thin mb-3"></div>
			<p class="readable">Do you want to make friends in the game? Worry not for you can add or remove them in your friend list.</p>
		</div>
<div class="col-sm-12">
	<br>
		<br>
</div>
		<div class="col-md-6">
			<img src="{{ asset('photos/screenshots/20.jpg') }}" loading="lazy" class="img_screenshots">
		</div>
		<div class="col-md-6">
			<h5 class="littext">Student Hackathon</h5>
				<div class="separator-blue-left-thin mb-3"></div>
			<p class="readable">Hackathon is one of the main events of Walk Online Mobile where various student organizations fight each other to win amazing rewards! Join every Wednesday and Saturday at 7:00 pm and see for yourself how thrilling and exciting this Hackathon is!</p>
		</div>
		<div class="col-sm-12 mt-5 mb-5">
</div>


		<div class="col-sm-6">
			


				<div class="card card-simple" style="margin: auto;">
					<div class="card-body">
						<div class="row">
					<div class="col-sm-4">
							<img src="{{ asset('photos/poster/walklogo.png')}}" loading="lazy" style="width:100%; border-radius: 5px;">
					</div>
					<div class="col-sm-8">
							<div class="mt-4 mb-4">
							<h3><b class="littext" style="letter-spacing: 10px !important;">PLAY WITH US</b></h3>
									<div class="separator-gold-left mb-4"></div>
					<h5 class="readable" style="height: 100px;">Walk Online Mobile is now available on Google Play!</h5>

					<a class="btn btn-primary btn-lg mb-4 mt-4" target="_blank" href="https://play.google.com/store/apps/details?id=com.light.walkonlinedev&hl=en&gl=US">Get it Now</a>
							</div>
					</div>
				</div>
					</div>
				</div>
		</div>


		<div class="col-sm-6">
			


				<div class="card card-simple" style="margin: auto; ">
					<div class="card-body">
						<div class="row">
					<div class="col-sm-4">
							<img src="{{ asset('photos/poster/walkmerch.png')}}" loading="lazy" style="width:100%; border-radius: 5px;">
					</div>
					<div class="col-sm-8">
							<div class="mt-4 mb-4">
							<h3><b class="littext" style="letter-spacing: 10px !important;">AVAILABLE NOW!</b></h3>
									<div class="separator-gold-left mb-4"></div>
					<h5 class="readable" style="height: 100px;">Get your exclusive Walk Online Mobile hoodies and more from our new Walk Online Merch Store!</h5>

					<a class="btn btn-warning btn-lg mb-4 mt-4" data-toggle="modal" data-target="#mdl_maintenance">Shop Now</a>
							</div>
					</div>
				</div>
					</div>
				</div>
			
		</div>

		<div class="col-sm-12 mt-5 mb-5">
</div>

	</div>
</div>
</div>





<div class="modal" tabindex="-1" role="dialog" id="mdl_enroll_ne">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Night Eagle University</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="readable shadowtext">The Night Eagle University is one among the chosen three Organizations under Project University that undergoes specialized combat training for students to defend humanity against world-ending threats.
Founded by Night Eagle Organization (N.E.O.) started its program when the Philippine Eagle species dwindled its number around the world; N.E.O. is now about preserving all natural resources, specifically forests, that were a natural habitat for all species. N.E.O. is a Non-government Organization and took funds from small business agencies and donations from various organizations to finance Night Eagle University and other projects.</p>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_enroll_peli">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pelican University</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="readable shadowtext">
The Pelicans University is one among the chosen three Organizations under Project University that undergoes specialized combat training for students to defend humanity against world-ending threats.
After a small medical facility near the shores of Alaminos discovered a temporary cure for cancer, the Pelicans Institute of the Philippines changed its name to Oceanography Medical Research Institute (O.M.R. Institute) to expand its aquatic-based medical research. The O.M.R. Institute named their school “Pelicans University,” which they called before the establishment of O.M.R. institute to pay respect to their old medical research bases near a beach full of wild pelicans that became the image of their organization.</p>
      </div>
  
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_enroll_fe">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Fiery Emerald University</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="readable shadowtext">The Fiery Emerald University is one among the chosen three Organizations under Project University that undergoes specialized combat training for students to defend humanity against world-ending threats.
The United Jewel Sellers Bank (U.J.S. Bank) that funds the Fiery Emerald University started as local jewel traders until they discovered a rare gemstone sold to research agencies, corporations, and collectors; that monopolized the whole gem trading industry. These rare gemstones are capable of absorption and dispersion; of any specific elemental energy that became a vital component of any weapon created by the KLAW Industries.</p>
      </div>
   
    </div>
  </div>
</div>




<div class="modal" tabindex="-1" role="dialog" id="mdl_maintenance">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Merch Store</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable text-light">
		<div class='mt-5 mb-5 mr-3 ml-3'>
			<h4><i class="far littext fa-exclamation-circle"></i> Website is under <b>MAINTENANCE</b></h4>
			<p class='mb-0'>Our website is currently undergoing scheduled maintenance.
			We should be back shortly. Thank vou for vour patience.</p>
		</div>
      </div>
  
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_swordsman">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Swordsman Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable text-light">
		
	  <div class="row">
			  		<div class="col-md-4">
			  			<div style='background-image: url({{ asset('photos/transparents/ff_swordsman.png') }})' class="char_holder">
			  			</div>
			  		</div>
			  		<div class="col-md-8">
			  		<div class="card card-primary mb-3"><div class="card-body">	<small class="littext">DESCRIPTION</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<p class="readable" >The Swordsman class excels through offensive and defensive stats and is often used to taunt and lure foes to attack them; however, they rely on health and mana potions to last in battle. Their ability to withstand attacks allows heavy hitter classes (Archer, Shaman, Brawler) to counterattack enemy mobs attacking the swordsman, mitigating enemy damage while balancing the party.</p></div></div>

			  			<div class="card card-warning mb-3">
			  				<div class="card-body">
			  					<small class="littext">TRAITS</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<ul class="readable">
			  				<li>Able to use all kinds of swords</li>
			  				<li>Heavy duty againts brawlers</li>
			  				<li>Best paired with an archer class to fight against shamans</li>
			  			</ul>

			  				</div>
			  			</div>
			  			
			  		</div>
			  	</div>

      </div>
  
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_shaman">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Shaman Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable text-light">
	  <div class="row">
			  		<div class="col-md-4">
			  			<div style='background-image: url({{ asset('photos/transparents/ff_shaman.png') }})' class="char_holder">
			  			
			  					
			  			
			  			</div>
			  		</div>
			  		<div class="col-md-8">
			  		<div class="card card-primary mb-3"><div class="card-body">	<small class="littext">DESCRIPTION</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<p class="readable" >The Shaman class uses their spell-casting abilities to change battle outcomes; spear-wielder shaman has increased physical strength, while staff wielder is on support type through debuffing enemies, healing, or strengthening allies. Shamans may lack defense but excel through slow casting but damaging AoE spells.</p></div></div>
			  			<div class="card card-warning mb-3">
			  				<div class="card-body">
			  					<small class="littext">TRAITS</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<ul class="readable">
			  				<li>Able to use all kinds of magical items specially staff</li>
			  				<li>Can be useful against all kinds of foes</li>
			  				<li>Best paired with swordsman</li>
			  			</ul>

			  				</div>
			  			</div>
			  			
			  		</div>
			  	</div>
	  
      </div>
  
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_brawler">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Brawler Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable text-light">
	  <div class="row">
			  		<div class="col-md-4">
			  			<div style='background-image: url({{ asset('photos/transparents/ff_brawler.png') }})' class="char_holder">
			  				
			  					
			  				
			  			</div>
			  		</div>
			  		<div class="col-md-8">
			  		<div class="card card-primary mb-3"><div class="card-body">	<small class="littext">DESCRIPTION</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<p class="readable" >The Brawler class uses a mixed martial arts form of fighting; they focus only on the swift execution of skills and train themselves to create damage rather than defense. Their lack of defense may be their weakest point, but Brawlers are avoided by many because they could easily destroy any opponent alone with their sheer power.</p></div></div>
			  			<div class="card card-warning mb-3">
			  				<div class="card-body">
			  					<small class="littext">TRAITS</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			  			<ul class="readable">
			  				<li>Can utilize all kinds of gauntlet weapons</li>
			  				<li>Suitable for fighting archers</li>
			  				<li>Best paired with a shaman for assistance specially against brawlers</li>
			  			</ul>

			  				</div>
			  			</div>
			  		
			  		</div>
			  	</div>
	  
      </div>
  
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_archer">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Archer Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable text-light">
	  <div class="row">
			    		<div class="col-md-4">
			    			<div style='background-image: url({{ asset('photos/transparents/ff_archer.png') }})' class="char_holder">
			    			</div>
			    		</div>
			    		<div class="col-md-8">
			    		<div class="card card-primary mb-3"><div class="card-body">	<small class="littext">DESCRIPTION</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			    			<p class="readable" >The Archer class focuses on long-range attacks and heavy-hitting spells to destroy enemies; however, archers rely on health potions due to low HP and mana potions for MP to activate damaging and buff spells. The Archer's ability to deal damage and range advantage can quickly sweep off hordes of incoming enemies.</p></div></div>
			    		<div class="card card-warning mb-3">
			    			<div class="card-body">
			    					<small class="littext">TRAITS</small>
			  			<div class="separator-blue-left-thin mb-3"></div>
			    			<ul class="readable">
			  				<li>Can utilize all kinds of bow with arrows</li>
			  				<li>Suitable for slowing down any kinds of foes and suitable for fighting shaman and swordsman</li>
			  				<li>Best paired with a shaman</li>
			  			</ul>
			    			</div>
			    		</div>
			  			
			    		</div>
			    	</div>
	  
      </div>
  
    </div>
  </div>
</div>

@endsection