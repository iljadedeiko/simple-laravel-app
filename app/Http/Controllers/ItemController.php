<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller {

    public function submitItm(ItemRequest $reqItm) {

        $item = new Item();
        //$item->category_id = $reqItm->input('categoryName');
        $item->name = $reqItm->input('name');
        $item->value = $reqItm->input('value');
        $item->quality = $reqItm->input('quality');

        $item->save();

        return redirect()->route('create')->with('successItm', 'Item was successfully added');
    }

    public function itemsData() {
        $item = new Item;
        return view('update', ['dataItm' => $item->all()]);
    }

    public function getOneItm($id) {
        $item = new Item;
        return view('one-item', ['data' => $item->find($id)]);
    }

    public function updatedItemSubmit($id, ItemRequest $reqItm) {

        $item = Item::find($id);
        //$item->category_id = $reqItm->input('categoryName');
        $item->name = $reqItm->input('name');
        $item->value = $reqItm->input('value');
        $item->quality = $reqItm->input('quality');

        $item->save();

        return redirect()->route('item-data')->with('successItm', 'Item was successfully updated');
    }
}
