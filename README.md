# cuestionario
Cuestionario "La Guía De La Vida"

Este proyecto es un servicio con interfaz grafica FrontEnd y proceso BackEnd con PHP y Javascript. Se muestra el formulario con Bootstrap, jquery y estilos personalizados al cliente con la finalidad de ayudar al usuario a llenar el cuestionario de forma practica enlazando a un test de personalidad y enviar los resultados a Escala.

---

## 🚀 ¿Qué hace?

- Muestra el formulario de La Guia de la Vida.  
- Conecta con 16personalities para contestar un test personalidad.
- Junto con el microservicio scraper obtiene información especifica del test de personalidad.  
- Valida la información entrante para evitar errores en el envío de la información.
- Genera un JSON con la información del formulario y del test de personalidad.
- Envía el JSON de forma automatica al CRM de Escala.

---

## 📦 Instalación local

1. Instala un Panel de Control como XAMPP o WAMPP
2. Levanta el puerto para PHP
3. En la carpeta .htdocs abre una terminal
```bash
git clone https://github.com/tu-usuario/cuestionario.git
cd cuestionario
```

---

## 🧪 Ejecución local

Abre tu navegador y luego accede a:  
`http://localhost/cuestionario/`

---