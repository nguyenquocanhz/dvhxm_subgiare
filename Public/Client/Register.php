<?php
    require_once(__DIR__.'/../../Config/config.php');
    require_once(__DIR__.'/../../Config/function.php');
    $title = 'Đăng kí tài khoản';
    require_once(__DIR__.'/../../Theme/HeaderUser.php');
?>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <!-- Main Content -->
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <!-- Container -->
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="row auth-split">
                        <div class="col-xl-5 col-lg-6 col-md-7 position-relative mx-auto">
                            <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                                <div class="text-center mb-6">
                                    <a class="navbar-brand me-0" href="/home">
                                        <img class="brand-img d-inline-block" src="/jampack/dist/img/icon-sm.png"
                                            alt="brand">
                                    </a>
                                    <img class="brand-img d-inline-block" src="/jampack/dist/img/logo.png" alt="brand">
                                    </a>
                                </div>
                                <form submit-ajax="true" method="post" action="<?=BASE_URL('/auth/register/');?>"
                                    url_redirect="<?=BASE_URL('/auth/login/');?>" class="w-100">
                                    <div class="row">
                                        <div class="col-xl-7 col-sm-10 mx-auto">
                                            <div class="text-center mb-4">
                                                <h4>Đăng kí tài khoản mới!</h4>
                                                <p>Xin mời bạn nhập đầy đủ thông tin đăng kí.</p>
                                            </div>
                                            <div id="thongbao"></div>
                                            <div class="row gx-3">
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Họ và tên</label>
                                                    </div>
                                                    <input class="form-control" placeholder="Vui lòng nhập họ và tên"
                                                        id="fullname" type="text">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Email</label>
                                                    </div>
                                                    <input class="form-control"
                                                        placeholder="Vui lòng nhập địa chỉ email" id="email"
                                                        type="email">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Tài khoản</label>
                                                    </div>
                                                    <input class="form-control" placeholder="Vui lòng nhập tài khoản"
                                                        id="username" type="text">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Mật khẩu</label>
                                                    </div>
                                                    <div class="input-group password-check">
                                                        <span class="input-affix-wrapper affix-wth-text">
                                                            <input class="form-control"
                                                                placeholder="Vui lòng nhập mật khẩu" id="password"
                                                                type="password">
                                                            <a href="#"
                                                                class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                <span>Show</span>
                                                                <span class="d-none">Hide</span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Nhập Lại Mật khẩu</label>
                                                    </div>
                                                    <div class="input-group password-check">
                                                        <span class="input-affix-wrapper affix-wth-text">
                                                            <input class="form-control"
                                                                placeholder="Vui lòng nhập mật khẩu" id="repassword"
                                                                type="password">
                                                            <a href="#"
                                                                class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                <span>Show</span>
                                                                <span class="d-none">Hide</span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check form-check-sm mb-3">
                                                    <input type="checkbox" class="form-check-input" id="acp_system"
                                                        checked>
                                                    <label class="form-check-label text-muted fs-7" for="acp_system">Tôi
                                                        đồng ý các điều khoản của hệ thống.</label>
                                                </div>
                                            </div>
                                            <button id="btnRegister" class="btn btn-primary btn-uppercase btn-block"
                                                disable>Đăng
                                                kí</button>
                                            <p class="p-xs mt-2 text-center">Bạn đã có tài khoản? <a
                                                    href="<?=BASE_URL('/auth/login/');?>"><u>đăng nhập</u></a>.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Page Footer -->
                            <div class="hk-footer border-0">
                                <footer class="container-xxl footer">
                                    <div class="row">
                                        <div class="col-xl-8 text-center">
                                            <p class="footer-text pb-0"><span class="copy-text">SubGiaRe.Vn ©
                                                    2022 All
                                                    rights reserved.</span> <a href="#" class="" target="_blank">Privacy
                                                    Policy</a><span class="footer-link-sep">|</span><a href="#" class=""
                                                    target="_blank">T&C</a><span class="footer-link-sep">|</span><a
                                                    href="#" class="" target="_blank">System Status</a></p>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                            <!-- / Page Footer -->
                        </div>
                        <div
                            class="col-xl-7 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
                            <div class="auth-content flex-column text-center py-8">
                                <div class="row">
                                    <div class="col-xxl-7 col-xl-8 col-lg-11 mx-auto">
                                        <h2 class="mb-4">Welcome!</h2>
                                        <p>Chào mừng bạn đến với hệ thống đầy đủ các dịch vụ mạng xã hội giá rẻ, chất
                                            lượng nhất thị trường.</p>
                                        <a class="btn btn-flush-primary btn-uppercase mt-2"
                                            href="https://www.facebook.com/hvl2k3.it/" target="_bank">- Admin
                                            Hoàng Văn Lĩnh</a>
                                    </div>
                                </div>
                                <img src="/jampack/dist/img/macaroni-logged-out.png" class="img-fluid w-sm-50 mt-7"
                                    alt="login" />
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->
    <script type="text/javascript">
    $(document).ready(function() {
        // Kiểm tra điều kiện khi có sự thay đổi trong các trường
        $("#email, #fullname, #username, #password, #repassword").on("input", function() {
            // Lấy giá trị của các trường
            var email = $("#email").val();
            var fullname = $("#fullname").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var repassword = $("#repassword").val();

            // Kiểm tra điều kiện và cập nhật trạng thái của nút "btnRegister"
            if (email !== '' && fullname !== '' && username !== '' && password !== '' && repassword !== '') 
            {
                $("#btnRegister").prop("disabled", false); // Kích hoạt nút
            }
            else 
            {
                $("#btnRegister").prop("disabled", true); // Kích hoạt nút
            }
        });
    });

    $("#btnRegister").on("click", function() {
        $('#btnRegister').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
            true);
        $.ajax({
            url: "<?=BASE_URL('Router');?>",
            method: "POST",
            data: {
                type: 'Register',
                email: $("#email").val(),
                fullname: $('#fullname').val(),
                username: $("#username").val(),
                password: $("#password").val(),
                repassword: $("#repassword").val()
            },
            success: function(response) {
                $("#thongbao").html(response);
                $('#btnRegister').html(
                        'Đăng Ký')
                    .prop('disabled', false);
            }
        });
    });
    </script>
    <?php
    require_once(__DIR__.'/../../Theme/FooterUser.php');
?>