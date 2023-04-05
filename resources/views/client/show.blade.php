@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $item->title }}</div>

                    <div class="card-body">
                        <p>{{ $item->description }}</p>
                        <p>Price: {{ $item->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
