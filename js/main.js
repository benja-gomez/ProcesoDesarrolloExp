jQuery(document).on('submit', '#form', function (event) {
    
    const checkboxes = jQuery('input[name="options[]"]:checked');
    if (checkboxes.length > 2) {
        alert('Por favor, selecciona un máximo de 2 opciones.');
        return;
    }
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

document.getElementById('region').addEventListener('change', function () {
    const regionId = this.value;

    if (regionId) {
        fetch(`getcomunas.php?id=${regionId}`)
            .then(response => response.json())
            .then(data => {
                const comunaSelect = document.getElementById('comuna');
                comunaSelect.innerHTML = '<option value="">Seleccione una comuna</option>';
                
                data.forEach(comuna => {
                    const option = document.createElement('option');
                    option.value = comuna.id;
                    option.textContent = comuna.nombre;
                    comunaSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al obtener las comunas:', error);
            });
    } else {
        document.getElementById('comuna').innerHTML = '<option value="">Seleccione una comuna</option>';
    }
});
});
