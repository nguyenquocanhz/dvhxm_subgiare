<!-- Vertical Nav -->
<!-- Start Sidebar -->
<div class="hk-menu">
    <!-- Brand -->
    <div class="menu-header">
        <span>
            <a class="navbar-brand" href="<?=BASE_URL('home');?>">
                <img class="brand-img img-fluid" src="/jampack/dist/img/icon-sm.png" alt="brand" />
                <img class="brand-img img-fluid" src="/jampack/dist/img/logo.png" alt="brand" width="135" />
            </a>
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                <span class="icon">
                    <span class="svg-icon fs-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="10" y1="12" x2="20" y2="12"></line>
                            <line x1="10" y1="12" x2="14" y2="16"></line>
                            <line x1="10" y1="12" x2="14" y2="8"></line>
                            <line x1="4" y1="4" x2="4" y2="20"></line>
                        </svg>
                    </span>
                </span>
            </button>
        </span>
    </div>
    <!-- /Brand -->

    <!-- Main Menu -->
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="menu-group">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=BASE_URL('home');?>">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/dashboard.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('profile/info');?>">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/personal-information.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Tài khoản của tôi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('recharge/banking');?>">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/wallet.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Nạp tiền tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('profile/history');?>/">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/history-book.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Lịch sử tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('profile/upgrade-level');?>/">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/member-card.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Cấp bậc & bảng giá</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('website/create');?>/">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/web-development.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Tạo website riêng</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-gap"></div>
            <div class="menu-group">
                <div class="nav-header">
                    <span>Sản phẩm & dịch vụ</span>
                </div>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('service/proxy');?>">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/proxy.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch vụ Proxy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL('service/account');?>">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/users.svg?12" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch vụ tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_facebook">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/facebook.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch vụ Facebook</span>
                        </a>
                        <ul id="service_facebook" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_facebook_bot">
                                            <span class="nav-link-text">Facebook Bot</span>
                                        </a>
                                        <ul id="service_facebook_bot" class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/bot-interactive');?>"><span
                                                                class="nav-link-text">Bot tương tác</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/bot-poke-friend');?>/"><span
                                                                class="nav-link-text">Chọc bạn bè</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/filter-friend');?>/"><span
                                                                class="nav-link-text">Lọc bạn bè</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_facebook_buff">
                                            <span class="nav-link-text">Facebook Buff</span>
                                        </a>
                                        <ul id="service_facebook_buff" class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/like-post-sale');?>">
                                                            <span class="nav-link-text">Tăng like bài
                                                                viết (sale)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/like-post-speed');?>">
                                                            <span class="nav-link-text">Tăng like bài
                                                                viết (speed)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/like-comment/order');?>">
                                                            <span class="nav-link-text">Tăng like bình
                                                                luận</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('/service/facebook/comment-sale/order');?>">
                                                            <span class="nav-link-text">Tăng bình luận
                                                                (sale)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/comment-speed/order');?>">
                                                            <span class="nav-link-text">Tăng bình luận
                                                                (speed)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/sub-vip');?>/">
                                                            <span class="nav-link-text"> Tăng sub/follow
                                                                (vip)</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/sub-sale');?>">
                                                            <span class="nav-link-text"> Tăng sub/follow
                                                                (sale)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/sub-speed/order');?>">
                                                            <span class="nav-link-text"> Tăng sub/follow
                                                                (Speed)</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/like-page-sale');?>">
                                                            <span class="nav-link-text"> Tăng like/follow page
                                                                (sale)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/like-page-speed/order');?>">
                                                            <span class="nav-link-text"> Tăng like/follow page
                                                                (speed)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/eye-live/order');?>">
                                                            <span class="nav-link-text"> Tăng mắt live</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/view-video/order');?>">
                                                            <span class="nav-link-text"> Tăng view video</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/share-profile/order');?>">
                                                            <span class="nav-link-text"> Tăng chia sẻ
                                                                (profile)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/member-group');?>">
                                                            <span class="nav-link-text"> Tăng thành viên
                                                                nhóm</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/view-story');?>">
                                                            <span class="nav-link-text"> Tăng view story</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_facebook_vip">
                                            <span class="nav-link-text">Facebook Vip</span>
                                        </a>
                                        <ul id="service_facebook_vip" class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/vip-like');?>"><span
                                                                class="nav-link-text">Vip like + cảm
                                                                xúc</span></a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_facebook_ad_break">
                                            <span class="nav-link-text">Facebook Ad Break</span>
                                        </a>
                                        <ul id="service_facebook_ad_break"
                                            class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/facebook/view-other');?>"><span
                                                                class="nav-link-text">600k phút</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_instagram">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/instagram.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch Vụ Instagram</span>

                        </a>
                        <ul id="service_instagram" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/instagram/like-post');?>"><span
                                                class="nav-link-text">Tăng like bài viết</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/instagram/sub');?>"><span
                                                class="nav-link-text">Tăng sub/follow</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_tiktok">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/tiktok.svg?123" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch vụ Tiktok</span>
                        </a>
                        <ul id="service_tiktok" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_tiktok_buff">
                                            <span class="nav-link-text">Tiktok Buff</span>
                                        </a>
                                        <ul id="service_tiktok_buff" class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/like');?>">
                                                            <span class="nav-link-text">Tăng like (thả
                                                                tim)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/comment');?>">
                                                            <span class="nav-link-text">Tăng bình luận</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/share');?>">
                                                            <span class="nav-link-text">Tăng chia sẻ</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/sub');?>">
                                                            <span class="nav-link-text">Tăng sub/follow</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/view');?>">
                                                            <span class="nav-link-text">Tăng view video</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/eye-live/order');?>">
                                                            <span class="nav-link-text">Tăng mắt live</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#service_tiktok_vip">
                                            <span class="nav-link-text">Tiktok Vip</span>
                                        </a>
                                        <ul id="service_tiktok_vip" class="nav flex-column collapse  nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?=BASE_URL('service/tiktok/vip-like/order');?>"><span
                                                                class="nav-link-text">Vip like (thả
                                                                tim)</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_youtube">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/youtube.svg" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch Vụ Youtube</span>

                        </a>
                        <ul id="service_youtube" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/youtube/like');?>"><span
                                                class="nav-link-text">Tăng like video</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/youtube/view');?>"><span
                                                class="nav-link-text">Tăng view video</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_twitter">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/twitter.svg?1" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch Vụ Twitter</span>

                        </a>
                        <ul id="service_twitter" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/twitter/like/order');?>"><span
                                                class="nav-link-text">Tăng like</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/twitter/sub/order');?>"><span
                                                class="nav-link-text">Tăng sub/follow</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#service_shopee">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="/jampack/dist/img/svg/shopee.svg?323" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Dịch Vụ Shopee</span>

                        </a>
                        <ul id="service_shopee" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/shopee/love');?>"><span
                                                class="nav-link-text">Tăng love</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=BASE_URL('service/shopee/sub');?>"><span
                                                class="nav-link-text">Tăng sub/follow</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="callout card card-flush bg-orange-light-5 text-center mt-5 w-220p mx-auto">
                <div class="card-body">
                    <h5 class="h5"><?=$getUser['username'];?></h5>
                    <button class="btn btn-primary btn-block"><?=number_format($my_money);?> coin</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Menu -->
</div>
<!-- / End Siderbar -->

<div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
<!-- /Vertical Nav -->