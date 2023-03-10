<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="<?= ROOT ?>home" class="navbar-brand" style="color: #fff">Tech Zone</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= ROOT ?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= ROOT ?>allproducts">All Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>

                    <ul class="dropdown-menu" style="max-height: 400px; overflow-y: auto;">
                        <?php foreach ($data['categories'] as $category) : ?>
                            <li><a class="dropdown-item" href="<?= ROOT ?>allproducts/<?= $category->categoryName ?>"><?= $category->categoryName ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (!isset($data['user_data'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT ?>login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT ?>signup">Signup</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($data['user_data'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT ?>profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT ?>logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>