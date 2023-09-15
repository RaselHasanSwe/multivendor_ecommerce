<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editFaqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title" id="myModalLabel17">Edit FAQ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateFaqForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="issueinput3">Title</label>
                                <input type="hidden" name="id" value="{{ $faq->id }}" >
                                <input type="text" required="" name="name" value="{{ $faq->title }}"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="issueinput3">Description</label>
                                <textarea required rows="5" class="form-control summernote" name="description">{{ $faq->description }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn grey btn-outline-info">Save</button>
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
