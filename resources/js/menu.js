$(document).ready(function () {
  $("#searchBtn").on('click', function(e) {
    $(this).addClass("hidden");
    $(this).closest($(".container-fluid")).find($("#titleBarNav")).addClass("hidden");
    $("#searchForm").removeClass("hidden");
    //$("$searchForm").addClass("animate");
    $("#searchForm input").focus();
    $('.nav-item.dropdown').addClass("hidden");
  });

  $("#searchForm input").focusout(function(e){
    $("#searchBtn").removeClass("hidden");
    $("#titleBarNav").removeClass("hidden");
    $('.nav-item.dropdown').removeClass("hidden");
    $("#searchForm").addClass("hidden");
  });
  let engine = new Bloodhound({
    remote: {
      url: '/search?value=%QUERY%',
      filter: function(data) {
        return data;
      },
      wildcard: '%QUERY%'
    },
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace
  });

  $("#search-ajax").typeahead({
    hint: true,
    highlight: true,
    minLength: 1,
    limit: Infinity
  },[
    {
      source: engine.ttAdapter(),
      name: 'post',
      display: function(data) {
        return data;
      },
      templates: {
        empty: [
          '<div class="list-group search-results-dropdown"><div class="list-group-item list-nothing">Nothing found.</div>'
        ],
        header: [
          '<div class="list-group search-results-dropdown list-show"></div>'
        ],
        suggestion: function (data) {
          return '<a href="/post/' + data.title + '.' + data.id + '" class="list-group-item list-show">' + data.title + '</a>';
        }
      }
    }]
    );
});
