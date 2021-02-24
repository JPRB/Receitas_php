<div class="container">
    <h1>Pessoas</h1>
    <h3>LISTAR REGISTOS</h3>

    <br/>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Dificuldade</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $receita): ?>
            <tr>
                <td>
                    <img src="<?php echo PATH?>/public/assets/images/<?php echo $receita->img; ?>"  class="img-thumbnail thumbnail" >
                </td>
                <td>
                    <?php echo $receita->nome; ?>
                </td>
                <td>
                    <?php echo $receita->dificuldade; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div id="receitas" onchange="showReceitas(this.value)">

    </div>
</div>
