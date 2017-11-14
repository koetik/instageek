$(".comment").keypress(function(e) {
    
    if ((e.characterCode == 13 || e.which == 13) && $(this).val().trim() != '') {
        var input 		= $(this);
        var siblings 	= input.closest('.content').prev('.content');
        var dt 			= {
            post: input.attr('name'),
            comment: input.val(),
		};

        $.ajax({
            type:'POST',
            url:'/comment',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:dt,
            success:function(data){
                if(data.status == '1') {
                    input.val('');
                    siblings.find('.description:last')
                		 	.after(templateComment(data.name, dt.comment));
                    siblings.find('.comment_count').text(data.comment_count);
                }
            },
            error:function(data){
                alert('error input');
            }
        });
    }
});

$("body").on('click', '.like', function() {
	var like 		= $(this);
	var siblings 	= like.siblings('.like_count');

	if(like.hasClass('red')) {
		var dt = {
            _method: 'delete'
		};

        $.ajax({
            type:'POST',
            url:'/like/'+like.attr('data-uid')+'/'+like.attr('data-id'),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:dt,
            success:function(data){
            	like.addClass('outline');
            	like.removeClass('red');
            	siblings.text(data.like_count);
            },
            error:function(data){
                alert('error input');
            }
        });
		// alert(like.attr('data-uid'));
	}

	if(like.hasClass('outline')) {
		var dt = {
            post: like.attr('data-uid'),
		};

        $.ajax({
            type:'POST',
            url:'/like',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:dt,
            success:function(data){
            	like.addClass('red');
            	like.removeClass('outline');
            	siblings.text(data.like_count);
            	like.attr('data-id', data.like_id);
            },
            error:function(data){
                alert('error input');
            }
        });
		// alert(like.attr('data-uid'));	
	}
	// console.log(siblings.html());
})

function templateComment(username, comment) {
	return '<div class="description">\
              <p><a class="name" href=""><strong>' +username+ '</strong></a> '+ comment +'</p>\
            </div>';
}