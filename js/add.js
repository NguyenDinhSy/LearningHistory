
$(document).ready(function(){

    $('#add_details').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"../view/addend.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#add').attr('disabled', 'disabled');
            },
            success:function(data){
                $('#add').attr('disabled', false);
                if(data.first_name)
                {
                    var html = '<tr>';
                    html += '<td>'+data.first_name+'</td>';
                    html += '<td>'+data.last_name+'</td></tr>';
                    $('#table_data').prepend(html);
                    $('#add_details')[0].reset();
                }
            }
        })
    })  ;

});
