$(document).ready(function () {
    $('#format_hint').click(function (e) {
        e.preventDefault();
        $('#format_hint_info').show();
        console.log();
    })

    $('#close-format-hint').click(function () {
        $('#format_hint_info').hide();
    })

    $('#posted_on').val(getCurrentDate());
})

function getCurrentDate(){
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var currentDate = year+'/'+month+'/'+day;
    return currentDate;
}