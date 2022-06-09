@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit category</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit category</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Category name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" name="name" required value="{{ $category->name }}">
                    </div>
                    <br>
                    <br>

                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Category image</label>
                                <br>
                                    <div class="flex">
                                        <div class="w-40 h-40 image-fit zoom-in">
                                            <img class="tooltip " src="{{ asset($category->image) }}">
                                        </div>
                                    </div>
                                <br>
                                <input name="image" type="file" />
                            </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('category.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger show mb-2" role="alert">
            <ul >
                @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
