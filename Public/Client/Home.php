<?php
    require_once(__DIR__.'/../../Config/config.php');
    require_once(__DIR__.'/../../Config/function.php');
    $title = 'Trang chủ';
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
                            <li class="breadcrumb-item"><a href="<?=BASE_URL('home');?>"><?=$base_url;?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="bg-success text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-success">
                                        <span class="initial-wrap"><i class="ri-coins-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Số dư</div>
                                    <div class="text-truncate fs-6 mb-2"><?=number_format($getUser['money']);?> coin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-primary text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-primary">
                                        <span class="initial-wrap"><i class="ri-copper-coin-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Đã nạp</div>
                                    <div class="text-truncate fs-6 mb-2"><?=$getUser['total_money'];?> coin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-indigo text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-indigo-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-indigo">
                                        <span class="initial-wrap"><i class="ri-copper-diamond-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Đã sử dụng</div>
                                    <div class="text-truncate fs-6 mb-2"> <?=number_format($getUser['used_money']);?> coin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-dark text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-dark">
                                        <span class="initial-wrap"><i class="ri-shield-user-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Cấp bậc</div>
                                    <div class="text-truncate fs-6 mb-2"><?=Role($getUser['level'],$getUser['total_money']);?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-8 col-md-6">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2022-01-01 00:00:00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">Mọi người cần hỗ trợ thì Inbox Page: <a
                                            href="https://www.facebook.com/support.sgr/" target="_blank"
                                            rel="noopener noreferrer">https://www.facebook.com/support.sgr/</a>
                                        (thời gian từ 8h30 sáng -&gt; 9h30 tối) để được hỗ trợ nhanh nhất, hãy
                                        tham gia <a href="https://t.me/joinchat/M9_yfQE-mddjZjE1">Telegram (kênh
                                            thông báo)
                                            https://t.me/joinchat/M9_yfQE-mddjZjE1</a> để cập nhật tin tức mới
                                        nhất từ hệ
                                        thống, tránh mất tiền oan.</p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 30K</a>
                                    </div>
                                    <div>
                                        <a href="#">1K comments</a>
                                        <a href="#">12 shares</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2023-07-18 21:53:35</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">
                                    <h2>+ Đổi SDT momo nạp tiền mới: 0819123666 - Hoàng Văn Lĩnh.<br />+ Mở thêm
                                        Facebook like page sale sv11, mọi người check lại giá nhé.</h2>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 348k</a>
                                    </div>
                                    <div>
                                        <a href="#">116k comments</a>
                                        <a href="#">70k shares</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2023-07-12 15:28:04</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">
                                    <div>
                                        <div>SubGiaRe.Vn update 12/07/2023</div>
                                        <div> + Đổi SDT momo nạp tiền mới: 0862667899 - Hoàng Văn Lĩnh.</div>
                                        <div> + Mở lại Facebook like post speed sv7 giá rẻ 5đ max 100k like.
                                        </div>
                                        <div> + Mở lại Facebook like post speed sv10 giá rẻ 4đ.</div>
                                        <div> + Hạ giá Facebook sub sale sv12.</div>
                                        <div> + Hạ giá Facebook like page sale sv9.</div>
                                        <div> + Mở lại tiktok like sv2 giá cực rẻ 2đ.</div>
                                        <div> + Mở lại tiktok sub tây sv9 giá rẻ.</div>
                                        <div>Các website đại lý vui lòng check lại giá &amp; set giá dịch vụ 😍
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 345k</a>
                                    </div>
                                    <div>
                                        <a href="#">115k comments</a>
                                        <a href="#">69k shares</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2023-07-01 20:46:52</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">
                                    <h2>Đổi SDT momo mới: 0345066723 - HOÀNG VĂN LĨNH, mọi người chú ý nạp tiền
                                        ạ</h2>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 344k</a>
                                    </div>
                                    <div>
                                        <a href="#">115k comments</a>
                                        <a href="#">69k shares</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2023-06-30 16:13:05</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">
                                    <p>SubGiaRe.Vn thông báo 📢📢📢<br />+ Khuyến mãi 10% giá trị nạp tiền bắt
                                        đầu từ ngày 30/06/2023 đến 23h59p ngày 04/07/2023.<br />+ Hạ giá sub vip
                                        sv3, sv4 chỉ còn 10đ.<br />+ Mở lại tiktok sub sv6, sv7,sv8 chỉ từ
                                        7đ.<br />Chúc mọi người tháng mới nhiều may mắn, 8683 nhé ❤️</p>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 343k</a>
                                    </div>
                                    <div>
                                        <a href="#">114k comments</a>
                                        <a href="#">69k shares</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="/assets/images/avt-fb.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="fw-medium text-dark">Hoàng Văn Lĩnh</div>
                                            <div class="fs-7">2023-06-23 14:03:01</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-5">
                                    <h2>Đổi SĐT nạp tiền Momo mới: 0819123666 - Hoàng Văn Lĩnh nhé mọi người!
                                    </h2>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div>
                                        <a href="#"><i class="bi bi-heart-fill text-primary"></i> 338k</a>
                                    </div>
                                    <div>
                                        <a href="#">113k comments</a>
                                        <a href="#">68k shares</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xlg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Cập nhật mới
                            </h5>

                            <div class="mt-4">
                                <ul class="list-group list-group-flush new_updates">
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Điều chỉnh giá tiktok sub
                                                            sv9</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-07-16
                                                            23:11:25
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">VIETCOMBANK hôm nay đang
                                                            sao kê giao dịch nên bị delay nên nạp chậm mọi người
                                                            nạp sang Momo cho nhanh nhé</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-07-15
                                                            20:56:09
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Điều chỉnh giá mắt live
                                                            tiktok mọi người check lại nhé</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-27
                                                            14:39:42
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Nâng max sub vip sv4 lên
                                                            50k/ UID tốc độ cực nhanh cài là done giá rẻ đẳng
                                                            cấp độc quyền số 1 thế giới nhé mọi người.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-26
                                                            16:29:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Nâng max sub vip sv4 lên
                                                            30k/ UID, hãy tranh thủ mua khi còn đang giá rẻ nào
                                                            mọi người.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-25
                                                            21:08:58
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Nâng max sub vip sv4 lên
                                                            20k/ UID nhé mọi người.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-24
                                                            09:05:48
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại sub vip sv4 giá chỉ
                                                            12đ rẻ nhất thị trường, hạ giá sub vip sv2 tốc độ
                                                            cực nhanh cài là done độc quyền toàn thế giới 😍,
                                                            các website đại lý vui lòng check lại giá nhé 😘
                                                        </div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-23
                                                            08:58:56
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Tạm đóng auto nạp
                                                            Thesieure, mọi người nạp sang vcb và momo nhé</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-22
                                                            14:58:18
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Tham gia nhóm telegram:
                                                            https://t.me/subgiare để nhận thông báo nhé mọi
                                                            người.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-21
                                                            15:09:13
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại tiktok sub sv3, mọi
                                                            người check lại giá nhé!</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-17
                                                            14:27:36
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại like page sale sv10
                                                            (gói này ưu tiền dùng vì không tụt tốc độ nhanh) và
                                                            điều chỉnh giá mọi người check lại nhé!</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-14
                                                            19:03:39
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại sub sale sv11 và hạ
                                                            giá like page sale sv8 chỉ còn 13đ 😘</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-14
                                                            13:38:04
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại và điều chỉnh giá
                                                            gói tiktok sub sv2 tốc độ đang nhanh mọi người đẩy
                                                            mạnh đơn nhé.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-06
                                                            10:20:21
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại facebook like post
                                                            speed sv9 giá rẻ và tiktok view sv3 giá rẻ chạy cực
                                                            nhanh. Mọi người check lại giá dịch vụ nhé 🥰</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-06-01
                                                            14:51:06
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Hệ thống đã dọn dẹp các đơn
                                                            cũ từ 2023-01-01 00:00:00 đổ lại của 1 số mục.</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-31
                                                            16:07:15
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Đổi SĐT nạp tiền Momo mới:
                                                            0345066723 - Hoàng Văn Lĩnh nhé mọi người!</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-29
                                                            23:37:28
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Mở lại tiktok sub sv2 và
                                                            điểu chỉnh giá, mọi người check lại nhé 😘</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-26
                                                            16:35:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Sub Tiktok sv2 đang dồn đơn
                                                            nhiều nên mọi người mua sang sv1 cho nhanh nhé, hệ
                                                            thống đang đẩy đơn tồn ạ!</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-19
                                                            20:05:41
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Hạ giá sub sale sv11 mọi
                                                            người check lại giá nhé!</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-18
                                                            16:36:56
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="/jampack/dist/img/svg/update.svg" alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Tiktok follow sv2 đang chạy
                                                            rất nhanh, mọi người tranh thủ đẩy đơn đi nhé</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted">
                                                            <i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2023-05-18
                                                            08:31:55
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Thống kê &amp; tiến trình đơn
                            </h5>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-secondary text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalOrder">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn đã mua</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-info text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalActive">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn đang chạy</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-success text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalSuccess">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn hoàn thành</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-dark text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalRefund">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn hoàn tiền</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-warning text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalReport">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn tạm dừng</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-danger text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalPause">
                                                    0</div>
                                                <h6 class="ml-1 text-white">Đơn đã hủy</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" id="showProcess"
                                                style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal-->
            <div class="modal fade" id="modalSystem" tabindex="-1" role="dialog" aria-labelledby="modalSystemLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-top" role="document">
                    <div class="modal-content">

                        <div class="modal-body">

                            <p class="text-center pt-3 mb-3">Mọi người cần hỗ trợ thì Inbox Page: <a
                                    href="https://www.facebook.com/support.sgr/" target="_blank"
                                    rel="noopener noreferrer">https://www.facebook.com/support.sgr/</a>
                                (thời gian từ 8h30 sáng -&gt; 9h30 tối) để được hỗ trợ nhanh nhất, hãy tham gia
                                <a href="https://t.me/joinchat/M9_yfQE-mddjZjE1">Telegram (kênh thông báo)
                                    https://t.me/joinchat/M9_yfQE-mddjZjE1</a> để cập nhật tin tức mới nhất từ
                                hệ
                                thống, tránh mất tiền oan.
                            </p>


                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng thông
                                    báo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalGiftBox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                role="dialog" aria-labelledby="modalGiftBoxLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center mb-3">
                                <h2 class="text-primary">😍 Hộp quà may mắn 😍</h2>
                            </div>
                            <div class="separator-full"></div>
                            <div class="d-grid gap-2">
                                <div class="media align-items-center mb-3">
                                    <div class="media-head me-3">
                                        <div class="avatar avatar-lg">
                                            <img src="/jampack/dist/img/qua.png" alt="user" class="avatar-img">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>Happy New Year 2023</h4>
                                        <span class="d-block">Nhân dịp năm mới Admin SGR chúc bạn nhiều sức
                                            khỏe, an khang thịnh
                                            vượng, vạn sự như ý.</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="h4">Số lượt mở: <b class="text-danger" id="count_gift_box">0</b>
                                        lần.</p>
                                </div>
                                <button type="button" class="btn btn-success btn-lg" id="openGiftBox">Mở hộp
                                    quà</button>
                                <button type="button" class="btn btn-danger btn-lg"
                                    data-bs-dismiss="modal">Đóng</button>
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
                            class="" target="_blank">System
                            Status</a>
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
<?php
    require_once(__DIR__.'/../../Theme/FooterUser.php');
?>