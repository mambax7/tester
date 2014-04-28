<table class="outer">
    <tr class="head">
		<th><{$smarty.const._MB_XOALBUM_GRID_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_GRID_UID}></th>
		<th><{$smarty.const._MB_XOALBUM_PICTURE_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_GRID_TITLE}></th>
		<th><{$smarty.const._MB_XOALBUM_GRID_DATA}></th>
		<th><{$smarty.const._MB_XOALBUM_GRID_DATE}></th>
	</tr>
    <{foreachq item=grid from=$grid}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
			<{$grid.grid_id}>
			<{$grid.grid_uid}>
			<{$grid.picture_id}>
			<{$grid.grid_title}>
			<{$grid.grid_data}>
			<{$grid.grid_date}>
			</td>
        </tr>
    <{/foreachq}>
</table>