<?php
    require_once(__DIR__.'/../../Config/config.php');
    require_once(__DIR__.'/../../Config/function.php');
    $title = 'Thông tin tài khoản';
    require_once(__DIR__.'/../../Theme/HeaderUser.php');
    require_once(__DIR__.'/../../Theme/Nav.php');
    require_once(__DIR__.'/../../Theme/Sidebar.php');
    CheckLogin();
?>

<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Page Body -->
    <div class="hk-pg-body">
        <div class="container-xxl" id="app">

            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="https://subgiare.vn/home">SubGiaRe.Vn</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Thông tin tài khoản
                            </h5>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Họ và tên</label>
                                        <input type="text" class="form-control" value="Nguyễn Quốc Anh" readonly>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Email</label>
                                        <input type="text" class="form-control" value="nguyenquocanhdz1@gmail.com"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Tài khoản</label>
                                        <input type="text" class="form-control" value="nguyenquocanhdz1" readonly>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Số dư</label>
                                        <input type="text" class="form-control" value="2 coin" readonly>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Cấp độ</label>
                                        <input type="text" class="form-control" value="Thành viên" readonly>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label" for="">Thời gian tham gia</label>
                                        <input type="text" class="form-control" value="2022-01-12 20:35:41" readonly>
                                    </div>
                                    <form method="post" url_redirect="reload">
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="">Api Token</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" value="<?=$getUser['token'];?>"
                                                    id="api_token" readonly>
                                                <button id="btnReToken" class="btn btn-primary"><i
                                                        class="fa fa-sync"></i>
                                                    Thay
                                                    đổi</button>
                                            </div>
                                        </div>
                                    </form>
                                   <div id="token"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Đổi mật khẩu
                            </h5>
                            <div id="thongbao"></div>
                            <div class="mt-4">
                                <form method="post" url_redirect="reload">
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu cũ</label>
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Nhập mật khẩu cũ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Nhập mật khẩu mới">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="confirm_new_password"
                                            placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button id="btnChangePass" class="btn btn-primary"><i class="fa fa-lock"></i>
                                            Thay
                                            đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-12">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Nhật kí hoạt động
                            </h5>

                            <div class="mt-4">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover no-footer text-nowrap"
                                        id="listDiary">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Thời gian</th>
                                                <th class="text-center">Nội dung</th>
                                            </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Body -->




    <!-- Page Footer -->
    <div class="hk-footer">
        <footer class="container-xxl footer">
            <div class="row">
                <div class="col-xl-8">
                    <p class="footer-text"><span class="copy-text">SubGiaRe.Vn © 2022 All rights
                            reserved.</span>
                        <a href="#" class="" target="_blank">Privacy Policy</a><span class="footer-link-sep">|</span><a
                            href="#" class="" target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#"
                            class="" target="_blank">System Status</a>
                    </p>
                </div>
                <div class="col-xl-4">
                    <a href="#" class="footer-extr-link link-default"><span class="feather-icon"><i
                                data-feather="external-link"></i></span><u>Send feedback to our help
                            forum</u></a>
                </div>
            </div>
        </footer>
    </div>
    <!-- / Page Footer -->

</div>
<!-- /Main Content -->
</div>
<!-- /Wrapper -->
<script type="text/javascript">
$("#btnChangePass").on("click", function() {

    // Disable button and show spinner while processing
    $('#btnChangePass').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);

    // Send request to server
    $.ajax({
        url: "<?=BASE_URL('Router');?>",
        method: "POST",
        data: {
            type: 'ReplacePassword',
            old_password: $("#old_password").val(),
            new_password: $("#new_password").val(),
            confirm_new_password: $("#confirm_new_password").val(),
        },
        success: function(response) {
            // Show response message and enable button
            $("#thongbao").html(response);
            $('#btnChangePass').html('Thay đổi').prop('disabled', false);
        }
    });
});
$("#btnReToken").on("click", function() {

    // Disable button and show spinner while processing
    $('#btnReToken').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);

    // Send request to server
    $.ajax({
        url: "<?=BASE_URL('Router');?>",
        method: "POST",
        data: {
            type: 'ReToken',
            username: '<?=$getUser['username'];?>'
        },
        success: function(response) {
            $("#token").html(response);
            $('#btnReToken').html('Thay đổi').prop('disabled', false);
        }
    });
});
</script>
<?php
    require_once(__DIR__.'/../../Theme/FooterUser.php');
?>