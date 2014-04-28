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
 * @version         $Id: 2.10 grid.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'admin_header.php';
//It recovered the value of argument op in URL$
$op = xoalbum_CleanVars($_REQUEST, 'op', 'list', 'string');

echo $adminMenu->addNavigation('grid.php');
switch ($op) {
    case 'list':
    default:
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_GRID, 'grid.php?op=new', 'add');
        echo $adminMenu->renderButton();
        $start   = xoalbum_CleanVars($_REQUEST, 'start', 0);
        //global $xoopsModuleConfig;
        $gridPaginationLimit = $xoopsModuleConfig['userpager'];


        $criteria = new CriteriaCompo();
        $criteria->setSort('grid_id ASC, grid_id');
        $criteria->setOrder('ASC');
        $criteria->setLimit($gridPaginationLimit);
        $criteria->setStart($start);
        $grid_rows = $gridHandler->getCount();
        $grid_arr = $gridHandler->getAll($criteria);/*
//
// 
					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($grid_rows > $gridPaginationLimit) {
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($grid_rows, $gridPaginationLimit, $start, 'start');
            $GLOBALS['xoopsTpl']->assign('pagenav', !empty($pagenav) ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('gridRows', $grid_rows);
         $gridArray = array();

//    $fields = explode('|', grid_id:int:8::NOT NULL::primary|grid_uid:int:8::NOT NULL::|picture_id:int:8::NOT NULL::|grid_title:varchar:120::NOT NULL::|grid_data:varchar:255::NOT NULL::|grid_date:int:10::NOT NULL::);
//    $fieldsCount    = count($fields);

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($gridPaginationLimit);
$criteria->setStart($start);


$gridCount = $gridHandler->getCount($criteria);
$grid_arr = $gridHandler->getAll($criteria);

//    for ($i = 0; $i < $fieldsCount; ++$i) {
 if ($gridCount > 0) {
     foreach (array_keys($grid_arr) as $i) {


//        $field = explode(':', $fields[$i]);
 $gridArray['grid_id'] = $grid_arr[$i]->getVar("grid_id");
 $gridArray['grid_uid'] = $grid_arr[$i]->getVar("grid_uid");
 $gridArray['picture_id'] = $pictureHandler->get($grid_arr[$i]->getVar("picture_id"))->getVar('picture_name');
 $gridArray['grid_title'] = $grid_arr[$i]->getVar("grid_title");
 $gridArray['grid_data'] = $grid_arr[$i]->getVar("grid_data");
 $gridArray['grid_date'] = $grid_arr[$i]->getVar("grid_date");
            $gridArray['edit_delete'] =
              "<a href='grid.php?op=clone&grid_id=" . $i . "'><img src=" . $sysPathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='". _CLONE . "'></a>

                <a href='grid.php?op=edit&grid_id=" . $i . "'><img src=" . $sysPathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                                    <a href='grid.php?op=delete&grid_id=" . $i . "'><img src=" . $sysPathIcon16 . "/delete.png alt='" . _DELETE
                . "' title='" . _DELETE . "'></a>";


 $GLOBALS['xoopsTpl']->append_by_ref('gridArrays', $gridArray);
unset($gridArray);
    }

    // Display Navigation
    if ($gridCount > $gridPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($gridCount, $gridPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }


// 					echo "<td class='center width5'>

//                    <a href='grid.php?op=edit&grid_id=".$i."'><img src=".$sysPathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
//                    <a href='grid.php?op=delete&grid_id=".$i."'><img src=".$sysPathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
//                    </td>";

//                echo "</tr>";

//            }

//            echo "</table><br /><br />";

//        } else {

//            echo "<table width='100%' cellspacing='1' class='outer'>

//                    <tr>

 // 					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."XXX</th>
//                    </tr><tr><td class='errorMsg' colspan='7'>There are noXXX grid</td></tr>";
//            echo "</table><br /><br />";

//-------------------------------------------

        echo $GLOBALS['xoopsTpl']->fetch(
            XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/templates/admin/xoalbum_admin_grid.tpl'
        );

}

    
	break;

    case 'new':
        $adminMenu->addItemButton(_AM_XOALBUM_GRID_LIST, 'grid.php', 'list');
        echo $adminMenu->renderButton();

        $grid_obj =& $gridHandler->create();
        $form = $grid_obj->getForm();
        $form->display();
    break;

    case 'save':
        if ( !$GLOBALS['xoopsSecurity']->check() ) {
           redirect_header('grid.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['grid_id'])) {
           $grid_obj =& $gridHandler->get($_REQUEST['grid_id']);
        } else {
           $grid_obj =& $gridHandler->create();
        }
// Form save fields
        $grid_obj->setVar('grid_uid', $_REQUEST['grid_uid']);
        $grid_obj->setVar('picture_id', $_REQUEST['picture_id']);
        $grid_obj->setVar('grid_title', $_REQUEST['grid_title']);
        $grid_obj->setVar('grid_data', $_REQUEST['grid_data']);
        $grid_obj->setVar('grid_date', $_REQUEST['grid_date']);        
 //Permissions
//===============================================================

global $xoopsDB, $xoopsModule;
            $mid           = $xoopsModule->mid();
            $gperm_handler = xoops_gethandler('groupperm');
            $grid_id   = XoalbumRequest::getInt('grid_id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $grid_id
         * @param $gperm_handler
         * @param $permissionName
         * @param $mid
         */
            function setPermissions($myArray, $permissionGroup, $grid_id, $gperm_handler, $permissionName, $mid)
            {
                global $xoopsDB;
                $permissionArray = $myArray;
                if ($grid_id > 0) {
                    $sql = "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name` = '" . $permissionName
                        . "' AND `gperm_itemid`= $grid_id;";
                    $xoopsDB->query($sql);
                }
                //admin
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $grid_id);
                $gperm_handler->insert($gperm);
                unset($gperm);

                if (is_array($permissionArray)) {
                    foreach ($permissionArray as $key => $cat_groupperm) {
                        if ($cat_groupperm > 0) {
                            $gperm =& $gperm_handler->create();
                            $gperm->setVar('gperm_groupid', $cat_groupperm);
                            $gperm->setVar('gperm_name', $permissionName);
                            $gperm->setVar('gperm_modid', $mid);
                            $gperm->setVar('gperm_itemid', $grid_id);
                            $gperm_handler->insert($gperm);
                            unset($gperm);
                        }
                    }
                } elseif ($permissionArray > 0) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $permissionArray);
                    $gperm->setVar('gperm_name', $permissionName);
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $grid_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            }

            //View items
            $permissionGroup = 'cat_gperms_admin';
            $permissionName  = 'xoalbum_approve';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $grid_id, $gperm_handler, $permissionName, $mid);


            //Submit items
            $permissionGroup = 'cat_gperms_create';
            $permissionName  = 'xoalbum_submit';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $grid_id, $gperm_handler, $permissionName, $mid);

            //Approve items
            $permissionGroup = 'cat_gperms_read';
            $permissionName  = 'xoalbum_view';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $grid_id, $gperm_handler, $permissionName, $mid);


            //Form xoalbum_view
            $arr_xoalbum_view = XoalbumRequest::getArray("cat_gperms_read");
            if ($grid_id > 0) {
                $sql
                    =
                    "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name`='xoalbum_view' AND `gperm_itemid`=$grid_id;";
                $xoopsDB->query($sql);
            }
            //admin
            $gperm =& $gperm_handler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', 'xoalbum_view');
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $grid_id);
            $gperm_handler->insert($gperm);
            unset($gperm);
            if (is_array($arr_xoalbum_view)) {
                foreach ($arr_xoalbum_view as $key => $cat_groupperm) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $cat_groupperm);
                    $gperm->setVar('gperm_name', 'xoalbum_view');
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $grid_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            } else {
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', $arr_xoalbum_view);
                $gperm->setVar('gperm_name', 'xoalbum_view');
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $grid_id);
                $gperm_handler->insert($gperm);
                unset($gperm);
            }


