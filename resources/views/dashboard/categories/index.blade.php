@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Categories</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @ability('admin|dataEntry','categories-create')
                <a href="{{ route('category.create') }}"><button class="btn btn-primary shadow-md mr-2" >Add New Category</button></a>
            @endability
            <a href="{{ route('category.export') }}">
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
                        <th class="whitespace-nowrap">Category image</th>
                        <th class="whitespace-nowrap">Category name</th>
                        <th class="whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{ ++$i }}
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img class="tooltip rounded-full" src="{{ asset($category->image) }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a  class="font-medium whitespace-nowrap">{{ $category->name }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @ability('admin|dataEntry','categories-edit')
                                        <a class="flex items-center mr-3" href="{{ route('category.edit',$category->id) }}">
                                            <i data-feather="check-square" class="w-5 h-5 mr-1"></i> Edit
                                        </a>
                                    @endability

                                    @ability('admin|dataEntry','categories-delete')
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?')">
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
    {{ $categories->links() }}
@endsection
