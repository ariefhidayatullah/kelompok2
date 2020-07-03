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
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                res.render('pelanggan/profile', {
                    judul: 'Profile',
                    email: req.session.user.email
                })
            }
        } else {
            res.redirect('/login');
        }
    });
    router.get('/editProfile', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                res.render('pelanggan/editProfile', {
                    judul: 'Profile',
                    email: req.session.user.email
                })
            }
        } else {
            res.redirect('/login');
        }
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
    });

    router.get('/dibatalkan/:jenis', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                if (req.params.jenis === "laptop") {
                    res.render('pelanggan/perbaikan/dibatalkan/laptop', {
                        judul: 'Perbaikan Dibatalkan',
                        email: req.session.user.email
                    })
                } else if (req.params.jenis === "handphone") {
                    res.render('pelanggan/perbaikan/dibatalkan/handphone', {
                        judul: 'Perbaikan Dibatalkan',
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
    });

    router.get('/perbaikan/:jenis', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                if (req.params.jenis === "laptop") {
                    res.render('pelanggan/perbaikan/perbaikan/laptop', {
                        judul: 'Perbaikan',
                        email: req.session.user.email
                    })
                } else if (req.params.jenis === "handphone") {
                    res.render('pelanggan/perbaikan/perbaikan/handphone', {
                        judul: 'Perbaikan',
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
    });

    router.get('/notifikasi/', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'pelanggan') {
                res.render('pelanggan/notifikasi/index', {
                    judul: 'Pengajuan Perbaikan',
                    email: req.session.user.email
                })
            } else {
                next()
            }
        } else {
            res.redirect('/login');
        }
    });


    app.use('/pelanggan', router);

}