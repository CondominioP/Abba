<?php
	session_start();// Iniciar Session PHP 
	// Se o usuário não estiver logado manda ele para o formulário de login
	if ($_SESSION["Login"] != "YES") {
		header("Location: ../index.html");
	}
	@$id       			= "";
	
	
	if(isset($_POST["salvar"])){
		//Capturando os dados
		@$id       				= "";
		@$nome_comp				= $_POST["nome_comp"];
		@$tipo_prod				= $_POST["tipo_prod"];
		@$cep					= $_POST["cep"];
		@$rua					= $_POST["rua"];
		@$bairro				= $_POST["bairro"];
		@$cidade				= $_POST["cidade"];
		@$estado				= $_POST["estado"];
		
		//Conectando com o Banco
		include "../cadastro/conexao.php";		
		$sql = "INSERT INTO fornecedores VALUES (?,?,?)";
		$abba = $condominio -> prepare($sql);	
		$abba -> execute(array($id,$nome_comp,$tipo_prod));	
		$ultimaId = $condominio -> lastInsertId (); 
		$abba = null; //Encerra a conexão com o BD
		echo  "<script>alert('Cadastro realizado!');</script>";
		
		
		
		//TELEFONE----
		
		//Conectando com o Banco	
		$sql = "INSERT INTO endereco VALUES (?,?,?,?,?,?)";
		$abba = $condominio -> prepare($sql);	
		$abba -> execute(array($cep,$bairro,$estado,$cidade,$rua,$ultimaId));	
	}	
		
?>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  License6d under the Apache License, Version 2.0 (the "License");
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
				Cadastro
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
								<input class="mdl-textfield__input" type="text" id="nome2" name="nome_comp">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="nome2">Nome completo...</label>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Tipo de Produto</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="tipo_prod" name="tipo_prod">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="tipo_prod">Tipo de Produto...</label>
							</div>
						</div>
					</div>
					<h3 align="left" class="mdl-color-text--indigo-500" id="left"> <!---- INÍCIO TIPO DE USUÁRIO ---->
						Localização
					</h3>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">CEP</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="cep" name="cep">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="cep">Cep...</label>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Rua</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="rua" name="rua">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="rua">Rua...</label>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Bairro</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="bairro" name="bairro">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="bairro">Bairro...</label>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Cidade</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="cidade" name="cidade">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="cidade">Cidade...</label>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<h6 class="mdl-color-text--blue-grey-900">Estado</h6>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" id="estado" name="estado">
								<label class="mdl-textfield__label mdl-color-text--blue-grey-200" for="estado">Estado...</label>
							</div>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--8-col"></div>
						<div class="mdl-cell mdl-cell--2-col">
							<a href="../sindico/sindico.php"><input type="button" value="Voltar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"></a>
						</div>
						<div class="mdl-cell mdl-cell--2-col">
							<input type="submit" value="salvar" name ="salvar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
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
       