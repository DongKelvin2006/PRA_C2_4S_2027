<x-layouts.app>
    <div class="container">

        @if ($manuals->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Manual:</th>
                        <th>Action:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manuals as $manual)
                    <tr>
                        <td>{{ $manual->name }} </td>
                        <td>
                            <form action="{{ route('page.destroy', $manual->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No manuals available.</p>
        @endif
    </div>
</x-layouts.app>
