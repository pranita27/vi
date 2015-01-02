var renderTile = (function(_) {
  var tile_tpl = '<div class="tile"><a href="<%= link %>"><img src="<%= src %>" width="<%= width %>" height="<%= height %>"><span class="title"><%- title %></span></a></div>';
  return _.template(tile_tpl);
})(_);


$(document).ready(function (){
  $("#fetch").on('click', function() {
    $(this).prop('disabled', true).text('Fetching...');
    setTimeout(fetchTiles, 1000);
  });
});

function fetchTiles() {
  var results = $("#results");
  var messages = $('#messages');
  var fetch = $("#fetch");
  var numItems = 0;
  var numSuccess = 0;
  var numError = 0;
  $.ajax({
    url: "service.php",
    type: 'GET',
    data: {},
    dataType: "json",
    success: function (data, status, xhr) {
      var tilesMarkup = '';
      var messagesMarkup = '';
      $.each(data, function(k, v) {
        numItems += 1;
        try {
          tilesMarkup += renderTile(v);
          numSuccess += 1;
        }
        catch (e) {
          numError += 1;
          messagesMarkup += '<li><span class="error">Error: ' + e.message + '</span></li>';
        }
      });
      results.html(tilesMarkup);
      messages.html(messagesMarkup);
    },
    error: function (xhr, status, error) {
      messages.append('<li><span class="error">Error: ' + error + '</span></li>');
    },
    complete: function (xhr, status) {
      fetch.prop('disabled', false).text('Fetch');
      messages.append('<li><span class="info">Fetched (' + numItems + '). Displayed (' + numSuccess + '). Errors (' + numError + ') </span></li>');
    }
  });
}
