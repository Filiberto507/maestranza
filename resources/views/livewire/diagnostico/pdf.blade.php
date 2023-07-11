<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .encabezado{
            text-align: center;
            color: rgb(56, 82, 231);
        }
        img{
            width: 90px;
            height: 90px;
        }
        .tablaImage{
            width: 100%;
        }
        .imagen1{
            text-align: left;
        }
        .imagen3{
            text-align: right;
        }
        .titulo{
            background-color: black;
            color: white;
            font-size: 20px;
        }
        
        .tableDatos{
            width: 100%;
        }
        .tableItem{
            width: 100%;
            border-collapse: collapse;
            border: 1px solid;
        }
        .datos{
            text-align: center;
        }
        textarea{
            font-family: inherit;
            font-size: 100%;
            border: 1px solid;
        }
    </style>
</head>

<body>
  <table class="tablaImage">
    <tr>
        <th><div class="imagen1"><img src="assets/img/Bolivia.png" alt="" ></div></th>
        <th><div class="imagen2"><img src="assets/img/cochabamba.jpg" alt="" ></div></th>
        <th><div class="imagen3"><img src="assets/img/img-go.png" alt="" ></div></th>
    </tr>
  </table>
    
    <h1 class="encabezado">EVALUACIÓN Y DIAGNÓSTICO</h1>
    <table class="tableDatos">
        <tbody>
            @foreach($Diagnostico as $diag )
            <tr>
                <td>
                    <strong>Nro: {{$diag->id}}</strong>
                </td>
                <td>
                    <label for="">Fecha: {{$diag->fecha}}</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Dependencia: {{$diag->dependencia}}</label>
                </td>
                <td>
                    <label for="">Conductor: {{$diag->conductor}}</label>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <table class="tableItem">
            <thead class="titulo" >
                <tr>
                    <th width="20%">
                        ITEM
                    </th>
                    <th width="80%">
                        DESCRIPCION
                    </th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($DiagnosticoItem as $di)
            <tr class="datos">
                <td>
                    <h5>{{$di->item}}</h5>  
                </td>
                <td>
                    <h5>{{$di->descripcion}}</h5>  
                </td>
                
            </tr>
            @endforeach
            </tbody>
        </table>
                
                <textarea name="" id="" cols="30" rows="10">{{$diag->observaciones}}</textarea>

    <footer>
        <div style="text-align: center;  margin-top:30px;">
            <strong>TALLER MAESTRANZA telf. 4707726</strong><br>
            <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">VALIDEZ DEL DIAGNOSTICO: 45 DIAS CALENDARIO</font>
            </font>
                <br>
            <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">Cochabamba-Bolivia</font>
            </font>
        </div>
        <div style="margin-top: 20px">
            <div style="float:left">
                <font style="vertical-align: inherit">
                    <font style="vertical-align: inherit">---------------------</font>
                </font>
                    <br>
                <font style="vertical-align: inherit">
                    <font style="vertical-align: inherit">Tecnico Mecanico</font>
                </font>
            </div>
            
            <div style="float:right">
            <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">------------</font>
            </font>
                <br>
            <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">Conductor</font>
            </font>
            </div>
        </div>
    </footer>
</body>
</html>