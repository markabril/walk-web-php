@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - News
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-4">

  <div class="card" >
    <div class="card-header">
    <h5 class="card-title">Manage News and Updates</h5>
    </div>
    <div class="card-body">
      
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="btn_news" onclick="loadNews()" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">News</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="btn_updates" onclick="loadUpdates()" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Updates</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="btn_news">

  <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#mdl_newspost">Publish a News</button>
  <table class="table mt-3">
        <thead>
            <tr>
                <th>Date Posted</th>
                <th>Headline</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbl_news">

        </tbody>
       </table>


  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="btn_updates">
  <button class="btn btn-primary mt-3 " data-toggle="modal" onclick="prepareUpdateCreation()" data-target="#mdl_updatepost">Post an Update</button>


  <table class="table mt-3">
        <thead>
            <tr>
                <th>Date Posted</th>
                <th>Headline</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbl_updates">

        </tbody>
       </table>


  </div>
</div>


    </div>
    </div>
  </div>
    
       
      



    <!-- Modal -->
<div class="modal fade" id="mdl_newspost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Publish a News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>HEADLINE</label>
            <input type="text" id="inp_newsheadline" class="form-control">
          </div>
          <div class="form-group">
            <label>COVER PHOTO</label>
            <input type="file" id="inp_coverphoto" class="form-control">
            <label><input type="checkbox" value="reduce" id="reducecover"> Reduce image quality for faster loading time</label>
          </div>
          <div class="form-group">
            <label>DESCRIPTION</label>
           <textarea class="form-control" id="inp_description" rows="8"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="button" onclick="addNews()" class="btn btn-primary">PUBLISH</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletenews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p>Are you sure you wan to delete this News?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="button" onclick="deleteNews()" class="btn btn-danger">YES</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_updatepost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Post an Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <div class="card m-3" id="pnl_setupupdate">
      <div class="card-body">
        <h4 class="mb-3">1/2 : Provide General Details </h4>



        <div class="form-group">
            <label>VERSION NUMBER</label>
            <input type="text" id="inp_update_versionnumber" class="form-control">
          </div>


        <div class="form-group">
            <label>COVER PHOTO</label>
            <input type="file" id="inp_update_cover" class="form-control">
            <label><input type="checkbox" value="reduce" id="inp_update_reducecove"> Reduce image quality for faster loading time</label>
          </div>

        <div class="form-group">
            <label>UPDATE TITLE</label>
            <input type="text" id="inp_update_title" class="form-control">
          </div>
          
          <div class="form-group">
            <label>SHORT DESCRIPTION</label>
            <textarea class="form-control" id="inp_update_description" rows="8"></textarea>
          </div>

          <div class="form-group">
            <label>RELEASE DATE</label>
            <input type="date" class="form-control" id="inp_update_releasedate">
          </div>
          
          

          <div class="form-group">
            <button class="btn btn-primary" onclick="setupUpdateCreation()">NEXT</button>
          </div>
      </div>
     </div>

     <div class="pnl_addupdateitems">

    <img style="height:100px;" src="" id="prev_img">
     <h5 id="prev_title">Title</h5>
     <div  style="overflow:auto; max-height:100px;">
     <span>Version: <strong id="prev_version">June 21, 2020</strong></span><br>
    <span>Release: <strong id="prev_releasedate">June 21, 2020</strong></span><br>
     <pre id="prev_description">qdqwdqfewfwdwef</pre>
     </div>
     

     <button class="btn btn-primary mt-3 mb-3" onclick="preparepAddFeatureItem()" data-toggle="modal" data-target="#mdl_additemtoupdate">Add Feature Item</button>

     <table class="table table-sm">
      <thead>
        <tr>
          <th>Cover</th>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="tbl_updateitemstbl">

      </tbody>
     </table>


      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="mdl_additemtoupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Feature Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>COVER PHOTO</label>
            <input type="file" id="inp_item_cover" class="form-control">
            <label><input type="checkbox" value="reduce" id="inp_item_reduce"> Reduce image quality for faster loading time</label>
          </div>

      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="inp_item_title">
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="8" id="inp_item_description"></textarea>
      </div>
     </div>

     <div class="modal-footer">

     <button class="btn btn-secondary">CANCEL</button>

        <button class="btn btn-primary" onclick="addNewFeatureContent()">PUBLISH</button>
     </div>


      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="mdl_conformationdeletefeatitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Feature Item?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this feature item?</p>
     </div>

     <div class="modal-footer">

     <button class="btn btn-secondary">CANCEL</button>

        <button class="btn btn-danger" onclick="deleteFeatureItem()">DELETE</button>
     </div>


      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mdl_deleteupdaterec" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Update Record?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this update record?</p>
     </div>

     <div class="modal-footer">

     <button class="btn btn-secondary">CANCEL</button>

        <button class="btn btn-danger" onclick="deleteUpdateRecord()">DELETE</button>
     </div>


      </div>
    </div>
  </div>
