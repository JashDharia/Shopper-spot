

function add_event(){
// Refer to the JavaScript quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/js
// Change the scope to 'https://www.googleapis.com/auth/calendar' and delete any
// stored credentials.

  // Refer to the JavaScript quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/js
// Change the scope to 'https://www.googleapis.com/auth/calendar' and delete any
// stored credentials.

var event = {
  'summary': 'Google I/O 2015',
  'location': '800 Howard St., San Francisco, CA 94103',
  'description': 'A chance to hear more about Google\'s developer products.',
  'start': {
    'dateTime': '2015-05-28T09:00:00-07:00',
    'timeZone': 'America/Los_Angeles'
  },
  'end': {
    'dateTime': '2015-05-28T17:00:00-07:00',
    'timeZone': 'America/Los_Angeles'
  },
  'recurrence': [
    'RRULE:FREQ=DAILY;COUNT=2'
  ],
  'attendees': [
    {'email': 'lpage@example.com'},
    {'email': 'sbrin@example.com'}
  ],
  'reminders': {
    'useDefault': false,
    'overrides': [
      {'method': 'email', 'minutes': 24 * 60},
      {'method': 'popup', 'minutes': 10}
    ]
  }
};

var request = gapi.client.calendar.events.insert({
  'calendarId': 'primary',
  'resource': event
});

request.execute(function(event) {
  appendPre('Event created: ' + event.htmlLink);
});

}

function CombineDateAndTime(date, time) {
     const mins = ("0"+ time.getMinutes()).slice(-2);
     const hours = ("0"+ time.getHours()).slice(-2);
     const timeString = hours + ":" + mins + ":00";
     const year = date.getFullYear();
     const month = ("0" + (date.getMonth() + 1)).slice(-2);
     const day = ("0" + date.getDate()).slice(-2);
     const dateString = "" + year + "-" + month + "-" + day;
     const datec = dateString + "T" + timeString;
     return new Date(datec);
};

function deleteEvent(eventId) {

    var params = gapi.client.calendar.events.delete({
        calendarId: 'primary',
        eventId: eventId,
    });

    params.execute(function(resp){
      console.log(resp);
    });

}

