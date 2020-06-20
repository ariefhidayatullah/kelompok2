module.exports = (app, express) => {

    const router = express.Router();

    router.get('/', (req, res) => {
        console.log(req.session)
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                res.render('pelanggan/index', {
                    judul: 'Dashboard Pelanggan',
                    email: req.session.user.email
                })
            }
        } else {
            res.redirect('/login');
        }
    });

    router.get('/registrasi', (req, res) => {
        res.render('pelanggan/registrasi', {
            judul: 'Registrasi Pelanggan'
        });
    });




    app.use('/pelanggan', router);

}