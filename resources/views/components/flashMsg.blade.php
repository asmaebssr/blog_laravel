@props(['msg', 'bg'])

<div class="px-4 py-2 text-white rounded-lg shadow-lg w-full max-w-md mx-auto transition-all duration-300 ease-in-out {{ $bg }}">
    <p>{{ $msg }}</p>
</div>