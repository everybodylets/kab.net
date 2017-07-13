var expandedCat = false;
function showCheckboxesCat() {
    var checkboxes = document.getElementById("checkboxesDop");
    if (!expandedCat) {
        checkboxes.style.display = "block";
        expandedCat = true;
        document.getElementById("OptDop").innerHTML = "Закрыть выбор";
    } else {
        checkboxes.style.display = "none";
        expandedCat = false;
        document.getElementById("OptDop").innerHTML = "Выберите дополнения";


    }
}
function countDop(){
    var inputElems = document.getElementsByName("categ[]"),
        count = 0;
    countPrice = 0;
    for (var i=0; i<inputElems.length; i++) {
        if (inputElems[i].type === "checkbox" && inputElems[i].checked === true){
            if(count<3){
                count++;
                countPrice = parseFloat(countPrice)+parseFloat(inputElems[i].id);}
            else{
                inputElems[i].checked = false;}

        }
    }
    $("#costDop").val(countPrice.toFixed(2));
    var costObes = $("#costObes").val();
    var cost = $("#cost").val();
    var countAll = (+countPrice + +cost + +costObes);
    $("#costAll").val(countAll.toFixed(2));
    document.getElementById("CountCat").innerHTML = "Выбрано: " + count;

}


function updnoz(co, mod, sw) {
    var codi = document.getElementById('cod'+co);
    var namei = document.getElementById('name'+co);
    var pricei = document.getElementById('price'+co);
    $.ajax({
        type: "POST",
        url: "updnoz.php",
        data: {id:co, cod:codi.value, name:namei.value, price:pricei.value, mode:mod},
        success: function () {
            setting(sw);
        }
    })
}
function addnoz(mod, sw) {
    var codi = document.getElementById('codnew');
    var namei = document.getElementById('namenew');
    var pricei = document.getElementById('pricenew');
    $.ajax({
        type: "POST",
        url: "addnoz.php",
        data: {id:co, cod:codi.value, name:namei.value, price:pricei.value, mode:mod},
        success: function () {
            setting(sw);
        }
    })
}

function setting(sw){
    if(sw==1) {$('#rpanel').load('setting.php');}
    else if(sw==3) {$('#rpanel').load('settingdop.php');}
    else if(sw==2) {
        $('#rpanel').load('settingobes.php', function(){
            $("#selnoz").change(function(){
                var sec = $("#selnoz").val();
                listobes(sec);
            });
        });
        listobes('1');
    }
}
function listobes(vv){
    $('#noznew').val(vv);
    $.ajax({
        type: "GET",
        url : "select_ob.php",
        data: {id: vv},
        dataType:'json',
        success: function(data) {
            var list = $("#field"), options = '';
            list.empty();
            for(var i=0;i<data.length; i++)
            {options += "<fieldset><input id='cod"+data[i].id+"' type='text' value="+data[i].id+" style='display:none'><section class='sec'><label class='label'>Название</label><label class='input state-success'><input id='name"+data[i].id+"' type='text' name='name' autocomplete='off' value='"+data[i].name+"'></label></section><section class='sec'><label class='label'>Цена</label><label class='input state-success'><input id='price"+data[i].id+"' type='text' name='price' autocomplete='off' value='" + data[i].price + "'></label></section><section><input class='buttonsub' type='button' value='Обновить' onclick='updnoz("+data[i].id+", \"updobes\", 2)'></section></fieldset>";}
            list.append(options);
        }
    });
}
