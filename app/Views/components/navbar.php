<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">Ticketingflow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex w-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_to('staff.tasks') ?>">Task</a>
                </li>
                <li class="nav-item ms-auto">
                    <a class="d-block btn btn-outline-danger" href="<?= url_to('auth.logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>