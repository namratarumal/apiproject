<html>
    <body>
        <form>
            Name:<input type="text" class="name" value="{{$person->name}}"><br>
            Email:<input type="text" class="email" value="{{$person->email}}"><br>
            Contact:<input type="text" class="contact" value="{{$person->contact}}"><br>
            Address:<input type="text" class="address" value="{{$person->address}}"><br>
            <input type="hidden" class="id" value="{{$person->id}}"><br>
            <input type="button" id="btn" value="Update"><br>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
                $('#btn').on('click',function(){
                    var name=$('.name').val();
                    var email=$('.email').val();
                    var contact=$('.contact').val();
                    var address=$('.address').val();
                    var id=$('.id').val();
                    var data={
                        name:name,
                        email:email,
                        contact:contact,
                        address:address
                    };
                    $.ajax({
                        method:'PATCH',
                        url:'/api/person/'+id,
                        data:data,
                        success:function(data)
                        {
                            window.location.href='/personweb/create';
                        },
                        error:function(data)
                        {
                            console.log(data);
                        }
                    })
                });
            });
        </script>
    </body>
</html>