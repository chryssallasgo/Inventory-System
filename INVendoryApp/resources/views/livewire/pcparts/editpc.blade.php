<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-orange-400 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h1 class="text-xl font-bold">Item Data</h1>
                            <p class="text-sm text-gray-300">Fill out this form to edit an item</p>
                        </div>

                        <form wire:submit.prevent="update">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="item_name" class="block mb-2 text-sm font-medium dark:text-white">Item Name</label>
                                    <input 
                                        type="text" 
                                        id="item_name" 
                                        wire:model.blur="pcform.item_name" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-orange-500 focus:ring-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.item_name') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                    @error('pcform.item_name') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="item_price" class="block mb-2 text-sm font-medium dark:text-white">Item Price</label>
                                    <input 
                                        type="number" 
                                        step="1.00"
                                        id="item_price" 
                                        wire:model.blur="pcform.item_price" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-orange-500 focus:ring-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 
                                        @error('pcform.item_price') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                    @error('pcform.item_price') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="item_quantity" class="block mb-2 text-sm font-medium dark:text-white">Item Quantity</label>
                                    <input 
                                        type="number" 
                                        step="1.00"
                                        id="item_quantity" 
                                        wire:model.blur="pcform.item_quantity" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-orange-500 focus:ring-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 
                                        @error('pcform.item_quantity') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                    @error('pcform.item_quantity') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="partcategory_id" class="block mb-2 text-sm font-medium dark:text-white">Item Category</label>
                                    <select 
                                        id="partcategory_id" 
                                        wire:model.live="pcform.partcategory_id" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-orange-500 focus:ring-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.partcategory_id') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($partcategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcform.partcategory_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="manufacturer_id" class="block mb-2 text-sm font-medium dark:text-white">Manufacturer</label>
                                    <select 
                                        id="manufacturer_id" 
                                        wire:model.live="pcform.manufacturer_id" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-orange-500 focus:ring-orange-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.manufacturer_id') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                        <option value=" ">Select a Manufacturer</option>
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcform.manufacturer_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="flex justify-end mt-4 gap-x-3">
                                <a href="{{ route('pcparts.indexpc') }}" wire:navigate class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-100 bg-orange-900 border border-transparent rounded-lg gap-x-2 hover:bg-orange-200 focus:outline-none focus:bg-orange-200 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-orange-600 dark:focus:bg-orange-900">
                                    Cancel
                                </a>
                                <button type="submit" class="px-4 py-3 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-lg gap-x-2 hover:bg-orange-700 focus:outline-none focus:bg-orange-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Update
                                </button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
