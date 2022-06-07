@extends('../layout/' . $layout)

@section('subhead')
    <title>Users</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Users</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('user.index') }}"> <button  class="btn btn-primary shadow-md mr-2">Back to users</button></a>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Users Layout -->
        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset($user->photo) }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="{{ route('user.show',$user->id) }}" class="font-medium">{{ $user->name }}</a>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <a href="{{ route('user.restore',$user->id) }}"> <button class="btn btn-primary py-1 px-2 mr-2">Restore</button></a>
                            <form action="{{ route('user.hdelete',$user->id) }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?')">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-danger  py-1 px-2">
                                    <button type="submit" data-toggle="modal">
                                         Delete
                                    </button>
                                </a>
                            </form>                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- BEGIN: Users Layout -->
@endsection
