 //Speakbox
 /*$(document).ready(function(){
    $("input#speaksubmit").on('click',function(){
        var wall_post = $('textarea#speakbox').val();

        if(wall_post == ""){ return false; }
        $.post(base_url + "main/ajax_add_wall_post", {wall_post:wall_post,user_id:user_id}, function(data){
            alert(data);
        },"json");
        return false;
    })
 });