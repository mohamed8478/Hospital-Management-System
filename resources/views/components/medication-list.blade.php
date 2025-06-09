
<tr class="bg-white border-b border-gray-200">
@isset($noResults)
    <td colspan="7" class="text-center py-4 text-gray-500">
        {{$noResults}}
    </td>
    @endisset
@isset($medication)
    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
        {{ $medication->name }}
    </th>
    <td class="px-6 py-4 text-center">{{ $medication->quantity }}</td>
    <td class="px-6 py-4 text-center">
        <button
            data-name="{{ $medication->name }}"
            data-qnt="{{ $medication->quantity }}"
            data-id="{{ $medication->id }}"
            class="add-btn bg-blue-800 cursor-pointer hover:bg-blue-700 px-4 py-1.5 rounded-lg text-white font-semibold">
            + Add
    </button>
    </td>
    @endisset
</tr>
