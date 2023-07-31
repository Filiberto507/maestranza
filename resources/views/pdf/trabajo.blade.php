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
    <table class="custom-table">
        <tr>
            @if($totalItems < 6) <td>
                <table>


                    @foreach ($trabajorealizado as $tra)
                    <tr>
                        <td class="dashed-border">
                            {{ $tra }}
                        </td>
                    </tr>
                    @endforeach
                </table>
                </td>
                @else

                <td class="second-table">
                    <table>


                        @foreach ($firstColumn as $tra)
                        <tr>
                            <td class="dashed-border">
                                {{ $tra }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table>
                        @foreach ($secondColumn as $tra)
                        <tr>
                            <td class="dashed-border">
                                {{ $tra }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                @endif
        </tr>
        <tfoot>
            @if($totalItems < 6)
            <tr>
                <td>Observaciones: {{$tallerdatos->observaciones}}</td>
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