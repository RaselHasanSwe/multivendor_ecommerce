var categories_tbl = $('.categoried-table');
var subcategories_tbl = $('.sub-categories');
var course_tbl = $('.course-table');
var course_curriculam_tbl = $('.course-curriculam-table');
var course_tag_tbl = $('.course-tag-table');
var curriculam_item_tbl = $('.curriculam-item-table');
var contact_tbl = $('.contact-table');
var instructor_tbl = $('.intructor-table');
var page_tbl = $('.page-table');

$(document).ready(function () {
    $(categories_tbl).DataTable({ stateSave: true });
    $(subcategories_tbl).DataTable({ stateSave: true });
    $(course_tbl).DataTable({ stateSave: true });
    $(course_curriculam_tbl).DataTable({ stateSave: true });
    $(contact_tbl).DataTable({ stateSave: true });
    $(instructor_tbl).DataTable({ stateSave: true });
    if ($('#summernote').length > 0) {
        $('#summernote').summernote({ height: 200 });
    }
    if ($('.summernote').length > 0) {
        $('.summernote').summernote({ height: 150 });
    }
    if ($('#what_you_will_learn').length > 0) {
        $('#what_you_will_learn').summernote({ height: 200 });
    }
    if ($('#requirements').length > 0) {
        $('#requirements').summernote({ height: 150 });
    }
    if ($('#who_this_course_for').length > 0) {
        $('#who_this_course_for').summernote({ height: 200 });
    }
});

function resetForm(formId) {
    $("#" + formId)[0].reset();
}

function deleteCategory(id, status = false) {
    let data = new FormData();
    data.append('id', id);
    data.append('status', status);
    data.append('_token', window.token);
    let table = (status == false) ? categories_tbl : subcategories_tbl;
    let output = (status == false) ? 'set-cat-data' : 'set-sub-categories';
    let aditionalData = {
        url: window.delete_category,
        method: 'POST',
        table: table,
        output: output,
    }
    window.ajaxDelete(data, aditionalData);
}

function getSubCategory() {
    let id = $('#c-category').val();
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.category_subcategory,
        method: 'POST',
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#c-subcategory').html(data);
    });
}


function deleteCourse(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course,
        method: 'POST',
        table: course_tbl,
        output: 'set-course-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteInstructor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.instructor_delete,
        method: 'POST',
        table: instructor_tbl,
        output: 'set-insturctor-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deletePage(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.page_delete,
        method: 'POST',
        table: page_tbl,
        output: 'set-page-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCourseCurriculam(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course_curriculam,
        method: 'POST',
        table: course_curriculam_tbl,
        output: 'set-course-curriculam-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCourseTag(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_course_tag,
        method: 'POST',
        table: course_tag_tbl,
        output: 'set-course-tag-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function deleteCurriculamItem(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.delete_curriculam_item,
        method: 'POST',
        table: curriculam_item_tbl,
        output: 'set-curriculam-item-data',
    }
    window.ajaxDelete(data, aditionalData);
}

function viewContact(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.contact_view,
        method: 'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#contact-view-modal').html(data);
        $('#view-contact-modal').modal('show');

    });
}

function deleteContact(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.contact_delete,
        method: 'POST',
        table: contact_tbl,
        output: 'set-contact-data',
    }
    window.ajaxDelete(data, aditionalData);
}
