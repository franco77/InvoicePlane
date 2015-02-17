<script type="text/javascript">
    $(function()
    {
        $('#btn_generate_cron_key').click(function()
        {
            $.post("<?php echo site_url('settings/ajax/get_cron_key'); ?>", function(data) {
                $('#cron_key').val(data);
            });
        });
    });
	
	// Update check moved to partial_settings_updates.php!
</script>

<div class="tab-info">

	<div class="form-group">
		<label for="settings[default_language]" class="control-label">
			<?php echo lang('language'); ?>
		</label>
		<select name="settings[default_language]" class="input-sm form-control">
			<?php foreach ($languages as $language) { ?>
			<option value="<?php echo $language; ?>" <?php if ($this->mdl_settings->setting('default_language') == $language) { ?>selected="selected"<?php } ?>><?php echo ucfirst($language); ?></option>
			<?php } ?>
		</select>
	</div>

    <div class="form-group">
		<label for="settings[default_country]" class="control-label">
			<?php echo lang('default_country'); ?>
		</label>
		<select name="settings[default_country]" class="input-sm form-control">
			<option></option>
			<?php foreach ($countries as $cldr => $country) { ?>
				<option value="<?php echo $cldr; ?>" <?php if ($this->mdl_settings->setting('default_country') == $cldr) { ?>selected="selected"<?php } ?>><?php echo $country ?></option>
			<?php } ?>
		</select>
    </div>

	<div class="form-group">
		<label for="settings[date_format]" class="control-label">
			<?php echo lang('date_format'); ?>
		</label>
		<select name="settings[date_format]" class="input-sm form-control">
			<?php foreach ($date_formats as $date_format) { ?>
			<option value="<?php echo $date_format['setting']; ?>" <?php if ($this->mdl_settings->setting('date_format') == $date_format['setting']) { ?>selected="selected"<?php } ?>><?php echo $current_date->format($date_format['setting']); ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label class="control-label">
			<?php echo lang('currency_symbol'); ?>
		</label>
		<input type="text" name="settings[currency_symbol]" class="input-sm form-control"
			   value="<?php echo $this->mdl_settings->setting('currency_symbol'); ?>">
	</div>
	
	<div class="form-group">
		<label for="settings[currency_symbol_placement]" class="control-label">
			<?php echo lang('currency_symbol_placement'); ?>
		</label>
		<select name="settings[currency_symbol_placement]" class="input-sm form-control">
			<option value="before" <?php if ($this->mdl_settings->setting('currency_symbol_placement') == 'before') { ?>selected="selected"<?php } ?>><?php echo lang('before_amount'); ?></option>
			<option value="after" <?php if ($this->mdl_settings->setting('currency_symbol_placement') == 'after') { ?>selected="selected"<?php } ?>><?php echo lang('after_amount'); ?></option>
		</select>
	</div>
    
	<div class="form-group">
		<label for="settings[thousands_separator]" class="control-label">
			<?php echo lang('thousands_separator'); ?>
		</label>
		<input type="text" name="settings[thousands_separator]" class="input-sm form-control"
			   value="<?php echo $this->mdl_settings->setting('thousands_separator'); ?>">
	</div>
    
	<div class="form-group">
		<label for="settings[decimal_point]" class="control-label">
			<?php echo lang('decimal_point'); ?>
		</label>
		<input type="text" name="settings[decimal_point]" class="input-sm form-control"
			   value="<?php echo $this->mdl_settings->setting('decimal_point'); ?>">
	</div>
    
	<div class="form-group">
		<label class="control-label">
			<?php echo lang('tax_rate_decimal_places'); ?>
		</label>
		<select name="settings[tax_rate_decimal_places]" class="input-sm form-control"
				id="tax_rate_decimal_places">
			<option value="2" <?php if ($this->mdl_settings->setting('tax_rate_decimal_places') == '2') { ?>selected="selected"<?php } ?>>2</option>
			<option value="3" <?php if ($this->mdl_settings->setting('tax_rate_decimal_places') == '3') { ?>selected="selected"<?php } ?>>3</option>
		</select>
	</div>

    <div class="form-group">
		<label class="control-label">
			<?php echo lang('custom_title'); ?>
		</label>
		<input type="text" name="settings[custom_title]" class="input-sm form-control"
               value="<?php echo $this->mdl_settings->setting('custom_title'); ?>">
    </div>

    <div class="form-group">
		<label class="control-label">
			<?php echo lang('disable_sidebar'); ?>
		</label>
		<select name="settings[disable_sidebar]" class="input-sm form-control"
				id="disable_sidebar">
			<option value="0" <?php if (!$this->mdl_settings->setting('disable_sidebar')) { ?>selected="selected"<?php } ?>><?php echo lang('no'); ?></option>
			<option value="1" <?php if ($this->mdl_settings->setting('disable_sidebar')) { ?>selected="selected"<?php } ?>><?php echo lang('yes'); ?></option>
		</select>
    </div>

	<div class="form-group">
		<label class="control-label">
			<?php echo lang('monospaced_font_for_amounts'); ?>
		</label>
		<p>
			<?php echo lang('example'); ?>:
			<span style="font-family: Monaco, Lucida Console, monospace">
				<?php echo format_currency(123456.78); ?>
			</span>
		</p>
		<select name="settings[monospace_amounts]" class="input-sm form-control"
				id="monospace_amounts">
			<option value="0" ><?php echo lang('no'); ?></option>
			<option value="1" <?php if ($this->mdl_settings->setting('monospace_amounts') == 1) { ?>selected="selected"<?php } ?>><?php echo lang('yes'); ?></option>
		</select>
	</div>
    
	<div class="form-group">
		<label for="settings[cron_key]" class="control-label">
			<?php echo lang('cron_key'); ?>
		</label>
		<div class="row">
			<div class="col-xs-8 col-sm-9">
				<input type="text" name="settings[cron_key]" id="cron_key"
					   class="input-sm form-control"
					   value="<?php echo $this->mdl_settings->setting('cron_key'); ?>">
			</div>
			<div class="col-xs-4 col-sm-3">
				<input id="btn_generate_cron_key" value="<?php echo lang('generate'); ?>"
					   type="button" class="btn btn-primary btn-sm btn-block">
			</div>
		</div>
	</div>
    
	<div class="form-group">
		<label class="control-label">
			<?php echo lang('login_logo'); ?>
		</label>
		<?php if ($this->mdl_settings->setting('login_logo')) { ?>
		<img src="<?php echo base_url(); ?>uploads/<?php echo $this->mdl_settings->setting('login_logo'); ?>"><br>
		<?php echo anchor('settings/remove_logo/login', 'Remove Logo'); ?><br>
		<?php } ?>
		<input type="file" name="login_logo" size="40" class="input-sm form-control"/>
	</div>

</div>