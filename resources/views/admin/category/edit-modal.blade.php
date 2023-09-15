<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" >EDIT CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateCategoryForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="hidden" name="id" value="{{ $category->id }}" >
                                <input type="text" required="" name="name" value="{{ $category->name }}" id="name"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="number" required="" name="position" value="{{ $category->position }}" id="position"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" required name="icon" value="{{ $category->icon }}" id="icon"  class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                    <input type="checkbox" value="1" name="show_product_by_subcategory_in_home" class="switchery" data-size="sm" id="show_product_by_subcategory_in_home" {{  $category->show_product_by_subcategory_in_home == 1 ? 'checked' : '' }}>
                                    <label for="show_product_by_subcategory_in_home">Show product by subcategory in home</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                    <input type="checkbox" value="1" name="only_express_shipping" class="switchery" data-size="sm" id="only_express_shipping" {{ $category->only_express_shipping == 1 ? 'checked' : '' }}>
                                    <label for="only_express_shipping">Only express shipping</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                    <input type="checkbox" value="1" name="hide_category_from_home" class="switchery" data-size="sm" id="hide_category_from_home" {{ $category->hide_category_from_home == 1 ? 'checked' : '' }}>
                                    <label for="hide_category_from_home">hide_category_from_home</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-inline-block custom-control icheckbox_square-blue mb-1">
                                    <input type="checkbox" value="1" name="show_filter" class="switchery" data-size="sm" id="show_filter"  {{ $category->show_filter == 1 ? 'checked' : '' }}>
                                    <label for="show_filter">show_filter</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn grey btn-outline-info">UPDATE</button>
                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
