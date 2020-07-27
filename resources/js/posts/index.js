$(document).ready(function () {
    // $('input').rating();
    var post_id = $('.post-index').attr('data-post-id');
    $("input[type='radio']").click(function(){
        var sim = $("input[type='radio']:checked").val();
        $.ajax({
            type: "POST",
            url : "http://127.0.0.1:8000/vote/addVote",
            data: {
                value: sim,
                post_id: post_id
            },
            success: function (data,status, xhr)
            {
                $('.count-rate').text(`${data.average}/5 (${data.countVote} votes)`);
            },error: function() {
                
            }       
        });
        if (sim<3) { 
            $('.myratings').css('color','red'); 
            $(".myratings").text(sim); 
        }else {
            $('.myratings').css('color','green'); 
            $(".myratings").text(sim); 
        }
    });
  $('form').on('submit', function($e) {
    // $e.preventDefault();
    // $.ajax({
    //   type: "POST",
    //   url : "http://127.0.0.1:8000/posts",
    //   data: {
    //     name: "hihi"
    //   },
    //   success: function (data,status, xhr)
    //   {
    //     if(xhr.status == 200) {
    //     alert("Successfully sent to database");
    //     }
    //   },error: function() {
    //     alert("Could not send to database");
    //   }       
    // });
  });
});
