@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Tagis Lakas Managger
@endsection
@section('contents')
@include('comp.header_admin')
<div class="container mt-4">

  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Tagis Lakas Winners Management </h5>
    </div>
    <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addwinner" onclick="getTagisData()">Add New
        Record</button>


      <table class="table mt-3">
        <thead>
          <tr>
            <th>Date</th>
            <th>Season</th>
            <th>PH</th>
            <th>International</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_tagis">

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
        <h5 class="modal-title" id="exampleModalLongTitle">New Tagis Lakas Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>University Clash Date</label>
          <input type="date" id="inp_tagisdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Season</label>
          <input type="date" id="inp_tagisseason" class="form-control">
        </div>

        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inp_tagismessage" rows="3"></textarea>
        </div>


        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>
            <div class="form-group">
              <label>Overall</label>
              <input type="text" id="inp_ph_tagiswin_overall" class="form-control">
            </div>
            <div class="form-group">
              <label>Archer</label>
              <input type="text" id="inp_ph_tagiswin_archer" class="form-control">
            </div>
            <div class="form-group">
              <label>Brawler</label>
              <input type="text" id="inp_ph_tagiswin_brawler" class="form-control">
            </div>
            <div class="form-group">
              <label>Shaman</label>
              <input type="text" id="inp_ph_tagiswin_shaman" class="form-control">
            </div>
            <div class="form-group">
              <label>Swordsman</label>
              <input type="text" id="inp_ph_tagiswin_swordsman" class="form-control">
            </div>
          </div>

          <div class="col-sm-6">
            <h6>INTERNATIONAL</h6>
            <div class="form-group">
              <label>Overall</label>
              <input type="text" id="inp_int_tagiswin_overall" class="form-control">
            </div>
            <div class="form-group">
              <label>Archer</label>
              <input type="text" id="inp_int_tagiswin_archer" class="form-control">
            </div>
            <div class="form-group">
              <label>Brawler</label>
              <input type="text" id="inp_int_tagiswin_brawler" class="form-control">
            </div>
            <div class="form-group">
              <label>Shaman</label>
              <input type="text" id="inp_int_tagiswin_shaman" class="form-control">
            </div>
            <div class="form-group">
              <label>Swordsman</label>
              <input type="text" id="inp_int_tagiswin_swordsman" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addTagisData()">Save Record</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletewinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Remove Tagis Lakas Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteTagisWin()">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_viewhackathonwinners" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tagis Lakas Record View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Tagis Lakas Date</label>
        <h4 id="lbl_tagisdate">.</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>PHILIPPINES</th>
              <th>INTERNATIONAL</th>
            </tr>
          </thead>
          <tbody id="tbl_tagiswinners">
            <tr>
              <th>Overall:</th>
              <th id="ph_overall">.</th>
              <th id="int_overall">.</th>
            </tr>
            <tr>
              <th>Archer:</th>
              <th id="ph_archer">.</th>
              <th id="int_archer">.</th>
            </tr>
            <tr>
              <th>Brawler:</th>
              <th id="ph_brawler">.</th>
              <th id="int_brawler">.</th>
            </tr>
            <tr>
              <th>Shaman:</th>
              <th id="ph_shaman">.</th>
              <th id="int_shaman">.</th>
            </tr>
            <tr>
              <th>Swordsman:</th>
              <th id="ph_swordsman">.</th>
              <th id="int_swordsman">.</th>
            </tr>
          </tbody>
        </table>

        <label>Message</label>
        <pre id="lbl_tagismessage">.</pre>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Tagis Lakas Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>Tagis Lakas Date</label>
          <input type="date" id="inpedit_tagisdate" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" id="inpedit_tagismessage" rows="3"></textarea>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <h6>PH</h6>
            <div class="form-group">
              <label>Overall</label>
              <input type="text" id="inpedit_ph_tagiswin_overall" class="form-control">
            </div>
            <div class="form-group">
              <label>Archer</label>
              <input type="text" id="inpedit_ph_tagiswin_archer" class="form-control">
            </div>
            <div class="form-group">
              <label>Brawler</label>
              <input type="text" id="inpedit_ph_tagiswin_brawler" class="form-control">
            </div>
            <div class="form-group">
              <label>Shaman</label>
              <input type="text" id="inpedit_ph_tagiswin_shaman" class="form-control">
            </div>
            <div class="form-group">
              <label>Swordsman</label>
              <input type="text" id="inpedit_ph_tagiswin_swordsman" class="form-control">
            </div>
          </div>

          <div class="col-sm-6">
            <h6>INTERNATIONAL</h6>
            <div class="form-group">
              <label>Overall</label>
              <input type="text" id="inpedit_int_tagiswin_overall" class="form-control">
            </div>
            <div class="form-group">
              <label>Archer</label>
              <input type="text" id="inpedit_int_tagiswin_archer" class="form-control">
            </div>
            <div class="form-group">
              <label>Brawler</label>
              <input type="text" id="inpedit_int_tagiswin_brawler" class="form-control">
            </div>
            <div class="form-group">
              <label>Shaman</label>
              <input type="text" id="inpedit_int_tagiswin_shaman" class="form-control">
            </div>
            <div class="form-group">
              <label>Swordsman</label>
              <input type="text" id="inpedit_int_tagiswin_swordsman" class="form-control">
            </div>
          </div>
        </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveTagisChanges();">Make Changes</button>
      </div>
    </div>
  </div>
