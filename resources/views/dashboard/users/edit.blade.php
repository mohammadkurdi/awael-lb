@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit user</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit user</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text" name="name" required value="{{ $user->name }}">
                    </div>
                    <br>
                    <br>
                    <div>
                        <label for="crud-form-1" class="form-label">Email</label>
                        <input id="crud-form-1" type="email" class="form-control w-full" placeholder="Input text" name="email" required value="{{ $user->email }}">
                    </div>
                    <br>
                    <br>
                    <div>
                        <label for="crud-form-1" class="form-label">Password</label>
                        <input id="crud-form-1" type="password" class="form-control w-full" placeholder="Input text" name="password" >
                    </div>
                    <br>
                    <br>
                    <div>
                        <label for="crud-form-1" class="form-label">Confirm password</label>
                        <input id="crud-form-1" type="password" class="form-control w-full" placeholder="Input text" name="password_confirmation" >
                    </div>
                    <br>
                    <br>


                    <div class="preview">
                            <div class="fallback">
                                <label class="form-label">Photo</label>
                                <br>
                                <input name="photo" type="file"/>
                            </div>
                    </div>

                    <div class="text-right mt-5">
                        <a href="{{ route('user.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
