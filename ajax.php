  <script>
        $(document).ready(function(){
            $("#button").click(function(){
                var name=$("#name").val();
                var email=$("#email").val();
                var password=$('#password').val();
                var mobno=$('#mobno').val();
                var profession=$('#profession').val();
                var image=$('#image').val();

                console.log(name);
                $.ajax({
                    url:'store.php',
                    method:'POST',
                    data:{
                        name:name,
                        email:email
                    },
                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
   </script>