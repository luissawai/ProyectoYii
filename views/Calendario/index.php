<?php

/** @var yii\web\View $this */

$this->title = 'Calendario de Eventos';
?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bienvenido a la gestión de calendarios de eventos</h1>
        <p class="lead">
            Consulta y organiza tus eventos de manera fácil y rápida. Explora el calendario para ver las fechas de tus próximos eventos.
        </p>
    </div>
    
    <div class="card-container">
        <!-- Tarjeta Calendario -->
        <div class="card">
            <div class="card-body">
                <div class="content-container">
                    <div class="text-container">
                        <h5 class="card-title">Ver Calendario de Eventos</h5>
                        <p class="card-text">Consulta las fechas de tus próximos eventos</p>
                        
                        <!-- Calendario -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
use yii\helpers\Url;

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/locale/es.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css');
$this->registerCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
$this->registerJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

// Genera URLs correctas dinámicamente
$urlEventos = Url::to(['calendario/eventos']);
$urlGuardar = Url::to(['calendario/guardar-evento']);

$this->registerJs("
    $(document).ready(function() {
        function actualizarEstiloBotonHoy() {
            var vista = $('#calendar').fullCalendar('getView');
            var fechaActual = vista.intervalStart.clone().startOf('day');
            var hoy = moment().startOf('day');

            if (fechaActual.isSame(hoy, 'day')) {
                // Desactivar botón si ya está en hoy
                $('.fc-button-today').prop('disabled', true).addClass('fc-state-disabled');
            } else {
                $('.fc-button-today').prop('disabled', false).removeClass('fc-state-disabled');
            }
        }

        $('#calendar').fullCalendar({
            locale: 'es',
            selectable: true,
            selectHelper: true,
            editable: false,
            events: '$urlEventos',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            select: function(start, end) {
                var title = prompt('Título del evento:');
                if (title) {
                    $.post('$urlGuardar', {
                        title: title,
                        start: start.format(),
                        end: end.format()
                    }, function(response) {
                        if (response.success) {
                            $('#calendar').fullCalendar('renderEvent', response.evento, true);
                        } else {
                            alert('No se pudo guardar el evento');
                        }
                    });
                }
                $('#calendar').fullCalendar('unselect');
            },
            eventClick: function(event, jsEvent, view) {
                if (confirm('¿Quieres eliminar este evento?')) {
                    $.ajax({
                        url: '" . Url::to(['calendario/eliminar-evento']) . "',
                        type: 'POST',
                        data: { id: event.id },
                        success: function(response) {
                            if (response.success) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                alert('Evento eliminado');
                            } else {
                                alert('No se pudo eliminar el evento: ' + (response.error || 'Desconocido'));
                            }
                        },
                        error: function() {
                            alert('Error al eliminar el evento');
                        }
                    });
                }
            },
            eventRender: function(event, element) {
                if (event.title) {
                    element.attr('title', event.title);
                }
            },
            viewRender: function() {
                actualizarEstiloBotonHoy();
            }
        });

        // También actualizamos al hacer clic en cualquier botón
        $('.fc-button').on('click', function() {
            setTimeout(actualizarEstiloBotonHoy, 0);
        });

        // Primera llamada al cargar
        actualizarEstiloBotonHoy();
    });
");

$this->registerJs("
    $(document).ready(function() {
        function actualizarEstiloBotonHoy() {
            var vista = $('#calendar').fullCalendar('getView');
            var fechaActual = vista.intervalStart.clone().startOf('day');
            var hoy = moment().startOf('day');

            if (fechaActual.isSame(hoy, 'day')) {
                // Desactivar el botón 'Hoy' si estamos en la fecha actual
                $('.fc-button-today').prop('disabled', true)
                                      .addClass('fc-state-disabled')
                                      .css({
                                          'background-color': '#fff',
                                          'color': '#000',   /* Texto negro */
                                          'font-weight': 'bold',  /* Negrita */
                                          'border': '1px solid #ccc'
                                      });
            } else {
                $('.fc-button-today').prop('disabled', false)
                                      .removeClass('fc-state-disabled')
                                      .css({
                                          'background-color': '#d0e7ff',
                                          'color': '#333',
                                          'font-weight': 'normal',
                                          'border': 'none'
                                      });
            }
        }

        $('#calendar').fullCalendar({
            locale: 'es',
            selectable: true,
            selectHelper: true,
            editable: false,
            events: '$urlEventos',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            select: function(start, end) {
                var title = prompt('Título del evento:');
                if (title) {
                    $.post('$urlGuardar', {
                        title: title,
                        start: start.format(),
                        end: end.format()
                    }, function(response) {
                        if (response.success) {
                            $('#calendar').fullCalendar('renderEvent', response.evento, true);
                        } else {
                            alert('No se pudo guardar el evento');
                        }
                    });
                }
                $('#calendar').fullCalendar('unselect');
            },
            eventClick: function(event, jsEvent, view) {
                if (confirm('¿Quieres eliminar este evento?')) {
                    $.ajax({
                        url: '" . Url::to(['calendario/eliminar-evento']) . "',
                        type: 'POST',
                        data: { id: event.id },
                        success: function(response) {
                            if (response.success) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                alert('Evento eliminado');
                            } else {
                                alert('No se pudo eliminar el evento: ' + (response.error || 'Desconocido'));
                            }
                        },
                        error: function() {
                            alert('Error al eliminar el evento');
                        }
                    });
                }
            },
            eventRender: function(event, element) {
                if (event.title) {
                    element.attr('title', event.title);
                }
            },
            viewRender: function() {
                actualizarEstiloBotonHoy();
            }
        });

        // También actualizamos al hacer clic en cualquier botón
        $('.fc-button').on('click', function() {
            setTimeout(actualizarEstiloBotonHoy, 0);
        });

        // Primera llamada al cargar
        actualizarEstiloBotonHoy();
    });
