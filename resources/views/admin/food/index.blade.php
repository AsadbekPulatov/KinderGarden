@extends('admin.master')
@section('title', 'Haftalik Ovqatlar')
@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.food.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vaqt</th>
                            <th>Ovqat</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foods as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>
                                    <?php
                                    if ($firm->time == 1) {
                                        echo "Nonushta";
                                    } elseif ($firm->time == 2) {
                                        echo "Tushlik";
                                    } else {
                                        echo "Kechlik";
                                    }
                                    ?>
                                </td>
                                <td>
                                    @if(isset($firm->menu->name))
                                        {{$firm->menu->name}}
                                    @endif
                                </td>
                                <td>{{$firm->date}} </td>
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('foods.destroy', $firm->id)}}" method="post">
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
                @include("admin.food.edit")
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

        let firmes =@json($foods);

        function edit(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_menu_id').value = firms['menu_id'];
                    document.getElementById('edit_time').value = firms['time'];
                    document.getElementById('edit_date').value = firms['date'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection
