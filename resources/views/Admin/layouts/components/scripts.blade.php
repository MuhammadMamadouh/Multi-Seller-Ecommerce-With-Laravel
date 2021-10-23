<!-- latest jquery-->
<script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('/js/sidebar-menu.js')}}"></script>

<script src="{{asset('/js/sweetalert2.js')}}"></script>


<!--user custom js-->
{{--/<script src="{{{asset('/js/user/default.js')}}}"></script>--}}

<!--right sidebar js-->
<script src="{{{asset('/js/chat-menu.js')}}}"></script>

<!--height equal js-->
<script src="{{{asset('/js/equal-height.js')}}}"></script>

<!-- lazyload js-->
<script src="{{{asset('/js/lazysizes.min.js')}}}"></script>

@yield('extra-js')

<!--script admin-->
<script src="{{{asset('/js/admin-script.js')}}}"></script>

<script type="javascript">
    function checkAll(){
        $('input[class="itm_chkbx"]:checkbox').each(function (){
            if ($('input[id="check_all"]:checkbox:checked').length == 0){
                $(this).prop('checked', false)
            }else{
                $(this).prop('checked', true)
            }
        })
    }
</script>
