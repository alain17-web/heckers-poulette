$('form').submit(function(){    
    if ($('input#website').val().length != 0 || $('input#name').val().length == 0 || $('input#gender').val().length == 0 || $('input#email').val().length == 0 || $('input#country').val().length == 0 || $('input#message').val().length == 0){
        return false;
    }
    
});

