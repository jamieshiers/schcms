
<?php echo Form::open(array('class' => 'form-inline', 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="form-inset">
		<div class="clearfix">
			<?php echo Form::label('Job title', 'job_title'); ?>

			<div class="input">
				<?php echo Form::input('job_title', Input::post('job_title', isset($vacancy) ? $vacancy->job_title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Location', 'location'); ?>

			<div class="input">
				<?php echo Form::input('location', Input::post('location', isset($vacancy) ? $vacancy->location : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Salary', 'salary'); ?>

			<div class="input">
				<?php echo Form::input('salary', Input::post('salary', isset($vacancy) ? $vacancy->salary : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Contract type', 'contract_type'); ?>

			<div class="input">
				<?php echo Form::input('contract_type', Input::post('contract_type', isset($vacancy) ? $vacancy->contract_type : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Contract term', 'contract_term'); ?>

			<div class="input">
				<?php echo Form::input('contract_term', Input::post('contract_term', isset($vacancy) ? $vacancy->contract_term : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Start date', 'start_date'); ?>

			<div class="input">
				<?php echo Form::input('start_date', Input::post('start_date', isset($vacancy) ? $vacancy->start_date : ''), array('class' => 'span6 datepicker')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('End date', 'end_date'); ?>

			<div class="input">
				<?php echo Form::input('end_date', Input::post('end_date', isset($vacancy) ? $vacancy->end_date : ''), array('class' => 'span6 datepicker')); ?>

			</div>
		</div>
		<div class="clearfix">
			<!-- Toolbar-->
			<div id="wysihtml5-toolbar" style="display: none;" class="input">
  				<a data-wysihtml5-command="bold" class="btn"><i class="icon-bold"></i></a>
  				<a data-wysihtml5-command="italic" class="btn"><i class="icon-italic"></i></a>
  				<a data-wysihtml5-command="insertUnorderedList" class="btn"><i class="icon-list"></i></a>
  				<div class="btn-group">
  					<a data-wysihtml5-command="justifyLeft" class="btn"><i class="icon-align-left"></i></a>
  					<a data-wysihtml5-command="justifyCenter" class="btn"><i class="icon-align-center"></i></a>
  					<a data-wysihtml5-command="justifyRight" class="btn"><i class="icon-align-right"></i></a>
  				</div>
  
  				<a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" class="btn">H1</a>
  				<a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" class="btn">H2</a>

  				<!-- Some wysihtml5 commands require extra parameters -->
  				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red" class="btn">red</a>
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
				<?php echo Form::textarea('description', Input::post('description', isset($vacancy) ? $vacancy->description : ''), array('class' => 'span10', 'rows' => 8, 'id' => 'description')); ?>

			</div>
			<?php echo Form::hidden('databasefiles', Input::post('files', isset($vacancy) ? $vacancy->files : ''), array('class' => 'span10', 'rows' => 8)); ?>
			<?php echo Form::hidden('files', array('class' => 'span10', 'rows' => 8)); ?>
			<?php echo Form::hidden('drag_drop');?>
		</div>
		<div class="clearfix">
			<label for="fileselect">Files to upload:</label>
			<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
		</div>
		<div id="filedrag">or drop files here</div>
		<div id="messages"></div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</div>
	</fieldset>
<?php echo Form::close(); ?>
<?php echo Asset::js('filedrag.js');
echo Asset::js(array('editor/parser_rules/advanced.js', 'editor/dist/wysihtml5-0.3.0_rc2.min.js')); ?>
<script>
var editor = new wysihtml5.Editor("description", { // id of textarea element
  toolbar:      "wysihtml5-toolbar", // id of toolbar element
  parserRules:  wysihtml5ParserRules, // defined in parser rules set 
  stylesheets: ["../../../assets/css/admin.css"],
});
</script>



