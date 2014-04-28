<{if $bookmarks != 0}>
<{include file="db:system_bookmarks.html"}>
<{/if}>

<{if $fbcomments != 0}>
<{include file="db:system_fbcomments.html"}>
<{/if}>

<div class="left"><{$copyright}></div>
<{if $xoops_isadmin}>
   <div class="center bold"><a href="<{$admin}>"><{$smarty.const._MA_XOALBUM_ADMIN}></a></div>
<{/if}>
<div class="pad2 marg2">
    <{if $comment_mode == "flat"}>
        <{include file="db:system_comments_flat.html"}>
    <{elseif $comment_mode == "thread"}>
        <{include file="db:system_comments_thread.html"}>
    <{elseif $comment_mode == "nest"}>
        <{include file="db:system_comments_nest.html"}>
    <{/if}>
</div>
<{include file='db:system_notification_select.html'}>