<{include file="db:xoalbum_header.tpl"}>
<div class="outer">
<div id="pagenav"><{$pagenav}></div>
    <table class="category" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_NAME}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_TOTAL}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_ORDER}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_DATELINE}></th>
        <th class="center"><{$smarty.const._MA_XOALBUM_ACTION}></th>
            </tr>
        <{foreach item=category from=$category}>
            <tr class="<{cycle values='odd, even'}>">
                   <td class="center"><{$category.category_id}></td>
                   <td class="center"><{$category.category_name}></td>
                   <td class="center"><{$category.category_total}></td>
                   <td class="center"><{$category.category_order}></td>
                   <td class="center"><{$category.category_dateline}></td>
                               <td class="center">
                       <a href="category.php?op=view&category_id=<{$category.category_id}>" title="<{$smarty.const._VIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._VIEW}>" title="<{$smarty.const._VIEW}>"</a>    &nbsp;
                       <{if $xoops_isadmin == true}>
                       <a href="admin/category.php?op=edit&category_id=<{$category.category_id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>" /></a>
                       &nbsp;<a href="admin/category.php?op=delete&category_id=<{$category.category_id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                       <{/if}>
                   </td>
                </tr>
        <{/foreach}>
    </table>
</div>
    <{$commentsnav}> <{$lang_notice}>
    <{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.html"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.html"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.html"}> <{/if}>
<{include file="db:xoalbum_footer.tpl"}>
