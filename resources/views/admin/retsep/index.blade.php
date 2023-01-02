@extends('admin.master')
@section('title', $ovqat->name. " mahsulotlari")
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.retsep.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot</th>
                            <th>Miqdori</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($retsep as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>
                                    @if($firm->warehouse->name)
                                        {{$firm->warehouse->name}}
                                    @endif
                                </td>
                                <td>{{$firm->count}}</td>
                                <td class="d-flex">

{{--                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"--}}
{{--                                            data-toggle="modal" data-target="#modal-edit">--}}
{{--                                        <i class="fa fa-pen"></i>--}}
{{--                                    </button>--}}


                                    <form action="{{route('menu.destroy', $firm->id)}}" method="post">
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
                @include("admin.retsep.edit")
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

        let firmes =@json($retsep);

        function edit(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_count').value = firms['count'];
                    document.getElementById('edit_warehouse_id').value = firms['warehouse_id'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection
