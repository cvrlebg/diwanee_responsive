<?php
include_once 'playlists.class.php';
error_reporting(0);

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

if (($_GET['player_type'] === 'html5') || (!isset($_GET['player_type']))) {
    $bType = 'true';
} else {
    $bType = 'false';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style/player_full.css" />
        <link rel="shortcut icon" href="img/bpdiwanee_favicon.jpg" type="image/x-icon" />

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/jquery-bbq-master/jquery.ba-bbq.js"></script>
        <!--script src="http://html5.kaltura.org/js"></script-->      
        <script src="http://html5video.org/kgit/tags/v1.8.8/mwEmbedLoader.php"></script>
        <!--script src="http://html5video.org/kgit/tags/v2.0.0/mwEmbedLoader.php"></script-->
        <script type="text/javascript" src="/responsive_git/js/player.js"></script>        

        <meta property="og:title" content="Diwanee video"/>
        <meta property="og:image" content="http://localhost/responsive_git/img/3a2ilati.jpg"/>
        <meta property="og:site_name" content="Diwanee Corp."/>
        <meta property="og:description" content="Test "/>

        <script type="text/javascript">
            $(function() {
                //timeout = 0;
                var hashname = $.deparam.fragment();
                //console.log(hashname);
                /*$.each(hashname, function(key, value){
                 console.log('key ' + key + ' value + ' + value);
                 });*/
                 
                //check url and load video if detect hash tag
                var entryId = '';

                if (hashname !== '' && isEmpty(hashname) === false) {
                    entryId = $('.playlist li a[href="' + hashname.playlist1 + '"]').attr('data-entryid');
                    console.log(entryId);
                    $('.playlist li a[href="' + hashname.playlist1 + '"]').parent().addClass('active_video');
                    
                } else {
                    entryId = "<?php echo $playlist[0]->id ?>";
                    $('.playlist li a[data-entryid="<?php echo $playlist[0]->id ?>"]').parent().addClass('active_video');
                }

                mw.setConfig('Kaltura.EnableEmbedUiConfJs', true);
                mw.setConfig('KalturaSupport.LeadWithHTML5', <?php echo $bType ?>);

                //configuration
                kWidget.embed({
                    targetId: "kaltura_player_1384947071",
                    wid: "_<?php echo PARTNER_ID ?>",
                    uiconf_id: "<?php echo PLAYER_UI_CONF ?>",
                    entry_id: entryId,
                    flashvars: {
                        "myExternalResourcesPlugin": {
                            plugin: true,
                            width: "0%",
                            height: "0%",
                            includeInLayout: false,
                            relativeTo: "video",
                            position: "before",
                            loadingPolicy: "onDemand",
                            iframeHTML5Css: "style/player_full.css",
                            onPageJs: "js/player.js"
                        },
                        "playlistAPI": {
				width : "0%",
				height : "0%",
				includeInLayout : true,
				autoContinue : true,
				autoPlay : false,
				initItemEntryId : entryId,
				kpl0Url : "http://www.kaltura.com/index.php/partnerservices2/executeplaylist?playlist_id=<?php echo PLAYLIST_ID ?>&partner_id=<?php echo PARTNER_ID ?>&subp_id=<?php echo PARTNER_ID ?>00&format=8&ks={ks}",
                                entryId : "{mediaProxy.entry.id}",
				kpl0Name : "simple two clip pl",
                            }
                    },
                    'params': {// params allows you to set flash embed params such as wmode, allowFullScreen etc
                        'wmode': 'transparent'
                    },
                    readyCallback: function(player_id) {
                        var kdp = $('#' + player_id).get(0);
                        
                        //register event listeners to the player
                        kdp.addJsListener("playerPlayed", 'videoPlay');
                        //kdp.addJsListener("playerPaused", 'videoPause');
                        kdp.addJsListener("playerPlayEnd", 'videoEnd');

                    }
                });
                
                //get data of clicked thumb and reload video player
                kWidget.addReadyCallback(function(playerId) {
                    var kdp = $('#' + playerId).get(0);
                    
                   //console.log('playlist index ' + kdp.evaluate( "{playlistAPI.dataProvider.selectedIndex}" ));
                   //kdp.kBind('playerPlayEnd', function(){                       
                   //$('li.thumb').unbind('click');
                        $('li.thumb').click(function(e){
                            e.preventDefault();
                            var state = {};

                            var id = $(this).find('a').parent().parent().attr('id');
                            var entryId = $(this).find('a').attr('data-entryid');
                            var entryUrl = $(this).find('a').attr('href');

                            state[ id ] = entryUrl;
                            $.bbq.pushState(state);

                            $('li.thumb').removeClass('active_video');
                            $(this).addClass('active_video');

                            $('.timer').removeClass('show_timer');

                            kdp.sendNotification('changeMedia', {'entryId': entryId});

                            //check auto play on html5 player
                            setTimeout(function() {
                                kdp.sendNotification('doPlay');
                                
                            }, 1000);
                            miliseconds = 0;
                            clearTimeout(timeout);
                            //console.log('miliseconds s ' + miliseconds);
                        });
                        
                       // kdp.kUnbind('playerPlayEnd');
                    
                    //});
                    
                });

                //change name
                /* kWidget.addReadyCallback(function(playerId){
                 var kdp =  $('#' + playerId).get(0);
                 kdp.kBind('changeMedia', function(data){
                 });
                 });*/

            });
        </script>
    </head>
    <body>
        <div id='main_header'></div>

        <header id="header_container">
            <h1>
                <a href="/responsive_git/" title='Diwanee Corp'>
                    <img src="/responsive_git/img/bpdiwanee_logo.jpg" alt="bpdiwanee_logo.jpg" />
                </a>
            </h1>
            <?php include_once 'include/menu.php'; ?>

            <div id='empty_field'></div>
        </header>


        <div id='main_container'>
            <section id="yasmina_section" style="width: 100%">
                <h1>Video & playlist</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis orci ac interdum pretium. Sed enim nunc, tempus et euismod et, porttitor adipiscing leo. Nullam accumsan quam ut orci consectetur suscipit. Quisque non massa at velit sodales malesuada vitae vitae quam. Sed nulla dolor, ullamcorper vitae tempor ut, semper eget libero. Pellentesque enim nibh, porta vel porttitor sed, fermentum a diam. Etiam nec urna mi. Maecenas luctus sem leo, a condimentum elit varius et.</p>               

                <?php /* ?>
                  <select name="playlists" id="playlists">
                  <?php
                  $playlists = $cPlaylist->getPlaylists();
                  foreach ($playlists as $playlist_id => $playlist_name) {
                  ?>
                  <option value="<?php echo $playlist_id ?>"><?php echo $playlist_name ?></option>
                  <?php } ?>
                  </select>
                  <?php */ ?>

                <select name="player_type" id="player_type">
                    <option value="html5" <?php if ($_GET['player_type'] === 'html5') { ?> selected <?php } ?>>HTML5</option>
                    <option value="flash" <?php if ($_GET['player_type'] === 'flash') { ?> selected <?php } ?>>Flash</option>
                </select>

                <div class="video_container" style="margin-top: 10px">

                    <div id="social_buttons">
                        <div class="fb-share-button" data-href="http://192.168.1.1/responsive_git/video_full.php" data-type="button"></div>

                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $_SERVER['PHP_SELF'] ?>" data-text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis orci ac interdum pretium..." data-count="none" data-dnt="false">Tweet</a>
                    </div>
                    
                    <div class="timer">
                        <div>
                            <h3>Next video starts in <span>10</span> seconds</h3>
                        </div>
                                                
                    </div>

                    <div id="kaltura_player_1384947071" style="width: 100%; height: 500px; margin-bottom: 10px;"></div>

                    <div class="playlist_container">
                        <a href="javascript: void(0);" id='left_arrow'><</a>

                        <div class="entries">                           

                            <ul class="playlist" id="playlist1">
                                <?php
                                if (is_array($playlist)) {
                                    foreach ($playlist as $entry) {
                                        ?>
                                        <li class="thumb">
                                            <a data-entryid="<?php echo $entry->id ?>" href="#<?php echo str_replace(' ', '-', strtolower($entry->name)) ?>" class="thumbnail" title="<?php echo $entry->name ?>">
                                                <img alt="<?php echo htmlspecialchars($entry->name) ?>"  style="width: 130px; max-height: 80px;"   src="<?php echo $entry->thumbnailUrl ?>/width/160">
                                                <div class="title"><?php echo htmlspecialchars($entry->name) ?></div>
                                            </a>

                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <a href="javascript: void(0);" id='right_arrow'>></a>
                    </div>

                </div>

            </section>
        </div>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=450506548388288";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'twitter-wjs');</script>

        <?php include_once 'include/footer.php'; ?>
    </body>
</html>