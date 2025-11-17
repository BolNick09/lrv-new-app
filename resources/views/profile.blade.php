<x-main-layout>
    <x-slot:title>Профиль</x-slot>

    <h1>Профиль</h1>
    <h2>{{$user->name}}</h2>
    <div>{{$profile->telegram}}</div>
    <div>{{$profile->phone}}</div>
    <div>{{$profile->vk}}</div>

    <h2>Статьи</h2>
    @forelse ($posts as $post)
    <h3>{{$post->title}}</h3>
    <div>{{$post->content}}</div>
    @empty
        <div>У вас нет постов</div>
    @endforelse

</x-main-layout>