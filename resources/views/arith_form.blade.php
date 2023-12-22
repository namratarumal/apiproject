<html>
    <body>
        <form>
            Enter num1:<input type="text" class="num1" name="num1"><br>
            Enter num2:<input type="text" class="num2" name="num2"><br>
            Select operation:<select class="operate" name="operate">
                <option>Select oprate</option>
                <option value="addition">Addition</option>
                <option value="multiple">multiple</option>
                <option value="subtract">subtract</option>
                <option value="division">division</option>
            </select>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
                $('.operate').on('change',function(){
                    var num1=$('.num1').val();
                    var num2=$('.num2').val();
                    var oprate=$(this).val();
                    
                    switch(oprate)
                    {
                        case 'addition':var res = parseInt(num1)+parseInt(num2);
                              break;
                        case 'multiple':var res = num1 -num2;
                        break;
                        case 'subtract':var res = num1 * num2;
                        break;
                        case 'division':var res = num1 / num2;
                        break;
                    }
                    // if(oprate=='addition')
                    // {
                    //     var res = parseInt(num1) + parseInt(num2);
                    // }
                    // if(oprate=='multiple')
                    // {
                    //     var res = num1 * num2;
                    // }
                    // if(oprate=='subtract')
                    // {
                    //     var res = num1 - num2;
                    // }
                    // if(oprate=='division')
                    // {
                    //     var res = num1 / num2;
                    // }
                  var data={
                    'num1':num1,
                    'num2':num2,
                    'oprate':oprate,
                    'res':res
                  };
                  console.log(data);
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8000/api/arith',
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
                    // if(oprate=='addition')
                    // {
                    //     var res= parseInt(num1)  + parseInt(num2);
                    //     var data={
                    //     'num1':num1,
                    //     'num2':num2,
                    //     'oprate':oprate,
                    //     'res':res
                    //     };
                    //     //console.log(data);
                    //     $.ajax({
                    //     type:'POST',
                    //     url:'http://localhost:8000/api/arith',
                    //     data:data,
                    //     success:function(date)
                    //     {
                    //         console.log(data);
                    //     },
                    //     error:function(data)
                    //     {
                    //         console.log(data);
                    //     }

                    // }) 
                    // }
                     
                  
                });
            });
        </script>
    </body>
</html>