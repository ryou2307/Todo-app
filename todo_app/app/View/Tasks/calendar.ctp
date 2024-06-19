<h2>タスクカレンダー</h2>
<div id="taskDetails" style="margin-bottom: 20px;"></div>
<div id="calendar"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/ja.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

<script>
$(function() {
    var tasks = <?php echo json_encode($tasks); ?>;
    var events = tasks.map(function(task) {
        return {
            title: task.Task.title,
            start: task.Task.due_date,
            id: task.Task.id
        };
    });

    $('#calendar').fullCalendar({
        locale: 'ja',  // 日本語ロケールを設定
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: events,
        eventRender: function(event, element) {
            element.css('background-color', '#ff9999');  // タスクの期限日を目立たせる
        },
        dayClick: function(date, jsEvent, view) {
            var selectedDate = date.format();
            var tasksForDay = tasks.filter(function(task) {
                return task.Task.due_date === selectedDate;
            });

            var taskDetails = '<h3>' + selectedDate + ' のタスク</h3><ul>';
            if (tasksForDay.length > 0) {
                tasksForDay.forEach(function(task) {
                    taskDetails += '<li>' + task.Task.title + '</li>';
                });
            } else {
                taskDetails += '<li>タスクはありません</li>';
            }
            taskDetails += '</ul>';
            $('#taskDetails').html(taskDetails);
        }
    });
});
</script>
