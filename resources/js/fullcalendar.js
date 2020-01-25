document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pl',
        plugins: ['dayGrid'],
        defaultView: 'dayGridMonth',
        events: [
            {
                start: '2020-01-25',
                end: '2020-01-30'
            },
        ]
    });

    calendar.render();
});