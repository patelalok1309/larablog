<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <div style="cursor: pointer;">
                            <button type="submit" style="border: none" class="d-flex justify-content-center align-items-center">
                                <i class="material-icons">delete</i> Logout
                            </button>
                        </div>
                    </form>
                </li>
                <!-- your navbar here -->
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
