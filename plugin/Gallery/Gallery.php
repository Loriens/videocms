<?php

require_once $global['systemRootPath'] . 'plugin/Plugin.abstract.php';
require_once $global['systemRootPath'] . 'plugin/YouPHPTubePlugin.php';
class Gallery extends PluginAbstract {

    public function getDescription() {
        return "Make the first page works as a gallery";
    }

    public function getName() {
        return "Gallery";
    }

    public function getUUID() {
        return "a06505bf-3570-4b1f-977a-fd0e5cab205d";
    }
        
    public function getHeadCode() {
        global $global;
        // preload image
        $js = "<script>var img1 = new Image();img1.src=\"{$global['webSiteRootURL']}view/img/video-placeholder.png\";</script>";
        $css = '<link href="' . $global['webSiteRootURL'] . 'plugin/Gallery/style.css" rel="stylesheet" type="text/css"/>';
        return $js.$css;
    }
    public function getEmptyDataObject() {
        global $global;
        $obj = new stdClass();
        $obj->BigVideo = true;
        $obj->Description = false;
        $obj->CategoryDescription = false;
        $obj->DateAdded = true;
        $obj->DateAddedRowCount = 12;
        $obj->MostWatched = true;
        $obj->MostWatchedRowCount = 12;
        $obj->MostPopular = true;
        $obj->MostPopularRowCount = 12;
        $obj->SortByName = false;
        $obj->SortByNameRowCount = 12;
        $obj->SubscribedChannels = true;
        $obj->SubscribedChannelsRowCount = 12;
        $obj->sortReverseable = false;
        $obj->SubCategorys = false;
        $obj->showTags = true;
        return $obj;
    }
    
    public function getFirstPage(){
        global $global;
        if(!YouPHPTubePlugin::isEnabled("d3sa2k4l3-23rds421-re323-4ae-423")){
            return $global['systemRootPath'].'plugin/Gallery/view/modeGallery.php';
        }
    }   
    
    public function getTags() {
        return array('free', 'firstPage', 'gallery');
    }
    
}
