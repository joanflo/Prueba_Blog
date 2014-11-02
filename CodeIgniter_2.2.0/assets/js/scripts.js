$(function() {
	
	var dialog,
	form,
    usernameRegex = /^([0-9a-zA-Z.])+$/,
    username = $("#username"),
    passwordRegex = /^([0-9a-zA-Z])+$/,
    password = $("#password"),
    allFields = $([]).add(username).add(password),
    tips = $(".validateTips");
    
    
    function updateTips(texto) {
		tips.text(texto).addClass("ui-state-highlight");
		setTimeout(function() {
			tips.removeClass("ui-state-highlight", 1500);
		}, 500);
    }
    

    function checkLength(elemento, nombre, min, max) {
		if (elemento.val().length > max || elemento.val().length < min) {
			elemento.addClass("ui-state-error");
        	updateTips("El tamaño del campo " + nombre + " debe ser entre " + min + " y " + max + ".");
			return false;
		} else {
			return true;
		}
    }
 
 
    function checkRegexp(elemento, regexp, mensaje) {
		if (!regexp.test(elemento.val())) {
			elemento.addClass("ui-state-error");
			updateTips(mensaje);
			return false;
		} else {
			return true;
		}
	}
	
 
    function logInUser() {
		var valid = true;
		allFields.removeClass("ui-state-error");
      
		valid = valid && checkLength(username, "username", 6, 16);
		valid = valid && checkLength(password, "password", 5, 16);
 
		valid = valid && checkRegexp(username, usernameRegex, "Introduce un nombre de usuario válido" );
		valid = valid && checkRegexp(password, passwordRegex, "La contraseña sólo permite caracteres alfanuméricos");
		
		if (valid) {
			form.submit();
			dialog.dialog("close");
		}
		return valid;
    }
    
 
    dialog = $("#dialog-form").dialog({
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		buttons: {
			"Log in": logInUser,
        	Cancel: function() {
				dialog.dialog("close");
			}
		},
		close: function() {
			form[0].reset();
			allFields.removeClass("ui-state-error");
		}
    });
 
 
	form = dialog.find("form").on("submit", function(event) {
		// llamamos al controlador de codeigniter desde javascript
		$.ajax({
			type:'POST',
            url:'blog/verify',
            data:{'username':username.val(), 'password':password.val()},
            success:function(data) {
                window.alert('guay!' + data + ' - ' + username.val());
            }
        });
    });
    
 
    $("#log").on("click", function() {
		dialog.dialog("open");
    });
    
});