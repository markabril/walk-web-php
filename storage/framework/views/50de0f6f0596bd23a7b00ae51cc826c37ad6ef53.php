<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" type="image/png" href="https://i.ibb.co/922FyPD/essfav.png" />
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- BOOTSTRAP + JQUERY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- FONT AWESOME -->
    <script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
    <!-- SWEET ALERT -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
    <!-- DATA TABLE -->
    <script type='text/javascript' src='https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js'></script> <script type='text/javascript' src='https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js'></script> 
    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css'>
    <!-- PDF JS -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2/build/pdf.min.js"></script>
    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
    <!-- DRAG AND DROP -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-9?styles=49038" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/master_superadmin.css')); ?>">
</head>

<body>
    <?php echo $__env->make('comp.dynamic_caching', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('comp.dynamic_displaymessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php 
    $badge = session("is_admin");
    switch ($badge) {
        case '0':
            $badge  = "<span class='badge badge-primary'>SUPER ADMIN</span>";
        break;
        case '1':
            $badge  = "<span class='badge badge-primary'>ADMIN</span>";
        break;
    }
?>
<?php echo $__env->make('comp.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->yieldContent('contents'); ?>
            <?php echo $__env->make('comp.dashboard_modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">

    $('#logout').click(function(){
        $.ajax({
            url: "<?php echo e(route('portal_logout')); ?>",
            type: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
            },
            complete: function(response) {
                window.location.href="<?php echo e(route('ess_login')); ?>";
            }
        })
    })
    
    //cert5 form keyup function
    $('.cert5_forms, .cert6_forms').keyup(function(){
        if($(this).val() == "") {
            $(this).addClass('is-invalid');
        } else if($(this).val() != "") {
            $(this).removeClass('is-invalid');
        }
    })
function stringToHslColor(str, s, l) {
  var hash = 0;
  for (var i = 0; i < str.length; i++) {
    hash = str.charCodeAt(i) + ((hash << 5) - hash);
  }

  var h = hash % 360;
  return 'hsl('+h+', '+s+'%, '+l+'%)';
}

    $("#switch_userprofile").css("display","inline-block");
    //$("#switch_administration").css("display","none");
    $(".modal-dialog").addClass("modal-dialog-centered");
</script>


</body>
</html>