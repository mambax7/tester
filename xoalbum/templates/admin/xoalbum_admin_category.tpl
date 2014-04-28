

<{if $categoryRows > 0}>
    <div class="outer">
         <form name="select" action="category.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('category_id[]');} else if (isOneChecked('category_id[]')) {return true;} else {alert('<{$smarty.const._AM_CATEGORY_SELECTED_ERROR}>'); return false;}">
            <input type="hidden" name="confirm" value="1"/>
            <div class="floatleft">
           		<select name="op">
           			<option value=""><{$smarty.const._AM_XOALBUM_SELECT}></option>
           			<option value="delete"><{$smarty.const._AM_XOALBUM_SELECTED_DELETE}></option>
           		</select>
           		<input id="submitUp" class="formButton" type="submit" name="submitselect" value="<{$smarty.const._SUBMIT}>" title="<{$smarty.const._SUBMIT}>"  />
           	</div>
            <div class="floatcenter0">
                <div id="pagenav"><{$pagenav}></div>
            </div>



          <table class="$category" cellpadding="0" cellspacing="0" width="100%">
            <tr><th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_TOTAL}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_ORDER}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_DATELINE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<{foreach item=categoryArray from=$categoryArrays}>
<tr class="<{cycle values="odd,even"}>">

<td align="center" style="vertical-align:middle;"><input type="checkbox" name="category_id[]" id="category_id[]" value="<{$categoryArray.category_id}>" /></td>
<td class='center'><{$categoryArray.category_id}></td>
<td class='center'><{$categoryArray.category_name}></td>
<td class='center'><{$categoryArray.category_total}></td>
<td class='center'><{$categoryArray.category_order}></td>
<td class='center'><{$categoryArray.category_dateline}></td>


<td class="center width5"><{$categoryArray.edit_delete}></td>
</tr>
<{/foreach}>
</table>
<br/>
<br/>
<{else}>
<table width="100%" cellspacing="1" class="outer">
<tr>

<th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_TOTAL}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_ORDER}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_CATEGORY_DATELINE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<tr>
<td class="errorMsg" colspan="11">There are no $category</td>
</tr>
</table>
</div>
<br/>
<br/>
<{/if}>
