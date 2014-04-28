<table class="outer">
    <tr class="head">
		<th><{$smarty.const._MB_XOALBUM_PICTURE_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_UID}></th>
		<th><{$smarty.const._MB_XOALBUM_ALBUM_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_NAME}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_DESC}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_FILENAME}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_FILETYPE}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_THUMBFIRST}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_THUMBSECOND}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_SIZE}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_DATELINE}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_COMMENTS}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_DOWNLOADS}></th>
	</tr>
    <{foreachq item=picture from=$picture}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
			<{$picture.picture_id}>
			<{$picture.picture_uid}>
			<{$picture.album_id}>
			<{$picture.picture_name}>
			<{$picture.picture_desc}>
			<{$picture.picture_filename}>
			<{$picture.picture_filetype}>
			<{$picture.picture_thumbfirst}>
			<{$picture.picture_thumbsecond}>
			<{$picture.picture_size}>
			<{$picture.picture_dateline}>
			<{$picture.picture_comments}>
			<{$picture.picture_downloads}>
			</td>
        </tr>
    <{/foreachq}>
</table>