<div class="modal fade" id="topic-document-modal" tabindex="-1" role="dialog" aria-labelledby="create-topic-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="create-topic-label">
                    Thêm mới chủ đề
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="create-topic-document" novalidate enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên chủ đề<code>*</code></label>
                        <input type="text" class="form-control" placeholder="Tên chủ đề" name="name"
                            value="{{ old('name') }}">
                        <p>
                            <small id="name-msg-err" class="text-danger">
                            </small>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái<code>*</code></label>
                        <div class="widget-body">
                            <div class="ui-select-wrapper form-group">
                                <select class="form-control" id="status" name="status">
                                    @foreach (\App\Models\TopicDocument::STATUS as $key => $status)
                                        <option value="{{ $key }}"
                                            {{ old('status') == $key ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                <p>
                                    <small id="status-msg-err" class="text-danger">
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="button-submit">
                        <i class="fa fa-floppy-o mr-1"></i>
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
