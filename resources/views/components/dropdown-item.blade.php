@props(['link' => '/', 'title' => '', 'active' => false])
<a href="{{$link}}&{{http_build_query(request()->except('categories'))}}" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{$active ? 'bg-blue-500' : ''}}">{{ucfirst($title)}}</a>
