<div id="TModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="POST" id="tForm" action="{{route('add_tentacle')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('texts.create_kraken')}}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <input type="hidden" name="kraken_id" class="kraken_id" @if($currentKraken) value="{{$currentKraken->getId()}}" @endif>
              <input type="text" class="form-control text-input" placeholder="{{__('texts.name')}}" name="name" autofocus>
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