</div>




<script>


  loadTagisData();

  function getTagisData() {
    let int_overall;
    let int_archer;
    let int_brawler;
    let int_shaman;
    let int_swordsman;
    let ph_overall;
    let ph_archer;
    let ph_brawler;
    let ph_shaman;
    let ph_swordsman;
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

  function saveTagisChanges() {
    showload(true);

    let val_tagisseason = $("#inpedit_tagisdate").val();
    let val_tagisdate = $("#inpedit_tagisdate").val();
    let val_tagismessage = $("#inpedit_tagismessage").val();
    let val_ph_overall = $("#inpedit_ph_tagiswin_overall").val();
    let val_ph_archer = $("#inpedit_ph_tagiswin_archer").val();
    let val_ph_brawler = $("#inpedit_ph_tagiswin_brawler").val();
    let val_ph_shaman = $("#inpedit_ph_tagiswin_shaman").val();
    let val_ph_swordsman = $("#inpedit_ph_tagiswin_swordsman").val();

    let val_int_overall = $("#inpedit_int_tagiswin_overall").val();
    let val_int_archer = $("#inpedit_int_tagiswin_archer").val();
    let val_int_brawler = $("#inpedit_int_tagiswin_brawler").val();
    let val_int_shaman = $("#inpedit_int_tagiswin_shaman").val();
    let val_int_swordsman = $("#inpedit_int_tagiswin_swordsman").val();

    if (
      val_tagisseason &
      val_tagisdate &
      val_tagismessage &
      val_ph_overall &
      val_ph_archer &
      val_ph_brawler &
      val_ph_shaman &
      val_ph_swordsman &
      val_int_overall &
      val_int_archer &
      val_int_brawler &
      val_int_shaman &
      val_int_swordsman
    ) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_savetagischanges') }}",
        data: {
          _token: "{{ csrf_token() }}",
          val_tagisseason: val_tagisseason,
          val_tagisdate: val_tagisdate,
          val_tagismessage: val_tagismessage,
          val_ph_overall: val_ph_overall,
          val_ph_archer: val_ph_archer,
          val_ph_brawler: val_ph_brawler,
          val_ph_shaman: val_ph_shaman,
          val_ph_swordsman: val_ph_swordsman,
          val_int_overall: val_int_overall,
          val_int_archer: val_int_archer,
          val_int_brawler: val_int_brawler,
          val_int_shaman: val_int_shaman,
          val_int_swordsman: val_int_swordsman,
          itemid: currentId
        },
        success: function (data) {
          say("Changes saved!");
          openTagisView();
          loadTagisData();
          hideload(true);
          $("#mdl_edithackinfo").modal("hide");
        }
      })
    } else {
      say("Please complete all fields to save changes!");
      hideload(true);
    }

  }
  function openTagisView(controlObj = null) {
    showload(true);
    if (controlObj != null) {
      currentId = $(controlObj).data("itemid");
    }


    $.ajax({
      type: "get",
      url: "{{ route('stole_gettagissingle') }}",
      data: { _token: "{{ csrf_token() }}", currentid: currentId },
      success: function (data) {
        hideload(true);
        data = JSON.parse(data);
        $("#lbl_tagisdate").html(formatDate(data[0]["tagisdate"]));
        $("#lbl_ucmessage").html(data[0]["ucmsg"]);
        $("#ph_overall").html(universities[data[0]["ph_overall"]].name);
        $("#ph_archer").html(universities[data[0]["ph_archer"]].name);
        $("#ph_brawler").html(universities[data[0]["ph_brawler"]].name);
        $("#ph_shaman").html(universities[data[0]["ph_shaman"]].name);
        $("#ph_swordsman").html(universities[data[0]["ph_swordsman"]].name);

        $("#int_overall").html(universities[data[0]["int_overall"]].name);
        $("#int_archer").html(universities[data[0]["int_archer"]].name);
        $("#int_brawler").html(universities[data[0]["int_brawler"]].name);
        $("#int_shaman").html(universities[data[0]["int_shaman"]].name);
        $("#int_swordsman").html(universities[data[0]["int_swordsman"]].name);





        $("#inpedit_tagisdate").val(data[0]["tagisdate"]);
        $("#inpedit_tagismessage").val(data[0]["tagismsg"]);
        $("#inpedit_ph_tagiswin_overall").val(data[0]["ph_overall"]);
        $("#inpedit_ph_tagiswin_archer").val(data[0]["ph_archer"]);
        $("#inpedit_ph_tagiswin_brawler").val(data[0]["ph_brawler"]);
        $("#inpedit_ph_tagiswin_shaman").val(data[0]["ph_shaman"]);
        $("#inpedit_ph_tagiswin_swordsman").val(data[0]["ph_swordsman"]);


        $("#inpedit_int_tagiswin_overall").val(data[0]["int_overall"]);
        $("#inpedit_int_tagiswin_archer").val(data[0]["int_archer"]);
        $("#inpedit_int_tagiswin_brawler").val(data[0]["int_brawler"]);
        $("#inpedit_int_tagiswin_shaman").val(data[0]["int_shaman"]);
        $("#inpedit_int_tagiswin_swordsman").val(data[0]["int_swordsman"]);

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
  function deleteTagisWin() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('shoot_deletetagiswin') }}",
      data: { _token: "{{ csrf_token() }}", currentId: currentId },
      success: function (data) {
        hideload();
        $("#mdl_deletewinner").modal("hide");
        say(data);
        loadTagisData();
      }
    })
  }
  function openDelete(controlObj) {
    $("#mdl_deletewinner").modal("show");
    currentId = $(controlObj).data("dtid");
    say("the id fetched is number -> " + currentId);
  }


  function addTagisData() {
    showload(true);
    let data = {
      _token: "{{ csrf_token() }}",
      vl_tagisdate: $("#inp_tagisdate").val(),
      vl_tagismessage: $("#inp_tagismessage").val(),

      vl_ph_tagiswin_overall: $("#inp_ph_tagiswin_overall").val(),
      vl_ph_tagiswin_archer: $("#inp_ph_tagiswin_archer").val(),
      vl_ph_tagiswin_brawler: $("#inp_ph_tagiswin_brawler").val(),
      vl_ph_tagiswin_shaman: $("#inp_ph_tagiswin_shaman").val(),
      vl_ph_tagiswin_swordsman: $("#inp_ph_tagiswin_swordsman").val(),
      vl_int_tagiswin_overall: $("#inp_int_tagiswin_overall").val(),
      vl_int_tagiswin_archer: $("#inp_int_tagiswin_archer").val(),
      vl_int_tagiswin_brawler: $("#inp_int_tagiswin_brawler").val(),
      vl_int_tagiswin_shaman: $("#inp_int_tagiswin_shaman").val(),
      vl_int_tagiswin_swordsman: $("#inp_int_tagiswin_swordsman").val(),

    };

    if (Object.values(data).every(val => val !== "")) {
      $.ajax({
        type: "post",
        url: "{{ route('shoot_addtagiswin') }}",
        data: data,
        success: function (response) {
          say(response);
          // alert(response);
          $("#mdl_addwinner").modal("hide");
          $("#inp_ph_tagiswin_overall, inp_tagisdate, inp_tagismessage, inp_ph_tagiswin_archer,inp_ph_tagiswin_brawler,inp_ph_tagiswin_shaman,inp_ph_tagiswin_swordsman,inp_int_tagiswin_overall,inp_int_tagiswin_archer,inp_int_tagiswin_brawler,inp_int_tagiswin_shaman,inp_int_tagiswin_swordsman").val();

          loadTagisData();
          hideload(true);
        }
      });
    } else {
      say("Please complete all fields.");
      hideload(true);
    }

  }

  function loadTagisData() {
    showload();
    $.ajax({
      type: "get",
      url: "{{ route('stole_gettagiswins') }}",
      data: { _token: "_token" },
      success: function (data) {
        hideload();
        $("#tbl_tagis").html(data);
      }
    })
  }
</script>

@endsection