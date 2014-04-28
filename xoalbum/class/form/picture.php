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
defined('XOOPS_ROOT_PATH') or die("Restricted access");

include_once dirname(dirname(dirname(__FILE__))) . '/include/common.php';

xoops_load('XoopsFormLoader');
/**
 * Class XoalbumPictureForm
 */
class XoalbumPictureForm extends XoopsThemeForm
{
    var $targetObject = null;
    /**
     * Constructor
     *
     * @param $target
     */
    function __construct(&$target)
    {
      $this->targetObject = &$target;

       $title = $this->targetObject->isNew() ? sprintf(_AM_XOALBUM_PICTURE_ADD) : sprintf(_AM_XOALBUM_PICTURE_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'),'post', true);
        $this->setExtra('enctype="multipart/form-data"');
        


        //include ID field, it's needed so the module knows if it is a new form or an edited form
        

        $hidden = new XoopsFormHidden('picture_id', $this->targetObject->getVar('picture_id'));
        $this->addElement($hidden);
        unset($hidden);
        
// Picture_id
            $this->addElement(new XoopsFormLabel(_AM_XOALBUM_PICTURE_ID, $this->targetObject->getVar('picture_id'), 'picture_id' ));
            // Picture_uid
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_UID, 'picture_uid', 50, 255, $this->targetObject->getVar('picture_uid')), false);
        // Album_id
        $albumHandler =& xoops_getModuleHandler('album', 'xoalbum');
        $album_id_select = new XoopsFormSelect(_AM_XOALBUM_ALBUM_ID, 'album_id', $this->targetObject->getVar('album_id'));
        $album_id_select->addOptionArray($albumHandler->getList());
        $this->addElement($album_id_select, false);
        // Picture_name
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_NAME, 'picture_name', 50, 255, $this->targetObject->getVar('picture_name')), false);
        // Picture_desc
        $editor_configs = array();
        $editor_configs['name'] = 'picture_desc';
        $editor_configs['value'] = $this->targetObject->getVar('picture_desc', 'e');
        $editor_configs['rows'] = 5;
        $editor_configs['cols'] = 40;
        $editor_configs['width'] = '100%';
        $editor_configs['height'] = '400px';
        $editor_configs['editor'] = xoops_getModuleOption('xoalbum_editor', 'xoalbum');
        $this->addElement( new XoopsFormEditor(_AM_XOALBUM_PICTURE_DESC, 'picture_desc', $editor_configs), true );
        // Picture_filename
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_FILENAME, 'picture_filename', 50, 255, $this->targetObject->getVar('picture_filename')), false);
        // Picture_filetype
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_FILETYPE, 'picture_filetype', 50, 255, $this->targetObject->getVar('picture_filetype')), false);
        // Picture_thumbfirst
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_THUMBFIRST, 'picture_thumbfirst', 50, 255, $this->targetObject->getVar('picture_thumbfirst')), false);
        // Picture_thumbsecond
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_THUMBSECOND, 'picture_thumbsecond', 50, 255, $this->targetObject->getVar('picture_thumbsecond')), false);
        // Picture_size
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_SIZE, 'picture_size', 50, 255, $this->targetObject->getVar('picture_size')), false);
        // Picture_dateline
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_DATELINE, 'picture_dateline', 50, 255, $this->targetObject->getVar('picture_dateline')), false);
        // Picture_comments
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_COMMENTS, 'picture_comments', 50, 255, $this->targetObject->getVar('picture_comments')), false);
        // Picture_downloads
        $this->addElement(new XoopsFormText(_AM_XOALBUM_PICTURE_DOWNLOADS, 'picture_downloads', 50, 255, $this->targetObject->getVar('picture_downloads')), false);
                
		//permissions
        global $xoopsModule;
        $member_handler = & xoops_gethandler ( 'member' );
        $group_list = &$member_handler->getGroupList();
        $gperm_handler = &xoops_gethandler ( 'groupperm' );
        $full_list = array_keys ( $group_list );

