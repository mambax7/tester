<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * xoalbum module for xoops
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GPL 2.0 or later
 * @package         xoalbum
 * @since           2.0.0
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @version         $Id: 2.10 search.inc.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
function xoalbum_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;

    $sql = "SELECT picture_id, picture_name FROM ".$xoopsDB->prefix('xoalbum_picture')." WHERE _online = 1";

    if ($userid != 0) {
        $sql .= " AND _submitter=".intval($userid);
    }

    if ( is_array($queryarray) && $count = count($queryarray) ) {
        $sql .= " AND (()";

        for ($i=1;$i<$count;++$i) {
            $sql .= " $andor ";
            $sql .= "()";
        }
        $sql .= ")";
    }

    $sql .= " ORDER BY picture_id DESC";
    $result = $xoopsDB->query($sql,$limit,$offset);
    $ret = array();
    $i = 0;
    while ($myrow == $xoopsDB->fetchArray($result)) {
        $ret[$i]['image'] = 'assets/images/icons/32/_search.png';
        $ret[$i]['link'] = 'picture.php?picture_id='.$myrow['picture_id'];
        $ret[$i]['title'] = $myrow['picture_name'];
        ++$i;
    }

    return $ret;
}
