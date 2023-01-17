@extends('admin.master')
@section('title', 'Bugungi ovqatlar ('.$child.'-kishilik)')
@section('content')
    <div class="row">
        <?php $s = array(); ?>
            <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
{{--                    <form action="{{ route('warehouse_list') }}">--}}
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

{{--                                                    <input type="hidden" name="warehouse_id[]"--}}
{{--                                                           value="{{ $item['warehouse_id'] }}">--}}
{{--                                                    <input type="hidden" name="count[]"--}}
{{--                                                           value="{{ $item->count*$child }}">--}}


                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        <button type="submit" class="btn btn-success">Qabul qilish</button>--}}
{{--                    </form>--}}
                    <form action="{{ route('warehouse_list') }}" class="p-3">
                        @foreach($sum as $key => $item)
                            <input type="hidden" name="warehouse_id[]" value="{{ $item['id'] }}">
                            <div class="d-flex mb-2">
                                <input readonly class="bg-info form-control w-25 mr-2" type="text" name="warehouse_name[]"
                                       value="{{ $item['name'] }}">
                                <input
                                    @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])
                                        class="bg-danger form-control w-25"
                                    @else
                                        class="bg-success form-control w-25"
                                    @endif
                                    type="text" readonly name="count[]" value="{{ $item['count'] }}">
                                <input type="hidden" name="check[]"
                                       @if(\App\Models\Warehouse::find($item['id'])->count < $item['count'])
                                           value="0"
                                       @else
                                           value="1"
                                    @endif
                                >
                            </div>
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
