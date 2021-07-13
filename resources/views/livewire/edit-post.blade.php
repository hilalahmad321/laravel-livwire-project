<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Enter Title</label>
                        <input type="text" name="edit_title" id="" wire:model="edit_title" class="form-control">
                        <input type="text" name="edit_ids" id="" wire:model="edit_ids" class="form-control">
                        @error('edit_title')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Category</label>
                        <select name="edit_cat_id" id="" class="form-control" wire:model="cat_edit_id">
                            @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                            @endforeach
                        </select>
                        @error('edit_cat_id')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Description</label>
                        <textarea name="edit_description" wire:model="edit_description" id="" cols="30" rows="10"
                            class="form-control"></textarea>
                        @error('edit_description')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter Image</label>
                        <input type="file" name="edit_file" id="" wire:model="edit_file" class="form-control">
                        <input type="text" name="old_file" id="" wire:model="old_file" class="form-control">
                        {{-- @if ($file)
                        <img src="{{ asset('storage').$file }}" wire:model="edit_file"
                        style="width: 100px;height:100px;" alt="">
                        @endif --}}

                        @error('edit_file')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="update_post()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>