@include('layouts.header')
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
	@include('layouts.main-nav')
    @include('layouts.main-menu')

    <div class="app-content content container-fluid admin-roles">
		<div class="content-wrapper">
		    <div class="content-body">
				<section id="basic-form-layouts">
					<div class="row match-height">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title" id="basic-layout-form-center"><?= Route::currentRouteName(); ?></h4>
								</div>
								<div class="card-body collapse in">
									<div class="card-block">
										<div class="user-type-wrapper">
											<select name="user-type" class="form-control">
												<option value="0" selected disabled>Selecione o tipo de usuário...</option>
												<?php
													foreach ($user_types as $key => $type) { ?>
														<option value="<?= $type->id ?>" <?= $role[0]->role_id == $type->id? "selected": ""; ?>><?= $type->name; ?></option>
													<? }
												?>
											</select>
										</div>

										<form class="form teacher-admin-form" id="form_1" method="post" action="" style="display: <?= $role[0]->user_id == 4? "none": "block"; ?>; margin-top: 35px;" >
											@csrf
											<input type="hidden" value="1" name="user_type_id">
											<h4 class="form-section">
												<i class="icon-head"></i>
												Identificação
											</h4>
											<div class="row">
												<div class="col-md-6">
													<div class="form-body">
														<div class="form-group">
															<label for="name">Nome</label>
															<input type="text" id="name" class="form-control" value="<?= $dados->name ?>" name="name">
                                                        </div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="email">Senha para login</label>
														<input type="text" id="password" class="form-control" value="" name="password">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-body">
														<div class="form-group">
															<label for="name">E-mail</label>
															<input type="text" id="email" class="form-control" value="<?= $dados->email ?>" name="email">
                                                        </div>
													</div>
												</div>
											</div>
											<div class="form-actions center">
												<button type="button" class="btn btn-warning mr-1">
													<i class="icon-cross2"></i> Cancelar
												</button>
												<button type="submit" class="btn btn-primary">
													<i class="icon-check2"></i> Salvar
												</button>
											</div>
										</form>

										<form class="form user-form" method="post" action="" style="display: <?= $role[0]->user_id == 4? "block": "none"; ?>">
											@csrf
											<div class="row">
												<div class="col-md-12">
													<div class="form-body">
													<form class="form user-form" id="form_4" method="post" action="" style="display: none;">
														@csrf
														<input type="hidden" value="4" name="user_type_id">
														<h4 class="form-section" style="margin-top: 30px;">
															<i class="icon-head"></i>
															Identificação
														</h4>
														<div class="row">
															<div class="col-md-6">
																<div class="form-body">
																	<div class="form-group">
																		<label for="name">Nome</label>
																		<input type="text" id="name" class="form-control" value="<?= $dados->name; ?>" name="name">
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-body">
																	<div class="form-group">
																		<label for="name">E-mail</label>
																		<input type="text" id="email" class="form-control" value="<?= $dados->email; ?>" name="email">
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="email">Senha para login</label>
																	<input type="text" id="password" class="form-control" value="" name="password">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="date_of_birth">Data de nascimento</label>
																	<?php
																		if($role[0]->role_id == 4) {
																			$date = $student->date_of_birth;
																			$day = substr($date, 8);
																			$month = substr($date, 5, 2);
																			$year = substr($date, 0, 4);
																			$datetime = DateTime::createFromFormat("Y-m-d", "$year-$month-$day");
																		} else {
																			$datetime = "";
																		}
																	?>
																	<input type="text" id="date_of_birth" class="form-control" value="<?= $datetime? $datetime->format("d/m/Y"): ""; ?>" name="date_of_birth">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="state">Estado</label>
																	<select name="state_id" class="form-control" id="state">
																		<option value="0" selected disabled>Selecione um estado...</option>
																		<?php
																			if($student) {
																				foreach ($states as $key => $state) { ?>
																					<option value="<?= $state->id ?>" <?= $student->state_id == $state->id? "selected": ""; ?>><?= $state->name; ?></option>
																				<? }
																			}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="city">Cidade</label>
																	<select name="city_id" class="form-control" id="city">
																		<option value="0">Selecione uma cidade...</option>
																		<?php
																			if($student) {
																				foreach ($cities as $key => $city) {
																					if($city->state_id == $student->state_id) { ?>
																						<option value="<?= $city->id ?>" <?= $student->city_id == $city->id? "selected": ""; ?>><?= $city->name; ?></option>
																					<? }
																				}
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="city">Curso</label>
																	<select name="city_id" class="form-control" id="city">
																		<option value="0">Selecione um curso...</option>
																		<?php
																			if($student) {
																				foreach ($courses as $key => $course) { ?>
																					<option value="<?= $course->id ?>" <?= $student->course_id == $course->id? "selected": ""; ?>><?= $course->name; ?></option>
																				<? }
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<h4 class="form-section">
															<i class="icon-users3"></i>
															Filiação
														</h4>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="mother_name">Nome da mãe</label>
																	<input type="text" id="mother_name" class="form-control" value="<?= $student? $student->mother_name: ""; ?>" name="mother_name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="mother_document">Documento da mãe</label>
																	<input type="text" id="mother_document" class="form-control" value="<?= $student? $student->mother_document: ""; ?>" name="mother_document">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="father_name">Nome do pai</label>
																	<input type="text" id="father_name" class="form-control" value="<?= $student? $student->father_name: ""; ?>" name="father_name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="father_document">Documento do pai</label>
																	<input type="text" id="father_document" class="form-control" value="<?= $student? $student->father_document: ""; ?>" name="father_document">
																</div>
															</div>
														</div>

														<h4 class="form-section">
															<i class="icon-address-book"></i>
															Endereço
														</h4>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="zipcode">CEP</label>
																	<input type="text" id="zipcode" class="form-control" value="<?= $student? $student->zipcode: ""; ?>" name="zipcode">
																</div>
															</div>
															<div class="col-md-6">
																<div class="row">
																	<div class="col-md-8">
																		<div class="form-group">
																			<label for="address">Logradouro</label>
																			<input type="text" id="address" class="form-control" value="<?= $student? $student->address: ""; ?>" name="address">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<label for="number">Número</label>
																			<input type="text" id="number" class="form-control" value="<?= $student? $student->number: ""; ?>" name="number">
																		</div>
																	</div>
																	<div class="col-md-1">
																		<div class="form-group custom-checkbox">
																			<label for="no_number">S/N</label>
																			<div class="container">
																				<input type="checkbox" id="no_number" class="form-control" <?= $student? ($student->no_number == 1? "checked": ""): ""; ?> name="no_number">
																				<span class="checkmark"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="neighborhood">Bairro</label>
																	<input type="text" id="neighborhood" class="form-control" value="<?= $student? $student->neighborhood: ""; ?>" name="neighborhood">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="complement">Complemento</label>
																	<input type="text" id="complement" class="form-control" value="<?= $student? $student->complement: ""; ?>" name="complement">
																</div>
															</div>
														</div>

														<h4 class="form-section">
															<i class="icon-phone"></i>
															Contato
														</h4>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="cellphone">Celular</label>
																	<input type="text" id="cellphone" class="form-control" value="<?= $student? $student->cellphone: ""; ?>" name="cellphone">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="phone">Telefone</label>
																	<input type="text" id="phone" class="form-control" value="<?= $student? $student->phone: ""; ?>" name="phone">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="form-actions center">
												<button type="button" class="btn btn-warning mr-1">
													<i class="icon-cross2"></i> Cancelar
												</button>
												<button type="submit" class="btn btn-primary">
													<i class="icon-check2"></i> Salvar
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

    @include('layouts.footer')
</body>
</html>