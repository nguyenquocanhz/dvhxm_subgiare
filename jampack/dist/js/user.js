let TableOrders;
let TableLogVipLike;
let TableDiaryBotInteractive;
const tableListOrder = function () {
    let dataAjaxTableOrders = {};
    let optionTableOrders = DataTableInit;
    optionTableOrders.pageLength = 10;
    optionTableOrders.processing = true;
    optionTableOrders.serverSide = true;
    optionTableOrders.columns = tableInit.columns;
    optionTableOrders.order = [0, 'desc'];
    optionTableOrders.columnDefs = tableInit.columnDefs;
    optionTableOrders.ajax = {
        type: "POST",
        url: tableInit.url,
        data: "data",
        dataType: "json",
        data: function (form) {
            dataAjaxTableOrders.page = form.start / form.length + 1;
            dataAjaxTableOrders.limit = form.length;
            dataAjaxTableOrders.search = form.search.value;
            dataAjaxTableOrders.order = form.order[0].dir;
            dataAjaxTableOrders.sort = form.columns[form.order[0].column].data
            return dataAjaxTableOrders;
        },
        dataFilter: function (body) {
            let response = JSON.parse(body);
            if (response.status) {
                return JSON.stringify({
                    recordsTotal: response.data.total,
                    recordsFiltered: response.data.total,
                    data: response.data.items
                });
            } else {
                swal(response.message, 'error');
                return JSON.stringify({
                    recordsTotal: 0,
                    recordsFiltered: 0,
                    data: []
                });
            }
        },
        error: function (xhr, error, code) {
            return swal(`Error code: ${xhr.status}`, 'error');
        }
    }
    if (!TableOrders) {
        return TableOrders = $('#listOrders').DataTable(optionTableOrders);
    }
    return TableOrders.ajax.reload();
}

const notificationNewUpdate = function () {
    $.ajax({
        type: "GET",
        url: API_NEW_UPDATE,
        data: {},
        dataType: "json",
        success: function (response) {
            if (response.status) {
                let newUpdates = localStorage.getItem('newUpdates') ? JSON.parse(localStorage.getItem('newUpdates')) : [];
                if (newUpdates.indexOf(response.data.id) == -1) {
                    newUpdates.push(response.data.id);
                    localStorage.setItem('newUpdates', JSON.stringify(newUpdates));
                    swal(response.data.content);
                }
            }
        }
    });
}

const statusOrder = function (status) {
    var msg = "";
    switch (status) {
        case "Success":
            msg =
                '<span class="badge bg-success bg-sm bg-dim">Đã hoàn thành</span>';
            break;
        case "Pause":
            msg =
                '<span class="badge bg-danger bg-sm bg-dim">Đã hủy</span>';
            break;
        case "Report":
            msg =
                '<span class="badge bg-warning bg-sm bg-dim">Tạm dừng</span>';
            break;
        case "Refund":
            msg =
                '<span class="badge bg-dark bg-sm bg-dim">Đã hoàn tiền</span>';
            break;
        case "WaitRefund":
            msg =
                '<span class="badge bg-warning bg-sm bg-dim">Chờ hoàn tiền</span>';
            break;
        case "Waiting":
            msg =
                '<span class="badge bg-warning bg-sm bg-dim">Chờ hủy</span>';
            break;
        case "Expired":
            msg =
                '<span class="badge bg-danger bg-sm bg-dim">Đã hết hạn</span>';
            break;
        case "CookieDie":
            msg =
                '<span class="badge bg-danger bg-sm bg-dim">Cookie die</span>';
            break;
        case "ProxyError":
            msg =
                '<span class="badge bg-warning bg-sm bg-dim">Proxy lỗi</span>';
            break;
        case "Running":
            msg =
                '<span class="badge bg-success bg-sm bg-dim">Đang chạy</span>';
            break;
        default:
            msg =
                '<span class="badge bg-info bg-sm bg-dim">Đang hoạt động</span>';
            break;
    }
    return msg;
};

