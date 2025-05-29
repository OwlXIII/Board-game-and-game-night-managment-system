@props(['open'])

<div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden bg-slate-700">
    <x-mobile.links />
    <x-mobile.language-switcher />

    @auth
        <x-mobile.user />
    @endauth

    @guest
        <x-mobile.guest />
    @endguest
</div>
