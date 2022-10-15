<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Tech Ecommerce</a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">
        <a href="{{ url('admin/home') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @if(Auth::user()->category == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">Category</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.categories') }}" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="{{ route('admin.sub.categories') }}" class="nav-link">Sub Categories</a></li>
                <li class="nav-item"><a href="{{ route('admin.brands') }}" class="nav-link">Brand</a></li>
            </ul>
        @endif

        @if(Auth::user()->coupon == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-pricetags-outline tx-24"></i>
                    <span class="menu-item-label">Coupons</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.coupon') }}" class="nav-link">Coupon</a></li>
            </ul>
        @endif
        @if(Auth::user()->product == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">Products</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.add.product') }}" class="nav-link">Add Product</a></li>
                <li class="nav-item"><a href="{{ route('admin.all.product') }}" class="nav-link">All Product</a></li>
            </ul>
        @endif
        @if(Auth::user()->order == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">Orders</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.order.new') }}" class="nav-link">New Order</a></li>
                <li class="nav-item"><a href="{{ route('admin.order.accept.list') }}" class="nav-link">Accepted
                        Payment</a></li>
                <li class="nav-item"><a href="{{ route('admin.order.process.list') }}" class="nav-link">Process Delivery</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.order.delivery.list') }}" class="nav-link">
                        Delivery Successfully</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.order.cancel.list') }}" class="nav-link">Cancel Order</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Others</a></li>
            </ul>
        @endif
        @if(Auth::user()->blog == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">Blog</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.all.blog.category') }}" class="nav-link">Post Category</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.create.blog.post') }}" class="nav-link">Post Add</a></li>
                <li class="nav-item"><a href="{{ route('admin.all.blog.post') }}" class="nav-link">Post List</a></li>
            </ul>
        @endif
        @if(Auth::user()->other == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Other</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.newslater') }}" class="nav-link">Newslatter</a></li>
                <li class="nav-item"><a href="{{ route('admin.seo') }}" class="nav-link">SEO Setting</a></li>
            </ul>
        @endif
        @if(Auth::user()->report == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Reports</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.today.order') }}" class="nav-link">Today Order</a></li>
                <li class="nav-item"><a href="{{ route('admin.today.delivery') }}" class="nav-link">Today Delivery</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.this.month') }}" class="nav-link">This Month Report</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.serach.report') }}" class="nav-link">Search Report</a>
                </li>
            </ul>
        @endif
        @if(Auth::user()->role == 1)
            {{-- USER ROLES --}}
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">User Role</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('create.admin') }}" class="nav-link">Create User</a></li>
                <li class="nav-item"><a href="{{ route('admin.all.users') }}" class="nav-link">All User</a>
                </li>
            </ul>
        @endif
        @if(Auth::user()->return == 1)
            {{-- RETURN ORDER --}}
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Return Order</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link">Return Order</a></li>
                <li class="nav-item"><a href="#" class="nav-link">All Request</a>
                </li>
            </ul>
        @endif
        @if(Auth::user()->contact == 1)
            {{-- CONTACT MESSAGE --}}
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Contact Message</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link">New Message</a></li>
                <li class="nav-item"><a href="#" class="nav-link">All Message</a>
                </li>
            </ul>
        @endif
        @if(Auth::user()->comment == 1)
            {{-- PRODUCT COMMENTS --}}
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Product Comment</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link">New Comment</a></li>
                <li class="nav-item"><a href="#" class="nav-link">All Comments</a>
                </li>
            </ul>
        @endif
        @if(Auth::user()->setting == 1)
            {{-- SITE SETTING --}}
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                    <span class="menu-item-label">Site Setting</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link">Site Setting</a></li>
            </ul>
        @endif
        <a target="blank" href="{{ url('/') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Live Website</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
