@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="container">
        <h2>Admin - Users</h2>
        <p>List of registered users.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
