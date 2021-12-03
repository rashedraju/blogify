<x-dropdown title="{{ isset($currentCategory) ? ucfirst($currentCategory->name) : 'Category'}}">
    @foreach($categories as $category)
        <x-dropdown-item title="{{$category->name}}" link="/?categories={{$category->slug}}" active="{{isset($currentCategory) && $currentCategory->is($category)}}" />
    @endforeach
</x-dropdown>
