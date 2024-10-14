@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Homepage Management
@endsection
@section('contents')
@include('comp.header_admin')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Homepage Management</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="card mb-3">
            <div class="card-body">
              <p class="text-primary"><small>WEBSITE BODY</small></p>
              
              <div class="row">
                <div class="col-sm-6">
                  <h5>Website Logo</h5>
                  <div class="border mb-1" id="preview_logo" style="background-size: cover; background-position:center; width: 100%; height: 40vh;">
                  </div>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="changeBottomPanelInputMode('4')" data-target="#mdl_bottomcontents">Change</button>
                </div>
                <div class="col-sm-6">
                  <h5>Featured Information</h5>
                  <div class="border mb-1" id="preview_featureimage" style="background-size: cover; background-position:center; width: 100%; height: 40vh;">
                  </div>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="changeBottomPanelInputMode('0')" data-target="#mdl_bottomcontents">Change</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h5>Body Theme Photo</h5>
                  <div class="border mb-1" id="preview_lastestcoverphoto" style="background-size: cover; background-position:center; width: 100%; height: 40vh;">
                  </div>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl_changecover">Change</button>
                </div>
              </div>
              
              
              
              
              
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card mb-3">
            <div class="card-body">
              <p class="text-primary"><small>FEATURE SET</small></p>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tbl_featureset">
                  
                </tbody>
              </table>
              <bottom class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl_newfeature">Add Feature</bottom>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card mb-3">
            <div class="card-body">
              <p class="text-primary"><small>BOTTOM PANEL</small></p>
              <h5 id="bottom_main_title"><small class='text-muted'>n/a</small></h5>
              <p id="bottom_main_description"><small class='text-muted'>n/a</small></p>
              <button onclick="changeBottomPanelInputMode('1')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mdl_bottomcontents">Modify</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card mb-3">
            <div class="card-body">
              <p class="text-primary"><small>LEFT BOTTOM PANEL</small></p>
              <h5 id="bottom_left_title"><small class='text-muted'>n/a</small></h5>
              <p id="bottom_left_description"><small class='text-muted'>n/a</small></p>
              <button onclick="changeBottomPanelInputMode('2')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mdl_bottomcontents">Modify</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card mb-3">
            <div class="card-body">
              <p class="text-primary"><small>RIGHT BOTTOM PANEL</small></p>
              <h5 id="bottom_right_title"><small class='text-muted'>n/a</small></h5>
              <p id="bottom_right_description"><small class='text-muted'>n/a</small></p>
              <button onclick="changeBottomPanelInputMode('3')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mdl_bottomcontents">Modify</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<form>
  <!-- Modal -->
  <div class="modal fade" id="mdl_changecover" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New Cover Photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ @csrf_field() }}
          
          <div class="form-group">
            <input type="file" class="form-control" id="coverFile" required name="image">
            <label><input type="checkbox" value="reduce" id="reducecover"> Reduce image quality for faster loading time</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="uploadCover">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>


<form>
  <div class="modal fade" id="mdl_newfeature" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New Feature</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ @csrf_field() }}
          
          <div class="form-group">
            <label>Feature Name</label>
            <input type="text" class="form-control" required name="featname" id="inp_featname">
          </div>
          
          <div class="form-group">
            <label>Description</label>
            <textarea type="text" class="form-control" required id="inp_featdesc" name="featdesc" rows></textarea>
          </div>
          
          <div class="form-group">
            <label>Promo Image</label>
            <input type="file" class="form-control" required name="promimg" id="promoImage">
            
            <label><input type="checkbox" value="reduce" id="isreduce"> Reduce image quality for faster loading time</label>
          </div>
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addNewFeatureData()">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>


