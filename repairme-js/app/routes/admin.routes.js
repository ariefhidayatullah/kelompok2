module.exports = (app, express) => {

	const router = express.Router();

	router.get('/', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/index', {
				judul: 'Dashboard Admin',
				message: req.flash('message'),
				success: req.flash('success'),
				error: req.flash('error')
			})
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

	router.get('/laptop', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/barang/laptop', {
				judul: 'Data Laptop',
				message: req.flash('message'),
				success: req.flash('success'),
				error: req.flash('error')
			});
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/handphone', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/barang/hp', {
				judul: 'Data handphone',
				message: req.flash('message'),
				success: req.flash('success'),
				error: req.flash('error')
			});
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/kerusakan_laptop', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/kerusakan/laptop', {
				judul: 'Kerusakan Laptop'
			})
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/kerusakan_handphone', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/kerusakan/hp', {
				judul: 'Kerusakan Laptop'
			})
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/paket', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/paket/index', {
				judul: 'Paket Biaya Iklan'
			})
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/permintaan_verifikasi', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
				res.render('./admin/paket/permintaan_verifikasi', {
				judul: 'Paket Biaya Iklan'
			})      
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/data_mitra', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
				res.render('./admin/data/data_mitra', {
				judul: 'Data Mitra'
			})     
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/data_pelanggan', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
				res.render('./admin/data/data_pelanggan', {
				judul: 'Data Pelanggan'
			})   
            } else {
                next()
            }
        } else {
        	req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

    router.get('/data_perbaikan', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'admin') {
                res.render('./admin/data/perbaikan', {
                judul: 'Data Perbaikan'
            })   
            } else {
                next()
            }
        } else {
            req.flash('message', "User tidak terdeteksi!");
            res.redirect('/login');
        }
    });

	app.use('/admin', router);

}