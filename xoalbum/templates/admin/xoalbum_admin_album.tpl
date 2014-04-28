

<{if $albumRows > 0}>
    <div class="outer">
         <form name="select" action="album.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('album_id[]');} else if (isOneChecked('album_id[]')) {return true;} else {alert('<{$smarty.const._AM_ALBUM_SELECTED_ERROR}>'); return false;}">
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



          <table class="$album" cellpadding="0" cellspacing="0" width="100%">
            <tr><th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUMORY_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_DESC}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_TOTAL}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_COVER}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_VIEWS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_STATUS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_DATELINE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<{foreach item=albumArray from=$albumArrays}>
<tr class="<{cycle values="odd,even"}>">

<td align="center" style="vertical-align:middle;"><input type="checkbox" name="album_id[]" id="album_id[]" value="<{$albumArray.album_id}>" /></td>
<td class='center'><{$albumArray.album_id}></td>
<td class='center'><{$albumArray.category_id}></td>
<td class='center'><{$albumArray.album_uid}></td>
<td class='center'><{$albumArray.album_name}></td>
<td class='center'><{$albumArray.album_desc}></td>
<td class='center'><{$albumArray.album_total}></td>
<td class='center'><{$albumArray.album_cover}></td>
<td class='center'><{$albumArray.album_views}></td>
<td class='center'><{$albumArray.album_status}></td>
<td class='center'><{$albumArray.album_dateline}></td>


<td class="center width5"><{$albumArray.edit_delete}></td>
</tr>
<{/foreach}>
</table>
<br/>
<br/>
<{else}>
<table width="100%" cellspacing="1" class="outer">
<tr>

<th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUMORY_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_DESC}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_TOTAL}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_COVER}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_VIEWS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_STATUS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_ALBUM_DATELINE}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<tr>
<td class="errorMsg" colspan="11">There are no $album</td>
</tr>
</table>
</div>
<br/>
<br/>
<{/if}>
