<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Enter Category name</label>
                        <input type="text" wire:model="edit_cat_name" name="cat_name" id="cat_name"
                            class="form-control">
                        <input type="hidden" wire:model="edit_cat_id" name="cat_name" id="cat_name"
                            class="form-control">
                        @error('cat_name')
                        <h6 class="text-danger">{{$message}}</h6>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click.prevent="updateCategory()" type="submit"
                            class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>