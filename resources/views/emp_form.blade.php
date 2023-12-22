<html>
    <body>
        <form>
            Enter name: <input type="text" class="name" name="name"><br>
            Enter departent:<input type="text" class="department" name="department"><br>
            Enter salary:<input type="text" class="salary"><br>
            <input type="button" id="btn" value="Submit">
        </form>

        <table border=1>
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Delete</th>
                <th>Update</th>
            </thead>
            <tbody class="emptable">

            </tbody>
        </table>
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
              
                $('#btn').on('click',function(){
                    var name=$('.name').val();
                    var depart=$('.department').val();
                    var salary=$('.salary').val();
                    var data={
                        name:name,
                        department:depart,
                        salary:salary
                    };
                    $.ajax({
                        method:'POST',
                        url:'http://localhost:8000/api/emp',
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
                   url:'http://localhost:8000/api/emp',

                   success:function(data)
                   { 
                        var count = data.length;
                        console.log(count);
                        for(i=0;i<count;i++)
                        {   
                            var id=data[i].id;
                            var deleteurl='/empweb/'+id;
                            var updateurl='/empweb/'+id+'/edit';
                            markup+="<tr><td>"+id+"</td><td>"+data[i].name+"</td><td>"+data[i].department+"</td><td>"+data[i].salary+"</td><td><a href='"+deleteurl+"'>Delete</a></td><td><a href='"+updateurl+"'>Update</a></td></tr>";
                        }  
                        $('.emptable').append(markup);
                   }
                });
            });
        </script>
    </body>
</html>