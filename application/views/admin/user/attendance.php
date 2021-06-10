<?php if(empty($singleUser)) { ?> 

            <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Select Employee to See Attendance</h3>
                            <!-- <select class="form-control select2 emp_namesData">
                                <option disabled="disabled">Select</option>
                                <?php foreach ($users as $user) { ?>
                                     <?php if ($user['role'] != 'admin'){ ?>
                                        <option value="<?=$user['id'];?>"><?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>   -->                         
                        </div>
                    </div>
            </div>

<?php } else {  


	// echo "<pre>";
 //    print_r($emp_attendance);
 //    die;
    $newEmp_timeDetails = $timeDetails = $dateCheckArray = array(); 
    $totalTime = 0;
    foreach ($emp_attendance  as $key => $value) {

            $timeDetails = array();

            $timeDetails['id'] = $value['id'];
            $timeDetails['start'] = $value['login'];
            $timeDetails['end'] = $value['logout'];
            $timeDetails['title'] = my_date_only_time($value['login'])."-".my_date_only_time($value['logout']);

            $to_time = strtotime($value['logout']);
			$from_time = strtotime($value['login']);

			if(array_key_exists(my_date_show($value['login']), $dateCheckArray)){
				$dateCheckArray[my_date_show($value['login'])] = $totalTime += round(abs($to_time - $from_time) / 60,0);

			} else{
				$totalTime = 0;
				$dateCheckArray = array();
				$dateCheckArray[my_date_show($value['login'])] = $totalTime += round(abs($to_time - $from_time) / 60,0);
			}

              // $timeDetails['totaltimeSMinutes'] = round(abs($to_time - $from_time) / 60,0);
              // $timeDetails['totaltimeSpent'] = $totalTime;
             // $timeDetails['totaltimeSpent'] = $dateCheckArray;

        $newEmp_timeDetails[] = $timeDetails;
        $time_spent_byDate[my_date_show($value['login'])]['timeSpent'] = $totalTime;
    }

foreach ($newEmp_timeDetails as $key => $value) {
		
		if(array_key_exists(my_date_show($value['start']), $time_spent_byDate)){
			$minutes =  $time_spent_byDate[my_date_show($value['start'])]['timeSpent'];
			$newEmp_timeDetails[$key]['totalHours'] = hoursandmins($minutes, '%02d Hours, %02d Minutes');
		}
}

$json_empData = json_encode($newEmp_timeDetails);

} ?> 
<style type="text/css">
	strong.timeClass {
	    color: black;
	    text-decoration: underline;
	    font-size: 23px;
	}
	label.timeLabel {
	    color: black !important;
	    font-size: 25px;
	}
</style>

 <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="card-body">
                    <div id="custom_calendar"></div>
                    <div class="modal fade none-border" id="my-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Total Working Hours</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--   <div class="modal fade none-border" id="add-new-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
        </div>
        
    </div>
    <!-- Row -->

<script>
 
$(document).ready(function () {
    // var calendar = $('#custom_calendar').fullCalendar({
    //     header: {
    //     left: 'prev,next today',
    //     center: 'title',
    //     // right: 'month,basicWeek,basicDay'
    //     },
    //         editable: true,
    //         droppable: true, // this allows things to be dropped onto the calendar !!!
    //         eventLimit: true, // allow "more" link when too many events
    //         selectable: true,
    //         // events: "all_events.php",
    //         events: <?=$json_empData;?>,
    //     displayEventTime: true,
        
    //      drop: function(date) { $this.onDrop($(this), date); },
    //         select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
    //         eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); },

    //     eventRender: function (event, element, view) {
    //         if (event.allDay === 'true') {
    //             event.allDay = true;
    //         } else {
    //             event.allDay = false;
    //         }
    //     }
 
    // });

!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#custom_calendar'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#my-event'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };


    /* on drop */
    // CalendarApp.prototype.onDrop = function (eventObj, date) { 
    //     var $this = this;
    //         // retrieve the dropped element's stored Event Object
    //         var originalEventObject = eventObj.data('eventObject');
    //         var $categoryClass = eventObj.attr('data-class');
    //         // we need to copy it, so that multiple events don't have a reference to the same object
    //         var copiedEventObject = $.extend({}, originalEventObject);
    //         // assign it the date that was reported
    //         copiedEventObject.start = date;
    //         if ($categoryClass)
    //             copiedEventObject['className'] = [$categoryClass];
    //         // render the event on the calendar
    //         $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
    //         // is the "remove after drop" checkbox checked?
    //         if ($('#drop-remove').is(':checked')) {
    //             // if so, remove the element from the "Draggable Events" list
    //             eventObj.remove();
    //         }
    // },
    /* on click on event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view , event) {
        var $this = this;
        // console.log(calEvent._id);
        // console.log(jsEvent);
        // console.log(view);
        console.log(moment(calEvent.start).format()	);
            var form = $("<form></form>");
            // form.append("<label>Total Hours for '"+moment(calEvent.start).format('LL') +"': </label>  "+ calEvent.totalHours);
            form.append("<label class='timeLabel'>Total Hours for "+ moment(calEvent.start).format('LL') +": </label> <br><strong class='timeClass'>"+  calEvent.totalHours+"</strong>");
            //form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
                return false;
            });
    },
    /* on select */
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
    	alert("KArthik");
    	console.log(start);
    	console.log(end);
    	console.log(allDay);
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-pink'>Pink</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);  
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;
                
            });
            $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,  displayEventTime : false, 
             
            header: {
                left: 'prev,next today',
                center: 'title',
                 // right: 'month,agendaWeek,agendaDay'
                 right: ''
            },
            events: <?=$json_empData;?>,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: false,
            // drop: function(date) { $this.onDrop($(this), date); },
         //    eventRender: function(event, element) { 
         //    	console.log(event);
         //    	console.log(element);
	        //    element.find('.fc-title').append("<br/>" +event.totalHours); 
	        //     // element.find('.fc-widget-content').append("<br/>" + event.description); 
	        // },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }
          //   eventClick: function(event, element) { 
	         //    // 	console.log(event);
	         //    // 	console.log(element);
		        //    // element.find('.fc-title').append("<br/>" +event.totalHours); 
		        //    alert("Total Hours "+event.totalHours);
		        //     // element.find('.fc-widget-content').append("<br/>" + event.description); 
		        // }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
});

 
</script>