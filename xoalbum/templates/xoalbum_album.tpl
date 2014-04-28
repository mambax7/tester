<{include file="db:xoalbum_header.tpl"}>
<div class="outer">
<div id="pagenav"><{$pagenav}></div>
    <table class="album" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_CATEGORY_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_UID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_NAME}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_DESC}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_TOTAL}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_COVER}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_VIEWS}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_STATUS}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_DATELINE}></th>
        <th class="center"><{$smarty.const._MA_XOALBUM_ACTION}></th>
            </tr>
        <{foreach item=album from=$album}>
            <tr class="<{cycle values='odd, even'}>">
                   <td class="center"><{$album.album_id}></td>
                   <td class="center"><{$album.category_id}></td>
                   <td class="center"><{$album.album_uid}></td>
                   <td class="center"><{$album.album_name}></td>
                   <td class="center"><{$album.album_desc}></td>
                   <td class="center"><{$album.album_total}></td>
                   <td class="center"><{$album.album_cover}></td>
                   <td class="center"><{$album.album_views}></td>
                   <td class="center"><{$album.album_status}></td>
                   <td class="center"><{$album.album_dateline}></td>
                               <td class="center">
                       <a href="category.php?op=view&album_id=<{$album.album_id}>" title="<{$smarty.const._VIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._VIEW}>" title="<{$smarty.const._VIEW}>"</a>    &nbsp;
                       <{if $xoops_isadmin == true}>
                       <a href="admin/album.php?op=edit&album_id=<{$album.album_id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>" /></a>
                       &nbsp;<a href="admin/album.php?op=delete&album_id=<{$album.album_id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                       <{/if}>
                   </td>
                </tr>
        <{/foreach}>
    </table>
</div>
    <{$commentsnav}> <{$lang_notice}>
    <{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.html"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.html"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.html"}> <{/if}>
<{include file="db:xoalbum_footer.tpl"}>
