<x-app-layout>
    <div class="w-[80%] flex-1 h-[100%] bg-[#F2F2F3] px-7 py-6">


    <h1 class="text-3xl font-extrabold font-[Roboto] mb-4">
        Prescription #023464
    </h1>
    <h3 class="text-xl font-semibold pl-2">Add Medication</h3>
    <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6 absolute right-9 top-1/2 transform -translate-y-1/2 text-gray-500"
            viewBox="0 0 512 512">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
        </svg>
        <input type="text"
            id="doctor_med_input"
            class=" w-[98%] search-input h-12 pl-5 rounded-xl mt-3 mb-2 ml-5 border border-gray-400 bg-white mx-auto"
            placeholder="Add Medication" name="medication" />
    </div>
    <!-- Medicament search -->
    <div class="pl-5 mb-7">
        <table
            class="w-full max-w-[calc(100%-40px)] ml-4 shadow-xl text-sm text-left rtl:text-right text-gray-500 rounded  overflow-hidden">
            <thead class="rounded-t-lg hidden text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border-b font-[roboto] border-gray-300">
                    <th scope="col" class="px-6 py-3">Nom medicament</th>
                    <th scope="col" class="px-6 py-3 text-center">Stock</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="medications" id="medication-list">
            </tbody>
        </table>
    </div>

    <h3 class="text-xl font-semibold pl-2 py-2">Medication List</h3>

    <!-- prescription medicament -->
    <form action="{{ route('doctor.add', request()->patient) }}" method="POST">
        @csrf
    <div class="pl-5">
        <table
            class="shadow-xl w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-300 rounded-lg overflow-hidden">
            <thead class="text-xs text-gray-700 font-[roboto] uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300">
                        Nom medicament
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300">
                        Frequence
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300">
                        Quantity
                    </th>
                </tr>
            </thead>
            <tbody id="selectedMedications">

            </tbody>
        </table>
    </div>

    <!-- Adding information -->
    <div class="bg-[#EDEDED] border border-gray-400 shadow-2xl rounded-2xl p-5 mt-7">
        <h3 class="text-xl font-semibold pb-7">
            Autres informations à ajouter
        </h3>
        <div class="font-semibold">
            <div class="flex mb-5">
                <div class="w-1/2 mr-20">
                    <!-- duree -->
                    <label for="duree" class="block mb-2   text-gray-900">Durée du traitement</label>
                    <input type="text" name="duree"
                        class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="15 jour"  />
                        <x-input-error :messages="$errors->get('duree')" class="mt-2" />
                </div>

                <div class="w-1/2">
                    <!-- date of next consultation -->
                    <label for="date" class="block mb-2   text-gray-900">
                        date consultations de suivi</label>

                        <div class="relative w-full">
                            <div class="relative ">
                                <input
                                    id="datepicker"
                                    type="text"
                                    name="date"
                                    placeholder="Select Date of suivi"
                                    readonly
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer"
                                >
                                <div
                                    id="toggleDatepicker"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>

                            <div
                                id="datepicker-container"
                                class="absolute z-10 w-full bg-white rounded-lg shadow-lg border border-gray-200 mt-2 hidden"
                            >
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <button
                                            id="prevMonth"
                                            class="p-2 hover:bg-gray-100 rounded-full transition"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div class="flex items-center space-x-2">
                                            <select
                                                id="monthSelect"
                                                class="px-6 py-1 border rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            ></select>

                                            <select
                                                id="yearSelect"
                                                class="pl-4 py-1 pr-8 border rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            ></select>
                                        </div>

                                        <button
                                            id="nextMonth"
                                            class="p-2 hover:bg-gray-100 rounded-full transition"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="grid grid-cols-7 text-center text-xs text-gray-500 mb-2">
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                        <div>Sun</div>
                                    </div>

                                    <div
                                        id="days-container"
                                        class="grid grid-cols-7 gap-1 text-center"
                                    ></div>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
            </div>
            <div class="mb-5">
                <label for="instruction" class="block mb-2  text-gray-900">
                    Instructions supplémentaires
                </label>
                <textarea id="instruction" rows="4" name="instruction"
                    class="block p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Écrivez vos pensées ici..."></textarea>
                    <x-input-error :messages="$errors->get('instruction ')" class="mt-2" />
            </div>
            <div class="mb-5">
                <label for="notes" class="block mb-2   text-gray-900">Remarques du
                    médecin</label>
                <textarea id="notes" rows="4"  name="doctor_notes"
                    class="block p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Écrivez vos pensées ici..."></textarea>
                    <x-input-error :messages="$errors->get('doctor_notes')" class="mt-2" />

            </div>
        </div>
    </div>

    <div class="w-[100%] mt-5 flex">
        <button type="submit"
            class="bg-blue-800 block ml-auto cursor-pointer hover:bg-blue-700 px-6 py-2.5 rounded-xl text-white font-semibold">
            Add Prescription
    </butt>
    </div>
    </form>
