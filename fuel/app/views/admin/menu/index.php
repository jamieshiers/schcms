<h2>Listing Menus</h2>
<br>


<?php echo $menus; ?>
<input type="submit" name="toArray" id="toArray" value="Save Menu">


<form>
	<input class="name" type="text" size="26" placeholder="Menu name" id="name"/>
	<input class="id" type="hidden" value=""/>
	<select data-placeholder="Select a Page"  class="page chzn-select">
		<option value=""></option>
		<option value="/vacancy">Vacancies Page</option>
		<option value="/calendar">Calendar Page</option>
		<?php foreach ($pages as $p):?>
			<option value="<?php "/"; echo $p['url'];?>"><?php echo $p['title'];?></option>
		<?php endforeach;?>
	</select>
	<label name="published">Published</label>
	<input class="published" type="checkbox" />
	
		<a id="create" href="" onclick="return false" class="submitForm">submit</a>
		<a id="edit" style="display:none;cursor:pointer;" onclick="return false" class="editForm">Save</a>		
	



</form>



<?php echo Asset::js(array('sortable.js', 'chosen.jquery.min.js'));?> 


<!-- nested sortable list -->
<script>
$(document).ready(function(){
	$('.sortable').nestedSortable({
		forcePlaceholderSize: true,
		listType: 'ul',
		handle: 'div',
		items: 'li', 
		toleranceElement: '> div',
		placeholder: 'placeholder',
	});

	$('.chzn-select').chosen();


	var key = "c6a6da323866fa01d0d4d6f3c1d88c79";
	var secure = "1c138fd52ddd7";

	$.ajaxSetup({
		type:'POST',
		headers: {"key": key, "secure": secure}, 
	});




	$('#toArray').live('click', function (){
			serialized = $('.sortable').nestedSortable('serialize');
        $.ajax({
            
            url: "../api/menu/updatePosition.json",
            data: serialized,
            success: function (msg) {
			
            }

        });
		})

	$('.submitForm').click(function(){
		var name = $(".name").val();
		var url = $(".page").val();
		if($('.published').is(':checked'))
		{
			var published = 1;
		}
		else
		{
			var published = 0;
		}

		$.ajax({
			url: "../api/menu/create",
			data:{name: name, url: url, active: published,},
			success: function(){
				location.reload();
				$('.name').val('');
			}

		})
	});

	$('.delete').click(function(){
		var id = $(this).attr('id');
		$.ajax({
			url: "../api/menu/delete",
			data:{id:id},
			success: function(){
				location.reload();
			}
		})
	});

	$('.edit').click(function(){
		var id = $(this).attr('id');
		var href = $(this).attr('href');
		var value = $(this).attr('value');
		
		$('.name').val(value);
		$('.page').val(href);
		$(".page").trigger("liszt:updated");
		$('.id').val(id);
		$('#create').hide();
		$('#edit').show();
		
	});

	$('.editForm').click(function(){
		var id = $('.id').val();
		var name = $('.name').val();
		var url = $(".page").val();
		if($('.published').is(':checked'))
		{
			var published = 1;
		}
		else
		{
			var published = 0;
		}

		$.ajax({
			url: "../api/menu/edit",
			data:{id: id, name: name, url: url, active: published,},
			success: function(){
				$('.name').val('');
				$('.page').val('');
				location.reload();
			}

		})
	});

});

</script>