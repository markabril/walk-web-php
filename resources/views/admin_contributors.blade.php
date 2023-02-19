@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Contributors
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-4">
    <h5>Public Team Members</h5>
       <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_teammember">New Contributor</button>

       <table class="table mt-3">
        <thead>
            <tr>
            <th>Username</th>
                <th>Description</th>
                <th>Feature Set</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="tbl_contributors">

        </tbody>
       </table>
    </div>


    <!-- Modal -->
<div class="modal fade" id="mdl_teammember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Contributor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="file" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Feature Set</label><br>
            <label><input type="checkbox"> Homepage</label>
            <label><input type="checkbox"> Hackathon Winners</label>
            <label><input type="checkbox"> Story Chapters</label>
            <label><input type="checkbox"> Public Team Members</label>
            <label><input type="checkbox"> Job Posting</label>
            <label><input type="checkbox"> Contributors</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Story Chapter</button>
      </div>
    </div>
  </div>
</div>


@endsection