<table class="outer">
    <tr class="head">
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_ID}></th>
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_NAME}></th>
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_TOTAL}></th>
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_ORDER}></th>
		<th><{$smarty.const._MB_XOALBUM_CATEGORY_DATELINE}></th>
	</tr>
    <{foreachq item=category from=$category}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
			<{$category.category_id}>
			<{$category.category_name}>
			<{$category.category_total}>
			<{$category.category_order}>
			<{$category.category_dateline}>
			</td>
        </tr>
    <{/foreachq}>
</table>