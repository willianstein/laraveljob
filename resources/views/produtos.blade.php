<html>
    <head>
        <style>
            table{
                border-collapse: collapse;
            }
            table, th,td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>PRODUTO</td>
            </tr>
            @foreach($produtos as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->nome}}</td>
                <td>
                   @foreach($p->categorias as $c)
                   <li>
                   {{$c->nome}}
                   </li>
                   @endforeach
                </td>
            </tr>
            @endforeach

        </table>
    </body>
</html>
