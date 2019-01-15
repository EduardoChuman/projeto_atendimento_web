			






			<!-- Header das páginas da Esteira -->
			<header class="main-header">
				<!-- Logotipo -->
				<a href="#" class="logo">
					<!-- Mini logotipo CAIXA -->
					<span class="logo-mini"><img class="logoMinPersonalizado"src="images/corp_min.jpg"></span>
					<!-- Logotipo CAIXA -->
					<span class="logo-lg"><img class="logoPersonalizado"src="images/caixa_corp_.jpg"></span>
				</a>
				
				<!-- Construção de Navbar (menu superior) header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<!--Modelo de Navbar tipo twiter , modelo de notificações-->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown messages-menu">
								<a class="dropdown-toggle">
									<i>CONFIDENCIAL #20</i>
								</a>
							</li>

							<?php
								if($perfil_user>='500'){
							?>

							<!-- Messages: style can be found in dropdown.less MINHAS DEMANDAS-->
				<!-- 			<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<b class="label label-success"><?php //echo $badget_usuario+$badget_cadastrada_antecipados_usuario;?></b>
								</a>
								<ul class="dropdown-menu">
									<li class="header text-center bg-gray-light">Olá, você possui nova(s) demanda(s):</li>
									<li class="header text-center bg-gray-light"> <?php //echo $badget_usuario;?> pedido(s) de liquidação</li>
									<li class="header text-center bg-gray-light"> <?php //echo $badget_cadastrada_antecipados_usuario;?> pedido(s) de conformidade</li>
									<li class="footer"><a href="minhasdemandas.php">Visualizar Minha(s) Demanda(s)</a></li>
								</ul>
							</li> -->
							<!--/MINHAS DEMANDAS-->

							<!--DISTRIBUIR-->
		<!-- 					<li class="dropdown messages-menu">
								<a href="distribuir.php" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label label-danger"><?php //echo $badget_cadastrada+$badget_cadastrada_antecipados;?></span> &nbsp
								</a>
								<ul class="dropdown-menu">
									<li class="header text-center bg-gray-light">Gestor, você deve designar:</li>
									<li class="header text-center bg-gray-light"> <?php //echo $badget_cadastrada;?> demanda(s) de liquidação.</li>
									<li class="header text-center bg-gray-light"> <?php //echo $badget_cadastrada_antecipados;?> demanda(s) de conformidade.</li>
									<li class="footer"><a href="distribuir.php">Distribuir Demandas à Equipe</a></li>
								</ul>
							</li> -->
							<!--/DISTRIBUIR-->

							<?php
							}
							?>
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<img src="https://permissoes.correio.corp.caixa.gov.br/ThumbPhoto/<?php //echo $usuario;?>_AD.jpg" class="user-image" alt="User Image" onError="this.src='dist/img/user2-160x160.jpg';">
					              -->
									<img src="http://www.sr2576.sp.caixa/2017/foto.asp?matricula=<?php echo $usuario;?>" class="user-image" alt="User Image" onError="this.src='../dist/img/user2-160x160.jpg';">
									<span class="hidden-xs"><?php echo $nome_abreviado;?></span>
								</a>
								<ul class="dropdown-menu">

									<!-- User image -->
									<li class="user-header">
										<p>
											<small>
												<!-- <?php echo $nome_user.'<br>'.$usuario;?> <br>Empregado CAIXA desde <?php echo $data_caixa_user.'<br>';?>
												<?php echo $unidade_user.'<br>';?>
												<?php echo 'PERFIL'.$perfil_user.'<br>';?>
												<?php echo $funcao_user.'<br>';?> -->
											</small>
										</p>
									</li>

									<!-- Menu Body -->

									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="#" class="btn btn-default btn-flat">Sair</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- Fim Construção de Navbar (menu superior) header.less -->
			</header>