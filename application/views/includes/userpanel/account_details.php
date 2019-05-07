<?php $this->load->view('includes/header'); ?>
<br>
<div class="container">
	
<div class="row">
	<style>

	</style>
  <div class="span3">
<?php $this->load->view('includes/userpanel/left_nav'); ?>
  </div>
  <div class="span9">
		<!-- ACCOUNT DETAILS -->
		<h1 class="title"><span>My account</span></h1>
		<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

			
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_first_name">First name&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="">
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="account_last_name">Last name&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="">
			</p>
			<div class="clear"></div>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_display_name">Display name&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="qaisark787"> 
				<span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
			</p>
			<div class="clear"></div>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_email">Email address&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="qaisark787@gmail.com">
			</p>

			<fieldset>
				<legend>Password change</legend>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_current">Current password (leave blank to leave unchanged)</label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off">
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_1">New password (leave blank to leave unchanged)</label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off">
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_2">Confirm new password</label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off">
				</p>
			</fieldset>
			<div class="clear"></div>

			
			<p>
				<input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="ec68cd8055"><input type="hidden" name="_wp_http_referer" value="/demos/2/electron01/my-account/edit-account/">		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
				<input type="hidden" name="action" value="save_account_details">
			</p>

		</form>
		<!-- ../ ACCOUNT DETAILS -->
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>