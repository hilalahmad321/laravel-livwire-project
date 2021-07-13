<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<div>
    @include('livewire.create-post')
    @include('livewire.edit-post')
    <div class="container">
        <div class="card ">
            <div class="p-4 d-flex justify-content-between">
                <div class="left-side">
                    Post ( 44 )
                </div>
                <div class="right-side">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                        Add Posts
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Update Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img src="{{ asset('storage') }}/{{$post->images}}" style="width: 100px;height:100px;"
                                alt=""></td>
                        <td>{{$post->category->cat_name}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->status}}</td>
                        <td>
                            <button class="btn btn-primary">Active</button>
                            <button class="btn btn-danger">Deactive</button>
                        </td>
                        <td><button data-target="#updateModal" data-toggle="modal"
                                wire:click.prevent="edit_post({{$post->id}})" class="btn btn-primary">Edit</button>
                        </td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            {{-- @foreach ($posts as $post)
            {{$post->category->cat_name}}
            {{$post->user->name}}
            {{ asset('storage') }}/{{$post->images}}

            @endforeach --}}
        </div>
    </div>

</div>