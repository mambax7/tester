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

/**
 * Class XoalbumPicture
 */
class XoalbumPicture extends XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    function __construct()
    {
        $this->XoopsObject();
        $this->initVar('picture_id', XOBJ_DTYPE_INT);
        $this->initVar('picture_uid', XOBJ_DTYPE_INT);
        $this->initVar('album_id', XOBJ_DTYPE_INT);
        $this->initVar('picture_name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_desc', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_filename', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_filetype', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_thumbfirst', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_thumbsecond', XOBJ_DTYPE_TXTBOX);
        $this->initVar('picture_size', XOBJ_DTYPE_INT);
        $this->initVar('picture_dateline', XOBJ_DTYPE_INT);
        $this->initVar('picture_comments', XOBJ_DTYPE_INT);
        $this->initVar('picture_downloads', XOBJ_DTYPE_INT);
     }

    /**
     * Get form
     *
     * @param null
     * @return XoalbumPictureForm
     */
    function getForm()
    {
         include_once XOOPS_ROOT_PATH . '/modules/xoalbum/class/form/picture.php';

        $form = new XoalbumPictureForm ($this);
        return $form;

    }
}

        /**
         * Class XoalbumPictureHandler
         */
class XoalbumPictureHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param string $db
     *
     * @param null|object $db
     */
    function __construct(&$db)
    {
        parent::__construct($db, 'xoalbum_picture', 'XoalbumPicture', 'picture_id', 'picture_name');
    }
}
