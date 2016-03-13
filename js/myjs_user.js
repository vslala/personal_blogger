$(document).ready(function(){
    // if (window.location.href.indexOf("blog") > -1)
    //     $('html, body').prepend('<a href="#" class="back-to-top"></a>');

    // $('a.back-to-top').click(function() {
    //     $('html, body').animate({
    //         scrollTop: 0
    //     }, 700);
    //     return false;
    // });

    $('#posted_on').val(getCurrentDate());

	$("body").on("click", "#project_delete", function(event){
		event.preventDefault();
		var url = $(this).attr("href");
		var parentPanel = $(this).parent().parent();

		$.ajax({
			type : "GET",
			url : url,
			success: function(data){
					$(parentPanel).remove();
					$("#danger_div").html(data);
			},
			error : function(xhr,status,message){
					alert(xhr.responseText);
			}
		});
                
     
	});

        $('body').on('click', '#for_page_list_element', function(event){
            event.preventDefault();
            
            var forPage = $(this).text();
            var coverImage = $(this).next().val();
            var coverHeading = $(this).next().next().val();
            var coverSubHeading = $(this).next().next().next().val();
            $('#for_page_input').val(forPage);
            $('#cover_image_input').val(coverImage);
            $('#cover_heading_input').val(coverHeading);
            $('#cover_subheading_input').val(coverSubHeading);
        });
        
        $('body').on('click','#delete_layout_link', function(event){
            event.preventDefault();
            console.log('clicked');
            var url = $(this).attr('href');
            var row = $(this).parent().parent(); 
            
            $.ajax({
                url: url,
                type: "GET",
                success: function(response){
                    if(response==true){
                        row.remove();
                    }
                },
                error: function(xhr,status,msg){
                    console.log(xhr.responseText);
                }
            })
        });
        
        $('#layout_form').submit(function(event){
            event.preventDefault();
            
            var url = $(this).attr('action');
            var data = $(this).serialize();
            var dataArray = $(this).serializeArray();
            var type = "POST";
            var new_div = $('<div></div>');
            var layout_form_div = $('#layout_form_div');
            var available_layouts_list = $('#available_layouts_list');
            layout_form_div.prepend(new_div);
            
            $.ajax({
                url: url,
                data: data,
                type: type,
                success: function(response){
                    if(response == true){        
                        var html_string = '<span style="font-family: tahoma, sans-serif; font-weight: bolder; color: green;" class="alert alert-success">'+
                                'Layout Set Successful'+
                                '</span>';
                        new_div.html(html_string);
                        console.log(dataArray);
                        var html_string = '<li>' +
                        '<span class="pull-right"><a href="php/delete.php?for=' +dataArray[0].value+'" id="delete_layout_link">delete</a></span>' +
                        '<a href="#" id="for_page_list_element">'+dataArray[0].value+'</a>' +
                        '<input type="hidden" value="'+dataArray[1].value+'">' +
                        '<input type="hidden" value="'+dataArray[2].value+'">' +
                        '<input type="hidden" value="'+dataArray[3].value+'">' +
                        '</li>';
                        available_layouts_list.append(html_string);
                    }else{
                        var html_string = '<span style="font-family: tahoma, sans-serif; font-weight: bolder; color: crimson;" class="alert alert-danger">'+
                                'There was some error setting the layout'+
                                '</span>';
                        new_div.html(html_string);
                    }
                },
                error: function(xhr, status, message){
                    console.log("Error: "+xhr.responseText);
                }
            });
        });
        
        /*
         * category_form
         */
//        $('#category_form').submit(function(event){
//            event.preventDefault();
//            var url = $(this).attr('action');
//            var data = $(this).serialize();
//            $('#category_form').append('<div style="margin-top: 3em;" id="new_div"></div>');
//            var new_div = $('#new_div');
//            
//            console.log(data);
//            $.ajax({
//                url: url,
//                type: "POST",
//                data: data,
//                success: function(response){
//                    var success_msg = 'The category has been added sccessfully!';
//                    var html_string = '<span '+
//                            'class="alert alert-success"'+
//                            'style="font-weight: bolder; font-family: tahoma, sans-serif; font-color: green;">'+
//                            success_msg+
//                            '</span>';
//                    new_div.html('<center>'+html_string+'</center>');
//                },
//                error: function(xhr,msg,status){
//                    console.log(xhr.responseText);
//                }
//            });
//        });
        
        $('body').on('click', '#edit_category_label', function(event){
            event.preventDefault();
            var label_section = $(this).parent();
            label_section.addClass('hidden');
            var input_section = $(this).parent().next();
            input_section.removeClass('hidden');
        });
        
        $('body').on('submit','#category_edit_form',function(event){
            event.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            
            var label_section = $(this).children('#category_labels');
            var input_section = $(this).children('#edit_category_form');
            
            var category_label = label_section.children('#edit_category_label');
            var sort_label = $(label_section).children('#edit_sort_label');
            
            var category_input = $(input_section).children('#edit_category_input');
            var sort_input = $(input_section).children('#edit_sort_input');
            
            
            $.ajax({
                url: url,
                data: data,
                type: "POST",
                success: function(data){
                    console.log(data);
                    category_label.text(category_input.val());
                    sort_label.text(sort_input.val());
                    label_section.removeClass('hidden')
                    input_section.addClass('hidden');
                },
                error: function(xhr, status, message){
                    console.log(xhr.responseText);
                }
            })
        })

        $('#contact_form').submit(function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var new_div = $('<div></div>');
        var contact_div = $('#contact_div');
        
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function(response){
                    contact_div.append(new_div);
                    new_div.html('<span class="alert alert-success" style="font-family: tahoma, sans-serif; font-weight: bolder; color: green;">Mail has been sent successfully.');
            },
            error: function(xhr, status, msg){
                console.log(xhr.responseText);
            }
        });
    });

        $('body').on('submit', '#product_image_form', function(event){
            event.preventDefault();

            var url = $(this).attr('action');
            var data = $(this).serialize();
            var image_name_input = $(this).find('#image_name_input');
            var image_src_input = $(this).find('#image_src_input');
            var image_caption_input = $(this).find('#image_caption_input');
            var product_id_input = $(this).find('#product_id_input');

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function(data){
                    image_name_input.val('');
                    image_src_input.val('');
                    image_caption_input.val('');
                    console.log(data);
                    product_id_input.val(data);
                },
                error: function(xhr, status, message){
                    console.log(xhr.responseText);
                }
            });
        })

        $('body').on('submit', '#customer_contact_form', function(event){
            event.preventDefault();

            var url = $(this).attr('action');
            var data = $(this).serialize();
            var submitBtnDiv = $(this).find('#submitBtnDiv');

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    var html_string = '<span class="alert alert-success" style="font-family: tahoma, sans-serif; font-weight: bolder; color: green;">Thanks for contacting me! I will get in touch with you as soon as possible.</span>'
                    submitBtnDiv.html(html_string);
                },
                error: function(xhr, status, message){
                    console.log(xhr.responseText);
                }
            })
        })
	// $("#blog_compose_form").submit(function(event){
	// 	event.preventDefault();

	// 	var url = $(this).attr("action");
	// 	var data = $(this).serialize();

	// 	$.ajax({
	// 		url : url,
	// 		type : "POST",
	// 		data : data,
	// 		success : function(data){
	// 			console.log(data);
	// 		},
	// 		error : function(xhr,status,msg){
	// 			console.log(xhr.responseText);
	// 		}
	// 	});
	// });
        
        /*
         * Contact Page Admin
         */
        $('#show_read').click(function(event){
            event.preventDefault();
            $(this).removeClass("btn-default");
            $(this).addClass('btn-primary');
            $('#show_unread').removeClass("btn-primary");
        });
        $('#show_unread').click(function(event){
            event.preventDefault();
            $(this).removeClass("btn-default");
            $(this).addClass('btn-primary');
            $('#show_read').removeClass("btn-primary");
            
        });

        /*
        *| Save Image to server
        */
        $('#image_form').submit(function(e){
            e.preventDefault();

            var url = $(this).attr('action');
            var data = $(this).serialize();
            
            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function (data){
                    data = $.parseJSON(data);
                    console.log(data.url);
                },
                error: function (xhr, status, msg){
                    console.log(xhr.responseText);
                }
            })
        })
        
        $('#cmn-toggle-1').click(function(){
            $('.list').toggle('slow');
            $('.blocks').toggle('slow');
        });

        /* OFFER PAGE PRICE ESTIMATION */
        $('#btn_estimate').click(function (){
            $('.custom-modal').show(200);
        });
        $('#close_custom_modal').click(function (){
            $('.custom-modal').hide(200);
        });
        
    CKEDITOR.replace('content');


    deleteRelatedBlog();

});

