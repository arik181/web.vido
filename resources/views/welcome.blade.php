<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/font-awesome-4.6.3/css/font-awesome.min.css">

        <style>
html, body {
    height: 100%;
}

body {
    margin: 0;
    padding: 0;
    width: 100%;
    display: table;
    font-weight: 100;
    font-family: 'Quicksand', sans-serif;
}

td {
    padding-right: 80px;
    padding-left: 80px;
}

.container {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
}

.content {
    text-align: center;
    display: inline-block;
}

.title {
    font-size: 96px;
}

.leftcol {
    text-align: left;
}

.rightcol {
    text-align: right;
}

.float-right {
    float: right;
}

#plus {
    font-size: 24px;
    font-weight: bold;
}

#qm {
    font-size: 24px;
    font-weight: bold;
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="float-right"><span id="qm">?</span></div>
                <div class="title"><i class="fa fa-angle-double-down"></i>Todo:</div>
                <table>
                @foreach ( $items as $item )
                @if ( !$item->trashed() )
                <tr id="item-{{ $item->id }}"> 
                    <td hidden><i class="fa fa-circle-o"></i></td>
                    <td class="leftcol">{{ $item->name }},</td>
                    <td class="rightcol">{{ $item->due }} </td>
                </tr>
                @endif
                @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
