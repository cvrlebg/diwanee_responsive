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
                mw.setConfig('KalturaSupport.LeadWithHTML5', false); 
                //console.log(mw);
                
                kWidget.embed({
                        targetId : "kaltura_player_1385041988",
                        wid : "_1627242",
                        uiconf_id : "21294562",
                        entry_id : '0_7uubuoga'
                });
            });
            
        </script>
    </head>
    <body>
        
        <div class="video_container">
            <div id="kaltura_player_1385041988" style="width: 900px; height: 450px;"></div>
               
        </div>
        
        
        
    </body>
</html>
