<div {{$attributes->merge(['class' => "bg-$color-200 border-$color-600 text-$color-600 border-l-4 p-4"])}} role="alert">
{{-- class="bg-{{$color}}-200 border-{{$color}}-600 text-{{$color}}-600 border-l-4 p-4"     --}}
    <p class="font-bold">{{$title}}</p>
    <p>{{$slot}}</p>    
    {{$prueba()}}
</div>