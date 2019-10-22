@extends('layouts.app')

@section('content')
<div class="container">
    @include('nav.navbar')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('postorder') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
    <div class="title-container">
            Pagrindiniai duomenys
    </div>
    </br>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Naujas/naudotas</label>
            <select class="form-control">
                <option selected>----</option>
                <option>Naujas</option>
                <option>Naudotas</option>
            </select>
        </div>
        <div class="form-group col-md-3">
				Marke <label style="color: red;">*</label>
				<select class="form-control" name="makeID">
				<option value="" selected>----</option>
					@foreach($makes as $make)
						<option value="{{$make->id_Make}}" {{(collect($makeId)->contains($make->id_Make)) ? 'selected':''}}>{{$make->Name}}</option>
					@endforeach
				</select>
		</div>
        <div class="form-group col-md-3">
				Modelis <label style="color: red;">*</label>
				<select class="form-control" id="modelID" name="modelID">
				<option value="" selected>----</option>
				@foreach($models as $model)
					<option value="{{$model->id_Model}}" {{(collect($order->fk_Modelid_Model)->contains($model->id_Model)) ? 'selected':''}}>{{$model->Name}}</option>
				@endforeach
				</select>
		</div>
        <div class="form-group col-md-3">
                Motociklo tipas <label style="color: red;">*</label>
                <select class="form-control" id="motoTypeId" name="motoTypeId">
				<option value="" selected>----</option>
				@foreach($motoTypes as $mototype)
					<option value="{{$mototype->id_MotoType}}" {{(collect($order->fk_MotoTypeid_MotoType)->contains($mototype->id_MotoType)) ? 'selected':''}}>{{$mototype->Name}}</option>
				@endforeach
				</select>
		</div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            Metai <label style="color: red;">*</label>
            <select class="form-control" id="yearForNewOrder" name="yearForNewOrder">
            </select>
        </div>
        <div class="form-group col-md-1">
				<label>Mėnuo</label>
				<select class="form-control" id="monthForNewOrder" name="monthForNewOrder">
				</select>
		</div>
        <div class="form-group col-md-3">
				Variklio tūris, cm<sup>3 </sup><label style="color: red;"> *</label>
                <input type="text" class="form-control" id="engineCapacity" name="engineCapacity" value="{{$order->engineCapacity}}">
		</div>
        <div class="form-group col-md-3">
            Defektai <label style="color: red;">*</label>
            <select class="form-control" id="defect" name="defect">
				<option value="" selected>----</option>
				@foreach($defects as $defect)
					<option value="{{$defect->id_Defect}}" {{(collect($order->fk_Defectid_Defect)->contains($defect->id_Defect)) ? 'selected':''}}>{{$defect->Name}}</option>
				@endforeach
				</select>
		</div>
        <div class="form-group col-md-3">
            Kaina, EUR <label style="color: red;">*</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$order->Price}}">
		</div>
    </div>
    <div class="title-container">
            Papildomi duomenys
    </div>
    </br>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label style="display: block;">TA iki:</label>
            <select class="form-control" style="width: 70%; display: inline;" id="yearForTA" name="yearFoyearForTArNewOrder">
            </select>
            <select class="form-control" style="width: 25%; display: inline;" id="monthForTA" name="monthForTA">
				</select>
        </div>
        <div class="form-group col-md-3">
				<label>Rida, km</label>
        <input type="text" class="form-control" id="distanceTraveled" name="distanceTraveled" value="{{$order->distanceTraveled}}">
		</div>
        <div class="form-group col-md-3">
				<label>Spalva</label>
				<select class="form-control" id="color" name="color">
				<option value="0" selected>----</option>
				@foreach($colors as $color)
					<option value="{{$color->id_Color}}" {{(collect($order->fk_Colorid_Color)->contains($color->id_Color)) ? 'selected':''}}>{{$color->Name}}</option>
				@endforeach
				</select>
		</div>
        <div class="form-group col-md-3">
				<label>Padangų likutis, %</label>
        <input type="text" class="form-control" id="tyreLeft" name="tyreLeft" value="{{$order->tyreLeft}}">
		</div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Variklio galia, kW</label>
        <input type="text" class="form-control" id="enginePower" name="enginePower" value="{{$order->enginePower}}">
        </div>
        <div class="form-group col-md-3">
			<label>Aušinimo tipas</label>
			<select class="form-control" id="coolingType" name="coolingType">
                <option value="" selected>----</option>
                @foreach($coolingTypes as $coolingType)
                    <option value="{{$coolingType->id_CoolingTypes}}" {{(collect($order->coolingType)->contains($coolingType->id_CoolingTypes)) ? 'selected':''}}>{{$coolingType->Name}}</option>
                @endforeach
			</select>
		</div>
        <div class="form-group col-md-3">
			<label>Kuro tipas</label>
			<select class="form-control" id="fuelType" name="fuelType">
                <option value="" selected>----</option>
                @foreach($fuelTypes as $fuelType)
                    <option value="{{$fuelType->id_FuelTypes}}" {{(collect($order->fuelType)->contains($fuelType->id_FuelTypes)) ? 'selected':''}}>{{$fuelType->Name}}</option>
                @endforeach
			</select>
		</div>
        <div class="form-group col-md-3">
			<label>Variklio tipas</label>
			<select class="form-control" id="engineType" name="engineType">
                <option value="" selected>----</option>
                @foreach($engineTypes as $engineType)
                    <option value="{{$engineType->id_EngineTypes}}" {{(collect($order->engineType)->contains($engineType->id_EngineTypes)) ? 'selected':''}}>{{$engineType->Name}}</option>
                @endforeach
			</select>
		</div>
    </div>
    <div class="title-container">
            Ypatumai
    </div>
    </br>
	<div class="row">
	@for($i = 0; $i < sizeof($features); $i++)
		@if($i % 4 == 0 && $i != 0)
			</div>
			<div class="row">
		@endif 
  			<div class="col-md-3 mt-4">
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="additions[]" value="{{$features[$i]["id_Feature"]}}" {{collect($addition)->contains($features[$i]["id_Feature"]) ? 'checked':''}}>
                 <label class="form-check-label" for="exampleCheck1">{{$features[$i]["Name"]}}</label>
               </div> 
            </div>
	@endfor
	</div>
    <div class="title-container">
            Komentarai
    </div>
    </br>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Norint labiau sudominti pirkėją, užpildykite komentarus apie prekę kuo plačiau</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3">{{$order->Description}}</textarea>
    </div>
    <div class="title-container">
        Failų įkėlimas
    </div>
    </br>
    <div class="form-group">
        <input type="file" name="files[]" id="file1" multiple>
    </div>
    <div class="title-container">
            Kontaktinė informacija
    </div>
    </br>
    <div class="form-row">
        <div class="form-group col-md-3">
                Vardas
                <input type="text" class="form-control" name="contactname" value="{{$contact->Name}}">
        </div>
        <div class="form-group col-md-3">
                Tel. Nr.
        <input type="text" class="form-control" name="contactphone" value="{{$contact->phoneNum}}">
        </div>
        <div class="form-group col-md-3">
				Miestas
				<select class="form-control" name="contacttown">
				<option value="" selected>----</option>
					@foreach($towns as $town)
						<option value="{{$town->id_Towns}}" {{(collect($contact->fk_Townsid_Towns)->contains($town->id_Towns)) ? 'selected':''}}>{{$town->Name}}</option>
					@endforeach
				</select>
		</div>
    </div>
    <button type="submit" class="btn btn-success mt-4">Pateikti</button>
</div></br>
@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Klaida!</strong> Įvyko klaida bandant pateikti užsakymą!<br><br>
  <ul>
    <li>Visi laukai turi būti užpildyti!</li>
    <li>Įkeliamų failų formatai privalo būti būti: jpeg, png, jpg, gif ar svg.</li>
  </ul>
</div>
@endif
</form>
@endsection