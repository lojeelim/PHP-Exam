<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company List') }}
        </h2>
    </x-slot>
<!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-indigo-500">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                <p class="ml-3 font-medium text-white truncate">
                <span class="hidden md:inline">
                    @include('msg')
                </span>
                </p>
            </div>
            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                <a href="/company/create" class="font-semibold flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Create Company
                </a>
            </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
               <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form action="{{route('search-company')}}" method="POST" enctype="multipart/form-data">
                            @method('GET')
                            @csrf
                            <div class="p-8">
                                <div class="bg-white flex items-center rounded-full">
                                    <input class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none border-gray-300" name="search" id="search" type="text" placeholder="Search">
                                    <div class="p-1">
                                        <button class="bg-indigo-500 text-white  p-2 hover:bg-indigo-400 focus:outline-none w-14 h-12 flex items-center rounded-sm justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @if(count($company) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       #
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Company Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Website
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Total Employee(s)
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Date Created
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">remove</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">view</span>
                                    </th>
                                </tr>
                            </thead>
                        @foreach($company as $index => $data)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    {{$index+1}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/storage/company_logos/{{$data->logo}}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$data->name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    {{$data->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="#" class="underline">
                                    {{$data->website}}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{$data->employees->count()}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                {{date('F D , Y' ,strtotime($data->created_at)) }} at {{date('g:ia' ,strtotime($data->created_at))}}
                                </td>
                                <td class=" whitespace-nowrap text-center text-sm font-medium">
                                    <form class="pull-right" action="{{route('company.destroy', $data->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this company?');" data-toggle="tooltip" data-placement="top" title="Remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <!-- Remove -->
                                        </button>
                                    </form>
                                </td>
                                <td class=" whitespace-nowrap text-center text-sm font-medium">
                                    <form action="{{route('company.edit', $data->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('GET')
                                        @csrf
                                        <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <!-- Edit -->
                                        </button>
                                    </form>
                                </td>

                                <td class="whitespace-nowrap text-center text-sm font-medium">
                                    <form action="{{route('company.show', $data->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('GET')
                                    @csrf
                                        <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" data-toggle="tooltip" data-placement="top" title="View Info">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                            <!-- View -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- More people... -->
                        </tbody>
                        @endforeach
                        </table>
                        @else
                            <div class="flex justify-center ">
                                <img class="w-1/4 p-4" src="/storage/company_logos/undraw_empty_xct9.svg" alt="">
                            </div>
                            <div class="flex justify-center ">
                                <p class="text-3xl ... text-indigo-600">No Data Found</p>
                            </div>
                        @endif

                        <div class="bg-grey border">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                                {{$company->links()}}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
