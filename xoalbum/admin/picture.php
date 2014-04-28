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
 * @version         $Id: 2.10 picture.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'admin_header.php';
//It recovered the value of argument op in URL$
$op = xoalbum_CleanVars($_REQUEST, 'op', 'list', 'string');

echo $adminMenu->addNavigation('picture.php');
switch ($op) {
    case 'list':
    default:
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_PICTURE, 'picture.php?op=new', 'add');
        echo $adminMenu->renderButton();
        $start   = xoalbum_CleanVars($_REQUEST, 'start', 0);
        //global $xoopsModuleConfig;
        $picturePaginationLimit = $xoopsModuleConfig['userpager'];


        $criteria = new CriteriaCompo();
        $criteria->setSort('picture_id ASC, picture_name');
        $criteria->setOrder('ASC');
        $criteria->setLimit($picturePaginationLimit);
        $criteria->setStart($start);
        $picture_rows = $pictureHandler->getCount();
        $picture_arr = $pictureHandler->getAll($criteria);/*
//
// 
					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($picture_rows > $picturePaginationLimit) {
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($picture_rows, $picturePaginationLimit, $start, 'start');
            $GLOBALS['xoopsTpl']->assign('pagenav', !empty($pagenav) ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('pictureRows', $picture_rows);
         $pictureArray = array();

//    $fields = explode('|', picture_id:int:8::NOT NULL::primary|picture_uid:int:8::NOT NULL::|album_id:int:8::NOT NULL::|picture_name:varchar:32::NOT NULL::|picture_desc:varchar:255::NOT NULL::|picture_filename:varchar:255::NOT NULL::|picture_filetype:varchar:64::NOT NULL::|picture_thumbfirst:varchar:255::NOT NULL::|picture_thumbsecond:varchar:255::NOT NULL::|picture_size:int:8::NOT NULL::|picture_dateline:int:10::NOT NULL::|picture_comments:smallint:6::NOT NULL::|picture_downloads:smallint:6::NOT NULL::);
//    $fieldsCount    = count($fields);

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($picturePaginationLimit);
$criteria->setStart($start);


$pictureCount = $pictureHandler->getCount($criteria);
$picture_arr = $pictureHandler->getAll($criteria);

//    for ($i = 0; $i < $fieldsCount; ++$i) {
 if ($pictureCount > 0) {
     foreach (array_keys($picture_arr) as $i) {


//        $field = explode(':', $fields[$i]);
 $pictureArray['picture_id'] = $picture_arr[$i]->getVar("picture_id");
 $pictureArray['picture_uid'] = $picture_arr[$i]->getVar("picture_uid");
 $pictureArray['album_id'] = $albumHandler->get($picture_arr[$i]->getVar("album_id"))->getVar('album_name');
 $pictureArray['picture_name'] = $picture_arr[$i]->getVar("picture_name");
 $pictureArray['picture_desc'] = strip_tags($picture_arr[$i]->getVar("picture_desc"));
 $pictureArray['picture_filename'] = $picture_arr[$i]->getVar("picture_filename");
 $pictureArray['picture_filetype'] = $picture_arr[$i]->getVar("picture_filetype");
 $pictureArray['picture_thumbfirst'] = $picture_arr[$i]->getVar("picture_thumbfirst");
 $pictureArray['picture_thumbsecond'] = $picture_arr[$i]->getVar("picture_thumbsecond");
 $pictureArray['picture_size'] = $picture_arr[$i]->getVar("picture_size");
 $pictureArray['picture_dateline'] = $picture_arr[$i]->getVar("picture_dateline");
 $pictureArray['picture_comments'] = $picture_arr[$i]->getVar("picture_comments");
 $pictureArray['picture_downloads'] = $picture_arr[$i]->getVar("picture_downloads");
            $pictureArray['edit_delete'] =
              "<a href='picture.php?op=clone&picture_id=" . $i . "'><img src=" . $sysPathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='". _CLONE . "'></a>

                <a href='picture.php?op=edit&picture_id=" . $i . "'><img src=" . $sysPathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                                    <a href='picture.php?op=delete&picture_id=" . $i . "'><img src=" . $sysPathIcon16 . "/delete.png alt='" . _DELETE
                . "' title='" . _DELETE . "'></a>";


 $GLOBALS['xoopsTpl']->append_by_ref('pictureArrays', $pictureArray);
unset($pictureArray);
    }

    // Display Navigation
    if ($pictureCount > $picturePaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($pictureCount, $picturePaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }


// 					echo "<td class='center width5'>

//                    <a href='picture.php?op=edit&picture_id=".$i."'><img src=".$sysPathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
//                    <a href='picture.php?op=delete&picture_id=".$i."'><img src=".$sysPathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
//                    </td>";

//                echo "</tr>";

//            }

//            echo "</table><br /><br />";

//        } else {

//            echo "<table width='100%' cellspacing='1' class='outer'>

//                    <tr>

 // 					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."XXX</th>
//                    </tr><tr><td class='errorMsg' colspan='14'>There are noXXX picture</td></tr>";
//            echo "</table><br /><br />";

//-------------------------------------------

        echo $GLOBALS['xoopsTpl']->fetch(
            XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/templates/admin/xoalbum_admin_picture.tpl'
        );

}

    
	break;

    case 'new':
        $adminMenu->addItemButton(_AM_XOALBUM_PICTURE_LIST, 'picture.php', 'list');
        echo $adminMenu->renderButton();

        $picture_obj =& $pictureHandler->create();
        $form = $picture_obj->getForm();
        $form->display();
    break;

    case 'save':
        if ( !$GLOBALS['xoopsSecurity']->check() ) {
           redirect_header('picture.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['picture_id'])) {
           $picture_obj =& $pictureHandler->get($_REQUEST['picture_id']);
        } else {
           $picture_obj =& $pictureHandler->create();
        }
// Form save fields
        $picture_obj->setVar('picture_uid', $_REQUEST['picture_uid']);
        $picture_obj->setVar('album_id', $_REQUEST['album_id']);
        $picture_obj->setVar('picture_name', $_REQUEST['picture_name']);
        $picture_obj->setVar('picture_desc', $_REQUEST['picture_desc']);
        $picture_obj->setVar('picture_filename', $_REQUEST['picture_filename']);
        $picture_obj->setVar('picture_filetype', $_REQUEST['picture_filetype']);
        $picture_obj->setVar('picture_thumbfirst', $_REQUEST['picture_thumbfirst']);
        $picture_obj->setVar('picture_thumbsecond', $_REQUEST['picture_thumbsecond']);
        $picture_obj->setVar('picture_size', $_REQUEST['picture_size']);
        $picture_obj->setVar('picture_dateline', $_REQUEST['picture_dateline']);
        $picture_obj->setVar('picture_comments', $_REQUEST['picture_comments']);
        $picture_obj->setVar('picture_downloads', $_REQUEST['picture_downloads']);        
 //Permissions
//===============================================================

global $xoopsDB, $xoopsModule;
            $mid           = $xoopsModule->mid();
            $gperm_handler = xoops_gethandler('groupperm');
            $picture_id   = XoalbumRequest::getInt('picture_id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $picture_id
         * @param $gperm_handler
         * @param $permissionName
         * @param $mid
         */
            function setPermissions($myArray, $permissionGroup, $picture_id, $gperm_handler, $permissionName, $mid)
            {
                global $xoopsDB;
                $permissionArray = $myArray;
                if ($picture_id > 0) {
                    $sql = "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name` = '" . $permissionName
                        . "' AND `gperm_itemid`= $picture_id;";
                    $xoopsDB->query($sql);
                }
                //admin
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $picture_id);
                $gperm_handler->insert($gperm);
                unset($gperm);

                if (is_array($permissionArray)) {
                    foreach ($permissionArray as $key => $cat_groupperm) {
                        if ($cat_groupperm > 0) {
                            $gperm =& $gperm_handler->create();
                            $gperm->setVar('gperm_groupid', $cat_groupperm);
                            $gperm->setVar('gperm_name', $permissionName);
                            $gperm->setVar('gperm_modid', $mid);
                            $gperm->setVar('gperm_itemid', $picture_id);
                            $gperm_handler->insert($gperm);
                            unset($gperm);
                        }
                    }
                } elseif ($permissionArray > 0) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $permissionArray);
                    $gperm->setVar('gperm_name', $permissionName);
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $picture_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            }

            //View items
            $permissionGroup = 'cat_gperms_admin';
            $permissionName  = 'xoalbum_approve';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $picture_id, $gperm_handler, $permissionName, $mid);


            //Submit items
            $permissionGroup = 'cat_gperms_create';
            $permissionName  = 'xoalbum_submit';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $picture_id, $gperm_handler, $permissionName, $mid);

            //Approve items
            $permissionGroup = 'cat_gperms_read';
            $permissionName  = 'xoalbum_view';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $picture_id, $gperm_handler, $permissionName, $mid);


            //Form xoalbum_view
            $arr_xoalbum_view = XoalbumRequest::getArray("cat_gperms_read");
            if ($picture_id > 0) {
                $sql
                    =
                    "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name`='xoalbum_view' AND `gperm_itemid`=$picture_id;";
                $xoopsDB->query($sql);
            }
            //admin
            $gperm =& $gperm_handler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', 'xoalbum_view');
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $picture_id);
            $gperm_handler->insert($gperm);
            unset($gperm);
            if (is_array($arr_xoalbum_view)) {
                foreach ($arr_xoalbum_view as $key => $cat_groupperm) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $cat_groupperm);
                    $gperm->setVar('gperm_name', 'xoalbum_view');
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $picture_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            } else {
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', $arr_xoalbum_view);
                $gperm->setVar('gperm_name', 'xoalbum_view');
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $picture_id);
                $gperm_handler->insert($gperm);
                unset($gperm);
            }


