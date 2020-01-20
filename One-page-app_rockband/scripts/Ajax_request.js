let condition = ".link";

$(document).ready(function() { //quand le document est chargé
    $(condition).click(function() { //quand le button est cliqué
    	console.log('fonction entrée');
    	let elementName; 

		elementName = $(this).attr('name'); //Assignation de la valeur name de l'élément cliqué à la var elementName
		console.log("Element name : " + elementName);

        $.ajax({ //requete ajax 
	        type: "Get", //type de requete, pour passer des éléments dans l'URL et controler la requete SQL
	        url: "models/model.php?band=" + elementName, //URL du fichier PHP effectuant la requête à la DB et retournant un JSON
	        dataType: "json", //type de donnée de retour de la requête AJAX

          	success: function(data) { //si la requète est valide (JSON valide), faire: 
          		console.log('Requête Ajax: success');
          		//console.log(data);

                var obj = data;
                var result = "<ul>";// démarage de la liste
                $.each(obj, function() { //pour chaque objet du tableau Json, l'afficher en chaine de charactère dans une puce
                    result = result + "<li>Groupe : " + this['rockband_name'] + "</li>"
                    				+ "<li>Titre : " + this['title_article'] + "</li>"
                    				+ "<li>Article : " + this['article']  + "</li>"
                    				+ "<li>auteur : " + this['author'] + "</li>" ;
                });
                result = result + "</ul>"; //fermeture de la liste
                //console.log(result);
                $("#result").hide();
                $("#result").html(result); //Insertion du resultat en HTML dans la <div> #result
                $("#result").fadeIn(1000);
        	} , 

          	error: function (jqXHR, exception) { //si il y a une erreur
		        var erreur = jqXHR.status; // Quel est le type d'erreur ? Ex: Error 404 NOT FOUND
		        var msg = jqXHR.responseText; //reponse reçu, qui est incorrect
		        $('.content').append('<p>Reponse retournée\n' + msg + "</p>");
		        $('.content').append("<p>Requête Ajax: error : " + erreur + "</p>");
	        } 
		}); 
    });
});

$(document).ready(function(){
	
});