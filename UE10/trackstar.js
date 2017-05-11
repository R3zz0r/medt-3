$(document).ready(function(){
	$('#info-box').hide();
	$('.delete').click(function() {
		var toDelete = $(this).parent().parent().attr("id");

		//Modal mit der ID öffnen
		$('#delete-project-modal').modal("show");
		

		/* Abfrage mit JS confirm
	  if(confirm("Soll dieses Projekt wirklich gelöscht werden?")) 
	  {
	    console.log("Löschen true: "); //this ist das span element, da an dieses dass click event gebunden wurde; alternativ: $(this).attr("id")
		*/
	$("#delete-project-confirm").click(function(){
		$.ajax({
			url: "http://localhost/UE10/trackstar.php",
			method: "POST",
			data: "deleteProId=" + toDelete,  //Typ string
			success: function(serverResponse){
				console.log("Server response: " + serverResponse);
				if(serverResponse)
				{
					$('#' + toDelete).remove();
					$('#info-box').text("Löschen erfolgreich").fadeIn("Slow");
					$('#info-box').addClass("bg-success");
					$('#info-box').show().fadeOut(3000);		
				}
				else
				{
					$('#info-box').text("Löschen fehlgeschlagen").fadeIn("Slow");
					$('#info-box').addClass("bg-danger");
					$('#info-box').show().fadeOut(3000);
				}
			},
			error: function(){
					$('#info-box').text("Löschen fehlgeschlagen").fadeIn("Slow");
					$('#info-box').addClass("bg-danger");
					$('#info-box').show().fadeOut(3000);
			}
	});
			$('#delete-project-modal').modal("hide");
	}); 

	$("#delete-project-cancel").click(function(){
		$('#delete-project-modal').modal("hide");
	});
	  /*}
	  else {
	    console.log("Löschen false: " + $(this).parent().parent().attr("id")); // $(this) erzeugt aus der this-referenz ein jquery-object. jetzt können alle jquery methoden genutzt werden
	  }*/
	});
});

$('.edit').click(function() {
  console.log("Edit");
});


