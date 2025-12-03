<x-guest-layout>

    <div class="p-2 m-2">
        @php
            $total = 0;
            $total_royalty = 0;
        @endphp
        @foreach ($sales as $sale)
            <div class="p-2 m-2 border-2 rounded bg-indigo-50">
                <table class="w-full table-fixed">
                    @php
                        $total += $sale->qty;
                        $total_royalty += $sale->royalty;
                    @endphp
                    <tr class="border-b-2">
                        <td>{{ $sale->book->title }}</td>
                        <td class="pl-4">{{ $sale->order_date }}</td>
                        <td>{{ $sale->qty }}</td>
                        <td>{{ $sale->royalty }}</td>
                    </tr>

                </table>
            </div>
        @endforeach
        <table class="w-full table-fixed">
            <tr class="font-bold border-t-2">
                <td>Total:</td>
                <td>{{ $total }}</td>
                <td>{{ $total_royalty }}</td>
            </tr>
        </table>
    </div>

    <div class="flex">
        <div class="p-2 m-3 bg-white border-2">
            <h2 class="text-lg font-bold">Load</h2>
            <form action="{{ route('loadBooks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button type="submit"
                    class="px-3 py-2 ml-8 leading-5 text-white bg-indigo-700 rounded-md hover:bg-indigo-600">Upload</button>
            </form>
        </div>
    </div>
</x-guest-layout>
