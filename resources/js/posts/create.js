var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  [ 'link', 'image', 'video', 'formula' ],          // add's image support
  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },

  theme: 'snow'
});

$(document).ready(function() {
  $('form').on('submit', function($e) {
    $e.preventDefault();
    $("#hiddenArea").val($("#editor .ql-editor").html());
    $('#form-post')[0].submit();
    // var quillText =  JSON.stringify(quill.getContents());
    // var content = document.querySelector('input[name=content]');
    // content.value = JSON.stringify(quill.getContents());
    // console.log(quillText, content);
    // $.ajax({
    //   type: "POST",
    //   url : "http://127.0.0.1:8002/posts",
    //   data: { 
    //     editorContent : quillText,
    //     abc: content.value
    //     },
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