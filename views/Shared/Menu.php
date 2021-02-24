<nav class=" navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="<?php echo PATH ?>/">
        <img src="<?php echo PATH ?>/public/assets/images/receitas-de-chefe.png" width="30" height="30"
             class="d-inline-block align-top" alt="">
        Receitas de Chefe
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Receitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">menu2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">menu3</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0 form_pesquisa">
            <input class="form-control mr-sm-2" type="search" placeholder="Procurar Receitas" aria-label="Search">
            <button class="btn btn-warning my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <ul class="navbar-nav" style="padding-right: 30px;">
        <?php if (!isset($_SESSION['email'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php print PATH ?>/Authentication/login">Login/Registar</a>
            </li>
        <?php else: ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['email'] ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print PATH ?>/Authentication/logOut">LogOut</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</nav>