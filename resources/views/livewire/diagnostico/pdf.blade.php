<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnostico</title>
</head>

<body>
  <table class="tablaImage">
    <tr>
        <th><div class="imagen1"><img src="assets/img/Bolivia.png" alt="" ></div></th>
        <th><div class="imagen2"><img src="assets/img/cochabamba.jpg" alt="" ></div></th>
        <th><div class="imagen3"><img src="assets/img/img-go.png" alt="" ></div></th>
    </tr>
  </table>
  <div>
    <h1 class="encabezado">TALLER MAESTRANZA</h1>
  </div>
  <div style="text-align: center;" class="contImg">
    <img src="assets/img/toyota.png" class="img1">
    <img src="assets/img/hilux.png" class="img2">
  </div>
  
    <table class="tableDatos">
        <tbody>
            <tr>
                <td>
                    <label for="">Nro: {{$Diagnostico->id}}</label>
                </td>
                <td>
                    <label for="">Fecha: {{$Diagnostico->fecha}}</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Dependencia: {{$Diagnostico->dependencia}}</label>
                </td>
                <td>
                    <label for="">Conductor: {{$Diagnostico->conductor}}</label>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="">N° de placa: {{$Diagnostico->placa}}</label>
                </td>
                <td>
                    <label for="">Tipo de vehiculo: {{$Diagnostico->marca}}</label>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="contenedorP">
        <div class="contenedorH">
        <h3 class="subtitulo">EVALUACIÓN Y DIAGNÓSTICO DEL VEHICULO</h3>
        </div>
    </div>
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
                    {{$di->item}} 
                </td>
                <td>
                    {{$di->descripcion}}
                </td>
                
            </tr>
            @endforeach
            </tbody>
        </table>
                <strong>Observaciones:</strong>
                <textarea name="" id="" cols="30" rows="10">{{$Diagnostico->observaciones}}</textarea>

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
                    <font style="vertical-align: inherit">----------------------</font>
                </font>
                    <br>
                <font style="vertical-align: inherit">
                    <font style="vertical-align: inherit">Tecnico Mecanico</font>
                </font>
            </div>
            
            <div style="float:right">
            <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">-------------</font>
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
<style>
    .encabezado{
    text-align: center;
    color: black;
    
}
.tablaImage{
    width: 100%;
}
img{
    width: 90px;
    height: 90px;
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

.img1{
    width: 200px;
    height: 150px;
    padding-left: 80px;
}
.img2{
    width: 150px;
    height: 90px;
    padding-right: 100px;
    padding-bottom: 20px;
}
.contenedorH {
    padding-left: 15%;
}
.subtitulo{
    text-align: center;
    width: 80%;
    border: 2px solid;
    border-radius: 8px;
    padding: 0;
}
.tableDatos{
    width: 100%;
    border-collapse: separate;
}
.tableDatos td{
    border: 1px solid;
}
.tableItem{
    width: 100%;
    border-collapse: collapse;
}
.tableItem td{
    border: 1px solid;
}
.datos{
    text-align: left;
    
}
textarea{
    font-family: inherit;
    font-size: 100%;
    border: 1px solid;
}
.contImg{
    height: 100px;
}
</style>