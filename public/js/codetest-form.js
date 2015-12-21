jQuery(document).ready(function($){
    $('#codetest-form').on('submit',function() {
        var data = {
            type: $('#type').val(),
            name: $('#name').val(),
            body: $('#body').val()
        };
        $.ajax({
            type: 'POST',
            url: $(this).prop('action'),
            data: JSON.stringify(data),
            contentType: 'application/json; charset=UTF-8',
            success: function(data) {
                $('#result').html(
                    $('#result').html() 
                    + '<br/>'
                    + JSON.stringify(data)
                );
            },
            dataType: 'json'
        });
        
        return false; // skip normal submit 
    });
});
