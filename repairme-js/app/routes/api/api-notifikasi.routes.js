module.exports = (app, express) => {
    const notifikasi = require('../../controllers/api/api-notifikasi.controller.js');
    const router = express.Router();

    router.get('/', notifikasi.findAll);
    router.get('/perbaikan/:id', notifikasi.findByPerbaikan);
    router.get('/perbaikan/:id/:status/:keterangan', notifikasi.findByPerbaikanStatus);
    router.get('/jenis/:jenis/:id', notifikasi.findByIdUser);
    router.get('/jenis/:jenis/:id/:status', notifikasi.findByStatus);
    router.post('/', notifikasi.newNotifikasi);
    router.post('/pelanggan', notifikasi.newNotifikasiPelanggan);
    router.post('/dibaca/:id', notifikasi.changeStatus)
    app.use('/api/notifikasi', router);
}