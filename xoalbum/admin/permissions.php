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
 * @version         $Id: 2.10 permissions.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
include_once 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
if ( !empty($_POST['submit']) ) {
    redirect_header( XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/admin/permissions.php', 1, _MP_GPERMUPDATED );
}
// Check admin have access to this page
/*$group = $xoopsUser->getGroups ();
$groups = xoops_getModuleOption ( 'admin_groups', $thisDirname );
if (count ( array_intersect ( $group, $groups ) ) <= 0) {
    redirect_header ( 'index.php', 3, _NOPERM );
}*/

echo $adminMenu->addNavigation('permissions.php');

$permission = xoalbum_CleanVars($_POST, 'permission', 1, 'int');
$selected = array('', '', '');
$selected[$permission-1] = ' selected';

echo "
<form method='post' name='fselperm' action='permissions.php'>
    <table border=0>
        <tr>
            <td>
                <select name='permission' onChange='javascript: document.fselperm.submit()'>
                    <option value='1'".$selected[0].">"._AM_XOALBUM_PERMISSIONS_GLOBAL."</option>
                    <option value='2'".$selected[1].">"._AM_XOALBUM_PERMISSIONS_APPROVE."</option>
                    <option value='3'".$selected[2].">"._AM_XOALBUM_PERMISSIONS_SUBMIT."</option>
                    <option value='4'".$selected[3].">"._AM_XOALBUM_PERMISSIONS_VIEW."</option>
                </select>
            </td>
        </tr>
    </table>
</form>";

$module_id = $xoopsModule->getVar('mid');
switch ($permission) {
    case 1:
        $formTitle = _AM_XOALBUM_PERMISSIONS_GLOBAL;
        $permName = 'xoalbum_ac';
        $permDesc = _AM_XOALBUM_PERMISSIONS_GLOBAL_DESC;
        $globalPerms = array(    '4' => _AM_XOALBUM_PERMISSIONS_GLOBAL_4,
                                '8' => _AM_XOALBUM_PERMISSIONS_GLOBAL_8,
                                '16' => _AM_XOALBUM_PERMISSIONS_GLOBAL_16 );
        break;
    case 2:
        $formTitle = _AM_XOALBUM_PERMISSIONS_APPROVE;
        $permName = 'xoalbum_approve';
        $permDesc = _AM_XOALBUM_PERMISSIONS_APPROVE_DESC;
        break;
    case 3:
        $formTitle = _AM_XOALBUM_PERMISSIONS_SUBMIT;
        $permName = 'xoalbum_submit';
        $permDesc = _AM_XOALBUM_PERMISSIONS_SUBMIT_DESC;
        break;
    case 4:
        $formTitle = _AM_XOALBUM_PERMISSIONS_VIEW;
        $permName = 'xoalbum_view';
        $permDesc = _AM_XOALBUM_PERMISSIONS_VIEW_DESC;
        break;
}

$permform = new XoopsGroupPermForm($formTitle, $module_id, $permName, $permDesc, 'admin/permissions.php');
if ($permission == 1) {
    foreach ($globalPerms as $perm_id => $perm_name) {
        $permform->addItem($perm_id, $perm_name);
    }
    echo $permform->render();
    echo '<br /><br />';
} else {
    $criteria = new CriteriaCompo();
    $criteria->setSort('picture_name');
    $criteria->setOrder('ASC');
    $picture_count = $pictureHandler->getCount($criteria);
    $picture_arr = $pictureHandler->getObjects($criteria);
    unset($criteria);
    foreach (array_keys($picture_arr) as $i) {
        $permform->addItem($picture_arr[$i]->getVar('picture_id'), $picture_arr[$i]->getVar('picture_name'));
    }
    // Check if picture exist before rendering the form and redirect, if there aren't picture
    if ($picture_count > 0) {
        echo $permform->render();
        echo '<br /><br />';
    } else {
        redirect_header ( 'picture.php?op=new', 3, _AM_XOALBUM_PERMISSIONS_NOPERMSSET );
        exit ();
    }
}
unset($permform);
include_once 'admin_footer.php';