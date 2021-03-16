<?php
require_once('myUtilities/Software_TesterV1.php');
$tester = new myUtilities\Software_TesterV1();
$tester->verify_html("<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'/>
    <meta name = 'description' content = 'This is the home page for CSRichy.com where users are ideally introduced to the site.'/>
<meta name = 'robots' content = 'index,follow'/>
<meta name = 'viewport' content = 'width=device-width,initial-scale=1.0'/>
    <title>CSRichy Home</title>
    <link rel='stylesheet' href='CSRichy-Webpage-V2/main.css'/>
    <link rel = 'canonical' href = 'https://csrichy.com'/>
</head>
<body>
<div id = 'content'>", "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'/>
    <meta name = 'description' content = 'This is the home page for CSRichy.com where users are ideally introduced to the site.'/>
    <meta name = 'robots' content = 'index,follow'/>
    <meta name = 'viewport' content = 'width=device-width,initial-scale=1.0'/>
    <title>CSRichy Home</title>
    <link rel='stylesheet' href='CSRichy-Webpage-V2/main.css'/>
    <link rel = 'canonical' href = 'https://csrichy.com'/>
</head>
<body>
<div id = 'content'>");
?>