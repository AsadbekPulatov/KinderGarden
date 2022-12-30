<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Foydalanuvchi tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.update',1)}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_name">Ism:</label>
                            <input type="text" name="name" class="form-control" id="edit_name">
                        </div>
                        <div class="form-group">
                            <label for="edit_role">Role:</label>
                            <select name="role" id="edit_role" class="form-control form-select" required>
                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                    <option value="admin">admin</option>
                                @endif
                                <option value="zouch">Zouch</option>
                                <option value="tarbiyachi">Tarbiyachi</option>
                                <option value="oshpaz">Oshpaz</option>
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
