<html>

<body>
    <form id="formbtn" method="post">
        Enter name:<input type="text" name="name" class="name"><br>
        <input type="file" class="image" name="image"><br>
        <input type="submit" id="btn" value="upload">
    </form>
    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th width='100'>Image</th>
                <th>Delete</th>
                <th> Update</th>
            </tr>
        </thead>
        <tbody class="imagefetch">

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
    $(document).ready(function(e) {
        var markup = "";
        $('#formbtn').on('submit', function(e) {
            e.preventDefault();
            //    var name=$('.name').val();
            //    var image=$('.image').val();
            $.ajax({
                method: 'POST',
                url: 'http://localhost:8000/api/image',
               
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
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/api/image',
            success: function(data) {
                var url = "/api/image";
                var count = data.length;
                for (i = 0; i < count; i++) {
                    var id = data[i].id;
                    var deleteurl = '/imageweb/' + id;
                    var updateurl = '/imageweb/' + id + '/edit';
                    markup += "<tr><td>" + data[i].id + "</td><td>" + data[i].name +
                        "</td><td><img src='/img/" + data[i].image +
                        "' style='width:40%;height:50px;'></td><td><a href=" + deleteurl +
                        ">Delete</a></td><td><a href='" + updateurl + "'>Update</a></td></tr>";
                }
                $('.imagefetch').append(markup);
            }
        })
    });
    </script>
</body>

</html>