<?php
   //check for valid user 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>

    <title>Add Schedule</title>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <script src="js/mobiscroll.javascript.min.js"></script>

    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        height: 100%;
    }

    </style>

</head>
<body>

<div class="limiter">
        <header>
            <?php include('./lib/navDoctor.php'); ?>
            </header>
 <form action="./process/addSchedule.php" method="POST">
     <div id="main">
<div mbsc-page class="demo-create-read-update-delete-CRUD">
  <div style="height:100%">
      <div id="demo-add-delete-event"></div>
    
    <div id="demo-add-popup">
        <div class="mbsc-form-group">
            <label>
                Title
                <input mbsc-input id="event-title">
            </label>
            <label>
                Description
                <textarea mbsc-textarea id="event-desc"></textarea>
            </label>
        </div>
        <div class="mbsc-form-group">
            <label for="event-all-day">
                All-day
                <input mbsc-switch id="event-all-day" type="checkbox" />
            </label>
            <label for="start-input">
                Date
                <input mbsc-input id="start-input" name="day" />
            </label>
            <!-- <label for="end-input">
                Ends
                <input mbsc-input id="end-input" />
            </label> -->
            <div id="event-date"></div>
            <label>
                Show as busy
                <input id="event-status-busy" mbsc-segmented type="radio" name="event-status" value="busy">
            </label>
            <label>
                Show as free
                <input id="event-status-free" mbsc-segmented type="radio" name="event-status" value="free">
            </label>
            <div class="mbsc-button-group">
                <button class="mbsc-button-block" id="event-delete" mbsc-button data-color="danger" data-variant="outline">Delete event</button>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</form>
</div>

