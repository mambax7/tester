<table class="outer">
    <tr class="head">
		<th><{$smarty.const._MB_XOALBUM_ALBUM_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_UID}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_NAME}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_DESC}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_TOTAL}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_COVER}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_VIEWS}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_STATUS}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_DATELINE}></th>
	</tr>
    <{foreachq item=album from=$album}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
			<{$album.album_id}>
			<{$album.category_id}>
			<{$album.album_uid}>
			<{$album.album_name}>
			<{$album.album_desc}>
			<{$album.album_total}>
			<{$album.album_cover}>
			<{$album.album_views}>
			<{$album.album_status}>
			<{$album.album_dateline}>
			</td>
        </tr>
    <{/foreachq}>
</table>