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
 * @version         $Id: 2.10 xoops_version.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

if (!defined('XOOPS_ROOT_PATH')) {
 exit();
}

$dirname = basename(dirname(__FILE__));

$modversion = array(
    'name' => _MI_XOALBUM_NAME,
    'version' => 2.10,
    'description' => _MI_XOALBUM_DESC,
    'author' => "XOOPS Development Team",
    'author_mail' => "name@site.com",
    'author_website_url' => "http://xoops.org",
    'author_website_name' => "XOOPS Project",
    'credits' => "XOOPS Development Team",
//    'license' => "GPL 2.0 or later",
    'help' => "page=help",
    'license' => "GPL 2.0 or later",
    'license_url' => "www.gnu.org/licenses/gpl-2.0.html/",

    'release_info' => "release_info",
    'release_file' => XOOPS_URL."/modules/{$dirname}/docs/release_info file",
    'release_date' => "2014/04/28",

    'manual' => "Installation.txt",
    'manual_file' => XOOPS_URL."/modules/{$dirname}/docs/link to manual file",
    'min_php' => "5.3.7",
    'min_xoops' => "2.5.7",
    'min_admin' => "1.1",
    'min_db' => array('mysql' => '5.0.7', 'mysqli' => '5.0.7'),
    'image' => "assets/images/xoalbum_logo.png",
    'dirname' => "{$dirname}",
    //Frameworks
    'dirmoduleadmin' => "Frameworks/moduleclasses/moduleadmin",
    'sysicons16' => "Frameworks/moduleclasses/icons/16",
    'sysicons32' => "Frameworks/moduleclasses/icons/32",
    'modicons16' => 'assets/images/icons/16',
    'modicons32' => 'assets/images/icons/32',
    //About
    'demo_site_url' => "http://www.xoops.org",
    'demo_site_name' => "XOOPS Demo Site",
    'support_url' => "http://xoops.org/modules/newbb",
    'support_name' => "Support Forum",
    'module_website_url' => "www.xoops.org",
    'module_website_name' => "XOOPS Project",
    'release' => "2013/11/03",
    'module_status' => "Beta 1",
    // Admin system menu
    'system_menu' => 1,
    // Admin things
    'hasAdmin' => 1,
    'adminindex' => "admin/index.php",
    'adminmenu' => "admin/menu.php",
    // Menu
    'hasMain' => 1,
    // Scripts to run upon installation or update
    'onInstall' => "include/install.php",
    'onUpdate' => "include/update.php"
);

// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
// Tables
$modversion['tables'][1] = "xoalbum_album";
$modversion['tables'][2] = "xoalbum_grid";
$modversion['tables'][3] = "xoalbum_category";
$modversion['tables'][4] = "xoalbum_picture";
//Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "xoalbum_search";
// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = "com_id";
$modversion['comments']['pageName'] = "comments.php";
// Comment callback functions
$modversion['comments']['callbackFile'] = "include/comment_functions.php";
$modversion['comments']['callback']['approve'] = "xoalbum_com_approve";
$modversion['comments']['callback']['update'] = "xoalbum_com_update";
// Templates
$modversion['templates'][] = array('file' => 'xoalbum_header.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_index.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_album.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_grid.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_category.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_picture.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'xoalbum_footer.tpl', 'description' => '');


$modversion['templates'][] = array('file' => 'admin/xoalbum_admin_about.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'admin/xoalbum_admin_help.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'admin/xoalbum_admin_picture.tpl', 'description' => '');


//Blocks
$modversion['blocks'][] = array(
    'file' => "album.php",
    'name' => _MI_XOALBUM_ALBUM_BLOCK,
    'description' => "",
    'show_func' => "b_xoalbum_album_show",
    'edit_func' => "b_xoalbum_album_edit",
    'options' => "|5|25|0",
    'template' => "album_block.tpl");

$modversion['blocks'][] = array(
    'file' => "grid.php",
    'name' => _MI_XOALBUM_GRID_BLOCK,
    'description' => "",
    'show_func' => "b_xoalbum_grid_show",
    'edit_func' => "b_xoalbum_grid_edit",
    'options' => "|5|25|0",
    'template' => "grid_block.tpl");

$modversion['blocks'][] = array(
    'file' => "category.php",
    'name' => _MI_XOALBUM_CATEGORY_BLOCK,
    'description' => "",
    'show_func' => "b_xoalbum_category_show",
    'edit_func' => "b_xoalbum_category_edit",
    'options' => "|5|25|0",
    'template' => "category_block.tpl");

$modversion['blocks'][] = array(
    'file' => "picture.php",
    'name' => _MI_XOALBUM_PICTURE_BLOCK,
    'description' => "",
    'show_func' => "b_xoalbum_picture_show",
    'edit_func' => "b_xoalbum_picture_edit",
    'options' => "|5|25|0",
    'template' => "picture_block.tpl");

// Config
xoops_load('xoopseditorhandler');
$editor_handler = XoopsEditorHandler::getInstance();
$modversion['config'][] = array(
    'name' => "xoalbum_editor",
    'title' => "_MI_XOALBUM_EDITOR",
    'description' => "_MI_XOALBUM_EDITOR_DESC",
    'formtype' => "select",
    'valuetype' => "text",
    'options' => array_flip($editor_handler->getList()),
    'default' => "dhtml");

// Get groups
$member_handler =& xoops_gethandler('member');
$xoopsgroups = $member_handler->getGroupList();
foreach ($xoopsgroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = array(
    'name' => "groups",
    'title' => "_MI_XOALBUM_GROUPS",
    'description' => "_MI_XOALBUM_GROUPS_DESC",
    'formtype' => "select_multi",
    'valuetype' => "array",
    'options' => $groups,
    'default' => $groups);

// Get Admin groups
$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'group_type', 'Admin' ) );
$member_handler =& xoops_gethandler('member');
$admin_xoopsgroups = $member_handler->getGroupList($criteria);
foreach ($admin_xoopsgroups as $key => $admin_group) {
    $admin_groups[$admin_group] = $key;
}
$modversion['config'][] = array(
    'name' => "admin_groups",
    'title' => "_MI_XOALBUM_ADMINGROUPS",
    'description' => "_MI_XOALBUM_ADMINGROUPS_DESC",
    'formtype' => "select_multi",
    'valuetype' => "array",
    'options' => $admin_groups,
    'default' => $admin_groups);

$modversion['config'][] = array(
    'name' => "keywords",
    'title' => "_MI_XOALBUM_KEYWORDS",
    'description' => "_MI_XOALBUM_KEYWORDS_DESC",
    'formtype' => "textbox",
    'valuetype' => "text",
    'default' => "xoalbum,album, grid, category, picture");

//Uploads : maxsize of image
$modversion['config'][] = array(
    'name' => "maxsize",
    'title' => "_MI_XOALBUM_MAXSIZE",
    'description' => "_MI_XOALBUM_MAXSIZE_DESC",
    'formtype' => "textbox",
    'valuetype' => "int",
    'default' => 5000000);

//Uploads : mimetypes of image
$modversion['config'][] = array(
    'name' => "mimetypes",
    'title' => "_MI_XOALBUM_MIMETYPES",
    'description' => "_MI_XOALBUM_MIMETYPES_DESC",
    'formtype' => "select_multi",
    'valuetype' => "array",
    'default' => array("image/gif", "image/jpeg", "image/png"),
    'options' => array("bmp" => "image/bmp","gif" => "image/gif","pjpeg" => "image/pjpeg",
                       "jpeg" => "image/jpeg","jpg" => "image/jpg","jpe" => "image/jpe",
                       "png" => "image/png"));

$modversion['config'][] = array(
    'name' => "adminpager",
    'title' => "_MI_XOALBUM_ADMINPAGER",
    'description' => "_MI_XOALBUM_ADMINPAGER_DESC",
    'formtype' => "textbox",
    'valuetype' => "int",
    'default' => 10);

$modversion['config'][] = array(
    'name' => "userpager",
    'title' => "_MI_XOALBUM_USERPAGER",
    'description' => "_MI_XOALBUM_USERPAGER_DESC",
    'formtype' => "textbox",
    'valuetype' => "int",
    'default' => 10);

