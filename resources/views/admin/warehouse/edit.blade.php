<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mahsulot tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('warehouse.store')}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_name">Nomi:</label>
                            <input type="text" name="name" class="form-control" id="edit_name" required>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="edit_count">Miqdori:</label>--}}
{{--                            <input type="number" name="count" class="form-control" id="edit_count" required>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="edit_type">Birligi:</label>
                            <select name="type" id="edit_type" class="form-control form-select">
                                <option value="ml">ml</option>
                                <option value="gr">gr</option>
                                <option value="dona">dona</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Miqdor qo'shish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('warehouse.store')}}" method="post" id="edit_form2">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="add_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_count">Miqdori:</label>
                            <input type="number" name="count" class="form-control" id="edit_count" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
