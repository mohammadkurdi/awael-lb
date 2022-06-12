@extends('../layout/' . $layout)

@section('subhead')
    <title>Deleted Products</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Deleted Products</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('item.index') }}"><button class="btn btn-primary shadow-md mr-2" >Back to products</button></a>


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

                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $item->Subcategory->name }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $item->Subcategory->category->name }}</a>
                            </td>
                            <td class="table-report__action w-57 ">
                                <div class="flex justify-center items-center">
                                    @role('admin|dataEntry')
                                    <a class="flex items-center text-theme-31 mr-3" href="{{ route('item.restore',$item->id) }}">
                                        <i data-feather="external-link" class="w-5 h-5 mr-1"></i> Restore
                                    </a>
                                    @endrole

                                    @role('admin|dataEntry')
                                    <form action="{{ route('item.hdelete',$item->id) }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <a class="flex items-center text-theme-6">
                                            <button type="submit" data-toggle="modal">
                                                <i data-feather="trash-2" class="w-5 h-5 mr-1"></i> Delete
                                            </button>
                                        </a>
                                    </form>
                                    @endrole

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
@endsection
