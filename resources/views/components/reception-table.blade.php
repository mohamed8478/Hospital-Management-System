<tr class="bg-white border-b border-gray-200">
    @isset($noResults)
    <td colspan="7" class="text-center py-4 text-gray-500">
        {{$noResults}}
    </td>
    @endisset
    @isset($patient)
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
    {{ $patient->id}}
    </th>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        {{ $patient->name}}
    </th>
    <td class="px-6 py-4 text-center ">{{ $patient->gender}}</td>
    <td class="px-6 py-4 text-center">20</td>
    <td class="px-6 py-4 text-center">{{ $patient->phone_num}}</td>
    <td class="px-6 py-4 text-center">22 / 02 / 25 </td>
    <td class="px-6 py-4 text-center">
        <a href="/reception/{{ $patient->id }}/update" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
    </td>
    @endisset
</tr>