function previewText(){
    var text = $("#about").val();
    console.log(text);
//    text = $.parseHTML(text);
//        console.log(text[0].data);
    $("#preview_pane").html("<p>"+text+"</p>");
}

function getRelatedBlog(e){
   var related_blog_iframe = $('#related_blog_iframe');
   var r_blog_id = $('#related_blog option:selected').val();
   var blog_id = $('#blog_id').val();
   var base_location = 'http://varunshrivastava.azurewebsites.net/';
   var target_controller = 'index.php/admin/singleBlog/';
   var url = base_location + target_controller + blog_id + '/' +r_blog_id;
   $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        success: function(data){
            console.log(data);
            var html_string = '<div id="related_blog_heading">'+
                                '<span class="heading pull-left">'+data.heading+
                                '</span>'+
                                '<span class="pull-right delete" id="delete_r_blog">'+
                                '<a href="'+base_location+'index.php/admin/deleteRelatedBlog/'+data.id+'">delete</a>'+
                                '</span>'+
                                '</div>';
            related_blog_iframe.append(html_string);
        },
        error: function (xhr, status, err){
            console.log(xhr.responseText);
        }
   });

}

function deleteRelatedBlog(){
    $('body').on('click', '#delete_r_blog', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var row = $(this).parent().parent();

        $.ajax({
            url: url,
            type: 'DELETE',
            success: function(){
                row.remove();
            },
            error: function(xhr, status, err){
                console.log(xhr.responseText);
            }
        });
    });
}

function getCurrentDate(){
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var currentDate = year+'/'+month+'/'+day;
    return currentDate;
}