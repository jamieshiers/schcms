<h2>Editing Vacancy</h2>
<br>

<?php echo render('admin/vacancy/_form'); ?>
<p>
	<?php echo Html::anchor('admin/vacancy/view/'.$vacancy->id, 'View'); ?> |
	<?php echo Html::anchor('admin/vacancy', 'Back'); ?></p>
