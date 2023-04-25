<?php $__env->startSection('title'); ?>
WALK Online - Mobile MMORPG
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
	.download_img{
		height: 50px;
	}
    .characterlivepreview{
        right: 0;
    }
    .charpreview{
        position: absolute;
        right: 0;
        height: 720px;
        animation-name : revealcharacter;
        animation-duration: 3s;
    }
    .topcover{
        left:0;
        right:0;
        background: rgb(0,0,0);background: linear-gradient(36deg, rgba(0,0,0,1) 22%, rgba(145,0,0,1) 82%);
        width: 100%;
        margin:0;
        padding:0;
        margin-top: 50px;
        min-height: 720px;
        overflow: hidden !important;
        position: relative;
    }


    .clock {
  animation: infinite-rotation 60s linear infinite;
  position: absolute;
  display: block;
  right: 0;
  top:-500;
  z-index: 0;
  opacity: 0.5;
  margin-right:-30%;
}

@keyframes  infinite-rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes  revealcharacter{
    0%{
        opacity: 0;
        transform: translateX(500px);
    }
    100%{
        opacity: 1;
        transform: translateX(0px);
    }
}
.charinfo{
    animation-name : revealinfo;
        animation-duration: 2s;
}
@keyframes  revealinfo{
    0%{
        opacity: 0;
        transform: translateX(-500px);
    }
    100%{
        opacity: 1;
        transform: translateX(0px);
    }
}
</style>
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row topcover">
   <img class="clock" src="<?php echo e(asset('photos/transparents/pattern.png')); ?>">
    <div class="col-lg-6 charinfo">
       <div class=" m-5 shadowtext">
       <h2 class="mt-5 mb-4 littext"><img id="class_icon" src="<?php echo e(asset('photos/icons/swordsman.png')); ?>" style="width:50px; transform : scale(2);"> <span id="class_name">SWORDSMAN</span></h2>
       <div class="separator-gold-left mb-4"></div>
       <h6 class="readable mb-3" id="class_description">The Swordsman class excels through offensive and defensive stats and is often used to taunt and lure foes to attack them; however, they rely on health and mana potions to last in battle. Their ability to withstand attacks allows heavy hitter classes (Archer, Shaman, Brawler) to counterattack enemy mobs attacking the swordsman, mitigating enemy damage while balancing the party.</h6>
    <h4 class="littext">TRAITS</h4>
    <div class="separator-blue-left-thin mb-3"></div>
    <div id="class_traits">
    <ul class="readable" >
        <li>Able to use all kinds of swords</li>
        <li>Heavy duty againts brawlers</li>
        <li>Best paired with an archer class to fight against shamans</li>
    </ul> 
    </div> 
    </div>
    </div>
    <div class="col-lg-6" style="height: 720px;">
            <video class="charpreview" id="class_animation" autoplay muted loop class="characterlivepreview">
        <source src="<?php echo e(asset('videos/swordsman.webm')); ?>" type="video/mp4">
        </video>

    </div>
