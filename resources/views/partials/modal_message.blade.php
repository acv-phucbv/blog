@section('inline_scripts')
<script type="text/javascript">
    var modalMessage = $('#modal-message');

    function modalMessageShow(content)
    {
        modalMessage.find('.modal-body').empty().html(content);
        modalMessage.modal('show');
    }
</script>
@parent
@endsection

<div id="modal-message" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">{{ trans('common.close') }}</button>
            </div>
        </div>
    </div>
</div>
