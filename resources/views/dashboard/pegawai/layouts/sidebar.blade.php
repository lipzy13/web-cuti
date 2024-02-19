<?php
    use App\Models\Kontrak;
?>

<div id="sideNav" class=" bg-[#FAFAFA] pe-16 rounded-none border-none fixed h-screen ">
    <h1 class="text-4xl font-bold ps-7 pt-20">Dash<br/>board</h1>
    <div class="p-4 mt-4">
        <a href="/dashboard" aria-label="dashboard"
            class="relative px-4 py-3 flex items-center space-x-4 {{ request()->is('dashboard') ? 'text-gray-950' : 'text-gray-500' }} ">
            <x-gmdi-home class="w-6"/>
            <span class="-mr-1 font-medium">Beranda</span>
        </a>
        @if( Kontrak::where('user_id', auth()->user()->id)->where('aktif', true)->first() )
        <button data-hs-overlay="#hs-sign-out-alert" class="px-4 py-0.5 my-4 flex items-center space-x-4 {{ request()->is('dashboard/create') ? 'text-gray-950' : 'text-gray-500' }} group">
            <x-gmdi-date-range class="w-6"/>
            <span>Pengajuan</span>
        </button>
        @else
        <button class="px-4 py-0.5 my-4 flex items-center space-x-4 group text-gray-500" data-hs-overlay="#hs-task-created-alert">
            <x-gmdi-date-range class="w-6"/>
            <span>Pengajuan</span>
        </button>
        @endif
        <div class="mt-64">
            <a href="/dashboard/profil" aria-label="dashboard"
               class="relative px-4 py-3 flex items-center space-x-4 {{ request()->is('dashboard/profil') ? 'text-gray-950' : 'text-gray-500' }}">
                <span class="-mr-1 font-medium">Profil</span>
            </a>
        </div>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" onclick="return confirm('Yakin ingin logout? ')" class="px-4 py-0.5 flex items-center space-x-4  text-gray-500 group">
                Logout </button>
        </form>
    </div>
</div>
