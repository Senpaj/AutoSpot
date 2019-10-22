@extends('layouts.app')
@section('content')
<div class="container">
	@include('nav.navbar')
</div>
<div class="container">
	<div class="title-container">
		{{$order->model->make->Name}} {{$order->model->Name}} 
		{{$order->fueltype->name}} {{$order->manufactorYear}} m. 
		{{$order->mototype->name}}
	</div>
	<div class="content">
		<div class="content-left">
            <div class="param">
				<div class="param-left">
                    <strong>Kaina</strong><br>
                    <label style="font-size: 2em; color: #0066ff;">{{$order->Price}} &euro;</label>
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Marke
				</div>
				<div class="param-right">
					{{$order->model->make->Name}}
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Modelis
				</div>
				<div class="param-right">
					{{$order->model->Name}}
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Metai
				</div>
				<div class="param-right">
					{{$order->manufactorYear}}
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Variklis
				</div>
				<div class="param-right">
					{{$order->engineCapacity}} l, {{$order->enginePower}} kW
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Kuro tipas
				</div>
				<div class="param-right">
					{{$order->fueltype->Name}}
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Kebulo tipas
				</div>
				<div class="param-right">
					{{$order->mototype->Name}}
				</div>
			</div>
			<div class="param">
				<div class="param-left">
					Spalva
				</div>
				<div class="param-right">
					{{$order->color->Name}}
				</div>
			</div>
		</div>
		<div class="content-right">
		<a href="{{ route('showphotos', ['id' => $order->id_MotoOrder]) }}">
				<div class="right-media">
					@if(count($order->files) > 0)
						<img src="{{asset('images/' . $order->files[0]['path'])}}" style="width: 500px; height: 375px;" alt="Image"/>
						@foreach (array_slice($order->files->toArray(),1, 5) as $file)
							<img src="{{asset('images/' . $file['path'])}}" style="width: 100px; height: 70px; margin-top: 1%;" alt="Image"/>
						@endforeach
					@else
						<img src="{{asset('images/1.jpg')}}" style="width: 500px; height: 375px;" alt="Image"/>
					@endif
				</div>
			</a>
		</div>
    </div>
	<div class="title-container">
		Ypatumai
	</div>
	<ul>
	<div class="row">
	@for($i = 0; $i < sizeof($order->features); $i++)
		@if($i % 4 == 0 && $i != 0)
			</div>
			<div class="row">
			<div class="col-md-3 mt-4"><li>{{$order->features[$i]["Name"]}}</li></div>
		@else
  			<div class="col-md-3 mt-4"><li>{{$order->features[$i]["Name"]}}</li></div>
		@endif
	@endfor
	</div>
	</ul>
    <div class="title-container">
        Komentarai
    </div>
    <div class="content mt-3">
        {{$order->Description}}
	</div>
	<div class="title-container">
			Kontaktai
		</div>
		<div class="content mt-3">
			<h5>
				@if($order->contactinfo != null)
					{{$order->contactinfo->Name}},
					{{$order->contactinfo->phoneNum}},
					@foreach ($towns as $town)
						@if($town->id_Towns == $order->contactinfo->fk_Townsid_Towns)
							{{$town->Name}}
							@break
						@endif
					@endforeach
				@else
					Kontaktai nenurodyti
				@endif
			</h5>
		</div>
</div>
@endsection