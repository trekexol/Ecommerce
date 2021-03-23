<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product has been deleted successfully!');
    }




    public function render()
    {
      
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('livewire.admin.admin-product-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}

