
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
                <form action="{{route('foods.store')}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_time">Vaqti:</label>
                            <select name="time" id="edit_time" class="form-control form-select" required>
                                <option value="1">Nonushta</option>
                                <option value="2">Tushlik</option>
                                <option value="3">Kechlik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_menu_id">Nomi:</label>
                            <select name="menu_id" id="edit_menu_id" class="form-control form-select" required>
                                @foreach($menu as $food)
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_date">Sana:</label>
                            <input type="date" name="date" id="edit_date" class="form-control" required>
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
