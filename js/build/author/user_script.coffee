$ ->
    $('#image_form').submit (event) ->
        event.preventDefault()
        loading = "<div id='loader'><img src='http://www.west-info.eu/files/grey-dots.gif' style='height: 75px;' /></div>"
        links = $('#return_server_links')
        $(links).append(loading)
        url = $(this).attr('action')
        data = $(this).serialize()

        $.ajax 
            url: url
            type: 'POST'
            data: data
            success: (data) ->
                data = $.parseJSON(data)
                $(links).append('<p>'+data.url+'</p>')
                $('#loader').remove()
                null
            error: (xhr, status, msg) ->
                console.log(xhr.responseText)

    CKEDITOR.replace('blog_content')

$('.userProfileForm').submit (event) ->
    event.preventDefault()
    url = $(this).attr('action')
    data = $(this).serialize()

    $.ajax
        url: url
        data: data
        type: 'POST'
        success: (data) ->
            Materialize.toast('Updated Successfully!!!', 5000, 'rounded')
        error: (xhr, status, msg) ->
            console.log(xhr)

$('#social_handle_form').submit (event) ->
    event.preventDefault()

    $parentRow = $(this).parents(".row")
    $parentRow = $parentRow[$parentRow.length - 1]
    data = $(this).serialize()
    url = $(this).attr('action')

    $.ajax
        url: url,
        type: 'POST'
        data: data
        success: (data) ->
          Materialize.toast('Data Saved Successfully! Refresh!', 5000, 'rounded')
        error: (xhr, status, msg) ->
            console.log(xhr.responseText)


getCurrentDate ->
    date = new Date();
    day = date.getDate();
    month = date.getMonth()+1;
    year = date.getFullYear();
    currentDate = year+'/'+month+'/'+day;
    currentDate

