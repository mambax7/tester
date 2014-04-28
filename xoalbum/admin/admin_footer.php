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
 * @version         $Id: 2.10 admin_footer.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

echo "<div class='center'><a href='http://www.xoops.org' title='Visit XOOPS' target='_blank'>
         <img src='".$sysPathIcon32."/xoopsmicrobutton.gif' alt='XOOPS' /></a></div>";
echo "<div class='center smallsmall italic pad5'>
          <strong>" . $xoopsModule->getVar('name') . "</strong> "._AM_XOALBUM_MAINTAINEDBY."
            <a href='http://xoops.org/modules/newbb' title='Visit Support Forum' class='tooltip' rel='external'>Support Forum</a></div>";
xoops_cp_footer();