$modversion['config'][] = array(
    'name' => "advertise",
    'title' => "_MI_XOALBUM_ADVERTISE",
    'description' => "_MI_XOALBUM_ADVERTISE_DESC",
    'formtype' => "textarea",
    'valuetype' => "text",
    'default' => "");

$modversion['config'][] = array(
    'name' => "bookmarks",
    'title' => "_MI_XOALBUM_BOOKMARKS",
    'description' => "_MI_XOALBUM_BOOKMARKS_DESC",
    'formtype' => "yesno",
    'valuetype' => "int",
    'default' => 0);

$modversion['config'][] = array(
    'name' => "fbcomments",
    'title' => "_MI_XOALBUM_FBCOMMENTS",
    'description' => "_MI_XOALBUM_FBCOMMENTS_DESC",
    'formtype' => "yesno",
    'valuetype' => "int",
    'default' => 0);

// Notifications xoalbum
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'xoalbum_notify_iteminfo';

$modversion['notification']['category'][] = array(
    'name' => "global",
    'title' => _MI_XOALBUM_GLOBAL_NOTIFY,
    'description' => _MI_XOALBUM_GLOBAL_NOTIFY_DESC,
    'subscribe_from' => array('index.php', 'viewcat.php', 'singlefile.php'));

$modversion['notification']['category'][] = array(
    'name' => "category",
    'title' => _MI_XOALBUM_CATEGORY_NOTIFY,
    'description' => _MI_XOALBUM_CATEGORY_NOTIFY_DESC,
    'subscribe_from' => array('viewcat.php', 'singlefile.php'),
    'item_name' => "cid",
    'allow_bookmark' => 1);

$modversion['notification']['category'][] = array(
    'name' => "file",
    'title' => _MI_XOALBUM_FILE_NOTIFY,
    'description' => _MI_XOALBUM_FILE_NOTIFY_DESC,
    'subscribe_from' => "singlefile.php",
    'item_name' => "lid",
    'allow_bookmark' => 1);

$modversion['notification']['event'][] = array(
    'name' => "new_category",
    'category' => "global",
    'title' => _MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption' => _MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_DESC,
    'mail_template' => "global_newcategory_notify",
    'mail_subject' => _MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "file_modify",
    'category' => "global",
    'admin_only' => 1,
    'title' => _MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY,
    'caption' => _MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_DESC,
    'mail_template' => "global_filemodify_notify",
    'mail_subject' => _MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "file_broken",
    'category' => "global",
    'admin_only' => 1,
    'title' => _MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY,
    'caption' => _MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_DESC,
    'mail_template' => "global_filebroken_notify",
    'mail_subject' => _MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "file_submit",
    'category' => "global",
    'admin_only' => 1,
    'title' => _MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY,
    'caption' => _MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => "global_filesubmit_notify",
    'mail_subject' => _MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "new_file",
    'category' => "global",
    'title' => _MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY,
    'caption' => _MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_DESC,
    'mail_template' => "global_newfile_notify",
    'mail_subject' => _MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "file_submit",
    'category' => "category",
    'admin_only' => 1,
    'title' => _MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY,
    'caption' => _MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => "category_filesubmit_notify",
    'mail_subject' => _MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "new_file",
    'category' => "category",
    'title' => _MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY,
    'caption' => _MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_DESC,
    'mail_template' => "category_newfile_notify",
    'mail_subject' => _MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_SUBJECT);

$modversion['notification']['event'][] = array(
    'name' => "approve",
    'category' => "file",
    'admin_only' => 1,
    'title' => _MI_XOALBUM_FILE_APPROVE_NOTIFY,
    'caption' => _MI_XOALBUM_FILE_APPROVE_NOTIFY_CAPTION,
    'description' => _MI_XOALBUM_FILE_APPROVE_NOTIFY_DESC,
    'mail_template' => "file_approve_notify",
    'mail_subject' => _MI_XOALBUM_FILE_APPROVE_NOTIFY_SUBJECT);
