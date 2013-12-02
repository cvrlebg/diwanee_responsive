<?php 
include_once 'playlists.class.php';

//Account settings:
define('PARTNER_ID', '1627242');
define('ADMIN_API_SECRET', '5b37bae9cc60a04684e4e3b620f919c6');
define('PLAYER_UI_CONF', '21194942');
define('PLAYLIST_ID', '0_19fij09y');

//create playlist
$cPlaylist = new Playlists(PARTNER_ID, ADMIN_API_SECRET);
//$playlist = $cPlaylist->getPlaylistByCategoryName('tag1');
$playlist = $cPlaylist->getPlaylistById(PLAYLIST_ID);
//$playlist = $cPlaylist->getPlaylistByTagName(array('tag1', 'tag2'));

?>
<!DOCTYPE HTML>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Diwanee | Diwanee Corp</title>
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="style/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="img/bpdiwanee_favicon.jpg" type="image/x-icon" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/jquery-bbq-master/jquery.ba-bbq.js"></script>
        <!--script src="http://html5.kaltura.org/js"></script-->      
        <!--script src="http://html5video.org/kgit/tags/v1.8.8/mwEmbedLoader.php"></script-->
        <script src="http://html5video.org/kgit/tags/v2.0.0/mwEmbedLoader.php"></script>
        <!--[if lt IE 9]>
            <script src="dist/html5shiv.js"></script>
        <![endif]-->
        
        <style type="text/css">
            .video_container{
                height: 550px;
            }
            
            .playlist{
                position: relative;
                float: right;
                
            }
            .playlist li{
                display: inline-block;
                position: relative;
                width: 160px;
                float: left;
                margin-right: 10px;
            }
        </style>
        
        <script type="text/javascript">
            $(function(){
                
               var hashname = $.deparam.fragment();
                //console.log(hashname);
                /*$.each(hashname, function(key, value){
                    console.log('key ' + key + ' value + ' + value);
                });*/
                
                //check url and load video if detect hash tag
                entryId = '';
                
                if(hashname !== '' && isEmpty(hashname) === false){
                    entryId = $('.playlist li a[href="' + hashname.playlist1 + '"]').attr('data-entryid');
                    //console.log(isEmpty(hashname));
                } else{
                    entryId = "<?php echo $playlist[0]->id ?>";
                }                   
            
                mw.setConfig('Kaltura.EnableEmbedUiConfJs', true);
                mw.setConfig('KalturaSupport.LeadWithHTML5', false); 
                
                //configuration
                kWidget.embed({
                    targetId : "kaltura_player_1384947071",
                    wid : "_<?php echo PARTNER_ID ?>",
                    uiconf_id : "<?php echo PLAYER_UI_CONF ?>",
                    entry_id : entryId,
                    flashvars: {
                        "myExternalResourcesPlugin": {
				plugin : true,
				width : "0%",
				height : "0%",
				includeInLayout : false,
				relativeTo : "video",
				position : "before",
				loadingPolicy : "onDemand",
				iframeHTML5Css : "style/player.css",
                                onPageJs : "js/player.js" 
                            }
                    },
                    
                    
                    readyCallback : function(player_id){
                        var kdp = $('#'+ player_id).get(0);

                        //register event listeners to the player
                        //kdp.addJsListener('sourceReady', 'videoPlay');
                         //kdp.addJsListener("playerPaused", 'playerPaused');
                        //kdp.addJsListener("playerPlayEnd", 'playerPlayEnd');

                    }
                });
                
                //get data of clicked thumb and reload video player
                kWidget.addReadyCallback(function(playerId){
                    var kdp = $('#' + playerId).get(0);
                    
                    //$('li.thumb').unbind('click');
                    $('li.thumb').click(function(e){
                        e.preventDefault();
                        var state = {};
                        
                        var id = $(this).find('a').parent().parent().attr('id');
                        var entryId = $(this).find('a').attr('data-entryid');
                        var entryUrl = $(this).find('a').attr('href');
                        
                        state[ id ] = entryUrl;
                        $.bbq.pushState( state );                        
                        
                        //kdp.sendNotification('doStop');
                        //kdp.sendNotification('cleanMedia');
                        kdp.sendNotification('changeMedia', {'entryId': entryId }); 
                        //kdp.sendNotification('autoPlay', {'autoPlay' : true});
                        
                        
                        setTimeout(function(){ 
                            //kdp.addJsListener('changeMedia', 'videoPlay'); 
                            kdp.sendNotification('doPlay');
                        }, 1000);
                        
                        /*kdp.kBind('doPlay', function(){
                            kdp.sendNotification('doPlay', {'entryId': entryId });
                            
                            kdp.Unbind('.test');
                        });*/
                        
                    });
                                        
                });
                
                //change name
               /* kWidget.addReadyCallback(function(playerId){
                    var kdp =  $('#' + playerId).get(0);
                    kdp.kBind('changeMedia', function(data){
                    });
                });*/
            
            }); 
            
            //check if object is empty
            function isEmpty(ob){
                for(var i in ob){ return false;}
                return true;
            }
            
            function videoPlay(playerId){
                console.log('player id ' + playerId);
                var kdp = $('#' + playerId).get(0);
                console.log(kdp);
                kdp.sendNotification('doPlay');
            }
        </script>
        
    </head>

    <body id="home">

        <div id='main_header'></div>
        
            <header id="header_container">
                <h1><a href="/responsive_git/" title='Diwanee Corp'><img src="/responsive_git/img/bpdiwanee_logo.jpg" alt="bpdiwanee_logo.jpg" /></a></h1>
                <?php include_once 'include/menu.php'; ?>
                
               
                
                <div id='empty_field'></div>
            </header>
            
            
        <div id='main_container'>
            <section id="yasmina_section" style="width: 100%">
                <h1>Video & playlist</h1>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis orci ac interdum pretium. Sed enim nunc, tempus et euismod et, porttitor adipiscing leo. Nullam accumsan quam ut orci consectetur suscipit. Quisque non massa at velit sodales malesuada vitae vitae quam. Sed nulla dolor, ullamcorper vitae tempor ut, semper eget libero. Pellentesque enim nibh, porta vel porttitor sed, fermentum a diam. Etiam nec urna mi. Maecenas luctus sem leo, a condimentum elit varius et.</p>               
                
                <select name="playlists" id="playlists">
                    <?php 
                        $playlists = $cPlaylist->getPlaylists();
                        foreach ($playlists as $playlist_id => $playlist_name) {
                    ?>
                        <option value="<?php echo $playlist_id ?>"><?php echo $playlist_name ?></option>
                    <?php } ?>
                </select>
                
                <div class="video_container" style="margin-top: 10px">
                    <div id="kaltura_player_1384947071" style="width: 100%; height: 500px; margin-bottom: 10px;"></div>
                    
                    <ul class="playlist" id="playlist1">
                         <?php
                         if(is_array($playlist)){
                           foreach ($playlist as $entry) { ?>
                            <li class="thumb">
                                <a data-entryid="<?php echo $entry->id ?>" href="#<?php echo str_replace(' ', '-', strtolower($entry->name)) ?>" class="thumbnail" title="<?php echo $entry->name ?>">
                                    <img alt="<?php echo htmlspecialchars($entry->name) ?>"  style="width: 160px; max-height: 120px;"   src="<?php echo $entry->thumbnailUrl ?>/width/160">
                                    <div class="title"><?php echo htmlspecialchars($entry->name) ?></div>
                                </a>
                                
                            </li>
                         <?php } } ?>
                    </ul>
                </div>
                
            </section>
        </div>
        <?php include_once 'include/footer.php'; ?>
        
    </body>
</html>