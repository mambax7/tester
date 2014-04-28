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
 * @version         $Id: 2.10 helper.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * Class XoalbumHelper
 */
class XoalbumHelper   /*extends Xoalbum_Module_Helper_Abstract*/
{
    /**
     * Init vars
     * @initialize variables
     */
    private $_config;
    private $_dirname;
    private $_handler;
    private $_module;

    /**
     * Constructor
     *
     * @param $dirname
     */
    function __construct($dirname = '')
    {
        $this->_dirname = $dirname;
    }

    /**
     * Get instance
     * @return object
     */
    function &getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Init config
     * @initialize object
     */
    function initConfig()
    {
        $modConfigHandler = xoops_gethandler('config');
        $this->_config = $modConfigHandler->getConfigsByCat(0, $this->getModule()->getVar('mid'));
    }

    /**
     * Init module
     * @initialize object
     */
    function initModule()
    {
        global $xoopsModule;
        if (isset($xoopsModule) && is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $this->_dirname) {
            $this->_module = $xoopsModule;
        } else {
            $module_handler = xoops_gethandler('module');
            $this->_module = $module_handler->getByDirname($this->_dirname);
        }
    }

    /**
     * Init handler
     * @initialize object
     */
    function initHandler($name)
    {
        $this->handler[$name . '_handler'] = xoops_getmodulehandler($name, $this->_dirname);
    }

    /**
     * Get module
     * @return object
     */
    function &getModule()
    {
        if ($this->_module == null) {
            $this->initModule();
        }

        return $this->_module;
    }

    /**
     * Get modules
     *
     * @param array $dirnames
     * @param null  $otherCriteria
     * @param bool  $asObj
     *
     * @return array objects
     */
    function &getModules($dirnames = array(), $otherCriteria = null, $asObj = false)
    {
        // get all dirnames
        $module_handler = xoops_gethandler('module');
        $criteria = new CriteriaCompo();
        if (count($dirnames) > 0) {
            foreach ($dirnames as $mDir) {
                $criteria->add(new Criteria('dirname', $mDir), 'OR');
            }
        }
        if (!empty($otherCriteria)) {
            $criteria->add($otherCriteria);
        }
        $criteria->add(new Criteria('isactive', 1), 'AND');
        $modules = $module_handler->getObjects($criteria, true);
        if($asObj) return $modules;
        $dirs['system-root'] = _YOURHOME;
        foreach ($modules as $module) {
            $dirs[$module->dirname()] = $module->name();
        }

        return $dirs;
    }

    /**
     * Get handler
     *
     * @param $name
     *
     * @return object
     */
    function &getHandler($name)
    {
        if (!isset($this->handler[$name . '_handler'])) {
            $this->initHandler($name);
        }

        return $this->handler[$name . '_handler'];
    }
}