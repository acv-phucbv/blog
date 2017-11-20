@section('inline_scripts')
<script type="text/javascript">
    var modalConfirm = $('#modal-confirm');

    function modalConfirmShow(content, callback) {
        modalConfirm.find('.modal-body').empty().html(content);
        modalConfirm.modal('show');
        modalConfirm.find('.confirm').on('click', callback);
    }
</script>
@parent
@endsection

<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('common.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ trans('common.confirm') }}</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">{{ trans('common.close') }}</button>
                <button type="button" class="btn red btn-outline confirm" data-dismiss="modal">{{ trans('common.i_agree') }}</button>
            </div>
        </div>
    </div>
</div>
