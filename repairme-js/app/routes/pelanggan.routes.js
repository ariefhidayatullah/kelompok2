module.exports = (app, express) => {

    const router = express.Router();

    router.get('/', (req, res) => {
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

    router.get('/profile', (req, res) => {
        res.render('pelanggan/profile', {
            judul: 'profile'
        });
    });
    router.get('/pengajuan/:jenis', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                if (req.params.jenis === "laptop") {
                    res.render('pelanggan/perbaikan/pengajuan/laptop', {
                        judul: 'Pengajuan Perbaikan',
                        email: req.session.user.email
                    })
                } else if (req.params.jenis === "handphone") {
                    res.render('pelanggan/perbaikan/pengajuan/handphone', {
                        judul: 'Pengajuan Perbaikan',
                        email: req.session.user.email
                    })
                } else {
                    next()
                }
            } else {
                next()
            }
        } else {
            res.redirect('/login');
        }
    })



    app.use('/pelanggan', router);

}