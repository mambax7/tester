<{include file="db:xoalbum_header.tpl"}>
<div class="outer">
<div id="pagenav"><{$pagenav}></div>
    <table class="grid" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
          <th class="center"><{$smarty.const._MA_XOALBUM_GRID_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_GRID_UID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_GRID_TITLE}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_GRID_DATA}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_GRID_DATE}></th>
        <th class="center"><{$smarty.const._MA_XOALBUM_ACTION}></th>
            </tr>
        <{foreach item=grid from=$grid}>
            <tr class="<{cycle values='odd, even'}>">
                   <td class="center"><{$grid.grid_id}></td>
                   <td class="center"><{$grid.grid_uid}></td>
                   <td class="center"><{$grid.picture_id}></td>
                   <td class="center"><{$grid.grid_title}></td>
                   <td class="center"><{$grid.grid_data}></td>
                   <td class="center"><{$grid.grid_date}></td>
                               <td class="center">
                       <a href="category.php?op=view&grid_id=<{$grid.grid_id}>" title="<{$smarty.const._VIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._VIEW}>" title="<{$smarty.const._VIEW}>"</a>    &nbsp;
                       <{if $xoops_isadmin == true}>
                       <a href="admin/grid.php?op=edit&grid_id=<{$grid.grid_id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>" /></a>
                       &nbsp;<a href="admin/grid.php?op=delete&grid_id=<{$grid.grid_id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                       <{/if}>
                   </td>
                </tr>
        <{/foreach}>
    </table>
</div>
    <{$commentsnav}> <{$lang_notice}>
    <{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.html"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.html"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.html"}> <{/if}>
<{include file="db:xoalbum_footer.tpl"}>
