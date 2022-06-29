<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-database.js"></script>

    <script src="js/index.js"></script>
    <script src="js/ApiService.js"></script>
    <script src="js/database.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include_once 'pages/home.php';
?>
</body>
</html>
