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
 * @version         $Id: 2.10 admin.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
//Index
define('_AM_XOALBUM_STATISTICS', "Xoalbum statistics");
define('_AM_XOALBUM_THEREARE_ALBUM', "There are <span class='bold'>%s</span> Album in the database");
define('_AM_XOALBUM_THEREARE_GRID', "There are <span class='bold'>%s</span> Grid in the database");
define('_AM_XOALBUM_THEREARE_CATEGORY', "There are <span class='bold'>%s</span> Category in the database");
define('_AM_XOALBUM_THEREARE_PICTURE', "There are <span class='bold'>%s</span> Picture in the database");
//Buttons
define('_AM_XOALBUM_ADD_ALBUM', "Add new album");
define('_AM_XOALBUM_ALBUM_LIST', "List of album");
define('_AM_XOALBUM_ADD_GRID', "Add new grid");
define('_AM_XOALBUM_GRID_LIST', "List of grid");
define('_AM_XOALBUM_ADD_CATEGORY', "Add new category");
define('_AM_XOALBUM_CATEGORY_LIST', "List of category");
define('_AM_XOALBUM_ADD_PICTURE', "Add new picture");
define('_AM_XOALBUM_PICTURE_LIST', "List of picture");
//General
define('_AM_XOALBUM_FORMOK', "Registered successfull");
define('_AM_XOALBUM_FORMDELOK', "Deleted successfull");
define('_AM_XOALBUM_FORMSUREDEL', "Are you sure to Delete: <span class='bold red'>%s</span></b>");
define('_AM_XOALBUM_FORMSURERENEW', "Are you sure to Renew: <span class='bold red'>%s</span></b>");
define('_AM_XOALBUM_FORMUPLOAD', "Upload");
define('_AM_XOALBUM_FORMIMAGE_PATH', "File presents in %s");
define('_AM_XOALBUM_FORM_ACTION', "Action");
define('_AM_XOALBUM_SELECT', "Select action for selected item(s)");
define('_AM_XOALBUM_SELECTED_DELETE', "Delete selected item(s)");
define('_AM_XOALBUM_SELECTED_ACTIVATE', "Activate selected item(s)");
define('_AM_XOALBUM_SELECTED_DEACTIVATE', "De-activate selected item(s)");
define('_AM_XOALBUM_SELECTED_ERROR', "You selected nothing to delete");
define('_AM_XOALBUM_CLONED_OK', "Record cloned successfully");
define('_AM_XOALBUM_CLONED_FAILED', "Cloning of the record has failed");

