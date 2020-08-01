$(document).ready(function () {
    // $('input').rating();
    var post_id = $('.post-index').attr('data-post-id');
    var url_vote = $('#vote').attr('data-url');
    var url_comment = $('#comment').attr('data-url');
    $("input[type='radio']").click(function(){
        var sim = $("input[type='radio']:checked").val();
        $.ajax({
            type: "POST",
            url : url_vote,
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
        $('.rating').removeClass('guestVote').addClass('userVote disabled');
    });

    var toolbarOptions = [
        ['image']
      ];
      
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        
        theme: 'snow'
    });
      
  $('#post-comment').on('click', function($e) {
    $e.preventDefault();
    let comment = JSON.stringify(quill.root.innerHTML);
    // console.log(quill.root.innerHTML);
    $.ajax({
      type: "POST",
      url : url_comment,
      data: {
        comment: comment,
        post_id: post_id,

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
