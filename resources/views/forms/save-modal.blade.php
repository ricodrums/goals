<!-- Modal -->
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="save-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="save-modalLabel">Make Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Put the amount of money you wish to save on your Goal.
                <form action="goal/payment" class="form row" method="POST" id="payment">
                    @csrf
                    @method('post')
                    <div class="form-group col-12" hidden>
                        <input type="text" class="form-control" name="goal_id" value="" id="goal-id">
                    </div>
                    <div class="form-group col-12">
                        <input type="number" class="form-control" name="save_amount" min="0" required>
                    </div>

                    <div class="modal-footer col-12 pb-0">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
