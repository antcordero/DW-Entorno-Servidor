/* **PRIMERA FORMA
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
*/

/* SEGUNDA FORMA */
const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Servir archivos estáticos desde /public
app.use(express.static('public'));

// Ruta que procesa el formulario con GET
app.get('/pag1', (req, res) => {
  const numero = req.query.numero;
  
  //imprimir en consola el valor capturado sin necesidad de abrir el navegador
  console.log(numero);

  
  if (['1', '2', '3', '4'].includes(numero)) {
    res.redirect(`/pag${numero}.html`);
  } else {
    res.redirect('/error.html');
  }
  

});

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});