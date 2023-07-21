<?php
    require_once(__DIR__.'/../../Config/config.php');
    require_once(__DIR__.'/../../Config/function.php');
    $title = 'Đăng Nhập tài khoản';
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
                                        <img class="brand-img d-inline-block"
                                            src="<?=BASE_URL('/jampack/dist/img/icon-sm.png');?>" alt="brand">
                                    </a>
                                    <img class="brand-img d-inline-block"
                                        src="<?=BASE_URL('/jampack/dist/img/logo.png');?>" alt="brand">
                                    </a>
                                </div>
                                <form method="post" url_redirect="/home" class="w-100">
                                    <div class="row">
                                        <div class="col-xl-7 col-sm-10 mx-auto">
                                            <div class="text-center mb-4">
                                                <h4>Đăng nhập vào hệ thống!</h4>
                                                <p>Xin mời bạn nhập đầy đủ thông tin đăng nhập.</p>
                                            </div>
                                            <div id="thongbao"></div>
                                            <div class="row gx-3">
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
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check form-check-sm mb-3">
                                                    <input type="checkbox" class="form-check-input" id="remember"
                                                        name="remember" checked>
                                                    <label class="form-check-label text-muted fs-7" for="remember">Ghi
                                                        nhớ tài khoản.</label>
                                                </div>
                                            </div>
                                            <button id="btnLogin" class="btn btn-primary btn-uppercase btn-block">Đăng
                                                nhập</button>
                                            <p class="p-xs mt-2 text-center">Bạn chưa có tài khoản? <a
                                                    href="<?=BASE_URL('auth/register/');?>"><u>đăng kí</u></a>.</p>
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
    $("#btnLogin").on("click", function() {

        // Disable button and show spinner while processing
        $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);

        // Send request to server
        $.ajax({
            url: "<?=BASE_URL('Router');?>",
            method: "POST",
            data: {
                type: 'Login',
                username: $("#username").val(),
                password: $("#password").val(),
                remember: $("#remember-me").is(":checked") ? 'off' :
                    'on' // Check if checkbox is checked
            },
            success: function(response) {
                // Show response message and enable button
                $("#thongbao").html(response);
                $('#btnLogin').html('Đăng Nhập').prop('disabled', false);
            }
        });
    });
    </script>
<?php
    require_once(__DIR__.'/../../Theme/FooterUser.php');
?>