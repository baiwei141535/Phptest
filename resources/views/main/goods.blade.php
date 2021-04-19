@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>商品</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('main.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>price</th>
            <th>describe</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($goods as $good)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $good->name }}</td>
                <td>{{ $good->price }}</td>
                <td>{{ $good->describe }}</td>
                <td>{{ date_format($good->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('main.destroy', $good->id) }}" method="POST">

                        <a href="{{ route('main.show', $good->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('main.edit', $good->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $goods->links() !!}

@endsection