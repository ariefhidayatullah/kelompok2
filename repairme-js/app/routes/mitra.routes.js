const path = require('path');

module.exports = (app, express) => {

    const router = express.Router();

    router.get('/', (req, res) => {
       if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                res.render('mitra/index', {
                judul: 'Dashboard Mitra',
                email: req.session.user.email
                })
            }
       }else{
            res.redirect('/login');
       }
    });

    router.get('/registrasi', (req, res) => {
        res.render('mitra/registrasi', {
            judul: 'Registrasi Mitra'
        });
    });

    router.get('/profile', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                res.render('mitra/profile/index', {
                judul: 'Profile Mitra',
                email: req.session.user.email
                })
            }
       }else{
            res.redirect('/login');
       }
    });

    app.use('/mitra', router);

}