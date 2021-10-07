<div class="modal fade" id="formBuilderModal" role="dialog">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <form id="formBuilderModalForm" action="">
                @csrf
                <input name="form-route" id="form-route" value="" hidden>
                <input name="form-type" id="form-type" value="" hidden>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body my-modal-body row">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="submit btn btn-primary text-white" value="Save" hidden/>
                </div>
            </form>
        </div>
    </div>
</div>
