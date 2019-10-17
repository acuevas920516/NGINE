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
<div class="row">
    <div class="col-md-12" id="buttons" style="position: absolute; top: 75%">
        <form method="post" id="chanelSelection" action="http://localhost/Web-developer-test/">
            <a id="ch1" class="btn btn-primary">WD_CH_1</a>
            <a id="ch2" class="btn btn-primary">WD_CH_2</a>
            <a id="ch3" class="btn btn-primary">WD_CH_3</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('#ch1').on('click',function (e) {
           $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1129&tvmode=horizontal'>");
           $('form#chanelSelection').submit();
       });
        $('#ch2').on('click',function (e) {
            $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1130&tvmode=horizontal'>");
            $('form#chanelSelection').submit();
        });
        $('#ch3').on('click',function (e) {
            $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1131&tvmode=horizontal'>");
            $('form#chanelSelection').submit();
        });
    });
    $(document).keydown(function (e) {
        switch (e.keyCode) {
            case 49: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1129&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
            case 50: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1130&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
            case 51: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1131&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
            case 97: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1129&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
            case 98: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1130&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
            case 99: {
                $('form#chanelSelection').append("<input type='hidden' name='ch' value='http://www.skysignage.com/s/front/channel_preview.php?ID_channel=1131&tvmode=horizontal'>");
                $('form#chanelSelection').submit();
                break;
            }
        }
    });

</script>
</body>
</html>

