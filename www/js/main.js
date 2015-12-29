$(function(){
    $.ajax({
        url: window.location,
        success: function(result){
            console.log(result);
        }
    });
});
