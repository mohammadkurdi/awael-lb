@extends('../layout/' . $layout)

@section('head')
    <title>Error</title>
@endsection

@section('content')
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Rubick Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-medium"></div>
                <div class="intro-x text-xl lg:text-3xl font-medium mt-5">Oops. something went wrong.</div>
                <div class="intro-x text-lg mt-3">Please make sure you not doing something stupid.</div>
                <a href= "/" ><button class="intro-x btn py-3 px-4 text-white border-white dark:border-dark-5 dark:text-gray-300 mt-10">Back to Home</button></a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
@endsection
