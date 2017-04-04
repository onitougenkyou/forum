/**
 *	Plugin permettant d'exemple de fonctionnement simple
*/


if(!jQuery){
	console.error("Le module requiert de JQUERY");
	exit();
}




(function ($) {

// Options
	const PLUGIN_NAME = 'chat';		///
	const DEFAULT_ELEMENT = "<input>";			///	Element par défaut lorsque l'on n'appel pas le plugin au travers d'un élément, celui ci est pris en compte.
																				/// 	Soit c'est un élément jquery: un élément existant ou créé  => élément associé à L'INITIALISATION DU PLUGIN ET NON A LA CREATION !
																				///   Soit à une chaine de charactère qui est élément de recherche du
	const METHODS = [];										/// Tableau ou objet de l'ensemble des méthodes publiques.
																				///		Soit une chaine de charactère: nom de la fonction publique
																				/// 	Soit un objet {} l'attribut correspond à la méthode de l'objet, et la valeur correspond au nom de la fonction appelé dans le plugin

  var defaults = {
		$user: 'Gandalf le blanc',
		event: function(){}
  };



	// Fonction utile

	    // Recursively combines option hash-objects
	    // Better than `$.extend(true, ...)` because arrays are not traversed/copied
	    //
	    // called like:
	    // mergeOptions(target, obj1, obj2, ...)
	    function mergeOptions(target) {
	        function mergeIntoTarget(name, value) {
	            if ($.isPlainObject(value) && $.isPlainObject(target[name])) { // && !isForcedAtomicOption(name)) {
	                // merge into a new object to avoid destruction
	                target[name] = mergeOptions({}, target[name], value); // combine. `value` object takes precedence
	            }
	            else if (value !== undefined) { // only use values that are set and not undefined
	                target[name] = value;
	            }
	        }
	        for(var i = 1; i < arguments.length; i++) {
	            $.each(arguments[i], mergeIntoTarget);
	        }
	        return target;
	    }

	// Définition générales du plugin

		// Pour créer a partir de rien
		$[PLUGIN_NAME] = function(options) {
			var $myNewElement = $(DEFAULT_ELEMENT);
			return $myNewElement[PLUGIN_NAME].apply($myNewElement,arguments);
		}

	    $.fn[PLUGIN_NAME] = function (options) {
	    	if(options === "default"){
	    		options = arguments[1];
	    		if(typeof options == "undefined") return defaults;
		    	else if(typeof options == "string" && typeof arguments[2] != "undefined"){
		    		var myNewOpt = {};
		    		myNewOpt[options] = arguments[2];
		    		mergeOptions(defaults,myNewOpt)
		    	}else if($.isPlainObject(options)){
		    		mergeOptions(defaults,options)
		    	}
	    	}
	    	else{
		        var args = Array.prototype.slice.call(arguments, 1); // for a possible method call
		        var res = this; // what this function will return (this jQuery object by default)
		        this.each(function (i, _element) { // loop each DOM element involved
		            var element = $(_element);
					var mapping = element.data(PLUGIN_NAME); // get the existing mapping object (if any)

		            // Si l'on a passé les argument en mode apply
		            if(typeof options === 'boolean' && options === true){
		            	options = args[0];
		            	args = args[1];
					}

		            if (mapping) {
		                if (typeof options === 'string' && $.isFunction(mapping[options])) {
		                	var singleRes = mapping[options].apply(mapping, args);
		                    if (!i) {
		                        res = singleRes; // record the first method call result
		                    }
		                    if (options === 'destroy') { // for the destroy method, must remove Mapping object data
		                        element.removeData(PLUGIN_NAME);
		                    }
		                }
		                else if($.isFunction(mapping['quickRequest'])) {
		                	var singleRes = mapping['quickRequest'].apply(mapping,[options].concat(args));
		                	if(typeof singleRes != "undefined") res = singleRes;
		                }
		                else{
		                	console.error('The fonction "'+options+'" is not public and there is no quickRequest for this plugin.');
		                }
		            }
		            // a new mapping initialization
		            else if (!mapping) { // don't initialize twice
		                mapping = new Mapping(element, options);
		                res = mapping.render();
						if(element instanceof jQuery) 	element.data(PLUGIN_NAME, mapping);
		                if(res instanceof jQuery) 		res.data(PLUGIN_NAME, mapping);
		            }
		        });
		        return res;
		    }
	    };

	    // Permet de modifier les valeurs par defaut en restant à l'exterieur du plugin
	    $.fn[PLUGIN_NAME].defaults = defaults;




	// Mapping du plugin
        function Mapping(element, originalOptions) {
            var t = this;


            // Build options object
            // -----------------------------------------------------------------------------------

                originalOptions = originalOptions || {};

                var options = mergeOptions({}, defaults, originalOptions);

                t.render = render;
                t.options = function(opt){
					if(opt){
						if(opt.constructor==Object)		options= mergeOptions({}, options, opt)
						else							options[opt]=Array.prototype.slice.call(arguments, 1)[0];

					}else return options
				};

// Définition des variables globales
// -----------------------------------------------------------------------------------
var $user;
// Main Rendering
// -----------------------------------------------------------------------------------
function render() {
	// Initialisation

	console.log("element",element)
	if (element.prop("tagName")=='INPUT') {
		$input = element;
		$input.attr('id', 'textChat');

		$container = $("<fieldset>").insertAfter($input);


		$message = $('<div>').addClass('conversation').insertAfter($input);

		$conv = $("<div>").addClass('message').insertAfter($message);
	}else{
		console.log('e');
		$container = element;
		$input = $("<input>");
	}
	$container.append($conv);
	// $container.append($pseudo);
	$conv.append($input);
	$container.append($message);

	var date = new Date();
	heure = date.getHours();
	min = date.getMinutes();
	seconde = date.getSeconds();

	createButton();
	setTimeout(function() { afficheConversation(); } , 1);
	console.log('Le nom est :', options.$user);

	return $container;
}


function createButton(){
	var $btn = $("<div>")
	.html("Envoi")
	.addClass('btnEnvoi')
	.addClass("button")

	.click(function() {
		// var nom = $('#nom').val() ;
		// console.log('click')
		//afficheConversation();

		var message = $('.message input').val();
		longueur();
		$.post('Plugin-chat/donneesChat.php', {
			'nom': options.$user,
			'date': heure, min,
			'message': message
		}, afficheConversation);
	})
	.insertAfter($input);
}




function longueur() {
	if (  $('.message input').val() > 25) {
		return false;
	}
}

function afficheConversation() {
	console.log("message",  $('.conversation'))
	$('.conversation').load('Plugin-chat/chat.txt');
	$('.message input').val('');
	$('.message input').focus();
}
setInterval(afficheConversation, 600000);


	}
})(jQuery);
