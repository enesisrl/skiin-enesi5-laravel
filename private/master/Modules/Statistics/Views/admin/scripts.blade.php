<script type="text/javascript">
    $(document).ready(function(){
        $("#shoe_measure_id_all_field").change(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                $(".shoe_measure_select", $row).val(me.val());
            });
        });
        $("#category_id_all_field").change(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                $(".category_select", $row).val(me.val());
            });
        });

        $("#description_all_field").keyup(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                $(".massive_description", $row).val(me.val());
            });
        });

        $(".switch-component input:checkbox").change(function(){
            if (!$(this).is(":checked")){
                $(this).removeAttr("checked");
            }else{
                $(this).attr("checked","checked");
            }
        });

        $("#select_all").change(function(){
            if ($(this).is(":checked")){
                $(".selected_record").attr("checked","checked");
            }else{
                $(".selected_record").removeAttr("checked");
            }
        });
        $("#not_in_use_all_field").change(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                if (me.is(":checked")){
                    $(".not_in_use_checkbox",$row).attr("checked","checked");
                }else{
                    $(".not_in_use_checkbox",$row).removeAttr("checked");
                }
            });
        });
        $("#warehouse_all_field").change(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                if (me.is(":checked")){
                    $(".warehouse_checkbox",$row).attr("checked","checked");
                }else{
                    $(".warehouse_checkbox",$row).removeAttr("checked");
                }
            });
        });
        $("#paese_all_field").change(function(){
            const me = $(this);
            $(".selected_record:checked").each(function(){
                const $row = $(this).closest("tr");
                if (me.is(":checked")){
                    $(".paese_checkbox",$row).attr("checked","checked");
                }else{
                    $(".paese_checkbox",$row).removeAttr("checked");
                }
            });
        });
    })
</script>
