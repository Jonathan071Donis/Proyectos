const { Router } = require('express');
const router = Router();

// Utiliza import() para cargar node-fetch de manera asíncrona
import('node-fetch')
  .then((module) => {
    const fetch = module.default;

    router.get('/', async (req, res) => {
      try {
        const response = await fetch('https://jsonplaceholder.typicode.com/users');
        const users = await response.json();
        console.log(users);
        res.json(users);
      } catch (error) {
        console.error('Error al realizar la solicitud:', error);
        res.status(500).json({ error: 'Internal Server Error' });
      }
    });
  })
  .catch((error) => {
    console.error('Error al importar node-fetch:', error);
  });

module.exports = router;
