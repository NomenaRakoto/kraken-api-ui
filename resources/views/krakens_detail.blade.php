@foreach($krakens as $key => $kraken)
<div class="k-detail">
	<input k-index="{{$key}}" k-id="{{$kraken->getId()}}" type="radio" @if($kraken->getId() == $currentKraken->getId()) checked="" @endif class="kSelect" name="kraken">
	<h3 class="center">
	{{$kraken->get('name')}}</h3>
	<label class="klabel">
	{{__('texts.age')}} : {{$kraken->get('age')}}
	</label>
	<label class="klabel">
	{{__('texts.taille')}} : {{$kraken->get('size')}}
	</label>
	<label class="klabel">
	{{__('texts.poids')}} : {{$kraken->get('weight')}}
	</label>
	<label class="klabel">{{__('texts.tentacles')}} : </label>
			<div class="tentacles">
			@foreach($kraken->get("tentacles") as $key2 => $tentacle)
		<div class="t-detail t-{{$tentacle->id}}">
			<input t-id={{$tentacle->id}} type="radio" class="tSelect" name="tentacle">
			<h4 class="center">{{$tentacle->name}}</h4>
			<label>{{__('texts.pv')}}({{$tentacle->point_de_vie}})</label>
			<label>{{__('texts.force')}}({{$tentacle->strength}})</label>
			<label>{{__('texts.dex')}}({{$tentacle->dexterity}})</label>
			<label>{{__('texts.con')}}({{$tentacle->stamina}})</label>
		</div>
			@endforeach
			</div>
	<label class="klabel">{{__('texts.powers')}} : </label>
	<div class="tentacles">
	@foreach($kraken->get("powers") as $key => $power)
		<div class="p-detail">
			<h4 class="center">{{$power->name}}</h4>
			<label>{{__('texts.max_usage')}}({{$power->max_usage}})</label>
		</div>
			@endforeach()
			</div>
</div>
@endforeach