<div class="sidebar" data-color="purple" data-background-color="white">
    <div class="logo">
        <a href="{{ route('author-post', [auth()->user()->slug]) }}" class="simple-text logo-mini">
            <img src="{{ auth()->user()->avatar }}" alt="Logo" height="100px" width="100px" class="img img-rounded"
                style="border-radius: 50%">
        </a>
        <a href="{{ route('author-post', [auth()->user()->slug]) }}" class="simple-text logo-normal">
            {{ auth()->user()->name ?? 'Blog Name' }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backpanel.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            @role('admin')
                <li class="nav-item @if (Request::is('backpanel/user*')) active @endif">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="material-icons">face</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item @if (Request::is('backpanel/role*')) active @endif">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="material-icons">group_work</i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item @if (Request::is('backpanel/permission*')) active @endif">
                    <a class="nav-link" href="{{ route('permission.index') }}">
                        <i class="material-icons">https</i>
                        <p>Permission</p>
                    </a>
                </li>
            @endrole

            @hasrole(['admin', 'editor'])
                <li class="nav-item @if (Request::is('backpanel/category*')) active @endif">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <i class="material-icons">all_inbox</i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item @if (Request::is('backpanel/tag*')) active @endif">
                    <a class="nav-link" href="{{ route('tag.index') }}">
                        <i class="material-icons">tags</i>
                        <p>Tags</p>
                    </a>
                </li>
                <li class="nav-item @if (Request::is('backpanel/comment*')) active @endif">
                    <a class="nav-link" href="{{ route('comment.index') }}">
                        <i class="material-icons">message</i>
                        <p>Comments</p>
                    </a>
                </li>
                <li class="nav-item @if (Request::is('backpanel/site-settings')) active @endif" style="margin-bottom: 250px">
                    <a class="nav-link" href="{{ route('setting.index') }}">
                        <i class="material-icons">settings</i>
                        <p>Site Settings</p>
                    </a>
                </li>
            @endhasrole

            <li class="nav-item @if (Request::is('backpanel/post*')) active @endif">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <i class="material-icons">article</i>
                    <p>Posts</p>
                </a>
            </li>

            <!-- your sidebar here -->
        </ul>
    </div>
</div>
