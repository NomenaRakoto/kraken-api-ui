<div id="PModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="POST" action="{{route('add_power')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('texts.add_power')}}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <input type="hidden" name="kraken_id" class="kraken_id" @if($currentKraken) value="{{$currentKraken->getId()}}" @endif>
              <select class="custom-select mr-sm-2" name="name" id="id">
                </option>
                <option value="{{__('texts.plague')}}">
                  {{__('texts.plague')}}
                </option>
                <option value="{{__('texts.mind_control')}}">
                  {{__('texts.mind_control')}}
                </option>
                <option value="{{__('texts.ink_fog')}}">
                  {{__('texts.ink_fog')}}
                </option>
                <option value="force shield">
                  {{__('texts.force_shield')}}
                </option>
                <option value="{{__('texts.regeneration')}}">
                  {{__('texts.regeneration')}}
                </option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">{{__('texts.save')}}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('texts.close')}}</button>
        </div>
      </div>
    </form>

  </div>
</div>