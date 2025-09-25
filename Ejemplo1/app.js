const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();
const PORT = 3000;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));
app.use(session({
  secret: 'secreto_super_seguro',
  resave: false,
  saveUninitialized: true
}));

// Ruta principal
app.get('/', (req, res) => {
  if (req.session.username) {
    res.send(`<h1>Bienvenido, ${req.session.username}!</h1><a href="/logout">Cerrar sesión</a>`);
  } else {
    res.redirect('/public/index.html');
  }
});

// Ruta para procesar el login
app.post('/login', (req, res) => {
  const { username, password } = req.body;
  const users = JSON.parse(fs.readFileSync('users.json'));
  const user = users.find(u => u.username === username && u.password === password);
  if (user) {
    req.session.username = user.username;
    res.redirect('/subpaginas/bienvenida.html');
  } else {
    res.send('Usuario o contraseña incorrectos. <a href="/index.html">Intentar de nuevo</a>');
 }
});

// Cerrar sesión
app.get('/logout', (req, res) => {
  req.session.destroy(() => {
    res.redirect('/index.html');
  });
});
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
