<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polling Results') }}
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto mt-6">
        <div class="" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">

                    <h1 class="text-4xl font-black mb-4">Polling Results</h1>
                    
                    <div style="width:100%">
                        <h2 class="font-black mt-2 text-2xl ">Name: {{$pollingUnit->polling_unit_name}}</h2>
                        <p class="py-3"><b>Description:</b> {{ $pollingUnit->polling_unit_description }}</p>
                        
                        @if(isset($pollingResults) and count($pollingResults) > 0)
                            <table class="table-fixed w-full">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="text-left">Party</th>
                                        <th class="text-left">Party Score</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($pollingResults as $index => $pollingResult)
                                        <tr style="border-bottom-width:1px;">
                                            <td class="text-left py-2" >{{$pollingResult->party_abbreviation}}</td>
                                            <td class="text-left" >{{$pollingResult->party_score}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>                        
                            </table>      
                        @else
                            <p class="py-6">No polling result found for this polling unit</p>
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
