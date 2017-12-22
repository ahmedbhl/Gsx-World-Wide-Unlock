

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

			

				var tag1=$("#tag1").val(); 

				var tag2=$("#tag2").val(); 

				var nb=$("#nb").val(); 

				var info_form=$("#login_error"); 



				if(tag1=='' || nb=='' || tag2=='') 

				{	 

						  

				info_form.append("Obligatoire");



				}	 

				else 

				{ 

					$.ajax

					({ 

					

						type: "GET", 

						url: "generateur_sn_action.php?tag1="+tag1+"&tag2="+tag2+"&nb="+nb,

						

						//data:"vote="+tag1,

						

						success: function(data)

						{

							if(data)

							{

							

							$(".mail").append("VOTRE IMEI à GENERER");

							$(".resultat").show();

							$("#resultat").load("sn.txt");

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

