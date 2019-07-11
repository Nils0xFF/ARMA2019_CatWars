<div class="card w-100 h-100">
<div class="card-header">
    {{$cat->breed->name}}
  </div>
  <img src="{{url($cat->breed->imagePath())}}" class="card-img-top" alt="" style="height:200px; width:100%; object-fit:cover;">
  <div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="progress">
                <div class="progress-bar w-{{($cat->current_hp * 100/ $cat->breed->max_hp)}} bg-danger" role="progressbar" aria-valuenow="{{$cat->current_hp}}" aria-valuemin="0" aria-valuemax="{{$cat->breed->max_hp}}">{{$cat->current_hp}} / {{ $cat->breed->max_hp }}</div>
            </div>
        </li>
        <li class="list-group-item">Cuteness: <span class="float-right">{{$cat->breed->cuteness}}</span></li>
        <li class="list-group-item">Fur Thickness: <span class="float-right">{{$cat->breed->fur_thickness}}</span></li>
        <li class="list-group-item">Claw Sharpness: <span class="float-right">{{$cat->breed->claw_sharpness}}</span></li>
        <li class="list-group-item">Rarity: <span class="float-right">{{$cat->breed->rarity->name}}</span></li>
    </ul>
  </div>
</div>