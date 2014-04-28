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
 * @version         $Id: 2.10 album.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'admin_header.php';
//It recovered the value of argument op in URL$
$op = xoalbum_CleanVars($_REQUEST, 'op', 'list', 'string');

echo $adminMenu->addNavigation('album.php');
switch ($op) {
    case 'list':
    default:
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_ALBUM, 'album.php?op=new', 'add');
        echo $adminMenu->renderButton();
        $start   = xoalbum_CleanVars($_REQUEST, 'start', 0);
        //global $xoopsModuleConfig;
        $albumPaginationLimit = $xoopsModuleConfig['userpager'];


        $criteria = new CriteriaCompo();
        $criteria->setSort('album_id ASC, album_name');
        $criteria->setOrder('ASC');
        $criteria->setLimit($albumPaginationLimit);
        $criteria->setStart($start);
        $album_rows = $albumHandler->getCount();
        $album_arr = $albumHandler->getAll($criteria);/*
//
// 
					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($album_rows > $albumPaginationLimit) {
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($album_rows, $albumPaginationLimit, $start, 'start');
            $GLOBALS['xoopsTpl']->assign('pagenav', !empty($pagenav) ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('albumRows', $album_rows);
         $albumArray = array();

//    $fields = explode('|', album_id:int:8::NOT NULL::primary|category_id:smallint:6::NOT NULL::|album_uid:int:8::NOT NULL::|album_name:varchar:64::NOT NULL::|album_desc:varchar:255::NOT NULL::|album_total:smallint:6::NOT NULL::|album_cover:varchar:255::NOT NULL::|album_views:smallint:6::NOT NULL::|album_status:tinyint:1::NOT NULL::|album_dateline:int:10::NOT NULL::);
//    $fieldsCount    = count($fields);

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($albumPaginationLimit);
$criteria->setStart($start);


$albumCount = $albumHandler->getCount($criteria);
$album_arr = $albumHandler->getAll($criteria);

//    for ($i = 0; $i < $fieldsCount; ++$i) {
 if ($albumCount > 0) {
     foreach (array_keys($album_arr) as $i) {


//        $field = explode(':', $fields[$i]);
 $albumArray['album_id'] = $album_arr[$i]->getVar("album_id");
 $albumArray['category_id'] = $categoryHandler->get($album_arr[$i]->getVar("category_id"))->getVar('category_name');
 $albumArray['album_uid'] = $album_arr[$i]->getVar("album_uid");
 $albumArray['album_name'] = $album_arr[$i]->getVar("album_name");
 $albumArray['album_desc'] = strip_tags($album_arr[$i]->getVar("album_desc"));
 $albumArray['album_total'] = $album_arr[$i]->getVar("album_total");
 $albumArray['album_cover'] = $album_arr[$i]->getVar("album_cover");
 $albumArray['album_views'] = $album_arr[$i]->getVar("album_views");
 $albumArray['album_status'] = $album_arr[$i]->getVar("album_status");
 $albumArray['album_dateline'] = $album_arr[$i]->getVar("album_dateline");
            $albumArray['edit_delete'] =
              "<a href='album.php?op=clone&album_id=" . $i . "'><img src=" . $sysPathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='". _CLONE . "'></a>

                <a href='album.php?op=edit&album_id=" . $i . "'><img src=" . $sysPathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                                    <a href='album.php?op=delete&album_id=" . $i . "'><img src=" . $sysPathIcon16 . "/delete.png alt='" . _DELETE
                . "' title='" . _DELETE . "'></a>";


 $GLOBALS['xoopsTpl']->append_by_ref('albumArrays', $albumArray);
unset($albumArray);
    }

    // Display Navigation
    if ($albumCount > $albumPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($albumCount, $albumPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }


// 					echo "<td class='center width5'>

//                    <a href='album.php?op=edit&album_id=".$i."'><img src=".$sysPathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
//                    <a href='album.php?op=delete&album_id=".$i."'><img src=".$sysPathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
//                    </td>";

//                echo "</tr>";

//            }

//            echo "</table><br /><br />";

//        } else {

//            echo "<table width='100%' cellspacing='1' class='outer'>

//                    <tr>

 // 					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."XXX</th>
//                    </tr><tr><td class='errorMsg' colspan='11'>There are noXXX album</td></tr>";
//            echo "</table><br /><br />";

//-------------------------------------------

        echo $GLOBALS['xoopsTpl']->fetch(
            XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/templates/admin/xoalbum_admin_album.tpl'
        );

}

    
	break;

    case 'new':
        $adminMenu->addItemButton(_AM_XOALBUM_ALBUM_LIST, 'album.php', 'list');
        echo $adminMenu->renderButton();

        $album_obj =& $albumHandler->create();
        $form = $album_obj->getForm();
        $form->display();
    break;

    case 'save':
        if ( !$GLOBALS['xoopsSecurity']->check() ) {
           redirect_header('album.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['album_id'])) {
           $album_obj =& $albumHandler->get($_REQUEST['album_id']);
        } else {
           $album_obj =& $albumHandler->create();
        }
// Form save fields
        $album_obj->setVar('category_id', $_REQUEST['category_id']);
        $album_obj->setVar('album_uid', $_REQUEST['album_uid']);
        $album_obj->setVar('album_name', $_REQUEST['album_name']);
        $album_obj->setVar('album_desc', $_REQUEST['album_desc']);
        $album_obj->setVar('album_total', $_REQUEST['album_total']);
        $album_obj->setVar('album_cover', $_REQUEST['album_cover']);
        $album_obj->setVar('album_views', $_REQUEST['album_views']);
        $album_obj->setVar('album_status', $_REQUEST['album_status']);
        $album_obj->setVar('album_dateline', $_REQUEST['album_dateline']);        
 //Permissions
//===============================================================

global $xoopsDB, $xoopsModule;
            $mid           = $xoopsModule->mid();
            $gperm_handler = xoops_gethandler('groupperm');
            $album_id   = XoalbumRequest::getInt('album_id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $album_id
         * @param $gperm_handler
         * @param $permissionName
         * @param $mid
         */
            function setPermissions($myArray, $permissionGroup, $album_id, $gperm_handler, $permissionName, $mid)
            {
                global $xoopsDB;
                $permissionArray = $myArray;
                if ($album_id > 0) {
                    $sql = "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name` = '" . $permissionName
                        . "' AND `gperm_itemid`= $album_id;";
                    $xoopsDB->query($sql);
                }
                //admin
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $album_id);
                $gperm_handler->insert($gperm);
                unset($gperm);

                if (is_array($permissionArray)) {
                    foreach ($permissionArray as $key => $cat_groupperm) {
                        if ($cat_groupperm > 0) {
                            $gperm =& $gperm_handler->create();
                            $gperm->setVar('gperm_groupid', $cat_groupperm);
                            $gperm->setVar('gperm_name', $permissionName);
                            $gperm->setVar('gperm_modid', $mid);
                            $gperm->setVar('gperm_itemid', $album_id);
                            $gperm_handler->insert($gperm);
                            unset($gperm);
                        }
                    }
                } elseif ($permissionArray > 0) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $permissionArray);
                    $gperm->setVar('gperm_name', $permissionName);
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $album_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            }

            //View items
            $permissionGroup = 'cat_gperms_admin';
            $permissionName  = 'xoalbum_approve';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $album_id, $gperm_handler, $permissionName, $mid);


            //Submit items
            $permissionGroup = 'cat_gperms_create';
            $permissionName  = 'xoalbum_submit';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $album_id, $gperm_handler, $permissionName, $mid);

            //Approve items
            $permissionGroup = 'cat_gperms_read';
            $permissionName  = 'xoalbum_view';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $album_id, $gperm_handler, $permissionName, $mid);


            //Form xoalbum_view
            $arr_xoalbum_view = XoalbumRequest::getArray("cat_gperms_read");
            if ($album_id > 0) {
                $sql
                    =
                    "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name`='xoalbum_view' AND `gperm_itemid`=$album_id;";
                $xoopsDB->query($sql);
            }
            //admin
            $gperm =& $gperm_handler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', 'xoalbum_view');
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $album_id);
            $gperm_handler->insert($gperm);
            unset($gperm);
            if (is_array($arr_xoalbum_view)) {
                foreach ($arr_xoalbum_view as $key => $cat_groupperm) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $cat_groupperm);
                    $gperm->setVar('gperm_name', 'xoalbum_view');
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $album_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            } else {
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', $arr_xoalbum_view);
                $gperm->setVar('gperm_name', 'xoalbum_view');
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $album_id);
                $gperm_handler->insert($gperm);
                unset($gperm);
            }


