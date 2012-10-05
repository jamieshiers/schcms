<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Module name', 'module_name'); ?>

			<div class="input">
				<?php echo Form::input('module_name', Input::post('module_name', isset($module) ? $module->module_name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Page id', 'page_id'); ?>

			<div class="input">
				<?php echo Form::input('page_id', Input::post('page_id', isset($module) ? $module->page_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>