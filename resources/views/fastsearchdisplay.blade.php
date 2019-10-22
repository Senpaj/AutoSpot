@extends('layouts.app')

@section('content')
<div class="container pt-0 mt-0">
	@include('nav.navbar')
</div>
<div class="container">
        @foreach($orders as $order)
        <form method="POST" action="{{ route('motofulldescription') }}">
        @csrf
                <a class="fast-content" href='#' onclick='this.parentNode.submit(); return false;'>
                    <div class="fast-media">
                        @if (count($order->files) > 0)
                            <img src="{{asset('images/' . $order->files[0]['path'])}}" style="width: 240px; height: 190px;" alt="Image"/>
                        @endif
                    </div>
                    <div class="fast-info">
                        <div class="fast-header">
                            {{$order->model->make->Name}} {{$order->model->Name}}<br>
                        </div>
                        <div class="fast-price">
                            {{$order->Price}} &euro;<br>
                        </div>
                        <div class="fast-details">
                            {{$order->engineCapacity}}, {{$order->fueltype->Name}}, {{$order->manufactorYear}} m.,
                            {{$order->gearbox->Name}}<br>
                            {{$order->mototype->Name}}<br>
                            {{$order->id_MotoOrder}}
                        </div>
                    </div>
                    <input name="idMotoOrder" type="hidden" value="{{$order->id_MotoOrder}}">
                </a>
        </form>
        @endforeach
        {{$orders->appends(request()->input())->links()}}

</div>
@endsection
