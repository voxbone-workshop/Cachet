<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['geochart'],
    'mapsApiKey': 'AIzaSyBiY_D-mnUuW9fFNLu_D5f-J9MYqhxFv2Y'
  });

  google.charts.setOnLoadCallback(() => drawRegionsMap('{{ $incident->id }}'));
  google.charts.setOnLoadCallback(() => drawMarkersMap('{{ $incident->id }}'));
</script>

<div class="container">
  <div id="mixed_display_modes">
    <div id="region_map">
    </div>
    <div id="marker_map">
    </div>
  </div>
</div>
