<!DOCTYPE HTML>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Diwanee Brands | Diwanee Corp</title>
        <!--<link rel="stylesheet/less" href="style/style.less" />-->
        <link rel="stylesheet" href="stylesheets/style.css" />
        <link rel="stylesheet/less" href="js/anything-slider/css/LESS/anythingslider.less" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="img/bpdiwanee_favicon.jpg" type="image/x-icon" />
        <script src="js/less.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src='js/anything-slider/js/jquery.anythingslider.min.js'></script>
        <script src="js/functions.js"></script>
        <!--[if lt IE 9]>
            <script src="dist/html5shiv.js"></script>
        <![endif]-->
        
        <script>
            $(function(){
                $('#slider').anythingSlider({
                    autoPlay: true,
                    hashTags: false,    
                    toggleControls: false,
                    buildNavigation: false,
                    buildStartStop: false
                });
            });
        </script>
    </head>

    <body id="brands_body">

        <div id='main_header'></div>
            <header id="header_container">
                <h1><a href="/responsive_git/" title='Diwanee Corp'><img src="/responsive_git/img/bpdiwanee_logo.jpg" alt="bpdiwanee_logo.jpg" /></a></h1>
                <?php include_once 'include/menu.php';?>
                
                <ul id="slider">
                    <li><a href=""><img src="/responsive_git/img/yasmina (2)_0.jpg" alt="yasmina (2)_0.jpg" /></a></li>
                    <li><a href=""><img src="/responsive_git/img/for-developement-3a2ilati_0.jpg" alt="for-developement-3a2ilati_0.jpg" /></a></li>
                    <li><a href=""><img src="/responsive_git/img/for-developement-wikeez_0.jpg" alt="for-developement-wikeez_0" /></a></li>
                </ul>
                
                <div id='empty_field'></div>
            </header>
        

        <div id='main_container'>
            
            <?php include_once 'include/brand-menu.php'; ?>
            
            <section id="brands_section">
                <div id="breadcrumbs">
                    <a href="/responsive_git/" class='red_link'>Home</a> > <span>Brands</span>
                    
                </div>
                
                <h1>DIWANEE BRANDS</h1>
                
                
                <article>
                    <header>
                        <h2><a href="">Yasmina.com</a></h2>
                    </header>
                    <div class="brand_img">
                        <a href=""><img src="/responsive_git/img/Yasmina.jpg" alt="Yasmina.jpg" width="210" height="200"/></a>
                    </div>
                    
                    <p>Yasmina is the portal through which today’s Arab woman will find self expression, content which matches her needs and a true understanding of…</p>
                    <a href="" class="red_link">Read more ›</a>
                </article>

                <article>
                    <header>
                        <h2><a href="">3a2ilati.com</a></h2>
                    </header>
                    <div class="brand_img">
                        <a href=""><img src="/responsive_git/img/3a2ilati.jpg" alt="3a2ilati.jpg" width="210" height="200"/></a>
                    </div>
                    
                    <p>Yasmina is the portal through which today’s Arab woman will find self expression, content which matches her needs and a true understanding of…</p>
                    <a href="" class="red_link">Read more ›</a>
                </article>
                
                <article style='margin-right: 0'>
                    <header>
                        <h2><a href="">Wikeez.Yasmina.com</a></h2>
                    </header>
                    <div class="brand_img">
                        <a href=""><img src="/responsive_git/img/Wikeez.jpg" alt="Wikeez.jpg" width="210" height="200"/></a>
                    </div>
                    
                    <p>Yasmina is the portal through which today’s Arab woman will find self expression, content which matches her needs and a true understanding of…</p>
                    <a href="" class="red_link">Read more ›</a>
                </article>
                
                <article>
                    <header>
                        <h2><a href="">Mooda</a></h2>
                    </header>
                    <div class="brand_img">
                        <a href=""><img src="/responsive_git/img/picture_0.jpg" alt="Yasmina.jpg" width="210" height="200"/></a>
                    </div>
                    
                    <p>Yasmina is the portal through which today’s Arab woman will find self expression, content which matches her needs and a true understanding of…</p>
                    <a href="" class="red_link">Read more ›</a>
                </article>
                
                <article>
                    <header>
                        <h2><a href="">Wayyana</a></h2>
                    </header>
                    <div class="brand_img">
                        <a href=""><img src="/responsive_git/img/wayyana-logo.jpg" alt="wayyana-logo.jpg" width="210" height="200"/></a>
                    </div>
                    
                    <p>Yasmina is the portal through which today’s Arab woman will find self expression, content which matches her needs and a true understanding of…</p>
                    <a href="" class="red_link">Read more ›</a>
                </article>
                
                
            </section>
            
           
        </div>
        <?php include_once 'include/footer.php'; ?>
        
    </body>
</html>