<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-sky-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h1 class="text-xl font-bold">Computer Part Data</h1>
                            <p class="text-sm text-gray-300">Fill out this form to edit a computer part</p>
                        </div>

                        <form wire:submit.prevent="update">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="pcpart_name" class="block mb-2 text-sm font-medium dark:text-white">PC Name</label>
                                    <input 
                                        type="text" 
                                        id="pcpart_name" 
                                        wire:model="pcform.pcpart_name" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.pcpart_name') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                    @error('pcform.pcpart_name') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="pcpart_price" class="block mb-2 text-sm font-medium dark:text-white">PC Price</label>
                                    <input 
                                        type="number" 
                                        step="1.00"
                                        id="pcpart_price" 
                                        wire:model="pcform.pcpart_price" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 
                                        @error('pcform.pcpart_price') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                    @error('pcform.pcpart_price') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="partcategory_id" class="block mb-2 text-sm font-medium dark:text-white">Part Category</label>
                                    <select 
                                        id="partcategory_id" 
                                        wire:model="pcform.partcategory_id" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.partcategory_id') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                        <option value="">Select a Part Category</option>
                                        @foreach ($partcategory as $partcategory)
                                            <option value="{{ $partcategory->id }}">{{ $partcategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcform.partcategory_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="manufacturer_id" class="block mb-2 text-sm font-medium dark:text-white">Manufacturer</label>
                                    <select 
                                        id="manufacturer_id" 
                                        wire:model="pcform.manufacturer_id" 
                                        class="block w-full px-4 py-3 text-sm rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 
                                        @error('pcform.manufacturer_id') text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror">
                                        <option value="">Select a Manufacturer</option>
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcform.manufacturer_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="flex justify-end mt-4 gap-x-3">
                                <a href="{{ route('pcparts.indexpc') }}" wire:navigate class="inline-flex items-center px-4 py-3 text-sm font-medium text-blue-800 border border-transparent rounded-lg bg-sky-500 gap-x-2 hover:bg-indigo-200 focus:outline-none focus:bg-indigo-200 disabled:opacity-50 disabled:pointer-events-none dark:text-sky-200 dark:hover:bg-blue-700 dark:focus:bg-blue-500">
                                    Cancel
                                </a>
                                <button type="submit" class="px-4 py-3 text-sm font-medium text-white bg-blue-700 border border-transparent rounded-lg gap-x-2 hover:bg-blue-600 focus:outline-none focus:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none">
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
