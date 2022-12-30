@extends('admin.master')
@section('title', 'Bugungi ovqatlar ('.$child.'-kishilik)')
@section('content')
    <div class="row">
        <?php $s = []; ?>
            <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vaqt</th>
                            <th>Ovqat</th>
                            <th>Mahsulotlar</th>
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
                                <td>{{$firm->menu->name}} </td>
                                <td>
                                    @foreach(\App\Models\Retsep::where('menu_id', $firm->menu_id)->get() as $item)
                                        <?php
                                        $s[$item->warehouse->id]['id'] = $item->warehouse->id;
                                        $s[$item->warehouse->id]['name'] = $item->warehouse->name;
                                        $s[$item->warehouse->id]['count'] = 0;
                                        ?>
                                    @endforeach
                                    @foreach(\App\Models\Retsep::where('menu_id', $firm->menu_id)->get() as $item)
                                        <p class="btn btn-info">{{ $item->warehouse->name }}</p>
                                        <?php $s[$item->warehouse->id]['count'] += $item->count * $child ?>
                                        <p class="btn btn-info">{{ $item->count*$child.$item->warehouse->type }}</p>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <form action="{{ route('warehouse_list') }}">
                        @foreach($s as $key => $item)
                            <input type="hidden" name="warehouse_id[]" value="{{ $item['id'] }}">
                            <input readonly class="bg-info" type="text" name="warehouse_name[]" value="{{ $item['name'] }}">
                            <input
                                @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])
                                    class="bg-danger"
                                @else
                                    class="bg-success"
                                @endif
                                type="text" readonly name="count[]" value="{{ $item['count'] }}">
                            <input type="hidden" name="check[]"
                                   @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])
                                       value="0"
                                   @else
                                       value="1"
                                   @endif
                            >
                        @endforeach
                        <button type="submit" class="btn btn-success">Saqlash</button>
                    </form>
                </div>
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

        @if ($message = Session::get('error'))
        toastr.error("{{$message}}");
        @endif
    </script>
@endsection
