<?php

global $global;
require_once $global['systemRootPath'] . 'plugin/Plugin.abstract.php';

class TheaterButton extends PluginAbstract {

    public function getDescription() {
        return "Add next theater switch button to the control bar";
    }

    public function getName() {
        return "TheaterButton";
    }

    public function getUUID() {
        return "f7596843-51b1-47a0-8bb1-b4ad91f87d6b";
    }    

    public function getEmptyDataObject() {
        $obj = new stdClass();
        $obj->show_switch_button = true;
        $obj->compress_is_default = false;
        return $obj;
    }
    
    public function getHeadCode() {
        global $global;
        if (empty($_GET['videoName'])) {
            return "";
        }
        
        $css = '<link href="' . $global['webSiteRootURL'] . 'plugin/TheaterButton/style.css" rel="stylesheet" type="text/css"/>';
        $css .= '<style></style>';
        return $css;
    }
    
    public function getFooterCode() {
        global $global, $autoPlayVideo;
        if (empty($_GET['videoName'])) {
            return "";
        }
        $obj = $this->getDataObject();
        $js = '<script src="' . $global['webSiteRootURL'] . 'plugin/TheaterButton/script.js" type="text/javascript"></script>';
        $tmp = "mainVideo";
        if($_SESSION['type']=="audio"){
            $tmp = "mainAudio";
        }
        $js .= '<script>var videoJsId = "'.$tmp.'";</script>';
        if(!empty($obj->show_switch_button)){
            $js .= '<script src="' . $global['webSiteRootURL'] . 'plugin/TheaterButton/addButton.js" type="text/javascript"></script>';
        }else{
            if($obj->compress_is_default){
                $js .= '<script>$(document).ready(function () {compress(videojs)});</script>';
            }else{
                $js .= '<script>$(document).ready(function () {expand(videojs)});</script>';
            }
        }
        
        return $js;
    }
        
    public function getTags() {
        return array('free', 'buttons', 'video player');
    }



}
