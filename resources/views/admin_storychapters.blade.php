@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Story Chapters
@endsection
@section('contents')
@include('comp.header_admin')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Story Chapters Management</h5>
    </div>
    <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" id="modalBtn" data-target="#mdl_addnewstory">Add New Record</button>
      
      <table class="table mt-3">
        <thead>
          <tr>
            <th>Chapter No#</th>
            <th>Title</th>
            <th>Preview</th>
            <th>Date of Publish</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_chapters">
          
        </tbody>
      </table>
    </div>
  </div>
  
  
</div>


<!-- Modal -->
<div class="modal fade" id="mdl_addnewstory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Story Chapter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Cover Image</label>
          <input type="file" class="form-control" id="inp_coverimg">
          <label><input type="checkbox" value="reduce" id="isreduce"> Reduce image quality for faster loading time</label>
        </div>
        <div class="form-group">
          <label>Chapter No#</label>
          <input type="number" class="form-control" id="inp_chapnumber">
        </div>
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" id="inp_chaptitle">
        </div>
        <div class="form-group">
          <label>Content</label>
          <textarea class="form-control" rows="6" id='inp_chapstory'></textarea>
        </div>
        <div class="form-group">
          <label>Schedule Publish Date</label>
          <input type="date" class="form-control" id='inp_publishdate'>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addNewStory()">Save Story Chapter</button>
      </div>
    </div>
  </div>
</div>


<div class="modal " id="mdl_viewchapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Story Chapter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow: auto; max-height: 50vh;">
        <img src='' id="img_lore" style="height: 100px;">
        <pre id='lbl_story'>
          
        </pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal " id="mdl_deletechapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Story Chapter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this chapter?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="confirmDeleteChapter()">Delete</button>
      </div>
    </div>
  </div>
</div>


<div class="modal " id="mdl_editstorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Story Chapter</h5>
        <button type="button" class="close" onclick="resetFields()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='form-group'>
          <label>Chapter No#</label>  
          <input class="form-control" type="number" id="inpedit_chapno">
        </div>
        
        <div class="form-group">
          <label>COVER PHOTO</label>
          <div class="form-group" id="pnl_bottomImgPreview">
            <label>Current image. Click <a href="#" onclick="changeToEdit()">here</a> to change.</label>
            <img src="" style="width:300px;" id="inp_storycover">
          </div>
          <div class="form-group" id="pnl_bottomImageUpload" style="display:none;">
            <input  id="inp_storycoverimg" type="file" class="form-control">
            <label><input type="checkbox" value="reduce" id="inp_bp_reduce"> Reduce image quality for faster loading time</label>
          </div>
        </div>
        <div class='form-group'>
          <label>Title</label>  
          <input class="form-control" type="text" id="inpedit_title">
        </div>
        <div class='form-group'>
          <label>Description</label>  
          <textarea class="form-control" rows="8" id="inpedit_description"></textarea>
        </div>
        <div class='form-group'>
          <label>Publish Date</label>  
          <input class="form-control" type="date" id="inpedit_publishdate">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="resetFields()"  data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveStoryChanges()">Save Changes</button>
      </div>
    </div>
  </div>
</div>



<script>
  loadStory();
  var currentId = "";
  
  function getFullStoryInfo(controlObj){
    currentId = $(controlObj).data("itemid");
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_singlestorychap') }}",
      data: {_token: "{{ csrf_token() }}", itemid: currentId},
      success:function(data){
        console.log(data)
        data = JSON.parse(data);
        console.log(data[0]["coverimg"]);

        hideload();
        $("#inp_storycover").prop("src", ""+ data[0]["coverimg"]);
        $("#inpedit_chapno").val(data[0]["chapter"]);
        $("#inpedit_title").val(data[0]["title"]);
        $("#inpedit_description").val(data[0]["story"]);
        $("#inpedit_publishdate").val(data[0]["publishdate"]);
      }
    })
  }
  function saveStoryChanges(){
    showload(true);
    var ffreduce = $("#inp_bp_reduce");
    
    if (ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = 0;
    }
    
    var val_coverImg = $("#inp_storycoverimg")[0].files[0];
    var val_chapno = $("#inpedit_chapno").val();
    var val_title = $("#inpedit_title").val();
    var val_description = $("#inpedit_description").val();
    var val_publishdate = $("#inpedit_publishdate").val();
    let formData = new FormData();

    formData.append('val_chapno',val_chapno);
    formData.append('val_title',val_title);
    formData.append('val_description',val_description);
    formData.append('val_publishdate',val_publishdate);
    formData.append('coverimg',val_coverImg);
    formData.append('itemid',currentId);
    formData.append('reduce',ffreduce);
    formData.append('_token', '{{ csrf_token() }}');
    
    if(val_chapno && val_title && val_description && val_publishdate){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_savestorymodif') }}",
        data: formData,
        contentType: false,
        processData: false,
      success:function(data){
        say("Saved!");
        hideload(true);
        loadStory();
        resetFields();
        $("#mdl_editstorymodal").modal("hide");
      }
    })
  }else{
    say("Copmplete all fields to save changes.");
    hideload(true);
  }
  
  
  
}
function loadChapterFull(control_obj){
  showload()
  currentId = $(control_obj).data("dataid");
  $.ajax({
    type: "get",
    url: "{{ route('stole_chapterfull') }}",
    data: {_token: "{{ csrf_token() }}",currentId: currentId},
    success: function(data){
      data = JSON.parse(data);
      console.log(data[0]["coverimg"])
      $("#lbl_story").html(data[0]["story"]);
      $("#img_lore").prop("src",data[0]["coverimg"]);
      hideload();
    }
  })
}

