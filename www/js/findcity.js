$(function (){
    $("#city").keyup(function(){
        var search = $("#city").val();
        console.log(search);
        if (search.length>1){
            $.ajax({
                type: "POST",
                url: "searchcity.php",
                data: {"search": search},
                cache: false,
                success: function (response) {
                    $(".checkboxescity").toggle();
                    $(".checkboxescity").html(response);
                    $(".city_s").click(function(){
                        $("#city").html(this);
                        $(".checkboxescity").toggle();
                    });
                }
            });
        }
        else{
            $(".checkboxescity").html('');
        }
        return false;
    });
});