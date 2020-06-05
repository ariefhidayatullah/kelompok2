module.exports = (app) => {
    app.get('/mitra/registrasi', (req, res) => {
        res.render('mitra/registrasi', {
            judul: 'Home'
        });
    });
}