//===============================================================

		if ($albumHandler->insert($album_obj)) {
           redirect_header('album.php?op=list', 2, _AM_XOALBUM_FORMOK);
        }

        echo $album_obj->getHtmlErrors();
        $form =& $album_obj->getForm();
        $form->display();
    break;

    case 'edit':
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_ALBUM, 'album.php?op=new', 'add');
        $adminMenu->addItemButton(_AM_XOALBUM_ALBUM_LIST, 'album.php', 'list');
        echo $adminMenu->renderButton();
        $album_obj = $albumHandler->get($_REQUEST['album_id']);
        $form = $album_obj->getForm();
        $form->display();
    break;

    case 'delete':
        $album_obj =& $albumHandler->get($_REQUEST['album_id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if ( !$GLOBALS['xoopsSecurity']->check() ) {
                redirect_header('album.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($albumHandler->delete($album_obj)) {
                redirect_header('album.php', 3, _AM_XOALBUM_FORMDELOK);
            } else {
                echo $album_obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'album_id' => $_REQUEST['album_id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_XOALBUM_FORMSUREDEL, $album_obj->getVar('album_name')));
        }
    break;

    case 'clone':

        $id_field = $_REQUEST['album_id'];

        if (googlemaps_cloneRecord('mod_googlemaps_category', 'category_id', $id_field )) {
        redirect_header('album.php', 3, _AM_XOALBUM_CLONED_OK);
        } else {
            redirect_header('album.php', 3, _AM_XOALBUM_CLONED_FAILED);
        }

     break;
}
include_once 'admin_footer.php';
