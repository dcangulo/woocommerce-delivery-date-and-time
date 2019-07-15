document.addEventListener('DOMContentLoaded', () => {
  const validDate = new Date().fp_incr(wcdd.settings.preparation_days || 0)

  flatpickr('.wcdd-date-time-field', {
    enableTime: true,
    dateFormat: 'Y-m-d H:i:S',
    altInput: true,
    altFormat: 'F j, Y h:i K',
    disableMobile: true,
    minDate: validDate,
    disable: wcdd.settings.disabled_dates,
    minTime: wcdd.settings.start_time,
    maxTime: wcdd.settings.end_time
  })
})
