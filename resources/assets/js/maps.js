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
  'Thailand',
  'Turkey',
  'United Arab Emirates',
  'United Kingdom',
  'United States',
  'Vietnam',
  'Virgin Islands (u.s.)',
  'World (iNum)'
];

function formatOutageRegions (incident, voxboneCountries, callback) {
  getTroubleLocations(incident, troubleLocations => {
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

function formatOutageCities (incident, callback) {
  getTroubleLocations(incident, troubleLocations => {
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

function drawRegionsMap (incident) {
  formatOutageRegions(incident, voxboneCountries, dataRegions => {
    var mapData = google.visualization.arrayToDataTable(dataRegions);

    var options = {
      colorAxis: {
        colors: ['orange', 'orange', '#7a19ff'],
        values: [1, 100]
      },
      backgroundColor: '#f8f9fa',
      datalessRegionColor: '#eaeef1',
      defaultColor: '#7a19ff',
      legend: 'none',
      displayMode: 'regions',
      keepAspectRatio: 'false',
      region: 'world',
      magnifyingGlass: {
        enable: true,
        zoomFactor: 5.0
      }
    };

    var chart = new google.visualization.GeoChart(document.getElementById('region_map'));

    chart.draw(mapData, options);
  });
}

function drawMarkersMap (incident) {
  formatOutageCities(incident, dataCities => {
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

function getTroubleLocations (incident, callback) {
  let url;

  if (incident) {
    url = `/api/v1/incidents/${incident}`;
  } else {
    url = '/api/v1/incidents?status=1';
  }

  $.getJSON(url, data => {
    let locations = [];

    let regexCountry = /(?:service notification:\s)(?:the)?([a-z ]+)\.?/i;
    let regexCity = /(?:service notification:\s)(?:the)?([a-z ]+)[\(](.+)[\)]\.?/i;

    let result;
    if (data.data.constructor === Array) {
      result = data.data;
    } else {
      result = [data.data];
    }

    result.forEach(x => {
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
