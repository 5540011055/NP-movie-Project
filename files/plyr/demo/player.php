<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Plyr - A simple HTML5 media player</title>
    <meta name="description" content="A simple HTML5 media player with custom controls and WebVTT captions.">
    <meta name="author" content="Sam Potts">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="../dist/plyr.css">

    <!-- Docs styles -->
    <!--<link rel="stylesheet" href="dist/demo.css">-->

    <!-- Preload -->
    <link rel="preload" as="font" crossorigin type="font/woff2" href="https://cdn.plyr.io/static/fonts/avenir-medium.woff2">
    <link rel="preload" as="font" crossorigin type="font/woff2" href="https://cdn.plyr.io/static/fonts/avenir-bold.woff2">
</head>

<body>

    <main role="main" id="main">
      
        <section>
            <video poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg?v1" controls crossorigin>
                <!-- Video files -->
                <source src="test.mp4" type="video/mp4">
                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.webm" type="video/webm">

                <!-- Text track file -->
                <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                    default>

                <!-- Fallback for browsers that don't support the <video> element -->
                <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.mp4" download>Download</a>
            </video>

           
        </section>
    </main>

    <!-- Plyr core script -->
    <script src="../dist/plyr.js"></script>

    <!-- Docs script -->
    <script src="dist/demo.js"></script>

    <!-- Rangetouch to fix <input type="range"> on touch devices (see https://rangetouch.com) -->
    <script src="https://cdn.rangetouch.com/1.0.1/rangetouch.js" async></script>

    <!-- Sharing libary (https://shr.one) -->
    <script src="https://cdn.shr.one/1.0.1/shr.js"></script>
    <script>
        if (window.shr) { window.shr.setup({ count: { classname: 'btn__count' } }); }
    </script>
</body>

</html>