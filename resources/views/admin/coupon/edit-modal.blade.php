<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editCouponModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="myModalLabel17">EDIT COUPON</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateCouponForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="issueinput3">Coupon Amount</label>
                                <input type="hidden" name="id" value="{{ $coupon->id }}">
                                <input type="text" required="" name="coupon_amount" value="{{ $coupon->coupon_amount }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="issueinput3">Coupon Type</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1"name="coupon_type" value="percentage" {{ $coupon->coupon_type == 'percentage' ? 'checked' :'' }}>
                                    <label for="customRadio1" class="custom-control-label">Percentage</label>
                                </div>

                                <input type="hidden" name="id" value="{{ $coupon->id }}">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="coupon_type" value="amount"  {{ $coupon->coupon_type == 'amount' ? 'checked' :'' }}>
                                    <label for="customRadio2" class="custom-control-label">Amount</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="issueinput3">Coupon Status </label>                           
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" name="coupon_status" value="active" {{ $coupon->coupon_status == 'active' ? 'checked' :'' }}>
                                    <label for="customRadio3" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio4" name="coupon_status" value="deactive" {{ $coupon->coupon_status == 'deactive' ? 'checked' :'' }} >
                                    <label for="customRadio4" class="custom-control-label">Deactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn grey btn-outline-info">Save</button>
                            <button type="button" class="btn grey btn-outline-secondary"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
