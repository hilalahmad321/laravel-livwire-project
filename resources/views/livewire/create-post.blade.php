<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Posts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Enter Title</label>
                        <input type="text" name="title" id="" wire:model="title" class="form-control">
                        @error('title')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Category</label>
                        <select name="cat_id" id="" class="form-control" wire:model="cat_id">
                            {{-- <option disabled selected> ----Select Category-----</option> --}}
                            @foreach ($category as $cat)

                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                            @endforeach
                        </select>
                        @error('cat_id')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Description</label>
                        <textarea name="description" wire:model="description" id="" cols="30" rows="10"
                            class="form-control"></textarea>
                        @error('description')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Image</label>
                        <input type="file" name="title" id="" wire:model="file" class="form-control">
                        @error('file')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="addPosts()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>