<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/font-awesome-4.6.3/css/font-awesome.min.css">
        <script type="text/javascript" src="/js/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/js/keys.js"></script>

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
    padding: 20px;
}

.title {
    font-size: 96px;
}

.input-circle-cell {
    left: 200px;
}

.circle-cell {
    padding: 0px;
    padding-right: 20px;
}

.left-input-col {
    text-align: left;
    padding-left: 35px;
}

.right-input-col {
    text-align: right;
    margin-left: 35px;
}

.leftcol {
    text-align: left;
    padding-right: 20px;
}

.rightcol {
    text-align: right;
    padding-left: 20px;
}

.float-right {
    float: right;
}

#fade {
    font-size: 14px;
    text-align: center;
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
                <div id="fade" hidden>
                    <table>
                    <tr id="key-1"> 
                        <td class="leftcol" style="color:green;">?</td>
                        <td class="rightcol">This menu.</td>
                    </tr>
                    <tr id="key-1"> 
                        <td class="leftcol" style="color:red;"> Ret/Ent</td>
                        <td class="rightcol">Edit an item.</td>
                    </tr>
                    <tr id="key-2"> 
                        <td class="leftcol" style="color:red;">a / i</td>
                        <td class="rightcol">Add to top.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:red;">A / I</td>
                        <td class="rightcol">Add to bottom.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:green;">j</td>
                        <td class="rightcol">Go up.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:green;">k</td>
                        <td class="rightcol">Go down.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:red;">J</td>
                        <td class="rightcol">Move item up.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:red;">K</td>
                        <td class="rightcol">Move item down.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:red;">d</td>
                        <td class="rightcol">Defer till tomorrow.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:green;">D</td>
                        <td class="rightcol">Delete from list.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:green;">g</td>
                        <td class="rightcol">Go to top.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol" style="color:green;">G</td>
                        <td class="rightcol">Go to bottom.</td>
                    </tr>
                    </table>
                </div>

                <div class="title">
                    <i class="fa fa-angle-double-down"></i> todo:
                    <span id="qm" title="Type ? for commands" onclick="$('#fade').toggle()">?</span>
                </div>
                <table id="upper-input-table">
                    <tr id="upper-input-row" hidden>
                        <td class="left-input-col"><input id="upper-name-input" class="name-input"></input></td>
                        <td class="right-input-col"><input id="upper-due-input" class="due-input"></input></td>
                    </tr>
                </table>
                <table id="item-table">
                @foreach ( $items as $item )
                @if ( !$item->trashed() )
                <tr id="item-{{ $item->id }}"> 
                    <td class="circle-cell"><div class="id" hidden>{{ $item->id }}</div><i class="fa fa-circle-o" id="circle-{{ $item->id }}" style="display:none;" ></i></td>
                    <td class="leftcol">{{ $item->name }}</td>
                    <td class="rightcol">{{ $item->due }} </td>
                </tr>
                @endif
                @endforeach
                </table>
                <table id="lower-input-table">
                <tr id="lower-input-row" hidden>
                    <td class="left-input-col"><input id="lower-name-input" class="name-input"></input></td>
                    <td class="right-input-col"><input id="lower-due-input" class="due-input"></input></td>
                </tr>
                </table>
            </div>
        </div>
    </body>
</html>
