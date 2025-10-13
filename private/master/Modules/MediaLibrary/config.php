<?php

return [
    'active' => true,
    
    'register' => [
        'registerAdminWebRoutes' => function($module) {
            Route::get('/', $module->getClassname('Controllers\AdminController', 'showDirectory'))->name('index');
            
            Route::post('/directory/create', $module->getClassname('Controllers\AdminController', 'createDirectory'))->name('createDirectory');
            Route::post('/directory/move-dialog', $module->getClassname('Controllers\AdminController', 'showDirectoryMoveDialog'))->name('showDirectoryMoveDialog');
            Route::get('/directory/{id}', $module->getClassname('Controllers\AdminController', 'showDirectory'))->name('showDirectory');
            Route::get('/directory/{id}/content/', $module->getClassname('Controllers\AdminController', 'showDirectoryContent'))->name('showDirectoryContent');
            Route::post('/directory/{id}/rename', $module->getClassname('Controllers\AdminController', 'renameDirectory'))->name('renameDirectory');
            Route::post('/directory/{id}/move', $module->getClassname('Controllers\AdminController', 'moveDirectory'))->name('moveDirectory');
            Route::delete('/directory/{id}', $module->getClassname('Controllers\AdminController', 'destroyDirectory'))->name('destroyDirectory');

            Route::post('/file/upload', $module->getClassname('Controllers\AdminController', 'uploadFile'))->name('uploadFile');
            Route::post('/file/order', $module->getClassname('Controllers\AdminController', 'orderFiles'))->name('orderFiles');
            Route::post('/file/refresh', $module->getClassname('Controllers\AdminController', 'refreshFiles'))->name('refreshFiles');

            Route::get('/file/{id}/details', $module->getClassname('Controllers\AdminController', 'showFileDetails'))->name('showFileDetails');
            Route::post('/file/{id}/rename', $module->getClassname('Controllers\AdminController', 'renameFile'))->name('renameFile');
            Route::post('/file/{id}/move', $module->getClassname('Controllers\AdminController', 'moveFile'))->name('moveFile');
            Route::post('/file/{id}/rotate', $module->getClassname('Controllers\AdminController', 'rotateFile'))->name('rotateFile');
            Route::post('/file/{id}/edit-image', $module->getClassname('Controllers\AdminController', 'editImage'))->name('editImage');
            Route::patch('/file/{id}/edit-image', $module->getClassname('Controllers\AdminController', 'saveImage'))->name('saveImage');
            Route::delete('/file/{id}', $module->getClassname('Controllers\AdminController', 'destroyFile'))->name('destroyFile');
            Route::get('/file/{id}/download', $module->getClassname('Controllers\AdminController', 'downloadFile'))->name('downloadFile');

        }
    ]
];