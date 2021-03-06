document.addEventListener('DOMContentLoaded', function() {
    var initialTimeZone = 'local';
    var timeZoneSelectorEl = document.getElementById('time-zone-selector');
    var loadingEl = document.getElementById('loading');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        timeZone: initialTimeZone,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        //initialDate: '2019-05-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true,
        selectable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: 'list_eventos.php',
        extraParams: function() {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function(info) {
            $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + info.event.id)
            info.jsEvent.preventDefault();
            $('#vizualizar #id').text(info.event.id);
            $('#vizualizar #id').val(info.event.id);


            $('#vizualizar #title').text(info.event.title);
            $('#vizualizar #title').val(info.event.title);

            $('#vizualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());

            $('#visualizar #color').val(info.event.backgroundColor);

      //      $('#vizualizar #end').text(info.event.end.toLocaleString());
            $('#vizualizar').modal('show');
        },
        select:function(info){
           // alert('Inicio da Consulta: '+info.start.toLocaleString());
           $('#cadastrar #start').val(info.start.toLocaleString());
         //  $('#cadastrar #end').val(info.start.toLocaleString());
           $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

$(document).ready(function(){
    $("#addEvent").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            method: "POST",
            url:"cad_event.php",
            data:new FormData(this),
            contentType: false,
            processData:false,
            success: function (retorna){
                if(retorna['sit']){
                   // $('#msg-cad').html(retorna['msg']);
                   location.reload();
                }else{
                    $('#msg-cad').html(retorna['msg']);
                }
            }
        })
    });

    $('.btn-canc-vis').on("click", function () {
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    });

    
    $('.btn-canc-edit').on("click", function () {
        $('.formedit').slideToggle();
        $('.visevent').slideToggle();
    });

    $("#editevent").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            method: "POST",
            url:"edit_event.php",
            data:new FormData(this),
            contentType: false,
            processData:false,
            success: function (retorna){
                if(retorna['sit']){
                   // $('#msg-cad').html(retorna['msg']);
                   location.reload();
                }else{
                    $('#msg-edit').html(retorna['msg']);
                }
            }
        })
    });
});



