function load_client(id){
    var disableddates = ["20-11-2016", "12-11-2016", "11-11-2016", "12-12-2016"];


    function DisableSpecificDates(date) {
        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
        return [disableddates.indexOf(string) == -1];
    }

    $('#rpanel').load('client.php?id=' + id,
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
        });
};