<div class="modal fade" id="mdl_deletefeature" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mb-0">Are you sure you want to delete this feature?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteFeature()">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_bottomcontents" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_pnlname">Panel Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" id="inp_bp_title_grp">
          <label>Title</label>
          <input id="inp_bp_title"  type="text" class="form-control">
        </div>
        <div class="form-group" id="inp_bp_description_grp">
          <label>Description</label>
          <input id="inp_bp_description"  type="text" class="form-control">
        </div>
        <div class="form-group" id="pnl_bottomImgPreview">
          <label>Current image. Click <a href="#" onclick="changeToRenewBottomImgMode()">here</a> to change.</label>
          <img src="" style="width:300px;" id="imgBottomImg">
        </div>
        <div class="form-group" id="pnl_bottomImageUpload">
          <label>Promo Image</label>
          <input  id="inp_bp_promoimg" type="file" class="form-control">
          <label><input type="checkbox" value="reduce" id="inp_bp_reduce"> Reduce image quality for faster loading time</label>
        </div>
        <div class="form-group" >
          <label>Display Logo</label>
          <input type="checkbox" value="1" id="chk_disp_logo">
        </div>

        <h6 id="pnl_Actbtnlabel">Action Button</h6>
        <div class="row" id="pnl_Actbtns">
          <div class="col-sm-6">
            <label>Button Name</label>
            <input id="inp_bp_btnname"  type="text" class="form-control">
          </div>
          <div class="col-sm-6">
            <label>Link</label>
            <input id="inp_bp_link"  type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateBottomPanel()">Yes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="mdl_featurepreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_pnlname">Edit Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="img_newsprev_cover" style="width: 200px;">
        <h4 id="lbl_newsprev_title"></h4>
        <pre id="lbl_newsprev_desc"></pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl_editfeature">Edit Information</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_editfeature" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_pnlname">Edit Feature</h5>
        <button type="button" class="close" data-dismiss="modal" onclick="resetFields()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Title</label>
          <input id="inpef_title"  type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>COVER PHOTO</label>
            <div class="form-group" id="pnl_featureCoverPreview">
              <label>Current image. Click <a href="#" onclick="changeToEdit()">here</a> to change.</label>
              <img src="" style="width:300px;" id="inp_featurecover">
            </div>
            <div class="form-group" id="pnl_featureCoverUpload" style="display:none;">
              <input  id="inp_featurecoverimg" type="file" class="form-control">
              <label><input type="checkbox" value="reduce" id="inp_bp_reduce"> Reduce image quality for faster loading time</label>
            </div>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea id="inpef_desc"  type="text" rows="8" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetFields()">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveFeatureChanges()">Yes</button>
      </div>
    </div>
  </div>
</div>



