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
 * @version         $Id: 2.10 category.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'admin_header.php';
//It recovered the value of argument op in URL$
$op = xoalbum_CleanVars($_REQUEST, 'op', 'list', 'string');

echo $adminMenu->addNavigation('category.php');
switch ($op) {
    case 'list':
    default:
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_CATEGORY, 'category.php?op=new', 'add');
        echo $adminMenu->renderButton();
        $start   = xoalbum_CleanVars($_REQUEST, 'start', 0);
        //global $xoopsModuleConfig;
        $categoryPaginationLimit = $xoopsModuleConfig['userpager'];


        $criteria = new CriteriaCompo();
        $criteria->setSort('category_id ASC, category_name');
        $criteria->setOrder('ASC');
        $criteria->setLimit($categoryPaginationLimit);
        $criteria->setStart($start);
        $category_rows = $categoryHandler->getCount();
        $category_arr = $categoryHandler->getAll($criteria);/*
//
// 
					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($category_rows > $categoryPaginationLimit) {
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($category_rows, $categoryPaginationLimit, $start, 'start');
            $GLOBALS['xoopsTpl']->assign('pagenav', !empty($pagenav) ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('categoryRows', $category_rows);
         $categoryArray = array();

//    $fields = explode('|', category_id:smallint:6::NOT NULL::primary|category_name:varchar:32::NOT NULL::|category_total:int:8::NOT NULL::|category_order:smallint:6::NOT NULL::|category_dateline:int:10::NOT NULL::);
//    $fieldsCount    = count($fields);

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($categoryPaginationLimit);
$criteria->setStart($start);


$categoryCount = $categoryHandler->getCount($criteria);
$category_arr = $categoryHandler->getAll($criteria);

//    for ($i = 0; $i < $fieldsCount; ++$i) {
 if ($categoryCount > 0) {
     foreach (array_keys($category_arr) as $i) {


//        $field = explode(':', $fields[$i]);
 $categoryArray['category_id'] = $category_arr[$i]->getVar("category_id");
 $categoryArray['category_name'] = $category_arr[$i]->getVar("category_name");
 $categoryArray['category_total'] = $category_arr[$i]->getVar("category_total");
 $categoryArray['category_order'] = $category_arr[$i]->getVar("category_order");
 $categoryArray['category_dateline'] = $category_arr[$i]->getVar("category_dateline");
            $categoryArray['edit_delete'] =
              "<a href='category.php?op=clone&category_id=" . $i . "'><img src=" . $sysPathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='". _CLONE . "'></a>

                <a href='category.php?op=edit&category_id=" . $i . "'><img src=" . $sysPathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                                    <a href='category.php?op=delete&category_id=" . $i . "'><img src=" . $sysPathIcon16 . "/delete.png alt='" . _DELETE
                . "' title='" . _DELETE . "'></a>";


 $GLOBALS['xoopsTpl']->append_by_ref('categoryArrays', $categoryArray);
unset($categoryArray);
    }

    // Display Navigation
    if ($categoryCount > $categoryPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }


// 					echo "<td class='center width5'>

//                    <a href='category.php?op=edit&category_id=".$i."'><img src=".$sysPathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
//                    <a href='category.php?op=delete&category_id=".$i."'><img src=".$sysPathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
//                    </td>";

//                echo "</tr>";

//            }

//            echo "</table><br /><br />";

//        } else {

//            echo "<table width='100%' cellspacing='1' class='outer'>

//                    <tr>

 // 					<th class='center width5'>"._AM_XOALBUM_FORM_ACTION."XXX</th>
//                    </tr><tr><td class='errorMsg' colspan='6'>There are noXXX category</td></tr>";
//            echo "</table><br /><br />";

//-------------------------------------------

        echo $GLOBALS['xoopsTpl']->fetch(
            XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/templates/admin/xoalbum_admin_category.tpl'
        );

}

    
	break;

    case 'new':
        $adminMenu->addItemButton(_AM_XOALBUM_CATEGORY_LIST, 'category.php', 'list');
        echo $adminMenu->renderButton();

        $category_obj =& $categoryHandler->create();
        $form = $category_obj->getForm();
        $form->display();
    break;

    case 'save':
        if ( !$GLOBALS['xoopsSecurity']->check() ) {
           redirect_header('category.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['category_id'])) {
           $category_obj =& $categoryHandler->get($_REQUEST['category_id']);
        } else {
           $category_obj =& $categoryHandler->create();
        }
// Form save fields
        $category_obj->setVar('category_name', $_REQUEST['category_name']);
        $category_obj->setVar('category_total', $_REQUEST['category_total']);
        $category_obj->setVar('category_order', $_REQUEST['category_order']);
        $category_obj->setVar('category_dateline', $_REQUEST['category_dateline']);        
 //Permissions
//===============================================================

global $xoopsDB, $xoopsModule;
            $mid           = $xoopsModule->mid();
            $gperm_handler = xoops_gethandler('groupperm');
            $category_id   = XoalbumRequest::getInt('category_id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $category_id
         * @param $gperm_handler
         * @param $permissionName
         * @param $mid
         */
            function setPermissions($myArray, $permissionGroup, $category_id, $gperm_handler, $permissionName, $mid)
            {
                global $xoopsDB;
                $permissionArray = $myArray;
                if ($category_id > 0) {
                    $sql = "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name` = '" . $permissionName
                        . "' AND `gperm_itemid`= $category_id;";
                    $xoopsDB->query($sql);
                }
                //admin
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $category_id);
                $gperm_handler->insert($gperm);
                unset($gperm);

                if (is_array($permissionArray)) {
                    foreach ($permissionArray as $key => $cat_groupperm) {
                        if ($cat_groupperm > 0) {
                            $gperm =& $gperm_handler->create();
                            $gperm->setVar('gperm_groupid', $cat_groupperm);
                            $gperm->setVar('gperm_name', $permissionName);
                            $gperm->setVar('gperm_modid', $mid);
                            $gperm->setVar('gperm_itemid', $category_id);
                            $gperm_handler->insert($gperm);
                            unset($gperm);
                        }
                    }
                } elseif ($permissionArray > 0) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $permissionArray);
                    $gperm->setVar('gperm_name', $permissionName);
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $category_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            }

            //View items
            $permissionGroup = 'cat_gperms_admin';
            $permissionName  = 'xoalbum_approve';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $category_id, $gperm_handler, $permissionName, $mid);


            //Submit items
            $permissionGroup = 'cat_gperms_create';
            $permissionName  = 'xoalbum_submit';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $category_id, $gperm_handler, $permissionName, $mid);

            //Approve items
            $permissionGroup = 'cat_gperms_read';
            $permissionName  = 'xoalbum_view';
            $permissionArray = XoalbumRequest::getArray($permissionGroup, '');
            setPermissions($permissionArray, $permissionGroup, $category_id, $gperm_handler, $permissionName, $mid);


            //Form xoalbum_view
            $arr_xoalbum_view = XoalbumRequest::getArray("cat_gperms_read");
            if ($category_id > 0) {
                $sql
                    =
                    "DELETE FROM `" . $xoopsDB->prefix("group_permission") . "` WHERE `gperm_name`='xoalbum_view' AND `gperm_itemid`=$category_id;";
                $xoopsDB->query($sql);
            }
            //admin
            $gperm =& $gperm_handler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', 'xoalbum_view');
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $category_id);
            $gperm_handler->insert($gperm);
            unset($gperm);
            if (is_array($arr_xoalbum_view)) {
                foreach ($arr_xoalbum_view as $key => $cat_groupperm) {
                    $gperm =& $gperm_handler->create();
                    $gperm->setVar('gperm_groupid', $cat_groupperm);
                    $gperm->setVar('gperm_name', 'xoalbum_view');
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $category_id);
                    $gperm_handler->insert($gperm);
                    unset($gperm);
                }
            } else {
                $gperm =& $gperm_handler->create();
                $gperm->setVar('gperm_groupid', $arr_xoalbum_view);
                $gperm->setVar('gperm_name', 'xoalbum_view');
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $category_id);
                $gperm_handler->insert($gperm);
                unset($gperm);
            }


