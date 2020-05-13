affichage_channel()
setTimeout(affichage_message, 100);


function affichage_channel(){

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {},

	    success:function(data)
		{
			var nbr_channel=0
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_channel++;
				}
			}
			for(i=0; i < nbr_channel; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++ )
				{
					var id =  Object.keys(result)[0];
					var nom = Object.keys(result)[1];
					if(j==0)
					{
						if($(".active").text().trim() == "")
						{
							$("#liste_channel").append('<li id="'+result[id]+'" class="channel active"></li>')
						}
						else
						{
							$("#liste_channel").append('<li id="'+result[id]+'" class="channel"></li>')
						}
							$("#"+result[id]).append('<div id="wrap_chan'+result[id]+'" class="wrap"></div>')	
							$("#wrap_chan"+result[id]).append('<div id="meta_chan'+result[id]+'" class="meta"></div>')	
							$("#meta_chan"+result[id]).append('<p id="name_chan'+result[id]+'" class="name">'+result[nom]+'</p>')	
							$("#name_chan"+result[id]).after('<p class="preview"></p>')
					}
				}
	   		}  
		}
	});
}
function affichage_message(){
	
	var channel = $(".active").attr('id')

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {channel: channel},

	    success:function(data)
		{

			$(".sent").remove()
			var nbr_messages=0
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_messages++;
				}
			}
			for(i=0; i < nbr_messages; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++  )
				{
					var id = Object.keys(result)[j-2];
				   	var login = Object.keys(result)[j-1];
				   	var message = Object.keys(result)[j];
				   	var date = Object.keys(result)[j+1];
				   	var id_chan = Object.keys(result)[j+2];

				   	if(j == 2)
				   	{
				   		if(result[login] == $("#name_user").text())
				   		{
				   			$('<li class="sent">'+ result[login] +'<br><div><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$('.message-input input').val(null);
							$('#'+result[id_chan]+' .preview').html('<span>Toi: </span>' + result[message]);
				   		}
				   		else
				   		{

						   	$('<li id="sent_'+result[id]+'"  class="sent">'+ result[login] +'<br><div id="'+result[id]+'"><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$('.message-input input').val(null);
							$('.contact.active .preview').html('<span>'+result[login]+' : </span>' + result[message]);
							$("#sent_"+result[id]).css({"display" : "flex", "flex-direction": "column", "align-items": "flex-end"})
							$("#"+result[id]).css({"background-color" : "#F5F5F5", "color": "black"})
						}
					}
				  	
				}
	   		}  
				$(".messages").animate({ scrollTop: $(document).height() }, "fast");
		}
	});
}


function insert_message(){

	var id_channel = $(".active").attr('id')

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {message: message, id_channel: id_channel, date: date},

	    success:function(data){
		}
	});
}


function newMessage() {
	
	message = $(".message-input input").val();
	login = $("#name_user").text()

	var now = new Date();
	var annee   = now.getFullYear();
	var mois    = now.getMonth() + 1;
	var jour    = now.getDate();
	var heure   = now.getHours();
	var minute  = now.getMinutes();
	var seconde = now.getSeconds();
	
	if(mois < 10)
	{
		mois = "0"+mois
	}
	if(jour < 10)
	{
		jour = "0"+jour
	}
	if(heure < 10)
	{
		heure = "0"+heure
	}
	if(minute < 10)
	{
		minute = "0"+minute
	}
	if(seconde < 10)
	{
		seconde = "0"+seconde 
	}
	date = annee+"-"+mois+"-"+jour+" "+heure+":"+minute+":"+seconde
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent">'+login+'<br><div><p>' + message + '</p><p id="heure">'+date+'</p></div></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.channel.active .preview').html('<span>Toi: </span>' + message);

	var top = $(".messages").scrollTop() + $('.sent:last').height()*2
	$(".messages").animate({ scrollTop: top }, "slow");

};

$('.submit').click(function() {

	if($(".message-input input").val() != ""){

  		newMessage();
  		insert_message()
	}
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
  	insert_message()
    return false;
  }
});



$( document ).ready(function() {

	$("body").on("click", ".channel", function () {

		var id_chan=$(this).attr('id')
		$(".channel").removeClass("active")
		$("#"+id_chan).addClass("active")
		affichage_message()

	});
});