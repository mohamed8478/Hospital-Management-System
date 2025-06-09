<x-app-layout>
    <div class="w-[80%] flex-1 min-h-screen  bg-[#F2F2F3] px-7 py-6">
        <h3 class="text-xl font-semibold pl-2">Add Patient</h3>
        <div class="bg-[#EDEDED] border border-gray-300 shadow-2xl rounded-2xl p-5 mt-7">
            <h3 class="text-xl font-semibold  pb-7"> Informations personnelles</h3>
            <form method="POST" action="{{ route('reception.add') }}">
                @csrf
            <div>
                <div class="flex mb-5">
                    <div class="w-1/2 mr-20 " >
                        <!-- duree -->
                        <label for="first_name" class="block mb-2 font-[roboto] font-medium text-gray-900 ">Nom complet</label>
                        <input type="text" name="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom complet" my-3 />
                        <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                    </div>

                    <div class="w-1/2 ">
                        <!-- duree -->
                        <label for="first_name" class="block mb-2 font-[roboto]  font-medium text-gray-900 ">Date de naissance</label>

                        {{-- <div class="relative ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 "  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                            </div>
                            <input datepicker name="birth_date" id="default-datepicker" type="text" id="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div> --}}
                        <div class="relative w-full max-w-md">
                            <div class="relative">
                                <input
                                    id="datepicker"
                                    type="text"
                                    name="birth_date"
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
                        </div>

                </div>

                <!-- Gender -->
                <label for="first_name" class="block mb-2 font-[roboto] font-medium text-gray-900 ">Sexe:</label>
                <div class="ml-5 flex mb-6 font-[roboto]" >
                    <div class="flex items-center mr-12 ">
                        <input id="default-radio-1" type="radio" value="male" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 ">Homme</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="female" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 ">Femme</label>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />


                <div class="mb-5">
                    <label for="first_name" class="block mb-2 font-[roboto] font-medium text-gray-900 ">National ID or Passport Number :</label>
                    <input type="text"  name="national_id" class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="AB23453"   />
                    <x-input-error :messages="$errors->get('national_id')" class="mt-2" />

                </div>
                <div class="mb-5">
                    <label for="first_name" class="block mb-2 font-[roboto] font-medium text-gray-900 ">Contact Number :</label>
                    <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212 6 12 34 56 78"   />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <label for="first_name" class="block mb-2 font-[roboto] font-medium text-gray-900 ">Email Address :</label>
                    <input type="email" name="email" required class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom@gmail.com"   />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <h3 class="text-xl font-semibold  mt-7 mb-4"> Address Information</h3>

            <label for="message" class="block mb-2 font-medium text-gray-900 font-[roboto]">Adresse complète : </label>
            <textarea id="message" name="address" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123 Rue de la Liberté"></textarea>

            <!-- Informations médicales -->
            <h3 class="text-xl font-semibold  mt-7 mb-4"> Informations médicales</h3>

            <label for="message" class="block mb-2 font-medium text-gray-900 font-[roboto] text-lg">Groupe sanguin :</label>
            <select id="countries" name="blood_type" class="bg-gray-50 mb-5 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">sanguin Type</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <x-input-error :messages="$errors->get('blood_type')" class="mt-2" />
            <label for="message" class="block mb-2 font-medium text-gray-900 font-[roboto]">Maladies chroniques :</label>
            <input type="text" name="chronic_diseases" class="bg-gray-50 mb-5 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex : Diabète, Hypertension"   />
            <x-input-error :messages="$errors->get('chronic_diseases')" class="mt-2" />
            <label for="message" class="block mb-2 font-medium text-gray-900 font-[roboto]">Médicaments en cours :</label>
            <input type="text" name="medications" class="bg-gray-50 mb-5 border border-gray-300 text-gray-900 font-[roboto]  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex : Paracétamol, Insuline"   />
            <x-input-error :messages="$errors->get('medications')" class="mt-2" />
            <div class="w-[100%]  mt-5 flex">
                <button type="submit" class="bg-blue-800 block ml-auto cursor-pointer hover:bg-blue-700 px-6 py-2.5 rounded-xl text-white font-semibold ">
                    Add Patient
                </button>
            </div>
        </form>
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
        const startYear = currentYear - 70; // 100 years back
        const endYear = currentYear; // 10 years forward

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

        {{-- full_name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|string',
        'national_id' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'address' => 'nullable|string',
        'blood_type' => 'nullable|string|max:3',
        'chronic_diseases' => 'nullable|string',
        'medications' --}}
