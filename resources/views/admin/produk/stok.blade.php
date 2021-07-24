@foreach ($member as $row)
    <div class="modal fade" id="staticBackdrop{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $row->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($row->member as $rows)
                                    <tr>
                                        <td>{{ $rows->product->name }}</td>
                                        <td>
                                            @if ($rows->product->type == 0)
                                                <span class="badge badge-success">Paket</span>
                                            @else
                                                <span class="badge badge-primary">Ecer</span>
                                            @endif
                                        </td>
                                        <td>{{ $rows->stok }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">Data Masih Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
