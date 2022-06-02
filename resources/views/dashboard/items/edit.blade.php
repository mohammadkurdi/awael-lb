@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit new product</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit new product</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('item.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" name="name" required value="{{ $item->name }}">
                    </div>
                    <br>
                    <br>
                    <div>
                        <label for="crud-form-1" class="form-label">specifications</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" name="specifications" required value="{{ $item->specifications }}">
                    </div>
                    <br>
                    <br>

                    <div>
                        <label> Category</label>
                        <div class="mt-2">
                            <select data-placeholder="Select your category" class="tom-select w-full" name="subcategory_id">
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                    @if ($item->subcategory_id === $subcategory->id)
                                    selected="selected"
                                    @endif>
                                        {{$subcategory->category->name .' --> '. $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Product images</label>
                                <br>
                                <input name="images[]" type="file" multiple/>
                    </div>
                    <br>
                    <br>

                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Product datasheet</label>
                                <br>
                                <input name="data" type="file" />
                            </div>
                    </div>
                    <br>
                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Product usermanual</label>
                                <br>
                                <input name="manual" type="file" />
                            </div>
                    </div>


                    <div class="text-right mt-5">
                        <a href="{{ route('item.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
