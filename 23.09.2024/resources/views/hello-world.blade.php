@if($boll)
@foreach ($names as $name)
<ul>
    <li>{{$name}}</li>
</ul>
@endforeach
@else
<span>Siyahi tapilmadi</span>
@endif