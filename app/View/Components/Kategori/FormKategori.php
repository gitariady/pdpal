<?php

namespace App\View\Components\Kategori;
use App\Models\Kategori;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormKategori extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $nama, $deskripsi;
    public function __construct($id = null)
    {
        if($id){
            $kategori = Kategori::find($id);
            $this->id = $kategori->id;
            $this->nama = $kategori->nama;
            $this->deskripsi = $kategori->deskripsi;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kategori.form-kategori');
    }
}
