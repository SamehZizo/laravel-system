<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delete-form" action="">
                @csrf
                <input id="item-id" name="id" value="" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body my-modal-body">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger text-white delete" value="Delete"/>
                </div>
            </form>
        </div>
    </div>
</div>
