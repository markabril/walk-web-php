@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
@include('comp.header_public')
<div class="banner_grande">
   <div class="banner_inside">
      <center>
         <div class="home_logo_holder">
            <img class="walktext" alt="Walk Online full logo transparent HD" id='home_logo'>
         </div>
      </center>
   </div>
</div>
<div class="container_cover">
   <div class="container mt-5">
      <div class="row mb-5">
         <div class="col-sm-9">
            <h5 class="titlefont"><small>FEATURED</small></h5>
            <div class="main_promo readable">
               <div class="main_promo_inner shadowtext p-5" style="text-align: left;">
                  <div class="row">
                     <div class="col-sm-6">
                        <p>
                        <h2 class="mb-0 titlefont" id="feat_title"></h2>
                        <div class="separator-gold-left mb-0"></div>
                        <small id="deat_desc"></small></p>
                        <a class="btn btn-primary" style="display: none;" target="_blank" href="#" id="feat_button"></a>

                        <a href="https://play.google.com/store/apps/details?id=com.light.walkonlinedev&hl=en&gl=US"
                           target="_blank" title="Download for Android Google Play Store">
                           <img src="https://freelogopng.com/images/all_img/1664287128google-play-store-logo-png.png"
                              style="width: 170px;">

                           <a href="https://apps.apple.com/ph/app/walk-online-mobile/id1672916283" target="_blank"
                              title="Download for iOS Apple App Store">
                              <img src="https://digitopoly.files.wordpress.com/2016/06/app-store-logo.png"
                                 style="width: 150px;">

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <h5><small><a class="text-light titlefont" href="{{ route('goto_news') }}">NEWS & UPDATES <i
                        class="fa-solid fa-arrow-up-right-from-square"></i></a></small></h5>
            <div class="row latestnews readable">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12" style="margin-bottom: 20vh;">

            <center>
               <img src="{{ asset('photos/transparents/character_display.jpg') }}" loading="lazy" style="width: 80%;">
               <h5 style="
                  display:block;
                  border-radius: 30px;
                  text-transform: uppercase !important;
                  " class="mb-5 titlefont">Walk Online is a mobile MMORPG made by Filipino developers. A 3D game that
                  offers PvP, Party, Hackathon, Quests & Special Events based on the Philippine setting. So, what are
                  you waiting for? Explore the thrilling adventures now!</h5>



               <div class="row mr-5 ml-5" style="max-width: 400px;">
                  <div class="col-sm-6 mt-1">
                     <a href="https://play.google.com/store/apps/details?id=com.light.walkonlinedev&hl=en&gl=US"
                        target="_blank" title="Download for Android Google Play Store">
                        <img src="https://freelogopng.com/images/all_img/1664287128google-play-store-logo-png.png"
                           style="width: 170px;">
                  </div>
                  <div class="col-sm-6 mt-1">
                     <a href="https://apps.apple.com/ph/app/walk-online-mobile/id1672916283" target="_blank"
                        title="Download for iOS Apple App Store">
                        <img src="https://digitopoly.files.wordpress.com/2016/06/app-store-logo.png"
                           style="width: 150px;">
                     </a>
                  </div>
               </div>
            </center>
         </div>
         <div class="col-md-12 mb-5" style="margin-bottom:100px; ">
            <center>
               <div class="separator-blue-center mb-5 "></div>
               <h5 class="">WELCOME TO THE<br><b class="littext titlefont"
                     style="letter-spacing: 10px !important; font-size: 30px !important;">UNIVERSITIES</b></h5>
               <div class="separator-blue-center mt-5 mb-5"></div>
            </center>
            <div class="card-deck" style="margin-bottom: 20vh;">
               <div class="card card-simple">
                  <div class="card-body mt-5 mb-5">
                     <center>
                        <img alt="Night Eagle Walk Online Campus" loading="lazy"
                           src="{{ asset('photos/icons/ne.png') }}" style="height: 150px;">
                        <h5 style="color: #22AEC3;" class="titlefont mt-3 mb-4 shadowtext">NIGHT EAGLE</h5>
                        <button class="btn btn-primary" data-toggle='modal' data-target='#mdl_enroll_ne'>Learn
                           More</button>
                     </center>
                  </div>
               </div>
               <div class="card card-simple">
                  <div class="card-body mt-5 mb-5">
                     <center>
                        <img alt="Fiery Emeral Walk Online Campus" loading="lazy"
                           src="{{ asset('photos/icons/fe.png') }}" style="height: 150px;">
                        <h5 style="color: #F9602E;" class="titlefont mt-3 mb-4 shadowtext">FIERY EMERALD</h5>
                        <button class="btn btn-danger" data-toggle='modal' data-target='#mdl_enroll_fe'>Learn
                           More</button>
                     </center>
                  </div>
               </div>
               <div class="card card-simple">
                  <div class="card-body mt-5 mb-5">
                     <center>
                        <img alt="Pelican Walk Online Campus" loading="lazy" src="{{ asset('photos/icons/peli.png') }}"
                           style="height: 150px;">
                        <h5 style="color: #FBD841;" class="titlefont mt-3 mb-4 shadowtext">PELICANS</h5>
                        <button class="btn btn-warning" data-toggle='modal' data-target='#mdl_enroll_peli'>Learn
                           More</button>
                     </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="hack_uc" style="

