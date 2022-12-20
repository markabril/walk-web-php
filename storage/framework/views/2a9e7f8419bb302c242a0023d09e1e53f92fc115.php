<?php $__env->startSection('title'); ?>
Golftime
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
	.download_img{
		height: 50px;
	}
	.feature_thumbnail{
		height: 50px;
		width: 50px;
	}
</style>
<div class="container">
	<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="row">
		<div class="col-md-4 mt-5">
			<img  src="<?php echo e(asset('sab_images/gt/fulllogo.png')); ?>" style="width: 100%; margin-top: 15vh;">
			<center>
				<h4>The newest way to book your tee time!</h4>
			<a target="_blank" href="https://www.apple.com/ph/app-store/" alt="iOS download link">
			<img loading="lazy" alt="..." class="mt-3 download_img" src="https://e7.pngegg.com/pngimages/2/670/png-clipart-logo-app-store-font-brand-product-app-store-play-store-text-logo.png">
			</a>
			<a target="_blank" href="https://play.google.com/store?utm_source=apac_med&utm_medium=hasem&utm_content=Oct0121&utm_campaign=Evergreen&pcampaignid=MKT-EDR-apac-ph-1003227-med-hasem-py-Evergreen-Oct0121-Text_Search_BKWS-BKWS|ONSEM_kwid_43700035189602385_creativeid_406915427892_device_c&gclid=Cj0KCQiAsqOMBhDFARIsAFBTN3cQnFMtFR1ij9KmWq1Qn6-qRoIG3t2H2sG_fXJs13EYeniWMXOO3ckaAi_rEALw_wcB" alt="Android download link">
			<img loading="lazy" alt="..." class="mt-3 download_img" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/1200px-Google_Play_Store_badge_EN.svg.png">
			</a>
			</center>
		</div>
		<div class="col-md-8 mt-5">
			<img loading="lazy" alt="..." src="<?php echo e(asset('sab_images/gt/gtime.png')); ?>" style="width:100%; border-radius: 20px;">
		</div>
		<div class="col-md-12 mt-5 mb-3">
			<center><h4>Why choose Golftime Golf Booking App?</h4></center>
		</div>
		<div class="col-md-12 mt-3">
			<div class="card" style="background-color: rgba(115,155,24,0.4);">
				<div class="card-body">
					<div class="card-deck">
				<div class="card animate1">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-golf-ball"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Quickly find the golf courses that you want</p></h4>
					</div>
				</div>
				<div class="card animate2">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-bolt"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Fast access to tee time Reservation.</p></h4>
					</div>
				</div>
				<div class="card animate3">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-location-circle"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Find what you desire in Snapstore.</p></h4>
					</div>
				</div>
			</div>
			<div class="card-deck mt-3">
				<div class="card animate4">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-plane-departure"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Golf Tour</p></h4>
					</div>
				</div>
				<div class="card animate5">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-user-friends"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Socialize with your golf buddies!</p></h4>
					</div>
				</div>
				<div class="card animate2">
					<div class="card-body">
						<h1><i style="color: #739B19;" class="fal fa-trophy-alt"></i></h1>
						<h4>
							<p class="mt-3 mb-0">Tournament</p></h4>
					</div>
				</div>

			</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<br>
			<br>
			<br>
			<hr>
			<br>
			<br>
			<div class="row">
				<div class="col-md-4 mt-5 mb-5">
					<img loading="lazy" alt="..." src="<?php echo e(asset('sab_images/gt/sab.png')); ?>" style="width:100%;">
				</div>
				<div class="col-md-8 mt-5 mb-5">
					<h4>Powered by Spann and Bunker</h4>
					<p>Spann and Bunker Technology Corp. (SBTC) provides timely business information solution. Our capacities involve Software Development with Technical Support.</p>
					<a href="<?php echo e(route('goto_aboutcompany')); ?>" class="btn btn-light">Read more</a>
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('comp.public_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>