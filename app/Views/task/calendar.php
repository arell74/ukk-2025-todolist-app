<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">
  <div class="card-body">
    <h4>Kalender Tugas</h4>
    <div id="calendar"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: '/task/events',
      eventClick: function(info) {
        Swal.fire({
          title: info.event.title,
          text: info.event.extendedProps.description,
          icon: 'info',
        });
      }
    });

    calendar.render();
  });
</script>

<?= $this->endSection(); ?>