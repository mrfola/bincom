<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Polling Results') }}
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto my-6">
        <div class="" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">

                    @if(session('message'))
                        <p class="py-6">Polling Result Added Successfully</p>
                    @endif

                    <h1 class="text-4xl font-black mb-4">Add Polling Result</h1>

                    <div style="width:100%">

                        <form method="POST" action="{{route('polling_result_create')}}" class="float:right;">
                            @csrf

                            <!-- Polling Unit -->
                            <div class="my-1">
                                <x-label for="polling_unit" :value="__('Polling Unit')" />
                                <x-select id="lga" name="Polling Unit" type="text" autofocus>
                                    @foreach ($pollingUnits  as $pollingUnit)
                                        <option value="{{$pollingUnit->uniqueid}}">{{$pollingUnit->polling_unit_name}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            
                            <div class="flex flex-row nowrap" style="gap:10px;">
                                  <!-- PDP -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="PDP" :value="__('PDP Score')" />
                                    <x-input id="PDP" class="block mt-1 w-full" type="number" name="PDP" :value="old('PDP')" required autofocus />
                                </div>

                                <!-- DPP -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="DPP" :value="__('DPP Score')" />
                                    <x-input id="DPP" class="block mt-1 w-full" type="number" name="DPP" :value="old('DPP')" required autofocus />
                                </div>

                                <!-- ACN -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="ACN" :value="__('ACN Score')" />
                                    <x-input id="ACN" class="block mt-1 w-full" type="number" name="ACN" :value="old('ACN')" required autofocus />
                                </div>
                            </div>
                          
                            <div class="flex flex-row nowrap" style="gap:10px;">
                                <!-- PPA -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="PPA" :value="__('PPA Score')" />
                                    <x-input id="PPA" class="block mt-1 w-full" type="number" name="PPA" :value="old('PPA')" required autofocus />
                                </div>

                                <!-- CDC -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="CDC" :value="__('CDC Score')" />
                                    <x-input id="CDC" class="block mt-1 w-full" type="number" name="CDC" :value="old('CDC')" required autofocus />
                                </div>

                                <!-- JP -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="JP" :value="__('JP Score')" />
                                    <x-input id="JP" class="block mt-1 w-full" type="number" name="JP" :value="old('JP')" required autofocus />
                                </div>
                            </div>

                            <div class="flex flex-row nowrap" style="gap:10px;">
                                <!-- ANPP -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="ANPP" :value="__('ANPP Score')" />
                                    <x-input id="ANPP" class="block mt-1 w-full" type="number" name="ANPP" :value="old('ANPP')" required autofocus />
                                </div>

                                <!-- LABO -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="LABO" :value="__('LABO Score')" />
                                    <x-input id="LABO" class="block mt-1 w-full" type="number" name="LABO" :value="old('LABO')" required autofocus />
                                </div>

                                <!-- CPP -->
                                <div class="my-1" style="flex-grow:1;">
                                    <x-label for="CPP" :value="__('CPP Score')" />
                                    <x-input id="CPP" class="block mt-1 w-full" type="number" name="CPP" :value="old('CPP')" required autofocus />
                                </div>
                            </div>
                            <x-button type="submit" class="my-1.5 normal-case" style="background: #0284C7; font-size:1em; font-weight:normal; padding: 0.6em 2.6em;">
                                {{ __('Store') }}
                            </x-button><br>
                       </form>  

                    </div> 
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
