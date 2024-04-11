function loadRegions() {
    fetch('app/getregiones.php')
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('region');
            selectElement.innerHTML = '<option value="">Seleccione una región</option>';
            data.forEach(region => {
                const option = document.createElement('option');
                option.value = region.id;
                option.textContent = region.region;
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al obtener las regiones:', error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    loadRegions();
});

// jQuery('#region').on('change', function() {
//     var regionId = jQuery(this).val(); 
    
//     if (regionId) {
//         jQuery.ajax({
//             url: 'app/getcomunas.php', 
//             type: 'GET',
//             data: {
//                 regionId: regionId 
//             },
//             dataType: 'json',
//             success: function(response) {
//                 var comunaSelect = jQuery('#comuna');
//                 comunaSelect.empty();
//                 comunaSelect.append('<option value="">Selecciona una comuna</option>');

//                 response.forEach(function(comuna) {
//                     comunaSelect.append('<option value="' + comuna.id + '">' + comuna.comuna + '</option>');
//                 });
//             },
//             error: function() {
//                 console.error('Error al obtener las comunas');
//             }
//         });
//     }
// });


