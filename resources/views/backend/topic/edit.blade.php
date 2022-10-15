<div class="modal fade" id="update-topic-modal" tabindex="-1" role="dialog" aria-labelledby="update-topic-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="update-topic-label">
                    Chỉnh sửa chủ đề
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="update-topic" novalidate enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input id="id-topic" disabled type="number" class="form-control" name="id"
                            value="{{ old('id') }}">
                    </div>
                    <div class="form-group">
                        <label>Tên chủ đề<code>*</code></label>
                        <input id="name-topic" type="text" class="form-control" placeholder="Tên chủ đề" name="name"
                            value="{{ old('name') }}">
                        <p>
                            <small id="name-update-msg-err" class="text-danger">
                            </small>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Mô tả<code>*</code></label>
                        <textarea id="description-topic" class="form-control" rows="3" placeholder="Mô tả ngắn"
                            name="description">{{ old('description') }}</textarea>
                        <p>
                            <small id="description-update-msg-err" class="text-danger">
                            </small>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái<code>*</code></label>
                        <div class="widget-body">
                            <div class="ui-select-wrapper form-group">
                                <select class="form-control" id="status-topic" name="status">
                                    @foreach (\App\Models\Topic::STATUS as $key => $status)
                                        <option value="{{ $key }}"
                                            {{ old('status') == $key ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                <p>
                                    <small id="status-update-msg-err" class="text-danger">
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="widget-body">
                            <div class="image-box">
                                <input type="hidden" name="thumbnail" class="image-data">
                                <div class="preview-image-wrapper ">
                                    <img id="thumbnail-topic" src="{{ asset('assets/images/placeholder.png') }}"
                                        alt="Preview image" class="preview_image" width="150">
                                    <a class="btn_remove_image" title="Remove image">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                                <div class="image-box-actions">
                                    <input type="file" accept="image/png, image/gif, image/jpeg"
                                        class="btn_gallery d-none" name="thumbnail">
                                    <p>
                                        <small id="thumbnail-update-msg-err" class="text-danger">
                                        </small>
                                    </p>
                                </div>
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
