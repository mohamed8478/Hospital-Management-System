<tr>
    @isset($noResults)
    <td colspan="7" class="text-center py-4 text-gray-500">
        {{$noResults}}
    </td>
    @endisset
    @isset($medicament)
    <td class="px-6 py-4 ">
        <div class="text-sm font-semibold text-gray-900"> {{ $medicament->id}}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm font-semibold text-gray-900"> {{ $medicament->name}} </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{ $medicament->quantity}}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{ $medicament->expiry_data}}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($medicament->quantity < 1)
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white">
        Expired
    </span>
        @elseif ($medicament->quantity <= 10)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-500 text-white">
        Low Stock
            </span>
        @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
        In Stock
            </span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <a href="#" class="text-indigo-600 hover:underline hover:text-indigo-900">Edit</a>
    </td>
    @endisset
</tr>
