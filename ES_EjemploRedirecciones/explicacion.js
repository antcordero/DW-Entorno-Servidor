const express = require('express'); //declarar libreria express
const path = require('path'); //declarar libreria path
const app = express(); //crear app express
const port = 3000;  //puerto

// Servir archivos estáticos desde /public
app.use(express.static('public')); //método de la librería express -> va a buscar los archivos estáticos en la carpeta public y trabaja con ellos

// Ruta que procesa el formulario con GET
app.get('/ir-a-pagina', (req, res) => { //ruta que procesa el formulario, tiene dos parámetros, el primer parámetro coge la primera página con la ruta, req (request) y res (response), cuando le damos al submit se activa esta ruta y captura el dato que manda
  const numero = req.query.numero;  //captura el valor del campo del formulario (name="numero") se define el nombre con el id del input, query es un objeto que contiene una propiedad por cada campo del formulario
  //redirige a la página correspondiente o a error.html si el número no es válido

  //aquí se puede hacer un console.log(numero) para ver el valor que captura sin necesidad de abrir el navegador cerrando la función aro y sin redireccionar a ninguna página

  if (['1', '2', '3', '4'].includes(numero)) { //si el número es 1, 2, 3 o 4 //includes es un método de array que comprueba si un valor está en el array, se puede hacer el if uno por uno pero es más largo, cuando coincide con alguno devuelve true y redirecciona a la página correspondiente
    res.redirect(`/pagina${numero}.html`);  //redirecciona a la página correspondiente
  } else {
    res.redirect('/error.html');  //si no coincide con ninguno redirecciona a error.html
  }
});

app.listen(port, () => {  //iniciar servidor
  console.log(`Servidor escuchando en http://localhost:${port}`); //mensaje en consola
});