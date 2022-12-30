
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ovqatni tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('menu.update',1)}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $ovqat->id }}">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_warehouse_id">Mahsulot:</label>
                            <select name="warehouse_id" id="edit_warehouse_id" class="form-control form-select">
                                @foreach($mahsulotlar as $ovqat)
                                    <option value="{{$ovqat->id}}">{{$ovqat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_count">Miqdori:</label>
                            <input type="text" name="count" class="form-control" id="edit_count">
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
