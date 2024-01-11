@php
$color = $color ?? '#9055FD';
@endphp
<span style="color:{{ $color }};">
  <img src="{{asset('assets/img/icons/brands/logo.jpg')}}" height="{{$height}}">
</span>
