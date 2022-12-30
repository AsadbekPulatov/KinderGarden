@extends('admin.master')
@section('title', 'Davomat')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @foreach($groups as $item)
                        <a href="{{ route('attendance.index', ['id' => $item['id']]) }}"
                           class="btn btn-info">{{ $item['name'] }}</a>
                    @endforeach
                    <table class="table table-hover mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ism</th>
                            <th>Familiya</th>
                            <th>Guruh</th>
                            <th>Tug'ilgan sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{route('attendance.store')}}" method="post">
                            @csrf
                            @foreach($children as $firm)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$firm->name}}</td>
                                    <td>{{$firm->surname}}</td>
                                    <td>{{$firm->group->name}}</td>
                                    <td>{{$firm->birth_date}}</td>
                                    <td class="d-flex">
                                        <input type="checkbox" name="status[]" value="{{ $firm->id }}"
                                               class="form-check" @if(in_array($firm['id'], $attendances_child)) checked @endif>
                                    </td>
                                </tr>
                        @endforeach
                            <input type="hidden" name="group_id" value="{{ $id }}">
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success mt-3">Saqlash</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
