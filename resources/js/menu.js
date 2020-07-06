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
});
