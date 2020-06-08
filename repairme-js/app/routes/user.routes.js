module.exports = (app, express) => {
    const mitra = require('../controllers/user.controller.js');
    const router = express.Router();

    router.get('/email', mitra.findAllEmail);

    app.use('/api/user', router);
}