</div>

<script>
  var currentnewsnumber = "";
  var current_updateid = "";
  var current_itemId = "";

  loadSelectedLastTab();

  function preparepAddFeatureItem(){
    $("#inp_item_cover").val("");
$("#inp_item_title").val("");
$("#inp_item_description").val("");
  }
  function openDeleteUpdateRecordConfirmation(control_obj){
    current_updateid = $(control_obj).data("recordid");
    $("#mdl_deleteupdaterec").modal("show");
  }

  function deleteUpdateRecord(){
    showload();
    $.ajax({
      type: "post",
      url: "{{ route('shoot_deleteupdaterec') }}",
      data: {_token: "{{ csrf_token() }}",current_updateid: current_updateid },
      success: function(data){
        hideload();
        say(data);
        $("#mdl_deleteupdaterec").modal("hide");
        loadUpdates();
      }
    })
  }


  function prepareUpdateCreation(){
    current_updateid = "";
    current_itemId = "";
    $("#pnl_setupupdate").show();
$("#pnl_addupdateitems").hide();
  }
  function openDeleteFeatureItemConfirmation(control_obj){
    current_itemId = $(control_obj).data("itemid");
    $("#mdl_conformationdeletefeatitem").modal("show");
  }
  function deleteFeatureItem(){
    showload();
    $.ajax({
      type: "post",
      url: "{{ route('shoot_deletefeatureitem') }}",
      data: {_token: "{{ csrf_token() }}", current_itemId: current_itemId},
      success: function(data){
        say(data);
        $("#mdl_conformationdeletefeatitem").modal("hide");
        loadupdateItems(current_updateid);
        hideload();
      }
    })
  }

  function editUpdateContents(control_obj){
    current_updateid = $(control_obj).data("itemid");
    $("#mdl_updatepost").modal("show");
    $("#pnl_setupupdate").hide();
    $("#pnl_addupdateitems").show();
    loadupdateItems(current_updateid);
  }

  function loadupdateItems(itemId){


    a_getUpdateInfoById();

    function a_getUpdateInfoById(){
      $.ajax({
        type: "get",
        url: "{{ route('stole_updatebasicinfo') }}",
        data: {_token: "{{ csrf_token() }}",itemId: itemId},
        success: function(data){
          data = JSON.parse(data);
          $("#prev_img").prop("src",data[0]["coverphoto"]);
          $("#prev_title").html(data[0]["headline"]);
          $("#prev_version").html(data[0]["version"]);
          $("#prev_releasedate").html(data[0]["releasedate"]);
          $("#prev_description").html(data[0]["details"]);
          a_getUpdateItems();
        }
      })
    }

    function a_getUpdateItems(){
      $.ajax({
      type: "get",
      url: "{{ route('stole_updateitems') }}",
      data: {_token: "{{ csrf_token() }}",current_updateid: itemId},
      success: function(data){
      $("#tbl_updateitemstbl").html(data);
      }
      })
    }
  

  }

  function addNewFeatureContent(){
    var formData = new FormData();

    var ffreduce = $("#inp_item_reduce");


if (ffreduce.prop("checked") == true){
  ffreduce = "1";
}else{
  ffreduce = 0;
}

showload();


var inp_item_cover = $("#inp_item_cover")[0].files[0];
var inp_item_title = $("#inp_item_title").val();
var inp_item_description = $("#inp_item_description").val();

formData.append("_token","{{ csrf_token() }}");
formData.append("item_id",current_updateid);
formData.append("item_cover",inp_item_cover);
formData.append("item_title",inp_item_title);
formData.append("ffreduce",ffreduce);
formData.append("item_description",inp_item_description);

if ( inp_item_cover && inp_item_title && inp_item_description){
  $.ajax({
  type: "post",
  url: "{{ route('shoot_newupdateitem') }}",
  data: formData,
  contentType: false,
          processData: false,
  success: function(data){
    say(data);
    loadupdateItems(current_updateid);
    $("#mdl_additemtoupdate").modal("hide");
    hideload();
  }
})
}else{
say("Please fill all fields.");
hideload();
}
  }
      function addNews(){
        var ffreduce = $("#reducecover");
if (ffreduce.prop("checked") == true){
  ffreduce = "1";
}else{
  ffreduce = 0;
}


        var newsheadline = $("#inp_newsheadline").val();
        var coverphoto = $("#inp_coverphoto")[0].files[0];
        var description = $("#inp_description").val();

        let formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
    formData.append('newsheadline', newsheadline);
    formData.append('cover',coverphoto);
    formData.append('ffreduce', ffreduce);
    formData.append('description',description);
      showload();

        if(newsheadline != "" && coverphoto != "" && description != "" && coverphoto != null && coverphoto != ""){
          $.ajax({
            type: "post",
            url: "{{ route('shoot_publishnews') }}",
            data: formData,
          contentType: false,
          processData: false,
            success: function(data){
              say(data);
              $("#mdl_newspost").modal("hide");
              $("#inp_newsheadline").val("");
              $("#inp_description").val("");
              $("#inp_coverphoto").val("");
              hideload();
              loadNews();
            }
          })
        }else{
          say("Please complete all fields first.");
          loadNews();
        }

      }
      function loadNews(){
        localStorage.setItem("lastnewstab","news");
          showload();

          $.ajax({
            type: "get",
            url: "{{ route('stole_getallnews') }}",
            data: {
              _token: "{{ csrf_token() }}"
            },
            success: function(data){
              hideload();
                $("#tbl_news").html(data);
            }
          })
          
      }
      function openDeleteNews(controlObj){
          $("#mdl_deletenews").modal("show");
          currentnewsnumber = $(controlObj).data("newsno");
      }
      function deleteNews(){
        showload();
          $.ajax({
            type: "post",
            url: "{{ route('shoot_deletenews') }}",
            data: {_token: "{{ csrf_token() }}",currentnewsnumber: currentnewsnumber },
            success: function(data){
              hideload();
              say(data);
              loadNews();
              $("#mdl_deletenews").modal("hide");
            }
          })
      }
      function loadUpdates(){
        localStorage.setItem("lastnewstab","updates");
        $.ajax({
          type: "get",
          url: "{{ route('stole_updatesfromadmin') }}",
          data: {_token: "{{ csrf_token() }}"},
          success: function(data){
  
            $("#tbl_updates").html(data);
          }
        })
      }
      function deleteUpdate(){

      }
      function setupUpdateCreation(){
        showload();
        var updatecoverfile = $("#inp_update_cover")[0].files[0];
        var inp_update_versionnumber = $("#inp_update_versionnumber").val();
        var ffreduce = $("#inp_update_reducecove");
        var updatetitle = $("#inp_update_title").val();
        var updatedescription = $("#inp_update_description").val(); 
        var inp_update_releasedate = $("#inp_update_releasedate").val();

        
        if (ffreduce.prop("checked") == true){
          ffreduce = "1";
        }else{
          ffreduce = 0;
        }

        if (inp_update_versionnumber && updatetitle && updatedescription && inp_update_releasedate) {

          let formData = new FormData();
          formData.append("_token", "{{ csrf_token() }}");
          formData.append("versionnumber", inp_update_versionnumber );
          formData.append("ffreduce",ffreduce);
          formData.append("updatecoverfile", updatecoverfile);
          formData.append("updatetitle", updatetitle);
          formData.append("updatedescription", updatedescription );
          formData.append("releasedate", inp_update_releasedate );


          $.ajax({
            type: "post",
            url: "{{ route('shoot_addnewupdatesetup') }}",
            data: formData,
            contentType: false,
          processData: false,
            success: function(data){
              data  = JSON.parse(data);

              if (data.length != 0){
                current_updateid = data[0]["id"];
                say("id is = " + current_updateid);
                $("#pnl_setupupdate").hide()
                $("#pnl_addupdateitems").show();
                loadupdateItems(current_updateid);
                hideload();
                loadUpdates();
              }else{
                say("Please fill all fields");
                hideload();
              }
             
            }
          });



} else {
  say("Please fill all fields.");
}

      }



      function loadSelectedLastTab(){
          if(localStorage.getItem("lastnewstab") == null){
            //fresh
          }else{
            //load 
            if(localStorage.getItem("lastnewstab") == "news"){
                $("#btn_news").click();
            }else if(localStorage.getItem("lastnewstab") == "updates"){
                $("#btn_updates").click();
            }

          }
      }
 </script>

@endsection