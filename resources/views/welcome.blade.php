<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">

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
    padding-right: 80px;
}

.rightcol {
    text-align: right;
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Todo:</div>
                <table>
                @foreach ( $items as $item )
                <tr> 
                    <td class="leftcol">{{ $item->name }},</td>
                    <td class="rightcol">{{ $item->due }} </td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
