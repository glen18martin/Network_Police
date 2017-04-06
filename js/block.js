$(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
			$.post("block.php", {app_name: name,hash: email}, function(result){
			var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
            $("table tbody").append(markup);

    });
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
				
            	if($(this).is(":checked")){
				$.post("block.php", {action:'delete',app_name: $(this).attr("data-id")}, function(result){
					        
		
				});
            $(this).parents("tr").remove();
                }
            });
        });
    });    