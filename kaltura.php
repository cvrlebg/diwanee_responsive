<!DOCTYPE HTML>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Diwanee | Diwanee Corp</title>
        <meta name="viewport" content="width=device-width" />
        <!--        <link rel="stylesheet/less" href="style/style.less" />-->
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet/less" href="js/anything-slider/css/LESS/anythingslider.less" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="img/bpdiwanee_favicon.jpg" type="image/x-icon" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://html5.kaltura.org/js"></script>
        

    </head>

    <body id="home">

        <div id='main_header'></div>

        <header id="header_container">
            <h1><a href="/responsive_git/" title='Diwanee Corp'><img src="/responsive_git/img/bpdiwanee_logo.jpg" alt="bpdiwanee_logo.jpg" /></a></h1>
            <?php include_once 'include/menu.php'; ?>

            <div id='empty_field'></div>
        </header>


        <div id='main_container'>
            <section>
                <div id="myEmbedTarget" style="width:960px;height:600px;"></div>
                <script src="http://cdnapi.kaltura.com/p/1627242/sp/162724200/embedIframeJs/uiconf_id/5b37bae9cc60a04684e4e3b620f919c6/partner_id/1627242"></script>
        <script>
            mw.setConfig('KalturaSupport.LeadWithHTML5', true);
            mw.setConfig('LoadingSpinner.ImageUrl', 'http://directdermatology.com/images/loading.gif');
            kWidget.embed({
                'targetId': 'myEmbedTarget',
                'wid': '_1627242',
                'uiconf_id': '21073162',
                'entry_id': '0_4blfqg3z',
                flashvars: {
                   'carousel' :{
                     'playlist_id':'0_19fij09y'  
                   },
                    'playlistAPI': {
                        'autoPlay': false,
                        'autoInsert': true,
                        'kpl0Name': 'test 4 item playlist',
                        'kpl0Url': 'http://www.kaltura.com/index.php/partnerservices2/executeplaylist?uid=&partner_id=1627242&subp_id=162724200&format=8&ks={ks}&playlist_id=0_19fij09y'
                    },
                    'externalInterfaceDisabled': false,
                                        
                    "mylogo": {
				"plugin" : true,
				"width" : "30",
				"height" : "30",
				"includeInLayout" : false,
				"relativeTo" : "kalturaLogo",
				"position" : "after",
				"className" : "Watermark",
				"watermarkPath" : "http://cdnbakmi.kaltura.com/content/uiconf/ps/demos/kdp3/assets/coffee.png",
				"watermarkClickPath" : "http://www.folgers.com/"
			},
			"kalturaLogo": {
				"visible" : false,
				"includeInLayout" : false
			},
                        "myExternalResourcesPlugin": {
				"plugin" : true,
				"width" : "0%",
				"height" : "0%",
				"includeInLayout" : false,
				"relativeTo" : "video",
				"position" : "before",
				"loadingPolicy" : "onDemand",
				"iframeHTML5Css" : "style/player.css",
				"onPageCss1" : "style/player.css"
			},
                },
                'params': {// params allows you to set flash embed params such as wmode, allowFullScreen etc
                    'wmode': 'transparent'
                }
            });
        </script>
<div id="playlist"></div>

            </section>


        </div>
        <?php include_once 'include/footer.php'; ?>

    </body>
</html>