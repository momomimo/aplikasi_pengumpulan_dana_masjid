const flashData = $(".flash-data").data("flashdata");

if (flashData == "pendaftaranberhasil") {
	Swal.fire({
		title: "Sukses",
		text: "Pendaftaran Anda berhasil, tunggu email balasan dari Admin. Terima Kasih",
		type: "success",
	});
} else if (flashData == "login") {
	Swal.fire({
		title: "Sukses",
		text: "Selamat Anda Berhasil Login",
		type: "success",
	});
} else if (flashData == "logout") {
	Swal.fire({
		title: "Sukses",
		text: "Selamat Anda Berhasil Logout",
		type: "success",
	});
} else if (flashData == "sendpesan") {
	Swal.fire({
		title: "Sukses",
		text: "Pesan Anda sudah terkirim, Mohon ditunggu balasannya. Terimakasih",
		type: "success",
	});
} else if (flashData == "verifikasiotp") {
	Swal.fire({
		title: "Sukses",
		text: "Satu Langkah Lagi, silahkan masukan Kode OTP yang sudah kami kirimkan melalui pesan WhatsApp. Jika ada kendala dapat menghubungi CS Kami.",
		type: "success",
	});
} else if (flashData == "verifikasioke") {
	Swal.fire({
		title: "Sukses",
		text: "Akun Anda sudah Aktif, Selamat Bergabung dengan Kami. Silahkan Login",
		type: "success",
	});
} else if (flashData == "simpan") {
	Swal.fire({
		title: "Sukses",
		text: "Selamat Data Berhasil Disimpan.",
		type: "success",
	});
} else if (flashData == "donatur") {
	Swal.fire({
		title: "Sukses",
		text: "Terima kasih Konfirmasi Bapak/Ibu telah kami terima dan segera kami proses. Terima Kasih sudah ikut berpartisipasi dalam Pengajian Akbar PPAK STNYEL 2025.",
		type: "success",
	});
} else if (flashData == "gagal") {
	Swal.fire({
		title: "Gagal",
		text: "Data Gagal Disimpan",
		type: "error",
	});
} else if (flashData == "lengkapidata") {
	Swal.fire({
		title: "Mohon Lengkapi Data",
		text: "Terima Kasih Sudah Bergabung dengan DLA Alap-alap, mohon dibantu lengkapi data terlebih dahulu.",
		type: "error",
	});
} else if (flashData == "gagalotp") {
	Swal.fire({
		title: "Gagal",
		text: "Mohon maaf, Kode OTP yang Anda masukan salah.",
		type: "error",
	});
} else if (flashData == "gagalhp") {
	Swal.fire({
		title: "Gagal",
		text: "Mohon maaf, nomor WhatsApp Anda tidak sesuai dengan yang di Daftarkan",
		type: "error",
	});
} else if (flashData == "gagallogin") {
	Swal.fire({
		title: "Login Gagal",
		text: "Maaf, Username atau Password yang Anda masukan salah. Silahkan Hub. CS DLA-Center",
		type: "error",
	});
} else if (flashData == "emailready") {
	Swal.fire({
		title: "Gagal",
		text: "Maaf, No. KTP Anda sudah terdaftar. Silahkan Hub. Admin",
		type: "error",
	});
} else if (flashData == "gagalresi") {
	Swal.fire({
		title: "Gagal",
		text: "No. Resi tidak ditemukan, silahkan hubungi CS kami.",
		type: "error",
	});
} else if (flashData == "rubah") {
	Swal.fire({
		title: "Sukses",
		text: "Data Berhasil Dirubah",
		type: "success",
	});
} else if (flashData == "profile_update") {
	Swal.fire({
		title: "Sukses",
		text: "Data Berhasil Kami Update, Silahkan Login Ulang. Terima Kasih.",
		type: "success",
	});
} else if (flashData == "delete") {
	Swal.fire({
		title: "Sukses",
		text: "Produk Berhasil Dihapus",
		type: "success",
	});
} else if (flashData == "bayar") {
	Swal.fire({
		title: "Sukses",
		text: "Pesanan Anda sudah kami terima, silahkan melakukan pembayaran. Terima Kasih",
		type: "success",
	});
} else if (flashData == "berhasilkonfirmasi") {
	Swal.fire({
		title: "Sukses",
		text: "Konfirmasi Anda berhasil dilakukan, silahkan tunggu informasi selanjutnya.",
		type: "success",
	});
} else if (flashData == "ditemukan") {
	Swal.fire({
		title: "Sukses",
		text: "Pesanan Anda Berhasil Ditemukan.",
		type: "success",
	});
} else if (flashData == "aksestidakdizinkan") {
	Swal.fire({
		title: "Akses Di Tolak",
		text: "Akses Ilegal, Mohon untuk tidak mengulai perintah tersebut lagi. Terima Kasih",
		type: "error",
	});
}
