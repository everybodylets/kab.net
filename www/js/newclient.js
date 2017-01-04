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
                    url : "select_ob.php",
                    data: { id: sec},
                    dataType:'json',
                    success: function(data) {
                        var select = $("#checkboxesOb"), options = '';
                        var obescost = 0;
                        select.empty();
                        for(var i=0;i<data.length; i++)
                        {
                            options += "<option value='"+data[i].id+"'>"+data[i].name+" - "+data[i].price+"</option>";
                            obescost = (+obescost + +data[i].price);
                        }
                        select.append(options);
                        $("#costObes").val(obescost.toFixed(2));
                        countDop();
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
                        var limit = 3;
                        $('input.single-checkbox').on('change', function(evt) {
                            if($(this).siblings(':checked').length >= limit) {
                                this.checked = false;
                            }
                        });
                    }
                });

            });
            countDop();
        });
};
function cleanDop() {
    var inputElems = document.getElementsByName("categ[]");
    for (var i = 0; i < inputElems.length; i++) {
        inputElems[i].checked = false;
        $("#costDop").val('');
        document.getElementById("CountCat").innerHTML = "Выбрано: 0"
    }
};
function addgetclient(){
    var errors=0;
    $("#client-sky-form :input").map(function(){
        if( !$(this).val() ) {
            $(this).parents('section').addClass('warning');
            errors++;
        } else if ($(this).val()) {
            $(this).parents('section').removeClass('warning');
        }
    });

            if(errors==0) {
                var DataForm = $('#client-sky-form').serializeArray();
                $.ajax({
                    type: "POST",
                    url: "addgetclient.php",
                    data: DataForm,
                    success: function (data) {
                        load_client(data);
                    }
                })
            }
            else{
                alert("Заполните все поля!");
            }

    }

