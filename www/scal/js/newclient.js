function new_client(){
    $('#rpanel').load('addclient.php',
        function (){
            $("#datepicker").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']
            });
            $("#datepicker2").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']
            });
            $("#datepicker3").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']
            });
            $("#selnoz").change(function(){
                var cost = $(this).children(":selected").attr("id");
                $("#cost").val(cost);
                var sec;
                sec = $("#selnoz").val();
                $.ajax({
                    type: "GET",
                    url : "select_op.php",
                    data: { id: sec},
                    dataType:'json',
                    success: function(data) {
                        var select = $("#checkboxesCat"), options = '';
                        select.empty();
                        for(var i=0;i<data.length; i++)
                        {
                           // options += "<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                        options += "<label><input type='checkbox' name='categ[]' value='"+data[i].id+"'/>"+data[i].name+"</label>";
                            //console.log(options);
                        }
                        select.append(options);

                    }
                });
            })


        });
};
function addgetclient(){
    var DataForm = $('#client-sky-form').serializeArray();
    console.log(DataForm);
    $.ajax({
        type: "POST",
        url: "addgetclient.php",
        data: DataForm,
        success:function(data, textStatus, jqXHR)
        {
        $('#msg').html(data);
        }
    })
}
