@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title">{{translate('Add Product Unit')}}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('unit.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="radio mar-btm">
                    <label for="">Insert One By One</label>
                        <input   class="form-control" type="text" name="unit">
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit">{{ translate('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title">{{translate('Bulk upload')}}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('unit.add.bulk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="radio mar-btm">
                    <label for="">Add excel file</label>
                        <input class="form-control" type="file" name="unit">
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit">{{ translate('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body ">
    <table class="bg-white table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Status')}}</th>
                    <th>{{translate('Date')}}</th>
                    <th>{{ translate('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach($unit as $num => $data)
                        <tr>
                            <td>{{ $unit->firstItem() + $num }}</td>
                            <td>{{ $data->name }}</td>
                            @if($data->status == 1)
                                <td>Active</td>
                            @else
                                <td>Inactive</td>
                            @endif
                            <td>{{ $data->created_at }}</td>
                            <td><a href="#">{{ translate('Delete') }}</a> / <a href="#">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $unit->links() }}
    </div>
@endsection
