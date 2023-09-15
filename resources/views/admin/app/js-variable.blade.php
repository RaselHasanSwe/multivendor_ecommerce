<script>
  window.base_url                 = '<?= url("/") ?>';
  window.token                    = '<?= csrf_token(); ?>';
  window.contact_view             = '<?= route('admin.contact.view') ?>';
  window.contact_delete           = '<?= route('admin.contact.delete') ?>';

  window.get_colors               = '<?= route('admin.color.index') ?>';
  window.delete_color             = '<?= route('admin.color.delete') ?>';
  window.edit_color               = '<?= route('admin.color.edit') ?>';
  window.update_color             = '<?= route('admin.color.update') ?>';

  window.get_size                 = '<?= route('admin.size') ?>';
  window.delete_size              = '<?= route('admin.size.delete') ?>';
  window.edit_size                = '<?= route('admin.size.edit') ?>';
  window.update_size              = '<?= route('admin.size.update') ?>';

  window.get_faq                  = '<?= route('admin.faqs.index') ?>';
  window.delete_faq               = '<?= route('admin.faqs.delete') ?>';
  window.edit_faq                 = '<?= route('admin.faqs.edit') ?>';
  window.update_faq               = '<?= route('admin.faqs.update') ?>';

  window.get_category             = '<?= route('admin.category.index') ?>';
  window.edit_category            = '<?= route('admin.category.edit') ?>';
  window.update_category          = '<?= route('admin.category.update') ?>';
  window.delete_category          = '<?= route('admin.category.delete') ?>';

  window.get_sub_category         = '<?= route('admin.subcategory.index') ?>';
  window.edit_sub_category        = '<?= route('admin.subcategory.edit') ?>';
  window.update_sub_category      = '<?= route('admin.subcategory.update') ?>';
  window.delete_sub_category      = '<?= route('admin.subcategory.delete') ?>';
  window.sub_category_by_id       = '<?= route('admin.subcategory.byId') ?>';

  window.get_inner_category       = '<?= route('admin.inner.category.index') ?>';
  window.delete_inner_category    = '<?= route('admin.inner.category.delete') ?>';
  window.edit_inner_category      = '<?= route('admin.inner.category.edit') ?>';
  window.update_inner_category    = '<?= route('admin.inner.category.update') ?>';

  // Product
  window.create_product           = '<?= route('admin.product.store') ?>';
  window.get_products             = '<?= route('admin.product.index') ?>';
  window.get_active_products      = '<?= route('admin.products.active') ?>';
  window.get_requested_products   = '<?= route('admin.products.requested') ?>';
  window.get_rejected_products    = '<?= route('admin.products.rejected') ?>';
  window.get_hidden_products      = '<?= route('admin.products.hidden') ?>';
  window.update_product           = '<?= route('admin.product.update') ?>';
  window.delete_product           = '<?= route('admin.product.delete') ?>';

  //Coupons Veriables
  window.get_coupons              = '<?= route('admin.coupon.index') ?>'
  window.delete_coupons           = '<?= route('admin.coupon.delete') ?>';
  window.edit_coupons             = '<?= route('admin.coupon.edit') ?>';
  window.update_coupons           = '<?= route('admin.coupon.update') ?>';

  window.vendors                  = '<?= route('admin.vendors') ?>';
  window.get_deactive_vendor      = '<?= route('admin.deactive_vendors') ?>';
  window.vendor_status            = '<?= route('admin.vendors_status') ?>';

  window.get_customers            = '<?= route('admin.customers') ?>';

  //Contacts Veriables
  window.get_contacts              = '<?= route('admin.contact.index') ?>'
  window.delete_contacts           = '<?= route('admin.contact.delete') ?>';

    window.get_sliders             = '<?= route('admin.slider.index') ?>';
    window.delete_slider           = '<?= route('admin.slider.delete') ?>';
    window.edit_slider             = '<?= route('admin.slider.edit') ?>';
    window.update_slider           = '<?= route('admin.slider.update') ?>';
    
    window.get_order               = '<?= route('admin.order.index') ?>';
</script>
