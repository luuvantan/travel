$(document).ready(function () {
  $('form').on('submit', function($e) {
    $e.preventDefault();
    $.ajax({
      type: "POST",
      url : "http://127.0.0.1:8002/posts",
      data: {
        name: "hihi"
      },
      success: function (data,status, xhr)
      {
        if(xhr.status == 200) {
        alert("Successfully sent to database");
        }
      },error: function() {
        alert("Could not send to database");
      }       
    });
  });
});
