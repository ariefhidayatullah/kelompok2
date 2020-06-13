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

	router.get('/kerusakan_laptop', (req, res) => {
		res.render('./admin/kerusakan/laptop', {
			judul: 'Kerusakan Laptop'
		})
	})


	app.use('/admin', router);

}