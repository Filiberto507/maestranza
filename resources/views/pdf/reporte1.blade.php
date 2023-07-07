<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Report-pdf.css') }}">
</head>

<body>
    <table>
        <tr>
            <td class="columna1">
                <img class="img-go" src="assets/img/img-go.png" alt="Imagen del vehículo">
            </td>
            <td class="columna2">
                <h3>Recepción de vehículo</h2>
                <table>
                    <tr>
                        <td>Hora de entrada</td>
                        <td>{{$hora_ingreso}}</td>
                    </tr>
                    <tr>
                        <td>Hora de salida</td>
                        @if($hora_salida != null)
                        <td>{{$hora_salida}}</td>
                        @else
                        <td>En Curso</td>
                        @endif
                    </tr>
                </table>
            </td>
            <td class="columna3">

                <table>
                    <tr>
                        <td><p class="fecha-title">Nº</h2>
                        </td>
                        <td><p class="fecha-title">Dia</h2>
                        </td>
                        <td><p class="fecha-title">Mes</h2>
                        </td>
                        <td><p class="fecha-title">Año</h2>
                        </td>
                        
                    </tr>
                    <tr>
                       
                        <td><p>123</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 8, 2)}}</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 5, 2)}}</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 0, 4)}}</p>
                        </td>
                        <td><p class="fecha-title">ingreso</p>
                        </td>
                    </tr>

                    <tr>
                       
                        <td><p>123</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 8, 2)}}</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 5, 2)}}</p>
                        </td>
                        <td><p>{{substr($fecha_ingreso, 0, 4)}}</p>
                        </td>
                        <td><p class="fecha-title">salida</p>
                        </td>
                    </tr>
                </table>
                <!-- <div>
                    <p class="fecha-title">Número de formulario</h2>
                    <p>123</p>
                </div>
                <div>
                    <p class="fecha-title">Fecha Entrada</h2>
                    <p>Día, Mes, Año</p>
                    <p>{{$fecha_ingreso}}</p>
                </div>
                <div>
                    <p class="fecha-title">Fecha Salida</h2>
                    <p>Día, Mes, Año</p>
                    @if($fecha_salida != null)
                    <p>{{$fecha_salida}}</p>
                    @else
                    <p>En Curso</p>
                    @endif
                </div> -->
            </td>
        </tr>
    </table>
    <h2>AREA DE TRANSPORTE - TALLER DE MAESTRANZA</h2>

    <table class="info">

        <tr>
            <th class="info-th">Nombre:</th>
            <td class="info-td">
                <div class="text">
                    {{$nombre}}
                </div>
            </td>
            <th class="info-th">Vehiculo:</th>
            <td class="info-td">
                <div class="text">
                    {{$vehiculo}}
                </div>
            </td>
            <th class="info-th">Color:</th>
            <td class="info-td">
                <div class="text">
                    {{$color}}
                </div>
            </td>
        </tr>
        <tr>
            <th class="info-th">Stria/Dir:</th>
            <td class="info-td">
                <div class="text">
                    {{$dependencia}}
                </div>
            </td>
            <th class="info-th">Placa:</th>
            <td class="info-td">
                <div class="text">
                    {{$placa}}
                </div>
            </td>
            <th class="info-th">Kilometraje:</th>
            <td class="info-td">
                <div class="text">
                    {{$kilometraje}}
                </div>
            </td>
        </tr>

    </table>


    <table class="table-check">
        <tr>
            <td class="check-column">
                @foreach($primeros10 as $pr)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="checkbox1" {{ $pr->checked == 1 ? 'checked': '' }}>
                    <label for="checkbox1">{{$pr->name}}</label>
                </div>
                @endforeach
                <!-- Repite las siguientes líneas de código para agregar más elementos -->
            </td>
            <td class="check-column">
                @foreach($segundos10 as $se)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox5" name="checkbox5" {{ $se->checked == 1 ? 'checked': '' }}>
                    <label for="checkbox5">{{$se->name}}</label>
                </div>
                @endforeach
                <!-- Repite las siguientes líneas de código para agregar más elementos -->
            </td>
            <td class="check-column">
                @foreach($ultimos10 as $ul)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox9" name="checkbox9" {{ $ul->checked == 1 ? 'checked': '' }}>
                    <label for="checkbox9">{{$ul->name}}</label>
                </div>
                @endforeach
                <!-- Repite las siguientes líneas de código para agregar más elementos -->
            </td>
        </tr>
    </table>

    <h4>ESTADO EXTERIOR </h2>

        <table class="auto">
            <tr>
                <th class="auto-th">IZQUIERDO</th>
                <th class="auto-th">CENTRO</th>
                <th class="auto-th">DERECHO</th>
                <th class="auto-th">PARACHOQUES</th>
            </tr>
            <tr>
                <td class="auto-td"><img class="car-image" src="imagen1.jpg" alt="Imagen 1"></td>
                <td class="auto-td"><img class="car-image" src="imagen2.jpg" alt="Imagen 2"></td>
                <td class="auto-td"><img class="car-image" src="imagen3.jpg" alt="Imagen 3"></td>
                <td class="auto-td"><img class="car-image" src="imagen3.jpg" alt="Imagen 4"></td>
            </tr>
            <tr>
                <td class="auto-td"><img class="car-image" src="imagen5.jpg" alt="Imagen 5"></td>
                <td class="auto-td"><img class="car-image" src="imagen6.jpg" alt="Imagen 6"></td>
                <td class="auto-td"><img class="car-image" src="imagen7.jpg" alt="Imagen 7"></td>
            </tr>
        </table>


        <div class="container-parrafo">
            <div class="paragraph">
                <p class="par">Aquí está el primer párrafo.</p>
            </div>
            <div class="paragraph">
                <p class="par">Aquí está el segundo párrafo.</p>
            </div>
            <div class="paragraph">
                <p class="par">Aquí está el tercer párrafo.</p>
            </div>
        </div>



        <table class="firma">
            <tr>
                <th>CONDUCTOR DE VEHICULO INGRESO</th>
                <th>MECANICO DE MAESTRANZA</th>
                <th>CONDUCTOR DE VEHICULO SALIDA</th>
            </tr>
        </table>

        <!-- <div class="container">
            <span class="label">Nombre:</span>
            <div class="text">
                Aquí está tu texto.
            </div>
        </div> -->

</body>

</html>