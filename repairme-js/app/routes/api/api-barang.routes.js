module.exports = (app, express) => {
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

<<<<<<< HEAD
    //kerusakan
    router.post('/kerusakan/:jenis', barang.insertKerusakan);
=======
    //find barang
    router.get('/laptop', barang.findAllLaptop);

    router.put('/laptop', barang.updateLaptop);
>>>>>>> caa07e5ef6fcc48e236bb471819a3c8c57e5813b


    // // Mencari barang berdasarkan Id
    // router.get('/:noteId', barang.findOne);

    // // Update barang berdasarkan Id
    // router.put('/:noteId', barang.update);

    // // Delete barang berdasarkan Id
    // router.delete('/:noteId', barang.delete);

    app.use('/api/barang', router);;
}