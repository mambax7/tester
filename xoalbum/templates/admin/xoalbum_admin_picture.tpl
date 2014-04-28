

<{if $pictureRows > 0}>
    <div class="outer">
         <form name="select" action="picture.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('picture_id[]');} else if (isOneChecked('picture_id[]')) {return true;} else {alert('<{$smarty.const._AM_PICTURE_SELECTED_ERROR}>'); return false;}">
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



          <table class="$picture" cellpadding="0" cellspacing="0" width="100%">
            <tr><th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURED}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DESC}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_FILENAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_FILETYPE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_THUMBFIRST}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_THUMBSECOND}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_SIZE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DATELINE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_COMMENTS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DOWNLOADS}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<{foreach item=pictureArray from=$pictureArrays}>
<tr class="<{cycle values="odd,even"}>">

<td align="center" style="vertical-align:middle;"><input type="checkbox" name="picture_id[]" id="picture_id[]" value="<{$pictureArray.picture_id}>" /></td>
<td class='center'><{$pictureArray.picture_id}></td>
<td class='center'><{$pictureArray.picture_uid}></td>
<td class='center'><{$pictureArray.album_id}></td>
<td class='center'><{$pictureArray.picture_name}></td>
<td class='center'><{$pictureArray.picture_desc}></td>
<td class='center'><{$pictureArray.picture_filename}></td>
<td class='center'><{$pictureArray.picture_filetype}></td>
<td class='center'><{$pictureArray.picture_thumbfirst}></td>
<td class='center'><{$pictureArray.picture_thumbsecond}></td>
<td class='center'><{$pictureArray.picture_size}></td>
<td class='center'><{$pictureArray.picture_dateline}></td>
<td class='center'><{$pictureArray.picture_comments}></td>
<td class='center'><{$pictureArray.picture_downloads}></td>


<td class="center width5"><{$pictureArray.edit_delete}></td>
</tr>
<{/foreach}>
</table>
<br/>
<br/>
<{else}>
<table width="100%" cellspacing="1" class="outer">
<tr>

<th align="center" width="5%"><input name="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" value="Check All" /></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_ID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_UID}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURED}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_NAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DESC}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_FILENAME}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_FILETYPE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_THUMBFIRST}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_THUMBSECOND}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_SIZE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DATELINE}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_COMMENTS}></th>
<th class='center'><{$smarty.const._AM_XOALBUM_PICTURE_DOWNLOADS}></th>

<th class="center width5"><{$smarty.const._AM_XOALBUM_FORM_ACTION}></th>
</tr>
<tr>
<td class="errorMsg" colspan="11">There are no $picture</td>
</tr>
</table>
</div>
<br/>
<br/>
<{/if}>
