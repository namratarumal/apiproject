<html>
    <body>
        <form>
            Enter name:<input type="text" class="name"><br></br>
            Enter email:<input type="text" class="email"><br><br>
            Enter branch:<input type="text" class="branch"><br><br>
            <input type="button" id="btn" value="submit">
        </form>
        <table border=1>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
         </thead>
         <tbody class="student">
          
         </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
                $('#btn').on('click',function(){
                    var name=$('.name').val();
                    var email=$('.email').val();
                    var branch=$('.branch').val();
                    var data={
                        name:name,
                        email:email,
                        branch:branch
                    };
                    $.ajax({
                        method:'POST',
                        url:'http://localhost:8000/api/student',
                        data:data,
                        success:function(data)
                        {
                            console.log(data);
                        },
                        error:function(data)
                        {
                            console.log(data);
                        }
                    })
                });
                var markup="";
                $.ajax({
                    type:'GET',
                    url:'http://localhost:8000/api/student',
                    success:function(data)
                    {
                        //console.log(data);
                        //  var obj = JSON.parse(data);
                        // console.log(obj);
                        var url="/api/student";
                    var count = data.length;
                   // console.log(count);

                        for(i=0;i<count;i++)
                        {
                             var id=data[i].id;
                            var deleteurl='/studentweb/'+id;
                            var updateurl='/studentweb/'+id+'/edit';
                            markup+="<tr><td>"+data[i].id+"</td><td>"+data[i].name+"</td><td>"+data[i].email+"</td><td>"+data[i].branch+"</td><td><a href="+deleteurl+">DELETE</a></td><td><a href='"+updateurl+"'>Update</a></td></tr>";
                        }
                        $('.student').append(markup);
                    }
                
                });
           
            });
        </script>
           
    </body>
</html>