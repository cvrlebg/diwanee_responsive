<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--script src="http://html5.kaltura.org/js"></script--> 
        <script src="http://html5video.org/kgit/tags/v2.0.0/mwEmbedLoader.php"></script>
        <style type="text/css">
            .video_container{
                position: relative;
                float: left;
                width: 900px;
                height: 450px;
            }
            #social_buttons{
                position: absolute;
                top: 20px;
                right: 20px;
                display: none;
                background: rgba(0, 0, 0, .5);
                padding: 5px 10px;
            }
            
            .video_container:hover #social_buttons{
                display: block;
            }
        </style>
        <script type="text/javascript">
            $(function(){
                mw.setConfig('Kaltura.EnableEmbedUiConfJs', true);
                mw.setConfig('KalturaSupport.LeadWithHTML5', true); 
                //console.log(mw);
                
                kWidget.embed({
                        targetId : "kaltura_player_1385041988",
                        wid : "_1627242",
                        uiconf_id : "21220532",
                        entry_id : '0_7uubuoga',
                        "flashvars" : {
                            'relatedView': {
                                width : "600",
                                height : "400",
                                sourceType : "globalPlaylist",
                                autoPlay : true,
                                automaticPlaylistId : "_KDP_CTXPL",
                                entryId : "{mediaProxy.entry.id}",
                                referenceIdsSourceData : "{mediaProxy.entryMetadata.ReferenceIds}",
                                playlistSourceData : "0_zj4vtyl6",
                                entryIdsSourceData : "{mediaProxy.entryMetadata.EntryIds}",
                                autoPlayDelay : "10",
                                selectRandomNext : false,
                                itemClickAction : "loadInPlayer"
                            },
                            
                            "playlistAPI": {
				width : "0%",
				height : "0%",
				includeInLayout : true,
				autoContinue : false,
				autoPlay : false,
				//initItemEntryId : "0_swup5zao",
				kpl0Url : "http://www.kaltura.com/index.php/partnerservices2/executeplaylist?playlist_id=0_zj4vtyl6&partner_id=1627242&subp_id=162724200&format=8&ks={ks}",
                                entryId : "{mediaProxy.entry.id}",
				kpl0Name : "simple two clip pl",
                            },
                            
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
                            kdp.addJsListener('playerPlayed', 'videoPlayed'); //event, function
                            kdp.addJsListener('playerPlayEnd', 'videoEnd');
                            kdp.addJsListener('layoutReady', 'videoLoad');
                            
                        }
                    });
            });
            
        </script>
    </head>
    <body>
        
        <div class="video_container">
            <div id="kaltura_player_1385041988" style="width: 900px; height: 450px;"></div>
                <div id="social_buttons">
                    <div class="fb-share-button" data-href="http://developers.facebook.com/docs/plugins/" data-type="button"></div>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
                </div>
        </div>
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=450506548388288";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        
    </body>
</html>
