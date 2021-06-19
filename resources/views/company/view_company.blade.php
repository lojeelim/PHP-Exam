<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold uppercase text-xl text-gray-800 leading-tight">
    <!-- <div class="flex-shrink-0 h-10 w-"> -->
      <img class="w-24 p-2 rounded-full" src="/storage/company_logos/{{$company->logo}}" alt="">
    <!-- </div> -->
        {{ $company->name }} - Employees List
    </h2>
    <a class="underline" href="#">
    {{$company->email}}
    </a>
  </x-slot>
  <div class="flex flex-col p-4">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          @if(count($company->employees) > 0)
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Employee's Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Company
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Phone
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Date hired
                </th>

              </tr>
            </thead>
            @foreach($employees as $data)
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <!-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt=""> -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$data->firstname}}  {{$data->lastname}}
                      </div>
                      <div class="text-sm text-gray-500">

                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{$data->email}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{$data->company->name}}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$data->phone}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{date('F D , Y' ,strtotime($data->created_at)) }} at {{date('g:ia' ,strtotime($data->created_at))}}
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
          @else
            <div class="flex justify-center ">
                <img class="w-1/4 p-4" src="/storage/company_logos/undraw_empty_xct9.svg" alt="">
            </div>
            <div class="flex justify-center ">
                <p class="text-3xl ... text-indigo-600">No Employee</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
