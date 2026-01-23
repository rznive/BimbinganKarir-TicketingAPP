<div class="drawer-side is-drawer-close:overflow-visible ">
    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="flex min-h-full flex-col items-start bg-base-200 w-64 is-drawer-close:w-14 is-drawer-open:w-80">
        <div class="w-full flex items-center justify-center p-4">
            <img src="{{ asset('assets/images/logo_bengkod.svg') }}" alt="Logo">
        </div>

        <!-- Sidebar content here -->
        <ul class="menu w-full grow gap-1">
            <!-- Dashboard Item -->
            <li class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                    data-tip="Dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M6 19h3v-5h6v5h3v-9l-6-4.5L6 10z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Dashboard</span>
                </a>
            </li>

            <!-- Kategori item -->
            <li class="{{ request()->routeIs('admin.categories.*') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.categories.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Kategori">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 6a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Kategori</span>
                </a>
            </li>

            <!-- Event item -->
            <li class="{{ request()->routeIs('admin.events.*') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.events.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Event">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7 2v2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Event</span>
                </a>
            </li>

            <!-- Payment item -->
            <li class="{{ request()->routeIs('admin.payments.*') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.payments.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Payment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2H2zm0 4h20v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Pembayaran</span>
                </a>
            </li>

            <!-- Kategori Tiket -->
            <li class="{{ request()->routeIs('admin.ticket_types.*') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.ticket_types.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Ticket">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4 5h16v4a2 2 0 0 0 0 4v4H4v-4a2 2 0 0 0 0-4z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Manajemen Tiket</span>
                </a>
            </li>

            <!-- History item -->
            <li class="{{ request()->routeIs('admin.histories.*') ? 'bg-gray-200 rounded-lg' : '' }}">
                <a href="{{ route('admin.histories.index') }}"
                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="History">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10h-2a8 8 0 1 1-8-8v3l4-4l-4-4z" />
                    </svg>
                    <span class="is-drawer-close:hidden">History Pembelian</span>
                </a>
            </li>
        </ul>

        <!-- logout -->
        <div class="w-full p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="btn btn-outline btn-error w-full is-drawer-close:tooltip is-drawer-close:tooltip-right"
                    data-tip="Logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M10 17v-2h4v-2h-4v-2l-5 3l5 3m9-12H5v14h14v-3h2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v3h-2z" />
                    </svg>
                    <span class="is-drawer-close:hidden">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
