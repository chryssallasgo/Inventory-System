<div>
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
  
            <div class="flex justify-between p-4 item-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-neutral-500">Computer Parts</h1>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">List of Computer Parts</p>
                </div>
               <div>
                <a href="{{ route('pcparts.createpc') }}" wire:navigate class="inline-flex items-center px-4 py-3 mb-4 text-sm font-medium text-white bg-orange-500 border border-transparent rounded-lg shadow-md gap-x-2 hover:bg-amber-600 focus:outline-none focus:bg-orange-600 disabled:opacity-50 disabled:pointer-events-none">
                    Add Item(s)
                </a>
               </div>
            </div>
              {{-- Search students --}}
              <div>
                <x-search placeholder="Search students.." wire:model.live.debounce.500="search" />
            </div>
            {{-- end search --}}
            <div class="overflow-hidden bg-white shadow-sm dark:bg-orange-200 sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-neutral-400">
                  <div class="flex flex-col">
                      <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                          <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-100" id="paginated-items">
                              <thead>
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start {{ $sortColumn == 'id' ? 'border-b-2 border-orange-300' : '' }}">
                                      <x-sortable column="id" :$sortColumn :$sortDirection>
                                          ID
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'item_name' ? 'border-b-2 border-orange-300' : '' }}">
                                      <x-sortable column="item_name" :$sortColumn :$sortDirection>
                                          Item Name
                                      </x-sortable>
                                      </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'item_price' ? 'border-b-2 border-orange-300' : '' }}">
                                      <x-sortable column="item_price" :$sortColumn :$sortDirection>
                                          Price
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'item_quantity' ? 'border-b-2 border-orange-300' : '' }}">
                                    <x-sortable column="item_quantity" :$sortColumn :$sortDirection>
                                        Quantity
                                    </x-sortable>
                                </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'partcategory_id' ? 'border-b-2 border-orange-300' : '' }}">
                                      <x-sortable column="partcategory_id" :$sortColumn :$sortDirection>
                                          Category
                                      </x-sortable>
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-sm font-medium uppercase text-start  {{ $sortColumn == 'manufacturer_id' ? 'border-b-2 border-orange-300' : '' }}">
                                      <x-sortable column="manufacturer_id" :$sortColumn :$sortDirection>
                                          Manufacturer
                                      </x-sortable>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach($items as $item)
                                        <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-100 dark:even:bg-gray-300 dark:hover:bg-gray-400">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-500">{{ $item->id }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-500">{{ $item->item_name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-500">{{ $item->formatted_price ?? 'No Price' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-500">{{ $item->item_quantity ?? 'No Quantity' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-500">{{ $item->partcategory->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-wrap dark:text-neutral-500">{{ $item->manufacturer->name }}</td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                              <a href="{{ route('pcparts.editpc', $item->id) }}" wire:navigate class="inline-flex items-center border-transparent gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"><img src="https://cdn-icons-png.flaticon.com/128/8961/8961331.png" alt="Edit Icon" class="w-6 h-6"></a>
                                            <button type="button" 
                                              wire:click="delete({{$item->id}})"
                                              wire:confirm="Are you sure you want to delete this student?"
                                              class="inline-flex items-center focus:outline-none focus:text-gray-800 disabled:opacity-50 disabled:pointer-events-none"><img src="https://cdn-icons-png.flaticon.com/128/9713/9713380.png" alt="Delete Icon" class="w-6 h-6 "> </button>
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
                        {{ $items->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>