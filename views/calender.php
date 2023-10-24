<div class="box box-primary">
  <div class="box-body no-padding">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>
  <!-- /.box-body -->
</div>

<style>
.fc-disabled {
    background-color: #F0F0F0 !important;
    color: #000;
    cursor: default;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:10px;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
</script>
