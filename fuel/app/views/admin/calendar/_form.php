<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($calendar) ? $calendar->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Allday', 'allday'); ?>

			<div class="input">
				<?php echo Form::input('allday', Input::post('allday', isset($calendar) ? $calendar->allday : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Start', 'start'); ?>

			<div class="input">
				<?php echo Form::input('start', Input::post('start', isset($calendar) ? $calendar->start : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('End', 'end'); ?>

			<div class="input">
				<?php echo Form::input('end', Input::post('end', isset($calendar) ? $calendar->end : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Editable', 'editable'); ?>

			<div class="input">
				<?php echo Form::input('editable', Input::post('editable', isset($calendar) ? $calendar->editable : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Url', 'url'); ?>

			<div class="input">
				<?php echo Form::input('url', Input::post('url', isset($calendar) ? $calendar->url : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>