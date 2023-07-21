let headerInit = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};
if (typeof profile === 'object') {
    headerInit["Api-Token"] = profile.api_token;
};
$.ajaxSetup({
    headers: headerInit
});

const DataTableInit = {
    cache: false,
    scrollY: '55vh',
    scrollCollapse: true,
    scrollX: true,
    autoWidth: false,
    language: {
        "search": "Tìm kiếm ",
        "searchPlaceholder": "nhập từ khóa...",
        "sLengthMenu": "Xem _MENU_ mục",
        "paginate": {
            "next": '<i class="ri-arrow-right-s-line"></i>', // or '→'
            "previous": '<i class="ri-arrow-left-s-line"></i>' // or '←' 
        },
        "sProcessing": "Đang xử lý...",
        "emptyTable": "Không tìm thấy dòng nào phù hợp",
        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix": "",
        "sUrl": "",

    },
    lengthMenu: [
        [5, 10, 15, 50, 100, 200, 500, 1000, 5000, -1],
        [5, 10, 15, 50, 100, 200, 500, 1000, 5000, 'All']
    ],
    "drawCallback": function () {
        $('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple');
    }
};

const formatDate = function (date) {
    return moment(date).format("YYYY-MM-DD HH:mm:ss")
}

const formatNumber = function (nStr, decSeperate = ".", groupSeperate = ",") {
    nStr += "";
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + groupSeperate + "$2");
    }
    return x1 + x2;
}

const swal = function (text, type = null) {
    var color;
    var icon;
    switch (type) {
        case 'success':
            color = 'success';
            icon = 'ri-check-double-line';
            break;
        case 'error':
            color = 'danger';
            icon = 'ri-close-circle-fill';
            break;
        case 'info':
            color = 'info';
            icon = 'ri-information-line';
            break;
        case 'warning':
            color = 'warning';
            icon = 'ri-error-warning-fill';
            break;
        default:
            color = 'dark';
            icon = 'ri-notification-line';
            break;
    }
    return Swal.fire({
        html:
            `<div class="avatar avatar-icon avatar-soft-${color} mb-3"><span class="initial-wrap rounded-8"><i class="${icon}"></i></span></div>
        <div>
            <h4>${text}</h4>
        </div>`,
        customClass: {
            container: 'swal2-has-footer',
            content: 'p-0',
            confirmButton: 'btn btn-primary btn-block btn-lg mb-5',
        },
        confirmButtonText: 'Tôi đã hiểu',
        buttonsStyling: false,
    });
}

const swalConfirm = function (text,type="error") {
    var color;
    var icon;
    switch (type) {
        case 'success':
            color = 'success';
            icon = 'ri-check-double-line';
            break;
        case 'error':
            color = 'danger';
            icon = 'ri-close-circle-fill';
            break;
        case 'info':
            color = 'info';
            icon = 'ri-information-line';
            break;
        case 'warning':
            color = 'warning';
            icon = 'ri-error-warning-fill';
            break;
        default:
            color = 'dark';
            icon = 'ri-notification-line';
            break;
    }
    return new Promise((resolve, reject) => {
        Swal.fire({
            html:
                `<div class="avatar avatar-icon avatar-soft-${color} mb-3"><span class="initial-wrap rounded-8"><i class="${icon}"></i></span></div>
        <div>
            <h4>Thông báo xác nhận!</h4>
            <p>${text}</p>
        </div>`,
            customClass: {
                confirmButton: 'btn btn-outline-secondary text-success',
                cancelButton: 'btn btn-outline-secondary text-danger',
                container: 'swal2-has-bg',
                content: 'bg-transparent border-bottom text-center',
            },
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            },
            showCancelButton: true,
            buttonsStyling: false,
            showCloseButton: true,
            confirmButtonText: 'Tôi đồng ý',
            cancelButtonText: 'Đóng',
            reverseButtons: true,
        }).then((result) => {
            return resolve(result.value);
        })
    });
}

const coppy = function (element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    swal("Sao chép thành công", "success");
};

