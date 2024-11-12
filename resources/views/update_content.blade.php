@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
    .download_img {
        height: 50px;
    }
</style>
@include('comp.header_public')
<div class="container mt-5 pt-5">
    <div class="card card-simple mb-5"
        style="border-left: 3px solid #5FBACE !important; max-width: 800px; margin:auto; ">
        <div class="card-body">

            <img id="lbl_img" class="mb-5" loading="lazy"
                style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
            <h1 id="update_version">1.7</h1>
            <h2 id="update_title" class="littext titlefont"></h2>
            <h4>Release Date: <span style="text-decoration:underline" id="update_releasedate"></span></h4>
            <pre class="text-light readable" id="update_desc"></pre>


        </div>
    </div>

    <div id="pnl_featurelist">



    </div>



    @include('comp.explore')

</div>
<script>
    loadFeatureDetails();
    function loadFeatureDetails() {
        var updateno = <?php echo json_encode($_GET["updateno"]); ?>;
        $.ajax({
            type: "get",
            url: "{{ route('stole_publicupdatedetailsfull') }}",
            data: { _token: "{{ csrf_token() }}", updateno: updateno },
            success: function (data) {
                data = JSON.parse(data);
                console.log(data)
                $("#lbl_img").prop("src", data[0]["coverphoto"]);
                $("#update_version").html(data[0]["version"]);
                $("#update_title").html(data[0]["headline"]);
                $("#update_releasedate").html(data[0]["tba"] == 1 ? "To Be Announced" : data[0]["releasedate"]);
                $("#update_desc").html(data[0]["details"]);
                let type = '';
                let color = '';
                for (j = 4; j >= 0; j--) {
                    switch (j) {
                        case 0:
                            type = "Class";
                            color = "#FF6347";
                            break;
                        case 1:
                            type = "Skills";
                            color = "#1E90FF";
                            break;
                        case 2:
                            type = "Mobs";
                            color = "#228B22";
                            break;
                        case 3:
                            type = "Equipments";
                            color = "#FFA500";
                            break;
                        case 4:
                            type = "Costumes";
                            color = "#9370DB";
                            break;
                        case 5:
                            type = "Miscellaneous";
                            color = "#A9A9A9";
                            break;
                    }
                    const filteredArray = data.filter(item => item.type == j)
                    let count = 0;
                    filteredArray.forEach(element => {
                        if (count == 0) {
                            $("#pnl_featurelist").prepend("<div id='feature_item" + j + "' class='feature_item_style' style=''><div style='display:flex; gap:1rem; flex-direction:row; align-items:center;justify-content:center;'><div><span  class='littext' style='font-size:clamp(1.75rem, 2vw, 1rem);padding-left:0;' >" + type + "</span></div><div class='separator-gold-left'></div></div>")
                        }
                        if (element["item_title"] && element["item_title"] != null && element["item_title"] != "") {
                            $("#feature_item" + j).append("<div class='card card-simple mb-4' style='margin-left:20px; max-width: 780px;  border-left: 3px solid " + color + " !important;'><div class='card-body'>" +
                                "<div class='row'>" +
                                "<div class='col-sm-2'>" +
                                "<img loading='lazy' style='width: 100%; border-radius: 10px; max-width:100px; display:block; margin:auto; ' src='" + element["item_cover"] + "'>"
                                + "</div>" +

                                "<div class='col-sm-10'>" +
                                "<h3 class='littext titlefont'>" + element["item_title"] + "</h3>" +
                                "<pre class='readable mb-0 text-light' style='font-size: 18px;'>" + element["item_desc"] + "</pre>"
                                + "</div>"




                                + "</div>"
                                + "</div></div>"
                                + "</div>");
                        }

                        count++;

                    });
                    // if (filteredArray.length > 0) {
                    //     $("#pnl_featurelist").prepend("<div style='max-width:800px;margin-inline:auto;'><h3  class='littext' >" + type + "</h3></div>")
                    // }
                }

                if (data.length === 1) {
                    $("#pnl_featurelist").prepend("<div class='card card-simple mb-5' style=' max-width: 800px; margin:auto; border-left: 3px solid #5FBACE !important;'><div class='card-body'>" +
                        "<div class='row'>" +
                        "<div class='col-sm-10'>" +
                        "<h3 class='littext titlefont'>" + "In Progress..." + "</h3>"
                        + "</div>"
                        + "</div>"
                        + "</div></div>");
                }
            }

        })
    }

    // for (i = 0; i < data.length; i++) {
    //     console.log(data[i]['type'])
    //     if ((data[i]["item_title"] && data[i]["item_title"] != null && data[i]["item_title"] != "") && data[i]['type'] == j) {
    //         $("#pnl_featurelist").prepend("<div class='card card-simple mb-5' style=' max-width: 780px; margin:auto; border-left: 3px solid " + color + " !important;'><div class='card-body'>" +
    //             "<div class='row'>" +
    //             "<div class='col-sm-2'>" +
    //             "<img loading='lazy' style='width: 100%; border-radius: 10px; max-width:100px; display:block; margin:auto; ' src='" + data[i]["item_cover"] + "'>"
    //             + "</div>" +

    //             "<div class='col-sm-10'>" +
    //             "<h3 class='littext titlefont'>" + data[i]["item_title"] + "</h3>" +
    //             "<pre class='readable mb-0 text-light' style='font-size: 18px;'>" + data[i]["item_desc"] + "</pre>"
    //             + "</div>"




    //             + "</div>"
    //             + "</div></div>");
    //         count++;
    //     }

    // }
    // if (count > 0) {
    //     $("#pnl_featurelist").prepend("<div style='max-width:800px;margin-inline:auto;'><h3  class='littext' >" + type + "</h3></div>")

    // }


</script>

@endsection