<script>

    mobiscroll.setOptions({
        locale: mobiscroll.localeEn,       // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                      // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light'              // More info about themeVariant: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-themeVariant
    });
    
    var oldEvent,
        tempEvent = {},
        deleteEvent,
        restoreEvent,
        titleInput = document.getElementById('event-title'),
        descriptionTextarea = document.getElementById('event-desc'),
        allDaySwitch = document.getElementById('event-all-day'),
        freeSegmented = document.getElementById('event-status-free'),
        busySegmented = document.getElementById('event-status-busy'),
        deleteButton = document.getElementById('event-delete'),
        datePickerResponsive = {
            medium: {
                controls: ['calendar'],
                touchUi: false
            }
        },
        datetimePickerResponsive = {
            medium: {
                controls: ['calendar', 'time'],
                touchUi: false
            }
        },
        now = new Date(),
        myData = [{
            id: 1,
            start: new Date(now.getFullYear(), now.getMonth(), 8, 13),
            end: new Date(now.getFullYear(), now.getMonth(), 8, 13, 30),
            title: 'Lunch @ Butcher\'s',
            color: '#26c57d'
        }, {
            id: 2,
            start: new Date(now.getFullYear(), now.getMonth(), now.getDate(), 15),
            end: new Date(now.getFullYear(), now.getMonth(), now.getDate(), 16),
            title: 'General orientation',
            color: '#fd966a'
        }, {
            id: 3,
            start: new Date(now.getFullYear(), now.getMonth(), now.getDate() - 1, 18),
            end: new Date(now.getFullYear(), now.getMonth(), now.getDate() - 1, 22),
            title: 'Dexter BD',
            color: '#37bbe4'
        }, {
            id: 4,
            start: new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 10, 30),
            end: new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 11, 30),
            title: 'Stakeholder mtg.',
            color: '#d00f0f'
        }];
    
    function createAddPopup(elm) {
        // hide delete button inside add popup
        deleteButton.style.display = 'none';
    
        deleteEvent = true;
        restoreEvent = false;
    
        // set popup header text and buttons for adding
        popup.setOptions({
            headerText: 'New event',       // More info about headerText: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-headerText
            buttons: ['cancel', {          // More info about buttons: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-buttons
                url: "./process/addSchedule.php",
                text: 'Add',
                keyCode: 'enter',
                handler: function () {
                    calendar.updateEvent({
                        id: tempEvent.id,
                        title: tempEvent.title,
                        description: tempEvent.description,
                        allDay: tempEvent.allDay,
                        start: tempEvent.start,
                        end: tempEvent.end,
                        color: tempEvent.color,
                    });
    
                    // navigate the calendar to the correct view
                    calendar.navigate(tempEvent.start);
    
                    deleteEvent = false;
                    popup.close();
                },
                cssClass: 'mbsc-popup-button-primary'
            }]
        });
    
        // fill popup with a new event data
        mobiscroll.getInst(titleInput).value = tempEvent.title;
        mobiscroll.getInst(descriptionTextarea).value = '';
        mobiscroll.getInst(allDaySwitch).checked = true;
        range.setVal([tempEvent.start, tempEvent.end]);
        mobiscroll.getInst(busySegmented).checked = true;
        range.setOptions({ controls: ['date'], responsive: datePickerResponsive });
    
        // set anchor for the popup
        popup.setOptions({ anchor: elm });
    
        popup.open();
    }
    
    function createEditPopup(args) {
        var ev = args.event;
    
        // show delete button inside edit popup
        deleteButton.style.display = 'block';
    
        deleteEvent = false;
        restoreEvent = true;
    
        // set popup header text and buttons for editing
        popup.setOptions({
            headerText: 'Edit event',      // More info about headerText: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-headerText
            buttons: ['cancel', {          // More info about buttons: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-buttons
                text: 'Save',
                keyCode: 'enter',
                handler: function () {
                    var date = range.getVal();
                    // update event with the new properties on save button click
                    calendar.updateEvent({
                        id: ev.id,
                        title: titleInput.value,
                        description: descriptionTextarea.value,
                        allDay: mobiscroll.getInst(allDaySwitch).checked,
                        start: date[0],
                        end: date[1],
                        time: time,
                        free: mobiscroll.getInst(freeSegmented).checked,
                        color: ev.color,
                    });
    
                    // navigate the calendar to the correct view
                    calendar.navigate(date[0]);;
    
                    restoreEvent = false;
                    popup.close();
                },
                cssClass: 'mbsc-popup-button-primary'
            }]
        });
    
        // fill popup with the selected event data
        mobiscroll.getInst(titleInput).value = ev.title || '';
        mobiscroll.getInst(descriptionTextarea).value = ev.description || '';
        mobiscroll.getInst(allDaySwitch).checked = ev.allDay || false;
        range.setVal([ev.start, ev.end]);
    
        if (ev.free) {
            mobiscroll.getInst(freeSegmented).checked = true;
        } else {
            mobiscroll.getInst(busySegmented).checked = true;
        }
    
        // change range settings based on the allDay
        range.setOptions({
            controls: ev.allDay ? ['date'] : ['datetime'],
            responsive: ev.allDay ? datePickerResponsive : datetimePickerResponsive
        });
    
        // set anchor for the popup
        popup.setOptions({ anchor: args.domEvent.currentTarget });
        popup.open();
    }
    
    var calendar = mobiscroll.eventcalendar('#demo-add-delete-event', {
        clickToCreate: 'double',           // More info about clickToCreate: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-clickToCreate
        dragToCreate: true,                // More info about dragToCreate: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-dragToCreate
        dragToMove: true,                  // More info about dragToMove: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-dragToMove
        dragToResize: true,                // More info about dragToResize: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-dragToResize
        view: {                            // More info about view: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-view
            calendar: { labels: true }
        },
        data: myData,                      // More info about data: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-data
        onEventClick: function (args) {    // More info about onEventClick: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#event-onEventClick
            oldEvent = { ...args.event };
            tempEvent = args.event;
    
            if (!popup.isVisible()) {
                createEditPopup(args);
            }
        },
        onEventCreated: function (args) {  // More info about onEventCreated: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#event-onEventCreated
            popup.close();
            // store temporary event
            tempEvent = args.event;
            createAddPopup(args.target);
        },
        onEventDeleted: function () {      // More info about onEventDeleted: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#event-onEventDeleted
            mobiscroll.snackbar({ 
                button: {
                    action: function () {
                        calendar.addEvent(args.event);
                    },
                    text: 'Undo'
                },
                message: 'Event deleted'
            });
        }
    });
    
    var popup = mobiscroll.popup('#demo-add-popup', {
        display: 'bottom',                 // Specify display mode like: display: 'bottom' or omit setting to use default
        contentPadding: false,
        fullScreen: true,
        onClose: function () {             // More info about onClose: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#event-onClose
            if (deleteEvent) {
                calendar.removeEvent(tempEvent);
            } else if (restoreEvent) {
                calendar.updateEvent(oldEvent);
            }
        },
        responsive: {                      // More info about responsive: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-responsive
            medium: {
                display: 'anchored',       // Specify display mode like: display: 'bottom' or omit setting to use default
                width: 400,                // More info about width: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-width
                fullScreen: false,
                touchUi: false
            }
        }
    });
    
    titleInput.addEventListener('input', function (ev) {
        // update current event's title
        tempEvent.title = ev.target.value;
    });
    
    descriptionTextarea.addEventListener('change', function (ev) {
        // update current event's title
        tempEvent.description = ev.target.value;
    });
    
    allDaySwitch.addEventListener('change', function () {
        var checked = this.checked
        // change range settings based on the allDay
        range.setOptions({
            controls: checked ? ['date'] : ['datetime'],
            responsive: checked ? datePickerResponsive : datetimePickerResponsive
        });
    
        // update current event's allDay property
        tempEvent.allDay = checked;
    });
    
    var range = mobiscroll.datepicker('#event-date', {
        controls: ['date'],
        select: 'range',
        startInput: '#start-input',
        endInput: '#end-input',
        showRangeLabels: false,
        touchUi: true,
        responsive: datePickerResponsive,  // More info about responsive: https://docs.mobiscroll.com/5-5-1/javascript/eventcalendar#opt-responsive
        onChange: function (args) {
            var date = args.value;
            // update event's start date
            tempEvent.start = date[0];
            tempEvent.end = date[1];
        }
    });
    
    document.querySelectorAll('input[name=event-status]').forEach(function (elm) {
        elm.addEventListener('change', function () {
            // update current event's free property
            tempEvent.free = mobiscroll.getInst(freeSegmented).checked;
        });
    });
    
    deleteButton.addEventListener('click', function () {
        // delete current event on button click
        calendar.removeEvent(oldEvent);
        popup.close();
    
        // save a local reference to the deleted event
        var deletedEvent = tempEvent;
    
        mobiscroll.snackbar({ 
            button: {
                action: function () {
                    calendar.addEvent(deletedEvent);
                },
                text: 'Undo'
            },
            message: 'Event deleted'
        });
    });
</script>

</body>
</html>