</div>

</x-app-layout>


<script>
$(document).ready(function () {
    let selectedMedications = []; // Store selected medications as an array

    // Handle Add Medication Click
    $(document).on("click", ".add-btn", function () {
        let medQnt = $(this).data("qnt");
        let medId = $(this).data("id");
        let medName = $(this).data("name");
        // Check if already added
        if (selectedMedications.some(med => med.id === medId)) {
            alert("Medication already added!");
            return;
        }

        // Add to state (array)
        selectedMedications.push({ id: medId, name: medName, quantity: 1, maxQuantity:medQnt ,frequence : '' });

        // Update UI
        renderSelectedMedications();
    });

    // Render Selected Medications in UI
    // function renderSelectedMedications() {
    //     $("#selectedMedications").html(selectedMedications.map((med, index) => `
    //         <div class="selected-med" data-id="${med.id}">
    //             <span>${med.name}</span>
    //             <input type="number" class="quantity" data-index="${index}" value="${med.quantity}" min="1">
    //             <input type="text" class="info" data-index="${index}" placeholder="Additional info">
    //             <button type="button" class="remove-btn" data-index="${index}">Remove</button>
    //         </div>
    //     `).join(''));
    // }
    function renderSelectedMedications() {
    $("#selectedMedications").html(selectedMedications.map((med, index) => `
    <tr class="selected-med bg-white border-b border-gray-200" data-id="${med.id}">
    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap border-b border-gray-300">
        ${med.name}
    </th>
    <input type="hidden" name="selectedMedications[${index}][name]" value="${med.name}" >
    <td class="px-6 py-4 border-b border-gray-300">
        <input type="text" data-index="${index}" name="selectedMedications[${index}][frequence]" value="${med.frequence}"
            class="frequence bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
            placeholder="1 fois par jour" required />
    </td>
    <td class="px-6 py-4 border-b border-gray-300">
        <div class="flex items-center">
            <button type="button" data-index="${index}"
                class="decrement-btn inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:ring-2 focus:ring-gray-700">
                <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M1 1h16" />
                </svg>
            </button>
            <input
                data-index="0"
                type="text" data-index="${index}" name="selectedMedications[${index}][quantity]"
                class="quantity w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900"
                placeholder="" value="${med.quantity}" min="1" max="${med.maxQuantity}"
                readonly />
            <button type="button"
                data-index="${index}"
                class="increment-btn inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-700">
                <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 1v16M1 9h16" />
                </svg>
            </button>
            <button type="button"
                data-index="${index}"
                class="ml-auto remove-btn mr-12  text-red-500 hover:text-red-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 font-bold" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
        </div>
    </td>
</tr>
    `).join(''));
}

// handle frequence change
        $(document).on("input", ".frequence", function () {
            let index = $(this).data("index");
            let value = $(this).val();
            console.log(value);
            selectedMedications[index].frequence = value ;
    });
// checking the quantity before adding
    $(document).on("click", ".increment-btn", function () {
        let index = $(this).data("index");
        if (selectedMedications[index].quantity < selectedMedications[index].maxQuantity) {
            selectedMedications[index].quantity++;
            renderSelectedMedications();
        } else {
            alert("Maximum quantity reached!");
        }
    });

    // Handle Decrement Quantity
    $(document).on("click", ".decrement-btn", function () {
        let index = $(this).data("index");
        if (selectedMedications[index].quantity > 1) {
            selectedMedications[index].quantity--;
            renderSelectedMedications();
        }
    });



    // Handle Remove Medication
    $(document).on("click", ".remove-btn", function () {
        let index = $(this).data("index");
        selectedMedications.splice(index, 1);
        renderSelectedMedications();
    });


});

