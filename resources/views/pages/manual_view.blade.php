<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li>
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                {{ $brand->name }}
            </a>
        </li>
        <li>
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                {{ $manual->name }}
            </a>
        </li>
        <li>
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                View
            </a>
        </li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $manual->name }}</h1>

    @if ($manual->locally_available)
        <iframe src="{{ $manual->url }}" width="780" height="600" frameborder="0" marginheight="0" marginwidth="0">
            Iframes are not supported<br />
            <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
        </iframe>
    @else
        <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
    @endif

    <section style="margin-top: 20px;">
        <h2>Korte link</h2>

        @if (empty($manual->short_link_code))
            <p>Maak een korte link aan om deze handleiding eenvoudig te delen.</p>

            <form action="{{ route('manual.shortLink.create', ['manual_id' => $manual->id]) }}" method="POST">
                @csrf
                <button class="btn btn-secondary" type="submit">Korte link aanmaken</button>
            </form>
        @else
            <button
                class="btn btn-secondary"
                id="copy-short-link"
                data-short-link="{{ route('manual.shortLink', ['code' => $manual->short_link_code]) }}"
                type="button"
            >
                Kopieer
            </button>

            <script>
                var copyButton = document.getElementById('copy-short-link');
                var shortLink = copyButton.dataset.shortLink;

                copyButton.addEventListener('click', function () {
                    function copyWithFallback() {
                        var temporaryInput = document.createElement('textarea');
                        temporaryInput.value = shortLink;
                        temporaryInput.style.position = 'fixed';
                        temporaryInput.style.opacity = '0';
                        document.body.appendChild(temporaryInput);
                        temporaryInput.select();

                        var copied = document.execCommand('copy');
                        temporaryInput.remove();
                        return copied;
                    }

                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(shortLink)
                            .then(function () {
                                copyButton.textContent = 'Gekopieerd!';
                            })
                            .catch(function () {
                                if (copyWithFallback()) {
                                    copyButton.textContent = 'Gekopieerd!';
                                }
                            });
                    } else if (copyWithFallback()) {
                        copyButton.textContent = 'Gekopieerd!';
                    }
                });
            </script>
        @endif
    </section>

</x-layouts.app>
