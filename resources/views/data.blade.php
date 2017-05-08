<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GifNotGif</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    GifNotGif
                    <div class="container" style="text-align: center">
                        <form action='verify' class="form" method="GET" action="{{url('/')}}">
                            <div class="form-group">
                                <label>
                                <p>
                                <input type="text" class="form-control" placeholder="Enter instrument code" name="instrumentcode">
                                <input type="text" class="form-control" placeholder="Enter instrument code" name="instrumentcode2">
                                </p>
                                <p>
                                <input type="text" class="form-control" placeholder="Enter topic code" name="topiccode">
                                <input type="text" class="form-control" placeholder="Enter topic code" name="topiccode2">
                                </p><p>
                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="startdate">
                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="enddate">
                                </p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </label>
                            </div>
                            <button type="submit" class="btn">go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
