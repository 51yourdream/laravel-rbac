@section('masterJs')
<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{asset('static/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('static/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<script src="{{asset('static/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/modernizr.min.js')}}"></script>
<script src="{{asset('static/js/jquery.nicescroll.js')}}"></script>
{{--layer弹框--}}
<script src="{{asset('static/layer/layer.js')}}"></script>

<!--common scripts for all pages-->
<script src="{{asset('static/js/scripts.js')}}"></script>
{!! Toastr::render() !!}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@show
