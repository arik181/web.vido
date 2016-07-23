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
    padding: 20px;
}

.title {
    font-size: 96px;
}

.circle-cell {
    padding: 0px;
}

.leftcol {
    text-align: left;
    padding-left: 20px;
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

                <div id="fade" hidden>
                    <table>
                    <tr id="key-1"> 
                        <td class="leftcol">? / Return / Enter</td>
                        <td class="rightcol">This menu.</td>
                    </tr>
                    <tr id="key-2"> 
                        <td class="leftcol">a</td>
                        <td class="rightcol">Add to top of list.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">A</td>
                        <td class="rightcol">Add to bottom of list.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">j</td>
                        <td class="rightcol">Go up.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">k</td>
                        <td class="rightcol">Go down.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">J</td>
                        <td class="rightcol">Move item up.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">K</td>
                        <td class="rightcol">Move item down.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">D</td>
                        <td class="rightcol">Delete from list.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">g</td>
                        <td class="rightcol">Go to top.</td>
                    </tr>
                    <tr id="key-3"> 
                        <td class="leftcol">G</td>
                        <td class="rightcol">Go to bottom.</td>
                    </tr>
                    </table>
                </div>

                <div class="title">
                    <i class="fa fa-angle-double-down"></i> todo:
                    <span id="qm">?</span>
                </div>
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
            </div>
        </div>
    </body>
</html>
