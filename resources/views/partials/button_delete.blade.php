@section('inline_scripts')
<script type="text/javascript">
$('.form-delete').submit(function(){
    var callback = function() {
        this.submit();
    }.bind(this);
    modalConfirmShow("{{ $message ?? trans('common.delete_row_confirm') }}", callback);

    return false;
});
</script>
@parent
@endsection

{{ Form::open(['route' => [$route, $item], 'method' => 'delete', 'class' => 'form-delete inline-block', 'style' => 'margin:0;']) }}
    {{ method_field('delete') }}
    <button type="submit" class="btn btn-danger btn-sm">{{ trans('common.delete') }}</button>
{{ Form::close() }}
