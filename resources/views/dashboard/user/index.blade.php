@extends('layouts.app')
@section('content')
    <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input class="btn" type="file" name="users" id="">
        <button class="btn btn-success" type="submit">Import</button>
    </form>

    <form class="w-100" action="{{ route('user.export') }}" method="post">
        @csrf
        @method('POST')

        <label>Name</label>
        <input type="checkbox" value="full_name" name="columns[]" id="">

        <label>Email</label>
        <input type="checkbox" value="email" name="columns[]" id="">


        <label>Phone Number</label>
        <input type="checkbox" value="phone_number" name="columns[]" id="">

        <button class="btn btn-success" type="submit">Export</button>
    </form>

    <table class="w-100 table">
        <thead>
            <tr>
                <th>name</th>
                <th>phone number</th>
                <th>email</th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