const sleep = function (ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

const waitButtonNoText = function (elm, type, text = null) {
    if (type == true) {
        $(elm).attr('disabled', true).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="sr-only">Loading...</span>`);
    } else {
        $(elm).attr('disabled', false).html(text);
    }
}

const waitButton = function (elm, type, text = null) {
    if (type == true) {
        $(elm).attr('disabled', true).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="sr-only">Loading...</span> Đang xử lý...`);
    } else {
        $(elm).attr('disabled', false).html(text);
    }
}

const isURL = function (str) {
    var regex =
        /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    var pattern = new RegExp(regex);
    return pattern.test(str);
}

const resetReaction = function (server = null) {
    let reactions = $('[name=reaction]');
    let shows = server.attr('reaction-show');
    shows = !shows ? [] : shows.split(',');
    $.each(reactions, function(index, reaction) {
        let elm = $(reaction).parent().parent();
        if (!server.val() || !shows.length) {
            elm.show();
        } else {
            if (shows.indexOf($(reaction).val()) >= 0) {
                elm.show();
            } else {
                elm.hide();
            }
        }
    });
}

const serverOrder = function (server_order) {
    return `<span class="badge bg-primary bg-sm bg-dim">Server ${server_order}</span>`;
}

const openLinkNewTab = function (link,text=null) {
    return `<a href="${link}" target="_blank" rel="noopener noreferrer">${text || link}</a>`;
    // return `<input value="${text || link}" class="form-control form-control-sm" readonly style="width: 150px" onclick="window.open('${link}','_blank');">`
}

const showDetailServer = function (server_order) {
    $('.detailServer').remove();
    let elm = server_order.parent().parent();
    if (elm) {
        let detail = server_order.attr('detail');
        $(elm).append(`<div class="alert bg-warning text-white detailServer mt-2 mb-2" role="alert">
        - <b>${detail}</b></div>`);
    }
}

const speGetIdproduct = function (elm) {
    $("#buy").prop("disabled", true);
    setTimeout(() => {
        let link = $("[name=" + elm + "]").val();
        if (!isURL(link)) {
            $("#buy").prop("disabled", false);
            return;
        }
        $("[name=" + elm + "]")
            .prop("disabled", true)
            .val("Đang xử lý");
        // remove query
        if (link.indexOf("?") !== -1) {
            const linkArr = link.split("?");
            minimizedLink = linkArr[0];
        } else {
            minimizedLink = link;
        }
        var id_product = '';
        var id_shop = '';
        // trường hợp link có dạng https://shopee.vn/product/:shopId/:productId
        if (minimizedLink.indexOf("https://shopee.vn/product/") !== -1) {
            const minimizedLinkSplitted = minimizedLink.split("https://shopee.vn/product/");
            id_product = minimizedLinkSplitted[1].split("/")[1];
            id_shop = minimizedLinkSplitted[1].split("/")[0];
        }
        // trường hợp link có dạng https://shopee.vn/:tên-sản-phẩm.shopId.productId
        else {
            const minimizedLinkSplitted = minimizedLink.split(".");
            id_product = minimizedLinkSplitted[minimizedLinkSplitted.length - 1]
            id_shop = minimizedLinkSplitted[minimizedLinkSplitted.length - 2];
        }
        if (id_product && id_shop) {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val(link);
            $("[name=id_product]")
                .prop("disabled", false)
                .val(id_product);
            $("[name=id_shop]")
                .prop("disabled", false)
                .val(id_shop);
        } else {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val("");
        }
        $("#buy").prop("disabled", false);
    }, 100);

}

const speGetUsername = function (elm) {
    $("#buy").prop("disabled", true);
    setTimeout(() => {
        let link = $("[name=" + elm + "]").val();
        if (!isURL(link)) {
            $("#buy").prop("disabled", false);
            return;
        }
        $("[name=" + elm + "]")
            .prop("disabled", true)
            .val("Đang xử lý");
        var username = link.toString().match(/shopee\.vn\/([\w_+\-.]+)/);
        if (username) {
            username = username[1];
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val(username);
        } else {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val("");
        }
        $("#buy").prop("disabled", false);
    }, 100);
}

