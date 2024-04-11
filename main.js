
jQuery(document).on('submit', '#form', function (event) {
    event.preventDefault();
    jQuery.ajax({
        url: 'app/insert.php',
        type: 'POST',
        dataType: 'json',
        data:$(this).serialize(),
    })
    .done(function (response) {
        console.log(response);
        if(!response.error){
            alert('Guardado con exito');
            // Reset form fields
            jQuery('#form')[0].reset();
        }else{
            alert('Error: ' + response.message);
        }
    })
    .fail(function (resp) {
        console.log(resp.responseText);
    })
    .always(function () {
        console.log("complete");
    })
});
