<div class="body-login">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login">
                <h3></h3>


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                           aria-controls="login" aria-selected="true">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="registar-tab" data-toggle="tab" href="#registar" role="tab"
                           aria-controls="registar"
                           aria-selected="false">Registar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div id="formLogin">
                            <form class="form-login" action="<?php echo PATH ?>/authentication/doLogin" method="post">
                            <?php if (isset($data["error"])): ?>
                                <label class="text-danger"><?php print $data["error"]?></label><?php endif; ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-Mail</label>
                                    <input type="email" class="form-control" name="email"
                                           aria-describedby="emailHelp"
                                           placeholder="Inserir e-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="pass"
                                           placeholder="Inserir a Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="registar" role="tabpanel" aria-labelledby="registar-tab">
                        <div id="formLogin">
                            <form class="form-login">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Primeiro Nome</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                           placeholder="Inserir Primeiro Nome">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apelido</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                           placeholder="Inserir Apelido">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data de Nascimento</label>
                                    <input type="date" class="form-control" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-Mail</label>
                                    <input type="email" class="form-control" aria-describedby="emailHelp"
                                           placeholder="Inserir e-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control"
                                           placeholder="Inserir a Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirmar Password</label>
                                    <input type="password" class="form-control"
                                           placeholder="Confirmar Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Registar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>