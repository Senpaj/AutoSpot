@extends('layouts.app')
@section('content')
<div class="container">
	@include('nav.navbar')
</div>
<div class="container ">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				
			</div>
		</div>
	</div>
</div>
<div class="container my-container mt-3">
	<div class="container" style="width:55%;">
	<form method="get" action="{{ route('greitojipaieska') }}">
		<div class="row">
			<div class="col-md-6 mt-1">
				<!-- Greitoji paieska markes ir modeliai -->
				<label>Marke</label>
				<select class="form-control" name="makeID">
				<option value="0" selected>----</option>
					@foreach($makes as $make)
						<option value="{{$make->id_Make}}">{{$make->Name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-6 mt-1">
				<label>Modelis</label>
				<select class="form-control" id="modelID" name="modelID">
				<option value="0" selected>----</option>
				@foreach($models as $model)
					<option value="{{$model->id_Model}}">{{$model->Name}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<!-- Greitoji paieska metai nuo-iki -->
			<div class="col-md-3 mt-1">
				<label>Metai nuo</label>
				<select class="form-control" id="selectYearFrom" name="yf">
				</select>
			</div>
			<div class="col-md-3 mt-1">
				<label>Metai iki</label>
				<select class="form-control" id="selectYearTo" name="yt">
				</select>
			</div>
			<!-- Greitoji paieska kaina nuo-iki -->
			<div class="col-md-3 mt-1">
				<label>Kaina nuo</label>
				<select class="form-control" id="selectPriceFrom" name="pf">
				</select>
			</div>
			<div class="col-md-3 mt-1">
				<label>Kaina iki</label>
				<select class="form-control" id="selectPriceTo" name="pt">
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mt-1">
				<!-- Greitoji paieska kuro tipas -->
				<label>Kuro tipas</label>
				<select class="form-control" name="ftid">
					<option value="0" selected>----</option>
					@foreach($fuelTypes as $fuelType)
					<option value="{{$fuelType->id_FuelTypes}}">{{$fuelType->Name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-6 mt-1">
				<!-- Greitoji paieska kebulo tipas -->
				<label>Motociklo tipas</label>
				<select class="form-control" name="mtid">
					<option value="0" selected>----</option>
					@foreach($motoTypes as $motoType)
					<option value="{{$motoType->id_MotoType}}">{{$motoType->Name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 mt-1">
				<div class="form-check">
					<input type="checkbox" class="form-check-input big-checkbox" id="exampleCheck1">
					<label class="form-check-label ml-3 mt-2" for="exampleCheck1">Nauji</label>
				</div>
			</div>
			<div class="col-md-3 mt-1">
				<div class="form-check">
					<input type="checkbox" class="form-check-input big-checkbox" id="exampleCheck1">
					<label class="form-check-label ml-3 mt-2" for="exampleCheck1">Naudoti</label>
				</div>
			</div>
			<input type="hidden" name="save" value="true">
			<div class="col-md-6 mt-1">
				<button type="submit" class="btn btn-danger float-right">Ieskoti</button>
			</div>
		</div>
		</form>

	</div>

	<div class="container ml-0" style="width:30%;">
        <div class="list-group pt-1">
		<label style="color: black; font-size: 17px">Mano paieskos</label>
		@if($recentSearches != null)
			@foreach($recentSearches as $recentSearch)
				<form method="GET" name="fsearc" id="fsearc" action="{{ route('greitojipaieska') }}">
				<div class="container" style="border: solid lightgrey 1px; border-radius: 3px;" onclick='this.parentNode.submit(); return false;'>
					<strong style="color: black; font-size: 14px">
						@if($recentSearch->modelID != 0) 
							{{ App\bikeModel::where('id_Model', '=', $recentSearch->modelID)->first()->Name}}
							<input type="hidden" name="modelID" value="{{$recentSearch->modelID}}"/>
						@elseif($recentSearch->modelID == 0)
							<input type="hidden" name="modelID" value="0"/>
						@endif
						@if($recentSearch->makeID != 0) 
							{{ App\Make::where('id_Make', '=', $recentSearch->makeID)->first()->Name}}
							<input type="hidden" name="makeID" value="{{ $recentSearch->makeID }}"/>
						@else
							<input type="hidden" name="makeID" value="0"/>
						@endif
						@if($recentSearch->modelID != 0 || $recentSearch->makeID != 0)
							<br>
						@elseif($recentSearch->modelID == 0 && $recentSearch->makeID == 0)
							Motociklai
							<br>
						@endif
					</strong>
					<label style="color: grey; font-size: 12px;">
						@if($recentSearch->mtid != 0) 
							{{ App\MotoType::where('id_MotoType', '=', $recentSearch->mtid)->first()->Name}}
							<input type="hidden" name="mtid" value="{{ $recentSearch->mtid }}"/>
						@else
							<input type="hidden" name="mtid" value="0"/>
						@endif
						@if($recentSearch->ftid != 0) 
							{{ App\FuelTypes::where('id_FuelTypes', '=', $recentSearch->ftid)->first()->Name}}
							<input type="hidden" name="ftid" value="{{ $recentSearch->ftid }}"/>
						@else
							<input type="hidden" name="ftid" value="0"/>
						@endif
						@if($recentSearch->pf != 0 && $recentSearch->pt != 0)
							{{$recentSearch->pf}}-{{$recentSearch->pt}} &euro;<br>
							<input type="hidden" name="pf" value="{{ $recentSearch->pf }}"/>
							<input type="hidden" name="pt" value="{{ $recentSearch->pt }}"/>
						@else
							<input type="hidden" name="pf" value="0"/>
							<input type="hidden" name="pt" value="0"/>
						@endif
						@if($recentSearch->yf != 0 && $recentSearch->yt != 0)
							{{$recentSearch->yf}}-{{$recentSearch->yt}} m.
							<input type="hidden" name="yf" value="{{ $recentSearch->yf }}"/>
							<input type="hidden" name="yt" value="{{ $recentSearch->yt }}"/>
						@else
							<input type="hidden" name="yf" value="0"/>
							<input type="hidden" name="yt" value="0"/>
						@endif
					</label>
					<input type="hidden" name="save" value="!"/>
				</div>
				</form>
			@endforeach
		@endif
        </div>
	</div>
</div>