const btnAction = function (type, order, url = '') {
    var title;
    var icon;
    var btn;
    switch (type) {
        case 'UpdateCookie':
            title = `Cập nhật cookie #${order.code_order}`;
            icon = `<i class="fas fa-cookie"></i>`;
            btn = `warning btn-UpdateCookie`;
            break;
        case 'EditBotInteractive':
            title = `Sửa Bot #${order.code_order}`;
            icon = `<i class="fas fa-edit"></i>`;
            btn = `success btn-EditBotInteractive`;
            break;
        case 'LogVipLike':
            title = `Log VipLike #${order.code_order}`;
            icon = `<i class="fas fa-history"></i>`;
            btn = `info btn-LogVipLike`;
            break;
        case 'DiaryBotInteractive':
            title = `Nhật kí Bot #${order.code_order}`;
            icon = `<i class="fas fa-history"></i>`;
            btn = `info btn-DiaryBotInteractive`;
            break;
        case 'SpeedUpOrder':
            title = `Tăng tốc đơn #${order.code_order}`;
            icon = `<i class="fas fa-tachometer-alt"></i>`;
            btn = `success btn-SpeedUpOrder`;
            break;
        case 'CancelOrder':
            title = `Hủy đơn #${order.code_order}`;
            icon = `<i class="fas fa-trash"></i>`;
            btn = `danger btn-CancelOrder`;
            break;
        case 'CancelVip':
            title = `Hủy đơn #${order.code_order}`;
            icon = `<i class="fas fa-trash"></i>`;
            btn = `danger btn-CancelVip`;
            break;
        case 'ReportOrder':
            title = `Kích hoạt đơn #${order.code_order}`;
            icon = `<i class="fas fa-check-circle"></i>`;
            btn = `success btn-ReportOrder`;
            break;
        case 'WarrantyClaimOrder':
            title = `Yêu cầu bảo hành đơn #${order.code_order}`;
            icon = `<i class="fas fa-check-square"></i>`;
            btn = `success btn-WarrantyClaimOrder`;
            break;
        case 'DetailReportOrder':
            title = `Chi tiết lỗi đơn #${order.code_order}`;
            icon = `<i class="fas fa-info-circle"></i>`;
            btn = `info btn-DetailReportOrder`;
            break;
        default:
            break;
    }
    return `<button class="btn btn-${btn} btn-sm me-2" title="${title}" data-url="${url}" data-id="${order.id}" data-code_order="${order.code_order}">
    ${icon}
    </button>`;
};

$(document).on('click', '.btn-SpeedUpOrder', async function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    if (await swalConfirm(`Bạn có muốn tăng tốc độ đơn #${code_order} với phí ${formatNumber(speed_up_order)} coin?`)) {
        let button = `.btn-SpeedUpOrder[data-id=${id}][data-code_order=${code_order}]`;
        let oldTextButton = $(this).html();
        $.ajax({
            type: "POST",
            url,
            data: { id, code_order, action: 'speed_up' },
            dataType: "json",
            beforeSend: function () {
                waitButtonNoText(button, true);
            },
            complete: function () {
                waitButtonNoText(button, false, oldTextButton);
            },
            success: function (response) {
                swal(response.message, response.status === true ? 'success' : 'error');
                if (response.status) {
                    tableListOrder();
                }
            }
        });
    }
});

$(document).on('click', '.btn-CancelVip', async function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    if (await swalConfirm(`Bạn có muốn hủy đơn #${code_order} và hoàn lại số ngày chưa chạy (nếu server hỗ trợ hủy hoàn) với phí trừ ${formatNumber(cancel_day_vip)} ngày?`)) {
        let button = `.btn-CancelVip[data-id=${id}][data-code_order=${code_order}]`;
        let oldTextButton = $(this).html();
        $.ajax({
            type: "POST",
            url,
            data: { id, code_order, action: 'cancel' },
            dataType: "json",
            beforeSend: function () {
                waitButtonNoText(button, true);
            },
            complete: function () {
                waitButtonNoText(button, false, oldTextButton);
            },
            success: function (response) {
                swal(response.message, response.status === true ? 'success' : 'error');
                if (response.status) {
                    tableListOrder();
                }
            }
        });
    }
});

$(document).on('click', '.btn-CancelOrder', async function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    if (await swalConfirm(`Bạn có muốn hủy đơn #${code_order} và hoàn lại số chưa chạy (nếu server hỗ trợ hủy hoàn) với phí ${formatNumber(cancel_order)} coin?`)) {
        let button = `.btn-CancelOrder[data-id=${id}][data-code_order=${code_order}]`;
        let oldTextButton = $(this).html();
        $.ajax({
            type: "POST",
            url,
            data: { id, code_order, action: 'cancel' },
            dataType: "json",
            beforeSend: function () {
                waitButtonNoText(button, true);
            },
            complete: function () {
                waitButtonNoText(button, false, oldTextButton);
            },
            success: function (response) {
                swal(response.message, response.status === true ? 'success' : 'error');
                if (response.status) {
                    tableListOrder();
                }
            }
        });
    }
});


