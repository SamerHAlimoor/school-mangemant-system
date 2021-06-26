<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->

    <script type="text/javascript"> var plugin_path = '{{ asset('assets/js') }}/';</script>




<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>



<script>
    $("#btn_delete_all").hide();

      //var btn=document.getElementById("btn_delete_all").hide();
      //btn.style.visibility='hidden';
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var btn=document.getElementById("btn_delete_all");
        var l = elements.length;
       

        if (elem.checked) {

            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
                $("#btn_delete_all").show();

            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
                $("#btn_delete_all").hide();

            }
        }
    }

    function showHideBtn(className,elem) {

        checkboxes = document.getElementsByClassName(className);
        selectedCboxes = Array.prototype.slice.call(checkboxes).filter(ch => ch.checked==true);
        if (selectedCboxes.length>=1) {
            $("#btn_delete_all").show();
        }else{
            $("#btn_delete_all").hide();
              }

    }
</script>

<!-- المرحلة الدراسية القديمة   -->

<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');

                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                           
                        });

                       
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            var counter = 0;
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            counter++;
                        });
                        if(counter<=0){
                            $('select[name="section_id"]').append('<option selected disabled >{{trans('Parent_trans.Empty')}}...</option>');

                        }
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- المرحلة الدراسية الجديدة   -->
<script>
    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $('select[name="Classroom_id_new"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            var count = 0;
                        if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function (key, value) {
                           
    $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
  

                           
        

                        
                            count++;
                           

                        });
                        //console.log(count + ' items'); 
                        if(count<=0){
                            $('select[name="section_id_new"]').append('<option selected disabled >{{trans('Parent_trans.Empty')}}...</option>');

                        }
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
