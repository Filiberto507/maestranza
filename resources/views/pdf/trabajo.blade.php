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
                Tipo Vehiculo: {{$vehiculo}} 
                @php
                //dd($taller->clase, $vehiculo, $taller->tipo_vehiculo);
                @endphp
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
    @php
    $totalItems = count($trabajorealizado);
    $halfItems = ceil($totalItems / 2);
    $firstColumn = array_slice($trabajorealizado, 0, $halfItems);
    $secondColumn = array_slice($trabajorealizado, $halfItems);
    @endphp
    <table class="table-check">
        <tr>
            <td class="check-column">
                @foreach($primeros10 as $pr)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="checkbox1" {{ $pr->checked == 1 ? 'checked': '' }}>
                    <label for="checkbox1">{{$pr->descripcion}}</label>
                </div>
                @endforeach
                <!-- Repite las siguientes líneas de código para agregar más elementos -->
            </td>
            <td class="check-column">
                @foreach($segundos10 as $se)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox5" name="checkbox5" {{ $se->checked == 1 ? 'checked': '' }}>
                    <label for="checkbox5">{{$se->descripcion}}</label>
                </div>
                @endforeach
                <!-- Repite las siguientes líneas de código para agregar más elementos -->
            </td>
        </tr>
    
        
    </table>

    <table class="footer">
    <tfoot>
            @if($totalItems < 6)
            <tr>
            <td colspan="3"> <strong>Observaciones: </strong> {{$tallerdatos->observaciones}}</td>
            </tr>
            @else
            <tr>
                <td colspan="2">Observaciones: {{ $tallerdatos->observaciones }}</td>
            </tr>
            @endif
        </tfoot>
    </table>

    <table class="firma">
        
        <tr>
            <td>{{Auth::user()->name}}</td>
            <td>{{$taller->conductor}}</td>
        </tr>
        <tr>
            <th>TECNICO MECANICO</th>
            <th>CONDUCTOR
            </th>
        </tr>
    </table>

</body>

</html>