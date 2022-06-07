@extends('../layout/' . $layout)

@section('subhead')
    <title>Products</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Products</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @ability('admin|dataEntry','items-create')
            <a href="{{ route('item.create') }}"><button class="btn btn-primary shadow-md mr-2" >Add New Product</button></a>
            @endability

            @ability('admin|dataEntry','items-read')
            <a href="{{ route('item.trashed') }}"><button class="btn btn-primary shadow-md mr-2" >Deleted products</button></a>
            @endability
            <a href="{{ route('item.export') }}">
                <button class=" btn px-2 box text-gray-700 dark:text-gray-300" >
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                </button>
            </a>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    @php
                        $i=0;
                    @endphp
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Product image</th>
                        <th class="whitespace-nowrap">Product name</th>
                        <th class="whitespace-nowrap">Subcategory</th>
                        <th class="whitespace-nowrap">Category</th>
                        <th class="whitespace-nowrap text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{ ++$i }}
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    @foreach ($items_images as $item_image)
                                        @if ($item->id === $item_image->item_id)
                                        <div class="w-20 h-20 image-fit zoom-in">
                                            <img class="tooltip rounded-full" src="{{ asset($item_image->image) }}">
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('item.show',$item->id) }}" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a  class="font-medium whitespace-nowrap">{{ $item->Subcategory->name }}</a>
                            </td>
                            <td>
                                <a  class="font-medium whitespace-nowrap">{{ $item->Subcategory->category->name }}</a>
                            </td>
                            <td class="table-report__action w-57 ">
                                <div class="flex justify-center items-center">
                                    @ability('admin|dataEntry','items-read')

                                    <a class="flex items-center text-theme-31 mr-3" href="{{ route('item.show',$item->id) }}">
                                        <i data-feather="external-link" class="w-5 h-5 mr-1"></i> Show
                                    </a>
                                    @endability

                                    @ability('admin|dataEntry','items-edit')

                                    <a class="flex items-center mr-3" href="{{ route('item.edit',$item->id) }}">
                                        <i data-feather="check-square" class="w-5 h-5 mr-1"></i> Edit
                                    </a>
                                    @endability

                                    @ability('admin|dataEntry','items-delete')
                                    <form action="{{ route('item.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <a class="flex items-center text-theme-6">
                                            <button type="submit" data-toggle="modal">
                                                <i data-feather="trash-2" class="w-5 h-5 mr-1"></i> Delete
                                            </button>
                                        </a>
                                    </form>
                                    @endability

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    {{ $items->links() }}
@endsection
