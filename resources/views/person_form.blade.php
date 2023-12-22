<html>
    <body>
        <form>
            Enter name:<input type="text" name="name" class="name"><br>
            Enter email:<input type="text" name="email" class="email"><br>
            Enter contact:<input type="text" name="contact" class="contact"><br>
            Enter address:<input type="text" name="address" class="address"><br>
            <input type="button" id="btn" value="submit">
        </form>

        <table border=1>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody class="persontable">

            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
                var markup="";
                $('#btn').on('click',function(){
                    var name=$('.name').val();
                    var email=$('.email').val();
                    var contact=$('.contact').val();
                    var address=$('.address').val();
                    var data={
                        name:name,
                        email:email,
                        contact:contact,
                        address:address
                    };
                    $.ajax({
                        method:'POST',
                        url:'http://localhost:8000/api/person',
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
               $.ajax({
                  method:'GET',
                  url:'http://localhost:8000/api/person',
                  success:function(data)
                  {
                      var count = data.length;
                      for(i=0; i<count; i++)
                      {
                         var id = data[i].id;
                         var deleteurl = '/personweb/'+id;
                         var updateurl = '/personweb/'+id+'/edit';
                         markup+="<tr><td>"+id+"</td><td>"+data[i].name+"</td><td>"+data[i].email+"</td><td>"+data[i].contact+"</td><td>"+data[i].address+"</td><td><a href='"+deleteurl+"'>Delete</a></td><td><a href='"+updateurl+"'>Update</a></td></tr>";
                      }
                      $('.persontable').append(markup);
                  }
               });
            });
        </script>
    </body>
</html>