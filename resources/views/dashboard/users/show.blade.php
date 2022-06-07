@extends('../layout/' . $layout)

@section('subhead')
    <title>Products</title>
@endsection

@section('subcontent')
<a class="flex items-center mr-3" href="{{ route('user.edit',$user->id) }}">
    <button class="btn btn-primary shadow-md mr-2" ><i data-feather="check-square" class="w-5 h-5 mr-1"></i>Edit</button>
</a>
    <h2>{{ $user->name }}</h2>

    <h3>{{ $user->email }}</h3>

    <div class="mx-6 pb-8" style="width: 50%;">
        <div class="fade-mode">
            <div class="h-64 px-2">
                <div class="h-full image-fit rounded-md overflow-hidden">
                    <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset($user->photo) }}" />
                </div>
            </div>
        </div>
    </div>





@endsection
