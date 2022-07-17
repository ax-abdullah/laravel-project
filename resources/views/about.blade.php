<h1>About</h1>
{{-- @unless (empty($name))
    <h2>Name isn't empty: {{ $name }}</h2>
@endunless

@empty($name)
    <h2>Name isn't empty</h2>
@endempty

@isset($name)
    <h2>Name's been set</h2>
@endisset

@switch($name)
    @case('abdullah')
        <h2>name is {{ $name }}</h2>
        @break
    @case('ahmed')
        <h2>name is {{ $name }}</h2>
    @break

    @default
    <h2>name is {{ $name }}</h2>
@endswitch --}}
{{-- for loop
     foreach loop
     for else loop
     while loop --}}
    @foreach ($names as $name)
        <p>{{ $name }}</p>
    @endforeach

@forelse ($names as $name)
    <p>{{ $name }}</p>
@empty
    <p>there are no names</p>
@endforelse

{{ $i = 0 }}
@while ($i < 10)
    <p>{{ $i, $i++ }}</p>
    {{-- {{ $i++ }} --}}
@endwhile
