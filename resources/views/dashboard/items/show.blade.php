@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $item->name }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">View Product</h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $item->name }}</div>
                    <div class="text-slate-500">{{ $item->subcategory->name }}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Description</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{ $item->description }}
                    </div>
                </div>
            </div>
        </div>
        @ability('admin|dataEntry','items-edit')
        <ul
            class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center"
            role="tablist"
        >
            <li id="settings-tab" class="nav-item" role="presentation">
                <a
                    href="{{ route('item.edit',$item->id) }}"
                    class="nav-link py-4 flex items-center"
                    data-tw-target="#settings"
                    aria-selected="false"
                    role="tab"
                >
                <i data-feather="check-square" class="w-5 h-5 mr-1"></i> Edit product
                </a>
            </li>
        </ul>
        @endability
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Latest Uploads -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Files</h2>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="file">
                                <a href="{{ asset($itemdata->file) }}" class="w-12 file__icon file__icon--directory" download></a>
                            </div>
                            <div class="ml-4">
                                <a class="font-medium" >Datasheet</a>
                            </div>
                        </div>
                        <br>
                        <div class="flex items-center">
                            <div class="file">
                                <a href="{{ asset($itemdata->manual) }}" class="w-12 file__icon file__icon--directory" download></a>
                            </div>
                            <div class="ml-4">
                                <a class="font-medium" >Usermanual</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Latest Uploads -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Specifications</h2>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="font-medium">{!! nl2br($item->specifications) !!}</div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->
                <!-- BEGIN: New Products -->
                <div class="intro-y box col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">Product images</h2>
                        </div>
                        <div id="multiple-item-slider" class="p-5">
                            <div class="preview">
                                <div class="mx-6">
                                    <div class="multiple-items">
                                        @foreach ($itemimages as $itemimage)
                                            <div class="h-32 px-2">
                                                <div class="h-full bg-slate-100 dark:bg-darkmode-400 rounded-md">
                                                    <h3 class="h-full font-medium flex items-center justify-center text-2xl">
                                                        <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset($itemimage->image) }}" />
                                                    </h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: New Products -->
            </div>
        </div>
    </div>
@endsection
