<div class="header">
<span class="left"><b><{$smarty.const._MA_XOALBUM_TITLE}></b>&#58;&#160;</span>
<span class="left"><{$smarty.const._MA_XOALBUM_DESC}></span><br />
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<table class="outer xoalbum" cellspacing="2" cellpadding="2">
    <thead>
          <tr class="center" colspan="2">
          <th><{$smarty.const._MA_XOALBUM_TITLE}>  -  <{$smarty.const._MA_XOALBUM_DESC}></th>
          </tr>
    </thead>
    <tbody>
        <tr class="center">
            <td class="center bold pad5">
                <ul class="menu center fields">
                <li><a href="<{$xoalbum_url}>"><{$smarty.const._MA_XOALBUM_INDEX}></a></li>

			<li> | </li>

			<li><a href="<{$xoalbum_url}>/album.php"><{$smarty.const._MA_XOALBUM_ALBUM}></a></li>
			<li> | </li>

			<li><a href="<{$xoalbum_url}>/grid.php"><{$smarty.const._MA_XOALBUM_GRID}></a></li>
			<li> | </li>

			<li><a href="<{$xoalbum_url}>/category.php"><{$smarty.const._MA_XOALBUM_CATEGORY}></a></li>
			<li> | </li>

			<li><a href="<{$xoalbum_url}>/picture.php"><{$smarty.const._MA_XOALBUM_PICTURE}></a></li>                </ul>
            </td>
        </tr>
        <{if $adv != ''}>
        <tr class="center"><td class="center bold pad5"><{$adv}></td></tr>
        <{else}>
        <tr class="center"><td class="center bold pad5">&nbsp;</td></tr>
        <{/if}>
    </tbody>
</table>