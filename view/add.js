
$(document).ready(function(){

    $('#add_details').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"addend.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            // beforeSend:function(){
            //     $('#add').attr('disabled', 'disabled');
            // },
            success:function(data){
                $('#add').attr('disabled', false);
                if(data.id)
                {
                    var html = '<tr>';
                    html += '<td>'+data.YearFrom+'</td>';
                    html += '<td>'+data.YearTo+'</td></tr>';
                    $('#table_data').prepend(html);
                    $('#add_details')[0].reset();
                }
            }
        })
    })  ;

});
