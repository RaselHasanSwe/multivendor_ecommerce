<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="editInnerCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="myModalLabel17">EDIT INNER CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateInnerCategoryForm" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group ">
                                <label class="col-md-3 label-control text-uppercase" for="category">Category Name</label>
                                <select id="category" required name="category_id" class="form-control">
                                    <option value="" selected="selected" disabled="">-- choose category --</option>
                                    @include('admin.components.basic-dropdown',['items'=>$categories, 'selected'=>$inner_category->category_id])
                                </select>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 label-control text-uppercase" for="sub-category">Sub Category Name</label>
                                <select id="sub-category" required name="sub_category_id" class="form-control">
                                    <option value="{{$inner_category->subcategory->id}}" selected >{{$inner_category->subcategory->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inner-category-id" class="text-uppercase">Inner Category Name</label>
                                <input type="hidden" name="id" value="{{ $inner_category->id }}">
                                <input type="text" required="" name="name" value="{{ $inner_category->name }}" class="form-control">
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
