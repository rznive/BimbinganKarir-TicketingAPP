<x-layouts.admin title="Detail Event">
    <div class="container mx-auto p-10">
        @if (session('success'))
            <div class="toast toast-bottom toast-center z-50">
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    document.querySelector('.toast')?.remove()
                }, 3000)
            </script>
        @endif

        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Detail Event</h2>

                <form id="eventForm" class="space-y-4">
                    <!-- EVENT DETAIL (READ ONLY) -->
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Judul Event</span></label>
                        <input type="text" class="input input-bordered w-full" value="{{ $event->judul }}"
                            disabled />
                    </div>

                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Deskripsi</span></label>
                        <textarea class="textarea textarea-bordered h-24 w-full" disabled>{{ $event->deskripsi }}</textarea>
                    </div>

                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Tanggal & Waktu</span></label>
                        <input type="datetime-local" class="input input-bordered w-full"
                            value="{{ $event->tanggal_waktu->format('Y-m-d\TH:i') }}" disabled />
                    </div>

                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Lokasi</span></label>
                        <input type="text" class="input input-bordered w-full" value="{{ $event->lokasi->nama_lokasi }}"
                            disabled />
                    </div>
                </form>
            </div>
        </div>

        {{-- LIST TICKET --}}
        <div class="mt-10">
            <div class="flex">
                <h1 class="text-3xl font-semibold mb-4">List Ticket</h1>
                <button onclick="add_ticket_modal.showModal()" class="btn btn-primary ml-auto">Tambah Ticket</button>
            </div>

            <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Ticket</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $index => $ticket)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $ticket->ticketType->name ?? '-' }}</td>
                                <td>{{ $ticket->harga }}</td>
                                <td>{{ $ticket->stok }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="openEditModal(this)"
                                        data-id="{{ $ticket->id }}"
                                        data-ticket-type-id="{{ $ticket->ticket_type_id }}"
                                        data-harga="{{ $ticket->harga }}"
                                        data-stok="{{ $ticket->stok }}">Edit</button>

                                    <button class="btn btn-sm bg-red-500 text-white" onclick="openDeleteModal(this)"
                                        data-id="{{ $ticket->id }}">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada ticket tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ADD TICKET MODAL --}}
    <dialog id="add_ticket_modal" class="modal">
        <form method="POST" action="{{ route('admin.tickets.store') }}" class="modal-box">
            @csrf
            <h3 class="text-lg font-bold mb-4">Tambah Ticket</h3>

            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Tipe Ticket</span></label>
                <select name="ticket_type_id" class="select select-bordered w-full" required>
                    <option value="" disabled selected>Pilih Tipe Ticket</option>
                    @foreach ($ticketTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Harga</span></label>
                <input type="number" name="harga" class="input input-bordered w-full" required />
            </div>

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Stok</span></label>
                <input type="number" name="stok" class="input input-bordered w-full" required />
            </div>

            <div class="modal-action">
                <button class="btn btn-primary">Tambah</button>
                <button class="btn" type="reset" onclick="add_ticket_modal.close()">Batal</button>
            </div>
        </form>
    </dialog>

    {{-- EDIT TICKET MODAL --}}
    <dialog id="edit_ticket_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit_ticket_id">

            <h3 class="text-lg font-bold mb-4">Edit Ticket</h3>

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Tipe Ticket</span></label>
                <select name="ticket_type_id" id="edit_ticket_type_id" class="select select-bordered w-full" required>
                    @foreach ($ticketTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Harga</span></label>
                <input type="number" name="harga" id="edit_harga" class="input input-bordered w-full" required />
            </div>

            <div class="form-control mb-4">
                <label class="label"><span class="label-text font-semibold">Stok</span></label>
                <input type="number" name="stok" id="edit_stok" class="input input-bordered w-full" required />
            </div>

            <div class="modal-action">
                <button class="btn btn-primary">Simpan</button>
                <button class="btn" type="reset" onclick="edit_ticket_modal.close()">Batal</button>
            </div>
        </form>
    </dialog>

    {{-- DELETE MODAL --}}
    <dialog id="delete_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <h3 class="text-lg font-bold mb-4">Hapus Ticket</h3>
            <p>Yakin ingin menghapus ticket ini?</p>

            <div class="modal-action">
                <button class="btn btn-primary">Hapus</button>
                <button class="btn" type="reset" onclick="delete_modal.close()">Batal</button>
            </div>
        </form>
    </dialog>

    <script>
        function openDeleteModal(button) {
            const id = button.dataset.id
            const form = document.querySelector('#delete_modal form')
            form.action = `/admin/tickets/${id}`
            delete_modal.showModal()
        }

        function openEditModal(button) {
            const id = button.dataset.id
            const ticketTypeId = button.dataset.ticketTypeId
            const harga = button.dataset.harga
            const stok = button.dataset.stok

            const form = document.querySelector('#edit_ticket_modal form')
            document.getElementById('edit_ticket_type_id').value = ticketTypeId
            document.getElementById('edit_harga').value = harga
            document.getElementById('edit_stok').value = stok

            form.action = `/admin/tickets/${id}`
            edit_ticket_modal.showModal()
        }
    </script>
</x-layouts.admin>