");

$this->registerJs("
    $(document).ready(function() {
        function actualizarEstiloBotonHoy() {
            var vista = $('#calendar').fullCalendar('getView');
            var fechaActual = vista.intervalStart.clone().startOf('day');
            var hoy = moment().startOf('day');

            // Desactivar el botón 'Hoy' si estamos en la fecha actual
            if (fechaActual.isSame(hoy, 'day')) {
                $('.fc-button-today').prop('disabled', true)
                                      .removeClass('fc-state-active')
                                      .addClass('fc-state-disabled');
            } else {
                $('.fc-button-today').prop('disabled', false)
                                      .removeClass('fc-state-disabled')
                                      .addClass('fc-state-active');
            }
        }

        $('#calendar').fullCalendar({
            locale: 'es',
            selectable: true,
            selectHelper: true,
            editable: false,
            events: '$urlEventos',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            select: function(start, end) {
                var title = prompt('Título del evento:');
                if (title) {
                    $.post('$urlGuardar', {
                        title: title,
                        start: start.format(),
                        end: end.format()
                    }, function(response) {
                        if (response.success) {
                            $('#calendar').fullCalendar('renderEvent', response.evento, true);
                        } else {
                            alert('No se pudo guardar el evento');
                        }
                    });
                }
                $('#calendar').fullCalendar('unselect');
            },
            eventClick: function(event, jsEvent, view) {
                if (confirm('¿Quieres eliminar este evento?')) {
                    $.ajax({
                        url: '" . Url::to(['calendario/eliminar-evento']) . "',
                        type: 'POST',
                        data: { id: event.id },
                        success: function(response) {
                            if (response.success) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                alert('Evento eliminado');
                            } else {
                                alert('No se pudo eliminar el evento: ' + (response.error || 'Desconocido'));
                            }
                        },
                        error: function() {
                            alert('Error al eliminar el evento');
                        }
                    });
                }
            },
            eventRender: function(event, element) {
                if (event.title) {
                    element.attr('title', event.title);
                }
            },
            viewRender: function() {
                actualizarEstiloBotonHoy();
            }
        });

        // También actualizamos al hacer clic en cualquier botón
        $('.fc-button').on('click', function() {
            setTimeout(actualizarEstiloBotonHoy, 0);
        });

        // Primera llamada al cargar
        actualizarEstiloBotonHoy();
    });
");



$this->registerCss("
  /* Todos los botones */
.fc-button {
    background-color: #d0e7ff !important; /* Fondo azul clarito por defecto */
    color: #333 !important;               /* Texto gris oscuro */
    font-weight: normal !important;       /* Sin negrita */
    border: none !important;
    border-radius: 5px !important;
    padding: 6px 12px !important;
}

/* Botón Hoy cuando está activo */
.fc-button.fc-button-today.fc-state-active {
    background-color: #007bff !important; /* Azul fuerte */
    color: #fff !important;               /* Texto blanco */
    font-weight: bold !important;         /* Negrita */
}

/* Botón Hoy cuando está deshabilitado (inactivo) */
.fc-button.fc-button-today.fc-state-disabled {
    background-color: #fff !important;    /* Fondo blanco */
    color: #000 !important;               /* Texto negro */
    font-weight: normal !important;       /* No en negrita */
    border: 1px solid #ccc !important;    /* Borde gris claro */
}

/* Botón Hoy cuando no está seleccionado pero está habilitado */
.fc-button.fc-button-today:not(.fc-state-active):not(.fc-state-disabled) {
    background-color: #d0e7ff !important; /* Azul clarito */
    color: #333 !important;               /* Texto gris oscuro */
    font-weight: normal !important;       /* Sin negrita */
}
");






