$(document).on('click', '.btn-LogVipLike', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    let dataAjaxTableLogVipLike = { code_order };
    let optionTableLogVipLike = DataTableInit;
    optionTableLogVipLike.pageLength = 5;
    optionTableLogVipLike.processing = true;
    optionTableLogVipLike.serverSide = true;
    optionTableLogVipLike.columns = [{
        data: 'id'
    }, {
        data: 'created_at'
    }, {
        data: 'idpost'
    }, {
        data: 'amount'
    }, {
        data: 'start'
    }, {
        data: 'buff'
    }, {
        data: 'status'
    }];
    optionTableLogVipLike.order = [0, 'desc'];
    optionTableLogVipLike.columnDefs = [{
        targets: 1,
        render: function (data, type, row) {
            return formatDate(data)
        },
    },
    {
        targets: 2,
        render: function (data, type, row) {
            return openLinkNewTab("https://fb.com/" + data, data);
        }
    },
    {
        targets: 3,
        render: function (data, type, row) {
            return formatNumber(data)
        }
    },
    {
        targets: 4,
        render: function (data, type, row) {
            return formatNumber(data)
        }
    },
    {
        targets: 5,
        render: function (data, type, row) {
            return formatNumber(data)
        }
    }, {
        targets: 6,
        render: function (data, type, row) {
            return statusOrder(data)
        }
    }
    ];
    optionTableLogVipLike.ajax = {
        type: "POST",
        url: url,
        data: "data",
        dataType: "json",
        data: function (form) {
            dataAjaxTableLogVipLike.page = form.start / form.length + 1;
            dataAjaxTableLogVipLike.limit = form.length;
            dataAjaxTableLogVipLike.search = form.search.value;
            dataAjaxTableLogVipLike.order = form.order[0].dir;
            dataAjaxTableLogVipLike.sort = form.columns[form.order[0].column].data
            return dataAjaxTableLogVipLike;
        },
        dataFilter: function (body) {
            let response = JSON.parse(body);
            if (response.status) {
                return JSON.stringify({
                    recordsTotal: response.data.total,
                    recordsFiltered: response.data.total,
                    data: response.data.items
                });
            } else {
                swal(response.message, 'error');
                return JSON.stringify({
                    recordsTotal: 0,
                    recordsFiltered: 0,
                    data: []
                });
            }
        },
        error: function (xhr, error, code) {
            return swal(`Error code: ${xhr.status}`, 'error');
        }
    }
    if (TableLogVipLike) {
        TableLogVipLike.destroy();
        // $('#listLogVipLike').empty();
    }
    TableLogVipLike = $('#listLogVipLike').DataTable(optionTableLogVipLike);
    $('#modalLogVipLike').modal('show');
    $('#modalLogVipLike input[name=code_order]').val(code_order);
});


$(document).on('click', '.btn-DiaryBotInteractive', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    let dataAjaxTableDiaryBotInteractive = { code_order };
    let optionTableDiaryBotInteractive = DataTableInit;
    optionTableDiaryBotInteractive.pageLength = 5;
    optionTableDiaryBotInteractive.processing = true;
    optionTableDiaryBotInteractive.serverSide = true;
    optionTableDiaryBotInteractive.columns = [{
        data: 'id'
    }, {
        data: 'created_at'
    }, {
        data: 'idpost'
    }, {
        data: 'author_idfb'
    }, {
        data: 'author_name'
    }, {
        data: 'type'
    }, {
        data: 'details'
    }];
    optionTableDiaryBotInteractive.order = [0, 'desc'];
    optionTableDiaryBotInteractive.columnDefs = [{
        targets: 1,
        render: function (data, type, row) {
            return formatDate(data)
        },
    }, {
        targets: 6,
        render: function (data, type, row) {
            return `<textarea class="form-control note" rows="3" readonly style="min-width: 200px;">${data ? data : ''}</textarea>`;
        }
    },
    ];
    optionTableDiaryBotInteractive.ajax = {
        type: "POST",
        url: url,
        data: "data",
        dataType: "json",
        data: function (form) {
            dataAjaxTableDiaryBotInteractive.page = form.start / form.length + 1;
            dataAjaxTableDiaryBotInteractive.limit = form.length;
            dataAjaxTableDiaryBotInteractive.search = form.search.value;
            dataAjaxTableDiaryBotInteractive.order = form.order[0].dir;
            dataAjaxTableDiaryBotInteractive.sort = form.columns[form.order[0].column].data
            return dataAjaxTableDiaryBotInteractive;
        },
        dataFilter: function (body) {
            let response = JSON.parse(body);
            if (response.status) {
                return JSON.stringify({
                    recordsTotal: response.data.total,
                    recordsFiltered: response.data.total,
                    data: response.data.items
                });
            } else {
                swal(response.message, 'error');
                return JSON.stringify({
                    recordsTotal: 0,
                    recordsFiltered: 0,
                    data: []
                });
            }
        },
        error: function (xhr, error, code) {
            return swal(`Error code: ${xhr.status}`, 'error');
        }
    }
    if (TableDiaryBotInteractive) {
        TableDiaryBotInteractive.destroy();
        // $('#listDiaryBotInteractive').empty();
    }
    TableDiaryBotInteractive = $('#listDiaryBotInteractive').DataTable(optionTableDiaryBotInteractive);
    $('#modalDiaryBotInteractive').modal('show');
    $('#modalDiaryBotInteractive input[name=code_order]').val(code_order);
});

