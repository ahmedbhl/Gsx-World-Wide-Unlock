
$(document).ready(function(e)
	{
		
		$(".resultat").hide();

		//$(".submit").hide();
	
		$("input").focus(function()
			{ 
				var info_form=$("#login_error"); 
				info_form.empty(); 
			}); 

		$("input").blur(function()
			{
			
				var value=$("#imei").val(); 
				var nb=$("#nb").val(); 
				var info_form=$("#login_error"); 

				if(value=='' || nb=='') 
				{	 
						  
				info_form.append("Obligatoire");

				}	 
				else 
				{ 
					$.ajax
					({ 
					
						type: "GET", 
						url: "generateur_action.php?imei="+value+"&nb="+nb,
						
						//data:"vote="+value,
						
						success: function(data)
						{
							if(data)
							{
							$(".mail").append("VOTRE IMEI à GENERER");
							$(".resultat").show();
							$("#resultat").load("imei.txt");
								$(".id_cl").hide(1000);
								 $(".info").show(1000);
								//$(".submit").show(1000);
							}
							else
							{
								info_form.append("Saisir le nombre d' imei à Generer");
							}
						} 
					}); 
				} 
			}); 
			
    e.stopPropagation();

	});