const igGetUsername = function (elm) {
    $("#buy").prop("disabled", true);
    setTimeout(() => {
        let link = $("[name=" + elm + "]").val();
        if (!isURL(link)) {
            $("#buy").prop("disabled", false);
            return;
        }
        $("[name=" + elm + "]")
            .prop("disabled", true)
            .val("Đang xử lý");
        let username = link["match"](/instagram.com\/([a-zA-Z0-9_.-]+)/);
        if (username) {
            username = username[1];
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val(username);
        } else {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val("");
        }
        $("#buy").prop("disabled", false);
    }, 100);
}

const ttGetUsername = function (elm) {
    $("#buy").prop("disabled", true);
    setTimeout(() => {
        let link = $("[name=" + elm + "]").val();
        if (!isURL(link)) {
            $("#buy").prop("disabled", false);
            return;
        }
        $("[name=" + elm + "]")
            .prop("disabled", true)
            .val("Đang xử lý");
        let username = link["match"](/tiktok.com\/@([a-zA-Z0-9_.-]+)/);
        if (username) {
            username = username[1];
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val(username);
        } else {
            $("[name=" + elm + "]")
                .prop("disabled", false)
                .val("");
        }
        $("#buy").prop("disabled", false);
    }, 100);
}


const getUID = function (elm) {
    $('#buy').prop("disabled", true);
    setTimeout(() => {
        let selectElm = $('[name=' + elm + ']');
        let attr_fullname = $(selectElm).attr('attr-fullname');
        let link = selectElm.val();
        if (!isURL(link) && !attr_fullname) {
            $('#buy').prop("disabled", false);
            return;
        }
        selectElm.prop("disabled", true).val('Đang xử lý');
        $.ajax({
            type: "GET",
            url: API_GET_UID_FB,
            data: {
                link: attr_fullname && !isURL(link) ? `https://www.facebook.com/${link}` : link
            },
            dataType: "json",
            success: function (response) {
                if (response.status === true) {
                    selectElm.prop("disabled", false).val(response.data.idfb);
                    if (attr_fullname) {
                        $(attr_fullname).val(response.data.fullname ? response.data.fullname : 'Không xác định');
                    }
                } else {
                    selectElm.prop("disabled", false).val('');
                }
                $('#buy').prop("disabled", false);
            }
        });
    }, 100);
}


$(document).ready(function () {
    tinymce.init({
        selector: 'textarea[tinymce=true]',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
        },
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    // $(".select2").select2();
    $("form[submit-ajax=true]").submit(async function (e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let url_redirect = $(_this).attr("url_redirect");
        let data = $(_this).serialize();
        let button = $(_this).find('button[type=submit]');
        let oldTextButton = button.html();
        let confirm_order = $(_this).attr("confirm_order");
        if (confirm_order) {
            let isConfirmOrder = await swalConfirm('Bạn có muốn thanh toán đơn hàng?, chúng tôi sẽ không hoàn tiền với đơn đã thanh toán.');
            if (!isConfirmOrder) return;
        }
        let option = {
            type: method,
            url: url,
            data: data,
            dataType: "json",
        };
        option.beforeSend = function () {
            waitButton(button, true);
        };
        option.complete = function () {
            waitButton(button, false, oldTextButton);
        };
        option.success = async function (response) {
            if ($(_this).attr("callback_function")) {
                window[$(_this).attr("callback_function")](response);
            }
            swal(response.message, response.status === true ? 'success' : 'error');
            if (response.status) {
                if (url_redirect) {
                    if (url_redirect == 'reloadListOrder') {
                        tableListOrder();
                        $('.modal').modal('hide');
                        return;
                    }
                    await sleep(2000);
                    if (url_redirect == 'reload') {
                        return window.location.reload();
                    }
                    return window.location.href = url_redirect;
                }
                if (confirm_order) {
                    $(_this).trigger('reset');
                    $('.detailServer').remove();
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(_this).offset().top - 300
                    }, 500);
                }
                return;
            }
        };
        $.ajax(option);
    });
});