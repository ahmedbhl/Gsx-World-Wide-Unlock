 function new_request(){
        var xhr = null;

        if(window.XMLHttpRequest || window.ActiveXObject) {
                if(window.ActiveXObject) {
                        try {
                                xhr = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch(e) {
                                xhr = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                } else {
                        xhr = new XMLHttpRequest();
                }
        } else {
                alert("Votre navigateur ne supporte pas l\'objet XMLHTTPRequest...");
                return null;
        }
 
        return xhr;
}

function load_get(file,variables,id){
	xhr = new_request();
	xhr.open('POST',file,true);
	xhr.onreadystatechange = function(){
        if (xhr.readyState == 4){
            if (document.getElementById) document.getElementById(id).innerHTML = xhr.responseText;
        } else document.getElementById(id).innerHTML = '<p style="text-align: center; margin-top: 50px;"><img src="images/chargement2.gif" alt="Chargement en cours"/></p>';
    }
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xhr.send(variables);
	return false;
}