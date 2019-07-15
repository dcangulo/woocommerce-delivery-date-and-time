document.addEventListener('DOMContentLoaded', () => {
  flatpickr('.wcdd-date-multiple-picker', {
    mode: 'multiple',
    dateFormat: 'Y-m-d',
    minDate: new Date()
  })

  flatpickr('.wcdd-time-picker', {
    enableTime: true,
    noCalendar: true,
    dateFormat: 'H:i',
    altInput: true,
    altFormat: 'h:i K'
  })
})
