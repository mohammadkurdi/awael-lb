@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit subcategory</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit subcategory</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" name="name" required value="{{ $subcategory->name }}">
                    </div>

                    <br>
                    <br>

                    <div>
                        <label>Main Category</label>
                        <div class="mt-2">
                            <select data-placeholder="Select your category" class="tom-select w-full" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $subcategory->category_id)
                                            selected="selected"
                                        @endif
                                        >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Image</label>
                                <br>
                                    <div class="flex">
                                        <div class="w-40 h-40 image-fit zoom-in">
                                            <img class="tooltip " src="{{ asset($subcategory->image) }}">
                                        </div>
                                    </div>
                                <br>
                                <input name="image" type="file" />
                            </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('subcategory.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
