<x-layouts.app>
<style>
    .button-1, .button-2 {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 115px;
    background: #e9ecef;
    border-radius: 5px;
    color: blue;
    text-align: center;
}
</style>
    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


        @foreach ($manuals as $manual)

            @if ($manual->locally_available)
                <a class="button-1" href="{{ route('manual.detail', ['brand_id' => $brand->id, 'brand_slug' => $brand->getNameUrlEncodedAttribute(), 'manual_id' => $manual->id]) }}" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <a class="button-2" href="{{ route('manual.detail', ['brand_id' => $brand->id, 'brand_slug' => $brand->getNameUrlEncodedAttribute(), 'manual_id' => $manual->id]) }}" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            @endif

        @endforeach

</x-layouts.app>