//===============================================================

		if ($gridHandler->insert($grid_obj)) {
           redirect_header('grid.php?op=list', 2, _AM_XOALBUM_FORMOK);
        }

        echo $grid_obj->getHtmlErrors();
        $form =& $grid_obj->getForm();
        $form->display();
    break;

    case 'edit':
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_GRID, 'grid.php?op=new', 'add');
        $adminMenu->addItemButton(_AM_XOALBUM_GRID_LIST, 'grid.php', 'list');
        echo $adminMenu->renderButton();
        $grid_obj = $gridHandler->get($_REQUEST['grid_id']);
        $form = $grid_obj->getForm();
        $form->display();
    break;

    case 'delete':
        $grid_obj =& $gridHandler->get($_REQUEST['grid_id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if ( !$GLOBALS['xoopsSecurity']->check() ) {
                redirect_header('grid.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($gridHandler->delete($grid_obj)) {
                redirect_header('grid.php', 3, _AM_XOALBUM_FORMDELOK);
            } else {
                echo $grid_obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'grid_id' => $_REQUEST['grid_id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_XOALBUM_FORMSUREDEL, $grid_obj->getVar('grid_id')));
        }
    break;

    case 'clone':

        $id_field = $_REQUEST['grid_id'];

        if (googlemaps_cloneRecord('mod_googlemaps_category', 'category_id', $id_field )) {
        redirect_header('grid.php', 3, _AM_XOALBUM_CLONED_OK);
        } else {
            redirect_header('grid.php', 3, _AM_XOALBUM_CLONED_FAILED);
        }

     break;
}
include_once 'admin_footer.php';
