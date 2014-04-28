<{include file="db:xoalbum_header.tpl"}>
<div class="outer">
<div id="pagenav"><{$pagenav}></div>
    <table class="picture" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_UID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_ALBUM_ID}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_NAME}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_DESC}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_FILENAME}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_FILETYPE}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_THUMBFIRST}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_THUMBSECOND}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_SIZE}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_DATELINE}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_COMMENTS}></th>
          <th class="center"><{$smarty.const._MA_XOALBUM_PICTURE_DOWNLOADS}></th>
        <th class="center"><{$smarty.const._MA_XOALBUM_ACTION}></th>
            </tr>
        <{foreach item=picture from=$picture}>
            <tr class="<{cycle values='odd, even'}>">
                   <td class="center"><{$picture.picture_id}></td>
                   <td class="center"><{$picture.picture_uid}></td>
                   <td class="center"><{$picture.album_id}></td>
                   <td class="center"><{$picture.picture_name}></td>
                   <td class="center"><{$picture.picture_desc}></td>
                   <td class="center"><{$picture.picture_filename}></td>
                   <td class="center"><{$picture.picture_filetype}></td>
                   <td class="center"><{$picture.picture_thumbfirst}></td>
                   <td class="center"><{$picture.picture_thumbsecond}></td>
                   <td class="center"><{$picture.picture_size}></td>
                   <td class="center"><{$picture.picture_dateline}></td>
                   <td class="center"><{$picture.picture_comments}></td>
                   <td class="center"><{$picture.picture_downloads}></td>
                               <td class="center">
                       <a href="category.php?op=view&picture_id=<{$picture.picture_id}>" title="<{$smarty.const._VIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._VIEW}>" title="<{$smarty.const._VIEW}>"</a>    &nbsp;
                       <{if $xoops_isadmin == true}>
                       <a href="admin/picture.php?op=edit&picture_id=<{$picture.picture_id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>" /></a>
                       &nbsp;<a href="admin/picture.php?op=delete&picture_id=<{$picture.picture_id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                       <{/if}>
                   </td>
                </tr>
        <{/foreach}>
    </table>
</div>
    <{$commentsnav}> <{$lang_notice}>
    <{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.html"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.html"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.html"}> <{/if}>
<{include file="db:xoalbum_footer.tpl"}>
