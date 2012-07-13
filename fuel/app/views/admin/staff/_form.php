<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($staff) ? $staff->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('First name', 'first_name'); ?>

			<div class="input">
				<?php echo Form::input('first_name', Input::post('first_name', isset($staff) ? $staff->first_name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Surname', 'surname'); ?>

			<div class="input">
				<?php echo Form::input('surname', Input::post('surname', isset($staff) ? $staff->surname : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Job title', 'job_title'); ?>

			<div class="input">
				<?php echo Form::input('job_title', Input::post('job_title', isset($staff) ? $staff->job_title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Img', 'img'); ?>

			<div class="input">
				<?php echo Form::input('img', Input::post('img', isset($staff) ? $staff->img : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>