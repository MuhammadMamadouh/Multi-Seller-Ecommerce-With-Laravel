function checkAll(){
    $('input[class="itm_chkbx"]:checkbox').each(function (){
        if ($('input[id="check_all"]:checkbox:checked').length == 0){
            $(this).prop('checked', false)
        }else{
            $(this).prop('checked', true)
        }
    })
}