">
   <div class="container-fluid hackathonbg" style="
   background-image : url('{{ asset('photos/poster/flagger.jpeg') }}') !important;
   margin-bottom:250px;
   overflow:hidden;">
      <div class="container">
         <div class="row mt-5 mb-5">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
               <div class="row ">
                  <div class="col-sm-12">
                     <center>
                        <h6 class="mb-3 titlefont" style="text-transform: uppercase;">
                           <span style="font-size:20px;font-weight:bolder;font-family:cinzel;">Hackathon</span>
                           <br><i class="fas fa-trophy"></i>
                           CHAMPIONS OF
                           THE HOUR<br>
                           <small class="text-warning"><span id='lbl_hackdate'></span></small>
                        </h6>
                        <div class="separator-gold-center mb-3"></div>
                     </center>
                  </div>
                  <div class="col-sm-6">
                     <small class="m-0 p-0 titlefont">PHILIPPINES</small>
                     <div class="card card-primary mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="ph_ne"></span>
                                 <br>
                                 <img alt="Small Night Eagle School logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_ne.png') }}"
                                    style="width: 50px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                     <div class="card card-danger mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="ph_fe"></span>
                                 <br>
                                 <img alt="Small Fiery Emeral School logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_fe.png') }}"
                                    style="width: 33px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                     <div class="card card-warning mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="ph_peli"></span>
                                 <br>
                                 <img alt="Small Pelican School logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_peli.png') }}"
                                    style="width: 40px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <small class="m-0 p-0 titlefont">INTERNATIONAL</small>
                     <div class="card card-primary mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="int_ne"></span>
                                 <br>
                                 <img alt="small Night Eagle International Logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_ne.png') }}"
                                    style="width: 50px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                     <div class="card card-danger mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="int_fe"></span>
                                 <br>
                                 <img alt="small Fiery Emeral International logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_fe.png') }}"
                                    style="width: 33px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                     <div class="card card-warning mb-4" style="height: 44px;">
                        <div class="card-body p-1">
                           <center>
                              <small class="mb-0 pb-0">
                                 <span id="int_peli"></span>
                                 <br>
                                 <img alt="Small Pelican International Logo" loading="lazy"
                                    src="{{ asset('photos/icons/sm_peli.png') }}"
                                    style="width: 40px; margin-bottom: -18px;">
                              </small>
                           </center>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <center>
                        <div class="separator-gold-center mb-2 mt-3"></div>
                        <small id="hackmessage">
                        </small><br>
                        <small><a href="{{ route('goto_hackwinners') }}"><i class="fa-solid fa-arrow-right"></i>
                              Hackathon
                              Champions Legacy</a></small>
                     </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid universitybg mb-4" style="
   background-image : url('{{ asset('photos/poster/hexbg.png') }}') !important;
   margin:0px !important;
   height:500px;
   margin-bottom:100px;
   ">
      <div class="university-clash-wrapper">
         <div class="uc-image left-right-vignette">
            <img src="{{ asset('photos/poster/uc.jpg') }}" alt="">
            <!-- <div class="uc-image-overlay littext">
               University<br>Clash
            </div> -->
         </div>
         <div class="uc-details">
            <div class="clip-path-wrapper" style="overflow:hidden;">
               <div class="clip-path-1">
                  <video class="backdrop-vid" autoplay muted loop controls src="">
                     <source src="" type="video/webm" />
                  </video>
               </div>
            </div>
            <div class="clip-path-wrapper">
               <div class="clip-path-2"></div>
            </div>
            <div id="university-name-handler">
               <div class="uc_change-view">
                  <span id="ph-btn" class="active" onclick="showUC_PH()">ph</span>
                  <span id="int-btn" onclick="showUC_INT()">int</span>
               </div>
               <div class="title" style="text-transform:uppercase; line-height:1rem;">
                  <span class="font-cinzel text-lg" style="font-weight:bolder;">University Clash</span>
                  <div class="titlefont "><i class="fas fa-crown" style="margin-right:5px"></i>Academy of Champions
                  </div>
                  <span class="titlefont text-warning" id="ucDate">July 22, 2023</span>

                  <div class="separator-gold-center" style="max-width:400px;min-width:100px;margin-block:1rem;"></div>
                  <span id="uc_label"></span>

               </div>
               <div class="uclogo-holder">
                  <img class="rotate" id="icon-ucwin" src="">
                  <img class="ucwinner_stage" alt="" />
               </div>

            </div>

         </div>
      </div>
   </div>

   <div class="container-fluid tagisbg mb-4" style="
   ">
      <div class="tagis-text-wrapper">
         <h2>Tagis Lakas</h2>
         <h2>Only the Strongest</h2>
         <h2>Season |#|</h2>
      </div>

      <div class="tagis-banner-wrapper left-right-bg-blend">
         <img src="{{ asset('photos/tagis/bg banner2.png') }}" class="" alt="" />
         <div class="emblem-wrapper">
            <div>
               <img src="{{ asset('photos/tagis/archer emblem.png') }}" class="z-[0] h-2/3 icon-shadow" alt="" />
            </div>
            <div>
               <img src="{{ asset('photos/tagis/swordsman emblem.png') }}" class="z-[0] h-2/3 icon-shadow" alt="" />
            </div>

            <div>
               <img src="{{ asset('photos/tagis/overall emblem.png') }}" class="z-[0] h-2/3 icon-shadow" alt="" />
            </div>

            <div>
               <img src="{{ asset('photos/tagis/brawler emblem.png') }}" class="z-[0] h-2/3 icon-shadow" alt="" />
            </div>

            <div>
               <img src="{{ asset('photos/tagis/shaman emblem.png') }}" class="z-[0] h-2/3 icon-shadow" alt="" />
            </div>

         </div>
      </div>
   </div>