<script>
  var currFeatureId = "";
  var inputBottomMode = "";
  var isBottomEdit = false;
  var currentFeatureId = "";
  var state = "";
  loadallData();
  
  
  function applyFeatureOrder(controlObj){
    say("Re-ordering...");
    var orderno = $(controlObj).val();
    var itemid = $(controlObj).data("itemid");
    if(orderno){
      $.ajax({
        type: "post",
        url:"{{ route('shoot_applyfeaturereorder') }}",
        data: {_token: "{{ csrf_token() }}",
        orderno: orderno,
        itemid: itemid},
        success: function(data){
          showAllFeatures();
          say("Applied!");
        }
      })
    }
    
  }
  
  function saveFeatureChanges(){
    showload(true);
    
    var ffreduce = $("#isreduce");
    if (ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = 0;
    }

    var val_title = $("#inpef_title").val();
    var val_desc = $("#inpef_desc").val();
    var featureimg = $("#inp_featurecoverimg")[0].files[0];

      

    let formData = new FormData();

    formData.append('val_title',val_title);
    formData.append('val_desc',val_desc);
    formData.append('featureimg',featureimg);
    formData.append('itemid',currentFeatureId);
    formData.append('reduce',ffreduce);
    formData.append('_token', '{{ csrf_token() }}');



    if (val_title && val_desc){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_savefeachanges') }}",
        data: formData,
          contentType: false,
          processData: false,
        success: function(data){
          say("Updated!");
          $("#mdl_editfeature").modal("hide");
          
          hideload(true);
          getFeatureInfo();
          showAllFeatures();
          resetFields();
        }
      })
    }else{
      hideload(true);
      say("Please fill al the fields to save changes.");
    }
    
  }
  function getFeatureInfo(controlObj = null){
    showload();
    
    if(controlObj != null){
      currentFeatureId = $(controlObj).data("itemid");
    }
    
    $.ajax({
      type: "get",
      url: "{{ route('stole_featuresingleinfo') }}",
      data: {_token: "{{ csrf_token() }}",itemid: currentFeatureId},
      success: function(data){
        data = JSON.parse(data);
        $("#img_newsprev_cover").prop("src",data[0]["featureimg"]);
        $("#lbl_newsprev_title").html(data[0]["feattitle"]);
        $("#lbl_newsprev_desc").html(data[0]["featuredesc"]);
        
        $("#inpef_title").val(data[0]["feattitle"]);
        $("#inpef_desc").val(data[0]["featuredesc"]);

        $("#inp_featurecover").prop("src",data[0]["featureimg"]);

        
        hideload();
      }
    })
  }
  
  function changeToRenewBottomImgMode(){
    isBottomEdit = false;
    $("#pnl_bottomImgPreview").hide();
    $("#pnl_bottomImageUpload").show();
  }
  function getUpdatedLogo(sequenced = false){
    $.ajax({
      type: "get",
      url: "{{ route('stole_getbottomsingleinfo') }}",
      data: {_token: "{{ csrf_token() }}",conttype: "logo"},
      success: function(data){
        hideload();
        data = JSON.parse(data);
        if(data.length != 0){
          console.log(data[0]["img"])
          $("#preview_logo").css("background-image", "url(" + data[0]["img"] + ")");
        }

        if (sequenced){
          showAllFeatures(sequenced);
        }
      }
    });
  }



  function getAvailableBottomInfo(){
    showload();
    $("#inp_bp_promoimg").val("");
    $.ajax({
      type: "get",
      url: "{{ route('stole_getbottomsingleinfo') }}",
      data: {_token: "{{ csrf_token() }}",conttype: inputBottomMode},
      success: function(data){
        hideload();
        data = JSON.parse(data);
        if(data.length != 0){
          
          $("#pnl_bottomImgPreview").show();
          $("#imgBottomImg").prop("src",data[0]["img"]);
          $("#pnl_bottomImageUpload").hide();
          
          
          $("#inp_bp_title").val(data[0]["title"]);
          $("#inp_bp_description").val(data[0]["description"]);
          // inp_bp_promoimg
          $("#inp_bp_btnname").val(data[0]["btn_name"]);
          $("#inp_bp_link").val(data[0]["link"]);
          isBottomEdit = true;
        }else{
          $("#pnl_bottomImgPreview").hide();
          // $("#imgBottomImg").prop("src",data[0]["img"]);
          $("#pnl_bottomImageUpload").show();
          isBottomEdit = false;
        }
      }
    })
  }
  
  function loadBottomPanels(){
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_getbottominfopnl') }}",
      data: {_token: "{{ csrf_token() }}"},
      success: function(data){
        data = JSON.parse(data);
        hideload();
        for(var i =0 ; i < data.length;i++){
          $("#" + data[i]["cont_type"] + "_title").html(data[i]["title"]);
          $("#" + data[i]["cont_type"] + "_description").html(data[i]["description"]);
        }
        getLatestFeatured();
      }
    })
  }
  function updateBottomPanel(){
    showload(true);
    var ffreduce = $("#inp_bp_reduce");
    
    if (ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = 0;
    }
    var fd_title = '';
    if(inputBottomMode==="logo")
      fd_title = ($("#chk_disp_logo").prop("checked")===true)?"1":"0";
    else 
      fd_title = $("#inp_bp_title").val();

    let formData = new FormData();
 
    
    formData.append('title',fd_title);
    formData.append('desc',$("#inp_bp_description").val());
    formData.append('primg',$("#inp_bp_promoimg")[0].files[0]);
    formData.append('btnname',$("#inp_bp_btnname").val());
    formData.append('btnlink',$("#inp_bp_link").val());
    formData.append('reduce',ffreduce);
    formData.append('conttype',inputBottomMode);
    formData.append('_token', '{{ csrf_token() }}');
for (const pair of formData.entries()) {
        console.log(pair[0], pair[1]);
    }

    // Using FormData.forEach()
    formData.forEach((value, key) => {
        console.log(key, value);
    });
    if(((isBottomEdit == false && ($("#inp_bp_promoimg").val() != null && $("#inp_bp_promoimg").val() != ""))  || isBottomEdit == true)&& 
    $("#inp_bp_title").val() != "" && $("#inp_bp_description").val() != "" &&
    $("#inp_bp_link").val() != "" && $("#inp_bp_btnname").val() != ""
    ){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_updateabottompnl') }}",
        data: formData,
        contentType: false,
        processData: false,
        success : function(data){
          say("Updated!");
          hideload(true);
          loadBottomPanels();
          $("#mdl_bottomcontents").modal("hide");
        }
      })
    }else if(inputBottomMode=="logo" && ($("#inp_bp_promoimg").val() != null)){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_updateabottompnl') }}",
        data: formData,
        contentType: false,
        processData: false,
        success : function(data){
          say("Updated!");
          hideload(true);
          loadBottomPanels();
          getUpdatedLogo();
          $("#mdl_bottomcontents").modal("hide");
        }
      })
    }else{
      say("please fill all the fields.");
      hideload(true);
    }

    
    
    
    
  }
  
  function changeBottomPanelInputMode(modeName){
    
    
    $("#inp_bp_title").val("");
    $("#inp_bp_description").val("");
    $("#inp_bp_btnname").val("");
    $("#inp_bp_link").val("");
    
    
    switch(modeName){
      case "0":
      $("#title_pnlname").html("Featured");
      inputBottomMode = "featured";
      getAvailableBottomInfo();
      break;
      case "1":
      $("#title_pnlname").html("Main Bottom Panel");
      inputBottomMode = "bottom_main";
      getAvailableBottomInfo();
      break;
      case "2":
      $("#title_pnlname").html("Left Bottom Panel");
      inputBottomMode = "bottom_left";
      getAvailableBottomInfo();
      break;
      case "3":
      $("#title_pnlname").html("Right Bottom Panel");
      inputBottomMode = "bottom_right";
      getAvailableBottomInfo();
      break;
      case "4":
      $("#title_pnlname").html("Webpage Logo");
      $("#inp_bp_title_grp").hide();
      $("#inp_bp_description_grp").hide();
      $("#pnl_Actbtnlabel").hide();
      $("#pnl_Actbtns").hide();
      inputBottomMode = "logo";
      getAvailableBottomInfo();
      break;
    }
  }
  function loadallData(){
    getLatestFeatured(true);
  }
  
  function openDeleteFeature(controlObj){
    $("#mdl_deletefeature").modal("show");
    currFeatureId = $(controlObj).data("featureid");  
  }
  function deleteFeature(){
    showload();
    $.ajax({
      type: "post",
      url: "{{ route('shoot_deletefeature') }}",
      data: {_token: "{{ csrf_token() }}","featid": currFeatureId},
      success: function(data){
        hideload();
        $("#mdl_deletefeature").modal("hide");
        say("Feature deleted!");
        showAllFeatures();
      }
    })
  }
  
  $('#uploadCover').click(function() {
    showload(true);
    var ffreduce = $("#reducecover");
    
    
    if (ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = 0;
    }
    
    
    if ( $('#coverFile')[0].files[0] != null &&  $('#coverFile')[0].files[0] != ""){
      let formData = new FormData();
      formData.append('image', $('#coverFile')[0].files[0]);
      formData.append('reduce', ffreduce);
      formData.append('_token', '{{ csrf_token() }}');
      
      
      $.ajax({
        url: "{{ route('shoot_uploadhomecover') }}",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          say("Saved!");
          hideload(true);
          $("#mdl_changecover").modal("hide");
          $("#coverFile").val("");
          getLatestCover();
        }
      });
    }else{
      say("Please upload an image first.");
      hideload(true);
    }
    
  });
  function getLatestFeatured(sequenced = false){
    showload();
    $.ajax({
      url : "{{ route('stole_latestfeatured') }}",
      type: "get",
      data : {_token: "{{ csrf_token() }}"},
      success: function (data){
        hideload();
        // say(data);
        data = JSON.parse(data);
        if (data.length != 0){
          $("#preview_featureimage").css("background-image", "url(" + data[0]["img"] + ")");
        }
        
        if (sequenced){
          getLatestCover(sequenced);
          getUpdatedLogo(sequenced);
        }
      }
    })
  }
  
  
  
  
  function getLatestCover(sequenced = false){
    showload();
    $.ajax({
      url : "{{ route('stole_latestCoverPhoto') }}",
      type: "get",
      data : {_token: "{{ csrf_token() }}"},
      success: function (data){
        hideload();
        // say(data);
        data = JSON.parse(data);
        if (data.length != 0){
          $("#preview_lastestcoverphoto").css("background-image", "url(" + data[0]["img"] + ")");
        }
        
        if (sequenced){
          showAllFeatures(sequenced);
        }
      }
    })
  }
  
  
  function addNewFeatureData(){
    showload(true);
    let fftitle = $("#inp_featname").val();
    let ffdesc =$("#inp_featdesc").val();
    let ffimg = $('#promoImage')[0].files[0];
    var ffreduce = $("#isreduce");
    
    
    if (ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = 0;
    }
    
    
    if(fftitle != "" && ffdesc != "" && ffimg != ""){
      
      let formData = new FormData();
      
      formData.append("featname",fftitle);
      formData.append("featdesc",ffdesc);
      formData.append("promimg",ffimg);
      formData.append("reduce",ffreduce);
      formData.append('_token', '{{ csrf_token() }}');
      
      
      $.ajax({
        url: "{{ route('shoot_addnefeature') }}",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          
          $("#inp_featname").val("");
          $("#inp_featdesc").val("");
          $("#promoImage").val("");
          
          $("#mdl_newfeature").modal("hide");
          say("New feature added!");
          
          
          hideload(true);
          showAllFeatures();
        }
      })
      
    }else{
      hideload(true);
      say("Please complete all information inputs.");
    }
    
  }
  
  
  function showAllFeatures(sequenced = false){
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_addedfeatures') }}",
      data: {_token: "{{ csrf_token() }}"},
      success: function(data){
        $("#tbl_featureset").html(data);
        hideload();
        
        if(sequenced == true){
          
          
          loadBottomPanels();
          
          
        }
      }
    })
  }
  function resetFields(){
        $("#pnl_featureCoverPreview").show();
        $("#pnl_featureCoverUpload").hide();
        $("#inp_featurecoverimg").val('')
      }

      function changeToEdit()
      {
        $("#pnl_featureCoverPreview").hide()
        $("#pnl_featureCoverUpload").show()
      }
</script>

@endsection