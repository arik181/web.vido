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
        $items = Item::all();
        return view ('welcome', ['items' => $items ]);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
    }

    public function addItem($name, $due)
    {
        $item = new Item;

        $item->name = $name;
        $item->due  = $due;

        $item->save();
    }
}
