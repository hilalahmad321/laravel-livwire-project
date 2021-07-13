<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{


    public $cat_name;
    public $edit_cat_id;
    public $edit_cat_name;
    // public $category;
    public $searchTerm;


    use WithPagination;
    public function render()
    {
        $searchTerm = "%" . $this->searchTerm . "%";
        $category = ModelsCategory::where("cat_name", "LIKE", $searchTerm)->paginate(4);
        $cat_count=ModelsCategory::all();
        return view('livewire.category', ["category" => $category,"category_count"=>$cat_count]);
    }

    public function restoreInput()
    {
        $this->cat_name = "";
    }
    public function addCategory()
    {
        $validate = $this->validate([
            "cat_name" => "required",
        ]);

        ModelsCategory::create($validate);
        session()->flash("status", "Category Add successfully");
        $this->restoreInput();
        $this->emit("addCategory");
    }
    public function activeStatus($id)
    {
        $category = ModelsCategory::find($id);
        $category->status = 1;
        $category->save();
        // $category->update([
        //     "status" => 1
        // ]);

        session()->flash("status", "Category Are active");
    }

    public function deactiveStatus($id)
    {
        $category = ModelsCategory::find($id);
        $category->status = 0;
        $category->save();
        // $category->update([
        //     "status" => 0
        // ]);
        session()->flash("status", "Category are Deactive");
    }

    public function editCategory($id)
    {
        $category = ModelsCategory::find($id);
        $this->edit_cat_id = $category->id;
        $this->edit_cat_name = $category->cat_name;
    }

    public function updateCategory()
    {
        if ($this->edit_cat_id) {
            $category = ModelsCategory::find($this->edit_cat_id);
            $category->cat_name = $this->edit_cat_name;
            $category->save();
            session()->flash("status", "Category Update Successfully");
            $this->restoreInput();
            $this->emit("updateCategory");
        }
    }
}