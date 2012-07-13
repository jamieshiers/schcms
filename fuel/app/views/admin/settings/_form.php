<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Setting name', 'setting_name'); ?>

			<div class="input">
				<?php echo Form::input('setting_name', Input::post('setting_name', isset($setting) ? $setting->setting_name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Setting value', 'setting_value'); ?>

			<div class="input">
				<?php echo Form::input('setting_value', Input::post('setting_value', isset($setting) ? $setting->setting_value : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>