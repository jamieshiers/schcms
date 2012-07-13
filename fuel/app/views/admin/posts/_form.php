<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Body', 'body'); ?>
			<!-- Toolbar-->
			<div id="wysihtml5-toolbar" style="display: none;">
  				<a data-wysihtml5-command="bold" class="btn"><i class="icon-bold"></i></a>
  				<a data-wysihtml5-command="italic" class="btn"><i class="icon-italic"></i></a>
  
  				<!-- Some wysihtml5 commands require extra parameters -->
  				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red" class="btn">red</a>
  				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green" class="btn">green</a>
  				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue" class="btn">blue</a>
  				<a data-wysihtml5-command="change_view" data-wysihtml5-action="change_view" href="javascript:;" unselectable="on" class="btn">change view</a>
  
 				 <!-- Some wysihtml5 commands like 'createLink' require extra paramaters specified by the user (eg. href) -->
  				<a data-wysihtml5-command="createLink" class="btn"><i class="icon-external-link"></i></a>
  				<div data-wysihtml5-dialog="createLink" style="display: none;">
    				<label>
      					Link:
      				<input data-wysihtml5-dialog-field="href" value="http://" class="text">
    				</label>
    			<a data-wysihtml5-dialog-action="save">OK</a> <a data-wysihtml5-dialog-action="cancel">Cancel</a>
  				</div>
			</div>
			<div class="input">
				<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'span10', 'rows' => 8, 'id' => 'description')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User id', 'user_id'); ?>

			<div class="input">
				<?php echo Form::input('user_id', Input::post('user_id', isset($post) ? $post->user_id : ''), array('class' => 'span6')); ?>

			</div>
			
		</div>
		<?php echo Form::hidden('databasefiles', Input::post('files', isset($vacancy) ? $vacancy->files : ''), array('class' => 'span10', 'rows' => 8)); ?>
		<?php echo Form::hidden('files', array('class' => 'span10', 'rows' => 8)); ?>
		<?php echo Form::hidden('drag_drop');?>
		<div class="clearfix">
			<label for="fileselect">Files to upload:</label>
			<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
		</div>
		<div id="filedrag">or drop files here</div>
		<div id="messages"></div>

		<!-- 
			# Role based publishing controls, Administrators and Moderators get the publish button,
			# everybody elese gets the add to queue button.
		-->

		<?php $groups = Auth::get_groups(); 
			$group = $groups[0][1];

			if($group == 100 || $group == 50)
			{?>
				<div class="actions">
					<?php echo Form::hidden('published', '1');?>
					<?php echo Form::hidden('approve', '0');?>
					<?php echo Form::submit('submit', 'Publish', array('class' => 'btn primary')); ?>
				</div>
			<?php }
			else
			{?>
				<div class="actions">
					<?php echo Form::hidden('published', '0');?>
					<?php echo Form::hidden('approve', '1');?>
					<?php echo Form::submit('submit', 'Add to Queue', array('class' => 'btn primary')); ?>
				</div>
			<?php } ?>


		

	</fieldset>
<?php echo Form::close(); ?>
<?php echo Asset::js('filedrag.js');
echo Asset::js(array('editor/parser_rules/advanced.js', 'editor/dist/wysihtml5-0.3.0.min.js')); ?>

<script>
var editor = new wysihtml5.Editor("description", { // id of textarea element
  toolbar:      "wysihtml5-toolbar", // id of toolbar element
  parserRules:  wysihtml5ParserRules // defined in parser rules set 
});
</script>