//===============================================================

		if ($categoryHandler->insert($category_obj)) {
           redirect_header('category.php?op=list', 2, _AM_XOALBUM_FORMOK);
        }

        echo $category_obj->getHtmlErrors();
        $form =& $category_obj->getForm();
        $form->display();
    break;

    case 'edit':
        $adminMenu->addItemButton(_AM_XOALBUM_ADD_CATEGORY, 'category.php?op=new', 'add');
        $adminMenu->addItemButton(_AM_XOALBUM_CATEGORY_LIST, 'category.php', 'list');
        echo $adminMenu->renderButton();
        $category_obj = $categoryHandler->get($_REQUEST['category_id']);
        $form = $category_obj->getForm();
        $form->display();
    break;

    case 'delete':
        $category_obj =& $categoryHandler->get($_REQUEST['category_id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if ( !$GLOBALS['xoopsSecurity']->check() ) {
                redirect_header('category.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($categoryHandler->delete($category_obj)) {
                redirect_header('category.php', 3, _AM_XOALBUM_FORMDELOK);
            } else {
                echo $category_obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'category_id' => $_REQUEST['category_id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_XOALBUM_FORMSUREDEL, $category_obj->getVar('category_name')));
        }
    break;

    case 'clone':

        $id_field = $_REQUEST['category_id'];

        if (googlemaps_cloneRecord('mod_googlemaps_category', 'category_id', $id_field )) {
        redirect_header('category.php', 3, _AM_XOALBUM_CLONED_OK);
        } else {
            redirect_header('category.php', 3, _AM_XOALBUM_CLONED_FAILED);
        }

     break;
}
include_once 'admin_footer.php';
