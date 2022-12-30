<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
    </div>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mahsulot qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('warehouse.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nomi:</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="count">Miqdori:</label>
                                <input type="number" name="count" class="form-control" id="count" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Birligi:</label>
                                <select name="type" id="type" class="form-control form-select">
                                    <option value="ml">ml</option>
                                    <option value="gr">gr</option>
                                    <option value="dona">dona</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
    <!-- /.modal -->
</div>
