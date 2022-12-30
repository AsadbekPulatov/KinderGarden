
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Bolani ma'lumotlarini tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('children.update',1)}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_name">Ism:</label>
                            <input type="text" name="name" class="form-control" id="edit_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_surname">Familiya:</label>
                            <input type="text" name="surname" class="form-control" id="edit_surname" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_birth_date">Tug'ilgan sana:</label>
                            <input type="date" name="birth_date" class="form-control" id="edit_birth_date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_group_id">Guruh:</label>
                            <select name="group_id" id="edit_group_id" class="form-control form-select">
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
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
