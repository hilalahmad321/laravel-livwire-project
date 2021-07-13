<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post as ModelsPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    public $edit_ids;
    public $title;
    public $description;
    public $cat_id;
    public $file;
    public $category;
    public $edit_title;
    public $edit_description;
    public $cat_edit_id;
    public $edit_file;
    public $old_file;

    public function render()
    {
        $post = ModelsPost::all();
        $this->category = Category::all();
        return view('livewire.post', ["posts" => $post]);
    }
    public function restoreInput()
    {
        $this->title = "";
        $this->description = "";
        $this->cat_id = "";
        $this->file = "";
    }

    use WithFileUploads;
    public function addPosts()
    {
        $user = Auth::user()->id;
        // dd($user);

        $validate = $this->validate([
            "title" => "required",
            "description" => "required",
            "file" => "required",
        ]);
        $post = new ModelsPost();
        $post->user_id = $user;
        $post->cat_id = $this->cat_id;
        $post->title = $this->title;
        $post->description = $this->description;
        $filename = $this->file->store("upload", "public");
        $post->images =  $filename;
        $post->save();
        session()->flash("status", "Post Add Successfully");
        $this->restoreInput();
        $this->emit("addPost");
    }

    public function edit_post($id)
    {
        $posts = ModelsPost::find($id);
        $this->edit_ids = $posts->id;
        $this->edit_title = $posts->title;
        $this->edit_description = $posts->description;
        $this->edit_file = $posts->images;
        $this->cat_edit_id = $posts->cat_id;
        $this->old_file = $posts->images;
    }


    public function update_post()
    {
        $posts = ModelsPost::where("id", $this->edit_ids);
        $posts->posts = $this->posts;
        // $posts->title = $this->edit_title;
        // $posts->description = $this->edit_description;
        // $posts->cat_edit_id = $this->cat_edit_id;
        // // dd($this->edit_file);
        // if ($this->edit_file) {
        //     $filename = $this->edit_file->store("upload", "edit_file");
        // } else {
        //     $filename = $this->old_file;
        // }

        // dd($filename);
        // $posts->images = $filename;

        $posts->save();

        session()->flash("status", "Post update Succesfully");
        $this->emit("udpateModal");
    }
}