<!--Sending Quiz Modal -->
<div class="modal fade" id="quiz_result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="progress"></div>

                <table id="answers" class="table">
                    <thead>
                        <tr>
                            <th>السؤال</th>
                            <th>إجابتك</th>
                            <th>الإجابة الصحيحة</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <h3 id="mabrook" style="float: right; display: none;"><span class="label label-success">مبروك</span></h3>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('app.close') }}</button>
            </div>
        </div>
    </div>
</div>