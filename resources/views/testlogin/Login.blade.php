@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Login</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('login.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('fail'))
        <div class="alert alert-fail">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="/login/verfity" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>account:</strong>
                    <input type="text" name="account" class="form-control" placeholder="account">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>password:</strong>
                    <input type="text" name="password" class="form-control" placeholder="password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          
        </div>

    </form>
    <form action="{{ route('login.create') }}"  >
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="signup" class="btn btn-primary">Signup</button>
            </div>
    </form>
@endsection