//===============================================================

		if ($pictureHandler->insert($picture_obj)) {
           redirect_header('picture.php?op=list', 2, _AM_XOALBUM_FORMOK);
        }

        echo $picture_obj->getHtmlErrors();
        $form =& $picture_obj->getForm();
        $form->display();
    break;

    case 'edit':
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_PICTURE, 'picture.php?op=new', 'add');
        $adminMenu->addItemButton(_AM_XOALBUM_PICTURE_LIST, 'picture.php', 'list');
        echo $adminMenu->renderButton();
        $picture_obj = $pictureHandler->get($_REQUEST['picture_id']);
        $form = $picture_obj->getForm();
        $form->display();
    break;

    case 'delete':
        $picture_obj =& $pictureHandler->get($_REQUEST['picture_id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if ( !$GLOBALS['xoopsSecurity']->check() ) {
                redirect_header('picture.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($pictureHandler->delete($picture_obj)) {
                redirect_header('picture.php', 3, _AM_XOALBUM_FORMDELOK);
            } else {
                echo $picture_obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'picture_id' => $_REQUEST['picture_id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_XOALBUM_FORMSUREDEL, $picture_obj->getVar('picture_name')));
        }
    break;

    case 'clone':

        $id_field = $_REQUEST['picture_id'];

        if (googlemaps_cloneRecord('mod_googlemaps_category', 'category_id', $id_field )) {
        redirect_header('picture.php', 3, _AM_XOALBUM_CLONED_OK);
        } else {
            redirect_header('picture.php', 3, _AM_XOALBUM_CLONED_FAILED);
        }

     break;
}
include_once 'admin_footer.php';
