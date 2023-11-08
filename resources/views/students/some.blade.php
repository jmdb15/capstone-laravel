@include('partials.__header')
@include('partials.__navbar')

  <form action="export-events" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">Excel Event</button>
  </form>
  <form action="export-events-pdf" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">PDF Events</button>
  </form>
  <form action="export-users" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">Excel Users</button>
  </form>
  <form action="export-users-pdf" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">PDF Users</button>
  </form>
  <form action="export-logs" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">Excel Logs</button>
  </form>
  <form action="export-logs-pdf" method="GET">
    <button type="submit" class="py-2 px-4 rounded-lg bg-green-400 cursor-pointer">PDF Logs</button>
  </form>

</body>
</html>