</div>



<div class="container-fluid" style="background-color: #182330;   overflow:hidden;">
   <div class="container mt-5">
      <div class="row mt-5">
         <div class="col-md-12 mt-5">
            <center>
               <div class="separator-gold-center mb-2 mt-5"></div>
               <h2 class="shadowtext titlefont">CHOOSE YOUR CLASS</h2>
               <div class="separator-gold-center mt-2 mb-5"></div>
            </center>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-3" style="perspective: 1000px;">
                  <div
                     style='transform:rotatey(30deg) rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_swordsman.jpeg') }})'
                     class="char_holder">
                     <a href="{{ route('goto_classoverview') }}?selected=swordsman">
                        <div class="bg_separator">
                           <img alt="Swordsman Class Character of Walk Online Mobile" class="charcard_icon"
                              style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/swordsman.png') }}"
                              alt="swordsman" border="0">
                           <h5 class="charcard_title littext titlefont">SWORDSMAN</h5>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-md-3" style="perspective: 1000px;">
                  <div
                     style='transform:rotatey(30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_shaman.jpeg') }})'
                     class="char_holder">
                     <a href="{{ route('goto_classoverview') }}?selected=shaman">
                        <div class="bg_separator">
                           <img alt="Shaman Class Character of Walk Online Mobile" class="charcard_icon"
                              style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/shaman.png') }}"
                              alt="swordsman" border="0">
                           <h5 class="charcard_title littext titlefont">SHAMAN</h5>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-md-3" style="perspective: 1000px;">
                  <div
                     style='transform:rotatey(-30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_brawler.jpeg') }})'
                     class="char_holder">
                     <a href="{{ route('goto_classoverview') }}?selected=brawler">
                        <div class="bg_separator">
                           <img alt="Brawler Class Character of Walk Online Mobile" class="charcard_icon"
                              style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/brawler.png') }}"
                              alt="swordsman" border="0">
                           <h5 class="charcard_title littext titlefont">BRAWLER</h5>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-md-3" style="perspective: 1000px;">
                  <div
                     style='transform:rotatey(-30deg)  rotatex(10deg); background-image: url({{ asset('photos/transparents/ff_archer.jpeg') }})'
                     class="char_holder">
                     <a href="{{ route('goto_classoverview') }}?selected=archer">
                        <div class="bg_separator">
                           <img alt="Archer Class Character of Walk Online Mobile" class="charcard_icon"
                              style="height:30px; transform: scale(5);" src="{{ asset('photos/icons/archer.png') }}"
                              alt="swordsman" border="0">
                           <h5 class="charcard_title littext titlefont">ARCHER</h5>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="separator-gold-center mt-5" style="margin-bottom: 15vh;"></div>
         </div>
         <div class="col-sm-12">
            <div class="row" id="pnl_features"></div>
         </div>

         <div class="col-sm-12 mt-5 mb-5"></div>
         <div class="col-sm-12 mb-4">
            <div class="card card-simple">
               <div id="bottommain_img" style="
               width: 100%; 
               background-position:center;
               background-size:cover;
               background-repeat: no-repeat;
               ">
                  <div class="card-body">
                     <h3 class="littext" id="bottommain_title">(n/a)</h3>
                     <div class="separator-gold-left mb-4"></div>
                     <h5 class="readable" id="bottommain_description">(n/a)</h5>
                     <a class="btn btn-warning btn-lg mb-4 mt-4" id="bottommain_link" target="_blank"
                        href="https://www.youtube.com/watch?v=CpuVuoc9jTg&list=PLLoAg0RFTjPv5mWACzV5WdX8LDHFId-CB">(n/a)</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="card card-simple" style="margin: auto;">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-4">
                        <img alt="Walk Online Promotional Link 1" id="bottomleft_img" src="" loading="lazy"
                           style="width:100%; border-radius: 5px;">
                     </div>
                     <div class="col-sm-8">
                        <div class="mt-4 mb-4">
                           <h3><b class="littext" style="letter-spacing: 10px !important;"
                                 id="bottomleft_title">(n/a)</b></h3>
                           <div class="separator-gold-left mb-4"></div>
                           <h5 class="readable" style="height: 100px;" id="bottomleft_description">(n/a)</h5>
                           <a class="btn btn-primary btn-lg mb-4 mt-4" id="bottomleft_link" target="_blank"
                              href="">(n/a)</a>
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
                        <img alt="Walk Online Promotional Link 2" id="bottomright_img" src="" loading="lazy"
                           style="width:100%; border-radius: 5px;">
                     </div>
                     <div class="col-sm-8">
                        <div class="mt-4 mb-4">
                           <h3><b class="littext" style="letter-spacing: 10px !important;"
                                 id="bottomright_title">(n/a)</b></h3>
                           <div class="separator-gold-left mb-4"></div>
                           <h5 class="readable" style="height: 100px;" id="bottomright_description">(n/a)</h5>
                           <a class="btn btn-primary btn-lg mb-4 mt-4" id="bottomright_link" href="#">(n/a)</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 mt-5 mb-5"></div>
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
            <p class="readable shadowtext">The Night Eagle University is one among the chosen three Organizations
               under Project University that undergoes specialized combat training for students to defend humanity
               against world-ending threats.
               Founded by Night Eagle Organization (N.E.O.) started its program when the Philippine Eagle species
               dwindled its number around the world; N.E.O. is now about preserving all natural resources,
               specifically forests, that were a natural habitat for all species. N.E.O. is a Non-government
               Organization and took funds from small business agencies and donations from various organizations
               to finance Night Eagle University and other projects.
            </p>
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
               The Pelicans University is one among the chosen three Organizations under Project University that
               undergoes specialized combat training for students to defend humanity against world-ending threats.
               After a small medical facility near the shores of Alaminos discovered a temporary cure for cancer,
               the Pelicans Institute of the Philippines changed its name to Oceanography Medical Research
               Institute (O.M.R. Institute) to expand its aquatic-based medical research. The O.M.R. Institute
               named their school “Pelicans University,” which they called before the establishment of O.M.R.
               institute to pay respect to their old medical research bases near a beach full of wild pelicans
               that became the image of their organization.
            </p>
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
            <p class="readable shadowtext">The Fiery Emerald University is one among the chosen three
               Organizations under Project University that undergoes specialized combat training for students to
               defend humanity against world-ending threats.
               The United Jewel Sellers Bank (U.J.S. Bank) that funds the Fiery Emerald University started as
               local jewel traders until they discovered a rare gemstone sold to research agencies, corporations,
               and collectors; that monopolized the whole gem trading industry. These rare gemstones are capable
               of absorption and dispersion; of any specific elemental energy that became a vital component of any
               weapon created by the KLAW Industries.
            </p>
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
                  We should be back shortly. Thank vou for vour patience.
               </p>
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
                  <div style='background-image: url({{ asset('photos/transparents/ff_swordsman.png') }})'
                     class="char_holder">
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card card-primary mb-3">
                     <div class="card-body">
                        <small class="littext">DESCRIPTION</small>
                        <div class="separator-blue-left-thin mb-3"></div>
                        <p class="readable">The Swordsman class excels through offensive and defensive stats and
                           is often used to taunt and lure foes to attack them; however, they rely on health and
                           mana potions to last in battle. Their ability to withstand attacks allows heavy hitter
                           classes (Archer, Shaman, Brawler) to counterattack enemy mobs attacking the swordsman,
                           mitigating enemy damage while balancing the party.</p>
                     </div>
                  </div>
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
                  <div style='background-image: url({{ asset('photos/transparents/ff_shaman.png') }})'
                     class="char_holder">
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card card-primary mb-3">
                     <div class="card-body">
                        <small class="littext">DESCRIPTION</small>
                        <div class="separator-blue-left-thin mb-3"></div>
                        <p class="readable">The Shaman class uses their spell-casting abilities to change battle
                           outcomes; spear-wielder shaman has increased physical strength, while staff wielder is
                           on support type through debuffing enemies, healing, or strengthening allies. Shamans
                           may lack defense but excel through slow casting but damaging AoE spells.</p>
                     </div>
                  </div>
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
                  <div style='background-image: url({{ asset('photos/transparents/ff_brawler.png') }})'
                     class="char_holder">
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card card-primary mb-3">
                     <div class="card-body">
                        <small class="littext">DESCRIPTION</small>
                        <div class="separator-blue-left-thin mb-3"></div>
                        <p class="readable">The Brawler class uses a mixed martial arts form of fighting; they
                           focus only on the swift execution of skills and train themselves to create damage
                           rather than defense. Their lack of defense may be their weakest point, but Brawlers are
                           avoided by many because they could easily destroy any opponent alone with their sheer
                           power.</p>
                     </div>
                  </div>
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
                  <div style='background-image: url({{ asset('photos/transparents/ff_archer.png') }})'
                     class="char_holder">
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card card-primary mb-3">
                     <div class="card-body">
                        <small class="littext">DESCRIPTION</small>
                        <div class="separator-blue-left-thin mb-3"></div>
                        <p class="readable">The Archer class focuses on long-range attacks and heavy-hitting
                           spells to destroy enemies; however, archers rely on health potions due to low HP and
                           mana potions for MP to activate damaging and buff spells. The Archer's ability to deal
                           damage and range advantage can quickly sweep off hordes of incoming enemies.</p>
                     </div>
                  </div>
                  <div class="card card-warning mb-3">
                     <div class="card-body">
                        <small class="littext">TRAITS</small>
                        <div class="separator-blue-left-thin mb-3"></div>
                        <ul class="readable">
                           <li>Can utilize all kinds of bow with arrows</li>
                           <li>Suitable for slowing down any kinds of foes and suitable for fighting shaman and
                              swordsman</li>
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
<script>
   let tagisData;

   let currentUC_win = "ph"
   let ucData = []
   const universities = [
      {
         id: 0,
         name: "Night Eagle",
         theme: "rgba(29, 158, 180, 1)",
         vidSrc: "{{asset('photos/basiklaban/ne_fadein.webm')}}",
         idleSrc: "{{asset('photos/basiklaban/ne_idle.webm')}}",
         iconImg: "{{asset('photos/icons/ne.png')}}",
         ref: "ne_tower",
      },
      {
         id: 1,
         name: "Fiery Emerald",
         theme: "rgba(255,74,75,1)",
         vidSrc: "{{asset('photos/basiklaban/fe_fadein.webm')}}",
         idleSrc: "{{asset('photos/basiklaban/fe_idle.webm')}}",
         iconImg: "{{asset('photos/icons/fe.png')}}",
         ref: "fe_tower",
      },
      {
         id: 2,
         name: "Pelicans",
         theme: "rgba(255, 178, 83, 1)",
         vidSrc: "{{asset('photos/basiklaban/peli_fadein.webm')}}",
         idleSrc: "{{asset('photos/basiklaban/peli_idle.webm')}}",
         iconImg: "{{asset('photos/icons/peli.png')}}",
         ref: "pe_tower",
      }
   ]



   function showUC_PH() {
      $("#uc_label").html("Bakbakan")
      $("#ph-btn").addClass("active")
      $("#int-btn").removeClass("active")
      $(".clip-path-wrapper").css("--theme-color", universities[ucData['ph_ucwin']]['theme'])
      $("#icon-ucwin").prop("src", universities[ucData['ph_ucwin']]['iconImg'])

   }

   function showUC_INT() {
      $("#uc_label").html("International")
      $("#int-btn").addClass("active")
      $("#ph-btn").removeClass("active")
      $(".clip-path-wrapper").css("--theme-color", universities[ucData['int_ucwin']]['theme'])
      $("#icon-ucwin").prop("src", universities[ucData['int_ucwin']]['iconImg'])

   }

   function getAllData() {
      return $.ajax({
         type: "get",
         url: "{{ route('stole_homecoverphoto') }}",
         data: { _token: "{{ csrf_token() }}" },
      })
         .then(function (data) {
            console.log("cover photo -->" + data);
            data = JSON.parse(data);

            if (data.length != 0) {
               $(".banner_grande").css("background-image", "url('" + data[0]["img"] + "')");
            }

            return $.ajax({
               type: "get",
               url: "{{ route('stole_homelogo') }}",
               data: { _token: "{{ csrf_token() }}" },
            });

         })
         .then(function (data) {
            console.log("logo data", data);
            data = JSON.parse(data);
            if (data.length != 0 && data[0]["title"] == '1') {
               $("#home_logo").attr('src', data[0]["img"]);
            }
            else {
               $("#home_logo").css('display', 'none');
            }
            return $.ajax({
               type: "get",
               url: "{{ route('stole_homehackathonwinners') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(function (data) {



            console.log("hackathon winners -->" + data);


            data = JSON.parse(data);

            if (data.length != 0) {
               $("#lbl_hackdate").html(data[0]["hackdate"]);


               $("#ph_ne").html(data[0]["ph_ne"]);
               $("#ph_fe").html(data[0]["ph_fe"]);
               $("#ph_peli").html(data[0]["ph_peli"]);

               $("#int_ne").html(data[0]["int_ne"]);
               $("#int_fe").html(data[0]["int_fe"]);
               $("#int_peli").html(data[0]["int_peli"]);


               $("#hackmessage").html(data[0]["hackmsg"]);

            } else {
               $("#lbl_hackdate, #ph_ne, #ph_fe, #ph_peli, #int_ne, #int_fe, #int_peli, #hackmessage ").html("(n/a)");
            }

            return $.ajax({
               type: "get",
               url: "{{ route('stole_latestnews') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })


         .then(function (data) {

            $(".latestnews").html(data);

            return $.ajax({
               type: "get",
               url: "{{ route('stole_homefeatured') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(function (data) {
            data = JSON.parse(data);
            if (data.length != 0) {
               $(".main_promo").css("background-image", "url(" + data[0]["img"] + ")");
               $("#feat_title").html(data[0]["title"]);
               $("#deat_desc").html(data[0]["description"]);
               $("#feat_button").html(data[0]["btn_name"]);
               $("#feat_button").prop("href", data[0]["link"]);
            } else {

               $("#feat_title").html("n/a");
               $("#deat_desc").html("n/a");
               $("#feat_button").html("n/a");
               $("#feat_button").prop("href", "#");
            }


            return $.ajax({
               type: "get",
               url: "{{ route('stole_homefeatures') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(function (data) {
            console.log("features -->" + data);

            $("#pnl_features").html(data);
            return $.ajax({
               type: "get",
               url: "{{ route('stole_homebottompanel') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(function (data) {
            console.log("bottoms -->" + data);

            data = JSON.parse(data);

            for (var i = 0; i < data.length; i++) {
               switch (data[i]["cont_type"]) {
                  case "bottom_main":
                     $("#bottommain_img").css("background-image", "url(" + data[i]["img"] + ")");
                     $("#bottommain_title").html(data[i]["title"]);
                     $("#bottommain_description").html(data[i]["description"]);
                     $("#bottommain_link").html(data[i]["btn_name"]);
                     $("#bottommain_link").prop("href", data[i]["link"]);
                     break;

                  case "bottom_left":
                     $("#bottomleft_img").prop("src", data[i]["img"]);
                     $("#bottomleft_title").html(data[i]["title"]);
                     $("#bottomleft_description").html(data[i]["description"]);
                     $("#bottomleft_link").html(data[i]["btn_name"]);
                     $("#bottomleft_link").prop("href", data[i]["link"]);
                     break;


                  case "bottom_right":
                     $("#bottomright_img").prop("src", data[i]["img"]);
                     $("#bottomright_title").html(data[i]["title"]);
                     $("#bottomright_description").html(data[i]["description"]);
                     $("#bottomright_link").html(data[i]["btn_name"]);
                     $("#bottomright_link").prop("href", data[i]["link"]);
                     break;
               }
            }



            return $.ajax({
               type: "get",
               url: "{{ route('stole_homeucwins') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(function (data) {
            data = JSON.parse(data);
            console.log(data)
            if (data.length == 0) {
               $(".universitybg").css("display", "none");
            }
            const stage = "{{asset('photos/basiklaban/Stage.png')}}";
            const ember = "{{asset('photos/basiklaban/sparks.webm')}}";

            const spark = "{{asset('photos/basiklaban/sparks.webm')}}";
            ucData = data[0];
            // $("#university-name-handler").html(universities[data[0]['ph_ucwin']]['name'])
            $("#ucDate").html(ucData['ucdate'])
            $(".clip-path-wrapper").css("--theme-color", universities[ucData['ph_ucwin']]['theme'])
            $("#icon-ucwin").prop("src", universities[ucData['ph_ucwin']]['iconImg'])
            $(".backdrop-vid").prop("src", ember)
            $("#uc_label").html("Bakbakan")
            $(".ucwinner_stage").prop("src", stage)

            return $.ajax({
               type: "get",
               url: "{{ route('stole_hometagiswins') }}",
               data: { _token: "{{ csrf_token() }}" },
            });
         })
         .then(async function (data) {


            let tagisData = await getTagisData()
            let season = tagisData['season']
            let date1 = new Date(season['schedule']['start']);
            let date2 = new Date();
            let remainingMonths = parseFloat(date2.getFullYear() - date1.getFullYear()) * 12 + parseFloat(date2.getMonth() - date1.getMonth());
            let seasonCurr = Math.round(remainingMonths / season['type'])
            let currentSeason = seasonCurr <= 1 ? 1 : seasonCurr
            let endingSeasonTime = addMonths(date1, currentSeason + season['type'])
            let remainingDays = getTotalDays(date2, endingSeasonTime)
            currentSeason = remainingDays > 7 ? currentSeason + 1 : currentSeason;


         });

   }


   async function getTagisData() {
      try {
         const response = await fetch("https://regions.walkonlinemobile.com/api/InGameEvents/5");
         if (!response.ok) {
            throw new Error('Network response was not ok');
         }
         const tagisData = await response.json(); // Parse the JSON response
         return tagisData; // Return the data for further use
      } catch (error) {
         console.error('Error fetching data:', error);
      }
   }


   function addMonths(x, y) {
      const result = x
      result.setMonth(result.getMonth() + y);
      return result;
   }

   function getTotalDays(x, y) {
      const res = x - y;
      return res / (1000 * 60 * 60 * 24)
   }


   // call the function
   getAllData();
</script>
@endsection