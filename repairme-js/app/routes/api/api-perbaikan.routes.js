module.exports = (app, express) => {
    const perbaikan = require('../../controllers/api/api-perbaikan.controller.js');
    const router = express.Router();

    router.post('/', perbaikan.newPerbaikan);
    router.get('/', perbaikan.findAllPerbaikan);

    //pelanggan

    router.get('/pelanggan/:id', perbaikan.findPerbaikanPelanggan);
    router.get('/pelanggan/:email/:jenis', perbaikan.findPerbaikanPelangganByJenis);
    router.get('/pelanggan/:email/:status/:jenis', perbaikan.findPerbaikanPelangganStatus);

    //mitra
    router.get('/mitra/:id', perbaikan.findPerbaikanMitra);

    //mitra berdasarkan status nya
    router.get('/mitra/:email/:status/:jenis', perbaikan.findPerbaikanMitraStatus);

    //ganti status perbaikan ex= terima mitra dll
    router.post('/mitra/:id/:keterangan', perbaikan.putPerbaikanMitra);

    // mitra berdasarkan voucher
    router.get('/voucher/:voucher', perbaikan.findPerbaikanByVoucher);

    app.use('/api/perbaikan', router);
}