$(document).on('click', '.btn-EditBotInteractive', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    let button = `.btn-EditBotInteractive[data-id=${id}][data-code_order=${code_order}]`;
    let oldTextButton = $(this).html();
    $.ajax({
        type: "POST",
        url,
        data: { code_orders: code_order },
        dataType: "json",
        beforeSend: function () {
            waitButtonNoText(button, true);
        },
        complete: function () {
            waitButtonNoText(button, false, oldTextButton);
        },
        success: function (response) {
            if (response.status) {
                let order = response.data[0];
                $('#modalEditBotInteractive textarea[name=cookie]').val(order.cookie);
                $('#modalEditBotInteractive select[name=proxy_id]').val(order.proxy_id);
                $('#modalEditBotInteractive select[name=type_interactive]').val(order.type_interactive);
                order.reaction.map(reaction => {
                    $(`#modalEditBotInteractive input[name='reaction[]'][value=${reaction}]`).attr('checked', true);
                });
                $('#modalEditBotInteractive select[name=limit_reaction]').val(order.limit_reaction);
                $('#modalEditBotInteractive select[name=onComment]').val(order.onComment).trigger("change");
                $('#modalEditBotInteractive textarea[name=commentText]').val(order.commentText);
                $("#modalEditBotInteractive [name=commentText]").emojioneArea({
                    pickerPosition: "top",
                    tonesStyle: "bullet"
                });
                $('#modalEditBotInteractive select[name=limit_comment]').val(order.limit_comment);
                $('#modalEditBotInteractive input[name=commentImage]').val(order.commentImage);
                $('#modalEditBotInteractive select[name=commentSticker]').val(order.commentSticker);
                $('#modalEditBotInteractive select[name=limit]').val(order.limit);
                $('#modalEditBotInteractive textarea[name=backlist]').val(order.backlist);
                $('#modalEditBotInteractive select[name=hour_start]').val(order.hour_start);
                $('#modalEditBotInteractive select[name=hour_stop]').val(order.hour_stop);

                $('#modalEditBotInteractive').modal('show');
                $('#modalEditBotInteractive input[name=code_order]').val(code_order);
            }
        }
    });
});

$(document).on('click', '.btn-UpdateCookie', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    $('#modalUpdateCookie').modal('show');
    $('#modalUpdateCookie input[name=code_order]').val(code_order);
});

$(document).on('click', '.btn-ReportOrder', async function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    if (await swalConfirm(`Bạn đã khắc phục lỗi đơn #${code_order} và muốn kích hoạt lại?`, 'info')) {
        let button = `.btn-ReportOrder[data-id=${id}][data-code_order=${code_order}]`;
        let oldTextButton = $(this).html();
        $.ajax({
            type: "POST",
            url,
            data: { id, code_order, action: 'report' },
            dataType: "json",
            beforeSend: function () {
                waitButtonNoText(button, true);
            },
            complete: function () {
                waitButtonNoText(button, false, oldTextButton);
            },
            success: function (response) {
                swal(response.message, response.status === true ? 'success' : 'error');
                if (response.status) {
                    tableListOrder();
                }
            }
        });
    }
});

$(document).on('click', '.btn-WarrantyClaimOrder', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    let button = `.btn-WarrantyClaimOrder[data-id=${id}][data-code_order=${code_order}]`;
    let oldTextButton = $(this).html();
    $.ajax({
        type: "POST",
        url,
        data: { id, code_order, action: 'warranty_claim' },
        dataType: "json",
        beforeSend: function () {
            waitButtonNoText(button, true);
        },
        complete: function () {
            waitButtonNoText(button, false, oldTextButton);
        },
        success: function (response) {
            swal(response.message, response.status === true ? 'success' : 'error');
        }
    });
});

