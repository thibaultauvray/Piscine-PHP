function strIsEmpty(str) {
	return (str.length === 0 || !str.trim());
}

function check ()
{
	var task = document.getElementById('ft_list');
	task.innerHTML = decodeURIComponent(getCookie('todo'));
}

function getCookie(name)
{
	var nom = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(nom) == 0) return c.substring(nom.length,c.length);
	}
	return "";
}

function setCookie(name, value, exdays)
{
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = name + "=" + value + "; " + expires;
}


$('#new').click(function()
	{
		var persson = prompt("Entrez la chose a remettre au lendemain");
    	if (!strIsEmpty(persson)) 
    	{
			$("#ft_list").prepend( "<div class=eee onclick=del(this)>" + persson + "</div>" );
			//alert("ok");
			var c = $("#ft_list").html();
			setCookie('todo', encodeURIComponent(c), 1);
		}
	})



function del(i)
{
	 if (confirm("Avez vous vraiment finis cette tache ?")) 
	 { 
	//	var task = document.getElementById('task');
		$(i).remove();
		var c = $("#ft_list").html();
		setCookie('todo', encodeURIComponent(c), 1);


     }
}


