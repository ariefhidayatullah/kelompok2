module.exports = (app, express) => {

	const router = express.Router();

	router.get('/', (req, res) => {
		res.render('./admin/index', {
			judul: 'Dashboard Admin',
			message: req.flash('message'),
			success: req.flash('success'),
			error: req.flash('error')
		})
		// if (req.session.user) {
		// 	if (req.session.user.jenis === "admin") {
		// 		res.render('./admin/index', {
		// 			judul: 'Dashboard Admin',
		// 			data: req.session.user
		// 		})
		// 	}
		// } else {
		// 	req.flash('message', "User tidak terdeteksi!");
		// 	res.redirect('/login');
		// }

	});

	router.get('/laptop', (req, res) => {
		res.render('./admin/barang/laptop', {
			judul: 'Data Laptop',
			message: req.flash('message'),
			success: req.flash('success'),
			error: req.flash('error')
		});
	});

	router.get('/handphone', (req, res) => {
		res.render('./admin/barang/hp', {
			judul: 'Data handphone',
			message: req.flash('message'),
			success: req.flash('success'),
			error: req.flash('error')
		});
	});

	router.get('/kerusakan_laptop', (req, res) => {
		res.render('./admin/kerusakan/laptop', {
			judul: 'Kerusakan Laptop'
		})
	});


	router.get('/kerusakan_handphone', (req, res) => {
		res.render('./admin/kerusakan/hp', {
			judul: 'Kerusakan Laptop'
		})
	})

	router.get('/paket', (req, res) => {
		res.render('./admin/paket/index', {
			judul: 'Paket Biaya Iklan'
		})
	})

	router.get('/permintaan_verifikasi', (req, res) => {
		res.render('./admin/paket/permintaan_verifikasi', {
			judul: 'Paket Biaya Iklan'
		})
	})


	router.get('/data_mitra', (req, res) => {
		res.render('./admin/data/data_mitra', {
			judul: 'Data Mitra'
		})
	})

	router.get('/data_pelanggan', (req, res) => {
		res.render('./admin/data/data_pelanggan', {
			judul: 'Data Pelanggan'
		})
	})

	app.use('/admin', router);

}