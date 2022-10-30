<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Personal</li>
            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                <i class="fe fe-file-text"></i>
                <span class="nav-title">Category</span></a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('category.admin') }}'>Create Directory</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                <i class="fe fe-file-text"></i>
                <span class="nav-title">Product</span></a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('product.admin') }}'>Post products</a> </li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                <i class="fa fa-shopping-basket"></i>
                <span class="nav-title">Order</span>
                <span class="nav-label label label-danger">{{ $countOrder }}</span>
            </a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('viewOrderItemCheckout.admin') }}'>Order List</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fe fe-user-plus"></i> <span class="nav-title">Member</span></a>
                <ul aria-expanded="false">
                    <li> <a href="{{ route('home.admin.Moremembers') }}">More members</a> </li>

                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="dashicons dashicons-admin-comments"></i><span class="nav-title">Manage comments</span> </a>
                <ul aria-expanded="false">
                    <li> <a href="{{ route('viewUserComment.website') }}">Components</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
