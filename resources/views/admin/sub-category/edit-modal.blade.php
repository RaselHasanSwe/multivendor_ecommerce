<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="myModalLabel17">EDIT SUB CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateSubCategoryForm" method="post">
                        @csrf
                        
                        <div class="modal-body">
                            <div class="form-group ">
                                <label class="col-md-3 label-control text-uppercase" for="category">Category Name</label>
                                <select id="category" required name="category_id" class="form-control">
                                    <option value="" selected="" disabled="">-- choose category --</option>
                                    @include('admin.components.basic-dropdown',['items'=>$categories, 'selected'=>$sub_category->category_id])
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Sub Category Name</label>
                                <input type="hidden" name="id" value="{{ $sub_category->id }}" >
                                <input type="text" required="" name="name" value="{{ $sub_category->name }}"  class="form-control">
                            </div>
                            
                            <div class="form-group ">
                                <input type="checkbox" value="0" name="hide_product_from_home" class="switchery" data-size="sm" id="hide_product_from_home"  {{ $sub_category->hide_product_from_home == 1 ? 'checked' : '' }}>
                                <label  for="hide_product_from_home">Hide Product From Home</label>
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
