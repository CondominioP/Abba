<?php
	
	include "conexao.php";
	$sql = "SELECT * FROM usuario ORDER BY Id";
	$abba = $condominio -> prepare($sql);
	$abba -> execute();
?>
<?php
	$id = $_GET['Id'];
	
	include "conexao.php";
	$sql = "SELECT * FROM usuario WHERE Id = $id";
	$abba = $condominio -> prepare($sql);
	$abba -> execute();

	
	foreach($abba as $editar){
		@$nome  			= $editar ["Nome_completo"];
		@$email 			= $editar["Email"];
		@$cargo  			= $editar["Cargo"];
		@$data_nasc			= $editar["Data_Nasc"];
		@$data_admissao 	= $editar["Data_admissao"];
		@$num_bloco			= $editar["Num_Bloco"];
		@$num_ap			= $editar["Num_Ap"];
		@$senha				= $editar["Senha"];
	};

	
	if(isset($_POST['editar'])){

		$nome  				= $_POST["nome"];
		$email 				= $_POST["email"];
		$cargo  			= $_POST["cargo"];
		$data_nasc  		= $_POST["data_nasc"];
		$data_admissao	 	= $_POST["data_adm"];
		$num_bloco			= $_POST["bloco"];
		$num_ap				= $_POST["num_ap"];
		$senha				= $_POST["senha"];
		$sql = "
			UPDATE usuario
			SET 
			Nome_Completo = ?,
			Email = ?,
			Cargo = ?,
			Data_Nasc = ?,
			Data_admissao = ?,
			Num_Bloco = ?,
			Num_Ap = ?,
			Senha = ?
			WHERE Id = $id";
				
		$abba = $condominio -> prepare($sql);	
		$abba -> execute(array($nome,$email,$cargo,$data_nasc,$data_admissao,$num_bloco,$num_ap,$senha));	
		$abba = null; //Encerra a conexão com o BD
		header("Location:lista.php");
	
	}
