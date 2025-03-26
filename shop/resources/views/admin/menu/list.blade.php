@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Update</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!!\App\Http\Helper\Helper::menu($menus)!!}
        </tbody>
    </table>
@endsection
