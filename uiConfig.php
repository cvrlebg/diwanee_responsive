<?php
require_once('lib/KalturaClient.php');
$config = new KalturaConfiguration($partnerId);
$config->serviceUrl = 'http://www.kaltura.com/';
$client = new KalturaClient($config);
$id = 21068772;
$result = $client->uiConf->get($id);
?>