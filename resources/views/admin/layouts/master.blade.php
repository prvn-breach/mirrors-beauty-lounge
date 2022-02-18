<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard </title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" />
    
     
     <link rel="stylesheet" href="{{asset('public/admin/css/site.min.css')}}" />
</head>
<body>
    @yield('content')
    <!-- <script type="text/javascript" src="{{asset('public/admin/js/jquery.min.js')}}"></script> -->

	<script type="text/javascript" src="{{asset('public/admin/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/js/site.min.js')}}"></script>
	<script src="{{asset('public/admin/js/typeahead.bundle.min.js')}}"></script>
	<script type="text/javascript" src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
	<script src="{{asset('public/admin/js/select2.min.js')}}"></script>
    <script src="{{asset('public/admin/js/select2.js')}}"></script>
    <script src="{{asset('public/admin/js/bootstrap-tagsinput.min.js')}}"></script>

	<script type="text/javascript">
	// CKEDITOR.replace('editor1');
     $(".dv_common_textarea_taginput").tagsinput();
	</script>
	<script type="text/javascript">



            $('[data-toggle="tooltip"]').tooltip();

            $(document).ready(function(){
                $('.dv_category_list_drop_ul_li_a').click(function(){
                    $(this).parent().parent().addClass().next().fadeToggle('500');
                    // $(this).next('.dv_category_drp_content').fadeToggle('500');
                    // $(this).find('.dv_category_dropdown_svg').toggleClass('dv_category_dropdown_svg_90');
                })

                // $('.dv_selected_filter_common').click(function(){
                //     $('.dv_filter_content_show').toggle();
                // })
            })
        </script>
   
</body>

</html>