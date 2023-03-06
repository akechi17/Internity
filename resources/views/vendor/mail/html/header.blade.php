@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Internity')
<img src="{{ asset('img/logo-internity.png') }}" class="logo" alt="Internity Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
