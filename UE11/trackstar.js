$(document).ready(function(){
	$('#info-box').hide();
	$('.delete').click(function() {
		var $toDelete = $(this).parent().parent().attr("id");
	  if(confirm("Soll dieses Projekt wirklich gelöscht werden?")) 
	  {
	    console.log("Löschen true: "); //this ist das span element, da an dieses dass click event gebunden wurde; alternativ: $(this).attr("id")
		$.ajax({
			url: "http://localhost/UE11/main.php",
			method: "POST",
			data: "deleteProId=" + $(this).parent().parent().attr("id"),  //Typ string
			success: function(serverResponse){
				console.log("Server response: " + serverResponse);
				if(serverResponse)
				{
					$('#' + $toDelete).remove();
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

			}
		}); //AJAX-Request mit dem Konfigurationsobjekt absetzen
	  }
	  else {
	    console.log("Löschen false: " + $(this).parent().parent().attr("id")); // $(this) erzeugt aus der this-referenz ein jquery-object. jetzt können alle jquery methoden genutzt werden
	  }
	});
});

$('.edit').click(function() {
  console.log("Edit");
});


