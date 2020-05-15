<div id="kModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="POST" action="{{route('create_kraken')}}" enctype="multipart/form-data" id="kForm">
    {{ csrf_field() }}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('texts.create_kraken')}}</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control text-input" placeholder="{{__('texts.name')}}" name="name" autofocus>
            </div>
            <div class="form-group">
              <input type="text" class="form-control text-input" placeholder="{{__('texts.age')}}" name="age">
            </div>
            <div class="form-group">
              <input type="text" class="form-control text-input" placeholder="{{__('texts.taille')}}" name="size">
            </div>
            <div class="form-group">
              <input type="text" class="form-control text-input" placeholder="{{__('texts.poids')}}" name="weight">
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