//========================================================================

      $mid           = $xoopsModule->mid();

        // create admin checkbox
        foreach ($group_list as $group_id => $group_name) {
            if ($group_id == XOOPS_GROUP_ADMIN) {
                $group_id_admin   = $group_id;
                $group_name_admin = $group_name;
            }
        }

        $select_perm_admin = new XoopsFormCheckBox("", "admin", XOOPS_GROUP_ADMIN);
        $select_perm_admin->addOption($group_id_admin, $group_name_admin);
        $select_perm_admin->setExtra("disabled='disabled'");

        // ********************************************************
        // permission view items
        $cat_gperms_read     = & $gperm_handler->getGroupIds('xoalbum_view', $this->targetObject->getVar("picture_id"), $mid);
        $arr_cat_gperms_read = $this->targetObject->isNew() ? "0" : $cat_gperms_read;

        $perms_tray = new XoopsFormElementTray(_AM_XOALBUM_PERMISSIONS_VIEW, '');
        // checkbox webmaster
        $perms_tray->addElement($select_perm_admin, false);
        // checkboxes other groups
        $select_perm = new XoopsFormCheckBox("", "cat_gperms_read", $arr_cat_gperms_read);
        foreach ($group_list as $group_id => $group_name) {
            if ($group_id != XOOPS_GROUP_ADMIN) {
                $select_perm->addOption($group_id, $group_name);
            }
        }
        $perms_tray->addElement($select_perm, false);
        $this->addElement($perms_tray, false);
        unset($perms_tray);
        unset($select_perm);

        // ********************************************************
        // permission submit item
        $cat_gperms_create     =& $gperm_handler->getGroupIds('xoalbum_submit', $this->targetObject->getVar("picture_id"), $mid);
        $arr_cat_gperms_create = $this->targetObject->isNew() ? "0" : $cat_gperms_create;

        $perms_tray = new XoopsFormElementTray(_AM_XOALBUM_PERMISSIONS_SUBMIT, '');
        // checkbox webmaster
        $perms_tray->addElement($select_perm_admin, false);
        // checkboxes other groups
        $select_perm = new XoopsFormCheckBox("", "cat_gperms_create", $arr_cat_gperms_create);
        foreach ($group_list as $group_id => $group_name) {
            if ($group_id != XOOPS_GROUP_ADMIN && $group_id != XOOPS_GROUP_ANONYMOUS) {
                $select_perm->addOption($group_id, $group_name);
            }
        }
        $perms_tray->addElement($select_perm, false);
        $this->addElement($perms_tray, false);
        unset($perms_tray);
        unset($select_perm);

        // ********************************************************
        // permission approve items
        $cat_gperms_admin     =& $gperm_handler->getGroupIds('xoalbum_approve', $this->targetObject->getVar("picture_id"), $mid);
        $arr_cat_gperms_admin = $this->targetObject->isNew() ? "0" : $cat_gperms_admin;

        $perms_tray = new XoopsFormElementTray(_AM_XOALBUM_PERMISSIONS_APPROVE, '');
        // checkbox webmaster
        $perms_tray->addElement($select_perm_admin, false);
        // checkboxes other groups
        $select_perm = new XoopsFormCheckBox("", "cat_gperms_admin", $arr_cat_gperms_admin);
        foreach ($group_list as $group_id => $group_name) {
            if ($group_id != XOOPS_GROUP_ADMIN && $group_id != XOOPS_GROUP_ANONYMOUS) {
                $select_perm->addOption($group_id, $group_name);
            }
        }
        $perms_tray->addElement($select_perm, false);
        $this->addElement($perms_tray, false);
        unset($perms_tray);
        unset($select_perm);

//=========================================================================        
		$this->addElement(new XoopsFormHidden('op', 'save'));
        $this->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
