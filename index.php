<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-600 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Sistema de Votación</h1>
    <form action="" id="form" class="space-y-4">

        <?php for ($i = 1; $i <= 1; $i++) { ?>

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Nombre y Apellido:</label>
                <input type="text" required name="nombreyapellido[]" class="border rounded p-1">
            </div>

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Alias:</label>
                <input type="text" required name="alias[]" class="border rounded p-1">
            </div>

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Rut:</label>
                <input type="text" minlength="9" maxlength="10"  placeholder="XXXXXXXXX-Y"  required name="rut[]" class="border rounded p-1">
            </div> 

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Correo:</label>
                <input type="mail" required name="email[]" class="border rounded p-1">
            </div>

            <div class="flex flex-wrap items-center mb-4">
            <label class="mr-2">Región:</label>
            <select required name="region[]" id="region" class="border rounded p-1">
                <option value="">Escoge Región</option>
            </select>
            </div>

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Comuna:</label>
                <select required name="comuna[]" id="comuna" class="border rounded p-1">
                    <option value="">Seleccione una comuna</option>
                    <option value="Comuna A">Comuna A</option>
                    <option value="Comuna B">Comuna B</option>
                    <option value="Comuna C">Comuna C</option>
                </select>
            </div>

            <div class="flex flex-wrap items-center mb-4">
                <label class="mr-2">Candidato:</label>
                <select required name="candidato[]" class="border rounded p-1">
                    <option value="">Escoge candidato</option>
                    <option value="Carlos Medina">Carlos Medina</option>
                    <option value="Lucía Vásquez">Lucía Vásquez</option>
                    <option value="Juan Esteban Rojas">Juan Esteban Rojas</option>
                </select>
            </div>

            <div class="flex flex-wrap items-center mb-4">
                <h1 class="mr-2">¿Como se enteró de nosotros?</h1>
                <div class="mr-2">
                    <input name="options[]" type="checkbox" id="Web" class="default:ring-2" value="Web">
                    <label for="Web">Web</label>
                </div>
                <div class="mr-2">
                    <input name="options[]" type="checkbox" id="TV" value="TV">
                    <label for="TV">TV</label>
                </div>
                <div class="mr-2">
                    <input name="options[]" type="checkbox" id="RRSS" value="RRSS">
                    <label for="RRSS" id="RRSS">RRSS</label>
                </div>
                <div class="mr-2">
                    <input name="options[]" type="checkbox" id="Amigo" value="Amigo">
                    <label for="Amigo">Amigo</label>
                </div>
            </div>

        <?php } ?>

        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Enviar Voto</button>
    </form>
</div>

<script src="https://cdn.tailwindcss.com"></script>
<script src="js/jquery-3.7.1.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
</body>
</html>
