@extends('layouts.admin')
@section('title')
    <title>Home</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Member','key' => 'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('members.update', ['id' => $member->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" name="name" value="{{$member->name}}" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$member->phone}}" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$member->email}}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="email">Sex</label>
                                <div class="input-group-text">
                                    <input type="radio" value="1"  name="sex" {{ ($member->sex=="1")? "checked" : "" }} name="status">&nbsp;Male</label>
                                    &nbsp;
                                    <input type="radio" value="0"  name="sex" {{ ($member->sex=="0")? "checked" : "" }} name="status">&nbsp;Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" name="birthday" value="{{$member->birthday}}" placeholder="Birthday">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" placeholder="Address">{{$member->address}}</textarea>
                            </div>
                            <div class="form-group d-none">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description">{{$member->description}}</textarea>
                            </div>
                            <div class="form-group d-none">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Content">{{$member->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
