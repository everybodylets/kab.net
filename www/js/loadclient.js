function load_client(id){
    var disableddates = ["20-11-2016", "12-11-2016", "11-11-2016", "12-12-2016"];


    function DisableSpecificDates(date) {
        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
        return [disableddates.indexOf(string) == -1];
    }

    $('#rpanel').load('testcl.php?id=' + id,
        function (){
            $("#datepicker").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                beforeShowDay: DisableSpecificDates
            });
            $("#datepicker2").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                beforeShowDay: DisableSpecificDates
            });
            $("#datepicker3").datepicker({
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'],
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                beforeShowDay: DisableSpecificDates
            });
            $("#selnoz").change(function(){
                var cost = $(this).children(":selected").attr("id");
                $("#cost").val(cost);
                //console.log(cost);
                var sec;
                cleanDop();
                sec = $("#selnoz").val();
                $.ajax({
                    type: "GET",
                    url : "select_op.php",
                    data: { id: sec},
                    dataType:'json',
                    success: function(data) {
                        var select = $("#checkboxesOp"), options = '';
                        select.empty();
                        for(var i=0;i<data.length; i++)
                        {
                            options += "<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                            //options += "<label><input type='checkbox' name='categ[]' value='"+data[i].id+"'/>"+data[i].name+"</label>";
                            //console.log(options);
                        }
                        select.append(options);

                    }
                });
                $.ajax({
                    type: "GET",
                    url : "select_dop.php",
                    //data: { id: sec},
                    dataType:'json',
                    success: function(data) {
                        var selectDop = $("#checkboxesDop"), optionsDop = '';
                        selectDop.empty();
                        for(var i=0;i<data.length; i++)
                        {
                            //options += "<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                            optionsDop += "<label><input class='single-checkbox' type='checkbox' id='"+data[i].price+"' name='categ[]' value='"+data[i].id+"' onChange='countDop()'/>"+data[i].name+" - "+data[i].price+"</label>";
                            //console.log(options);
                        }
                        selectDop.append(optionsDop);
                        var limit = 6;
                        $('input.single-checkbox').on('change', function(evt) {
                            if($(this).siblings(':checked').length >= limit) {
                                this.checked = false;
                            }
                        });
                    }
                });
            })
        });
};
function cleanDop(){
    var inputElems = document.getElementsByName("categ[]");
    for (var i=0; i<inputElems.length; i++) {
        inputElems[i].checked = false;
        $("#costDop").val('');
        document.getElementById("CountCat").innerHTML = "Выбрано: 0"
    }
}
function addupdclient(){
    var DataForm = $('#upd-sky-form').serializeArray();
    console.log(DataForm);
    $.ajax({
        type: "POST",
        url: "addupdclient.php",
        data: DataForm,
        success:function(data, textStatus, jqXHR)
        {
            load_client(data);
        }
    })
}