<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<div>
    @include('livewire.create-category')
    @include('livewire.edit-category')
    <div class="container py-4">
        <div class="card">
            <div class="d-flex justify-content-between p-3">
                <div class="left-side">
                    category( {{count($category_count)}} )
                </div>
                <div class="right-side">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                        Add Category
                    </button>
                </div>
            </div>
        </div>
        <input type="text" class="form-control my-3" placeholder="Search Here..." wire:model="searchTerm"
            name="searchTerm">
        @if (session()->has("status"))
        <div id="status" class="alert alert-primary" role="alert">
            <strong>{{session("status")}}</strong>
        </div>
        @endif

        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Update Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->cat_name}}</td>
                        <td>{{$cat->status}}</td>
                        <td><button wire:click="activeStatus({{$cat->id}})" class="btn btn-primary">Active</button>
                            <button class="btn btn-danger" wire:click="deactiveStatus({{$cat->id}})">Deactive</button>
                        </td>
                        <td><button data-toggle="modal" data-target="#updateModel"
                                wire:click="editCategory({{$cat->id}})" class="btn btn-primary">Edit</button>
                        </td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$category->links()}}
        </div>
    </div>
</div>