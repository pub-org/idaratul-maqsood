<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>Idaratul-Maqsood</title>
    <meta name="description" content="">
<!-- 
http://www.templatemo.com/preview/templatemo_401_sprint 
-->
    <meta name="viewport" content="width=device-width">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/popUp.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <?php
        //include 'queries/conn.php';
    ?>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="front">
        <div class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-10 col-xs-10">
                        <!--<div id="templatemo_logo">
                            <h1><a href="#"><span style="font-size: 0.86em;" >Idaratul-Maqsood</span></a></h1>
                        </div>--> <!-- /.logo -->
                        <div class="text-center" style="padding: 0px 0px 0px 0px;" >
                            <img src="images/cover/logo1.jpg" style="height: 102px; width: 487px;" />
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-lg-7 col-md-8 col-sm-2 col-xs-2">
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                        <div class="main-menu">
                            <ul>
                                <li><a href="#allBooks">Books</a></li>
                                <li><a href="#audios">Audios</a></li>
                                <li><a href="#articles">Articles</a></li>
                                <li><a href="#about-us">About us</a></li>
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="responsive">
                            <div class="main-menu">
                                <ul>
                                    <li><a href="#allBooks">Books</a></li>
                                    <li><a href="#audios">Audios</a></li>
                                    <li><a href="#articles">Articles</a></li>
                                    <li><a href="#about-us">About us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
    </div> <!-- /#front -->

    <div id="allBooks" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">All Books</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <?php 
                    $dirPdfBooks     = 'pdfs/books/'; 
                    $filesPdfBooks   = array_diff(scandir($dirPdfBooks, 1), array('..', '.')); 
                    foreach ($filesPdfBooks as $key_1 => $value_1) {
                        if(is_dir($dirPdfBooks . $value_1)){
                            $dirPdfBooks_2     = $dirPdfBooks . $value_1 . '/'; 
                            $filesPdfBooks_2   = array_diff(scandir($dirPdfBooks_2, 1), array('..', '.')); 
                            foreach ($filesPdfBooks_2 as $key_2 => $value_2) {
                                $fileExtIs = ''; 
                                $dotCame = false; 
                                for($i=(strlen($value_2)-1); $i>=0; $i--) {
                                    if($value_2[$i] == '.'){
                                        $dotCame = true; 
                                    }
                                    if($dotCame==false){
                                        $fileExtIs .= $value_2[$i]; 
                                    } 
                                }
                                $fileExtIs = strtolower($fileExtIs); 
                                if($fileExtIs == 'gpj' || $fileExtIs == 'gepj' || $fileExtIs == 'fig' 
                                    || $fileExtIs == 'pmb' || $fileExtIs == 'gnp'){
                                    $imagePathIs = $dirPdfBooks_2 . $value_2; 
                                    $pdfPathIs   = $dirPdfBooks_2 . substr($value_2, 0, strpos($value_2,'_')); 
                                    $bookLinkDownload = file_get_contents($dirPdfBooks_2 . '/link/download.txt'); 
                                    $bookLinkView = file_get_contents($dirPdfBooks_2 . '/link/view.txt'); 
                                    echo '<div class="col-md-3 col-sm-6"><div class="product-item">
                                            <div class="item-thumb">
                                                <!-- <span class="note"><img src="images/small_logo_1.png" alt=""></span>-->
                                                <div class="overlay">
                                                    <div class="overlay-inner">
                                                        <a href="displayPdf.php?pdfSrc=' . $bookLinkView . '" class="view-detail">View Book</a>
                                                        <a href="' . $bookLinkDownload . '" class="view-detailDownload">Download Book</a>
                                                    </div>
                                                </div> <!-- /.overlay -->
                                                <img class="pdfBookImg" src="' . $imagePathIs . '" alt="">
                                            </div> <!-- /.item-thumb -->
                                            <h5>Author: Muhammad Mansoor Ahmad</h5>
                                            <!--<span>Price: <em class="text-muted">Rs 500.00</em> - <em class="price">Rs 250.00</em></span>-->
                                        </div> <!-- /.product-item --></div> <!-- /.col-md-3 -->'; 
                                }
                            }
                        } 
                    } 
                    for ($i=0; $i<0; $i++) { 
                        echo '<div class="col-md-3 col-sm-6"><div class="product-item">
                                <div class="item-thumb">
                                    <!-- <span class="note"><img src="images/small_logo_1.png" alt=""></span>-->
                                    <div class="overlay">
                                        <div class="overlay-inner">
                                            <a href="pdfs/books/SunehrayUsoolByShaykhMuhammadMansoorAhmad/SunehrayUsoolByShaykhMuhammadMansoorAhmad.pdf" class="view-detail">View Book</a>
                                        </div>
                                    </div> <!-- /.overlay -->
                                    <img class="pdfBookImg" src="pdfs/books/SunehrayUsoolByShaykhMuhammadMansoorAhmad/SunehrayUsoolByShaykhMuhammadMansoorAhmad_0000.jpg" alt="">
                                </div> <!-- /.item-thumb -->
                                <h5>Author: Muhammad Mansoor Ahmad</h5>
                                <!--<span>Price: <em class="text-muted">Rs 500.00</em> - <em class="price">Rs 250.00</em></span>-->
                            </div> <!-- /.product-item --></div> <!-- /.col-md-3 -->'; 
                    } 
                ?> 
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#books -->

    <div id="audios" class="content-section" >
        <div class="container" style="margin-top:0px;">
            <div class="row">
                <h1 class="section-title text-center">Audios</h1>
            </div>
            <div class="row">
                <?php 
                    $dirAudios     = 'audios/'; 
                    $filesAudios   = array_diff(scandir($dirAudios, 1), array('..', '.')); 
                    foreach ($filesAudios as $key_1 => $value_1) {
                        if(is_dir($dirAudios . $value_1)){
                            $dirAudios_2     = $dirAudios . $value_1 . '/link/'; 
                            $filesAudios_2   = array_diff(scandir($dirAudios_2, 1), array('..', '.')); 
                            
                            $audioLinkDownload = file_get_contents($dirAudios_2 . '/download.txt'); 
                            $audioTitle = file_get_contents($dirAudios_2 . '/title.txt'); 
                            
                            echo '<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" style="min-height: 110px;">
                                    <div class="product-item">
                                        <div class="item-audio">
                                            <a class="btn btn-md btn-success" href="' . $audioLinkDownload . '" style="white-space:normal; padding-top: 10px; width: 100%;" >
                                                <div class="row">
                                                    <div class="col-md-2" style="vertical-align: middle; padding: 0px 5px 0px 0px;">
                                                        <i class="fa fa-arrow-circle-o-down fa-2x"></i>
                                                    </div>
                                                    <div class="col-md-10 text-left" style="vertical-align: top; font-size: 13px; padding: 0px 5px 0px 5px;">
                                                        <i class="fa fa-headphones fa-lg"></i>
                                                        <span> ' . $audioTitle . '</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div> <!-- /.item-thumb -->
                                    </div> <!-- /.product-item -->
                                </div> <!-- /.col-md-3 -->'; 

                            /*echo '<div class="col-md-3 col-sm-6"><div class="product-item">
                                    <i class="fa fa-bars" aria-hidden="true" >
                                    <br>' . $audioLinkDownload . 
                                    '<br>' . $audioTitle . 
                               '</div>'; */
                        }
                    } 
                ?>                
            </div> <!-- /.row -->
        </div>
    </div>
    
    <div id="articles" class="content-section" >
        <div class="container" style="margin-top:0px;">
            <div class="row">
                <h1 class="section-title text-center">Articles</h1>
            </div>
            <?php
                $dirAhadees     = 'images/ahadees/'; 
                $dirOrgAhadees  = 'original/'; 
                $filesAhadees   = array_diff(scandir($dirAhadees, 1), array('..', '.')); 
                $filesAhadeesCtr  = count($filesAhadees); 
                $imgCtrAhadees = 1; 
                
                echo    '<div class="row">'; 
                foreach ($filesAhadees as $keyAhadees => $valAhadees) {
                    if(!is_dir($dirAhadees . $valAhadees)){
                        $popImgPath = $dirAhadees . $dirOrgAhadees . $valAhadees; 
                        echo '<div class="col-md-2 col-sm-2">
                                <div class="service-item">
                                    <img class="popImgAhadees" onclick="popImg(\'' . $popImgPath . '\');" 
                                        src="' . $dirAhadees . $valAhadees . '" alt="">
                                </div> <!-- /.service-item -->
                            </div> <!-- /.col-md-3 -->';
                    } 
                }
                echo '</div> <!-- /.row -->'; 
            ?>
        </div> <!-- /.container-ahadees -->
        
        <div class="container" style="">
            <!--<div class="row">
                <h1 class="section-title text-center">Information</h1>
            </div>-->
            <hr style="padding-bottom: 40px;">
            <?php
                $dirSites       = 'images/sites/'; 
                $dirOrgSites    = 'original/'; 
                $filesSites     = array_diff(scandir($dirSites, 1), array('..', '.')); 
                $filesSitesCtr  = count($filesSites); 
                $imgCtrSites    = 1; 

                echo    '<div class="row">'; 
                foreach ($filesSites as $keySites => $valSites) {
                    if(!is_dir($dirSites . $valSites)){
                        $popImgPath = $dirSites . $dirOrgSites . $valSites; 
                        echo '<div class="col-md-2 col-sm-2">
                                <div class="service-item">
                                    <img class="popImgSites" onclick="popImg(\'' . $popImgPath . '\');" 
                                        src="' . $dirSites . $valSites . '" alt="">
                                </div> <!-- /.service-item -->
                            </div> <!-- /.col-md-3 -->'; 
                    } 
                }
                echo    '</div> <!-- /.row -->'; 
            ?>
        </div> <!-- /.container-information -->
        
        <div class="container" style="">
            <!--<div class="row">
                <h1 class="section-title text-center">Nasrullahs</h1>
            </div>-->
            <hr style="padding-bottom: 40px;">
            <?php
                $dirNasrullahs       = 'images/nasrullahs/'; 
                $dirOrgNasrullahs    = 'original/'; 
                $filesNasrullahs     = array_diff(scandir($dirNasrullahs, 1), array('..', '.')); 
                $filesNasrullahsCtr  = count($filesNasrullahs); 
                $imgCtrNasrullahs    = 1; 

                echo    '<div class="row">'; 
                foreach ($filesNasrullahs as $keyNasrullahs => $valNasrullahs) {
                    if(!is_dir($dirNasrullahs . $valNasrullahs)){
                        $popImgPath = $dirNasrullahs . $dirOrgNasrullahs . $valNasrullahs; 
                        echo '<div class="col-md-2 col-sm-2">
                                <div class="service-item">
                                    <img class="popImgNasrullahs" onclick="popImg(\'' . $popImgPath . '\');" 
                                        src="' . $dirNasrullahs . $valNasrullahs . '" alt="">
                                </div> <!-- /.service-item -->
                            </div> <!-- /.col-md-3 -->'; 
                    } 
                }
                echo    '</div> <!-- /.row -->'; 
            ?>
        </div> <!-- /.container-nasrullahs -->
    </div> <!-- /#services -->

    <div id="services" class="content-section" >
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon first"></span>
                        <h3>Different Varieties</h3>
                        <p>We offers a wide range of Pakistani ladies suits that are ideal for daily wear, casual wear, formal wear, evening wear, party wear and/or bridal wear.</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon second"></span>
                        <h3>Party Design</h3>
                        <p>Find here the Latest Party Wear variety of charming combinations of style, color, pattern and fashion to suit every woman’s need to make a fashion statement.</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon third"></span>
                        <h3>High Quality</h3>
                        <p>Our superior quality fabrics in cotton & cotton blends, chiffon, raw silks, georgette, hand loom, khaddi, jamawar, satin, lawns, organza, katan silk, etc. </p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon fourth"></span>
                        <h3>Professional Design</h3>
                        <p>Every dress will be stitch by professionals with customized designs ensures total customer satisfaction.</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#services -->

    <div id="about-us" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">About Us</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-12">

                    <div class="row" >
                        <div style="font-size: 14px; ">
                            <div style="display:inline-block; width: 45px; text-align:center;">
                                <i class="fa fa-phone-square fa-2x"></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 3px 0px; font-size: 19px; ">
                                <span>0321-203 92 93</span>
                                <i class="fa fa-asterisk fa-spin" ></i>
                            </div>
                            <div style="display:inline-block; width: 40px; margin-left: 5%; ">
                                <i class="fa fa-phone-square fa-2x"></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 3px 0px; font-size: 19px; ">
                                <span>0300-922 75 23</span>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px; " >
                        <div style="font-size: 13px; ">
                            <div style="display:inline-block; width: 45px; text-align:center;">
                                <i class="fa fa-envelope fa-2x"></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 3px 0px; font-size: 19px; ">
                                <span>i.maqsood313@yahoo.com</span>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px; " >
                        <div style="font-size: 17px; ">
                            <div style="display:inline-block; width: 45px; text-align:center;">
                                <i class="fa fa-home fa-2x" style="margin-top: 5px; " ></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 0px 0px; font-size: 16px; width: 300px; ">
                                <span>
                                    Madrasa Banat e Aisha (R.A) 
                                    <br>Near Motorway Chowk, Islamabad
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px; " >
                        <div style="font-size: 14px; ">
                            <div style="display:inline-block; width: 45px; text-align:center;">
                                <i class="fa fa-inbox fa-2x"></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 3px 0px; font-size: 16px; ">
                                <span>PO Box 229 GPO Saddar, Rawalpindi</span>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px; " >
                        <div style="font-size: 14px; ">
                            <div style="display:inline-block; width: 45px; text-align:center;">
                                <i class="fa fa-globe fa-2x"></i>
                            </div>
                            <div style="display:inline-block; vertical-align: top; margin: 3px 0px; font-size: 16px; width: 80%; ">
                                <i class="fa fa-dot-circle-o fa-list"></i><span style="margin-left: 10px;" ><b>0344-5669889</b> - Attock City</span><br>
                                <i class="fa fa-dot-circle-o fa-list"></i><span style="margin-left: 10px;" ><b>0311-5159495</b> - Kotri Sindh</span><br>
                                <i class="fa fa-dot-circle-o fa-list"></i><span style="margin-left: 10px;" ><b>0332-2431393</b> - Muslimabad Karachi</span><br>
                                <i class="fa fa-dot-circle-o fa-list"></i><span style="margin-left: 10px;" ><b>0323-5019010</b> - Committee Chowk Rawalpindi</span><br>
                                <i class="fa fa-dot-circle-o fa-list"></i><span style="margin-left: 10px;" ><b>0314-3935272</b> - Book orders Karachi</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row contact-form" style="display:none; " >
                    
                        <fieldset class="col-md-6 col-sm-6">
                            <input id="name" type="text" name="name" placeholder="Name">
                        </fieldset>
                        <fieldset class="col-md-6 col-sm-6">
                            <input type="email" name="email" id="email" placeholder="Email">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <textarea name="comments" id="comments" placeholder="Message"></textarea>
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="submit" name="send" value="Send Message" id="submit" class="button">
                        </fieldset>
                     
                    </div> <!-- /.contact-form -->
                    
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#about-us -->

    <div id="newBooks" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">New Books</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="item-small">
                        <img class="newBksImgLtRt" src="images/books/SunehrayUsool.jpg" alt="Product 1">
                        <h4>Sunehray Usool</h4>
                    </div> <!-- /.item-small -->
                    <div class="item-small">
                        <img class="newBksImgLtRt" src="images/books/SiratAurKhawateen.jpg" alt="Product 3">
                        <h4>Sirat Aur Khawateen</h4>
                    </div> <!-- /.item-small -->
                </div> <!-- /.col-md-2 -->
                <div class="col-md-6 col-sm-6">
                    <div class="item-large">
                        <img src="images/books/FatwaTarofUsoolAdaab.jpg" alt="Product 2">
                        <div class="item-large-content">
                            <div class="item-header">
                                <h2 class="pull-left">Newest Collection</h2>
                                <span class="pull-right">Rate: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i></span>
                                <div class="clearfix"></div>
                            </div> <!-- /.item-header -->
                            <p>
                                A right book is what a muslim would settle for when it comes to any kind 
                                of search related to our Iman. We have all kind of books and are serving 
                                since 1999. We would be pleased if you contact us in any matter related 
                                to daily routine problems in the light of Quran O Ahadees.
                            </p>
                        </div> <!-- /.item-large-content -->
                    </div> <!-- /.item-large -->
                </div> <!-- /.col-md-8 -->
                <div class="col-md-3 col-sm-3">
                    <div class="item-small">
                        <img class="newBksImgLtRt" src="images/books/AnaarKayDarakhtTalay.jpg" alt="Product 3">
                        <h4>Anar Kay Drakht</h4>
                    </div> <!-- /.item-small -->
                </div> <!-- /.col-md-2 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#product-promotion -->

    <!-- <div class="site-slider">
        <ul class="bxslider">
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>Book # 1</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 2">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2>Book # 2</h2>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>Book # 3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>Book # 4</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>Book # 5</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/cover/cover2.jpg" height="401" alt="slider image 6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>Book # 6</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul> 
        <div class="bx-thumbnail-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bx-pager">
                            <a data-slide-index="0" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 1" /></a>
                            <a data-slide-index="1" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 2" /></a>
                            <a data-slide-index="2" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 3" /></a>
                            <a data-slide-index="3" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 4" /></a>
                            <a data-slide-index="4" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 5" /></a>
                            <a data-slide-index="5" href=""><img class='thumbLow' src="images/cover/cover2.jpg" alt="image 5" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --> <!-- /.site-slider -->

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <span>Copyright &copy; <?php echo date("Y"); ?> <a href="#">Idaratul-Maqsood</a> - All Rights Reserved.</span>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/profile.php?id=100004943322389" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li>
                    </ul>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <div id="myModal" class="modal">
        <span class="close">×</span>
        <img class="modal-content" id="img01" src="images/bx_loader.gif" >
        <div id="caption"></div>
    </div>

    <div id="loadingDiv">
        <div>
            <h7>Please wait...</h7>
        </div>
    </div>

    <script type="text/javascript">
        var imagesLoadedAlready = ",";
    </script>
    
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <!-- templatemo 401 sprint -->
    <script src="js/popUp.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>