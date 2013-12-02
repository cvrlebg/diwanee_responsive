<?php
require_once 'kaltura/KalturaClient.php';

class Playlists {
    private $config;
    private $client;
    
    public function __construct($partner_id, $admin_API_secKey) {
        $this->config = new KalturaConfiguration($partner_id);
        $this->config->serviceUrl = 'http://www.kaltura.com';
        $this->client = new KalturaClient($this->config);
        $ks = $this->client->session->start($admin_API_secKey, NULL, KalturaSessionType::ADMIN, $partner_id, 86400);
        $this->client->setKs($ks);
    }
    
    public function getPlaylistById($playlist_id){
        if(!empty($playlist_id)){
            return $this->client->playlist->execute($playlist_id);
                    
        } else{
            return 'Enter valid playlist ID.';
        }
    }
    
    public function getPlaylistByTagName($tag_name){
        
        if(!empty($tag_name)){
            
            if(is_array($tag_name)){
                $tag_name = implode(',', $tag_name);
            }
            
            $cEntryFilter = new KalturaBaseEntryFilter();
            $cEntryFilter->tagsMultiLikeOr = $tag_name;

            $result = $this->client->baseEntry->listAction($cEntryFilter);
            $list = array();

            foreach ($result->objects as $value) {
                array_push($list, $value);            
            }        

            return $list;
            
        } else{
            return 'Insert valid tag name.';
        }
    }
    
    public function getPlaylistByCategoryName($cat_name){
        
        if(!empty($cat_name) && is_string($cat_name)){
            $cEntryFilter = new KalturaBaseEntryFilter();
            $cEntryFilter->categoriesFullNameIn = $cat_name;

            $result = $this->client->baseEntry->listAction($cEntryFilter);
            $list = array();

            foreach ($result->objects as $value) {
                array_push($list, $value);            
            }        

            return $list;
            
        } else{
            return 'Insert valid category name.';
        }
    }
    
    public function getPlaylists(){
        $playlist_ids = array();
        
        $playlist_data = $this->client->playlist->listAction();
        
        foreach ($playlist_data->objects as $playlist) {
            $playlist_ids[$playlist->id] = $playlist->name;
        }
        
        return $playlist_ids;
        
    }
}
?>