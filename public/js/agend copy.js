$(document).ready(function () {
    $('input[name=phone]').mask('(99) 9 9999-9999')
  })

  $(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }
});



$(document).ready(function () {

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

var calendar = $('#calendar').fullCalendar({
    contentHeight: 500,
    editable:true,
    locale:'pt-br',
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },
    events:'/agend',
    selectable:true,
    selectHelper: true,
    select:function(start, end, allDay)
    {
        var title = prompt('Paciente:');

        if(title)
        {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

            $.ajax({
                url:"/agend/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    type: 'add'
                },
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Agenda criada com sucesso");
                }
            })
        }
    },
    editable:true,
    eventResize: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"/agend/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Agenda atualizada com sucesso!");
            }
        })

    },

    eventDrop: function(event, delta)
{
    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
    var title = event.title;
    var id = event.id;
    $.ajax({
        url:"/agend/action",
        type:"POST",
        data:{
            title: title,
            start: start,
            end: end,
            id: id,
            type: 'update'
        },
        success:function(response)
        {
            calendar.fullCalendar('refetchEvents');
            alert("Agenda Atualizada com Sucesso");
        }
    })
},

eventClick:function(event)
{
    if(confirm("Deseja Remover?"))
    {
        var id = event.id;
        $.ajax({
            url:"/agend/action",
            type:"POST",
            data:{
                id:id,
                type:"delete"
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Agenda Deletada com Sucesso!");
            }
        })
    }
}

});
    
    
});