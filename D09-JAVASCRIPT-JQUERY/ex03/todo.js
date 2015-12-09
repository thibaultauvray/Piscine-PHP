var i =0;
function strIsEmpty(str) {
	return (str.length === 0 || !str.trim());
}
$(document).ready(function(){

 	$.ajax({
        	url : 'select.php',
        	type : 'GET',
        	dataType : 'json',
        	success : function(code_html, statut){ // code_html contient le HTML renvoyé
        		var o = 0;
        		while (code_html[o])
        		{
        			var split = code_html[o].split(";");
	           		var id = split[0];
	           		var tak = split[1];
        			$("#ft_list").prepend("<div onclick=del(this) id="+id+">"+tak+"</div>");
        			o++;
        			i++;
        		}
	       }
		})	       


    $("#new").click(function(){
    	
    	var persson = prompt("Entrez la chose a remettre au lendemain");
    	if (!strIsEmpty(persson)) 
    	{
        $.ajax({
        	url : 'insert.php',
        	type : 'GET',
        	data : 'id='+ i +'& task='+persson,
        	dataType : 'html',
        	success : function(code_html, statut){ // code_html contient le HTML renvoyé
	           var split = code_html.split("-");
	           var id = split[0];
	           var tak = split[1];
	           $("#ft_list").prepend("<div onclick=del(this) id="+id+">"+tak+"</div>");
	       }



        });
		i++;
}
    });


});