<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <form id="viewModalForm" action="">
                @csrf
                <input name="form-route" id="form-route" value="" hidden>
                <input name="form-type" id="form-type" value="" hidden>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body my-modal-body">
                </div>
            </form>
        </div>
    </div>
</div>
