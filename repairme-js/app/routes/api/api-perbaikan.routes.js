module.exports = (app, express) => {
	const perbaikan = require('../../controllers/api/api-perbaikan.controller.js');
    const router = express.Router();

    router.post('/', perbaikan.newPerbaikan);
    router.get('/', perbaikan.findAllPerbaikan);

    //pelanggan

    router.get('/pelanggan/:id', perbaikan.findPerbaikanPelanggan);
    router.get('/pelanggan/:email/:jenis', perbaikan.findPerbaikanPelangganStatus);

    //mitra
    router.get('/mitra/:id', perbaikan.findPerbaikanMitra);

    //mitra berdasarkan status nya
    router.get('/mitra/:email/:status/:jenis', perbaikan.findPerbaikanMitraStatus);
    //ganti status perbaikan ex= terima mitra dll
    router.post('/mitra/:id/', perbaikan.putPerbaikanMitra);

    app.use('/api/perbaikan', router);
}