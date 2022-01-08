<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                    <a style="float:right; margin: auto;" href="/polling-results-lga">
                        <x-button class="my-1.5 normal-case" style="background: blue; font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                            {{ __('Get Polling Results by LGA') }}
                        </x-button><br>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container max-w-7xl mx-auto">

        <div class="" style="min-height:80vh;">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
        <div class="px-6 py-12 bg-white border-b border-gray-200">

            <h1 class="text-4xl font-black mb-4">Polling Results</h1>
            
            <div style="width:100%">
                @if (isset($pollingUnits) && (count($pollingUnits) > 0))

                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="border-b-2">
                                <th class="text-left">#</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Number</th>
                                <th class="text-left">Description</th>
                                {{-- <th class="text-left">LGA</th> --}}
                                <th class="text-left">View</th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach ($pollingUnits as $index => $pollingUnit)

                                    <tr style="border-bottom-width:1px;">
                                        <td class="text-left py-2" >{{$loop->iteration}}</td>
                                        <td class="text-left" >{{$pollingUnit->polling_unit_name}}</td>
                                        <td class="text-left">{{$pollingUnit->polling_unit_number}}</td>
                                        <td class="text-left">{{$pollingUnit->polling_unit_description}}</td>
                                        {{-- <td class="text-left">{{$pollingUnit->getLocalGovernment()}}</td> --}}

                                        <td>
                                            <form method="POST" action="/polling-results">
                                                @csrf
                                                <input type="hidden" name="polling_unit_id" value="{{$pollingUnit->uniqueid}}"/>
                                                <x-button type="submit" class="my-1.5 normal-case" style="background: #347B05; font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">{{ __('View') }}</x-button><br>
                                            </form>  
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>                        
                    </table>

                @else
                    <h2 class="text-2xl font-black mb-4">No Polling Units In Record</h2>
                @endif

            </div>
        </div>
        </div>
        </div>
</div>


</x-app-layout>
