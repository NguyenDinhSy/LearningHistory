<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!--    boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .c{
            align-content: center;
        }
    </style>
    <!--    jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<?php
include_once("header.php");
include_once("nav.php");
include_once ("../model/entity/learninghistory.php");
?>
    <form action="" method="post" enctype="multipart/form-data" id="add_details">
        <div>

             Id:
            <div class="c">
        <input type="text" value="" name="id"><br>
            </div>
             YearFrom:
         <div class="c">
        <input type="text" value="" name="YearFrom" placeholder=""><br>
         </div>
            YearTo:
        <div class="c">
        <input type="text" value="" name="YearTo"><br>
        </div>
        SchoolName:
        <div class="c">
        <input type="text" value="" name="SchoolName"><br>
        </div>
        SchoolAddress:
        <div class="c">
        <input type="text" value="" name="SchoolAddress"><br>
        </div>
        IdStudent:
        <div class="c">
        <input type="text" value="" name="IdStudent"><br>
        </div>
        <input type="submit" name="add" value="Thêm" id="add">

        </div>
    </form>

<?php
     $rs = learninghistory::getListAdd($_REQUEST['id'], $_REQUEST['YearFrom'],$_REQUEST['YearTo'],$_REQUEST['SchoolName'],$_REQUEST['SchoolAddress'],$_REQUEST['IdStudent']);
?>
<hr>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">

            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Từ năm</th>
                <th scope="col">Đến năm</th>
                <th scope="col">Tên Trường</th>
                <th scope="col">Địa Chỉ Trường</th>
                <th scope="col">Id Học Sinh</th>
                <th scope="col">Thao Tac</th>
            </tr>
            </thead>
            <tbody id="table_data">

            </tbody>
        </table>
    </div>
</div>



</body>
</html>

<script>
    $(document).ready(function(){

        $('#add_details').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"addend.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                 beforeSend:function(){
                    $('#add').attr('disabled', 'disabled');
                 },
                success:function(data){
                    $('#add').attr('disabled', false);
                    if(data.id)
                    {
                        var html = '<tr>';
                        html += '<td>'+data.id+'</td>';
                        html += '<td>'+data.YearFrom+'</td>';
                        html += '<td>'+data.YearTo+'</td>';
                        html += '<td>'+data.SchoolName+'</td>';
                        html += '<td>'+data.SchoolAddress+'</td>'; //IdStudent
                        html += '<td>'+data.IdStudent+'</td>';
                        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">Remove<span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                        $('#table_data').prepend(html);
                        $('#add_details')[0].reset();
                    }
                }
            })
        })  ;

    });

    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });

</script>