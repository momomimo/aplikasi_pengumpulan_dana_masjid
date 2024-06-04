<div class="container mt-3 mb-5">
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="profile card card-body px-3 pt-3 pb-0">
				<div class="profile-head">
					<div class="photo-content">
						<div class="cover-photo rounded"></div>
					</div>
					<div class="profile-info">
						<div class="profile-photo">
							<img src="<?= base_url('assets/') ?>images/logo-full.png" class="img-fluid rounded-circle" alt="">
						</div>
						<div class="profile-details">
							<div class="profile-name px-3 pt-2">
								<h4 class="text-primary mb-0">Pengajian Akbar</h4>
								<p>PPAK STNYEL 2025</p>
							</div>
							<div class="profile-email px-2 pt-2">
								<h4 class="text-muted mb-0">Informasi Donasi</h4>
								<p><b>Rekening BNI An. Paguyuban Warga RW III No. Rekening 179.8871.278</b> <br>
									Konfirmasi Donasi/Sodakoh dapat melalui menu konfirmasi atau hubungi Admin kami dengan menyertakan bukti transfer.
								</p>
							</div>
							<div class="dropdown ms-auto">
								<a href="https://wa.me/<?= $get_profil[0]['nohp_kantor'] ?>" target="_blank" class="btn btn-primary dark sharp" aria-expanded="true"><i class="fab fa-whatsapp fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<div class="profile-statistics">
								<div class="text-center">
									<div class="row">
										<div class="col">
											<h3 class="m-b-0"><?php echo number_format($get_total_masuk[0]['nominal'], 0, ',', ','); ?></h3><span>Saldo Masuk</span>
										</div>
										<div class="col">
											<h3 class="m-b-0"><?php echo number_format($get_total_keluar[0]['nominal'], 0, ',', ','); ?></h3><span>Saldo Keluar</span>
										</div>
										<div class="col">
											<h3 class="m-b-0"><?php echo number_format($get_total_masuk[0]['nominal'] - $get_total_keluar[0]['nominal'], 0, ',', ','); ?></h3><span>Sisa Saldo</span>
										</div>
									</div>
									<div class="mt-4">
										<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Konfirmasi Donasi Sekarang</a>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="sendMessageModal">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Konfirmasi Donasi Online</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											</div>
											<form action="<?= base_url('homepage/tambah_data') ?>" method="POST" enctype="multipart/form-data">
												<div class="modal-body">
													<div class="basic-form">
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Nama Donatur</label>
															<div class="col-sm-9">
																<input type="text" name="nama_donatur" class="form-control" placeholder="Jika dikosongkan nama akan menjadi Hamba Allah">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Alamat Donatur</label>
															<div class="col-sm-9">
																<input type="text" name="alamat_donatur" class="form-control" placeholder="Optional">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">No. WhatsaApp</label>
															<div class="col-sm-9">
																<input type="tel" name="nowa" required class="form-control" placeholder="Penulisan menggunakan 62, Cth : 628123xxxx">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Nominal</label>
															<div class="col-sm-9">
																<input type="tel" name="nominal" required class="form-control" id="rupiah">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Metode Bayar</label>
															<div class="col-sm-9">
																<select name="via" class="form-control" id="">
																	<option value="Bank BNI">BANK BNI Rek. 1798871278 Paguyuban Warga RW III</option>
																</select>
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Tanggal</label>
															<div class="col-sm-9">
																<input type="date" name="tanggal" required class="form-control" value="<?= date('Y-m-d') ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Keterangan</label>
															<div class="col-sm-9">
																<input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">
															</div>
														</div>
														<div class="mb-3 row">
															<label class="col-sm-3 col-form-label">Bukti Transfer </label>
															<div class="col-sm-9">
																<input type="file" name="bukti_tf" required class="form-control">
																<p>JPG,JPEG,PNG Max 1 MB</p>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="no_admin" value="<?= $get_profil[0]['nohp_kantor'] ?>">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<div class="profile-blog">
								<h5 class="text-primary d-inline">Informasi Umum</h5>
								<img src="<?= base_url('assets/') ?>images/profile/1.jpg" alt="" class="img-fluid mt-4 mb-4 w-100">
								<h4><a href="post-details.html" class="text-black">Caranya mudah berdonasi Online: </a></h4>
								<ol>
									<li>1. Transfer ke Rekening BNI An. Paguyuban Warga RW III No. Rekening 179.8871.278.</li>
									<li>2. Klik tombol “Konfirmasi Donasi sekarang!”.</li>
									<li>3. Masukan Informasi Donatur, Nama, Alamat, No. WhatsApp dan Nominal Donasi.</li>
									<li>4. Lampirkan Bukti Transfer.</li>
									<li>5. Selesai. Terima kasih, #OrangBaik!.</li>
								</ol>
								<h4><a href="post-details.html" class="text-black">Konfirmasi Melalui WhatsApp Admin: </a></h4>
								<ol>
									<li>1. Hubungi Admin kami dengan melalui Tombol WhatsApp dengan Nomor WhatsApp Admin <?php echo $get_profil[0]['nohp_kantor']; ?></li>
									<li>2. Kirim Pesan dengan melampirkan bukti transfer.</li>
									<li>3. Selesai. Terima kasih, #OrangBaik!.</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8">
			<div class="card">
				<div class="card-body">
					<div class="profile-tab">
						<div class="custom-tab-1">
							<ul class="nav nav-tabs">
								<li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Kegiatan</a>
								</li>
								<li class="nav-item"><a href="#my-posts2" data-bs-toggle="tab" class="nav-link ">Galery</a>
								</li>
								<li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">Saldo Masuk</a>
								</li>
								<li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Saldo Keluar</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="my-posts" class="tab-pane fade active show">
									<div class="my-post-content pt-3">
										<div class="profile-uoloaded-post border-bottom-1 pb-5">
											<img src="<?= base_url('assets/') ?>images/profile/8.jpg" alt="" class="img-fluid w-100 rounded">
											<a class="post-title" href="post-details.html">
												<h3 class="text-black">Rapat Panitia Pengajaian Akbar </h3>
											</a>
											<p>Berdikusi mengenai pengumpulan anggaran dan sebagainya.</p>

										</div>
									</div>
								</div>
								<div id="my-posts2" class="tab-pane fade">
									<div class="my-post-content pt-5">
										<div class="profile-interest">
											<div class="row mt-4 sp4" id="lightgallery">
												<a href="<?= base_url('assets/') ?>images/profile/2.jpg" data-exthumbimage="<?= base_url('assets/') ?>images/profile/2.jpg" data-src="<?= base_url('assets/') ?>images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="<?= base_url('assets/') ?>images/profile/2.jpg" alt="" class="img-fluid">
												</a>
												<a href="<?= base_url('assets/') ?>images/profile/3.jpg" data-exthumbimage="<?= base_url('assets/') ?>images/profile/3.jpg" data-src="<?= base_url('assets/') ?>images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="<?= base_url('assets/') ?>images/profile/3.jpg" alt="" class="img-fluid">
												</a>
												<a href="<?= base_url('assets/') ?>images/profile/4.jpg" data-exthumbimage="<?= base_url('assets/') ?>images/profile/4.jpg" data-src="<?= base_url('assets/') ?>images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="<?= base_url('assets/') ?>images/profile/4.jpg" alt="" class="img-fluid">
												</a>
												<a href="<?= base_url('assets/') ?>images/profile/5.jpg" data-exthumbimage="<?= base_url('assets/') ?>images/profile/5.jpg" data-src="<?= base_url('assets/') ?>images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="<?= base_url('assets/') ?>images/profile/5.jpg" alt="" class="img-fluid">
												</a>
												<a href="<?= base_url('assets/') ?>images/profile/6.jpg" data-exthumbimage="<?= base_url('assets/') ?>images/profile/6.jpg" data-src="<?= base_url('assets/') ?>images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="<?= base_url('assets/') ?>images/profile/6.jpg" alt="" class="img-fluid">
												</a>
											</div>
										</div>
									</div>
								</div>
								<div id="about-me" class="tab-pane fade">
									<div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height800">
										<ul class="timeline">
											<?php $no = 0;
											$a = array("primary", "primary", "success", "warning", "danger", "dark", "info");
											$random_keys = array_rand($a, 7);
											foreach ($get_data_masuk as $riwayat) : ?>
											<li>
												<div class="timeline-badge <?php echo $a[$random_keys[$no++]] ?>"></div>
												<a class="timeline-panel text-muted" href="#">
													<span><?php echo $riwayat['tanggal']; ?></span>
													<h6 class="mb-0">Bapak/Ibu <?php echo $riwayat['nama_donatur']; ?> telah berdonasi melalui <?php echo $riwayat['via']; ?> Sejumlah Rp. <strong class="text-primary"><?php echo number_format($riwayat['nominal'], 0, ',', ','); ?></strong>.</h6>
													<p class="mb-0"><?php echo $riwayat['keterangan']; ?> </p>
												</a>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<div id="profile-settings" class="tab-pane fade">
									<div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height800">
										<ul class="timeline">
											<?php $no = 0;
											$a = array("primary", "primary", "success", "warning", "danger", "dark", "info");
											$random_keys = array_rand($a, 7);
											foreach ($get_data_keluar as $riwayat) : ?>
											<li>
												<div class="timeline-badge <?php echo $a[$random_keys[$no++]] ?>"></div>
												<a class="timeline-panel text-muted" href="#">
													<span><?php echo $riwayat['tanggal']; ?></span>
													<h6 class="mb-0">Pengeluaran Saldo Sejumlah Rp. <strong class="text-primary"><?php echo number_format($riwayat['nominal'], 0, ',', ','); ?></strong>.</h6>
													<p class="mb-0">Guna Keperluan : <?php echo $riwayat['keterangan']; ?> </p>

												</a>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="replyModal">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Post Reply</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<form>
											<textarea class="form-control" rows="4">Message</textarea>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
										<button type="button" class="btn btn-primary">Reply</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>