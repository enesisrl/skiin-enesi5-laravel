<!doctype html>
<html lang="{{ Websites::currentLanguage('iso_code2') }}">
<head>
    {!! Meta::render() !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />

    <style>
        body, html {
            background: #000000;
        }
        .video-container {
            display: flex;
            width: 100%;
            height: 100vh;
            position: relative;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>
<body>
<div class="video-container">
        <video
                id="video-tutorial"
                class="video-js"
                controls
                preload="auto"
                data-setup="{}"
        >
            <source src="{!! $video_url !!}" type="video/mp4" />
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
                >
            </p>
        </video>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</body>
</html>
