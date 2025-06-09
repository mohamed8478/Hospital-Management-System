<x-app-layout>

    <div class="w-[80%] flex-1 h-[100%] bg-[#F2F2F3] px-7 py-6">
        <h3 class="text-xl font-semibold pl-2">Patient Information</h3>
        <div class="bg-[#EDEDED] border border-gray-300 shadow-2xl rounded-2xl p-5 mt-7">
        <h3 class="text-xl font-semibold  pb-7"> Patient Information</h3>
        <div class="flex justify-between items-stretch">
            <!-- Left Content -->
            <div class="flex-1">
            <p class="mb-5 text-lg font-light ml-3 font-[roboto]">Nom complet
                <span class="ml-6 font-semibold"> {{ $patient->name }}</span>
            </p>
            <p class="mb-5 text-lg font-light ml-3 font-[roboto]">Date de naissance
                <span class="ml-6 font-semibold"> Nov 23, 2001</span>
            <p class="mb-5 text-lg ml-3 font-light flex flex-1/2  font-[roboto]">Adresse complète
                <span class="ml-6 font-semibold flex-1/4 "> {{ $patient->address }}
                </span>
            </p>
            <p class="mb-5 text-lg font-light ml-3 font-[roboto]">Numéro de téléphone
                <span class="ml-6 font-semibold"> {{ $patient->phone_num }}</span>
            </p>
            </div>

            <!-- Vertical Line -->
            <div class="w-px bg-gray-400 mx-6"></div>

            <!-- Right Content -->
            <div class="flex-1 ml-3 px-5">
            <p class="mb-5 text-lg flex flex-1/2 font-light font-[roboto]">Allergies
                <span class="ml-6 font-semibold flex-1/4 ">{{ $patient->chronic_conditions ?? "None" }}</span>
            </p>
            <p class="mb-5 text-lg font-light flex flex-1/2  font-[roboto]">Maladies chroniques
                <span class="ml-6 font-semibold flex-1/4 ">
                {{$patient->maladies  ?? "none"}}
                </span>
            </p>
            <p class="mb-5 text-lg font-light flex flex-1/2 font-[roboto]">Médicaments pris actuellement
                <span class="ml-6 flex-1/4 font-semibold">
                    Paracétamol -
                    Oméprazole -
                    Aspirine
                </span>
            </p>
            </div>
        </div>


        </div>
        <div class="bg-[#EDEDED] border border-gray-300 shadow-2xl rounded-2xl p-5 mt-7">
            <div class="flex mb-10 justify-between">
                <h3 class="text-xl font-semibold"> Patient History</h3>
                    <a href="{{ route('doctor.add.prescriptionToPatient',$patient->id ) }}" class="bg-blue-800 block h-12 cursor-pointer hover:bg-blue-700 px-6 py-2.5 rounded-xl text-white font-semibold ">
                        Add Prescription
                    </a>
            </div>
        <!-- Patient History  -->
        @empty($prescriptionVisits)
            <p>No value found.</p>
        @else
        @foreach ( $prescriptionVisits  as $visit )
        <div class="ml-2 flex gap-5 mb-9">
            <div class="ml-12 flex gap-5 w-full mb-4">
                <div class="relative min-h-full w-[0.8px] bg-black ">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-6 h-6 bg-black rounded-full"></div>
                </div>
                <div class="flex-1 ml-3 relative -top-5">
                    <p class="text-gray-500 font-[poppins] text-base">Mars 12, 2025</p>
                  <div>
                    <div class="flex gap-1 bg-[#D9D9D9] border p-1.5 border-gray-500 rounded-xl mb-4 mt-2">
                      <div class="w-1 min-h-full bg-black mx-2"></div>
                      <div>
                        <div>Visite {{ $visit['visit_number'] }} - {{ $visit['doctor']->name }}
                          <span
                            class="bg-blue-700 ml-5 relative top-0.5 text-white text-sm font-medium me-2 px-3.5 py-1 rounded-full">{{ $visit['doctor']->specialization }}</span>
                        </div>
                        <p class="text-gray-500 font-[poppins] text-sm">Mars 12, 2025</p>
                      </div>
                    </div>
                    <div class="flex ml-7 bg-white rounded-lg flex-col">
                      <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                          <div class="border border-black rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-black">
                              <thead>
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-500 ">Code - Nom
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-500 ">Dosage
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-500 ">Duree de
                                    Traitement</th>
                                  <th scope="col" class="px-6 py-3 text-start text-sm font-semibold text-gray-500 ">Qnt</th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-black">
                                @foreach ($visit['medications'] as $medication)
                                <tr class="font-[poppins] font-semibold">
                                <td class="px-6 py-4 whitespace-nowrap text-sm  ">{{ $medication->id }} - {{ $medication->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm ">1 prise par jour</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm ">15 jour</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm ">{{ $medication->pivot->quantity }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
        @endempty
</x-app-layout>



