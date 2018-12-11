		
		<?php 
		define('ORIGEM','http://www.geopc.mz.caixa/esteiracomex/');
		 ?>

			<style>
			.bg-orange-active{
				background-color: #ce7915;
			}
			</style>

			<!-- MENU LATERAL DA ESTEIRA -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header"><h4>GEOPC<br><b>ESTEIRA COMEX</b></h4></li>
						<li class="treeview">
							<a href=<?php echo ORIGEM . "index.php"?>>
								<i class="fa fa-dashboard"></i> <span>Introdução</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-sign-in"></i> <span>Solicitações</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href=<?php echo ORIGEM . "lista_acc.php" ?>><i class="fa fa-circle-o text-orange"></i> Liquidação de ACC \ ACE</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "lista_contratos.php"?>> 
									<i class="fa fa-circle-o text-orange"></i> Operações Antecipadas<br> - Comprovação de Embarque</a>
								</li>

								<li><a href="http://www.ceopc.sp.caixa/esteiracomex2/cadastro_email_cliente_comex.php"><i class="fa fa-circle-o text-orange"></i>Atualizar e-mail<br> - Cliente COMEX<span class="pull-right-container"><small class="label pull-right bg-green">NOVO</small></span></a></li>
								
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-files-o"></i>
								<span>Acompanhamento</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href= <?php echo ORIGEM ."acompanha_acc.php"?>> <i class="fa fa-circle-o text-orange"></i> ACC \ ACE
									<span class="pull-right-container"></span>
								</a>
								</li>
								<li>
									<a href= <?php echo ORIGEM . "finalizadas.php"?>> <i class="fa fa-circle-o text-orange"></i> LIQUIDADAS<span class="pull-right-container"></span>
									</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "acompanha_conformidade.php" ?>><i class="fa fa-circle-o text-orange"></i>OPERAÇÕES ANTECIPADAS<span class="pull-right-container"></span>
									</a>
								</li>

								<?php
									if(($usuario=='c079436')||($perfil_user=='499')){  
								?>
								<li>
									<a href=<?php echo ORIGEM . "gelit.php" ?>><i class="fa fa-circle-o text-orange"></i>GELIT</a>
								</li>
								<?php
									}
								?>

								<?php
									if(($usuario=='c079436')||($perfil_user=='501')){
								?>
								<li>
									<a href= <?php echo ORIGEM ."middleoffice.php" ?>><i class="fa fa-circle-o text-orange"></i>MIDDLE OFFICE</a>
								</li>
								<?php
									}
								?>
							
								<?php
									if(($perfil_user=='500')||($perfil_user=='700')){  
								?>
								<li>
									<a href=<?php echo ORIGEM ."minhasdemandas.php" ?>><i class="fa fa-circle-o text-orange"></i>Minhas Demandas<span class="pull-right-container"> 
										<small class="label pull-right bg-navy">
											
											<!-- <?php echo $badget_usuario;?> -->
												
											</small>
											<small class="label pull-right bg-maroon">
												<!-- <?php echo $badget_cadastrada_antecipados_usuario;?> -->
											</small></span></a>
								</li>
								<?php
									}
								?>
							</ul>
						</li>

						<?php
							if($perfil_user>='500'){   
						?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-gear"></i> <span>Controles</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href=<?php echo ORIGEM ."opes_enviadas.php" ?>><i class="fa fa-circle-o text-orange"></i>Envio de Ordens</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "pesquisa_envio.php" ?>><i class="fa fa-circle-o text-orange"></i>Middle-Pesquisa
										<span class="pull-right-container">
											<small class="bg-orange-active label pull-right ">NOVO</small>
										</span>
									</a>
								</li>
							</ul>
						</li>
						<?php
							}
						?>

						<!-- PERFIL AUDITORES CONSULTAS  -->
						<?php
							if($perfil_user=='99'){   
						?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-gear"></i>
								<span>Controles</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href= <?php echo ORIGEM ."opes_enviadas.php"?>>
										<i class="fa fa-circle-o text-orange"></i>Envio de Ordens
									</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "esteira.php" ?>>
										<i class="fa fa-circle-o text-orange"></i>Esteira de Liquidações
									</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM ."gerencial_ceopc.php" ?>>
										<i class="fa fa-circle-o text-orange"></i>Painel ACC \ ACE
									</a>
								</li>
								<li>
									<a href= <?php echo ORIGEM ."indicadores.php" ?>>
										<i class="fa fa-circle-o text-orange"></i>INDICADORES
									</a>
								</li>
								<li>
									<a href= <?php echo ORIGEM . "gerencial_gecam.php" ?>>
										<i class="fa fa-circle-o text-orange"></i>GECAM
										<span class="pull-right-container">
											<small class="bg-orange-active label pull-right">NOVO</small>
										</span>
									</a>
								</li>
							</ul>
						</li>
						<?php
							}
						?>

						<!-- /FIM PERFIL AUDITORES CONSULTAS  -->

						<?php
							if(($perfil_user>='200')||($perfil_user=='498')){  
						?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-television"></i><span> Gerencial</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
							<?php
								if($perfil_user=='700'){
							?>
								<li>
									<a href= <?php echo ORIGEM . "distribuir.php" ?>><i class="fa fa-circle-o text-orange"></i>Distribuição
										<span class="pull-right-container">
											<small class="label pull-right bg-purple">
											<!-- 	<?php echo $badget_cadastrada_antecipados;?> -->
											</small>
											<small class="label pull-right bg-yellow">
											<!-- 	<?php echo $badget_cadastrada;?> -->
											</small>
										</span>
									</a>
							<?php
								}
							?>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "esteira.php" ?>><i class="fa fa-circle-o text-orange"></i>Esteira de Liquidações</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "indicadores.php"?>> <i class="fa fa-circle-o text-orange"></i>INDICADORES</a>
								</li>
								<li>
									<a href= <?php echo ORIGEM . "realize_caixa_2018.php"?>> <i class="fa fa-circle-o text-orange"></i>REALIZE 2018<span class="pull-right-container">
										<small class="bg-orange-active label pull-right">NOVO</small></span>
									</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "gerencial_gecam.php"?>><i class="fa fa-circle-o text-orange"></i>GECAM <span class="pull-right-container">
									</a>
								</li>


							<?php
								if($perfil_user=='700'){  
							?>
								<li>
									<a href=<?php echo ORIGEM . "gelit_2.php"?>><i class="fa fa-circle-o text-orange"></i>GELIT</a>
								</li>
								<li>
									<a href=<?php echo ORIGEM . "middleoffice_2.php"?>><i class="fa fa-circle-o text-orange"></i>MIDDLE OFFICE</a>
								</li>
							<?php
							}
							?>
								<li>
									<a href=<?php echo ORIGEM . "gerencial_ceopc.php"?>><i class="fa fa-circle-o text-orange"></i>Painel ACC \ ACE </a>
								</li>
							</ul>
						</li>
					
						<?php
							if($perfil_user=="700"){  
						?>
						<li>
							<a href="#">
								<i class="fa fa-th"></i> <span>Administrador</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href=<?php echo ORIGEM . "acessos.php"?>><i class="fa fa-circle-o text-orange"></i>ACESSOS</a>
								</li>
							</ul>
						</li>
					 	<?php
							}
						?>
						<?php
							}
						?>
						<li class="header">Documentos</li>
						<li>
							<a href=<?php echo ORIGEM . "cartilha.pdf"?>><i class="fa fa-download text-orange"></i><span>Manual do Usuário &nbsp <i class="fa fa-file-pdf-o text-gray-light"></i></span></a>
						</li>
						<li>
							<a href=<?php echo ORIGEM . "ClienteAutorizaEnvioEmail.docx"?>><i class="fa fa-download text-orange"></i><span>Autorização e-mail COMEX &nbsp <i class="fa fa-file-word-o text-gray-light"></i></span></a>
						</li>
					</ul>
				</section>
			</aside>