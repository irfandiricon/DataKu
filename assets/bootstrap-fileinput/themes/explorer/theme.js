/*!
 * bootstrap-fileinput v5.1.3
 * http://plugins.krajee.com/file-input
 *
 * Krajee Explorer theme configuration for bootstrap-fileinput. Load this theme file after loading `fileinput.js`.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2020, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function ($) {
    "use strict";
    $.fn.fileinputThemes.explorer = {
        layoutTemplates: {
            footer: '<div class="file-details-cell">' +
                '<div class="explorer-caption" title="{caption}">{caption}</div> ' + '{size}{progress}' +
                '</div>' +
                '<div class="file-actions-cell">{indicator} {actions}</div>',
            actions: '{drag}\n' +
                '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {download} {delete} {zoom} {other} ' +
                '    </div>\n' +
                '</div>',
        },
        previewSettings: {
            html: {width: "100px", height: "60px"},
            text: {width: "100px", height: "60px"},
            video: {width: "auto", height: "60px"},
            audio: {width: "auto", height: "60px"},
            flash: {width: "100%", height: "60px"},
            object: {width: "100%", height: "60px"},
            pdf: {width: "100px", height: "60px"},
            other: {width: "100%", height: "60px"}
        },
        frameClass: 'explorer-frame'
    };
})(window.jQuery);
 a maximum of <b>{m}</b> files (<b>{n}</b> files detected).',
        msgFileNotFound: '文件 "{name}" 未找到!',
        msgFileSecured: '安全限制，为了防止读取文件 "{name}".',
        msgFileNotReadable: '文件 "{name}" 不可读.',
        msgFilePreviewAborted: '取消 "{name}" 的预览.',
        msgFilePreviewError: '读取 "{name}" 时出现了一个错误.',
        msgInvalidFileName: '文件名 "{name}" 包含非法字符.',
        msgInvalidFileType: '不正确的类型 "{name}". 只支持 "{types}" 类型的文件.',
        msgInvalidFileExtension: '不正确的文件扩展名 "{name}". 只支持 "{extensions}" 的文件扩展名.',
        msgFileTypes: {
            'image': 'image',
            'html': 'HTML',
            'text': 'text',
            'video': 'video',
            'audio': 'audio',
            'flash': 'flash',
            'pdf': 'PDF',
            'object': 'object'
        },
        msgUploadAborted: '该文件上传被中止',
        msgUploadThreshold: '处理中 &hellip;',
        msgUploadBegin: '正在初始化 &hellip;',
        msgUploadEnd: '完成',
        msgUploadResume: 'Resuming upload &hellip;',
        msgUploadEmpty: '无效的文件上传.',
        msgUploadError: 'Upload Error',
        msgDeleteError: 'Delete Error',
        msgProgressError: '上传出错',
        msgValidationError: '验证错误',
        msgLoading: '加载第 {index} 文件 共 {files} &hellip;',
        msgProgress: '加载第 {index} 文件 共 {files} - {name} - {percent}% 完成.',
        msgSelected: '{n} {files} 选中',
        msgFoldersNotAllowed: '只支持拖拽文件! 跳过 {n} 拖拽的文件夹.',
        msgImageWidthSmall: '图像文件的"{name}"的宽度必须是至少{size}像素.',
        msgImageHeightSmall: '图像文件的"{name}"的高度必须至少为{size}像素.',
        msgImageWidthLarge: '图像文件"{name}"的宽度不能超过{size}像素.',
        msgImageHeightLarge: '图像文件"{name}"的高度不能超过{size}像素.',
        msgImageResizeError: '无法获取的图像尺寸调整。',
        msgImageResizeException: '调整图像大小时发生错误。<pre>{errors}</pre>',
        msgAjaxError: '{operation} 发生错误. 请重试!',
        msgAjaxProgressError: '{operation} 失败',
        msgDuplicateFile: 'File "{name}" of same size "{size} KB" has already been selected earlier. Skipping duplicate selection.',
        msgResumableUploadRetriesExceeded:  'Upload aborted beyond <b>{max}</b> retries for file <b>{file}</b>! Error Details: <pre>{error}</pre>',
        msgPendingTime: '{time} remaining',
        msgCalculatingTime: 'calculating time remaining',
        ajaxOperations: {
            deleteThumb: '删除文件',
            uploadThumb: '上传文件',
            uploadBatch: '批量上传',
            uploadExtra: '表单数据上传'
        },
        dropZoneTitle: '拖拽文件到这里 &hellip;<br>支持多文件同时上传',
        dropZoneClickTitle: '<br>(或点击{files}按钮选择文件)',
        fileActionSettings: {
            removeTitle: '删除文件',
            uploadTitle: '上传文件',
            downloadTitle: '下载文件',
            uploadRetryTitle: '重试',
            zoomTitle: '查看详情',
            dragTitle: '移动 / 重置',
            indicatorNewTitle: '没有上传',
            indicatorSuccessTitle: '上传',
            indicatorErrorTitle: '上传错误',
            indicatorPausedTitle: 'Upload Paused',
            indicatorLoadingTitle:  '上传 &hellip;'
        },
        previewZoomButtonTitles: {
            prev: '预览上一个文件',
            next: '预览下一个文件',
            toggleheader: '缩放',
            fullscreen: '全屏',
            borderless: '无边界模式',
            close: '关闭当前预览'
        }
    };
})(window.jQuery);
