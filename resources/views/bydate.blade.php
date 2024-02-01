<x-guest-layout>

    <div class="m-2 p-2">
        @php
            $total = 0;
            $total_royalty = 0;
        @endphp
        @foreach ($sales as $sale)
            <div class="border-2 rounded p-2 m-2  bg-indigo-50">
                <table class="table-fixed w-full">
                    @php
                        $total += $sale->qty;
                        $royalty = $sale->book->royalty * $sale->qty;
                        $total_royalty += $royalty;
                    @endphp
                    <tr class="border-b-2">
                        <td>{{$sale->book->title}}</td>
                        <td class="pl-4">{{$sale->order_date}}</td>
                        <td>{{$sale->qty}}</td>
                        <td>{{$royalty}}</td>
                    </tr>

                </table>
            </div>
        @endforeach
        <table class="table-fixed w-full">
            <tr class="font-bold border-t-2">
                <td>Total:</td>
                <td>{{$total}}</td>
                <td>{{$total_royalty}}</td>
            </tr>
        </table>
    </div>

    <div class="flex">
        <div class="border-2 bg-white m-3 p-2">
            <h2 class="text-lg font-bold">Load</h2>
            <form action="{{route('loadBooks')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button type="submit" class="ml-8 rounded-md bg-indigo-700 px-3 py-2 leading-5 text-white hover:bg-indigo-600">Upload</button>
            </form>
        </div>
    </div>
</x-guest-layout>