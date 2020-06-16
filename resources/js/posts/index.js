$(document).ready(function () {
    // $('input').rating();
    $("input[type='radio']").click(function(){
        var sim = $("input[type='radio']:checked").val();
        //alert(sim);
        if (sim<3) { 
            $('.myratings').css('color','red'); 
            $(".myratings").text(sim); 
        }else {
            $('.myratings').css('color','green'); 
            $(".myratings").text(sim); 
        }
    });
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
