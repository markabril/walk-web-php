<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgba(0,0,0,0.8) !important; border-bottom: 1px solid black !important; position: fixed; width: 100%; z-index:1000; backdrop-filter: blur(69px);">
  <a class="navbar-brand" href="<?php echo e(route('goto_home')); ?>"><span style="color: #FF9A01;">PHIL</span><span style="color: #ED018C;">ROCKET</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" id="navlinks">
     

    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('stole_searchresult')); ?>" method="get">
      <input class="form-control mr-sm-2" type="search" name="searchkeyword" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>

<br>
<br>
<br>

<script type="text/javascript">
  

LoadNavContents();
function LoadNavContents(){
  $.ajax({
    type: "GET",
    url: "<?php echo e(route('stole_navbarlink')); ?>",
    data: {_token: "<?php echo e(csrf_token()); ?>"},
    success: function(data){
    $("#navlinks").html(data);
    }
  })
}

</script>