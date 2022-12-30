@extends('admin.master')
@section('title', 'Mahsulotlar')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.warehouse.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot</th>
                            <th>Miqdori</th>
                            <th>Birligi</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouses as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->name}}</td>
                                <td>{{$firm->count}}</td>
                                <td>{{$firm->type}}</td>
                                <td class="d-flex">

                                    <button type="button" onclick="add({{$firm->id}})" class="btn btn-info"
                                            data-toggle="modal" data-target="#modal-add">
                                        <i class="fa fa-car"></i>
                                    </button>

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('warehouse.destroy', $firm->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm"><i
                                                class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include("admin.warehouse.edit")
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
@section('custom-scripts')
    <script>

        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

        let firmes =@json($warehouses);

        function edit(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_name').value = firms['name'];
                    document.getElementById('edit_type').value = firms['type'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
        function add(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('add_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection
