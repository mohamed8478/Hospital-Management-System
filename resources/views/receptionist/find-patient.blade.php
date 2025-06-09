<x-app-layout>
    <div class="w-[80%] flex-1 min-h-screen  bg-[#F2F2F3] px-7 py-6">
    <h3 class="text-xl font-semibold pl-2">Find Patient</h3>
    <h2 class="text-4xl font-[roboto] font-light mt-12 text-center">chercher un patient</h3>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
        <div class="relative mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-9 top-1/2 transform -translate-y-1/2 text-gray-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            <input type="text" id="search-input" class="search-input search-patient w-[98%] h-12 pl-5 rounded-xl my-3 ml-5 border border-gray-400 bg-white mx-auto"
            placeholder="Find patient"
            name="medication">
        </div>
        <!-- User Table -->
        <div class="pl-5 mt-9 hidden" id="table-header">
            <table class="w-full shadow-xl text-sm text-left rtl:text-right text-gray-500 rounded-lg overflow-hidden">
                <thead class="rounded-t-lg text-sm text-gray-700 uppercase bg-gray-300">
                    <tr class="border-b border-gray-300 ">
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Gender</th>
                        <th scope="col" class="px-6 py-3 text-center">Age</th>
                        <th scope="col" class="px-6 py-3 text-center">Phone number</th>
                        <th scope="col" class="px-6 py-3 text-center">Last Visite </th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-lg" id="patient">

                </tbody>
            </table>
        </div>
    </div>



</x-app-layout>
