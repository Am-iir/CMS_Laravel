<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Posts
    </div>

    <!-- Nav Item - Posts -->


    <li class="nav-item {{navActive('admin.posts')}}">
        <a class="nav-link {{isCollapsed('admin.posts')}}" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Post</span>
        </a>
        <div id="collapseTwo" class="collapse {{collapseShow('admin.posts')}}" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu</h6>
                <a class="collapse-item" href="{{route('admin.posts.index')}}">All Posts</a>
                <a class="collapse-item" href="{{route('admin.posts.create')}}">Add New</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tags -->

    <li class="nav-item {{navActive('admin.tags')}}">
        <a class="nav-link {{isCollapsed('admin.tags')}}" href="#" data-toggle="collapse" data-target="#collapseTag"
           aria-expanded="true" aria-controls="collapseTag">
            <i class="fas fa-tags"></i>
            <span>Tags</span>
        </a>
        <div id="collapseTag" class="collapse {{collapseShow('admin.tags')}}" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu</h6>
                <a class="collapse-item" href="{{route('admin.tags.index')}}">All Tags</a>
                <a class="collapse-item" href="{{route('admin.tags.create')}}">Add New</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories -->

    <li class="nav-item {{navActive('admin.category')}}">
        <a class="nav-link {{isCollapsed('admin.category')}}" href="#" data-toggle="collapse" data-target="#collapseCategory"
           aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse {{collapseShow('admin.category')}}" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu</h6>
                <a class="collapse-item" href="{{route('admin.category.index')}}">All Categories</a>
                <a class="collapse-item" href="{{route('admin.category.create')}}">Add New</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{navActive('admin.media')}}">
        <a class="nav-link {{isCollapsed('admin.media')}}" href="#" data-toggle="collapse" data-target="#collapseMedia"
           aria-expanded="true" aria-controls="collapseMedia">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Media</span>
        </a>
        <div id="collapseMedia" class="collapse {{collapseShow('admin.media')}}" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu</h6>
                <a class="collapse-item" href="{{route('admin.media.index')}}">Library</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
