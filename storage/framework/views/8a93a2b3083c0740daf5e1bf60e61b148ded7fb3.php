<?php $__env->startSection('title'); ?>
PHILROCKET
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
	<?php echo $__env->make('comp.header_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Article</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" onclick="GetAllFlashContent()">Flash Contents</a>
		    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" onclick="getAllCategoriesCreated()">Content Category</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		  	

	<div class="card mt-3">
		<div class="card-header">
			Content Creation
		</div>

		<div class="card-body">
			<div class="form-group">
				<button class="btn btn-light border" onclick="PrepareAddCreation()" data-toggle="modal" data-target="#mdl_newcreation">New Creation</button>
			</div>
			<div class="form-group">
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th>Title</th>
					<th>Category</th>
					<th>Modified</th>
					<th>Author</th>
					<th>Hits</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="tbl_createdcontents">
				
			</tbody>
		</table>
	</div>
		</div>
	</div>


		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  	
	<div class="card mt-3">
		<div class="card-header">
			Flash Contents
		</div>

		<div class="card-body">
			<div class="form-group">
				<button class="btn btn-light border" onclick="PrepareAddCreation()" data-toggle="modal" data-target="#mdl_addflashcontent">New Flash Content</button>
			</div>
			<div class="form-group">
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th>Preview</th>
					<th>Description</th>
					<th>Tags</th>
					<th>Type</th>
					<th>Created</th>
					<th>Hits</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="tbl_flashcontent">
				
			</tbody>
		</table>
	</div>
		</div>
	</div>



		  </div>
		  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
		  	
		  		<div class="card mt-3">
		<div class="card-header">
			Content Category
		</div>

		<div class="card-body">
			<div class="form-group">
				<button class="btn btn-light border"  data-toggle="modal" data-target="#mdl_addnewcat">New Content Category</button>
						<button class="btn btn-light border" data-toggle="modal" onclick="PrepareAddCreation()" data-target="#mbl_newsubcategory">New Sub-Category</button>
			</div>
			<div class="form-group">
		<table class="table table-bordered table-sm">
			<thead>
				<tr>
					<th>Category</th>
					<th>Sub Categories</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="tbl_categories">
				
			</tbody>
		</table>
	</div>
		</div>
	</div>





		  </div>
		</div>


</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_deleltesubcat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Sub-Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this sub-category?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="deleteSubCategory()">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_deletecat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this category?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mbl_newsubcategory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Content Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
        	<label>Category</label>
        	<select class="form-control" id="comp_mamangecontentcategory">
        		<option>Sample</option>
        	</select>
        </div>
        <div class="form-group">
        	<label>Sub-Category Name</label>
        	<input type="text" class="form-control" id="inp_subcatname" name="">
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addNewSubCat()">Save</button>
      </div>
    </div>
  </div>
</div>




<div class="modal" tabindex="-1" role="dialog" id="mdl_addnewcat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Content Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Category Name</label>
        	<input type="text" class="form-control" id="inp_categoryname" name="">
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addNewCategory()">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_addflashcontent">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Flash Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
       <div class="form-group">
       	<label>Banner Link</label>
       	<input type="text" name="" id="flashnew_bannerlink" class="form-control" placeholder="Type banner link here...">
       </div>
       <div class="form-group">
       	<label>Content Description</label>
       	<textarea rows="3" class="form-control" id="flashnew_ccontentdescription" placeholder="Type short description here..." name=""></textarea>
       </div>
       <div class="form-group">
       	<label>Tags (Comma Separated)</label>
       	<input type="text" class="form-control" id="flahsnew_tags" name="">
       </div>

        <div class="form-group">
       	<label>Banner Link</label>
       <select class="form-control" id="flash_type">
       	<option>Quotes</option>
       	<option>Memes</option>
       	<option>Trivias</option>
       </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="AddNewFlashContent()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div class="modal" tabindex="-1" role="dialog" id="mdl_newcreation">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Creation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="row">

						<div class="col-sm-12">
							  <div class="form-group">
							  	 	<label>Title</label>
						<input type="text" id="comp_title" class="form-control" placeholder="Title" name="">
					</div>
					  <div class="form-group">
							  	 	<label>Short Description</label>
						<input type="text" id="comp_shortdesc" class="form-control" placeholder="Short Description" name="">
					</div>
						</div>
						<div class="col-sm-12">
							  <div class="form-group">
							  	 	<label>Banner Image Link</label>
						<input type="text" id="comp_imagelink" class="form-control" placeholder="Banner Image Link" name="">
					</div>
						</div>
						<div class="col-sm-6">
							  <div class="form-group">
							  	<label>Category</label>
						<select id="comp_category" onchange="CategoryByParentCategory()" class="form-control"></select>
					</div>
						</div>
						<div class="col-sm-6">
							  <div class="form-group">
							  	<label>Subcategory</label>
						<select id="comp_subcategory" class="form-control"></select>
					</div>
						</div>
					</div>
					<div class="form-group">
						<div id="toolbar">
						
					</div>
					<div id="editor">
					</div>

					</div>
						<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
									<label>Credit</label>
							<input type="text" id="comp_credit" class="form-control" name="">
							</div>
						</div>
						<div class="col-sm-6">
							 <div class="form-group">
				       	<label>Tags (Comma Separated)</label>
				       	<input type="text" id="com_tags" class="form-control" name="">
				       </div>
						</div>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="SaveCreation()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_deletecontent">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this content?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="DeleteCurrentContent()">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteflashcont">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Flash Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this flash content?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteSelectedFlashContent()">Delete</button>
      </div>
    </div>
  </div>
</div>


	<script async="async" data-cfasync="false" src="//pl17175558.safestgatetocontent.com/0a324d07466686fcb162c244f71c25d7/invoke.js"></script>
<div id="container-0a324d07466686fcb162c244f71c25d7"></div>



<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script type="text/javascript">
LoadCreatedContents();
var content_id = "";
var flash_content_id = "";
var category_id = "";
var subcategory_id = "";
function addNewSubCat(){

	var maincategory = $("#comp_mamangecontentcategory").val();
	var subcatname = $("#inp_subcatname").val();

	if (maincategory != "" && subcatname != ""){
		$("#mbl_newsubcategory").modal("hide");
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_addnewsubcat')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",par_maincat:maincategory, par_subcat:subcatname},
			success: function(data){
				alert("Sub-Category Added Successfully!");
				$("#comp_mamangecontentcategory").val("");
				$("#inp_subcatname").val("");
				getAllCategoriesCreated();
			}
		})
	}else{
		alert("Please complete all fields to add new sub-category.");
	}
}
function prepareSubContentDeletion(control_obj){
	subcategory_id = $(control_obj).data("subcatid");
}
function deleteSubCategory(){
	$("#mdl_deleltesubcat").modal("hide");
	$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_deletesubcategory')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",par_subcatid:subcategory_id },
		success: function (data){
			alert("Sub-Category Deleted Successfully!");
				getAllCategoriesCreated();
		}
	})
}
function deleteCategory(){
	$("#mdl_deletecat").modal("hide");
	$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_deletesinglecategory')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",par_catid:category_id },
		success: function(data){
			alert("Category Deleted!");
			getAllCategoriesCreated();
		}
	})
}
function prepareCateogrydeletion(control_obj){
	category_id = $(control_obj).data("catid");
}
function getAllCategoriesCreated(){
	$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_managegetallcategories')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			$("#tbl_categories").html(data);
		}
	})
}
function addNewCategory(){
	$("#mdl_addnewcat").modal("hide");
var catname = $("#inp_categoryname").val();
if (catname != ""){
$.ajax({
	type: "POST",
	url: "<?php echo e(route('shoot_addnewcategory')); ?>",
	data: {_token: "<?php echo e(csrf_token()); ?>",par_categoryname: catname},
	success: function(data){
		$("#inp_categoryname").val("");
		alert("Category Added!");
		getAllCategoriesCreated();
	}
})
}else{
	alert("Please add a category name.");
}

}
function deleteSelectedFlashContent(control_obj){
	$("#mdl_deleteflashcont").modal("hide");
	
	$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_deletesingleflash')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",par_flashid: flash_content_id},
		success: function(data){
			alert("Flash Content Deleted!");
			GetAllFlashContent();
		}
	})
}
function parepareDeleteFlash(control_obj){
	flash_content_id = $(control_obj).data("flashid");
}

