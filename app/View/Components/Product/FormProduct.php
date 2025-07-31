<?php

namespace App\View\Components\Product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Kategori;

class FormProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $name, $sku, $harga_jual, $harga_beli, $stok, $stok_min, $is_active,$kategori_id, $kategori;
    public function __construct($id = null)
    {
        $this->kategori = Kategori::all();
        if($id){
            $product = product::find($id);
            $this->id = $product->id;
            $this->name = $product->name;
            $this->sku = $product->sku;
            $this->harga_jual = $product->harga_jual;
            $this->harga_beli = $product->harga_beli;
            $this->stok = $product->stok;
            $this->stok_min = $product->stok_min;
            $this->is_active = $product->is_active;
            $this->kategori_id = $product->kategori_id;
        }
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.form-product');
    }
}
