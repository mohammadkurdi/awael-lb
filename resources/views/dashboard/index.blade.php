@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                        <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <a href="{{ route('category.index') }}">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>

                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $categories }}</div>
                                        <div class="text-base text-gray-600 mt-1">Categories</div>
                                    </div>
                                </div>
                            </a>
                         </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <a href="{{ route('subcategory.index') }}">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $subcategories }}</div>
                                        <div class="text-base text-gray-600 mt-1">Subcategories</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <a href="{{ route('item.index') }}">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $items }}</div>
                                        <div class="text-base text-gray-600 mt-1">Products</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

        </div>

    </div>
@endsection
