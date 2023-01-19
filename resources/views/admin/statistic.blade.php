@extends('admin.master')
@section('title', 'Monitoring')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('statistic.index') }}" method="get">
                        <div class="d-flex w-50 align-items-center">
                            <input type="date" name="from_date" id="from_date" class="form-control mr-1">
                            <label class="form-control-label mr-3" for="from_date">dan</label>
                            <input type="date" name="to_date" id="to_date" class="form-control mr-1">
                            <label class="form-control-label mr-3" for="to_date">gacha</label>
                            <button type="submit" class="btn btn-success">Monitoring</button>
                        </div>
                    </form>
                    <table class="table table-hover mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot</th>
                            <th>Miqdori</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outlays as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{ $firm['name'] }} </td>
                                <td> <p class="btn btn-info">{{ $firm['count'] }} {{ $firm['type'] }}</p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
