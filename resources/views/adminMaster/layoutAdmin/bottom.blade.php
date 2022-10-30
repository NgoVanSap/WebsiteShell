
<script src="{{ URL::to('assets/js/vendors.js') }}"></script>
<script src="{{ URL::to('assets/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 2500,
            "extendedTimeOut": 1,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
</script>
<script>
    $(document).ready(function() {
        var courseItemCheckbox = $('input[class="checkedOder"]');
        var checkboxAll = $('#master');
            $('#master').on('click', function(e) {

                var isCheckedAll =  $(this).prop('checked');
                   $(".checkedOder").prop('checked', isCheckedAll);

            });

            courseItemCheckbox.change(function () {
                var isCheckedAll = courseItemCheckbox.length === $('input[class="checkedOder"]:checked').length;
                checkboxAll.prop('checked', isCheckedAll);
            });


            $('#deleteAll').click(function(){

                var arrCheckBox = [];
                $(".checkedOder:checked").each(function() {
                    arrCheckBox.push($(this).attr('data-id'));
                });

                if(arrCheckBox.length <= 0) {
                    alert("Please select row.");
                } else {
                    var checkConfirm = confirm("Do you want to delete these ("+arrCheckBox.length+") orders?"  );

                    if(checkConfirm == true) {
                        var joinArrCheckBox = arrCheckBox.join(",");

                        $.ajax({
                            url: $(this).data('url'),
                            type:"DELETE",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:'selectAll='+joinArrCheckBox,
                            success:function(data){
                                if(data.status == true) {
                                    $(".checkedOder:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    $("#master").prop('checked',false);
                                     location.reload();
                                }
                            }
                        });
                    }
                }
            });

            $('#changeDate').change(function () {
               var formDate = $('#changeDate').val();

               var payload = {
                'changeDate' : formDate,
               }
               $.ajax({
                    url : "/admin/home/order/filter",
                    type: "GET",
                    data: payload,

                    success:function (data) {
                        if(data.status == false) {
                            console.log("Không data");

                        } else {
                            console.log(data.dataOKE);

                        }
                    }

               });
            });

            $('#changePassword').on('click', function (e) {
                e.preventDefault()
               var old_password         = $("input[name='old_password']").val();
               var new_password         = $("input[name='new_password']").val();
               var confirm_password     = $("input[name='confirm_password']").val();

               var payload = {
                'old_password': old_password,
                'new_password': new_password,
                'confirm_password': confirm_password,
               }

               $.ajax({
                    url:"/admin/home/change/password",
                    type:"POST",
                    data:payload,
                    beforeSend:function () {
                        $(document).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if(data.status == 0) {
                            $.each(data.error, function (prefix, value) {
                                $('span.'+prefix+'_error').text(value[0]);
                            });
                        }else if (data.status == 1) {
                            $('span.old_password_error').text(data.error);
                        } else if(data.status == 2) {
                            $('span.new_password_error').text(data.error);

                        } else {
                            $("input[name='old_password']").val("");
                            $("input[name='new_password']").val("");
                            $("input[name='confirm_password']").val("");
                            toastr.success('Change password successfully');
                        }

                    }
               });


            });

    });
</script>
