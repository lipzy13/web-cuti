<div id="sideNav" class=" bg-[#FAFAFA] pe-16  rounded-none border-none fixed h-screen">
    <h1 class="text-4xl font-bold ps-7 pt-20">Dash<br/>board</h1>
    <div class="p-4 mt-4 space-y-4">
        <a href="/admin" aria-label="dashboard"
            class="relative px-4 py-0.5 flex items-center space-x-4 {{ request()->is('admin') ? 'text-gray-950' : 'text-gray-500' }} ">
            <x-gmdi-home class="w-6"/>
            <span class="-mr-1 font-medium">Beranda</span>
        </a>

        <a href="/admin/riwayat" class="px-4 py-0.5 flex items-center space-x-4  {{ request()->is('admin/riwayat') ? 'text-gray-950' : 'text-gray-500' }} group">
            <x-gmdi-date-range class="w-6"/>
            <span>Riwayat</span>
        </a>
        <a href="/admin/cuti-khusus" class="px-4 py-0.5 flex items-center space-x-4  {{ request()->is('admin/cuti-khusus') ? 'text-gray-950' : 'text-gray-500' }} group">
            <x-gmdi-star class="w-6"/>
            <span>Cuti Khusus</span>
        </a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="px-4 py-0.5 mt-64 flex items-center space-x-4 group">
                Logout </button>
        </form>
    </div>
</div>
