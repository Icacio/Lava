@props(['campo','type' => 'text'])

<label for={{ $campo }}>{{ $slot }}</label>
<br>
<input type={{$type}}
	name={{$campo}}
	id = {{$campo}}
	@if($type!='password')
		value="{{ old($campo) }}"
	@endif
	required>
	
@error($campo)
	<p class="text-red-500 text-xs mt-1"> {{$message}}</p>
@else
	<br>
	<br>
@enderror