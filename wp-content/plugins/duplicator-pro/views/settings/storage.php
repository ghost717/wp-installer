<?php
/* @var $global DUP_PRO_Global_Entity */
defined("ABSPATH") or die("");

$nonce_action		= 'duppro-settings-storage-edit';
$action_updated		= null;
$action_response	= DUP_PRO_U::__("Storage Settings Saved");

$global = DUP_PRO_Global_Entity::get_instance();
$global->configure_dropbox_transfer_mode();

//SAVE RESULTS
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save') {
	check_admin_referer($nonce_action);
	$global->storage_htaccess_off			 = isset($_REQUEST['_storage_htaccess_off']) ? 1 : 0;
	$global->dropbox_upload_chunksize_in_kb	 = $_REQUEST['dropbox_upload_chunksize_in_kb'];
	$global->dropbox_transfer_mode			 = $_REQUEST['dropbox_transfer_mode'];
	$global->max_storage_retries			 = (int) $_REQUEST['max_storage_retries'];
	$action_updated = $global->save();
}
?>

<form id="dup-settings-form" action="<?php echo self_admin_url('admin.php?page=' . DUP_PRO_Constants::$SETTINGS_SUBMENU_SLUG); ?>" method="post" data-parsley-validate>
<?php wp_nonce_field($nonce_action); ?>
<input type="hidden" name="action" value="save">
<input type="hidden" name="page"   value="<?php echo DUP_PRO_Constants::$SETTINGS_SUBMENU_SLUG ?>">
<input type="hidden" name="tab"   value="storage">

<?php if ($action_updated) : ?>
	<div class="notice notice-success is-dismissible dpro-wpnotice-box"><p><?php echo $action_response; ?></p></div>
<?php endif; ?>	

<!-- ===============================
GENERAL SETTINGS -->
<h3 class="title"><?php DUP_PRO_U::esc_html_e("General") ?> </h3>
<hr size="1" />
<table class="form-table">            
	<tr valign="top">
		<th scope="row"><label><?php DUP_PRO_U::esc_html_e("Storage"); ?></label></th>
		<td>
			<?php DUP_PRO_U::esc_html_e("Full Path"); ?>:
			<?php echo DUP_PRO_U::safePath(DUPLICATOR_PRO_SSDIR_PATH); ?><br/><br/>
			<input type="checkbox" name="_storage_htaccess_off" id="_storage_htaccess_off" <?php DUP_PRO_UI::echoChecked($global->storage_htaccess_off); ?> />
			<label for="_storage_htaccess_off"><?php DUP_PRO_U::esc_html_e("Disable .htaccess File In Storage Directory") ?> </label>
			<p class="description">
				<?php DUP_PRO_U::esc_html_e("Disable if issues occur when downloading installer/archive files."); ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><label><?php DUP_PRO_U::esc_html_e("Max Retries"); ?></label></th>
		<td>
			<input class="narrow-input"  type="text" name="max_storage_retries" id="max_storage_retries" data-parsley-required data-parsley-min="0" data-parsley-type="number" data-parsley-errors-container="#max_storage_retries_error_container" value="<?php echo $global->max_storage_retries; ?>" />
			<div id="max_storage_retries_error_container" class="duplicator-error-container"></div>
			<p class="description">
				<?php DUP_PRO_U::esc_html_e('Max upload/copy retries to attempt after failure encountered.'); ?>
			</p>
		</td>
	</tr>
</table>

<!-- ===============================
DROPBOX SETTINGS -->
<h3 class="title"><?php DUP_PRO_U::esc_html_e("Dropbox") ?> </h3>
<hr size="1" />
<table class="form-table">        
	<tr valign="top">
		<th scope="row"><label><?php DUP_PRO_U::esc_html_e("Transfer Mode"); ?></label></th>
		<td>
			<input type="radio" value="<?php echo DUP_PRO_Dropbox_Transfer_Mode::Disabled ?>" name="dropbox_transfer_mode" value="mysql" id="dropbox_transfer_mode" <?php echo DUP_PRO_UI::echoChecked($global->dropbox_transfer_mode == DUP_PRO_Dropbox_Transfer_Mode::Disabled); ?> >
			<label for="dropbox_transfer_mode"><?php DUP_PRO_U::esc_html_e("Disabled"); ?></label> &nbsp;

			<input type="radio" <?php DUP_PRO_UI::echoDisabled(!DUP_PRO_Server::isCurlEnabled()) ?> value="<?php echo DUP_PRO_Dropbox_Transfer_Mode::cURL ?>" name="dropbox_transfer_mode" value="mysql" id="dropbox_transfer_mode" <?php echo DUP_PRO_UI::echoChecked($global->dropbox_transfer_mode == DUP_PRO_Dropbox_Transfer_Mode::cURL); ?>/>
			<label for="dropbox_transfer_mode">cURL</label> &nbsp;

			<input type="radio" <?php DUP_PRO_UI::echoDisabled(!DUP_PRO_Server::isURLFopenEnabled()) ?> value="<?php echo DUP_PRO_Dropbox_Transfer_Mode::FOpen_URL ?>" name="dropbox_transfer_mode" value="mysql" id="dropbox_transfer_mode" <?php echo DUP_PRO_UI::echoChecked($global->dropbox_transfer_mode == DUP_PRO_Dropbox_Transfer_Mode::FOpen_URL); ?>/>
			<label for="dropbox_transfer_mode">FOpen URL</label> &nbsp;
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><label><?php DUP_PRO_U::esc_html_e("Upload Size (KB)"); ?></label></th>
		<td>
			<input class="narrow-input" type="text" name="dropbox_upload_chunksize_in_kb" id="dropbox_upload_chunksize_in_kb" data-parsley-required data-parsley-min="100" data-parsley-type="number" data-parsley-errors-container="#dropbox_upload_chunksize_in_kb_error_container" value="<?php echo esc_attr($global->dropbox_upload_chunksize_in_kb); ?>" />
			<div id="dropbox_upload_chunksize_in_kb_error_container" class="duplicator-error-container"></div>
			<p class="description">
				<?php DUP_PRO_U::esc_html_e('How much should be uploaded to Dropbox per attempt. Higher=faster but less reliable.'); ?>
			</p>
		</td>
	</tr>
</table>

<p class="submit dpro-save-submit">
	<input type="submit" name="submit" id="submit" class="button-primary" value="<?php DUP_PRO_U::esc_attr_e('Save Storage Settings') ?>" style="display: inline-block;" />
</p>
</form>