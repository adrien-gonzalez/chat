affichage_message()


function affichage_message(){
	
	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {},

	    success:function(data)
		{

			console.log(data)
			
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

				   	if(j == 2)
				   	{
				   		if(result[login] == $("#name_user").text())
				   		{
				   			$('<li class="sent">'+ result[login] +'<br><div><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$('.message-input input').val(null);
							$('.contact.active .preview').html('<span>Toi: </span>' + result[message]);
							$(".messages").animate({ scrollTop: $(document).height() }, "fast");
				   		}
				   		else
				   		{
						   	$('<li id="'+result[login]+'"  class="sent">'+ result[login] +'<br><div id="'+result[id]+'"><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$('.message-input input').val(null);
							$('.contact.active .preview').html('<span>Toi: </span>' + result[message]);
							$(".messages").animate({ scrollTop: $(document).height() }, "fast");
							$("#"+result[login]).css({"display" : "flex", "flex-direction": "column", "align-items": "flex-end"})
							$("#"+result[id]).css({"background-color" : "#F5F5F5", "color": "black"})
						}
					}
				  	
				}
	   		}  



		}
	});
}


// $(".messages").animate({ scrollTop: $(document).height() }, "fast");

// $("#profile-img").click(function() {
// 	$("#status-options").toggleClass("active");
// });

// $(".expand-button").click(function() {
//   $("#profile").toggleClass("expanded");
// 	$("#contacts").toggleClass("expanded");
// });

// $("#status-options ul li").click(function() {
// 	$("#profile-img").removeClass();
// 	$("#status-online").removeClass("active");
// 	$("#status-away").removeClass("active");
// 	$("#status-busy").removeClass("active");
// 	$("#status-offline").removeClass("active");
// 	$(this).addClass("active");
	
// 	if($("#status-online").hasClass("active")) {
// 		$("#profile-img").addClass("online");
// 	} else if ($("#status-away").hasClass("active")) {
// 		$("#profile-img").addClass("away");
// 	} else if ($("#status-busy").hasClass("active")) {
// 		$("#profile-img").addClass("busy");
// 	} else if ($("#status-offline").hasClass("active")) {
// 		$("#profile-img").addClass("offline");
// 	} else {
// 		$("#profile-img").removeClass();
// 	};
	
// 	$("#status-options").removeClass("active");
// });

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent">tf<br><div><p>' + message + '</p><p id="heure">heure</p></div></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
