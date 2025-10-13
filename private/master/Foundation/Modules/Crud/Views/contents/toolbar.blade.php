<div class="row">
    <div class="col-12 text-right">
        <div class="btn-group" role="group">
            <button id="btnContents__{{ $lang }}" type="button" class="btn btn-primary font-weight-bold dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __("admin::label.add_content") }}
            </button>
            <div class="dropdown-menu" aria-labelledby="btnContents__{{ $lang }}">
                <a class="dropdown-item" data-admin-add-content='{"type":"title","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.title")) !!}</a>
                <a class="dropdown-item" data-admin-add-content='{"type":"text","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.text")) !!}</a>
                <a class="dropdown-item" data-admin-add-content='{"type":"article","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.article")) !!}</a>
                <a class="dropdown-item" data-admin-add-content='{"type":"gallery","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.gallery")) !!}</a>
                <a class="dropdown-item" data-admin-add-content='{"type":"attachments","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.attachments")) !!}</a>
                <a class="dropdown-item" data-admin-add-content='{"type":"video_embed","lang":"{{ $lang }}","viewsModuleName":"{{ $viewsModuleName }}","moduleName":"{{ $moduleName }}","model_id":"{{ $model_id }}"}' href="#">{!! nl2br(__("admin::contents.video_embed")) !!}</a>
            </div>
        </div>
    </div>
</div>