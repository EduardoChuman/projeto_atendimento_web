		
			<footer class="main-footer">
				<strong>VICOP 2019. GEOPC \ CEOPC - </strong> Equipe de desenvolvimento.
			</footer>
		<!-- ./wrapper -->

		<!-- Controle de demandas da Esteira e Atualização da Base SUINT -->
		<!-- <script src="js/controle_demandas_e_data_base_suint.js"></script> -->

		<!-- jQuery 2.2.3 -->
		<script src="../../esteiracomex2/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script  src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"
  		integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="
  		crossorigin="anonymous"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script>
			$(function () {
				$('#myModal').modal('show');
				$("#example1").DataTable();
				$("#example2").DataTable();
				$("#example3").DataTable();
				$("#example4").DataTable();
				$("#example5").DataTable();
				$("#example6").DataTable();
				$("#example7").DataTable();
				$("#example8").DataTable();
				$("#example9").DataTable();
				$("#example10").DataTable();
				$("#example11").DataTable();
				$("#example12").DataTable();
				$("#example13").DataTable();
				$("#example14").DataTable();
				$("#example15").DataTable();
				$("#example16").DataTable();
				$("#example17").DataTable();
				$("#example18").DataTable();
				$("#example19").DataTable();
				$("#example20").DataTable();
				$("#example21").DataTable();
				$("#example22").DataTable();
				$("#example22").DataTable();
				$("#example23").DataTable();
				$("#example24").DataTable();
				$("#example25").DataTable();
				$("#example26").DataTable();
				$('#example30').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
				});
				//Initialize Select2 Elements
				$(".select2").select2();
				//Carousel
				$('#myCarousel').carousel({
					interval: 50000
					, pause: 'hover'
					, wrap: true
				});

				$('#myCarouseldois').carousel({
					interval: 100000
					, pause: 'hover'
					, wrap: true
				});

				$('.carousel .item').each(function(){
					var next = $(this);
					var last;
					for (var i=0;i<3;i++) {
						next=next.next();
						if (!next.length) {
							next = $(this).siblings(':first');
						}
						last=next.children(':first-child').clone().appendTo($(this));
					}
					last.addClass('rightest');
				});

				$(".select2").select2();
				//Envio Rápido
				$("#envio_rapido_incluir_fase").click(function(){
					$("[envio_rapido_2fase]").show();
					$("[enviar_rapido_incluir_fase]").hide();
				});
				$("#envio_rapido_excluir_fase").click(function(){
					$("[envio_rapido_2fase]").hide();
					$("[enviar_rapido_incluir_fase]").show();
				});
				//troca de botão das esteiras 

				$('#collapsedepropostas').on('shown.bs.collapse', function(){
					$(this).parent().find(".fa-angle-double-right").first().removeClass("fa-angle-double-right").addClass("fa-angle-double-down");
				}).on('hidden.bs.collapse', function(){
					$(this).parent().find(".fa-angle-double-down").first().removeClass("fa-angle-double-down").addClass("fa-angle-double-right");
				});
			});
		</script>

		<!-- DataTables -->
		<script src="../../esteiracomex2/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../../esteiracomex2/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../../esteiracomex2/bootstrap/js/bootstrap.min.js"></script>
		<!-- Select2 -->
		<script src="../../esteiracomex2/plugins/select2/select2.full.min.js"></script>
		<!-- InputMask -->
		<script src="../../esteiracomex2/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../../esteiracomex2/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../../esteiracomex2/plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- Sparkline -->
		<script src="../../esteiracomex2/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="../../esteiracomex2/plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="../../esteiracomex2/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="../../esteiracomex2/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="../../esteiracomex2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="../../esteiracomex2/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../../esteiracomex2/plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="../../esteiracomex2/dist/js/app.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<!--script src="dist/js/pages/dashboard.js"></script-->
		<!-- AdminLTE for demo purposes -->
		<script src="../../esteiracomex2/dist/js/demo.js"></script>