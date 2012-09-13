<h2>Listing Menus</h2>
<br>


<?php echo $menus; ?>
<input type="submit" name="toArray" id="toArray" value="Save Menu">


<form>
	<input class="name" type="text" size="26" placeholder="Menu name" id="name"/>
	<select class="page">
		<option value="vacancy">Vacancies Page</option>
		<option value="calendar">Calendar Page</option>
		<?php foreach ($pages as $p):?>
			<option value="<?php echo $p['url'];?>"><?php echo $p['title'];?></option>
		<?php endforeach;?>
	</select>

	<a href="" onclick="return false" class="submitForm">submit</a>


</form>



<?php echo Asset::js(array('sortable.js'));?> 


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

		$.ajax({
			url: "../api/menu/create",
			data:{name: name, url: url},
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

});

</script>