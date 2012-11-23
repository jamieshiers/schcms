<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Alert name', 'alert_name'); ?>

			<div class="input">
				<?php echo Form::input('alert_name', Input::post('alert_name', isset($alert) ? $alert->alert_name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Alert desc', 'alert_desc'); ?>

			<div class="input">
				<?php echo Form::textarea('alert_desc', Input::post('alert_desc', isset($alert) ? $alert->alert_desc : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Alert type', 'alert_type'); ?>

			<div class="input">
				<?php echo Form::input('alert_type', Input::post('alert_type', isset($alert) ? $alert->alert_type : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Alert expires', 'alert_expires'); ?>

			<div class="input">
				<?php echo Form::input('alert_expires', Input::post('alert_expires', isset($alert) ? $alert->alert_expires : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Active', 'active'); ?>

			<div class="input">
				<?php echo Form::input('active', Input::post('active', isset($alert) ? $alert->active : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>