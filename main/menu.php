<div id="sup">
	<ul id="navmenu-h">
		<!-- NOME DO SISTEMA -->
		<li>
                    <a href="home.php" class="sist">
                        <img src="../imagens/layout/aluno.png"/>SGF - <?php echo $_SESSION['usuario']['nome']?>
                    </a>
                </li>
		<?php
                    if( $_SESSION['usuario']['tipo'] == 1 
                        or $_SESSION['usuario']['tipo'] == 2 
                            or $_SESSION['usuario']['tipo'] == 3 
                                or $_SESSION['usuario']['tipo'] == 4 ){
                ?>            
		
		<li><a href="#" class="main">PRODUTO</a>
			<ul>
                            <li><a href="cadProduto.php">MANTER PRODUTO</a></li>
                            <li><a href="Entrada.php">ENTRADA PRODUTO</a></li>
			</ul>
		</li>
                
                <?php
                    if( $_SESSION['usuario']['tipo'] == 1 
                        or $_SESSION['usuario']['tipo'] == 2 ){
                            ?>
                <li><a href="cadFornecedor.php" class="main">FORNECEDOR</a>
		</li>
                <?php } ?>
		
		<li><a href="#" class="main">LISTAS</a>
			<ul>
                            <li><a href="listarProdutos.php">LISTAR PRODUTOS</a></li>
                            <li><a href="estoque.php">LISTAR ESTOQUE</a></li>
                            <li><a href="listarFornecedores.php">LISTAR FORNECEDORES</a></li>
                            <?php
                                if( $_SESSION['usuario']['tipo'] == 1 ){
                            ?>
                            <li><a href="listarVendas.php">VENDAS</a></li>
                            <!--<li><a href="vendasIgrejas.php">VENDAS POR IGREJAS</a></li>
                            <li><a href="listarDoacoes.php">LISTAR DOA&Ccedil;&Otilde;es</a></li>-->
                            <?php } ?>
			</ul>
		</li>
		
		<li><a href="#" class="main">C&oacute;digo de barras</a>
			<ul>
                            <li><a href="codBarraProduto.php">por PRODUTO</a></li>
			</ul>
		</li>
                
                <?php
                    if( $_SESSION['usuario']['tipo'] == 1 ){
                ?>
                
                <li><a href="cadUsuario.php" class="main">USU&Aacute;RIO</a></li>
                
                <?php } ?>
                
                <?php } ?>
                
                <?php
                    if( $_SESSION['usuario']['tipo'] == 5 or $_SESSION['usuario']['tipo'] == 1 ){
                ?>
                
                <li><a href="venda.php" class="main" style="color: #2dff00; font-weight:bold;">VENDER</a></li>
                
                <?php } ?>
                
		<li><a class="sair" href="../function/logout.php">SAIR</a></li>
                
                
	</ul>
</div>
