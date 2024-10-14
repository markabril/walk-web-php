@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Hackathon
@endsection
@section('contents')
@include('comp.header_admin')
<div class="container mt-4">

  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Hackathon Winners Management </h5>
    </div>
    <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addwinner" onclick="getHackData()">Add New
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
        <tbody id="tbl_hack">

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
        <h5 class="modal-title" id="exampleModalLongTitle">New Hackathon Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Hackathon Date</label>
          <input type="date" id="inp_hackdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inp_hackmessage" rows="3"></textarea>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>

            <div class="form-group">
              <label>N.E:</label>
              <input type="text" id="inp_ph_ne" class="form-control">
            </div>

            <div class="form-group">
              <label>F.E:</label>
              <input type="text" id="inp_ph_fe" class="form-control">
            </div>

            <div class="form-group">
              <label>PELI:</label>
              <input type="text" id="inp_ph_peli" class="form-control">
            </div>
          </div>

          <div class="col-sm-6">
            <h6>INTER</h6>

            <div class="form-group">
              <label>N.E:</label>
              <input type="text" id="inp_int_ne" class="form-control">
            </div>

            <div class="form-group">
              <label>F.E:</label>
              <input type="text" id="inp_int_fe" class="form-control">
            </div>

            <div class="form-group">
              <label>PELI:</label>
              <input type="text" id="inp_int_peli" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addHackathonData()">Save Record</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletewinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Hackathon Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteHackathonWin()">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_viewhackathonwinners" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hackathon Record View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Hackathon Date</label>
        <h4 id="lbl_hackathondate">.</h4>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>SCHOOL</th>
              <th>PHILIPPINES</th>
              <th>INTERNATIONAL</th>
            </tr>
          </thead>
          <tbody id="tbl_hackathonwinners">
            <tr>
              <th>N.E:</th>
              <th id="ph_ne">.</th>
              <th id="int_ne">.</th>
            </tr>
            <tr>
              <th>F.E:</th>
              <th id="ph_fe">.</th>
              <th id="int_fe">.</th>
            </tr>
            <tr>
              <th>PELI:</th>
              <th id="ph_pel">.</th>
              <th id="int_pel">.</th>
            </tr>
          </tbody>
        </table>
        <label>Message</label>
        <pre id="lbl_hackathonmessage">.</pre>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Hackathon Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>Hackathon Date</label>
          <input type="date" id="inpedit_hackdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inpedit_hackmessage" rows="3"></textarea>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>

            <div class="form-group">
              <label>N.E:</label>
              <input type="text" id="inpedit_ph_ne" class="form-control">
            </div>

            <div class="form-group">
              <label>F.E:</label>
              <input type="text" id="inpedit_ph_fe" class="form-control">
            </div>

            <div class="form-group">
              <label>PELI:</label>
              <input type="text" id="inpedit_ph_peli" class="form-control">
            </div>
          </div>

          <div class="col-sm-6">
            <h6>INTER</h6>

            <div class="form-group">
              <label>N.E:</label>
              <input type="text" id="inpedit_int_ne" class="form-control">
            </div>

            <div class="form-group">
              <label>F.E:</label>
              <input type="text" id="inpedit_int_fe" class="form-control">
            </div>

            <div class="form-group">
              <label>PELI:</label>
              <input type="text" id="inpedit_int_peli" class="form-control">
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveHackChanges();">Make Changes</button>
      </div>
    </div>
  </div>
</div>