</div>



	<div class="container" style=" margin-top: -60px; margin-bottom: 10vh;">
        <div class="card card-primary shadowtext" style="border-radius: 20px; overflow:hidden; border: 1px solid rgba(255,255,255,0.2) !important; background-color: rgba(0,0,0,0.2); backdrop-filter: blur(45px);">
               <div class="card-body p-2">
                    <center>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="#" onclick="switchClassMode(this)" data-classname='swordsman' class="text-light">
                                <img src="<?php echo e(asset('photos/icons/swordsman.png')); ?>" style="width:50px; transform : scale(2);">
                                <h5 class="mt-3">SWORDSMAN</h5></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" onclick="switchClassMode(this)" data-classname='shaman' class="text-light">
                                <img src="<?php echo e(asset('photos/icons/shaman.png')); ?>" style="width:50px; transform : scale(2);">
                                <h5 class="mt-3">SHAMAN</h5></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" onclick="switchClassMode(this)" data-classname='brawler' class="text-light">
                                <img src="<?php echo e(asset('photos/icons/brawler.png')); ?>" style="width:50px; transform : scale(2);">
                                <h5 class="mt-3">BRAWLER</h5></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" onclick="switchClassMode(this)" data-classname='archer' class="text-light">
                                <img src="<?php echo e(asset('photos/icons/archer.png')); ?>" style="width:50px; transform : scale(2);">
                                <h5 class="mt-3">ARCHER</h5></a>
                        </div>
                    </div>
                    </center>
               </div>
        </div>
        <br>
        <br>
        <?php echo $__env->make('comp.explore', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div>


    <div style="display: none;">

    <div id="swordsmanpre_description">
    The Swordsman class excels through offensive and defensive stats and is often used to taunt and lure foes to attack them; however, they rely on health and mana potions to last in battle. Their ability to withstand attacks allows heavy hitter classes (Archer, Shaman, Brawler) to counterattack enemy mobs attacking the swordsman, mitigating enemy damage while balancing the party.
    </div>
    <div id="swordsmanpre_traits">
    <ul class="readable" >
        <li>Able to use all kinds of swords</li>
        <li>Heavy duty againts brawlers</li>
        <li>Best paired with an archer class to fight against shamans</li>
    </ul> 
    <div class="badge badge-dark"><i class="fa-solid fa-sword"></i> Melee</div>
    </div>



    <div id="shamanpre_description">
    The Shaman class uses their spell-casting abilities to change battle outcomes; spear-wielder shaman has increased physical strength, while staff wielder is on support type through debuffing enemies, healing, or strengthening allies. Shamans may lack defense but excel through slow casting but damaging AoE spells.
    </div>
    <div id="shamanpre_traits">
    <ul class="readable">
			  				<li>Able to use all kinds of magical items specially staff</li>
			  				<li>Can be useful against all kinds of foes</li>
			  				<li>Best paired with swordsman</li>
			  			</ul>
                          <div class="badge badge-dark"><i class="fa-solid fa-sword"></i> Melee</div>
                          <div class="badge badge-dark"><i class="fa-solid fa-crosshairs-simple"></i> Ranged</div>
    </div>


    <div id="brawlerpre_description">
    The Brawler class uses a mixed martial arts form of fighting; they focus only on the swift execution of skills and train themselves to create damage rather than defense. Their lack of defense may be their weakest point, but Brawlers are avoided by many because they could easily destroy any opponent alone with their sheer power.
    </div>
    <div id="brawlerpre_traits">
    <ul class="readable">
			  				<li>Can utilize all kinds of gauntlet weapons</li>
			  				<li>Suitable for fighting archers</li>
			  				<li>Best paired with a shaman for assistance specially against brawlers</li>
			  			</ul>
        <div class="badge badge-dark"><i class="fa-solid fa-sword"></i> Melee</div>
    </div>


    <div id="archerpre_description">
    The Archer class focuses on long-range attacks and heavy-hitting spells to destroy enemies; however, archers rely on health potions due to low HP and mana potions for MP to activate damaging and buff spells. The Archer's ability to deal damage and range advantage can quickly sweep off hordes of incoming enemies.
    </div>
    <div id="archerpre_traits">
	<ul class="readable">
			  				<li>Can utilize all kinds of bow with arrows</li>
			  				<li>Suitable for slowing down any kinds of foes and suitable for fighting shaman and swordsman</li>
			  				<li>Best paired with a shaman</li>
			  			</ul>
        <div class="badge badge-dark"><i class="fa-solid fa-crosshairs-simple"></i> Ranged</div>
    </div>


        <div id="defaulter" data-classname="<?php  echo $_GET['selected']; ?>" ></div>
    </div>
        


    <script>
loadfirst();
        function loadfirst(){
                switchClassMode($("#defaulter"));
        }

        function switchClassMode(controlObj){
            $(".charpreview").hide();
$(".charinfo").hide();
            var classname = $(controlObj).data("classname");
            $("#class_name").html(classname);
            $("#class_animation").prop("src","<?php echo e(asset('videos/')); ?>/" + classname + ".webm");
            $("#class_icon").prop("src","<?php echo e(asset('photos/icons/')); ?>/" + classname + ".png");

            $("#class_description").html($("#" + classname + "pre_description").html());
            $("#class_traits").html($("#" + classname + "pre_traits").html());
            switch(classname){
                case "swordsman":
                    $(".topcover").css("background","rgb(0,0,0)");
                    $(".topcover").css("background","linear-gradient(36deg, rgba(0,0,0,1) 22%, rgba(145,0,0,1) 82%)");
                    break;
                    case "shaman":
                    $(".topcover").css("background","rgb(0,0,0)");
                    $(".topcover").css("background","linear-gradient(36deg, rgba(0,0,0,1) 22%, rgba(145,93,0,1) 82%)");
                    break;
                    case "brawler":
                    $(".topcover").css("background","rgb(0,0,0)");
                    $(".topcover").css("background","linear-gradient(36deg, rgba(0,0,0,1) 22%, rgba(28,86,110,1) 82%)");
                    break;
                    case "archer":
                    $(".topcover").css("background","rgb(0,0,0)");
                    $(".topcover").css("background","linear-gradient(36deg, rgba(0,0,0,1) 22%, rgba(110,28,110,1) 82%)");
                    break;
                    

                   
            }
         setTimeout(function(){
            $(".charpreview").show();
$(".charinfo").show();
         },10);
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>