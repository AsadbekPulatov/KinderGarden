@extends('admin.master')
@section('title', 'Bugungi ovqatlar')
@section('content')
    <div class="row">

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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>
                                    <?php
                                    if ($firm->time == 1){
                                        echo "Nonushta";
                                    }elseif ($firm->time == 2){
                                        echo "Tushlik";
                                    }
                                    else{
                                        echo "Kechlik";
                                    }
                                    ?>
                                </td>
                                <td>{{$firm->menu->name}} </td>
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
