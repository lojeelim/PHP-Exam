<x-app-layout>
  <div class="bg-indigo-500">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between flex-wrap">
        <div class="w-0 flex-1 flex items-center">
          <span class="flex p-2 rounded-lg text-white bg-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
              </svg>
          </span>
          <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
                We announced a new product!
            </span>
            <span class="hidden md:inline font-semibold text-xl">
                Add Employee
            </span>
          </p>
        </div>
        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
          <a href="/employee" class="font-semibold flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
            </svg>
            back
          </a>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="p-5 justify-center">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('employee.store')}}" method="POST">
        @csrf
          <div class="shadow-md sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              @if ($errors->any())
                <div class="alert alert-danger text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company_website" class="block text-sm font-medium text-gray-700">
                    First Name
                  </label>
                  <div class="mt-1 ">
                    <input type="text" name="firstname" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="First Name">
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company_website" class="block text-sm font-medium text-gray-700">
                    Last Name
                  </label>
                    <div class="mt-1 ">
                      <input type="text" name="lastname" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Last Name">
                    </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company_website" class="block text-sm font-medium text-gray-700">
                    Company
                  </label>
                  <div class="mt-1 ">
                    <select name="company" id="" class=" block text-sm font-medium text-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
                      <option value=""  default>Select Company</option>
                        @foreach($company as $data)
                          <option value="{{$data->id}}" >{{$data->name}} - {{$data->email}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                  Email
                </label>
                  <div class="mt-1">
                    <input id="about" name="email" type="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com">
                  </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company_website" class="block text-sm font-medium text-gray-700">
                    Phone
                  </label>
                  <div class="mt-1 ">
                    <input type="number" name="phone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="+63">
                  </div>
                </div>
              </div>

            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>