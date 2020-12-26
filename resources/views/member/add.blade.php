@extends('layouts.admin')
@section('title')
    <title>Home</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Member','key' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('members.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" name="name" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="email">Sex</label>
                                <div class="input-group-text">
                                <input type="radio" value="1"  name="sex" name="status">&nbsp;Male</label>
                                    &nbsp;
                                <input type="radio" value="0"  name="sex" name="status">&nbsp;Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" name="birthday" placeholder="Birthday">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group d-none">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Description"></textarea>
                            </div>
                            <div class="form-group d-none">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Content"></textarea>
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
