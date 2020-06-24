const path = require('path');

module.exports = (app, express) => {

    const router = express.Router();

    router.get('/', (req, res, next) => {
       if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                res.render('mitra/index', {
                judul: 'Dashboard Mitra',
                email: req.session.user.email
                })
            }else {
                next()
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

    router.get('/profile', (req, res, next) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                res.render('mitra/profile/index', {
                judul: 'Profile Mitra',
                email: req.session.user.email
                })
            }else {
                next()
            }
       }else{
            res.redirect('/login');
       }
    });

    router.get('/pengajuan/:jenis', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                if (req.params.jenis === "laptop") {
                    res.render('mitra/perbaikan/pengajuan/laptop', {
                    judul: 'Pengajuan Perbaikan',
                    email: req.session.user.email
                    })
                }else if(req.params.jenis === "handphone"){
                    res.render('mitra/perbaikan/pengajuan/handphone', {
                    judul: 'Pengajuan Perbaikan',
                    email: req.session.user.email
                    })
                }else {
                    next()
                }
            }else {
                next()
            }
       }else{
            res.redirect('/login');
       }
    })

    router.get('/voucher', (req, res) => {
        if (req.session.user) {
            if (req.session.user.jenis === 'mitra') {
                res.render('mitra/perbaikan/voucher/index', {
                judul: 'Terima Voucher',
                email: req.session.user.email
                })
            }else {
                next()
            }
       }else{
            res.redirect('/login');
       }
    })

    app.use('/mitra', router);

}