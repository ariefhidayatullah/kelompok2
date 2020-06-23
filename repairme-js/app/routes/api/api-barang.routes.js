module.exports = (app, express) => {
    const mitra = require('../../controllers/api/api-mitra.controller.js');
    const barang = require('../../controllers/api/api-barang.controller.js');
    const router = express.Router();

    // ========== RESTAPI ==========

    // Menambah barang
    router.post('/merk', barang.insertMerk);
    router.get('/merk/:jenis', barang.findMerkByJenis);
    //tambah laptop
    router.post('/laptop', barang.insertLaptop);
    // Mencari barang
    router.get('/', barang.findAll);


    // Menambah barang
    router.post('/merk_hp', barang.insertMerkHp);
    //tambah handphone
    router.post('/hp', barang.insertHp);
    //tambah paket
    router.post('/paket', barang.insertPaket);



    //kerusakan
    router.post('/kerusakan/', barang.insertKerusakan);
    router.post('/kerusakanhp/', barang.insertKerusakan);
    router.get('/kerusakan/:jenis', barang.findKerusakan);
    router.put('/kerusakan/:jenis', barang.updateKerusakan);
    router.get('/kerusakanhp/:jenis', barang.findKerusakanHp);
    router.put('/kerusakanhp/:jenis', barang.updateKerusakanHp);
    router.delete('/kerusakan/:id', barang.deleteKerusakan);


    //router laptop
    router.get('/laptop', barang.findAllLaptop);
    router.put('/laptop/:id', barang.updateLaptop);
    router.get('/laptop/:merk', barang.findLaptopByMerk);
    router.delete('/laptop/:id', barang.deleteLaptop);

    //router Handphone
    router.get('/handphone', barang.findAllHandphone);
    router.get('/handphone/:merk', barang.findHandphoneByMerk);
    router.put('/hp/:id', barang.updateHandphone);
    router.delete('/hp/:id', barang.deleteHandphone);

    //router Paket
    router.get('/paket', barang.findAllPaket);
    router.put('/paket/:id', barang.updatePaket);
    router.delete('/paket/:id', barang.deletePaket);

    // // Mencari barang berdasarkan Id
    // router.get('/:noteId', barang.findOne);

    // // Update barang berdasarkan Id
    // router.put('/:noteId', barang.update);

    // // Delete barang berdasarkan Id
    // router.delete('/:noteId', barang.delete);

    app.use('/api/barang', router);;
}