$(document).on('click', '.btn-DetailReportOrder', function () {
    let id = $(this).attr('data-id');
    let code_order = $(this).attr('data-code_order');
    let url = $(this).attr('data-url');
    let button = `.btn-DetailReportOrder[data-id=${id}][data-code_order=${code_order}]`;
    let oldTextButton = $(this).html();
    $.ajax({
        type: "POST",
        url,
        data: { code_orders: code_order },
        dataType: "json",
        beforeSend: function () {
            waitButtonNoText(button, true);
        },
        complete: function () {
            waitButtonNoText(button, false, oldTextButton);
        },
        success: function (response) {
            if (response.status) {
                let order = response.data[0];
                swal(`Đơn #${order.code_order} bị tạm dừng lý do: ${order.detail}`, 'info');
            }
            return;
        }
    });
});



$(document).on('change', '.change-switch', async function () {
    let id = $(this).attr('data-id');
    let url = $(this).attr('data-url');
    var toggle = $(this).is(":checked");
    $.ajax({
        type: "POST",
        url,
        data: { id, action: 'toggle', show: toggle ? 'on' : 'off' },
        dataType: "json",
        success: function (response) {
            if (response.status) {
                $(this).prop('checked', response.data.show === 'on' ? true : false);
            }
        }
    });
});

$(document).on('click', '.show-order-account', function () {
    let type_account_id = $(this).attr('data-type_account_id');
    let url = $(this).attr('data-url');
    let button = `.show-order-account[data-type_account_id=${type_account_id}]`;
    let oldTextButton = $(this).html();
    $.ajax({
        type: "POST",
        url,
        data: { type_account_id },
        dataType: "json",
        beforeSend: function () {
            waitButtonNoText(button, true);
        },
        complete: function () {
            waitButtonNoText(button, false, oldTextButton);
        },
        success: function (response) {
            if (response.status) {
                $('input[name=type_account_id]').val(type_account_id);
                $('input[name=price]').val(response.data.price);
                $('input[name=name]').val(response.data.name);
                bill();
                $('#showBuy').modal('show');
            }
        }
    });
});


$(document).ready(function () {
    notificationNewUpdate();
    setInterval(() => {
        notificationNewUpdate();
    }, 10000);
    $('.nav-link[href="#tab_list"]').click(function (e) {
        e.preventDefault();
        tableListOrder();
    });
    $('#tab_order.active .viewSticker').click(function (e) {
        e.preventDefault();
        let sticker = $('#tab_order.active [name=commentSticker]').val();
        if (sticker !== 'off') {
            window.open(`https://www.facebook.com/stickers/${sticker}`, '_blank');
        }
    });
    $('#modalEditBotInteractive .viewSticker').click(function (e) {
        e.preventDefault();
        let sticker = $('#modalEditBotInteractive [name=commentSticker]').val();
        if (sticker !== 'off') {
            window.open(`https://www.facebook.com/stickers/${sticker}`, '_blank');
        }
    });
    $('#tab_order.active .showComment').change(function (e) {
        let onComment = $('#tab_order.active [name=onComment]').val();
        if (onComment === 'on') {
            $('#tab_order.active #onComment').show();
        } else {
            $('#tab_order.active #onComment').hide();
        }
    });
    $('#modalEditBotInteractive .showComment').change(function (e) {
        let onComment = $('#modalEditBotInteractive [name=onComment]').val();
        if (onComment === 'on') {
            $('#modalEditBotInteractive #onComment').show();
        } else {
            $('#modalEditBotInteractive #onComment').hide();
        }
    });
    $('#openGiftBox').click(function (e) {
        let button = `#openGiftBox`;
        let oldTextButton = $(this).html();
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: API_OPEN_GIFT_BOX,
            data: {},
            dataType: "json",
            beforeSend: function () {
                $('#modalGiftBox').modal('hide');
                waitButtonNoText(button, true);
            },
            complete: function () {
                waitButtonNoText(button, false, oldTextButton);
            },
            success: async function (response) {
                if (response.status) {
                    $('#count_gift_box').html(response.data.gift_box);
                }
                let ok = await swal(response.message, response.status === true ? 'success' : 'error');
                if (ok) {
                    await $('#modalGiftBox').modal('show');
                }
                return;
            }
        });
    });
});

