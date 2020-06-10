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
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
  	<form action="{{ route('posts.store') }}" method ="post">
        
		<input name="content" type="hidden">
		<input type="hidden" name="_token" id="csrf-token">
        <div id="editor">
    	
        </div>
        <div class="row">
            <button id="submit" class="btn btn-primary" type="submit">Save Profile</button>
        </div>
    </form>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/posts/create.js') }}"></script>
</body>
</html>