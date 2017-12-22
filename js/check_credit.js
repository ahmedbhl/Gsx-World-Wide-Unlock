 
	$(document).ready(function () {
	
		
		$(".check").hide();
		$(".checkall").hide();
				
        // event.preventDefault();
		 var credit=$(".creditt").val();
		
		// alert("error in ajax form submission");

        $.ajax({
		  success: function () {
				if(credit>0)
				{
			
					$('.check').show();
					$(".checkall").show();
				
				}
				else
				{
					$('.check').hide();
					$(".checkall").hide();
				}
			}
         });

        
    
});