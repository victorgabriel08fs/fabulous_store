@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="gallery">
                            @foreach ($library_products as $library)
                                <div style="background: url({{ asset($library->product->image) }});"
                                    class=" mini-card">
                                    <figure>
                                        <div class="mini-card-body">
                                            <h4 class="mini-card-title">{{ $library->product->name }}</h4>
                                        </div>
                                    </figure>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
