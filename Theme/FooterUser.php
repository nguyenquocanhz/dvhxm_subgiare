<!-- Messenger Plugin chat Code -->
<!-- <div id="fb-root"></div> -->

<!-- Your Plugin chat code -->
<!-- <div id="fb-customer-chat" class="fb-customerchat">
    </div> -->

<!-- <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101700015856298");
    chatbox.setAttribute("attribution", "biz_inbox");
    </script> -->

<!-- Your SDK code -->
<!-- <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script> -->
<!-- jQuery -->
<script src="/jampack/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/jampack/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- FeatherIcons JS -->
<script src="/jampack/dist/js/feather.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="/jampack/dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Simplebar JS -->
<script src="/jampack/vendors/simplebar/dist/simplebar.min.js"></script>

<!-- twitter JS -->
<script src="/jampack/dist/js/twitterFetcher.js"></script>
<script src="/jampack/dist/js/widgets-data.js"></script>

<!-- Owl JS -->
<script src="/jampack/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="/jampack/dist/js/owl-data.js"></script>

<!-- Sweetalert JS -->
<script src="/jampack/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/jampack/dist/js/sweetalert-data.js"></script>

<!-- Data Table JS -->
<script src="/jampack/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/jampack/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/jampack/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/jampack/vendors/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="/jampack/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/jampack/vendors/jszip/dist/jszip.min.js"></script>
<script src="/jampack/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="/jampack/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="/jampack/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/jampack/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/jampack/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/jampack/vendors/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="/jampack/vendors/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="/jampack/vendors/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
<script src="/jampack/vendors/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"></script>

<!-- Tinymce JS -->
<script src="/jampack/vendors/tinymce/tinymce.min.js"></script>

<!-- Select2 JS -->
<script src="/jampack/vendors/select2/dist/js/select2.full.min.js"></script>

<!-- Init JS -->
<script src="/jampack/dist/js/init.js"></script>
<script src="/jampack/dist/js/chips-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script>
const pusher = new Pusher('8424c10da800c48a00cf', {
    cluster: 'ap1'
});
</script>

<script src="/jampack/dist/js/script.js?v=1689582429"></script>
<script src="/jampack/dist/js/user.js?v=1689743512"></script>
<script>
let dataAjaxTableDiary = {};
let optionTableDiary = DataTableInit;
optionTableDiary.pageLength = 5;
optionTableDiary.processing = true;
optionTableDiary.serverSide = true;
optionTableDiary.columns = [{
    data: 'id'
}, {
    data: 'created_at'
}, {
    data: 'content'
}];
optionTableDiary.order = [0, 'desc'];
optionTableDiary.columnDefs = [{
    targets: 1,
    render: function(data, type, row) {
        return formatDate(data)
    }
}, ];
optionTableDiary.ajax = {
    type: "POST",
    url: "<?=BASE_URL('profile/diary');?>",
    data: "data",
    dataType: "json",
    data: function(form) {
        dataAjaxTableDiary.page = form.start / form.length + 1;
        dataAjaxTableDiary.limit = form.length;
        dataAjaxTableDiary.search = form.search.value;
        dataAjaxTableDiary.order = form.order[0].dir;
        dataAjaxTableDiary.sort = form.columns[form.order[0].column].data
        return dataAjaxTableDiary;
    },
    dataFilter: function(body) {
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
    error: function(xhr, error, code) {
        return swal(`Error code: ${xhr.status}`, 'error');
    }
}
let TableDiary = $('#listDiary').DataTable(optionTableDiary);
</script>
<script>
(function() {
    var js =
        "window['__CF$cv$params']={r:'7e811aa5f88304c4',m:'wVIrIGeVVTDmNSS6aeKwqCUKRh0icnU.tTVauyRYmb0-1689582429-0-AcpTmxxzsg6Po8t+3Qq/fAb5o+4uwaSU5+9OnzntgQLG'};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/scripts/invisible.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
    var _0xh = document.createElement('iframe');
    _0xh.height = 1;
    _0xh.width = 1;
    _0xh.style.position = 'absolute';
    _0xh.style.top = 0;
    _0xh.style.left = 0;
    _0xh.style.border = 'none';
    _0xh.style.visibility = 'hidden';
    document.body.appendChild(_0xh);

    function handler() {
        var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
        if (_0xi) {
            var _0xj = _0xi.createElement('script');
            _0xj.nonce = '';
            _0xj.innerHTML = js;
            _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
        }
    }
    if (document.readyState !== 'loading') {
        handler();
    } else if (window.addEventListener) {
        document.addEventListener('DOMContentLoaded', handler);
    } else {
        var prev = document.onreadystatechange || function() {};
        document.onreadystatechange = function(e) {
            prev(e);
            if (document.readyState !== 'loading') {
                document.onreadystatechange = prev;
                handler();
            }
        };
    }
})();
</script>
</body>

</html>