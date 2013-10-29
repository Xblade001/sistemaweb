
function Incluir(){
    

var f = document.form1;
		
//campos		
f[0].disabled = false;
f[1].disabled = false;
f[0].focus();

//botones	
f.txtoperacion.value = 'incluir';
f.btnincluir.disabled = true;
f.btnbuscar.disabled = true;
f.btnmodificar.disabled = true;
f.btneliminar.disabled = true;
f.btncancelar.disabled = false;
f.btnguardar.disabled = false;
}



function Buscar(){
var f = document.form1; 
		
//campos		
f[0].disabled = false;
f[1].disabled = true;
f[0].focus();

//botones	
f.txtoperacion.value = 'buscar';
f.btnincluir.disabled = true;
f.btnbuscar.disabled = true;
f.btnmodificar.disabled = true;
f.btneliminar.disabled = true;
f.btncancelar.disabled = false;
f.btnguardar.disabled = true;
}

function Modificar(){
var f = document.form1;
		
//campos		
f[0].disabled = true;
f[1].disabled = false;


//botones	
f.txtoperacion.value = 'modificar';
f.btnincluir.disabled = true;
f.btnbuscar.disabled = true;
f.btnmodificar.disabled = true;
f.btneliminar.disabled = true;
f.btncancelar.disabled = false;
f.btnguardar.disabled = false;
}

function perderfocus()
{
var f = document.form1;
			
if(f.txtcodigo  .value=='buscar')
{
    f[0].disabled = false;
    f.submit();
}
}

function Guardar()
{
var f = document.form1;
f[0].disabled = false;
f.submit();
}

function Eliminar()
{
var f = document.form1;
if(confirm('Desea Eliminar esta Persona'))
{
    f[0].disabled = false;
    f.txtoperacion.value = 'eliminar';
    f.submit();
}
else
{
    location.href='../vistas/vistaPais.php';
}
}	
		
		
function Cancelar(){
			
location.href='../vistas/vistaPais.php';	
}
		
		
		
function mensajes(operacion,listo)
{
var f = document.form1;
			
if(listo==1 && operacion=='buscar')
{
				
    f.btnincluir.disabled = true;
    f.btnbuscar.disabled = true;
    f.btnmodificar.disabled = false;
    f.btneliminar.disabled = false;
    f.btncancelar.disabled = false;
}
			
if(listo==0 && operacion=='buscar')
{
    alert('El Registro que Busca no Existe');
}
			
			
if(listo==1 && operacion=='incluir')
{
    alert('Registro Incluido con Exito');
}
			
if(listo==0 && operacion=='incluir')
{
    alert('El Registro que Intenta Incluir Ya existe');
}
			
if(listo==1 && operacion=='modificar')
{
    alert('Registro Modificado con exito');
}
			
if(listo==1 && operacion=='eliminado')
{
    alert('Registro Eliminado con exito');
}
}