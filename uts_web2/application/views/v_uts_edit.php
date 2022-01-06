<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta createdby="12201191">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
		integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Data Pegawai</title>
</head>

<body>
	<div class="container">
		<form action="<?= base_url('uts/update') ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12 mt-2">
					<h3>Data Pegawai Control Panel</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">NIP</label>
					<input type="text" class="form-control" name="nip" id="" value="<?= $pegawai['nip'] ?>"
						placeholder="Masukkan NIP">
					<span style="color: red;"><?= form_error('nip') ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">Nama pegawai</label>
					<input type="text" class="form-control" name="nama" id="" value="<?= $pegawai['nama'] ?>"
						placeholder="Masukkan Nama Pegawai">
					<span style="color: red;"><?= form_error('nama') ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">Status Pernikahan</label>
					<?php if($pegawai['status'] == 'Menikah'): ?>
					<div class="form-check">
						<input class="form-check-input" type="radio" checked name="status" id="menikah" value="Menikah">
						<label class="form-check-label" for="menikah">
							Menikah
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="status" id="belum" value="Belum Menikah">
						<label class="form-check-label" for="belum">
							Belum Menikah
						</label>
					</div>
					<span style="color: red;"><?= form_error('status') ?></span>
					<?php elseif($pegawai['status'] == 'Belum Menikah'):?>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="status" id="menikah" value="Menikah">
						<label class="form-check-label" for="menikah">
							Menikah
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" checked name="status" id="belum"
							value="Belum Menikah">
						<label class="form-check-label" for="belum">
							Belum Menikah
						</label>
					</div>
					<span style="color: red;"><?= form_error('status') ?></span>
					<?php endif?>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">Jabatan</label>
					<select name="jabatan" class="form-control" id="">
						<option value="">~ Pilih ~</option>
						<?php if($pegawai['jabatan'] == 'staff'): ?>
						<option selected value="staff">Staff</option>
						<option value="sekretaris">Sekretaris</option>
						<option value="marketing">Marketing</option>
						<?php elseif($pegawai['jabatan'] == 'sekretaris'): ?>
						<option value="staff">Staff</option>
						<option selected value="sekretaris">Sekretaris</option>
						<option value="marketing">Marketing</option>
						<?php elseif($pegawai['jabatan'] == 'marketing'): ?>
						<option value="staff">Staff</option>
						<option value="sekretaris">Sekretaris</option>
						<option selected value="marketing">Marketing</option>
						<?php endif ?>


					</select>
					<span style="color: red;"><?= form_error('jabatan') ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">Gaji</label>
					<input type="text" class="form-control" name="gaji" value="<?= $pegawai['gaji'] ?>" id=""
						placeholder="Masukkan Gaji">
					<span style="color: red;"><?= form_error('gaji') ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<label for="">Tunjangan</label>
					<input type="text" class="form-control" name="tunjangan" id="" value="<?= $pegawai['tunjangan'] ?>"
						placeholder="Masukkan Tunjangan">
					<span style="color: red;"><?= form_error('tunjangan') ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-7 mt-3">
					<div class="row">
						<div class="col">
							<label for="">Upload Foto</label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<img class="w-50 image-fluid" src="<?= base_url('./assets/foto/'.$pegawai['foto']) ?>"
								alt="" srcset="">
						</div>
					</div>
					<input type="file" name="foto" class="form-control mt-3" id="">
					<span style="color: red;"><?= form_error('foto') ?></span>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mt-3">Simpan</button>
			<button type="reset" class="btn btn-danger mt-3">Batal</button>
		</form>
	</div>


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>

</body>

</html>
