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
 * @version         $Id: 2.10 modinfo.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
// Admin
define('_MI_XOALBUM_NAME', "Xoalbum");
define('_MI_XOALBUM_DESC', "This module is for doing following...");
//Menu
define('_MI_XOALBUM_ADMENU1', "Home");
define('_MI_XOALBUM_ADMENU2', "Album");
define('_MI_XOALBUM_ADMENU3', "Grid");
define('_MI_XOALBUM_ADMENU4', "Category");
define('_MI_XOALBUM_ADMENU5', "Picture");
define('_MI_XOALBUM_ADMENU6', "Permissions");
define('_MI_XOALBUM_ADMENU7', "About");
//Blocks
define('_MI_XOALBUM_ALBUM_BLOCK', "Album block");
define('_MI_XOALBUM_GRID_BLOCK', "Grid block");
define('_MI_XOALBUM_CATEGORY_BLOCK', "Category block");
define('_MI_XOALBUM_PICTURE_BLOCK', "Picture block");
//Config
define('_MI_XOALBUM_EDITOR', "Editor");
define('_MI_XOALBUM_EDITOR_DESC', "Select the Editor to use");
define('_MI_XOALBUM_KEYWORDS', "Keywords");
define('_MI_XOALBUM_KEYWORDS_DESC', "Insert here the keywords (separate by comma)");
define('_MI_XOALBUM_ADMINPAGER', "Admin: records / page");
define('_MI_XOALBUM_ADMINPAGER_DESC', "Admin: # of records shown per page");
define('_MI_XOALBUM_USERPAGER', "User: records / page");
define('_MI_XOALBUM_USERPAGER_DESC', "User: # of records shown per page");
define('_MI_XOALBUM_MAXSIZE', "Max size");
define('_MI_XOALBUM_MAXSIZE_DESC', "Set a number of max size uploads file in byte");
define('_MI_XOALBUM_MIMETYPES', "Mime Types");
define('_MI_XOALBUM_MIMETYPES_DESC', "Set the mime types selected");
define('_MI_XOALBUM_IDPAYPAL', "Paypal ID");
define('_MI_XOALBUM_IDPAYPAL_DESC', "Insert here your PayPal ID for donactions.");
define('_MI_XOALBUM_ADVERTISE', "Advertisement Code");
define('_MI_XOALBUM_ADVERTISE_DESC', "Insert here the advertisement code");
define('_MI_XOALBUM_BOOKMARKS', "Social Bookmarks");
define('_MI_XOALBUM_BOOKMARKS_DESC', "Show Social Bookmarks in the form");
define('_MI_XOALBUM_FBCOMMENTS', "Facebook comments");
define('_MI_XOALBUM_FBCOMMENTS_DESC', "Allow Facebook comments in the form");
// Notifications
define('_MI_XOALBUM_GLOBAL_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_GLOBAL_NEWFILE_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_CATEGORY_NEWFILE_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_APPROVE_NOTIFY', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_APPROVE_NOTIFY_CAPTION', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_APPROVE_NOTIFY_DESC', "Allow Facebook comments in the form");
define('_MI_XOALBUM_FILE_APPROVE_NOTIFY_SUBJECT', "Allow Facebook comments in the form");
// Permissions Groups
define('_MI_XOALBUM_GROUPS', "Groups access");
define('_MI_XOALBUM_GROUPS_DESC', "Select general access permission for groups.");
define('_MI_XOALBUM_ADMINGROUPS', "Admin Group Permissions");
define('_MI_XOALBUM_ADMINGROUPS_DESC', "Which groups have access to tools and permissions page");