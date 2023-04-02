@props(['status'])
<label class="badge bg-{{ $status == 'PENDIENTE' ? 'red-600' : 'yellow-500' }}">{{ $status }}</label>