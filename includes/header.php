<!DOCTYPE html>
<html>
<head>
<meta charset="utxf-8">
<title>Alarm Permits - City of El Paso</title>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="City of El Paso">
<!-- added Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://use.typekit.net/rtg8xax.css" />
<link href="https://design.elpasotexas.gov/apps/components-css/symantic-css/symantic.css" rel="stylesheet">
<link href="https://design.elpasotexas.gov/apps/components-css/symantic-css/overrides.css" rel="stylesheet">
<link href="https://design.elpasotexas.gov/apps/components-css/elpaso-css/app-styles.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="./style.css?<?php echo time(); ?>" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
	<link rel="manifest" href="./favicon/site.webmanifest">
	<link rel="mask-icon" href="./favicon/safari-pinned-tab.svg" color="#1d2754">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WBBLBFMWH2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-WBBLBFMWH2');
</script>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<header>
    
        <div class="logo">
            <a href="./index.php"><img src="./images/eptx-logo-white.svg" alt="City of El Paso Texas" /></a>
            <h1>Alarm Permits</h1>
        </div>
        <nav>
        <!--<a href="javascript:window.open('','_self').close();"><span class="material-symbols-outlined">Logout</span> Logout</a>
    
        -->
    </nav>
    </header>
    <?php
     
        // //Use Azure System variable to grab user name and email, then split the first name from the name variable
        // $user_info = $_SERVER['HTTP_X_MS_TOKEN_AAD_ID_TOKEN'];
        // $user_info=base64_decode($user_info);
        // $firstname = get_string_between($user_info, '"name":"', '"');
        // $firstname =explode(",",$firstname)[1];
        // $email = get_string_between($user_info, '"email":"', '"');
      
        // //function to grab the substring between 2 characters/string . Used to grab name and email from Azure server variable
        // function get_string_between($string, $start, $end){
        //     $string = ' ' . $string;
        //     $ini = strpos($string, $start);
        //     if ($ini == 0) return '';
        //     $ini += strlen($start);
        //     $len = strpos($string, $end, $ini) - $ini;
        //     return substr($string, $ini, $len);
        // }
    ?>
