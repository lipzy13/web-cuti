<div id="sideNav" class=" bg-[#FAFAFA] w-1/6 rounded-none border-none">
    <h1 class="text-4xl font-bold ps-7 pt-20">Dash<br/>board</h1>
    <div class="p-4 mt-4">
        <a href="/dashboard" aria-label="dashboard"
            class="relative px-4 py-3 flex items-center space-x-4 text-gray-950 ">
            <x-gmdi-home class="w-6"/>
            <span class="-mr-1 font-medium">Beranda</span>
        </a>

        <a href="/dashboard/create" class="px-4 py-0.5 my-4 flex items-center space-x-4  text-gray-500 group">
            <x-gmdi-date-range class="w-6"/>
            <span>Pengajuan</span>
        </a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="px-4 py-0.5 mt-64 flex items-center space-x-4  text-gray-500 group">
                Logout </button>
        </form>       
    </div>
</div>