<script>




  var currentId = "";

  loadHackathonData();

  function getHackData() {
    var int_fe = '';
    var int_ne = '';
    var int_peli = '';
    var ph_fe = '';
    var ph_ne = '';
    var ph_peli = '';
    $.ajax({
      type: "get",
      url: "https://regions.walkonlinemobile.com/api/Tops/Hackathon/0/1",
      success: function (data) {
        int_ne = data.international.International[0].Winner[0].Guild ? data.international.International[0].Winner[0].Guild.name : '';
        int_fe = data.international.International[0].Winner[1].Guild ? data.international.International[0].Winner[1].Guild.name : '';
        int_peli = data.international.International[0].Winner[2].Guild.name ? data.international.International[0].Winner[2].Guild.name : '';
        ph_ne = data.PH.Bakbakan[0].Winner[0].Guild ? data.PH.Bakbakan[0].Winner[0].Guild.name : "";
        ph_fe = data.PH.Bakbakan[0].Winner[1].Guild ? data.PH.Bakbakan[0].Winner[1].Guild.name : "";
        ph_peli = data.PH.Bakbakan[0].Winner[2].Guild ? data.PH.Bakbakan[0].Winner[2].Guild.name : "";
        $("#inp_ph_ne").prop("value", ph_ne);
        $("#inp_ph_fe").prop("value", ph_fe);
        $("#inp_ph_peli").prop("value", ph_peli);
        $("#inp_int_ne").prop("value", int_ne);
        $("#inp_int_fe").prop("value", int_fe);
        $("#inp_int_peli").prop("value", int_peli);
        $("#inp_hackmessage").prop("value", "CONGRATULATIONS!");
      }
    })

  }

  function saveHackChanges() {
    showload(true);
    var val_hackdate = $("#inpedit_hackdate").val();
    var val_hackmessage = $("#inpedit_hackmessage").val();
    var val_ph_ne = $("#inpedit_ph_ne").val();
    var val_ph_fe = $("#inpedit_ph_fe").val();
    var val_ph_peli = $("#inpedit_ph_peli").val();
    var val_int_ne = $("#inpedit_int_ne").val();
    var val_int_fe = $("#inpedit_int_fe").val();
    var val_int_peli = $("#inpedit_int_peli").val();

    if (val_hackdate && val_hackmessage && val_ph_ne && val_ph_fe && val_ph_peli && val_int_ne && val_int_fe && val_int_peli) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_savehackchanges') }}",
        data: {
          _token: "{{ csrf_token() }}",
          val_hackdate: val_hackdate,
          val_hackmessage: val_hackmessage,
          val_ph_ne: val_ph_ne,
          val_ph_fe: val_ph_fe,
          val_ph_peli: val_ph_peli,
          val_int_ne: val_int_ne,
          val_int_fe: val_int_fe,
          val_int_peli: val_int_peli,
          itemid: currentId
        },
        success: function (data) {
          say("Changes saved!");
          openHackathonView();
          loadHackathonData();
          hideload(true);
          $("#mdl_edithackinfo").modal("hide");
        }
      })
    } else {
      say("Please complete all fields to save changes!");
      hideload(true);
    }

  }
  function openHackathonView(controlObj = null) {
    showload(true);
    if (controlObj != null) {
      currentId = $(controlObj).data("itemid");
    }


    $.ajax({
      type: "get",
      url: "{{ route('stole_gethackathonsingle') }}",
      data: { _token: "{{ csrf_token() }}", currentid: currentId },
      success: function (data) {
        hideload(true);
        data = JSON.parse(data);
        $("#lbl_hackathondate").html(formatDate(data[0]["hackdate"]));


        $("#ph_ne").html(data[0]["ph_ne"]);
        $("#int_ne").html(data[0]["int_ne"]);
        $("#ph_fe").html(data[0]["ph_fe"]);
        $("#int_fe").html(data[0]["int_fe"]);
        $("#ph_pel").html(data[0]["ph_peli"]);
        $("#int_pel").html(data[0]["int_peli"]);


        $("#inpedit_hackdate").val(data[0]["hackdate"]);
        $("#inpedit_hackmessage").val(data[0]["hackmsg"]);
        $("#inpedit_ph_ne").val(data[0]["ph_ne"]);
        $("#inpedit_ph_fe").val(data[0]["ph_fe"]);
        $("#inpedit_ph_peli").val(data[0]["ph_peli"]);
        $("#inpedit_int_ne").val(data[0]["int_ne"]);
        $("#inpedit_int_fe").val(data[0]["int_fe"]);
        $("#inpedit_int_peli").val(data[0]["int_peli"]);



        $("#lbl_hackathonmessage").html(data[0]["hackmsg"]);
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
  function deleteHackathonWin() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('shoot_deletehackwin') }}",
      data: { _token: "{{ csrf_token() }}", currentId: currentId },
      success: function (data) {
        hideload();
        $("#mdl_deletewinner").modal("hide");
        say(data);
        loadHackathonData();
      }
    })
  }
  function openDelete(controlObj) {
    $("#mdl_deletewinner").modal("show");
    currentId = $(controlObj).data("dtid");
    say("the id fetched is number -> " + currentId);
  }


  function addHackathonData() {
    showload(true);
    let data = {
      _token: "{{ csrf_token() }}",
      vl_hackdate: $("#inp_hackdate").val(),
      vl_hackmessage: $("#inp_hackmessage").val(),
      vl_ph_ne: $("#inp_ph_ne").val(),
      vl_ph_fe: $("#inp_ph_fe").val(),
      vl_ph_peli: $("#inp_ph_peli").val(),
      vl_int_ne: $("#inp_int_ne").val(),
      vl_int_fe: $("#inp_int_fe").val(),
      vl_int_peli: $("#inp_int_peli").val()
    };

    if (Object.values(data).every(val => val !== "")) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_addhackwin') }}",
        data: data,
        success: function (response) {
          say(response);
          // alert(response);
          $("#mdl_addwinner").modal("hide");
          $("#inp_hackdate, #inp_hackmessage, #inp_ph_ne, #inp_ph_fe, #inp_ph_peli, #inp_int_ne, #inp_int_fe, #inp_int_peli").val("");
          loadHackathonData();
          hideload(true);
        }
      });
    } else {
      say("Please complete all fields.");
      hideload(true);
    }

  }

  function loadHackathonData() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_gethackwins') }}",
      data: { _token: "_token" },
      success: function (data) {
        hideload();
        $("#tbl_hack").html(data);
      }
    })
  }
</script>

@endsection