?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>ABBA Condomínios</title>
		<link rel="shortcut icon" type="image/png" href="../img/office.png"> <!---- Icone da aba ---->
		<!-- Páginas de Estilo -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="../css/material.min.css">
		<link rel="stylesheet" href="../css/estilo.css">
	</head>
		<style>
			#view-source {
				position: fixed;
				display: block;
				right: 0;
				bottom: 0;
				margin-right: 40px;
				margin-bottom: 40px;
				z-index: 900;
			}
			.container{
				width:800px;
				margin:0 auto;
				margin-bottom:80px;
				background-color:white;
				border-radius:15px;
			}
			#left{
				margin-left:15px;
			}
			#tamanho{
				margin-bottom:50px;
			}
			body{
				background-image:URL('../img/predio.png');
				background-repeat:no-repeat;
				background-size:cover;
			}
		</style>
	</head>
	<body>
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<div class="android-header mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row"> <!---- INÍCIO DO HEADER---->
					<span class="android-title mdl-layout-title">
					<a href="../index.html"><img class="android-logo-image" src="../img/1.png"></a><!---- LOGO DO SITE---->
					</span>
				  <!-- Add spacer, to align navigation to the right in desktop -->
					<div class="android-header-spacer mdl-layout-spacer"></div>
					<div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label     mdl-textfield--align-right mdl-textfield--full-width"> <!---- BUSCA---->
						<label class="mdl-button mdl-js-button mdl-button--icon" for="search-field"> 
						  <i class="material-icons">search</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
						  <input class="mdl-textfield__input" type="text" id="search-field">
						</div>
					</div> <!----  FIM BUSCA---->
				  <!-- NAVEGAÇÃO -->
					<div class="android-navigation-container"> <!---- BANDEIRAS---->
						<nav class="android-navigation mdl-navigation">
							<a href="../login/sair.php"><button><img src="../img/enter.png"></button></a>
							<button onclick="portugues()"><img src="../img/brazil.png"></button>
							<button onClick="ingles()"><img src="../img/usa.png"></button>
							<button onClick="espanhol()"><img src="../img/espanha.png"></button>
						</nav>
					</div>
					<span class="android-mobile-title mdl-layout-title">
						<a href="../index.html"> <img class="android-logo-image" src="../img/1.png"></a>
					</span>
				</div>
			</div> <!---- FIM HEADER---->
			<div class="android-content mdl-layout__content"> </div>
			<div class="android-drawer mdl-layout__drawer"> <!---- MENU HAMBURGUER---->
				<span class="mdl-layout-title">
				  <img class="image" src="../img/1.png">
				</span>
				<nav class="mdl-navigation">
				 <a class="mdl-navigation__link" href="login/login.html"> <i class="material-icons">person</i>&nbsp&nbspLogin</a>
						<a class="mdl-navigation__link" href="galeria/galeria.html"> <i class="material-icons">perm_media</i>&nbsp&nbspGaleria</a>
						<a class="mdl-navigation__link" href="noticias/noticias.html"><img src="img/newspaper.png">&nbsp&nbspNotícias</a>
						<a class="mdl-navigation__link" href="duvidas/duvidas.html"><i class="material-icons">help</i>&nbsp&nbspDúvidas Frequentes</a>
						<a class="mdl-navigation__link" href="enquetes/enquetes.html"><i class="material-icons">assessment</i>&nbsp&nbspEnquetes</a>
						<a class="mdl-navigation__link" href="seguranca/seguranca.html"><i class="material-icons">lock</i>&nbsp&nbspSegurança</a>
						<a class="mdl-navigation__link" href="mural/mural.html"><i class="material-icons">info</i>&nbsp&nbspMural de Avisos</a>
				  <a class="mdl-navigation__link" href="planta/planta.html"><i class="material-icons">home</i>&nbsp&nbspPlanta</a>
				</nav>
			</div> <!---- FIM MENU HAMBURGUER---->
			<h2 align="center" class="mdl-color-text--indigo-800"> <!---- INÍCIO CADASTRO ---->
				Editar
			</h2>
			<div class="container mdl-shadow--2dp through mdl-shadow--16dp">
				<h3 align="left" class="mdl-color-text--indigo-500" id="left"> <!---- INÍCIO TIPO DE USUÁRIO ---->
					Dados Pessoais
				</h3>
				<form method="POST" action="">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Nome Completo</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="nome1" name="nome" value="<?php echo $nome; ?>">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="nome1">Nome completo...</label>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Data de Nascimento</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="data" name="data_nasc" value="<?php echo $data_nasc; ?>">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="nome1">Data de nascimento...</label>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col left">
							<h6 class="mdl-color-text--blue-grey-900">Telefone Residencial</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="tel" name="tele_res">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sample4">Telefone Residencial</label>
								<span class="mdl-textfield__error">Não é um número!</span>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Telefone Celular</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="cel" name="tel_cel">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sample4">Telefone Celular</label>
								<span class="mdl-textfield__error">Não é um número!</span>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">E-mail</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="email" name="Email" value="<?php echo $email; ?>">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sobrenome">Email...</label>
							</div>
						</div>	
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Senha</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="password" id="senha" name="senha" maxlength="8" value="<?php echo $senha; ?>">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="senha">Senha...</label>
							</div>
						</div>
					</div>
					<h3 align="left" class="mdl-color-text--indigo-500" id="left"> <!---- INÍCIO TIPO DE USUÁRIO ---->
						Tipo de Usuário
					</h3>
					<div class="mdl-cell mdl-cell--12-col mdl-cell--2-col-phone">
						<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
							<div class="mdl-tabs__tab-bar">
								<a href="#morador" class="mdl-tabs__tab is-active">Morador</a>
								<a href="#funcionario" class="mdl-tabs__tab">Funcionário</a>
							</div>
							<div class="mdl-tabs__panel is-active" id="morador">
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--6-col">
										<h6 class="mdl-color-text--blue-grey-900">Número do Apartamento</h6>
										<div class="mdl-textfield mdl-js-textfield">
											<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="nume_ap" name="num_ap" value="<?php echo $num_ap; ?>">
											<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sample4">Número do Apartamento...</label>
											<span class="mdl-textfield__error">Não é um número!</span>
										</div>
									</div>
									<div class="mdl-cell mdl-cell--6-col">
										<h6 class="mdl-color-text--blue-grey-900">Bloco</h6>
										<div class="mdl-textfield mdl-js-textfield">
											<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="bloco" name="bloco" value="<?php echo $num_bloco; ?>">
											<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sample4">Bloco...</label>
											<span class="mdl-textfield__error">Não é um número!</span>
										</div>
									</div>
								</div>
							</div>
							<div class="mdl-tabs__panel" id="funcionario">
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--5-col">
										<h6 class="mdl-color-text--blue-grey-900">Cargo</h6>
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
											<input type="radio" id="option-1" class="mdl-radio__button" name="cargo"  <?php if($cargo=="Conselheiro"){echo "checked";} ?>>
											<span class="mdl-radio__label">Conselheiro</span>
										</label>
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
											<input type="radio" id="option-2" class="mdl-radio__button" name="cargo" <?php if($cargo=="Zelador"){echo "checked";} ?>>
											<span class="mdl-radio__label">Zelador</span>
										</label>
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
											<input type="radio" id="option-3" class="mdl-radio__button" name="cargo" <?php if($cargo=="Porteiro"){echo "checked";} ?>>
											<span class="mdl-radio__label">Porteiro</span>
										</label>
									</div>
									<div class="mdl-cell mdl-cell--6-col">
										<h6 class="mdl-color-text--blue-grey-900">Data de Admissão</h6>
										<div class="mdl-textfield mdl-js-textfield">
											<input class="mdl-textfield__input" type="text" id="data_adm" name="data_adm" value="<?php echo $data_admissao; ?>">
											<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="sample4">Data de admissão...</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--8-col"></div>
						<div class="mdl-cell mdl-cell--2-col">
							<a href="lista.php"><input type="button" value="Voltar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"></a>
						</div>
						<div class="mdl-cell mdl-cell--2-col">
							<input type="submit" value="salvar" name ="editar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
						</div>
					</div>
				</form>
			</div>
			<footer class="android-footer mdl-mega-footer"> <!---- INÍCIO RODAPÉ---->
				<div class="mdl-mega-footer--top-section"> <!---- INÍCIO REDES SOCIAIS---->
					<div class="mdl-mega-footer--right-section">
					  <span id="span">
						Visite nossas redes sociais:
					  </span>
					  <img src="../img/facebook.png">
					  &nbsp;&nbsp;
					  <img src="../img/twitter.png">
					  &nbsp;&nbsp;
					  <img src="../img/instagram.png">
					  &nbsp;&nbsp;
					  <img src="../img/telefone.png">
					  &nbsp;&nbsp;
					  <img src="../img/whatsapp.png">
					</div>
				</div> <!---- FIM REDES SOCIAIS---->
				<div class="meio"> <!---- ENDEREÇO E TELEFONE---->
					<img src="../img/1.png" class="left">
					<div id="direita">
					  <p id="tipo">Localização:&nbsp; R. Francisco Raitani, 6120  -  Capão Raso, Curitiba - PR</p>
					  <p id="tipo1">Localização:&nbsp; R. Francisco Raitani, 6120</p>
					  <p id="tipo2">Telefone: &nbsp; (41) 4002-8922</p>
					</div>
				</div> <!---- FIM ENDEREÇO E TELEFONE---->
				<div class="mdl-mega-footer--bottom-section">
					<center>&#169; ABBA Condomínios 2017 - 2018</center>
				</div>
			</footer>
		</div>
		<script src="../js/material.min.js"></script>
	</body>
</html>
       