<?php $__env->startSection('title'); ?>
WALK Online - Mobile MMORPG
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
	.download_img{
		height: 50px;
	}
</style>
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-5 pt-5">
    <div class="card card-simple mb-5" style="border-left: 3px solid #5FBACE !important;">
        <div class="card-body">
        
        <img id="lbl_img" class="mb-5" loading="lazy" style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
    <h1 id="update_version">1.7</h1>
    <h2 id="update_title" class="littext">A new update for the game</h2>
    <h4>Release Date: <span id="update_releasedate">April 11, 1998</span></h4>
    <pre class="text-light readable" id="update_desc">Description will be written here.Description will be written here.Description will be written here.Description will be written here.Description will be written here.Description will be written here. </pre>


        </div>
    </div>

    <div id="pnl_featurelist">



	</div>

    

    <?php echo $__env->make('comp.explore', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script>
        loadFeatureDetails();
        function loadFeatureDetails(){
            var updateno = <?php echo json_encode($_GET["updateno"]); ?>;
            $.ajax({
                type: "get",
                url: "<?php echo e(route('stole_publicupdatedetailsfull')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>",updateno: updateno},
                success: function(data){
                    data = JSON.parse(data);
                    $("#lbl_img").prop("src",data[0]["coverphoto"]);
                    $("#update_version").html(data[0]["version"]);
                    $("#update_title").html(data[0]["headline"]);
                    $("#update_releasedate").html(data[0]["releasedate"]);
                    $("#update_desc").html(data[0]["details"]);
                    for(i = 0; i < data.length;i++){

                        if (data[i]["item_title"] && data[i]["item_title"] != null && data[i]["item_title"] != ""){
                            $("#pnl_featurelist").prepend("<div class='card card-simple mb-5' style='border-left: 3px solid #5FBACE !important;'><div class='card-body'>"+
                        "<div class='row'>" +
                        "<div class='col-sm-2'>" + 
                        "<img style='width: 100%; max-width:100px; display:block; margin:auto; ' src='" + data[i]["item_cover"] + "'>"
                        +"</div>" +

                        "<div class='col-sm-10'>" + 
                        "<h3 class='littext'>" + data[i]["item_title"] + "</h3>" + 
                        "<h4 class='readable mb-0'>" + data[i]["item_desc"] + "</h4>"
                        +"</div>"


                        

                        + "</div>"
                        +"</div></div>");
                        }
                        
                    }

                }
            })
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>