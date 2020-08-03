<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dan | Test</title>

    <link rel="shortcut icon" href="/image/favicon.png" type="image/x-icon">
    <script src="js/app.js" defer></script>
    <link href="css/app.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div style="width:100%;height:auto;padding:0;margin:0;">
            <vue-progress-bar></vue-progress-bar>
            <router-view></router-view>
        </div>
        <!-- <app-component></app-component> -->
    </div>
</body>

</html>