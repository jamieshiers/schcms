<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Parent id', 'parent_id'); ?>

			<div class="input">
				<?php echo Form::input('parent_id', Input::post('parent_id', isset($menu) ? $menu->parent_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Page id', 'page_id'); ?>

			<div class="input">
				<?php echo Form::input('page_id', Input::post('page_id', isset($menu) ? $menu->page_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($menu) ? $menu->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Content type', 'content_type'); ?>

			<div class="input">
				<?php echo Form::input('content_type', Input::post('content_type', isset($menu) ? $menu->content_type : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Link', 'link'); ?>

			<div class="input">
				<?php echo Form::input('link', Input::post('link', isset($menu) ? $menu->link : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Position', 'position'); ?>

			<div class="input">
				<?php echo Form::input('position', Input::post('position', isset($menu) ? $menu->position : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Active', 'active'); ?>

			<div class="input">
				<?php echo Form::input('active', Input::post('active', isset($menu) ? $menu->active : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>