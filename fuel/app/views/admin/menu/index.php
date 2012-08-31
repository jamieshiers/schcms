<h2>Listing Menus</h2>
<br>


<?php echo $menus; ?>


<p>
<input type="submit" name="toArray" id="toArray" value="To array" />
<pre id="toArrayOutput"></pre> 
</p>

<p> 




<?php echo Asset::js(array('sortable.js'));?> 


<!-- nested sortable list -->
<script>
$(document).ready(function(){
	$('.sortable').nestedSortable({
		listType: 'ul',
		handle: 'div',
		items: 'li', 
		toleranceElement: '> div'
	});

	$('#toArray').live('click', function (){
			serialized = $('.sortable').nestedSortable('serialize');
        serialized += '&key=c6a6da323866fa01d0d4d6f3c1d88c79';
        $.ajax({
            type: 'post',
            url: "../api/menu/updatePosition",
            data: serialized,
            success: function (msg) {
			$("#msgholder").html(msg);
			  setTimeout(function () {
				  $(loadList()).fadeIn("slow");
			  }, 2000);
            }

        });
		})


});
</script>