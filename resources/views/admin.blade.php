@extends('layouts.app')

@section('content')
<div class="container pt-0 mt-0">
	@include('nav.navbar')
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administratoriaus veiksmai</div>
                    <div class="card-body">
                            <a href="{{route('admin.shownotapprovedorders')}}" class="btn btn-info mr-3" role="button">Patvirtinti skelbimus</a>
                            <a href="{{route('admin.addadmin')}}" class="btn btn-info mr-3" role="button">Pridėti admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
