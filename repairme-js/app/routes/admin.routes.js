module.exports = (app, express) => {

	const router = express.Router();

	router.get('/', (req, res) => {
		if (req.session.user) {
			if (req.session.user.jenis === "admin") {
				res.render('./admin/index', {
					judul: 'Dashboard Admin',
					data: req.session.user
				})
			}
		}else{
			req.flash('message', "User tidak terdeteksi!");
			res.redirect('/login');
		}
		
	});

	app.use('/admin', router);

}