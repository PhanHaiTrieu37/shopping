
$( function (){

    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })

    $(".select2_init").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    });

});
$(document).ready(function() {
    var editor = new FroalaEditor('#description');
});


