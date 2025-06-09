<x-app-layout>
<div class="w-[80%] flex-1 min-h-screen  bg-[#F2F2F3] px-7 py-6">
    <h3 class="text-2xl font-bold font-[poppins] pl-2">Add Medicament</h3>
    <div class="mx-auto font-semibold ml-8">
        <form action="" method="POST">
            @csrf
        <div class="my-5" >
            <!-- Medication Name -->
            <label for="med_name" class="block mb-2 font-[Public sans] font-medium text-black  ">Medication Name</label>
            <input type="text" id="med_name" name="med_name"
            class="bg-gray-50 border border-gray-400 text-black  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Add Medication name"
            required
            value="{{ old('med_name') }}"
            autofocus
            />
            <x-input-error :messages="$errors->get('med_name')" class="mt-2" />
        </div>
        <div class="flex my-5 gap-3">
            <div class="w-1/2">
                <!-- date of next consultation -->
                <label for="date" class="block mb-2   text-gray-900">
                    date consultations de suivi</label>

                    <div class="relative w-full max-w-md">
                        <div class="relative">
                            <input
                                id="datepicker"
                                type="text"
                                name="expiry_date"
                                placeholder="Select Date of Birth"
                                readonly
                                class="w-full px-4 py-3 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer"
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
                    <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" />
            </div>
            <div class="w-1/2" >
                <!-- Stock Quantity -->
                <label for="stock_qnt" class="block mb-2  font-[Public sans] font-medium text-black  ">Stock Quantity</label>
                <input type="number"
                id="stock_qnt" name="stock_qnt"
                value="{{ old('stock_qnt') }}"
                class="bg-gray-50 border border-gray-400 text-black  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3   " placeholder="0" required />
                <x-input-error :messages="$errors->get('stock_qnt')" class="mt-2" />
            </div>
        </div>
        <div class="w-[100%]  mt-5 flex">
            <button name="action" class="bg-gray-300  cursor-pointer hover:bg-gray-700 hover:text-white px-4 py-2 rounded-xl text-black font-semibold ">
                Save and add another
            </button>
        </div>
        <div class="w-[100%]  mt-5 flex">
            <button name="action" value="save and redirect" class="bg-blue-800  cursor-pointer hover:bg-blue-700 px-4 py-2  rounded-xl text-white font-semibold ">
                Save and Finish
            </button>
        </div>
    </form>
    </div>

</div>
</x-app-layout>


<script>
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

