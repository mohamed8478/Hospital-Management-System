<x-app-layout>
<div class="w-[80%] flex-1 min-h-screen  bg-[#F2F2F3] px-7 py-6">
    <h3 class="text-xl font-semibold pl-2">Medicament</h3>

    <div class="relative mt-5">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6 absolute left-[560px] top-1/2 transform -translate-y-1/2 text-gray-500"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
        </svg>
        <input type="text" id="medication-list" class=" search-input w-1/2 h-12 pl-5 rounded-xl my-3  border border-gray-400 bg-white mx-auto"
            placeholder="Find Medicament" name="medication" autofocus>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg" id="table-header">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50" >
                <tr>
                    <th scope="col"
                        class="px-6 w-28 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Stock
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Expiration Date
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody id="medication" class="bg-white divide-y divide-gray-200">
                {{-- <tr>
                    <td class="px-6 py-4 ">
                        <div class="text-sm font-semibold text-gray-900">86396</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-sm font-semibold text-gray-900">Amoxicilline </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">200</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 / 03 / 2028</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-500 text-white">Low
                            Stock</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-indigo-600 hover:underline hover:text-indigo-900">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 ">
                        <div class="text-sm font-semibold text-gray-900">86396</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-sm font-semibold text-gray-900">Paracétamol </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">200</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 / 03 / 2028</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">In
                            Stock</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-indigo-600 hover:underline hover:text-indigo-900">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 ">
                        <div class="text-sm font-semibold text-gray-900">86396</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-sm font-semibold text-gray-900">Ibuprofène</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">200</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 / 03 / 2028</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white">Expired</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-indigo-600 hover:underline hover:text-indigo-900">Edit</button>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
