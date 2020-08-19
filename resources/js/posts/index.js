const { post } = require("jquery");

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
    var old_html = $("#editor").html();
    $('#post-comment').on('click', function($e) {
        $e.preventDefault();
        let comment = JSON.stringify(quill.root.innerHTML);
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
                    let newComment = data.data;
                    alert("Lưu bình luận thành công");
                    // let newText = 
                    // `<div class="card mt-3 show-comment">
                    //     <div class="col-md-12 mt-2">
                    //         <a class="customSize" href="${newComment.user.link}">
                    //             <img style="width: 22px;height: 22px;border-radius: 50%;"
                    //                 class="" src="${newComment.user.avatar}">
                    //                 ${newComment.user.name}
                    //         </a>
                    //         <span class="style-date">${newComment.created_at}</span>
                    //     </div>
                    //     <div class="col-md-12 mt-2 style-comment">
                    //         ${newComment.content}
                    //     </div>
                    //     <div class="col-12 reply-comment">
                    //         <a class="mr-05 cursor-pointer">Phản hồi</a>
                    //     </div>
                    // </div>`

                    // $('#show-comment').prepend(newText);
                    // $('#editor').html(old_html);
                    window.location.reload();
                }
            },error: function() {
                alert("Lưu bình luận không thành công");
            }       
        });
    });

    $('.cursor-pointer').click(function() {
        let t = $(this).attr('id');
        $(`#responseComment${t}`).show();
    })
    
    $('.cancel-submit').click(function(){
        $(this).parent().parent().hide();
    });

    $('.post-response-comment').click(function($e) {
        $e.preventDefault();
        let key = $(this).attr('data-key');
        let urlResponse = $(`#save-response-comment${key}`).attr('data-url-response');
        let commentId = $(`#comment-id${key}`).val();
        let content = $(`#content-response-comment${key}`).val();
        $.ajax({
            type: "POST",
            url: urlResponse,
            data: {
                content: content,
                comment_id: commentId,
            },
            success: function (data,status, xhr)
            {
                alert("Lưu phản hồi thành công");
                window.location.reload();
            },error: function() {
                alert("Lưu phản hồi không thành công");
            }
        })

    });

    $('textarea[id^="content-response-comment"]').keyup(function() {
        let key = $(this).attr('data-key');
        let value =  $(this).val();
        value = value.replace(/\s*/g, '');
        if(value.length>0) {
            $(`#post-response-comment${key}`).removeClass('disabled');
        } else {
            $(`#post-response-comment${key}`).addClass('disabled');
        }
    });

    $('.ql-editor').keyup(function() {
        $('#post-comment').removeClass('disabled');
    });
});
