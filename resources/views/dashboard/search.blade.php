@extends('../layout/' . $layout)

@section('subhead')
    <title>Search Results</title>
@endsection

@section('subcontent')

<h1 class="intro-y text-lg font-medium mt-10">Search Results</h1>

<h3 class="intro-y text-lg font-medium mt-10">Products</h3>

<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            @php
                $i=0;
            @endphp
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Name</th>
                <th class="whitespace-nowrap">Category</th>
                <th class="whitespace-nowrap">Subcategory</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class="intro-x">
                    <td class="w-40">
                        {{ ++$i }}
                    </td>

                    <td>
                        <a href="{{ route('item.show',$item->id) }}" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                    </td>
                    <td>
                        <a class="font-medium whitespace-nowrap">{{ $item->Subcategory->name }}</a>
                    </td>
                    <td>
                        <a class="font-medium whitespace-nowrap">{{ $item->Subcategory->category->name }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
