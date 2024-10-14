@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - University Clash
@endsection
@section('contents')
@include('comp.header_admin')
<div class="container mt-4">

  <div class="card">
    <div class="card-header">
      <h5 class="card-title">University Clash Winners Management </h5>
    </div>
    <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addwinner" onclick="getUcData()">Add New
        Record</button>


      <table class="table mt-3">
        <thead>
          <tr>
            <th>Date</th>
            <th>PH</th>
            <th>International</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_uc">

        </tbody>
      </table>
    </div>
  </div>


</div>
<!-- Modal -->
<div class="modal fade" id="mdl_addwinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New University Clash Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>University Clash Date</label>
          <input type="date" id="inp_ucdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inp_ucmessage" rows="3"></textarea>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>
            <!-- <input type="text" id="inp_ph_ucwin" class="form-control"> -->
            <select name="" id="inp_ph_ucwin" class="form-control">
              <option value="0">Fiery Emerald</option>
              <option value="1">Night Eagle</option>
              <option value="2">Pelicans</option>
            </select>
          </div>

          <div class="col-sm-6">
            <h6>INTERNATIONAL</h6>
            <select name="" id="inp_int_ucwin" class="form-control">
              <option value="0">Fiery Emerald</option>
              <option value="1">Night Eagle</option>
              <option value="2">Pelicans</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addUcData()">Save Record</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletewinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Remove University Clash Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteUcWin()">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_viewhackathonwinners" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">University Clash Record View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>University Clash Date</label>
        <h4 id="lbl_ucdate">.</h4>
        <div class="px-3">
          <div class="row">
            <div class="col-6 h3">
              <h4>Philippines</h4>
            </div>
            <div class="col-6 h3" id="ph_ucwin">
              (n.a)
            </div>
          </div>
          <div class="row">
            <div class="col-6 h3">
              <h4>International</h4>
            </div>
            <div class="col-6 h3" id="int_ucwin">

            </div>
          </div>
        </div>


        <label>Message</label>
        <pre id="lbl_ucmessage">.</pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl_edithackinfo"
          onclick="">Make Changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_edithackinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit University Clash Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>University Clash Date</label>
          <input type="date" id="inpedit_ucdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inpedit_ucmessage" rows="3"></textarea>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>
            <select name="" id="inpedit_ph_ucwin" class="form-control">
              <option value="0">Fiery Emerald</option>
              <option value="1">Night Eagle</option>
              <option value="2">Pelicans</option>
            </select>
          </div>

          <div class="col-sm-6">
            <h6>INTERNATIONAL</h6>
            <select name="" id="inpedit_int_ucwin" class="form-control">
              <option value="0">Fiery Emerald</option>
              <option value="1">Night Eagle</option>
              <option value="2">Pelicans</option>
            </select>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveUcChanges();">Make Changes</button>
      </div>
    </div>
  </div>
</div>




<script>



  const universities = [
    {
      id: 0,
      name: "Fiery Emerald"
    },
    {
      id: 1,
      name: "Night Eagle"
    },
    {
      id: 2,
      name: "Pelicans"
    },
  ]


  var currentId = "";

  loadUcData();

  function getUcData() {
    var int_ucwin = '';
    var ph_ucwin = '';
    $.ajax({
      type: "get",
      url: "https://regions.walkonlinemobile.com/api/Tops/Hackathon/0/1",
      success: function (data) {
        $("#inp_ph_ucwin").prop("value", ph_ucwin);
        $("#inp_int_ucwin").prop("value", int_ucwin);
        $("#inp_hackmessage").prop("value", "CONGRATULATIONS!");
      }
    })

  }

  function saveUcChanges() {
    showload(true);
    var val_ucdate = $("#inpedit_ucdate").val();
    var val_ucmessage = $("#inpedit_ucmessage").val();
    var val_ph_ucwin = $("#inpedit_ph_ucwin").val();
    var val_int_ucwin = $("#inpedit_int_ucwin").val();

    if (val_ucdate && val_ucmessage && val_ph_ucwin && val_int_ucwin) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_saveucchanges') }}",
        data: {
          _token: "{{ csrf_token() }}",
          val_ucdate: val_ucdate,
          val_ucmessage: val_ucmessage,
          val_ph_ucwin: val_ph_ucwin,
          val_int_ucwin: val_int_ucwin,
          itemid: currentId
        },
        success: function (data) {
          say("Changes saved!");
          openUcView();
          loadUcData();
          hideload(true);
          $("#mdl_edithackinfo").modal("hide");
        }
      })
    } else {
      say("Please complete all fields to save changes!");
      hideload(true);
    }

  }
  function openUcView(controlObj = null) {
    showload(true);
    if (controlObj != null) {
      currentId = $(controlObj).data("itemid");
    }


    $.ajax({
      type: "get",
      url: "{{ route('stole_getucsingle') }}",
      data: { _token: "{{ csrf_token() }}", currentid: currentId },
      success: function (data) {
        hideload(true);
        data = JSON.parse(data);
        $("#lbl_ucdate").html(formatDate(data[0]["ucdate"]));


        $("#ph_ucwin").html(universities[data[0]["ph_ucwin"]].name);
        $("#int_ucwin").html(universities[data[0]["int_ucwin"]].name);


        $("#inpedit_ucdate").val(data[0]["ucdate"]);
        $("#inpedit_ucmessage").val(data[0]["ucmsg"]);
        $("#inpedit_ph_ucwin").val(data[0]["ph_ucwin"]);
        $("#inpedit_int_ucwin").val(data[0]["int_ucwin"]);

        $("#lbl_ucmessage").html(data[0]["ucmsg"]);
      }
    })
  }

  function formatDate(dateStr) {
    const date = new Date(dateStr);
    const options = {
      month: "long",
      day: "numeric",
      year: "numeric"
    };
    return date.toLocaleDateString("en-US", options);
  }
  function deleteUcWin() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('shoot_deleteucwin') }}",
      data: { _token: "{{ csrf_token() }}", currentId: currentId },
      success: function (data) {
        hideload();
        $("#mdl_deletewinner").modal("hide");
        say(data);
        loadUcData();
      }
    })
  }
  function openDelete(controlObj) {
    $("#mdl_deletewinner").modal("show");
    currentId = $(controlObj).data("dtid");
    say("the id fetched is number -> " + currentId);
  }


  function addUcData() {
    showload(true);
    let data = {
      _token: "{{ csrf_token() }}",
      vl_ucdate: $("#inp_ucdate").val(),
      vl_ucmessage: $("#inp_ucmessage").val(),
      vl_ph_ucwin: $("#inp_ph_ucwin").val(),
      vl_int_ucwin: $("#inp_int_ucwin").val(),
    };

    if (Object.values(data).every(val => val !== "")) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_adducwin') }}",
        data: data,
        success: function (response) {
          say(response);
          // alert(response);
          $("#mdl_addwinner").modal("hide");
          $("#inp_ucdate, #inp_ucmessage, #inp_ph_ucwin,#inp_int_ucwin").val("");
          loadUcData();
          hideload(true);
        }
      });
    } else {
      say("Please complete all fields.");
      hideload(true);
    }

  }

  function loadUcData() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_getucwins') }}",
      data: { _token: "_token" },
      success: function (data) {
        hideload();
        $("#tbl_uc").html(data);
      }
    })
  }
</script>

@endsection