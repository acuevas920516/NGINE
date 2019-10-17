<?php
$ch = 'http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1129&tvmode=horizontal';
if (isset($_POST['ch']))
    $ch = $_POST['ch'];
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css"/>
</head>
<style type="text/css">
    iframe {
        transform: scale(0.5);
        transform-origin: 0 0;
        width: 1280px;
        height: 720px;
    }

    body, html {
        padding: 0px;
        margin: 0px;
    }

    @media (min-width: 1200px) {
        .container {
            height: 10%;
        }
    }
</style>
<body class="container">
<div class="row" id="containerShow" style="margin-top: 5%">
    <div class="col-md-12" id="iframeShow">
        <iframe id="skysignage_preview"
                src="
                <?php echo $ch;
                ?>"></iframe>
    </div>
</div>
<div class="row">
    <div class="col-md-12" id="buttons" style="position: absolute; top: 75%">
        <a id="video" class="btn btn-primary">Video</a>
        <a id="image" class="btn btn-primary">Image</a>
        <a id="api" class="btn btn-primary">API</a>
    </div>
</div>
<div class="modal fade" id="showAPI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">API Infos</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var videoComponent = "<div class='col-md-12' id='videoShow'>\n" +
            "        <video width='640' height='360' autoplay>\n" +
            "            <source src='https://csv1.blob.core.windows.net/csblob1/3/videos/skysignagelight.1564484463.mp4'\n" +
            "                    type='video/mp4'>\n" +
            "            Your browser does not support the video tag.\n" +
            "        </video>\n" +
            "    </div>";
        var iframeComponent = "<div class='col-md-12'>\n" +
            "            <iframe id='skysignage_preview'\n" +
            "                    src='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1129&tvmode=horizontal'></iframe>\n" +
            "        </div>";
        var imageComponent = "<div class='col-md-12' id='imageShow'>" +
            "<img src='https://csv1.blob.core.windows.net/csblob1/3327/images/msbienvenuebackground.png' width='640' height='320'> " +
            "</div>";
        $('#video').on('click', function (e) {
            e.preventDefault();
            $('#image').attr('disabled', 'disable');
            // $('#api').attr('disabled', 'disable');
            $('#iframeShow').fadeOut('slow', function () {
                $('#containerShow').append(videoComponent).fadeIn('slow');
            });
            setTimeout(function () {
                $('#videoShow').fadeOut('slow', function () {
                    $('#iframeShow').fadeIn('slow', function () {
                        $('#image').removeAttr('disabled');
                        $('#api').removeAttr('disabled');
                    });
                });
            }, 30000);
        });
        $('#image').on('click', function () {
            $('#video').attr('disabled', 'disable');
            // $('#api').attr('disabled', 'disable');
            $('#iframeShow').fadeOut('slow', function () {
                $('#containerShow').append(imageComponent).fadeIn('slow');
            });
            setTimeout(function () {
                $('#imageShow').fadeOut('slow', function () {
                    $('#iframeShow').fadeIn('slow', function () {
                        $('#video').removeAttr('disabled');
                        $('#api').removeAttr('disabled');
                    });
                });
            }, 30000);
        });

        $('#api').on('click', function () {
            <?php
                $curl = curl_init('http://www.ngine.co/test/api/index.php');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $type = curl_getinfo($curl)['content_type'];
                curl_close($curl);
                if ($type == "application/json") {
                    echo ("var type = 'json';\n");
                    echo ("var response = ".$response.";");
                }
                if ($type == "application/xml") {
//                    echo $response;
                    $xml = simplexml_load_string($response);
                    $json = json_encode($xml);
                    echo ("var type = 'xml';\n");
                    echo ("var response = JSON.parse('".$json."');");
                }
                ?>
            var contenido = "";
            if (type === 'json') {
                $.each(response.data.ad[0], function (key, value) {
                    contenido += "<p><bold>" + key + ":</bold> " + value + "</p>\n";
                });
            }
            if (type === 'xml') {
                $.each(response.ad, function (key, value) {
                    if (typeof value != 'object')
                        contenido += "<p><bold>" + key + ":</bold> " + value + "</p>\n";
                });
            }
            $('#showAPI .modal-body').append(contenido);
            $('#showAPI').modal('show');
        });
    });
</script>
</body>
</html>
