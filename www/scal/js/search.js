/**
 * Created by Администратор on 11.11.2016.
 */
$(function(){
    $("#find").keyup(function(){
        var search = $("#find").val();
        alert(search);
        if (search.length>3){
            $.ajax({
                type: "POST",
                url: "search.php",
                data: {"search": search},
                cache: false,
                success: function (response) {
                    $("#resSearch").html(response);
                }
            });
        }
        else{
            $("#resSearch").html('');
        }
        return false;
    });
});