// Album
define('_AM_XOALBUM_ALBUM_ADD', "Add a album");
define('_AM_XOALBUM_ALBUM_EDIT', "Edit album");
define('_AM_XOALBUM_ALBUM_DELETE', "Delete album");
define('_AM_XOALBUM_ALBUM_ID', "Id");
define('_AM_XOALBUM_ALBUMORY_ID', "Category");
define('_AM_XOALBUM_ALBUM_UID', "Uid");
define('_AM_XOALBUM_ALBUM_NAME', "Name");
define('_AM_XOALBUM_ALBUM_DESC', "Desc");
define('_AM_XOALBUM_ALBUM_TOTAL', "Total");
define('_AM_XOALBUM_ALBUM_COVER', "Cover");
define('_AM_XOALBUM_ALBUM_VIEWS', "Views");
define('_AM_XOALBUM_ALBUM_STATUS', "Status");
define('_AM_XOALBUM_ALBUM_DATELINE', "Dateline");
// Grid
define('_AM_XOALBUM_GRID_ADD', "Add a grid");
define('_AM_XOALBUM_GRID_EDIT', "Edit grid");
define('_AM_XOALBUM_GRID_DELETE', "Delete grid");
define('_AM_XOALBUM_GRID_ID', "Id");
define('_AM_XOALBUM_GRID_UID', "Uid");
define('_AM_XOALBUM_GRIDURE_ID', "Picture");
define('_AM_XOALBUM_GRID_TITLE', "Title");
define('_AM_XOALBUM_GRID_DATA', "Data");
define('_AM_XOALBUM_GRID_DATE', "Date");
// Category
define('_AM_XOALBUM_CATEGORY_ADD', "Add a category");
define('_AM_XOALBUM_CATEGORY_EDIT', "Edit category");
define('_AM_XOALBUM_CATEGORY_DELETE', "Delete category");
define('_AM_XOALBUM_CATEGORY_ID', "Id");
define('_AM_XOALBUM_CATEGORY_NAME', "Name");
define('_AM_XOALBUM_CATEGORY_TOTAL', "Total");
define('_AM_XOALBUM_CATEGORY_ORDER', "Order");
define('_AM_XOALBUM_CATEGORY_DATELINE', "Dateline");
// Picture
define('_AM_XOALBUM_PICTURE_ADD', "Add a picture");
define('_AM_XOALBUM_PICTURE_EDIT', "Edit picture");
define('_AM_XOALBUM_PICTURE_DELETE', "Delete picture");
define('_AM_XOALBUM_PICTURE_ID', "Id");
define('_AM_XOALBUM_PICTURE_UID', "Uid");
define('_AM_XOALBUM_PICTURED', "Album");
define('_AM_XOALBUM_PICTURE_NAME', "Name");
define('_AM_XOALBUM_PICTURE_DESC', "Desc");
define('_AM_XOALBUM_PICTURE_FILENAME', "Filename");
define('_AM_XOALBUM_PICTURE_FILETYPE', "Filetype");
define('_AM_XOALBUM_PICTURE_THUMBFIRST', "Thumbfirst");
define('_AM_XOALBUM_PICTURE_THUMBSECOND', "Thumbsecond");
define('_AM_XOALBUM_PICTURE_SIZE', "Size");
define('_AM_XOALBUM_PICTURE_DATELINE', "Dateline");
define('_AM_XOALBUM_PICTURE_COMMENTS', "Comments");
define('_AM_XOALBUM_PICTURE_DOWNLOADS', "Downloads");//Blocks.php
define('_AM_XOALBUM_ALBUM_BLOCK', "Album block");
define('_AM_XOALBUM_GRID_BLOCK', "Grid block");
define('_AM_XOALBUM_CATEGORY_BLOCK', "Category block");
define('_AM_XOALBUM_PICTURE_BLOCK', "Picture block");
//Permissions
define('_AM_XOALBUM_PERMISSIONS_GLOBAL', "Global permissions");
define('_AM_XOALBUM_PERMISSIONS_GLOBAL_DESC', "Only users in the group that you select may global this");
define('_AM_XOALBUM_PERMISSIONS_GLOBAL_4', "Rate from user");
define('_AM_XOALBUM_PERMISSIONS_GLOBAL_8', "Submit from user side");
define('_AM_XOALBUM_PERMISSIONS_GLOBAL_16', "Auto approve");
define('_AM_XOALBUM_PERMISSIONS_APPROVE', "Permissions to approve");
define('_AM_XOALBUM_PERMISSIONS_APPROVE_DESC', "Only users in the group that you select may approve this");
define('_AM_XOALBUM_PERMISSIONS_VIEW', "Permissions to view");
define('_AM_XOALBUM_PERMISSIONS_VIEW_DESC', "Only users in the group that you select may view this");
define('_AM_XOALBUM_PERMISSIONS_SUBMIT', "Permissions to submit");
define('_AM_XOALBUM_PERMISSIONS_SUBMIT_DESC', "Only users in the group that you select may submit this");
define('_AM_XOALBUM_PERMISSIONS_NOPERMSSET', "Permission cannot be set: No Picture created yet! Please create a Picture first.");
//Error NoFrameworks
define('_AM_ERROR_NOFRAMEWORKS', "Error: You don&#39;t use the Frameworks \"admin module\". Please install this Frameworks");
define('_AM_XOALBUM_MAINTAINEDBY', "is maintained by the");