<x-layouts.app>

<style>
    .brand-list {
        display: flex;
        flex-wrap: wrap;
        gap: 5px 25px;
        padding-left: 20px;
    }

    .brand-list li {
        width: 150px;
    }

    .brand-letter {
        margin-top: 25px;
        margin-bottom: 10px;
    }
    .container2{
        background: #e9ecef;
        padding: 10px;
    }
    .container2 a{
        color: black;
    }
</style>

<x-slot:introduction_text>
    <p>
        <img src="img/afbl_logo.png" align="right" width="100" height="100">
        {{ __('introduction_texts.homepage_line_1') }}
    </p>

    <p>{{ __('introduction_texts.homepage_line_2') }}</p>
    <p>{{ __('introduction_texts.homepage_line_3') }}</p>
</x-slot:introduction_text>

<h1>{{ $name }}</h1>

<x-slot:title>
    {{ __('misc.all_brands') }}
</x-slot:title>

<h1>Top 10 manuals</h1>

@foreach ($manuals as $manual)
    <div>
        {{ $manual->name }} - {{ $manual->visited }} visits
    </div>
@endforeach

<div class="container2">

    @php
        $currentLetter = null;
    @endphp

    @foreach ($brands as $brand)

        @php
            $letter = strtoupper(substr($brand->name, 0, 1));
        @endphp

        @if ($letter !== $currentLetter)

            @if ($currentLetter !== null)
                </ul>
            @endif

            <h2 class="brand-letter">{{ $letter }}</h2>

            <ul class="brand-list">

            @php
                $currentLetter = $letter;
            @endphp

        @endif

            <li>
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                    {{ $brand->name }}
                </a>
            </li>

    @endforeach

    @if ($currentLetter !== null)
        </ul>
    @endif

</div>

</x-layouts.app>
