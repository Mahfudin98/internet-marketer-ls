@foreach ($points as $row)
    <div class="modal fade" id="point{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="pointLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('point-update', $row->sosmeds[0]->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pointLabel">{{ $row->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="point">Update Point {{ $row->name }}</label>
                            <input type="number" class="form-control" name="point" id="point"
                                value="{{ $row->sosmeds[0]->point }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
