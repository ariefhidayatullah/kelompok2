module.exports = (app, express) => {
	const user = require('../controllers/user.controller.js');
	const router = express.Router();

	router.get('/email', user.findAllEmail);
	router.post('/auth', user.auth);
	app.use('/api/user', router);

	app.get('/login', (req, res) => {
		if (req.session.user) {
			console.log(req.session.user.jenis)
		}
		res.render('login/index', {
			judul: 'Login',
			message: req.flash('message')
		});
	})
	app.get('/logout', (req, res) => {
		req.session.destroy(() => {
			res.redirect('/login');
		})
	})

}