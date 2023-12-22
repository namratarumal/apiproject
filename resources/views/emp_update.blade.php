<html>
    <body>
        <form>
            Update name:<input type="text" class="name" value="{{$emp->name}}"><br>
            Update department:<input type="text" class="department" value="{{$emp->department}}"><br>
            Update salary:<input type="text" class="salary" value="{{$emp->salary}}"><br>
            <input type="hidden" class="id" value="{{$emp->id}}">
            <input type="button" id="btn" value="update">
        </form>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
                $('#btn').on('click',function(){
                    var name=$('.name').val();
                    var depart=$('.department').val();
                    var salary=$('.salary').val();
                    var id=$('.id').val();
                    var data={
                        name:name,
                        department:depart,
                        salary:salary
                    };
                    console.log(id);
                    $.ajax({
                    url:'/api/emp/'+id,
                    method:'PATCH',
                    data:data,
                    success:function(data){
                        window.location.href="/empweb/create";
                    },
                    error:function(data){
                        console.log(data);
                    }

                });
                    console.log(data);
                });
            });
        </script>
    </body>
</html>