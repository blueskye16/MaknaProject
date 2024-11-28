<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bahan Makanan
        </h2>

        <div class="relative max-w-sm mt-4">
            <!-- Date Input -->
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <div class="flex">
                <!-- Date Input Outside Form -->
                <input id="tanggal" type="text" datepicker datepicker-buttons datepicker-autoselect-today
                    class="max-w-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
                <!-- Submit Button -->
                <button type="button" id="submit-button"
                    class="block ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Submit
                </button>
            </div>
        </div>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md px-12 py-6 sm:rounded-lg">
        <form action="/dashboard/food" method="POST" id="food-form">
            @csrf
            <!-- Hidden Input to Store Date -->
            <input type="hidden" name="tanggal" id="hidden-tanggal">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Produk</th>
                        <th scope="col" class="px-6 py-3 text-center">Stok Awal</th>
                        <th scope="col" class="px-6 py-3 text-center">Masuk</th>
                        <th scope="col" class="px-6 py-3 text-center">Keluar</th>
                        <th scope="col" class="px-6 py-3 text-center">Stok Akhir</th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingridients as $ingridient)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <input type="hidden" name="data[{{ $loop->index }}][nama_produk]"
                                    value="{{ $ingridient->nama_produk }}">
                                {{ $ingridient->nama_produk }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center h-full">
                                    <input type="text" name='data[{{ $loop->index }}][stok_awal]'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center h-full">
                                    <input type="text" name="data[{{ $loop->index }}][masuk]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center h-full">
                                    <input type="text" name="data[{{ $loop->index }}][keluar]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center h-full">
                                    <input type="text" name="data[{{ $loop->index }}][stok_akhir]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    <script>
        document.getElementById('submit-button').addEventListener('click', function () {
            // Copy the date input value to the hidden field
            const tanggalInput = document.getElementById('tanggal');
            const hiddenTanggal = document.getElementById('hidden-tanggal');
            hiddenTanggal.value = tanggalInput.value;

            // Submit the form
            document.getElementById('food-form').submit();
        });
    </script>
</x-app-layout>
