<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polling Results') }}
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto my-6">
        <div class="" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">

                    <h1 class="text-4xl font-black mb-4">Search Polling Results By LGA</h1>
                    
                    <div style="width:100%">

                        <form method="POST" action="{{route('polling_result_lga_get')}}" class="float:right;">
                            @csrf

                            <div class="flex flex-row flex-nowrap">    
                                <div style="flex-grow: 1;">
                                    <x-label for="lga" :value="__('Local Government')" />
                                    <x-select id="lga" name="lga" type="text" autofocus>
                                        @foreach ($localGovernments  as $localGovernment)
                                            <option value="{{$localGovernment->lga_id}}">{{$localGovernment->lga_name}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                                                
                                <x-button type="submit" class="ml-4 my-1.5 normal-case" style="background: #0284C7; font-size:0.9em; font-weight:normal; padding: 0.6em 1.5em;">
                                    {{ __('Search') }}
                                </x-button><br>
                            </div>                           
                        </form>  

                        @if(isset($cummulativePollingResults) && count($cummulativePollingResults) > 0)
                            <div style="width:100%">

                                @if($currentLocalGovernment)
                                    <h2 class="font-black my-10 text-2xl">Cummulative Polling Results for {{$currentLocalGovernment->lga_name}}</h2>
                                @endif

                                <table class="table-fixed w-full">  
                                    <thead>
                                        <tr class="border-b-2">
                                            <th class="text-left">Party</th>
                                            <th class="text-left">Party Score</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach ($cummulativePollingResults as $index => $cummulativePollingResult)
                                            <tr style="border-bottom-width:1px;">
                                                <td class="text-left py-2" >{{$index}}</td>
                                                <td class="text-left" >{{$cummulativePollingResult}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>                        
                                </table>      
                            </div> 
                        @else
                            <p class="mt-5">No polling results found for specified local government</p>
                        @endif

                    </div> 
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
