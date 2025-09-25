const express = require('express');
const path = require('path');
 
const app = express();
const PORT = 3000;
 
// Servir archivos estáticos desde la carpeta 'public'
app.use(express.static(path.join(__dirname, 'public')));
 
// Ruta principal (/), que redirige a la Página 1
app.get('/', (req, res) => {
  res.redirect('/pag1');  // Redirige automáticamente a /page1
});
 
// Ruta para la Página 1
app.get('/pag1', (req, res) => {
  return res.sendFile(path.join(__dirname, 'public', 'pag1.html'));
});
 
// Ruta para la Página 2
app.get('/pag2', (req, res) => {
  return res.sendFile(path.join(__dirname, 'public', 'pag2.html'));
});
 
// Ruta para la Página 3
app.get('/pag3', (req, res) => {
  return res.sendFile(path.join(__dirname, 'public', 'pag3.html'));
});
 
// Ruta para Página No Existente (Página 4)
app.get('/error', (req, res) => {
  return res.sendFile(path.join(__dirname, 'public', 'error.html'));  // Muestra error.html
});
 
// Iniciar servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});