<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Http\Models\Item;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $items = Item::orderBy('due', 'asc')->orderBy('idx', 'asc')->get();
        return view ('welcome', ['items' => $items ]);
    }

    public function deferItem($id)
    {
        $item = Item::find($id);
        $due = $item->due;
        if ( $due == 'today' )
            $item->due = 'tomorrow';
        else if ( $due == 'tomorrow' )
            $item->due = 'someday';
        else if ( $due == 'someday' )
            $item->due = 'today';

        if ($item->due != 'today')
            $item->idx = 0;
        $item->save();
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
    }

    public function incrIdx($id)
    {
        $item = Item::find($id);
        $item->idx = $item->idx + 1;
        $item->save();
    }

    public function decrIdx($id)
    {
        $item = Item::find($id);
        if ($item->idx > 1)
        {
            $item->idx = $item->idx - 1;
            $item->save();
        }
    }

    public function addTodayItem($name)
    {
        $item = new Item;

        $item->name = $name;
        $item->due  = 'today';

        $item->save();
    }

    public function addSomedayItem($name)
    {
        $item = new Item;

        $item->name = $name;
        $item->due  = 'someday';

        $item->save();
    }

    public function updateItem($id, $name)
    {
        $item = Item::find($id);

        $item->name = $name;

        $item->save();
    }
}
