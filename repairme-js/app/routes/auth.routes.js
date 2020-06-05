module.exports = (app) => {

	const user = require('../controllers/user.controller.js');
    
    app.post('/api/mitra/registrasi', user.create);

}