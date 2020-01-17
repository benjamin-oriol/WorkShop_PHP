let submitButton = document.getElementById('bookingSubmit') 
let startTimeHour = document.getElementById('booking_startDate_time_hour')
let startTimeMinute = document.getElementById('booking_startDate_time_minute')
let timeRange = document.getElementById('booking_timeRange')

startTimeHour.addEventListener('change', (e) => {
  if(startTimeHour.value === '16') {
    disabledTimeRange(2)
    if(startTimeMinute.value === '30') {
      disabledTimeRange(1)
    }
  } else {
    cleanTimeRange(2)
    cleanTimeRange(1)
  }
})

startTimeMinute.addEventListener('change', (e) => {
  if(startTimeHour.value === '16' && startTimeMinute.value === '30') {
    disabledTimeRange(1)
  } else {
    cleanTimeRange(1)
  }
  isValidPeriod()
})

function disabledTimeRange(index) {
  timeRange.childNodes[index].setAttribute("disabled", true)
    timeRange.childNodes[index].style.backgroundColor = "#777"
}

function cleanTimeRange(index) {
  timeRange.childNodes[index].removeAttribute("disabled", false)
  timeRange.childNodes[index].style.backgroundColor = "#fff"
}

function disabledSubmit(value) {
  if(value) {
    submitButton.setAttribute("disabled", true)
  } else {
    submitButton.removeAttribute("disabled", false)
  }  
}

function isValidPeriod() {
  timeRange.childNodes.forEach(elt => {
    if(elt.hasAttribute("selected")) {
      if(elt.value === '1' && startTimeHour.value === '16' && startTimeMinute.value === '30') {
        disabledSubmit(true)
      }
      if(elt.value === '2' && startTimeHour.value === '16') {
        disabledSubmit(true)
      }
    }
  });
}

