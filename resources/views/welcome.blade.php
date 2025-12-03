<x-guest-layout>

    <div class="p-2 m-2">
        @php
            $grand_total = 0;
            $total_books_sold = 0;
        @endphp
        @foreach ($books as $book)
            <div class="p-2 m-2 border-2 rounded bg-indigo-50">
                <h2 class="mt-2 text-xl font-bold">{{ $book->title }}</h2>
                <table class="w-full table-fixed">
                    @php
                        $total = 0;
                        $total_royalty = 0;
                    @endphp

                    @foreach ($book->sales as $sale)
                        @php
                            $total += $sale->qty;
                            $total_royalty += $sale->royalty;
                            $grand_total += $sale->royalty;
                            $total_books_sold += $sale->qty;
                        @endphp
                        <tr class="border-b-2">
                            <td class="pl-4">{{ $sale->order_date }}</td>
                            <td>{{ $sale->qty }}</td>
                            <td>{{ $sale->royalty }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Total:</td>
                        <td>{{ $total }}</td>
                        <td>{{ $total_royalty }}</td>
                    </tr>
                </table>
            </div>
        @endforeach
        <table class="w-full table-fixed">
            <tr class="font-bold border-t-2">
                <td>Grand Total</td>
                <td>{{ $total_books_sold }}</td>
                <td>{{ $grand_total }}</td>
            </tr>
        </table>
    </div>

    <div class="flex">
        <div class="p-2 m-3 bg-white border-2">
            <h2 class="text-lg font-bold">Load</h2>
            <p class="mb-2 text-sm italic text-indigo-900">Export the Paperback Royalty tab as CSV before importing.
                <br>Save in MyDocuments/KDP Reports</p>

            <form action="{{ route('loadBooks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <x-primary-button>Upload</x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
