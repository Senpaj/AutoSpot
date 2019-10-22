@extends('layouts.app')

@section('content')
<div class="container">
        @include('nav.navbar')
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group">
                @foreach ($order->files as $item)
                    <img src="{{asset('images/' . $item['path'])}}" style="width: 600px; height: 400px; margin-top:5%;" alt="Image"/>                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
