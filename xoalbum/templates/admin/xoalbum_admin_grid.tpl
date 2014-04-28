

<{if $gridRows > 0}>
    <div class="outer">
         <form name="select" action="grid.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('grid_id[]');} else if (isOneChecked('grid_id[]')) {return true;} else {alert('<{$smarty.const._AM_GRID_SELECTED_ERROR}>'); return false;}">
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



          <table class="$grid" cellpadding="0" cellspacing="0" width="100%">
            <tr><th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRIDURE_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_TITLE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_DATA}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_DATE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<{foreach item=gridArray from=$gridArrays}>
<tr class="<{cycle values="odd,even"}>">

<td align="center" style="vertical-align:middle;"><input type="checkbox" name="grid_id[]" id="grid_id[]" value="<{$gridArray.grid_id}>" /></td>
<td class='center'><{$gridArray.grid_id}></td>
<td class='center'><{$gridArray.grid_uid}></td>
<td class='center'><{$gridArray.picture_id}></td>
<td class='center'><{$gridArray.grid_title}></td>
<td class='center'><{$gridArray.grid_data}></td>
<td class='center'><{$gridArray.grid_date}></td>


<td class="center width5"><{$gridArray.edit_delete}></td>
</tr>
<{/foreach}>
</table>
<br/>
<br/>
<{else}>
<table width="100%" cellspacing="1" class="outer">
<tr>

<th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRIDURE_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_TITLE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_DATA}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_GRID_DATE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<tr>
<td class="errorMsg" colspan="11">There are no $grid</td>
</tr>
</table>
</div>
<br/>
<br/>
<{/if}>