function DeleteCurrentContent(){
	$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_contentdelete')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",cont_id: content_id},
		success: function(data){
				$("#mdl_deletecontent").modal("hide");
				LoadCreatedContents();
		}
	})
}
function PrepareDeletionModal(control_obj){
	content_id = $(control_obj).data("contid");
	// alert(content_id);
}
var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean'],
   ['link', 'image']                                      // remove formatting button
];
var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme:"snow"
});


function SaveCreation(){
	  var composed_data = quill.root.innerHTML;
	  var cont_title = $("#comp_title").val();
	  var cont_shortdesc = $("#comp_shortdesc").val();
	  var cont_imagelink = $("#comp_imagelink").val();
	var cont_cat = $("#comp_category").val();
	var cont_subcat = $("#comp_subcategory").val();
	var cont_credit = $("#comp_credit").val();
  var com_tags = $("#com_tags").val();
  	if(composed_data != "" && comp_title != "" && cont_imagelink != "" && cont_cat != "" && cont_shortdesc != "" && com_tags != ""){
  		$.ajax({
  			type: "POST",
  			url: "<?php echo e(route('shoot_addnewcontent')); ?>",
  			data: {_token: "<?php echo e(csrf_token()); ?>",comp_data: composed_data,
  			cont_short: cont_shortdesc,
  			cont_img: cont_imagelink,
  			title: cont_title,
  			 category: cont_cat,
  			 subcategory: cont_subcat,
  			credit: cont_credit,
  			conttgs: com_tags},
  			success: function(data){
  						$("#mdl_newcreation").modal("hide");
  				alert("Success!");
				$("#comp_title").val("");
				$("#comp_imagelink").val("");
				$("#comp_category").val("");
				$("#comp_subcategory").val("");
				$("#comp_credit").val("");
				$("#comp_shortdesc").val("");
				 quill.root.innerHTML = "";
				 LoadCreatedContents();
  			}
  		})

  	}else{
  		alert("Missing fields detected!");
  	}
}
function PrepareAddCreation(){
	//GET CATEGORIES
	$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_getallcategories')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			$("#comp_category").html(data);
				$("#comp_mamangecontentcategory").html(data);
			CategoryByParentCategory();
		}
	})

}

function CategoryByParentCategory(){

	var parent_cat = $("#comp_category").val();

	//GET CATEGORIES
	$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_getcategorybyparent')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",parent: parent_cat},
		success: function(data){
			$("#comp_subcategory").html(data);
		}
	})
}

function LoadCreatedContents(){

	$.ajax({
		type: "GET",
		url:"<?php echo e(route('stole_getcontentall')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			$("#tbl_createdcontents").html(data);
		}
	})

}

function AddNewFlashContent(){

	var contbanner = $("#flashnew_bannerlink").val();
	var contdescription = $("#flashnew_ccontentdescription").val();
	var contenttags = $("#flahsnew_tags").val();
	var contenttype = $("#flash_type").val();

	if(contbanner != "" && contenttags != ""){
			$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_addnewflashcont')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			brnlink:contbanner,
			contdesc:contdescription,
			conttags:contenttags,
			conttype:contenttype},
			success : function(data){
				GetAllFlashContent();
				alert("Success!");
				$("#mdl_addflashcontent").modal("hide");
			}
		})
		}else{
			alert("Please complete atleast the banner and tag input.");
		}
	}
	function GetAllFlashContent(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_allflashcont')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#tbl_flashcontent").html(data);
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>