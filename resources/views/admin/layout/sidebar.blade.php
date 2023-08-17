<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.user.index') }}">
                    <i class="fas fa-home"></i>
                    All user
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.user.create') }}">
                    <i class="fas fa-home"></i>
                    Create user
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.index') }}">
                    <i class="fas fa-file-image"></i>
                     All blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.create') }}">
                    <i class="fas fa-file-image"></i>
                    Create Blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="fas fa-file-image"></i>
                    All products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.create') }}">
                    <i class="fas fa-file-image"></i>
                    Create Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fas fa-folder-open"></i>
all categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.brand.index') }}">
                    <i class="fas fa-comments"></i>
                    all brands
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.comment.index') }}">
                    <i class="fas fa-file-image"></i>
                    All comments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.comment.create') }}">
                    <i class="fas fa-file-image"></i>
                    create comments
                </a>
            </li>

        </ul>

    </div>
</nav>
