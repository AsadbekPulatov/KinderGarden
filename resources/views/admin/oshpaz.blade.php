@extends('admin.master')
@section('title', 'Bugungi ovqatlar ('.$child.'-kishilik)')
@section('content')
    <div class="row">
        <?php $s = array(); ?>
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
                                <td>
                                    @if(isset($firm->menu->name))
                                        {{$firm->menu->name}}
                                    @endif
                                </td>
                                <td>
                                    @foreach(\App\Models\Retsep::where('menu_id', $firm->menu_id)->get() as $item)
                                        @if(isset($item->warehouse->id))
                                            <div class="d-flex">
                                                <p class="btn btn-info mr-2">{{ $item->warehouse->name }}</p>
                                                <p class="btn btn-info mr-2">{{ $item->count*$child.$item->warehouse->type }}</p>
                                                <p class="btn btn-success mr-2">{{ $item->count.$item->warehouse->type }}</p>
                                                <form action="{{ route('warehouse_list') }}">
                                                    <input type="hidden" name="warehouse_id" value="{{ $item['warehouse_id'] }}">
                                                    <input type="hidden" value="{{ $item->count*$child }}" name="count">
                                                    <button type="submit" class="btn btn-success">Qabul qilish</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <form action="{{ route('warehouse_list') }}">--}}
{{--                        @foreach($sum as $key => $item)--}}
{{--                            <input type="hidden" name="warehouse_id[]" value="{{ $item['id'] }}">--}}
{{--                            <input readonly class="bg-info" type="text" name="warehouse_name[]"--}}
{{--                                   value="{{ $item['name'] }}">--}}
{{--                            <input--}}
{{--                                @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])--}}
{{--                                    class="bg-danger"--}}
{{--                                @else--}}
{{--                                    class="bg-success"--}}
{{--                                @endif--}}
{{--                                type="text" readonly name="count[]" value="{{ $item['count'] }}">--}}
{{--                            <input type="hidden" name="check[]"--}}
{{--                                   @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])--}}
{{--                                       value="0"--}}
{{--                                   @else--}}
{{--                                       value="1"--}}
{{--                                @endif--}}
{{--                            >--}}
{{--                        @endforeach--}}
{{--                        <button type="submit" class="btn btn-success">Saqlash</button>--}}
{{--                    </form>--}}
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
