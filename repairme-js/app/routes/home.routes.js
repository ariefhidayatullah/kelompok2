module.exports = (app) => {
    app.get('/', (req, res) => {
        res.render('home/index', {
            judul: 'Home'
        });
    });
    app.get('/perbaikan', (req, res) => {
        res.render('perbaikan/index', {
            judul: 'perbaikan'
        });
    });
}