function confirmDeleteChapter(){
  showload();
  $.ajax({
    type: "get",
    url : "{{ route('shoot_deletechapter') }}",
    data: {_token: "{{ csrf_token() }}",currentId: currentId},
    success: function(data){
      say(data);
      loadStory();
      hideload();
      $("#mdl_deletechapter").modal("hide");
    }
  })
}

function openDeleteChapter(control_obj){
  currentId = $(control_obj).data("dataid");
}
function loadStory(){
  showload();
  $.ajax({
    type: "get",
    url: "{{ route('stole_addedstories') }}",
    data: {_token: "{{ csrf_token() }}"},
    success: function(data){
      
      $("#tbl_chapters").html(data);
      hideload();
    }
  })
}


function addNewStory(){
  showload(true);
  var ffreduce = $("#isreduce");
  
  if (ffreduce.prop("checked") == true){
    ffreduce = "1";
  }else{
    ffreduce = 0;
  }
  
  let data = {
    
    reduce: ffreduce,
    vl_coverimg: $("#inp_coverimg")[0].files[0],
    vl_chapnum: $("#inp_chapnumber").val(),
    vl_chaptitle: $("#inp_chaptitle").val(),
    vl_chapstory: $("#inp_chapstory").val(),
    vl_publishdt: $("#inp_publishdate").val()
    
  };
  
  let formData = new FormData();
  
  formData.append('_token',"{{ csrf_token() }}");
  formData.append('reduce',ffreduce);
  formData.append('vl_coverimg',$("#inp_coverimg")[0].files[0]);
  formData.append('vl_chapnum',$("#inp_chapnumber").val());
  formData.append('vl_chaptitle',$("#inp_chaptitle").val());
  formData.append('vl_chapstory',$("#inp_chapstory").val());
  formData.append('vl_publishdt',$("#inp_publishdate").val());
  
  if(Object.values(data).every(val => val !== "" && val !== null)){
    
    $.ajax({
      type: "post",
      url: "{{ route('shoot_newstordata') }}",
      data:  formData,
      contentType: false,
      processData: false,
      success: function(data){
        say(data);
        $("#mdl_addnewstory").modal("hide");
        $("#inp_coverimg, #inp_chapnumber, #inp_chaptitle, #inp_chapstory, #inp_publishdate").val("");
        loadStory();
        hideload(true);
      }
      
    })
  }else{
    say("Please fill up all values");
    hideload(true);
  }
  
  
}
function resetFields(){
  $("#inp_storycover").prop('src',"");
  $("#inpedit_chapno").val("");
  $("#inpedit_title").val("");
  $("#inpedit_description").val("");
  $("#inpedit_publishdate").val("");
  $("#pnl_bottomImgPreview").show();
  $("#pnl_bottomImageUpload").hide();
  $("#inp_storycoverimg").val('')
}

function changeToEdit()
{
  $("#pnl_bottomImgPreview").hide()
  $("#pnl_bottomImageUpload").show()
}
function summarizeStory(story) {
  let sentences = story.split(". ");
  let summary = "";
  let summaryLength = Math.round(sentences.length / 2);
  let mainCharacters = [];
  let keyEvents = [];
  for (let i = 0; i < sentences.length; i++) {
    let sentence = sentences[i];
    if (sentence.includes(" the ") && (sentence.includes(" and ") || sentence.includes(" with "))) {
      let characterNames = sentence.split(" ").slice(sentence.indexOf("the ") + 4, sentence.indexOf(" and")).join(" ").split(" with ").join(" and").split(", ").join(" and").split(" and ");
      for (let j = 0; j < characterNames.length; j++) {
        if (!mainCharacters.includes(characterNames[j])) {
          mainCharacters.push(characterNames[j]);
        }
      }
    }
    if (sentence.includes(" then ") || sentence.includes(" but ") || sentence.includes(" so ")) {
      keyEvents.push(sentence);
    }
    if (i < summaryLength) {
      summary += sentence + ". ";
    }
  }
  if (mainCharacters.length > 0) {
    summary = "The story is about ";
    for (let i = 0; i < mainCharacters.length; i++) {
      if (i === mainCharacters.length - 1) {
        summary += "and " + mainCharacters[i] + ". ";
      } else if (i === mainCharacters.length - 2) {
        summary += mainCharacters[i];
      } else {
        summary += mainCharacters[i] + ", ";
      }
    }
  } else {
    summary += "The story is about " + story.split(" ").slice(0, story.split(" ").indexOf(".")).join(" ") + ". ";
  }
  if (keyEvents.length > 0) {
    summary += "It features key events like ";
    for (let i = 0; i < keyEvents.length; i++) {
      if (i === keyEvents.length - 1) {
        summary += "and " + keyEvents[i] + ".";
      } else if (i === keyEvents.length - 2) {
        summary += keyEvents[i];
      } else {
        summary += keyEvents[i] + ", ";
      }
    }
  } else {
    summary += "It is a story about " + story.split(" ").slice(0, story.split(" ").indexOf(".")).join(" ") + ".";
  }
  return summary;
}

let story = "In a small village, there was a young girl named Cinderella who lived with her cruel stepmother and stepsisters. Despite their mistreatment, Cinderella remained kind and hardworking. One day, the King of the land announced a ball where all eligible maidens were invited to meet the prince and potentially become his bride. Cinderella's stepmother forbade her from attending, but with the help of her fairy godmother, she was able to go to the ball and win the heart of the prince.";

console.log(summarizeStory(story));

</script>
@endsection