// function checkInput(){
// const searchInput = document.querySelector('.search-input');
// const tableHeader = document.querySelector('.medications');

// // Show header when there is input, otherwise hide it
// if (searchInput.value.trim() !== '') {
//     tableHeader.classList.remove('hidden');
// } else {
//     tableHeader.classList.add('hidden');
// }
// }

// $('.search-input').on('input', function(){
//     checkInput();
//     });







// date Picker
const datepicker = document.getElementById('datepicker');
    const datepickerContainer = document.getElementById('datepicker-container');
    const daysContainer = document.getElementById('days-container');
    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const prevMonthButton = document.getElementById('prevMonth');
    const nextMonthButton = document.getElementById('nextMonth');
    const toggleDatepicker = document.getElementById('toggleDatepicker');

    const MONTHS = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    let currentDate = new Date();
    let selectedDate = null;

    // Populate month dropdown
    function populateMonthSelect() {
        monthSelect.innerHTML = '';
        MONTHS.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = month;
            monthSelect.appendChild(option);
        });
        monthSelect.value = currentDate.getMonth();
    }

    // Populate year dropdown
    function populateYearSelect() {
        yearSelect.innerHTML = '';
        const currentYear = new Date().getFullYear();
        const startYear = currentYear; // 100 years back
        const endYear = currentYear + 150; // 10 years forward

        for (let year = startYear; year <= endYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
        yearSelect.value = currentDate.getFullYear();
    }

    // Function to render the calendar
    function renderCalendar() {
        const year = parseInt(yearSelect.value);
        const month = parseInt(monthSelect.value);

        currentDate = new Date(year, month, 1);

        daysContainer.innerHTML = '';
        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Adjust to make Monday the first day of the week
        const adjustedFirstDay = firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1;

        for (let i = 0; i < adjustedFirstDay; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const day = new Date(year, month, i);
            const dayString = day.toLocaleDateString('en-US');

            let className = "p-2 rounded-full cursor-pointer hover:bg-blue-100 transition";

            // Highlight selected date
            if (selectedDate && dayString === selectedDate) {
                className += " bg-blue-500 text-white";
            }

            daysContainer.innerHTML += `<div class="${className}" data-date="${dayString}">${i}</div>`;
        }

        // Add click event listeners to days
        document.querySelectorAll('#days-container div[data-date]').forEach(day => {
            day.addEventListener('click', function() {
                selectedDate = this.dataset.date;
                updateInput();
                renderCalendar();
                datepickerContainer.classList.add('hidden');
            });
        });
    }

    // Function to update the datepicker input
    function updateInput() {
        if (selectedDate) {
            datepicker.value = selectedDate;
        } else {
            datepicker.value = '';
        }
    }

    // Toggle datepicker visibility
    function toggleDatepickerVisibility() {
        datepickerContainer.classList.toggle('hidden');
        renderCalendar();
    }

    // Event listeners for month and year selects
    monthSelect.addEventListener('change', renderCalendar);
    yearSelect.addEventListener('change', renderCalendar);

    // Navigate months
    prevMonthButton.addEventListener('click', function() {
        let month = parseInt(monthSelect.value);
        let year = parseInt(yearSelect.value);

        month--;
        if (month < 0) {
            month = 11;
            year--;
        }

        monthSelect.value = month;
        yearSelect.value = year;
        renderCalendar();
    });

    nextMonthButton.addEventListener('click', function() {
        let month = parseInt(monthSelect.value);
        let year = parseInt(yearSelect.value);

        month++;
        if (month > 11) {
            month = 0;
            year++;
        }

        monthSelect.value = month;
        yearSelect.value = year;
        renderCalendar();
    });

    // Toggle datepicker on input and icon click
    datepicker.addEventListener('click', toggleDatepickerVisibility);
    toggleDatepicker.addEventListener('click', toggleDatepickerVisibility);

    // Close datepicker when clicking outside
    document.addEventListener('click', function(event) {
        if (!datepicker.contains(event.target) &&
            !datepickerContainer.contains(event.target) &&
            event.target !== toggleDatepicker) {
            datepickerContainer.classList.add('hidden');
        }
    });

    // Initial setup
    populateMonthSelect();
    populateYearSelect();
    renderCalendar();

</script>

