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

<<<<<<< HEAD
	router.get('/kerusakan_laptop', (req, res) => {
		res.render('./admin/kerusakan/laptop', {
			judul: 'Kerusakan Laptop'
		})
	})
=======

>>>>>>> caa07e5ef6fcc48e236bb471819a3c8c57e5813b

	app.use('/admin', router);

}