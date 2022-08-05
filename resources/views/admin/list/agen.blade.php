<div class="modal fade amount-agen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3>List Agen</h3>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Join On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1
                            @endphp
                            @forelse ($amount->where('type', 'Agen')->where('status', 1) as $row)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{!! !empty($row->join_on) ? date('d, M, Y', strtotime($row->join_on)) : "Belum Diatur" !!}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center font-semibold text-lg" colspan="3">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
