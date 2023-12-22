<html>
    <body>
        <form>
            Enter name:<input type="text" class="name" value="{{$stud->name}}"><br></br>
            Enter email:<input type="text" class="email" value="{{$stud->email}}"><br><br>
            Enter branch:<input type="text" class="branch" value="{{$stud->branch}}"><br><br>
            <input type="hidden" value="{{$stud->id}}" class="id"/>
            <input type="button" id="btn" value="submit">
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
        $(document).ready(function(){
            $('#btn').on('click',function(){
                var name=$(".name").val();
                var email=$(".email").val();
                var branch=$(".branch").val();
                var id=$(".id").val();
                var data={
                        name:name,
                        email:email,
                        branch:branch
                    };
                $.ajax({
                    url:'/api/student/'+id,
                    method:'PATCH',
                    data:data,
                    success:function(data){
                        window.location.href="/studentweb/create";
                    },
                    error:function(data){
                        console.log(data);
                    }

                });
            });
        });
        </script>
</body>
</html>