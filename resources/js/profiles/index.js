$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#img').attr('src', e.target.result);
            $('#img').removeClass('hidden');
          }
          
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      
      $("#upload").change(function() {
        readURL(this);
      });
});