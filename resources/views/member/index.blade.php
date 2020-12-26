@extends('layouts.admin')
@section('title')
    <title>Home</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Home','key' => 'Starter Page'])
    <!-- Main content -->
        <div class="content">


            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <a href="{{route('members.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <th scope="row">{{$member->id}}</th>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->sex == '1' ? 'Male' : 'Female'}}</td>
                                    <td>{{date('d/m/Y', strtotime($member->birthday))}}</td>
                                    <td>
                                        <a href="{{route('members.edit', ['id' => $member->id])}}"
                                           class="btn btn-primary">Edit</a>

                                        <form action="{{ route('members.delete',['id' => $member->id]) }}" method="post"
                                              class="d-inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$members->links()}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
