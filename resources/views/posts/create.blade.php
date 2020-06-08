<!-- <div class="container">
<div id="editor-container">
  <blockquote>
    O Captain! My Captain! our fearful trip is done;
    <br> The ship has weather'd every rack, the prize we sought is won;
    <br> The port is near, the bells I hear, the people all exulting,
    <br> While follow eyes the steady keel, the vessel grim and daring:
    <br>
    <br> But O heart! heart! heart!
    <br> O the bleeding drops of red,
    <br> Where on the deck my Captain lies,
    <br> Fallen cold and dead.
    <br>
  </blockquote>
  <em>Walt Whitman</em>
</div>
</div>

<script>
var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{
        header: [1, 2, false]
      }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow' // or 'bubble'
});
</script> -->

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div id="editor"></div>
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
  <script>
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
    
  </script>
</body>
</html>