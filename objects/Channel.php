<?php
if (empty($global['systemRootPath'])) {
    $global['systemRootPath'] = '../';
}
require_once $global['systemRootPath'] . 'videos/configuration.php';
require_once $global['systemRootPath'] . 'objects/bootGrid.php';
require_once $global['systemRootPath'] . 'objects/user.php';

class Channel{
    
    static function getChannels(){        
        global $global;
        $sql = "SELECT u.*, "
                . " (SELECT count(v.id) FROM videos v where v.users_id = u.id) as total_videos "
                . " FROM users u "
                . " HAVING total_videos > 0 ";
        $sql .= BootGrid::getSqlFromPost(array('user', 'about'));

        $res = $global['mysqli']->query($sql);
        $subscribe = array();
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                unset($row['password']);
                $subscribe[] = $row;
            }
            //$subscribe = $res->fetch_all(MYSQLI_ASSOC);
        } else {
            $subscribe = false;
            die($sql . '\nError : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        return $subscribe;
    }
    
}

