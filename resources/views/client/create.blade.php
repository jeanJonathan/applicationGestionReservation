@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Item</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('items.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
