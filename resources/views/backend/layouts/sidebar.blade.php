<nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="index.html"><img class="main-logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
        <strong><img src="{{ asset('assets/img/logo/logosn.png') }}" alt="" /></strong>
    </div>
    <div class="nalika-profile">
        <div class="profile-dtl">
            <a href="#"><img src="{{ Auth()->user()->image ?? 'assets/img/notification/4.jpg' }}"
                    alt="" /></a>
            <h2> <span class="min-dtn"></span></h2>
        </div>
        <div class="profile-social-dtl">
            <ul class="dtl-social">
                <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
            <ul class="metismenu" id="menu1">
                {{-- <li>
                    <a class="has-arrow" href="index.html">
                        <i class="icon nalika-home icon-wrap"></i>
                        <span class="mini-click-non">Ecommerce</span>
                    </a>
                    <ul class="submenu-angle" aria-expanded="true">
                        <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">Dashboard
                                    v.1</span></a></li>
                        <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Dashboard
                                    v.2</span></a></li>
                        <li><a title="Dashboard v.3" href="index-2.html"> <span class="mini-sub-pro">Dashboard
                                    v.3</span></a></li>
                        <li><a title="Product List" href="product-list.html"><span class="mini-sub-pro">Product
                                    List</span></a></li>
                        <li><a title="Product Edit" href="product-edit.html"><span class="mini-sub-pro">Product
                                    Edit</span></a></li>
                        <li><a title="Product Detail" href="product-detail.html"><span class="mini-sub-pro">Product
                                    Detail</span></a></li>
                        <li><a title="Product Cart" href="product-cart.html"><span class="mini-sub-pro">Product
                                    Cart</span></a></li>
                        <li><a title="Product Payment" href="product-payment.html"><span class="mini-sub-pro">Product
                                    Payment</span></a></li>
                        <li><a title="Analytics" href="analytics.html"><span class="mini-sub-pro">Analytics</span></a>
                        </li>
                        <li><a title="Widgets" href="widgets.html"><span class="mini-sub-pro">Widgets</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa fa-users"></i>
                        &nbsp<span class="mini-click-non">Nhân sự</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Inbox" href="{{ route('admin.user.index') }}"><span class="mini-sub-pro">Danh
                                    sách</span></a>
                        </li>
                        <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">Thêm mới</span></a>
                        </li>
                        {{-- <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Compose
                                    Mail</span></a></li> --}}
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                            class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Loại
                            phòng</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Data Maps" href="{{ route('admin.typeroom.index') }}"><span
                                    class="mini-sub-pro">Danh sách</span></a>
                        </li>
                        <li><a title="Google Map" href="{{ route('admin.typeroom.create') }}"><span
                                    class="mini-sub-pro">Thêm mới</span></a>
                        </li>

                        {{-- <li><a title="Pdf Viewer" href="pdf-viewer.html"><span class="mini-sub-pro">Pdf
                                    Viewer</span></a></li>
                        <li><a title="X-Editable" href="x-editable.html"><span
                                    class="mini-sub-pro">X-Editable</span></a></li>
                        <li><a title="Code Editor" href="code-editor.html"><span class="mini-sub-pro">Code
                                    Editor</span></a></li>
                        <li><a title="Tree View" href="tree-view.html"><span class="mini-sub-pro">Tree
                                    View</span></a></li>
                        <li><a title="Preloader" href="preloader.html"><span
                                    class="mini-sub-pro">Preloader</span></a></li>
                        <li><a title="Images Cropper" href="images-cropper.html"><span class="mini-sub-pro">Images
                                    Cropper</span></a></li> --}}
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                            class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Quản lý
                            phòng</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Blog" href="{{ route('admin.room.index') }}"><span class="mini-sub-pro">Danh
                                    sách</span></a>
                        </li>
                        <li><a title="File Manager" href="{{ route('admin.room.add') }}"><span class="mini-sub-pro">Thêm
                                    mới</span></a></li>

                        {{-- <li><a title="Blog Details" href="blog-details.html"><span class="mini-sub-pro">Blog
                                    Details</span></a></li>
                        <li><a title="404 Page" href="404.html"><span class="mini-sub-pro">404
                                    Page</span></a></li>
                        <li><a title="500 Page" href="500.html"><span class="mini-sub-pro">500
                                    Page</span></a></li> --}}
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                            class="icon nalika-bar-chart icon-wrap"></i> <span class="mini-click-non">Dịch vụ</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Bar Charts" href="{{ route('admin.service.index') }}"><span
                                    class="mini-sub-pro">Danh sách
                                </span></a></li>
                        <li><a title="Line Charts" href="{{ route('admin.service.add') }}"><span
                                    class="mini-sub-pro">Thêm
                                    mới</span></a></li>

                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                            class="icon nalika-smartphone-call icon-wrap"></i> <span class="mini-click-non">Hóa
                            đơn</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Notifications" href="{{ route('admin.bill.index') }}"><span
                                    class="mini-sub-pro">Danh
                                    sách</span></a></li>
                        {{-- <li><a title="Alerts" href="alerts.html"><span class="mini-sub-pro">Alerts</span></a>
                        </li>
                        <li><a title="Modals" href="modals.html"><span class="mini-sub-pro">Modals</span></a>
                        </li>
                        <li><a title="Buttons" href="buttons.html"><span class="mini-sub-pro">Buttons</span></a></li>
                        <li><a title="Tabs" href="tabs.html"><span class="mini-sub-pro">Tabs</span></a>
                        </li>
                        <li><a title="Accordion" href="accordion.html"><span
                                    class="mini-sub-pro">Accordion</span></a></li> --}}
                    </ul>
                </li>
                <li id="removable">
                    <a class="has-arrow" href="#" aria-expanded="false"><i
                            class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Phản hồi</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Login" href="{{ route('admin.contact.index') }}"><span class="mini-sub-pro">Danh
                                    sách</span></a>
                        </li>
                        {{-- <li><a title="Register" href="register.html"><span class="mini-sub-pro">Thêm mới</span></a> --}}
                </li>

            </ul>
            </li>
            <li>
                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                        class="icon nalika-table icon-wrap"></i> <span class="mini-click-non">Banner</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                    <li><a title="Peity Charts" href="{{ route('admin.banner.index') }}"><span
                                class="mini-sub-pro">Danh
                                sách</span></a></li>
                    <li><a title="Data Table" href="{{ route('admin.banner.add') }}"><span class="mini-sub-pro">Thêm
                                mới</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                        class="icon nalika-forms icon-wrap"></i> <span class="mini-click-non">Voucher</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                    <li><a title="Basic Form Elements" href="{{ route('admin.voucher.index') }}"><span
                                class="mini-sub-pro">Danh sách</span></a></li>
                    <li><a title="Advance Form Elements" href="{{ route('admin.voucher.add') }}"><span
                                class="mini-sub-pro">Thêm mới</span></a></li>
                </ul>
            </li>
            </ul>
        </nav>
    </div>
</nav>
