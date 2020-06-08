module.exports = (app, express) => {
    const mitra = require('../../controllers/api/api-mitra.controller.js');
    const multer = require('multer');
    const router = express.Router();

    // ========== RESTAPI ==========

    const storage_ktp = multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'assets/images/mitra/foto_ktp')
        },
        filename: function (req, file, cb) {
            cb(null, file.fieldname + ' - '+ file.originalname)
        }
    })

    const storage_usaha = multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'assets/images/mitra/foto_usaha')
        },
        filename: function (req, file, cb) {
            cb(null, file.fieldname + ' - '+ file.originalname)
        }
    })


    const upload_ktp = multer({storage: storage_ktp});
    const upload_usaha = multer({storage: storage_usaha});

    // Menambah Mitra
    router.post('/', mitra.create);

    router.post('/upload_ktp', upload_ktp.single('foto_ktp'), (req, res, next) => {
        next();
    });
    router.post('/upload_usaha', upload_usaha.single('foto_usaha'));

    // Mencari Mitra
    router.get('/', mitra.findAll);

    router.get('/email', mitra.findEmail);

    // Mencari Mitra berdasarkan Id
    router.get('/:mitraId', mitra.findOne);

    // Update Mitra berdasarkan Id
    router.put('/:mitraId', mitra.update);

    // Delete Mitra berdasarkan Id
    router.delete('/:mitraId', mitra.delete);

    app.use('/api/mitra', router);
}