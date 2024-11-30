<div>
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
  
            <div class="flex justify-between p-4 item-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-neutral-200">Computer Parts</h1>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">List of Computer Parts</p>
                </div>
               <div>
                <a href="{{ route('pcparts.createpc') }}" wire:navigate class="inline-flex items-center px-4 py-3 mb-4 text-sm font-medium text-white border border-transparent rounded-lg shadow-md bg-sky-500 gap-x-2 hover:bg-sky-600 focus:outline-none focus:bg-sky-600 disabled:opacity-50 disabled:pointer-events-none">
                    Add Computer Part
                </a>
               </div>
            </div>
              {{-- Search students --}}
              <div>
                <x-search placeholder="Search students.." wire:model.live.debounce.500="search" />
            </div>
            {{-- end search --}}
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="flex flex-col">
                      <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                          <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" id="paginated-pcparts">
                              <thead>
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'id' ? 'border-b-2 border-indigo-300' : '' }}">
                                      <x-sortable column="id" :$sortColumn :$sortDirection>
                                          ID
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'pcpart_name' ? 'border-b-2 border-indigo-300' : '' }}">
                                      <x-sortable column="pcpart_name" :$sortColumn :$sortDirection>
                                          Computer Part Name
                                      </x-sortable>
                                      </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'pcpart_price' ? 'border-b-2 border-indigo-300' : '' }}">
                                      <x-sortable column="pcpart_price" :$sortColumn :$sortDirection>
                                          Price
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'partcategory_id' ? 'border-b-2 border-indigo-300' : '' }}">
                                      <x-sortable column="partcategory_id" :$sortColumn :$sortDirection>
                                          Part Category
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'manufacturer_id' ? 'border-b-2 border-indigo-300' : '' }}">
                                      <x-sortable column="manufacturer_id" :$sortColumn :$sortDirection>
                                          Manufacturer
                                      </x-sortable>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach($pcparts as $pcpart)
                                        <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:hover:bg-gray-950">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $pcpart->id }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $pcpart->pcpart_name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $pcpart->formatted_price ?? 'No Price' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">{{ $pcpart->partcategory->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-wrap dark:text-neutral-200">{{ $pcpart->manufacturer->name }}</td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                              <a href="{{ route('pcparts.editpc', $pcpart) }}" wire:navigate class="text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Edit</a>
                                            <button type="button" 
                                              wire:click="delete({{$pcpart->id}})"
                                              wire:confirm="Are you sure you want to delete this student?"
                                              class="inline-flex items-center text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
  
                    <div class="my-4">
                        {{ $pcparts->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>