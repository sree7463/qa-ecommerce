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
		<form method="post">
<style>
	h3 {
		margin-top: 0;
		font-size: 1.7142rem;
		font-weight: 400;
		margin-bottom: .7rem;
		font: normal 400 23.9988px hk-grotesk;
	}
	abbr[title], acronym[title] {
	  text-decoration: none;
	  border-bottom: none;
	}
	input.address_fn, input.input-text {
    height: 2.642rem;
    line-height: 2rem;
    padding: 0 1.07em;
    -webkit-appearance: none;
    background-color: #fff;
    outline: none;
    border-radius: 0;
    width: 100%;
    color: #222222;
    font-size: 1.14rem;
    box-shadow: none;
    font-family: hk-grotesk;
    box-shadow: none;
    outline: none;
    border: 1px solid #e1e1e1;
	}

	input.address_fn:focus,  input.input-text:focus {
		box-shadow: none;
    outline: none;
    border-color: #555555;
	}
	input#country {
		height: 2.642rem;
		border-radius: 0;
		font: normal 400 18px hk-grotesk;
		width: 100%;
		-webkit-box-shadow: inset 0 0 0 0, 0 0 0 00;
		-moz-box-shadow: inset 0 0 0 0,0 0 0 0;
		box-shadow: inset 0 0 0 0, 0 0 0 0;
		border-color: #e1e1e1;
	}
	input#country:focus {
		border-color: #555555;
		outline: 0;
		-webkit-box-shadow: inset 0 0 0 0, 0 0 0 00;
		-moz-box-shadow: inset 0 0 0 0,0 0 0 0;
		box-shadow: inset 0 0 0 0, 0 0 0 0;
	}

</style>
		<h1 class="title"><span>My account</span></h1>
		<h3>Shipping address</h3>
		<div class="woocommerce-address-fields">

		  <div class="woocommerce-address-fields__field-wrapper">
		    <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10"><label for="billing_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
		    	<input type="text" class="input-text address_fn" name="billing_first_name" id="billing_first_name" placeholder="" value="qaisar" autocomplete="given-name"></span></p>
		    <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20"><label for="billing_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="khan" autocomplete="family-name"></span></p>
		    <p class="form-row form-row-wide" id="billing_company_field" data-priority="30"><label for="billing_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="hello" autocomplete="organization"></span></p>
		    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40"><label for="billing_country" class="">Country&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
					<input type="text" id="country">
		    	<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Update country">Update country</button></noscript></span></p>
		    <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="hello" autocomplete="address-line1"></span></p>
		    <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60"><label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit etc.&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2"></span></p>
		    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70"><label for="billing_city" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="hello" autocomplete="address-level2"></span></p>
		    <!-- <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80">
		    	<label for="billing_state" class="">State / County&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><select name="billing_state" id="billing_state" class="state_select  select2-hidden-accessible" autocomplete="address-level1" data-placeholder="" tabindex="-1" aria-hidden="true">
		          <option value="">Select an option…</option>
		          <option value="JK" selected="selected">Azad Kashmir</option>
		          <option value="BA">Balochistan</option>
		          <option value="TA">FATA</option>
		          <option value="GB">Gilgit Baltistan</option>
		          <option value="IS">Islamabad Capital Territory</option>
		          <option value="KP">Khyber Pakhtunkhwa</option>
		          <option value="PB">Punjab</option>
		          <option value="SD">Sindh</option>
		        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_state-container" role="combobox"><span class="select2-selection__rendered" id="select2-billing_state-container" role="textbox" aria-readonly="true" title="Azad Kashmir">Azad Kashmir</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span></p> -->
		    <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90"><label for="billing_postcode" class="">Postcode / ZIP&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="42200" autocomplete="postal-code"></span></p>
		    <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone" class="">Phone&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="03340624048" autocomplete="tel"></span></p>
		    <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110"><label for="billing_email" class="">Email address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="qaisark787@gmail.com" autocomplete="email username"></span></p>
		  </div>


		  <p>
		    <button type="submit" class="button woocommerce-Button" name="save_address" value="Save address">Save address</button>
		    <input type="hidden" id="woocommerce-edit-address-nonce" name="woocommerce-edit-address-nonce" value="6a87efa07e"><input type="hidden" name="_wp_http_referer" value="/demos/2/electron01/my-account/edit-address/billing/"> <input type="hidden" name="action" value="edit_address">
		  </p>
		</div>

	</form>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>

