<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('/plugins/jQueryUI/jquery-ui.js') }}"></script>

<script src="{{ asset('/js/wow.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/custom.js') }}" type="text/javascript"></script>

<!--datatables-->
<script src="{{ asset('/js/datatables.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/plugin.js') }}" type="text/javascript"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script src="{{url("/js/fb/form-builder.min.js")}}"></script>
<script src="{{url("/js/fb/form-render.min.js")}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js"></script>--}}
<script src="{{url("/js/fb/demo.js")}}"></script>

<script>
    function changeMenuType(sel){
        var category =$("#category_container");
        console.log(category);
        console.log(sel.value === 'category');
        if(sel.value === 'category' || sel.value === 'item per page'|| sel.value === 'form per page' ){
            category.show();
        }else {
            category.hide();
        }
    };

    function changeMenuParent(sel){
        var pos =$("#menu_pos");
        if(sel.value==1){
            pos.show();
        }else{
            pos.hide();
        }
    };
    function deleteMenuAction(url){
        $('#deleteMenuForm').prop("action",url);
    };
    function deleteLanguageAction(url){
        $('#deleteLanguageForm').prop("action",url);
    };
    function deleteCategoryAction(url){
        $('#deleteCategoryForm').prop("action",url);
    };
    function deletePermissionAction(url){
        $('#deletePermissionForm').prop("action",url);
    };
    function deleteItemAction(url){
        $('#deleteItemForm').prop("action",url);
    };
    function updateDictionaryAction(url){

        $('#updateDictionaryForm').prop("action",url);
    };

    function changeUserRole(sel,url){
        console.log(sel.value);

        $.ajax({
            type:"POST",
//            dataType : 'json',
            url:url,
            dataType:"JSON",
            data :{
                _token :$("#RoleToken").val(),
                role : sel.value
            },
            success: function( msg ) {
                console.log(msg);
            },
            error:function(msg){
                console.log(msg);
            }
        });
    };
    $(document).ready(function(){
        $("#btn-test").on('click', function(){
            console.log($('.frmb').html());
        });
    });

    function changeLanguageChoose(res) {
        alert(res.value);
    };
</script>
