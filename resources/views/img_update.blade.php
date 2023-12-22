<html>

<body>
    <form id="formbtn" method="post">
        Enter name:<input type="text" name="name" class="name" value="{{$img->name}}"><br>
        <input type="file" class="image" name="image"><br>
        <input type="hidden" name="id"  class="id" value="{{$img->id}}">
        <input type="submit" id="btn" value="upload">
    </form>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
    $(document).ready(function(e) {
        var markup = "";
        $('#formbtn').on('submit', function(e) {
            e.preventDefault();
              var id=$('.id').val();
            //    var image=$('.image').val();
            $.ajax({
                method: 'PATCH',
                url:'/api/image/'+id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        });
        
    });
    </script>
</body>

</html>