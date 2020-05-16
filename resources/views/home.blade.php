@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="assets/css/design.css">
@endpush
@push('scripts')
<script src="assets/js/script.js"></script>
@endpush
@section('content')
<section class="main-container">
	<div class="container-fluid container-div">
	  	<div class="row full-row">
	  		<div class="col-md-12">
	  			<div class="main-div">
	  				<div class="kraken-container">
		  				<h1 class="center h1">
		  				{{__('texts.app_name')}}
		  				</h1>
	                </div>
	                <div class="row full-row">
	                	<div class="col-md-6 full-col">
	                		<div class="btn-container">
	                			@if ($message = Session::get('error'))
						        <div class="alert alert-danger alert-dismissable center">
						            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						            {{ $message }}
						        </div>
						        @endif
						        @if ($message = Session::get('success'))
						        <div class="alert alert-success alert-dismissable center">
						            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						            {{ $message }}
						        </div>
						        @endif
	                			<button id="addKraken" type="button" class="custom-button btn btn-primary">{{__('texts.create_kraken')}}</button>
	                			@if(count($krakens) > 0)
								<button @if(!$currentKraken->isAllowedToAddTentacle()) disabled="" @endif id="addTentacle" type="button" class="custom-button btn btn-primary">
								{{__('texts.add_tentacle')}}</button>
								<button id="t-delete-btn" delete-url="{{url('/remove_tentacule')}}" type="button" class="custom-button btn btn-danger">{{__('texts.remove_tentacle')}}</button>
								<button id="addPower" type="button" class="custom-button btn btn-primary" @if(!$currentKraken->isAllowedToAddPower()) disabled="" @endif>{{__('texts.add_power')}}</button>
								@endif
	                		</div>
	                		
	                	</div>
	                	<div class="col-md-6 full-col col-B">
	                		<div class="kraken-info">
	                			@if(count($krakens) > 0)
	                			@include("krakens_detail")
	                			@endif
	                		</div>
	                	</div>
	                </div>
	  			</div>
	  		</div>
	  	</div>
	</div>
</section>
@include("modals.kraken_ad_modal");
@include("modals.tentacle_ad_modal");
@include("modals.power_ad_modal");
<script type="text/javascript">
	$(document).ready(function(){
		jQuery.extend(jQuery.validator.messages, {
		    required: "{{__('texts.required_field')}}",
		    number: "{{__('texts.required_number_field')}}"
		 });
	});
</script>
@endsection