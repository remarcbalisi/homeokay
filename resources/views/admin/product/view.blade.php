@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$product->name}}
                    <br>
                    <small>{{$product->slug}}</small>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <strong>Description:</strong>
                    <p>
                        {{$product->description}}
                    </p>
                    Tags:
                    @foreach( json_decode($product->tags, true) as $tag )
                    <span class="badge badge-pill badge-info badge-shadow">{{$tag['value']}}</span>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
