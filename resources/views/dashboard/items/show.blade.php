@extends('../layout/' . $layout)

@section('subhead')
    <title>Products</title>
@endsection

@section('subcontent')

    <h2>{{ $item->name }}</h2>

    <h3>{{ $item->specifications }}</h3>






    <div class="mx-6 pb-8" style="width: 50%;">
        <div class="fade-mode">
            @foreach ($itemimages as $itemimage)
            <div class="h-64 px-2">
                <div class="h-full image-fit rounded-md overflow-hidden">
                    <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset($itemimage->image) }}" />
                </div>
            </div>
            @endforeach

        </div>
    </div>





    <a href="{{ asset($itemdata->file) }}" class="btn btn-secondary w-24 inline-block mr-1 mb-2" download>Datasheet</a>
    <a href="{{ asset($itemmanual->file) }}" class="btn btn-primary w-24 inline-block mr-1 mb-2" download>Usermanual</a>
@endsection