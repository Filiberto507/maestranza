<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('assets/css/trabajo.css') }}">
    
    <title>Reporte Trabajo Realizado</title>
</head>
<body>
    <table>
        <tr>
            <td class="">
                <img class="img-bo" src="assets/img/Bolivia.png" alt="Imagen bolivia">
            </td>
            <td class="">
                <img class="img-co" src="assets/img/cochabamba.jpg" alt="Imagen del cochabamba">
            </td>
            <td class="">
                <img class="img-go" src="assets/img/img-go.png" alt="Imagen del gobernacion">
            </td>
        </tr>
    </table>
    <h2>REPORTE DIARIO DE MANTENIMIENTO VEHICULARES EN TALLER DE MAESTRANZA (GOBERNACION-EXCORDECO)</h2>

    <table class="datos">
        <tr>
            <td class="columna1">
                Tipo Vehiculo: {{$taller->clase}} {{$vehiculo}} {{$taller->tipo_vehiculo}} 
            </td>
            <td class="columna2">
                Placa: {{$placa}}
            </td>
        </tr>
        <tr>
            <td>
                SECR./DIR./UNIDAD: {{$dependencia}}
            </td>
            <td>
                Responsable: {{$responsable}}
            </td>
        </tr>

        <tr>
            <td>
                Km. INGRESO: {{$km_ingreso}}
            </td>
            <td>
                Fecha: {{$fecha_ingreso}}
            </td>
        </tr>

        <tr>
            <td>
                Km. SALIDA; {{$km_salida}}
            </td>
            <td>
                Fecha; {{$fecha_salida}}
            </td>
        </tr>
    </table>
    <h2>TRABAJOS REALIZADOS (TALLER INTERNO MAESTRANZA)</h2>
    <table class="custom-table">
        <tr>
          <td>
            @foreach($trabajorealizado as $tra)
                <p class="dashed-border">
                    {{$tra}}
                </p>  
            @endforeach     
          </td>
        </tr>
        <tfoot>
            <tr>
                <td>Observaciones: {{$tallerdatos->observaciones}}</td>
            </tr>
        </tfoot>
      </table>

      <table class="firma">
        <tr>
            <th>TECNICO MECANICO</th>
            <th>CONDUCTOR
            </th>
        </tr>
        <tr>
            <td></td>
            <td>{{$taller->conductor}}</td>
        </tr>
    </table>
  
</body>

</html>