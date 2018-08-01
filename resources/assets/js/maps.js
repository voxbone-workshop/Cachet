const voxboneCountries = [
  'Argentina',
  'Australia',
  'Austria',
  'Bahrain',
  'Belgium',
  'Brazil',
  'Bulgaria',
  'Canada',
  'Chile',
  'China',
  'Colombia',
  'Croatia',
  'Cyprus',
  'Czech Republic',
  'Denmark',
  'Dominican Republic',
  'El Salvador',
  'Estonia',
  'Finland',
  'France',
  'Georgia',
  'Germany',
  'Greece',
  'Hong Kong',
  'Hungary',
  'India',
  'Ireland',
  'Israel',
  'Italy',
  'Japan',
  'Latvia',
  'Lithuania',
  'Luxembourg',
  'Malaysia',
  'Malta',
  'Mexico',
  'Netherlands',
  'New Zealand',
  'Norway',
  'Panama',
  'Peru',
  'Philippines',
  'Poland',
  'Portugal',
  'Puerto Rico',
  'Romania',
  'Russia',
  'Singapore',
  'Slovakia',
  'Slovenia',
  'South Africa',
  'South Korea',
  'Spain',
  'Sweden',
  'Switzerland',
  'Turkey',
  'United Arab Emirates',
  'United Kingdom',
  'United States',
  'Vietnam',
  'Virgin Islands (u.s.)',
  'World (iNum)'
];

function formatOutageRegions (voxboneCountries, callback) {
  getTroubleLocations((troubleLocations) => {
    let arr = [
      ['Country', 'Status']
    ];

    voxboneCountries.forEach(c => {
      let template = [c, {
        v: 100,
        f: 'Normal'
      }];

      arr.push(template);
    });

    troubleLocations.forEach(t => {
      let partial = !!t.city && t.country !== t.city;
      let legend = partial ? 'Partial' : 'Full';

      let template = [t.country, {
        v: partial ? 50 : 0,
        f: `${legend} Outage`
      }];

      arr.push(template);
    });

    callback(arr);
  });
}

function formatOutageCities (callback) {
  getTroubleLocations((troubleLocations) => {
    let arr = [
      ['City', 'Status']
    ];

    troubleLocations.forEach(t => {
      let partial = !!t.city;

      if (partial) {
        let template = [t.city.toUpperCase(), {
          v: 1,
          f: 'Outage'
        }];

        arr.push(template);
      }
    });

    callback(arr);
  });
}

function drawRegionsMap () {
  formatOutageRegions(voxboneCountries, dataRegions => {
    var colors;

    // hack for using the whole color palette
    let template = ['nowhere', {
      v: 1,
      f: '-'
    }];
    dataRegions.push(template);

    var mapData = google.visualization.arrayToDataTable(dataRegions);

    var options = {
      colorAxis: {
        colors: ['red', 'orange', '#7a19ff']
      },
      backgroundColor: '#81d4fa',
      datalessRegionColor: '#ccc',
      defaultColor: '#7a19ff',
      legend: 'none',
      displayMode: 'regions'
    };

    var chart = new google.visualization.GeoChart(document.getElementById('region_map'));

    chart.draw(mapData, options);
  });
}

function drawMarkersMap () {
  formatOutageCities(dataCities => {
    var data = google.visualization.arrayToDataTable(dataCities);

    var options = {
      colorAxis: {
        colors: ['red']
      },
      tooltip: {
        isHtml: true
      },
      displayMode: 'markers',
      legend: 'none',
      enableRegionInteractivity: false
    };

    var chart = new google.visualization.GeoChart(document.getElementById('marker_map'));
    chart.draw(data, options);
  });
}

function getTroubleLocations (callback) {
  $.getJSON('/api/v1/incidents?status=1', function (data) {
    let locations = [];

    let regexCountry = /(?:service notification:\s)(?:the)?([a-z ]+)\.?/i;
    let regexCity = /(?:service notification:\s)(?:the)?([a-z ]+)[\(](.+)[\)]\.?/i;

    data.data.forEach(x => {
      let parsedLocationWithCity = x.name.match(regexCity);
      let parsedLocationWithoutCity = x.name.match(regexCountry);

      if (parsedLocationWithCity) {
        locations.push({
          country: parsedLocationWithCity[1].trim(),
          city: parsedLocationWithCity[2].trim()
        });
      } else if (parsedLocationWithoutCity) {
        locations.push({
          country: parsedLocationWithoutCity[1].trim(),
          city: parsedLocationWithoutCity[1].trim()
        });
      }
    });

    callback(locations);
  });
}

google.charts.load('current', {
  'packages': ['geochart'],
  'mapsApiKey': 'AIzaSyBiY_D-mnUuW9fFNLu_D5f-J9MYqhxFv2Y'
});

google.charts.setOnLoadCallback(drawRegionsMap);
google.charts.setOnLoadCallback(drawMarkersMap);
